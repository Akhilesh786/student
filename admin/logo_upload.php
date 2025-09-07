<?php
//upload.php
if($_FILES["file"]["name"] != '')
{
 $extension=array("jpg","jpeg","png");
 $ext=pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
 if(in_array($ext,$extension)) {
 $name =time() . '_' . $_FILES["file"]["name"] ;
 $location = "../img/banner/".$name;  
 if( move_uploaded_file($_FILES["file"]["tmp_name"], $location)){

 echo $name;
}
 }
} 
?>