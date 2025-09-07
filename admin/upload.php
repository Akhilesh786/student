<?php

include('config.php');

 $gallery_type=$_POST["gallery_type"];
 $title=$_POST["title"];

if($gallery_type==1){

$error=array();
$extension=array("jpeg","jpg","png","gif","JPG","PNG","JPEG");
foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
    $file_name=$_FILES["files"]["name"][$key];
    $file_tmp=$_FILES["files"]["tmp_name"][$key];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);

    if(in_array($ext,$extension)) {
        if(!file_exists("../upload/media/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../upload/media/".$file_name);
			
			$stmt = $dbh->prepare("INSERT INTO `media_gallery`(`image`,`title`) VALUES (:image,:title)");
			$stmt->bindParam(':image', $file_name);
			$stmt->bindParam(':title', $title);
			 $stmt->execute();
			 echo $gallery_type;
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../upload/media/".$newFileName);
			$stmt = $dbh->prepare("INSERT INTO `media_gallery`(`image`,`title`) VALUES (:image,:title)");
			$stmt->bindParam(':image', $newFileName);
            $stmt->bindParam(':title', $title);
			 $stmt->execute();
			 echo $gallery_type;
        }
    }
    /* else {
        array_push($error,"$file_name, ");
    } */
}

}else{
	$error=array();
$extension=array("jpeg","jpg","png","gif");
foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
    $file_name=$_FILES["files"]["name"][$key];
    $file_tmp=$_FILES["files"]["tmp_name"][$key]; 
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);

    if(in_array($ext,$extension)) {
        if(!file_exists("../upload/media/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../upload/media/".$file_name);
			
			$stmt = $dbh->prepare("INSERT INTO `project_gallery`(`image`,`title`) VALUES (:image,:title)");
			$stmt->bindParam(':image', $file_name);
            $stmt->bindParam(':title', $title);
			 $stmt->execute();
			 echo $gallery_type;
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../upload/media/".$newFileName);
			$stmt = $dbh->prepare("INSERT INTO `project_gallery`(`image`,`title`) VALUES (:image,:title)");
			$stmt->bindParam(':image', $newFileName);
            $stmt->bindParam(':title', $title);
			 $stmt->execute();
			 echo $gallery_type;
        }
    }
    /* else {
        array_push($error,"$file_name, ");
    } */
}

}

?>