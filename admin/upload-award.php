<?php

include('config.php');

 $award_name=$_POST["award_name"];
 $award_description=$_POST["award_description"];



$error=array();
$extension=array("jpeg","jpg","png","gif");
foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
    $file_name=$_FILES["files"]["name"][$key];
    $file_tmp=$_FILES["files"]["tmp_name"][$key];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);

    if(in_array($ext,$extension)) {
        if(!file_exists("../upload/award/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../upload/award/".$file_name);
			
			$stmt = $dbh->prepare("INSERT INTO `award_tabel`(`award_name`,`image`,`award_description`) VALUES (:award_name,:image,:award_description)");
			$stmt->bindParam(':image', $file_name);
			$stmt->bindParam(':award_name', $award_name);
			$stmt->bindParam(':award_description', $award_description);
			$stmt->execute();
			echo $dbh->lastInsertId();
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../upload/award/".$newFileName);
			$stmt = $dbh->prepare("INSERT INTO `award_tabel`(`award_name`,`image`,`award_description`) VALUES (:award_name,:image,:award_description)");
			$stmt->bindParam(':award_name', $award_name);
			$stmt->bindParam(':image', $newFileName);
			$stmt->bindParam(':award_description', $award_description);
			 $stmt->execute();
			 echo $dbh->lastInsertId();
			 
        }
    }
}



?>