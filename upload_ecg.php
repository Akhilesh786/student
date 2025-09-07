<?php
// upload.php
// 1) Accept upload(s) in PHP
// 2) Forward them to the Python service (Flask) at /analyze
// 3) Either redirect the browser to the resulting PDF OR proxy the PDF back

// --- CONFIG ---
$PY_BASE   = "http://127.0.0.1:8000";         // Python app base URL
$PY_ROUTE  = "/analyze";                       // Flask endpoint that accepts uploads
$ALLOWED   = ['csv','hea','dat','zip'];        // Same as Flask
$SAVE_DIR  = __DIR__ . "/uploads";             // Local temp uploads
$REDIRECT_TO_PY = true;                        // true = send user to Python result page/PDF; false = PHP fetches PDF and streams it

if (!is_dir($SAVE_DIR)) { mkdir($SAVE_DIR, 0777, true); }

// Helper
function ext_ok($filename, $allowed) {
  $pos = strrpos($filename, ".");
  if ($pos === false) return false;
  $ext = strtolower(substr($filename, $pos+1));
  return in_array($ext, $allowed, true);
}

// Validate incoming files
if (!isset($_FILES['ecg_files'])) {
  http_response_code(400);
  exit("No files uploaded.");
}

$files = $_FILES['ecg_files'];
if (!is_array($files['name'])) {
  // normalize to arrays
  $files = [
    'name' => [$files['name']],
    'type' => [$files['type']],
    'tmp_name' => [$files['tmp_name']],
    'error' => [$files['error']],
    'size' => [$files['size']],
  ];
}

$saved_paths = [];
for ($i=0; $i<count($files['name']); $i++) {
  if ($files['error'][$i] !== UPLOAD_ERR_OK) continue;
  $name = $files['name'][$i];
  if (!ext_ok($name, $ALLOWED)) continue;

  $safe = preg_replace('/[^A-Za-z0-9._-]/','_', $name);
  $dest = $SAVE_DIR . "/" . uniqid("ecg_", true) . "_" . $safe;
  if (!move_uploaded_file($files['tmp_name'][$i], $dest)) continue;
  $saved_paths[] = $dest;
}

if (empty($saved_paths)) {
  http_response_code(400);
  exit("No valid files uploaded. Allowed: .csv, .hea, .dat, .zip");
}

// Build a multipart POST to Python
$curl = curl_init();
$postFields = [];
foreach ($saved_paths as $p) {
  // Name the field ecg_files[] to match Flask's request.files.getlist("ecg_files")
  $postFields["ecg_files[]"] = new CURLFile($p, mime_content_type($p) ?: 'application/octet-stream', basename($p));
}

curl_setopt_array($curl, [
  CURLOPT_URL => $PY_BASE . $PY_ROUTE,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_POST => true,
  CURLOPT_POSTFIELDS => $postFields,
  CURLOPT_HEADER => true,              // we want headers to detect redirects
]);

$response = curl_exec($curl);
if ($response === false) {
  http_response_code(502);
  exit("Failed to contact Python service: " . curl_error($curl));
}

$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
$headers = substr($response, 0, $header_size);
$body    = substr($response, $header_size);
curl_close($curl);

// Strategy A: If Flask redirected to a result page, follow Location header ourselves and extract PDF link,
//             OR just send the user to that page.
if ($REDIRECT_TO_PY) {
  // Try to find a link like /reports/<file.pdf> in the HTML body
  if (preg_match('/href="([^"]*\/reports\/[^"]+\.pdf)"/i', $body, $m)) {
    $pdfUrl = $m[1];
    if (strpos($pdfUrl, 'http') !== 0) {
      $pdfUrl = rtrim($PY_BASE, '/') . $pdfUrl;  // absolute
    }
    // Send user directly to the PDF
    header("Location: " . $pdfUrl, true, 302);
    exit;
  } else {
    // Fallback: show the HTML Python returned (result page)
    header("Content-Type: text/html; charset=utf-8");
    echo $body;
    exit;
  }
}

// Strategy B: proxy the PDF through PHP (stays on your domain)
if (preg_match('/href="([^"]*\/reports\/[^"]+\.pdf)"/i', $body, $m)) {
  $pdfUrl = $m[1];
  if (strpos($pdfUrl, 'http') !== 0) {
    $pdfUrl = rtrim($PY_BASE, '/') . $pdfUrl;
  }

  $ch = curl_init($pdfUrl);
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_BINARYTRANSFER => true,
  ]);
  $pdfData = curl_exec($ch);
  if ($pdfData === false) {
    http_response_code(502);
    exit("Could not retrieve PDF from Python: " . curl_error($ch));
  }
  curl_close($ch);

  header("Content-Type: application/pdf");
  header('Content-Disposition: attachment; filename="ECG_Arrhythmia_Report.pdf"');
  echo $pdfData;
  exit;
}

// If we reach here, show whatever HTML came back
header("Content-Type: text/html; charset=utf-8");
echo $body;
