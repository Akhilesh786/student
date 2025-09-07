<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>
	<base href="http://localhost/download-version/admin/">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Change Your Password?</h1>
                                        
                                    </div>
                                    <form class="user" id="resetform">
                                        <div class="form-group">
                                            <input type="text" name="password" class="form-control form-control-user"
                                                id="password" placeholder="Enter Password">
                                        </div>
										<div class="form-group">
                                            <input type="text" name="cpassword" class="form-control form-control-user"
                                                id="confirm" placeholder="Confirm Password.">
												<input type="hidden" name="key" value="<?php echo $_GET['key'];?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>
                                    </form>
									<hr>
										<p id="login-error" class="text-uppercase" style="color:red"></p></hr>
										<div class="text-center">
                                        <a class="small" href="login.php"> Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
	<script>
	$(document).ready(function() {
  $('#resetform').submit(function(e) {
    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'auth/reset.php',
       data: $(this).serialize(),
       success: function(data)
       {
		  alert(data);
          if (data == 11) {
            window.location = 'login.php';		
          }
          else {
			document.getElementById("password").value = "";
			document.getElementById("confirm").value = "";
             document.getElementById("login-error").innerHTML = data;
          }
       }
   });
 });
});
</script>

</body>

</html>