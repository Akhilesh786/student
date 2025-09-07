<?php 

include "../config.php";
if(isset($_REQUEST)){ 

print_r($_POST);
$head_image=$_POST['thumbnail'];
$name=$_POST['name'];
$date=date("d-m-Y");
$heading=$_POST['case_study'];
$short_description=$_POST['short-description'];
$case_study=$_POST["content"];
$string= str_replace('','-',$case_study_title);
$url=  preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

$stmt = $dbh->prepare("INSERT INTO `case_study`(`head_image`,`name`,`heading`,`short_description`,`case_study`,`url`,`date`)
  VALUES (:head_image, :name, :heading, :short_description, :case_study,:url,:date)");
  
 
 $stmt->bindParam(':head_image', $head_image);
 $stmt->bindparam(':name',$name);
 $stmt->bindParam(':heading', $heading);
 $stmt->bindparam(':short_description', $short_description);
 $stmt->bindParam(':case_study', $case_study);
 $stmt->bindParam(':url', $url);
 $stmt->bindParam(':date', $date);
 $stmt->execute();
 $blog_id= $dbh->lastInsertId();
 


header('Location: ../case-study');
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