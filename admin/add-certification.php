<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <?php include("head_meta.php");?>
      <meta name="author" content="">
      <title>Add-Certificate Admin</title>
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
      <link rel='stylesheet' href='https://unpkg.com/@yaireo/tagify/dist/tagify.css'>
      <style>.form-control {
         display: block;
         width: 25%;
         }.thumb{
         width:200px;
         margin-left: 10px;
         }
      </style>
   </head>
   <body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">
         <!-- Sidebar -->
         <?php
            include 'header.php'; 
            include 'config.php';
            ?>
         <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
               <!-- End of Topbar -->
               <div class="container-fluid">
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                     <h1 class="h3 mb-0 text-gray-800">Add Award</h1>
                  </div>
                  <div class="row">
                     <div class="col-xl-12 col-lg-12" style="display:">
                        <div class="card shadow mb-4">
                           <div class="card-body">
                              <form method="post"  enctype="multipart/form-data" id="uploadForm">
                                 <div class="form-group">
                                    <label for="usr"><strong>Enter Certificate Name</strong></label>
                                    <input type="text" name="certificate_name" id="certificate_name" class="form-control" >
                                 </div>
                                 <input type="file" name="files" id="files" multiple required />
                                 <div id="preview"></div>
                                 <input type="submit" value="Upload" name="submit"  class="btn btn-primary mt-3"/>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">All Document </h6>
                           </div>
                           <!-- Card Body -->
                           <div class="card-body">
                              <div class="table-responsive mt-4">
                                 <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                             <thead>
                                                <tr role="row">
                                                   <th>S.No</th>
                                                   <th>Name</th>
                                                   <th> View Document</th>
                                                   <th>Action</th>
                                                </tr>
                                             </thead>
                                             <?php 
                                                $i = 1; 
                                                $stmtcertificate=$dbh->query("SELECT * FROM `certificate_tabel`");
                                                while ($rowcertificate= $stmtcertificate->fetch()){ 
                                                $certificate_id=$rowcertificate['certificate_id']; 
                                                ?>
                                             <tbody>
                                                <tr role="row" class="odd">
                                                   <td class="sorting_1"><?php echo $i++ ; ?></td>
                                                   <td><?php echo $rowcertificate['certificate_name']; ?></td>
                                                   <td><a traget="_blank" href="../upload/award/<?php echo $rowcertificate['document']; ?>"> <?php echo $rowcertificate['certificate_name']; ?></a></td>
                                                   <td><button class="btn btn-google btn-block" onclick="certificatedelete('<?php echo $rowcertificate['certificate_id']; ?>')" style="width:100%;" >Delete</button> </td>
                                                </tr>
                                             </tbody>
                                             <?php } ?>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
               <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                     <span>Copyright &copy; Your Website 2020</span>
                  </div>
               </div>
            </footer>
            <!-- End of Footer -->
         </div>
         <!-- End of Content Wrapper -->
      </div>
      <!-- Scroll to Top Button-->
      <?php include 'footer_1.php';?>  
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>
      <!-- Page level plugins -->
      <script src="vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
      <!-- Page level custom scripts -->
      <script src="js/demo/datatables-demo.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>
      <script src="js/ckeditor.js"></script>
      <script>
         document.getElementById('files').addEventListener('change', function (e) {
    var file = e.target.files[0];
    var reader = new FileReader();

    reader.onload = function (e) {
        var pdfUrl = e.target.result;
        var embed = $('<embed/>').attr('src', pdfUrl).addClass('pdf-preview');
        $('#preview').empty().append(embed);
    };

    reader.readAsDataURL(file);
});

         
         
         
         $('#uploadForm').on('submit',(function(e) {
         e.preventDefault();
         var files = $('#files')[0].files;
         var fileCount = files.length;
         var formData = new FormData();
         var validFiles = [];
         
         // Add additional values to formData
         formData.append('certificate_name', $('#certificate_name').val());
         
         $.each(files, function(i, file) {
         if (file.size <= 524288) { // Check if file size is less than or equal to 1 MB
             validFiles.push(file);
         } else {
             alert('PDF ' + (i+1) + ' is too large (maximum size is 500kB).');
         }
         });
         if (validFiles.length === 0) {
         return false; // Stop form submission if no valid files are selected
         }
         
         formData.delete('files'); // Remove original file input from formData
         $.each(validFiles, function(i, file) {
         formData.append('files[]', file); // Add valid files to formData
         });
         
         //console.log(formData);
         $.ajax({
         type:'POST',
         url: 'upload-certificate.php',
         data:formData,
         cache:false,
         contentType: false,
         processData: false,
         beforeSend:function(){
            $('#preview').show(500);
            
            $('#preview').html("<label class='text-success'>PDF Uploading...</label>");

							}, 
         success:function(data){
             console.log("success");
             console.log(data);
         if(data){ window.location.href="add-certification"; }
         },
         error: function(data){
             console.log("error");
             console.log(data);
         }
         });
         }));
         function certificatedelete(certificate_id){
         
         let text = "Press a button!\nEither OK or Cancel.";
         if (confirm(text) == true) {
         text = "You pressed OK!";
         
         
         var url="delete/delete.php";
         
                     $.post(url,{"certificate_id":certificate_id,"action":"certificatedelete"},function(data){
         	
         
         	window.location.reload();
         
         });
         }else {
         text = "You canceled!";
         }
         }
         
      </script>
   </body>
</html>