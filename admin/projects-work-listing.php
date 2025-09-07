<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
	 <?php include("head_meta.php");?>
      <title>admin</title>
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
	  <style>
		.btn-block {
			display: block;
			width: 25%;
		}
	  </style>
   </head>
   <body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">
         <!-- Sidebar -->
         <?php include 'header.php'; 
			
			include 'config.php';
		    $stmt=$dbh->query("SELECT * FROM `projects` WHERE `project_name_id`='".$_GET['id']."' ");					
			
			function name($id,$dbh){
				
			$stmt=$dbh->query("SELECT * FROM `project_name` WHERE `id`='".$id."' ");					
			$rows = $stmt->fetch();	
				return $rows["project_name"];
			}
		 
		 
		 
		 ?>
         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
               <div class="container-fluid">
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                     <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                  </div>
                  <div class="row">
                    
                     
                     <!-- Pie Chart -->
                     <div class="col-xl-12 col-lg-12" style="display:">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">All <?php echo name($_GET['id'],$dbh) ?> Project</h6>
                           </div>
                           <!-- Card Body -->
                           <div class="card-body">
                              <?php 	
							  			
							while ($row = $stmt->fetch()) { ?> 
                              <div class="card mb-4 blog">
                                 <img class="card-img-top" src="./doc/<?php echo $row['head_image']; ?>" alt="Card image cap" style="display:non; max-width:450px;">   
                                 <div class="card-body">
                                    <h2 class="card-title blog-title text-capitalize">
                                       <?php echo $row['heading']; ?>
                                    </h2>									
                                    <hr style="height:1px;">
                                    <p class="card-text blog-content">
                                       <?php echo substr($row['short_description'], 0, 300); ?>
                                    </p>
                                    <div style="display:flex;">
                                       <a href="add-project-work/<?php echo $row['project_id']; ?>" class="blog-link btn btn-primary">Edit This Project Post &rarr;</a>	
                                       &nbsp; &nbsp; 			
                                       <button class="btn btn-google btn-block" onclick="delete_work('<?php echo $row['project_id']; ?>')">Delete</button>
                                    </div>
                                 </div>
                                 <div class="card-footer text-muted blog-date">    
                                    Posted on <strong><?php echo $row['date']; ?></strong>                                     
                                 </div>
                              </div>
                              <?php } ?> 
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
	  function delete_work(project_work_id){
		  // alert(project_work_id);
		   
		   let text = "Press a button!\nEither OK or Cancel.";
		  if (confirm(text) == true) {
			text = "You pressed OK!";
		 
		   
		   var url="delete/delete.php";
   
                    $.post(url,{"project_work_id":project_work_id,"action":"project_work_delete"},function(data){
   						
						
						if(data){
   						window.location.reload();
   						}
   				});
  }else {
				text = "You canceled!";
			  }
	   }
	  </script>
      
   </body>
</html>