<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>admin</title>
      
      <?php 
      error_reporting(0);
      include("head_meta.php");?>
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
	  <style>.btn-block {
    display: block;
    width: 25%;
}</style>
   </head>
   <body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">
         <!-- Sidebar -->
         <?php include 'header.php';
			
			include 'config.php';
         $id=@$_GET["id"];
            $stmtprojecttype_data=$dbh->query("SELECT * FROM add_project_type where `project_type_id`='".$id."'");
            $rowprojecttype_data = $stmtprojecttype_data->fetch();
		 ?>
         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
               <div class="container-fluid">
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                     <h1 class="h3 mb-0 text-gray-800">Project Dashboard</h1>
                  </div>
                  <div class="row">
                     <div class="col-xl-6 col-lg-6" style="display:">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">Add Project Type</h6>
                           </div>
                           <!-- Card Body -->
                           <div class="card-body">
                              <form class="user" action="add/add_project_type.php" method="POST">
                                 <div class="form-group">
                                    <input type="text" value="<?php echo $rowprojecttype_data["project_type"]?>" name="name" class="form-control " placeholder="Project Type" required >
                                    <?php if($id){?>
                                    <input type="hidden" name="project_type_id" value="<?php echo $id; ?>" >
                                    <?php } ?>
                                 </div>
								 <div class="form-group">
                           <textarea  name="description" class="form-control" required><?php echo $rowprojecttype_data["description"]?></textarea>
                                 </div>
								 <div class="form-group">
									<span>Banner</span></br>
                                    <input type="file"  id="logo">
									<input type="hidden" name="thumbnail_logo" class="get-logo" value="<?php echo $rowprojecttype_data["image"]?>"></br>
									<b class="validation-logo">Select an logo as given ratio.</b> 
									
									<div class="uploaded_logo">
									</div>
									<img src="../img/banner/<?php echo $rowprojecttype_data["image"]?>" class="logo-thumbnail" style="height:150px; width:400px;" />
									<div id="response-logo"></div>
                                </div>
                                 <button type="submit" name="submit" class="btn btn-primary " >
                                    <?php if($id){ echo "Edit"; }else{ echo "ADD"; }?></button>
                               
                              </form>
                           </div>
                        </div>
                     </div>
					  <div class="col-xl-6 col-lg-6">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">All Project Type </h6>
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
                                                   <th>Action</th>
                                                </tr>
                                             </thead>
                                             <?php 
                                                $i = 1; 
                                                $stmtprojecttype=$dbh->query("SELECT * FROM add_project_type");
                                                while ($rowprojecttype = $stmtprojecttype->fetch()){ 
                                                $projecttype_id=$rowprojecttype['project_type_id']; 
                                                ?>
                                             <tbody>
                                                <tr role="row" class="odd">
                                                   <td class="sorting_1"><?php echo $i++ ; ?></td>
                                                   <td><a href="projects-listing/<?php echo $projecttype_id; ?>" class="text-capitalize"><?php echo $rowprojecttype['project_type'] ; ?></a>
                                                   </td>
                                                   <td>
                                                        <button class="btn btn-google btn-block" onclick="add_project_type_('<?php echo $rowprojecttype['project_type_id']; ?>')" style="width:100%;" >Delete</button>
                                                        <a href="edit_project_type/<?php echo $rowprojecttype['project_type_id']; ?>" class=" btn btn-primary" style="width:100%;" >Edit</a>
                                                     
                                                   </td>
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
                     <!-- Area Chart -->
                     <div class="col-xl-12 col-lg-12" style="display:">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">Add Project</h6>
                           </div>
                           <!-- Card Body -->
                           <div class="card-body">
                              <a href="add-project" class="btn btn-primary btn-user btn-block">Add </a>
                           </div>
                        </div>
                     </div>
                      <div class="col-xl-12 col-lg-12" style="display:">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">Add Work</h6>
                           </div>
                           <!-- Card Body -->
                           <div class="card-body">
                              <a href="add-project-work" class="btn btn-primary btn-user btn-block">Add </a>
                           </div>
                        </div>
                     </div>
                     <!-- Pie Chart -->
                     <div class="col-xl-12 col-lg-12" style="display:">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">All Work</h6>
                           </div>
                           <!-- Card Body -->
                           <div class="card-body">
                              <?php 	
							  $stmt=$dbh->query("SELECT * FROM projects ORDER BY `projects`.`project_id` DESC ");					
											while ($row = $stmt->fetch()) { ?>    
                              <!-- Blog Post -->      
                              <div class="card mb-4 blog">
                                 <img class="card-img-top" src="./doc/<?php echo $row['head_image']; ?>" alt="Card image cap" style="display:non; max-width:450px;">   
                                 <div class="card-body">
                                    <h2 class="card-title blog-title text-capitalize">
                                       <?php echo $row['heading']; ?>
                                    </h2>
                                    <hr style="height:1px;">
                                    <p class="card-text blog-content">
                                       <?php // echo substr($row['blog_content'], 0, 200); ?>
                                    </p>
                                    <div style="display:flex;">
                                       <a href="add-project-work/<?php echo $row['project_id']; ?>" class="blog-link btn btn-primary">Edit This Blog Post &rarr;</a>	
                                       &nbsp; &nbsp; 			
                                      <button class="btn btn-google btn-block" onclick="delete_work('<?php echo $row['project_id']; ?>')">Delete</button>
                                    </div>
                                 </div>
                                 <div class="card-footer text-muted blog-date">    
                                    Posted on <strong><?php echo $row['date']; ?></strong>  
                                   
                                    <br>
                                    Author: <strong class="text-capitalize"><?php echo $row['name']; ?></strong>  
                                    
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
          $(document).ready(function(){

     var _URL = window.URL || window.webkitURL;
    $('#logo').change(function () {
           var file = $(this)[0].files[0];

           img = new Image();
           var imgwidth = 0;
           var imgheight = 0;
           var maxwidth = 1520;
           var maxheight = 372;

           img.src = _URL.createObjectURL(file);
           img.onload = function() {
                  imgwidth = this.width;
                  imgheight = this.height;
 
                   $("#width").text(imgwidth);$("#height").text(imgheight);  
                  
                  if(imgwidth >= maxwidth && imgheight == maxheight){
 
                       var form_data = new FormData();
                       

                       form_data.append("file", document.getElementById('logo').files[0]);
						   $.ajax({
							url:"logo_upload.php",
							method:"POST",
							data: form_data,
							contentType: false,
							cache: false,
							processData: false,
							beforeSend:function(){
							 $('.uploaded_logo').show(500);
							 $('.uploaded_logo').html("<label class='text-success'>Image Uploading...</label>");
							},   
							success:function(data)
							{
							
							 $('.uploaded_logo').hide();
							 $('.validation-logo').hide();
							 $('.get-logo').attr("value",data);
							 $('.logo-thumbnail').attr("src","../img/banner/"+data);
						
							}
						   });
                  } else { 
				  
				  $("#response-logo").text("Image size must be "+maxwidth+"X"+maxheight); }
           };
           

     });
	 });
         
      </script> 
	  <script>
	  function delete_work(project_work_id){
		  // alert(project_work_id);
		   
		   let text = "Press a button!\nEither OK or Cancel.";
		  if (confirm(text) == true) {
			text = "You pressed OK!";
		 
		   
		   var url="delete/delete.php";
   
                    $.post(url,{"project_work_id":project_work_id,"action":"project_work_delete"},function(data){
   						
						
						if(data){
   						window.location.href="project_dashboard";
   						}
   				});
  }else {
				text = "You canceled!";
			  }
	   }
	   function add_project_type_(project_type_id){
		  // alert(project_work_id);
		   
		   let text = "Press a button!\nEither OK or Cancel.";
		  if (confirm(text) == true) {
			text = "You pressed OK!";
		 
		   
		   var url="delete/delete.php";
   
                    $.post(url,{"project_type_id":project_type_id,"action":"project_type_delete"},function(data){
   						
						
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