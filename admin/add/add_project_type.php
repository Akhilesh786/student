<?php
  session_start();
//Database Configuration File
include '../config.php' ;
$name=$_POST['name'];
$image=$_POST['thumbnail_logo'];
$description=$_POST['description'];
$status=1;

$string= str_replace('','-',$name);
$url=  preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

if(isset($_POST["project_type_id"])){

  $stmt = $dbh->prepare("UPDATE `add_project_type` SET`project_type`=:name,`status`=:status,`url`=:url,`image`=:image,`description`=:description WHERE  `project_type_id`=:project_type_id");
  
 $stmt->bindParam(':name', $name);
 $stmt->bindParam(':status', $status);
 $stmt->bindParam(':url', $url);
 
 $stmt->bindParam(':image', $image);
 $stmt->bindParam(':description', $description);
 $stmt->bindParam(':project_type_id', $_POST["project_type_id"]);
 $stmt->execute();
 header("Location: ../edit_project_type/".$_POST["project_type_id"]."");

}else{

$stmt = $dbh->prepare("INSERT INTO add_project_type (`project_type`,`status`,`url`,`image`, `description`)  
  VALUES (:name,:status,:url,:image,:description)");
  
 $stmt->bindParam(':name', $name);
 $stmt->bindParam(':status', $status);
 $stmt->bindParam(':url', $url);
 $stmt->bindParam(':image', $image);
 $stmt->bindParam(':description', $description);
 $stmt->execute();

header('Location: ../project_dashboard');
die;
}
?>