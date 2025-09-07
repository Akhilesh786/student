<?php
//Database Configuration File
include('../config.php');

//Getting Post Values
$blog_id=$_POST['blog-id'];
// Query for Insertion
$sql="DELETE FROM blog WHERE blog_id='$blog_id'";

$query = $dbh->prepare($sql);
$query->execute();
if($query)
{
header('Location: ../blog.php');
die;
}
else { echo "Could Not update"; }

echo $blog_id ;

?>