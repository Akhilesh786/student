<?php
//Database Configuration File
include('../config.php');

//Getting Post Values
$case_study_id=$_POST['case-study-id'];
// Query for Insertion
$sql="DELETE FROM case_study WHERE case_study_id='$case_study_id'";

$query = $dbh->prepare($sql);
$query->execute();
if($query)
{
header('Location: ../case-study-listing');
die;
}
else { echo "Could Not update"; }

echo $case_study_id ;

?>