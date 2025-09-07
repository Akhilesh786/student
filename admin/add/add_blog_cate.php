<?php
  session_start();
//Database Configuration File
include '../config.php' ;
$name=$_POST['name'];
$blog_cate_slug = str_replace(' ', '', $name);

$stmt = $dbh->prepare("INSERT INTO blog_cate (blog_cate_name,blog_cate_slug)  
  VALUES (:name,:blog_cate_slug)");
  
 $stmt->bindParam(':name', $name);
 $stmt->bindParam(':blog_cate_slug', $blog_cate_slug);
 $stmt->execute();

header('Location: ../blog.php');
die;
?>