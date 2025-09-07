<?php

include('config.php');

 $certificate_name=$_POST["certificate_name"];



$error=array();
$extension=array("PDF","pdf");
foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
    $file_name=$_FILES["files"]["name"][$key];
    $file_tmp=$_FILES["files"]["tmp_name"][$key];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);

    if(in_array($ext,$extension)) {
        if(!file_exists("../upload/award/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../upload/award/".$file_name);
			
			$stmt = $dbh->prepare("INSERT INTO `certificate_tabel`(`certificate_name`, `document`) VALUES(:certificate_name,:document)");
			$stmt->bindParam(':document', $file_name);
			$stmt->bindParam(':certificate_name', $certificate_name);
			$stmt->execute();
			echo $dbh->lastInsertId();
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../upload/award/".$newFileName);
			$stmt = $dbh->prepare("INSERT INTO `certificate_tabel`(`certificate_name`, `document`) VALUES(:certificate_name,:document)");
			$stmt->bindParam(':document', $newFileName);
			$stmt->bindParam(':certificate_name', $certificate_name);
			$stmt->execute();
			echo $dbh->lastInsertId();
			 
        }
    }
}



?>