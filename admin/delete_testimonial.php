<?php 

include 'config.php';

 $id=$_GET['id']; 
$sql="DELETE FROM `testimonial` WHERE `id` = '".$id."'";

$query = $dbh->prepare($sql);
$query->execute();
if($query)
{

header("location:add_testimonial_list");

}

?>