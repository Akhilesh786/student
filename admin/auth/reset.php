<?php 

include "config.php" ;




$password= $_POST['password'];
$c_pass=$_POST['cpassword'];
$key=$_POST['key'];


if($password==$c_pass){
$pass=password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));
date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
$time =  date("Y-m-d H:i:s");

 $stmt = $dbh->query("SELECT * FROM admin_user WHERE admin_user.reset_key='$key'");
 $row=$stmt->fetch();
 $row_count=$stmt->Rowcount();
 /* $key=$row['key_time']; */
 $valid_time=$row['key_time'];
$status=$row['key_status'];
 if($row_count==1){
	 
	 
	 if($status==0){
		 
		 if($time<=$valid_time){
	 
	
     $status_update='1';
$data=[	
		"status"=>$status_update,
		"password"=>$pass,
		"key"=>$key,
		
		];
		$sql="UPDATE `admin_user` SET  `key_status` =:status, `password`=:password WHERE `admin_user`.`reset_key` = :key";	
		$stmt= $dbh->prepare($sql);
					$stmt->execute($data);
					$count=$stmt->Rowcount();
					//$stmt->debugDumpParams();
					if($count==1){
					
				echo 'You have Successfully reset password.';
					}else{
						echo 'Please Try Again';
					}
		 }else{
			 
			 echo 'link session out.';
		 }			
					
					
	 }else{
		 
		 echo 'link expire.';
	 }				
					
	
 }else{
	 echo 'You have failed to reset password.';
	 
 }
}else{
	echo 'password not matched.';
}
?>