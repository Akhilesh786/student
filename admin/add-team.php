<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      
    <?php include("head_meta.php");?>
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
      <?php 
      error_reporting(0);
        include 'header.php';
        include 'config.php';
        $id=@$_GET['delete'];
        $edit=@$_GET['edit'];
        $sql = "DELETE FROM `team_member` WHERE  member_id  =:id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);   
        $stmt->execute();
        $count=$stmt->Rowcount();
        if($count){
            header("location:add-team");
        }
        $stmt1 = $dbh->query("SELECT * FROM team_member WHERE team_member.member_id ='$edit'");
        $row1=$stmt1->fetch();
      ?>
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
               <h1 class="h3 mb-2 text-gray-800"><?php if($edit){ echo 'Edit Member'; }else{ echo 'Add Member'; }?>  </h1>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="p-5">
                        <form class="user" id="addtestimonial" method="POST">
                           <div class="form-group row">
                              <div class="col-sm-12 mb-3 mb-sm-3">
                                 <input type="text" name="name" value="<?php echo $row1['name'];?>" class="form-control " id="exampleFirstName"
                                    placeholder="Name" required>
                              </div>
                              <div class="col-sm-12 mb-3 mb-sm-3">
                                 <input type="text" name="postion" value="<?php echo $row1['postion'];?>" class="form-control " id="exampleFirstName"
                                    placeholder="Postion Title" required>
                              </div>
                              <div class="col-sm-12 mb-3 mb-sm-3">
                                 <label for="" class=""><b>About Team Member<b></label>
                                 <textarea rows="" cols="" name="content" class="form-control" required><?php echo $row1['description'];?></textarea>
                              </div>
                              <div class="col-sm-12 mb-3 mb-sm-3">
                                 <input type="text" name="facebook" class="form-control " value="<?php echo $row1['facebook'];?>" id="exampleFirstName"
                                    placeholder="facebook">
                              </div>
                              <div class="col-sm-12 mb-3 mb-sm-3">
                                 <input type="text" name="twitter" class="form-control "  value="<?php echo $row1['twitter'];?>" id="exampleFirstName"
                                    placeholder="twitter">
                              </div>
                              <div class="col-sm-12 mb-3 mb-sm-3">
                                 <input type="text" name="linkedin" class="form-control " value="<?php echo $row1['linkedin'];?>" id="exampleFirstName"
                                    placeholder="linkedin">
                                    <?php if($edit){ echo '<input type="hidden" name="member_id" value="'.$edit.'">'; }?>  
                                
                              </div>
                              <button type="submit" class="btn btn-primary ">
                            <?php if($edit){ echo 'Edit Member'; }else{ echo 'Add Member'; }?>  
                              </button>
                        </form>
                        <hr>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Testimonial Listing</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Name</th>
                                            <th>Postion</th>
                                            <th>About Member</th>
											<th>Social Link</th>
											<th>delete</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
									<?php 

									$sr=0;
									$stmt = $dbh->query("SELECT * FROM `team_member` ");
									while($row=$stmt->fetch()) {	
									$sr++;
									?>
									 <tr>
                                            <td><?php echo $sr;?></td>
                                            <td><?php echo $row['name']; ?></td>
											 <td><?php echo $row['postion']; ?></td>
											 <td><?php echo $row['description']; ?></td>
											 <td><?php echo $row['facebook']; ?></br><?php echo $row['twitter']; ?></br><?php echo $row['linkedin']; ?></td>
                                            <td>
                                                <a href="add-team?delete=<?php echo $row['member_id'];?>">Delete</a>
                                                <a href="edit-team/<?php echo $row['member_id'];?>">Edit</a>
                                            </td>
                                        </tr>
									<?php } ?>
									</tbody>
                                </table>
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
      <script>
         $(document).ready(function(){
         
           $('#addtestimonial').submit(function(e) {
         		e.preventDefault();
         		$.ajax({
         		   type: "POST",
         		   url: 'add_team.php',
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