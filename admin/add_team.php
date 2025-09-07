<?php 
include 'config.php';

if(isset($_REQUEST)){ 

$name=$_POST['name'];
$postion=$_POST['postion'];
$content=$_POST['content'];
$facebook=$_POST['facebook'];
$twitter=$_POST['twitter'];
$linkedin=$_POST['linkedin'];



if(isset($_POST["member_id"])){
	
	 $member_id=$_POST["member_id"];  
	$data=["name"=>$name,"title"=>$postion,"content"=>$content,"facebook"=>$facebook,"twitter"=>$twitter,"linkedin"=>$linkedin,"member_id"=>$member_id ];

			$sql="UPDATE `team_member` SET `name`=:name,`postion`=:title,`description`=:content,`facebook`=:facebook,`twitter`=:twitter,`linkedin`=:linkedin WHERE `member_id`=:member_id";
			
			$stmt= $dbh->prepare($sql);
			$stmt->execute($data);
			$count= $stmt->Rowcount();		
			if($count){
				echo 'successfull';
			}
			}
			else{
				$data=["name"=>$name,"title"=>$postion,"content"=>$content,"facebook"=>$facebook,"twitter"=>$twitter,"linkedin"=>$linkedin];

				$sql="INSERT INTO `team_member`(`name`, `postion`, `description`,`facebook`,`twitter`,`linkedin`) VALUES (:name,:title,:content,:facebook,:twitter,:linkedin)";
				
				$stmt= $dbh->prepare($sql);
				$stmt->execute($data);
				$count= $stmt->Rowcount();		
				if($count){
					echo 'successfull';
				}
			}




}

?>