<?php 

session_start();
include 'config.php';
if(isset($_POST['email']) and isset($_POST['password'])) {
	$msg = ""; 
 $email = trim($_POST['email']);
 $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
  if($email != "" ) {
    try {
		
      $query = "select * from `admin_user` where `email`=:email";
      $stmt = $dbh->prepare($query);
      $stmt->bindParam('email', $email, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
	  
	  $validPassword = password_verify($passwordAttempt, $row['password']);
      if($validPassword) {
      
       $_SESSION['id']   = $row['user_id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
       
       echo 'successfull';
      } else {
       echo $msg = "Invalid email or password!";
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
   echo $msg = "Both fields are required!";
  }
  
}
?>