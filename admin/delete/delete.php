<?php
//Database Configuration File
include('../config.php');

if($_POST["action"]=="project_work_delete"){
	
$project_work_id=$_POST['project_work_id'];

$sql="DELETE FROM projects WHERE project_id='$project_work_id'";

$query = $dbh->prepare($sql);
$query->execute();
if($query)
{ echo "0";}else { echo "1"; }
}
elseif($_POST["action"]=="project_type_delete"){
	
$project_type_id=$_POST['project_type_id'];

$sql="DELETE FROM add_project_type WHERE project_type_id='$project_type_id'";

$query = $dbh->prepare($sql);
$query->execute();
if($query)
{ echo "0";}else { echo "1"; }
}
elseif($_POST["action"]=="delete_project_name"){
	
$project_name_id=$_POST['project_name_id'];

$sql="DELETE FROM project_name WHERE id='$project_name_id'";

$query = $dbh->prepare($sql);
$query->execute();
if($query)
{ 
$sql="DELETE FROM projects WHERE project_name_id='$project_name_id'";

$query = $dbh->prepare($sql);
$query->execute();
echo "0"; 

}
}elseif($_POST["action"]=="award_delete"){
	
$award_id=$_POST['award_id'];

$sql="DELETE FROM  award_tabel WHERE award_id='$award_id'";

$query = $dbh->prepare($sql);
$query->execute();


}
elseif($_POST["action"]=="certificatedelete"){
	
$certificate_id=$_POST['certificate_id'];

$sql="DELETE FROM  certificate_tabel WHERE certificate_id='$certificate_id'";

$query = $dbh->prepare($sql);
$query->execute();


}
?>