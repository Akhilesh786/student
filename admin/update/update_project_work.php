<?php 

include "../config.php";
if(isset($_REQUEST)){ 

$name="KSMB";
$head_image=$_POST['thumbnail'];
$project_id=$_POST['project_id'];
$logo=$_POST['thumbnail_logo'];
$heading=$_POST['project_name'];
$project_type_id=$_POST['project_type_id'];
$project_name_id=$_POST["project_name_id"];
$project_status=$_POST["project_status"];
$short_description=$_POST['short-description'];
$project_data=$_POST['project_data'];
$string= str_replace('','-',$heading);
$url=  preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
$date=$_POST["date"];
$location=$_POST["location"];

$stmt = $dbh->prepare("UPDATE `projects` SET `project_type_id`=:project_type_id,`project_name_id`=:project_name_id,`head_image`=:head_image,`name`=:name,`heading`=:heading,`short_description`=:short_description,`project_data`=:project_data,`url`=:url,`date`=:date,`project_status`=:project_status ,`location`=:location,`logo`=:logo WHERE `project_id`=:project_id");
  
 
 $stmt->bindParam(':project_type_id', $project_type_id);
 $stmt->bindParam(':project_name_id', $project_name_id);
 $stmt->bindparam(':head_image', $head_image);
 $stmt->bindparam(':name', $name);
 $stmt->bindparam(':heading',$heading);
 $stmt->bindparam(':short_description',$short_description);
 $stmt->bindparam(':project_data',$project_data);
 $stmt->bindParam(':url', $url); 
 $stmt->bindParam(':date', $date);
 $stmt->bindparam(':project_status', $project_status);
 $stmt->bindparam(':location', $location);
 $stmt->bindparam(':project_id', $project_id);
 $stmt->bindparam(':logo', $logo);
 

 $stmt->execute();
 


header('Location: ../add-project-work/'.$project_id.'');
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