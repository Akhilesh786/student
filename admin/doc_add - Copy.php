<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'header.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Add document</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                   <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="p-5">
                           
                            <form class="user" id="addtestimonial" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-3">
                                        <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Name">
                                    </div>
									<div class="col-sm-12 mb-3 mb-sm-3">
                                        <input type="text" name="postion" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Postion Title">
                                    </div>
									 <div class="col-sm-12 mb-3 mb-sm-3">
                                        <input type="text" name="title" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Enter Testimonial">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
								<span>Upload thumbnail :</span>
                                    <input type="file" name="thumbnail" id="photo">
									<input type="text" name="thumbnail" class="get-photo"  value="">
									
									<div class="uploaded_image">
									</div>
									<img src="assets/img/image-uploading.gif" class="img-thumbnail" style="height:150px; width:auto;" />
									<div id="response"></div>
                                </div>
                                 
                                
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                   Add Document
                                </button>
                                
                            </form>
                            <hr>
                            
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
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php include 'footer_1.php'; ?>

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
	<script>
  $(document).ready(function(){

     var _URL = window.URL || window.webkitURL;
    $('#photo').change(function () {
           var file = $(this)[0].files[0];

           img = new Image();
           var imgwidth = 0;
           var imgheight = 0;
           var maxwidth = 90;
           var maxheight = 90;

           img.src = _URL.createObjectURL(file);
           img.onload = function() {
                  imgwidth = this.width;
                  imgheight = this.height;
 
                   $("#width").text(imgwidth);$("#height").text(imgheight);  
                  
                  if(imgwidth >= maxwidth && imgheight == maxheight){
 
                       var form_data = new FormData();
                       

                       form_data.append("file", document.getElementById('photo').files[0]);
						   $.ajax({
							url:"doc_upload.php",
							method:"POST",
							data: form_data,
							contentType: false,
							cache: false,
							processData: false,
							beforeSend:function(){
							 $('.uploaded_image').show(500);
							 $('.uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
							},   
							success:function(data)
							{
							
							 $('.uploaded_image').hide();
							 $('.get-photo').attr("value",data);
							 $('.img-thumbnail').attr("src","doc/"+data);
						
							}
						   });
                  } else { 
				  
				  $("#response").text("Image size must be "+maxwidth+"X"+maxheight); }
           };
           

     });
	  
                  
          
            $('#addtestimonial').submit(function(e) {
				e.preventDefault();
				$.ajax({
				   type: "POST",
				   url: 'add_testimonial.php',
				   data: $(this).serialize(),
				   success: function(data)
				   { 
				   alert(data);
					 window.location.reload();
				   }
			   });
			 });

     });


</script>

</body>

</html>