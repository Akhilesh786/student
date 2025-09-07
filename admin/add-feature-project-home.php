<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
	   <?php include("head_meta.php");
	  // error_reporting(0);
	   ?>
      <title>admin</title>
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
   </head>
   <body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">
         <!-- Sidebar -->
         <?php include 'header.php'; 
			include("config.php");
			$project_id=@$_GET["project_id"];
			$action=@$_GET["action"];
			if($project_id)
			{
			$stmt = $dbh->prepare("UPDATE `projects` SET `is_featured`='1' WHERE `project_id`=:project_id");
			$stmt->bindParam(':project_id', $project_id);
			 $stmt->execute();
			 $count = $stmt->rowCount();
			 if($count){
			echo '<script>window.location.href="add-feature-project-home"</script>';
			 exit;
			 }
			}if($action)
			{
			$stmt = $dbh->prepare("UPDATE `projects` SET `is_featured`='0' WHERE `project_id`=:project_id");
			$stmt->bindParam(':project_id', $project_id);
			 $stmt->execute();
			 $count = $stmt->rowCount();
			 if($count){
			echo '<script>window.location.href="add-feature-project-home"</script>';
			 exit;
			 }
			}
		 
		 
		 ?>
         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
			<div class="container-fluid">

                   <h1 class="h3 mb-2 text-gray-800"> Search Project Which You Wnat to Show on Home Page</h1>
                    <form method="post"  id="fetch_data">
							  <div class="form-group">
                                    <label for="usr"><strong>Type Project Which You Want To Select</strong></label>
                                  <input type="text" name="project_search" class="form-control">
                                 </div>
							   <input type="submit" value="View" name="submit"  class="btn btn-primary mt-1 mb-3"/>
							</form>
							<form method="post"  id="fetch_featured_project">
							  
							   <input type="submit" value="View featured Project" name="submit"  class="btn btn-primary mt-1 mb-3"/>
							</form>

                </div>
			
               <div class="container-fluid">
                  <!-- Page Heading -->
                  
                  <div class="row">
                     <!-- Pie Chart -->
                     <div class="col-xl-8 col-lg-8" style="display:">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                           </div>
                           <!-- Card Body -->
                           <div class="card-body" id="get_data_response">
                            
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
         </div>
      </div>
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
        
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>
	  <script>
	$('#fetch_data').on('submit',(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

	formData.append('action', "select_featured_project"); 
    $.ajax({
        type:'POST',
        url: 'fetch.php',
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){
            console.log(data);
			if(data==4){
				alert("You Can Only Select Only 4. you need to delete one from featured List.")
			}else{
			$('#get_data_response').html(data); 
			}
        },
        error: function(data){
            console.log("error");
            console.log(data);
        }
    });
}));
$('#fetch_featured_project').on('submit',(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

	formData.append('action', "fetch_featured_project"); 
    $.ajax({
        type:'POST',
        url: 'fetch.php',
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){
            console.log(data);
			
			$('#get_data_response').html(data); 
			
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