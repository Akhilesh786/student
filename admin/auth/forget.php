<?php 

include "config.php" ;

$baseurl="http://localhost/download-version/admin/";

$email= $_POST['email'];
$phone='0123456789';
date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

 $stmt = $dbh->query("SELECT * FROM admin_user WHERE admin_user.email='$email' ");
 $row=$stmt->fetch();
 $row_count=$stmt->Rowcount();
 $user_id=$row['user_id'];
 
 if($row_count==1){
	 $str=rand();
    $string = md5($str);
	 
	 md5($email.$phone.$string);
	 
	$key= hash('sha256', $email.$phone.$string);
	 $time =  date("Y-m-d H:i:s", strtotime('+5 minutes'));
     $status='0';
	 $data=[	"user_id"=>$user_id,
		"key"=>$key,
		"status"=>$status,
		"time"=>$time,
		
		];
		$sql="UPDATE `admin_user` SET `reset_key` =:key, `key_status` =:status, `key_time` = :time WHERE `admin_user`.`user_id` = :user_id;";	
		$stmt= $dbh->prepare($sql);
					$stmt->execute($data);
				$stmt->Rowcount();
					
					print $link=$baseurl.'reset/'.$key;
					
						$to = $email;
						$subject = "Reset password";
						$txt = $link;
						$headers = "From: no-reply@gmail.com";

					$retval=mail($to,$subject,$txt,$headers);
						if( $retval == true ) {
            echo "Mail sent successfully...";
			
         }else {
            echo "Mail could not be sent...";
			
         }					
					
	
 }else{
	 echo 'You Enter Incorrect Email.';
	 
 }

?>