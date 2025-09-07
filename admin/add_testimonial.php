<?php 
include 'config.php';

if(isset($_REQUEST)){ 

$name=$_POST['name'];
$postion=$_POST['postion'];
$content=$_POST['content'];
$thumbnail=$_POST['thumbnail'];


$data=["name"=>$name,"title"=>$postion,"content"=>$content,"thumbnail"=>$thumbnail];

$sql="INSERT INTO `testimonial`(`name`, `title`, `content`, `image`) VALUES (:name,:title,:content,:thumbnail)";
 $stmt= $dbh->prepare($sql);
					$stmt->execute($data);
					$count= $stmt->Rowcount();		
					if($count){
						echo 'successfull';
					}



}

?>