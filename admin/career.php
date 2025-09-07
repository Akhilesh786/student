
<!DOCTYPE html>
<html lang="en">
   <head>
   
	  <base href="http://localhost/ksmb/admin/">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Add career</title>
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
      <link href="css/select2.min.css" rel="stylesheet">
      <style>
         .ck-content{min-height:350px;}
      </style>
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
               <!-- End of Topbar -->
               <div class="container-fluid">
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                     <h1 class="h3 mb-0 text-gray-800"><!-- heading--></h1>
                  </div>
                  <div class="row">
                     <!-- Area Chart -->
                     <div class="col-xl-9 col-lg-7">
                     </div>
                    
                     <div class="col-xl-12 col-lg-12" style="display:">
                        <div class="card shadow mb-4">
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">Career Information</h6>
                           </div>
                           <!-- Card Body -->
						   <?php 
									
									include 'config.php';
									
									
									$id=@$_GET["id"];
									if($id){
									$stmt = $dbh->prepare("SELECT * FROM career WHERE job_id=:id");
									$stmt->execute(['id' => $id]); 
									$row = $stmt->fetch();									
									}
									?>
						   
                           <div class="card-body">
                              <form method="POST" action="" id="add_career"> 
                                 <div class="form-group">
								 <input type="hidden" name="edit_key" value="<?php if($id){echo $id; }else{ echo '0'; }?>">
                                    <label for="usr"><strong>Job Type</strong></label>
                                    <input type="text" name="job_type" class="form-control" value="<?php if($id){ echo $row['job_type']; }?>" placeholder="Job Type" required />
                                 </div>
								 <div class="form-group">
                                    <label for="usr"><strong> Enter your Short Description (210 characters)</strong></label>
									<textarea name="Short_description" maxlength="210" class="form-control"  placeholder="Short Description" ><?php if($id){ echo $row['Short_description']; }?></textarea>
                                 </div>
								 <div class="form-group">
                                    <label for="usr"><strong>Experience</strong></label>
                                    <input type="text" name="experience" class="form-control" value="<?php if($id){ echo $row['experience']; }?>" placeholder="Enter Experience" required />
                                 </div>
                                 <div class="form-group">
                                    <label for="usr"><strong> Position</strong></label>
                                    <input type="text" name="postion" class="form-control" value="<?php if($id){ echo $row['position'];} ?>" placeholder="Enter Position"  />
                                 </div>
								 <div class="form-group">
                                    <label for="usr"><strong>Responsibilities</strong></label>
                                    <textarea id="editor" name="Responsibilities" class="form-control" style="height:650px;" placeholder="Write Responsibilities"  ><?php if($id){ echo $row['responsibilities']; } ?></textarea>
                                 </div>
                                 <div class="form-group">
                                    <label for="usr"><strong>Requirements</strong></label>
                                    <textarea id="editor1" name="Requirements" class="form-control" style="height:650px;" placeholder="Write Requirements"  ><?php if($id){ echo $row['requirements']; }?></textarea>
                                 </div>
                                 <div class="form-group">
                                    <label for="usr"><strong>Skills And Experience</strong></label>
                                    <textarea id="editor2" name="skills_and_Experience" class="form-control" style="height:650px;" placeholder="Skills And Experience"  ><?php if($id){ echo $row['skills_and_Experience'];} ?></textarea>
                                 </div>
                                <input type="submit" value="S U B M I T" name="submit" style="width:100%;" class="btn btn-primary"/>
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
                     <span>Copyright &copy; Your Website 2021</span>
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
      <script src="js/ckeditor.js"></script>
      
      <script>
         $(document).ready(function(){
           $('#add_career').submit(function(e) {
				e.preventDefault();
				$.ajax({
				   type: "POST",
				   url: './add/career.php',
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
         					
         					'undo',
         					'redo',
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
         function MyCustomUploadAdapterPlugin( editor ) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                return new MyUploadAdapter( loader );
            };
         }
         ClassicEditor
         			.create( document.querySelector( '#editor1' ), {
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
         					
         					'undo',
         					'redo',
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
         function MyCustomUploadAdapterPlugin( editor ) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                return new MyUploadAdapter( loader );
            };
         }
         ClassicEditor
         			.create( document.querySelector( '#editor2' ), {
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
         					
         					'undo',
         					'redo',
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
		
   </body>
</html>