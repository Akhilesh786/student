<?php 

include 'config.php';

$id=$_GET['id']; 
$sql="DELETE FROM `career` WHERE `job_id` = '".$id."'";
$query = $dbh->prepare($sql);
$query->execute();
if($query)
{

header("location:career_list");

}

?>

