<?php 

include "../config.php";
if(isset($_REQUEST)){ 

print_r($_POST);
$status=1;
$head_image=$_POST['thumbnail'];
$logo=$_POST['thumbnail_logo'];
$date=date("d-m-Y");
$heading=$_POST['project_name'];
$description=$_POST['description'];
$project_type_id=$_POST['project_type_id'];
$string= str_replace('','-',$heading);
$url=  preg_replace('/[^A-Za-z0-9\-]/', '',$string.'-'.$project_type_id); // Removes special chars.

$stmt = $dbh->prepare("INSERT INTO `project_name`(`project_type_id`, `project_name`, `image`, `status`, `description`,`url`,`date`,`logo`) VALUES (:project_type_id,:project_name,:image,:status,:description,:url,:date,:logo)");
  
 
 $stmt->bindParam(':project_type_id', $project_type_id);
 $stmt->bindparam(':project_name',$heading);
 $stmt->bindparam(':image', $head_image);
 $stmt->bindparam(':status', $status);
 $stmt->bindParam(':description', $description);
 $stmt->bindParam(':url', $url);
 $stmt->bindParam(':date', $date);
 $stmt->bindParam(':logo', $logo);
 $stmt->execute();
 $blog_id= $dbh->lastInsertId();
 


header('Location: ../project_dashboard');
die;
 }
 else
 {
 echo "Not Entered " ;
 echo $heading;
 echo "<br>";
 echo $short_description;
 echo "<br>";
 echo $date;
 }
 

 

 
 ?>