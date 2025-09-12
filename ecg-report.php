<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BeatMonitor - Health & Medical - Book Your Appointment</title>
    

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Outfit:wght@100..900&family=Saira:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <?php include 'header.php'; ?>
    <div class="breadcumb-wrapper " data-bg-src="assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">ECG Report</h1>
                <ul class="breadcumb-menu">
                    <li><a href="home-medical-clinic.html">Home</a></li>
                    <li>Check ECG Report</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="video-area overflow-hidden space" data-bg-src="assets/img/bg/video_bg_1.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7">
                    <div class="appointment-area-wrapper">
                        <form id="ecgUploadForm" enctype="multipart/form-data" class="appointment-form wow fadeInUp ajax-contact">
                            <div class="title-area mb-40">
                                <span class="sub-title">Upload Your ECG CSV</span>
                                <h5 class="sec-title">Please upload your ECG report in <strong>.CSV</strong> format for analysis.</h5>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="file" name="ecg_files" id="ecg_files" class="form-control" accept=".csv" style="padding: 11px 0 0 25px">
                                    <small class="error" id="errorMsg"></small>
                                </div>
                                
                            </div>
                            <div class="btn-group col-12">
                                    <button type="submit" class="th-btn style2 style-radius">Upload Report <i class="fa-light fa-arrow-right-long ms-2"></i></button>
                                    <div class="call-info">
                                    </div>
                            </div>
                            <p class="form-messages mb-0 mt-3" id="responseMsg"></p>
                        </form>
                    </div>

                </div>
                <div class="col-xl-5">
                    <div class="video-box1 wow fadeInRight text-center">
                        <a href="https://www.youtube.com/watch?v=i2pMEhEzbEs" class="video-play-btn popup-video">
                            <i class="fa-solid fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>
    <!-- Jquery -->
    <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
    <!-- Swiper Slider -->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Counter Up -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- Circle Progress -->
    <script src="assets/js/circle-progress.js"></script>
    <!-- Range Slider -->
    <script src="assets/js/jquery-ui.min.js"></script>
    <!-- Imagesloadedr -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- isotope -->
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- Nice-select -->
    <script src="assets/js/nice-select.min.js"></script>
    <!-- wow -->
    <script src="assets/js/wow.min.js"></script>

    <!-- 360 degree Js -->
    <script src="assets/js/threesixty.min.js"></script>
    <script src="assets/js/panolens.min.js"></script>

    <!-- gsap area start -->
    <script src="assets/js/gsap.min.js"></script>
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <script src="assets/js/SplitText.js"></script>
    <!-- gsap area end -->

    <!-- Main Js File -->
    <script src="assets/js/main.js"></script>
     <script>
    $(document).ready(function () {
      $("#ecgUploadForm").submit(function (e) {
        e.preventDefault();
        $("#errorMsg").text("");
        $("#responseMsg").text("");

        var file = $("#ecg_files")[0].files[0];

        if (!file) {
          $("#errorMsg").text("Please select an ECG CSV file.");
          return;
        }

        var fileType = file.name.split('.').pop().toLowerCase();
        if (fileType !== "csv") {
          $("#errorMsg").text("Only CSV files are allowed.");
          return;
        }

        var formData = new FormData(this);

        $.ajax({
          url: "upload_ecg.php", // PHP file to handle ECG upload
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            $("#responseMsg").removeClass("error").addClass("success").text(response);
          },
          error: function () {
            $("#responseMsg").removeClass("success").addClass("error").text("Something went wrong!");
          }
        });
      });
    });
  </script>
</body>

</html>