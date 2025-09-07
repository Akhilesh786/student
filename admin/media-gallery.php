
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
	  <?php include("head_meta.php");?>
      <meta name="author" content="">
      <title>admin</title>
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
		    ?>
		

         <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
             
               <!-- End of Topbar -->
               <div class="container-fluid">
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                     <h1 class="h3 mb-0 text-gray-800">Add Project</h1>
                  </div>
                  <div class="row">
                     
                     <div class="col-xl-12 col-lg-12" style="display:">
                        <div class="card shadow mb-4">
                           
                           <div class="card-body">
                              
							  <form method="post"  enctype="multipart/form-data" id="uploadForm">
							  <div class="form-group">
                                    <label for="usr"><strong>Select Gallery</strong></label>
                                  <select name="gallery_type" id="gallery_type" class="form-control" required>
									<option value="">Please Select </option>
									<option value="0">Project Gallery</option>
									<option value="1">Media & News Gallery</option>
								  
								  </select>
                        </div>
                        <div class="form-group">
                           <label for="usr"><strong>Add Title</strong></label>
                           <input name="title" type="text" id="title" class="form-control">
                                 
                        </div>
							   <input type="file" name="files[]" id="files" multiple required />
							   <div id="preview"></div>
							   <div class="uploaded_image"></div>
							   <input type="submit" value="Upload" name="submit"  class="btn btn-primary mt-3"/>
							</form>

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
        $(document).ready(function() {
		$('input[type="file"]').change(function(e) {
			var files = e.target.files;
			var fileCount = files.length;
			
			if (fileCount > 5) {
				//alert('You can select up to 5 images.');
				$(this).val('');
				return false;
			}
			
			$.each(files, function(i, file) {
				if (file.size > 524288) { // Check if file size is greater than 1 MB
					alert('Image ' + (i+1) + ' is too large (maximum size is 500 kB).');
					return true; // Skip to the next iteration of the loop
				}
				
				var reader = new FileReader();
				reader.onload = function(e) {
					var img = $('<img/>').addClass('thumb').attr('src', e.target.result);
					$('#preview').append(img);
					
					//var compressedImg = compress(e.target.result);
					// Call PHP function to upload compressed image to server
					//uploadFile(compressedImg);
				};
				reader.readAsDataURL(file);
			});
		});
	});


	$('#uploadForm').on('submit',(function(e) {
    e.preventDefault();
    var files = $('#files')[0].files;
    var fileCount = files.length;
    var formData = new FormData();
    var validFiles = [];
    
    // Add additional values to formData
    formData.append('gallery_type', $('#gallery_type').val());
    formData.append('title', $('#title').val());
    
    $.each(files, function(i, file) {
        if (file.size <= 524288) { // Check if file size is less than or equal to 500kb
            validFiles.push(file);
        } else {
            alert('Image ' + (i+1) + ' is too large (maximum size is 500kB).');
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
        url: 'upload.php',
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        beforeSend:function(){
							 $('.uploaded_image').show(500);
							 $('.uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
							},  
        success:function(data){
            console.log("success");
            console.log(data);
			if(data==0){ window.location.href="project-gallery-listing"; }else{ window.location.href="media-listing";}
        },
        error: function(data){
            console.log("error");
            console.log(data);
        }
    });
}));


      </script>
	   
	  
     
   </body>
</html>