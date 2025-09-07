<?php
  session_start();
//Database Configuration File
include "../config.php" ; 

$id=$_POST['project_type_id'];

 $stmt = $dbh->query("DELETE FROM add_project_type WHERE add_project_type.project_type_id='$id'");
 
    $stmt->execute();

 header("Location: ../project_type");
die;

?>