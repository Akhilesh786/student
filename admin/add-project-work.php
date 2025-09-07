
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
	  <base href="https://ksmb.in/admin/" />
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
      <style>
         .tags-input-wrapper{
         /* background: transparent; */
         padding: 10px;
         /* border-radius: 4px; */
         /* max-width: 400px; */
         border: 1px solid #ccc;
         display: block;
         width: 100%;
         /* height: calc(1.5em + 0.75rem + 2px); */
         padding: 0.375rem 0.75rem;
         font-size: 1rem;
         font-weight: 400;
         line-height: 1.5;
         color: #6e707e;
         background-color: #fff;
         background-clip: padding-box;
         border: 1px solid #d1d3e2;
         border-radius: 0.35rem;
         transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
         }
         .tags-input-wrapper input{
         border: none;
         background: transparent;
         outline: none;
         width: 140px;
         margin-left: 8px;
         }
         .tags-input-wrapper .tag{
         display: inline-block;
         background-color: #767676;
         color: white;
         border-radius: 5px;
         padding: 0px 3px 0px 7px;
         margin-right: 5px;
         /* box-shadow: 0 5px 15px -2px rgba(250 , 14 , 126 , .7); */
         }
         .tags-input-wrapper .tag a {
         margin: 0 7px 3px;
         display: inline-block;
         cursor: pointer;
         }
         .ck-content{min-height:350px;}
      </style>
   </head>
   <body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">
         <!-- Sidebar -->
           <?php
			error_reporting(0);
		   include 'header.php'; 
		   include "config.php"; 
			

			$stmt = $dbh->query("SELECT * FROM projects WHERE projects.project_id='".@$_GET['id']."'");
			$row=$stmt->fetch();
			$name=$row['name'];
			$heading=$row['heading']; 
		    $short_description=$row['short_description']; 
		    $head_image=$row['head_image']; 
		    $project_data=$row['project_data']; 
		    $project_id=$row['project_id']; 
		    $project_type_id=$row['project_type_id']; 
		    $project_name_id=$row['project_name_id']; 
		    $project_status=$row['project_status']; 
		   $location=$row['location']; 
		   $date=$row['date']; 
		    $logo_image=$row['logo']; 
		   
		   
		   ?>
         <!-- End of Sidebar -->
         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
             
               <!-- End of Topbar -->
               <div class="container-fluid">
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                     <h1 class="h3 mb-0 text-gray-800">Add Project Work</h1>
                  </div>
                  <div class="row">
                     <!-- Area Chart -->
                     <div class="col-xl-9 col-lg-7">
                     </div>
                     <!-- Pie Chart -->
                     <div class="col-xl-12 col-lg-12" style="display:">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary"></h6>
                           </div>
                           <!-- Card Body -->
                           <div class="card-body">
                              <form method="POST" <?php if(@$_GET['id']){?>action="update/update_project_work.php"<?php }else{?>action="add/add_project_work.php"<?php }?>>
                                 <input type="hidden" name="project_id" value="<?php echo $project_id?>">
                                <div class="form-group">
									<span>HEAD IMAGE</span></br>
                                    <input type="file"  id="photo">
									<input type="hidden" name="thumbnail" class="get-photo"  value="<?php echo $head_image?>"></br>
									<b class="validation-image">Select an image as given ratio.</b> 
									
									<div class="uploaded_image">
									</div>
									<img src="./doc/<?php echo $head_image; ?>" class="img-thumbnail" style="height:150px; width:auto;" />
									<div id="response"></div>
                                </div>
								<div class="form-group">
									<span>Client Logo</span></br>
                                    <input type="file"  id="logo">
									<input type="hidden" name="thumbnail_logo" class="get-logo"  value="<?php echo $logo_image; ?>"></br>
									<b class="validation-logo">Select an logo as given ratio.</b> 
									
									<div class="uploaded_logo">
									</div>
									<img src="./doc/logo/<?php echo $logo_image; ?>" class="logo-thumbnail" style="height:150px; width:auto;" />
									<div id="response-logo"></div>
                                </div>
                                 <div class="form-group">
                                    <label for="usr"><strong>Project Title</strong></label>
                                    <input type="text" name="project_name" class="form-control" value="<?php echo $heading;?>" placeholder="Title" required />
                                 </div>
								 <div class="form-group">
                                    <label for="usr"><strong>Location </strong></label>
                                    <input type="text" name="location" class="form-control" value="<?php echo $location;?>" placeholder="Enter Project Location" required />
                                 </div>
                                 <div class="form-group">
                                    <label for="usr"><strong>Project Year </strong></label>
                                    <input type="text" name="date" class="form-control" value="<?php echo $date;?>" placeholder="2020 - 2023"  />
                                 </div>
								 <div class="form-group">
                                    <label for="usr"><strong>Project Type</strong></label>
                                  <select name="project_type_id" class="form-control" onchange="project_name1(this.value)">
									<option value="0">--Select--</option >
									<?php 
                                                $stmtprojecttype=$dbh->query("SELECT * FROM add_project_type");
                                                while ($rowprojecttype = $stmtprojecttype->fetch()){ 
                                                $projecttype_id=$rowprojecttype['project_type_id']; 
                                                ?>
									<option value="<?php echo $projecttype_id?>" <?php if($projecttype_id==$project_type_id){ echo 'selected'; }?>><?php echo $rowprojecttype['project_type']; ?></option >
									
												<?php } ?>
								  
								  </select>
                                 </div>
								 <div class="form-group">
                                    <label for="usr"><strong>Project Name</strong></label>
                                  <select name="project_name_id" id="project_name_id" class="form-control">
								  
								  <?php 
                                                $stmtprojectname=$dbh->query("SELECT * FROM `project_name` where id='".$project_name_id."'");
                                                while ($rowprojectname = $stmtprojectname->fetch()){ 
                                                $projectname_id=$rowprojectname['id']; 
                                                ?>
									<option value="<?php echo $projectname_id; ?>" selected><?php echo $rowprojectname["project_name"];?></option>			
												
												<?php }?>
								  
								  </select>
                                 </div>
								  <div class="form-group">
                                    <label for="usr"><strong>Project Status</strong></label>
                                  <select name="project_status"  class="form-control">
								    <option value="" >--select option--</option>
									<option value="1" <?php if($project_status==1){ echo 'selected'; }?>> Completed Projects</option >
									<option value="0" <?php if($project_status==0){ echo 'selected'; }?>>Projects in Progress</option >
								  </select>
                                 </div>
								 
                                 
                                  <div class="form-group">
                                    <label for="usr"><strong>Short Description About Project </strong></label>
                                   <textarea class="form-control" rows="4" maxlength="300" name="short-description" id="short-description"><?php echo $short_description;?></textarea>
								   <div id="the-count">
									<span id="current">0</span>
									<span id="maximum">/ 300</span>
								  </div>
                                 </div>
                                 
                                 <hr>
                                 <div class="form-group">
                                    <label for="usr"><strong>CONTENT</strong></label>
                                    <textarea id="editor" name="project_data" class="form-control" style="height:650px;" placeholder="Write Your Content Here" ><?php echo $project_data; ?></textarea>
                                 </div>
                                 <input type="submit" value="<?php if(@$_GET['id']){ echo 'Update'; }else{ echo 'Submit'; }?>" name="submit" style="width:100%;" class="btn btn-primary"/>
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
         $(document).ready(function(){

     var _URL = window.URL || window.webkitURL;
    $('#photo').change(function () {
           var file = $(this)[0].files[0];

           img = new Image();
           var imgwidth = 0;
           var imgheight = 0;
           var maxwidth = 1920;
           var maxheight = 1167;

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
							 $('.validation-image').hide();
							 $('.get-photo').attr("value",data);
							 $('.img-thumbnail').attr("src","doc/"+data);
						
							}
						   });
                  } else { 
				  
				  $("#response").text("Image size must be "+maxwidth+"X"+maxheight); }
           };
           

     }); });
	 
	  $(document).ready(function(){

     var _URL = window.URL || window.webkitURL;
    $('#logo').change(function () {
           var file = $(this)[0].files[0];

           img = new Image();
           var imgwidth = 0;
           var imgheight = 0;
           var maxwidth = 300;
           var maxheight = 300;

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
							 $('.logo-thumbnail').attr("src","doc/logo/"+data);
						
							}
						   });
                  } else { 
				  
				  $("#response-logo").text("Image size must be "+maxwidth+"X"+maxheight); }
           };
           

     });
	 });
         
      </script>
      <script>
         function MyCustomUploadAdapterPlugin( editor ) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                return new MyUploadAdapter( loader );
            };
         }
         ClassicEditor
         			.create( document.querySelector( '#editor' ), {
         	extraPlugins: [ MyCustomUploadAdapterPlugin ],
         				
         			toolbar: {
         				items: [
         					'heading',
         					'|',
         					'bold',
         					'italic',
         					'link',
         					'bulletedList',
         					'numberedList',
         					'|',
         					'outdent',
         					'indent',
         					'|',
         					'alignment',
         					'fontFamily',
         					'imageUpload',
         					'blockQuote',
         					'insertTable',
         					'mediaEmbed',
         					'undo',
         					'redo',
         					'code',
         					'htmlEmbed',
         					'specialCharacters'
         				]
         			},
         			language: 'en',
         			image: {
         				toolbar: [
         					'imageTextAlternative',
         					'imageStyle:inline',
         					'imageStyle:block',
         					'imageStyle:side'
         				]
         			},
         			table: {
         				contentToolbar: [
         					'tableColumn',
         					'tableRow',
         					'mergeTableCells'
         				]
         			},
         				mediaEmbed: {previewsInData: true},
         				licenseKey: '',
         				
         				
         				
         			} )
         			.then( editor => {
         				window.editor = editor;
         		
         				
         				
         				
         			} )
         			.catch( error => {
         				console.error( 'Oops, something went wrong!' );
         				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
         				console.warn( 'Build id: cribozb5127h-3owdj15imf8k' );
         				console.error( error );
         			} );
         	
         	
      </script>
      <script>
         class MyUploadAdapter {
             constructor(loader) {
                 this.loader = loader;
             }
         
             upload() {
                 return this.loader.file
                     .then(uploadedFile => {
                         return new Promise((resolve, reject) => {
                             const data = new FormData();
                             data.append('upload', uploadedFile);
                             $.ajax({
                                 url: 'ckeditor-image.php',
                                 type: 'POST',
                                 data: data,
                                 dataType: 'json',
                                 processData: false,
                                 contentType: false,
                                 success: response => {
                                     resolve({
                                         default: response.url
                                     });
                                 },
                                 error: () => {
                                     reject('Upload failed');
                                 }
                             });
                         });
                     });
             }
         
             abort() {
             }
         }
      </script>
	   <script>
	   function project_name1(project_type_id){
		   //alert(project_type_id);
		   
		   var url="fetch.php";
   
                    $.post(url,{"project_type_id":project_type_id,"action":"project_name"},function(data){
   						
   						$("#project_name_id").html(data);
   						
   				});
		   
	   }
	   </script>
	   <script>
	   $('#short-description').keyup(function() {
    
  var characterCount = $(this).val().length,
      current = $('#current'),
      maximum = $('#maximum'),
      theCount = $('#the-count');
    
  current.text(characterCount);
 
  
  /*This isn't entirely necessary, just playin around*/
  if (characterCount < 70) {
    current.css('color', '#666');
  }
  if (characterCount > 70 && characterCount < 90) {
    current.css('color', '#6d5555');
  }
  if (characterCount > 90 && characterCount < 100) {
    current.css('color', '#793535');
  }
  if (characterCount > 100 && characterCount < 120) {
    current.css('color', '#841c1c');
  }
  if (characterCount > 120 && characterCount < 139) {
    current.css('color', '#8f0001');
  }
  
  if (characterCount >= 140) {
    maximum.css('color', '#8f0001');
    current.css('color', '#8f0001');
    theCount.css('font-weight','bold');
  } else {
    maximum.css('color','#666');
    theCount.css('font-weight','normal');
  }
  
      
});
	   </script>
	  
     
   </body>
</html>