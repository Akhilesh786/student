<?php
session_start();

if($_SESSION['id']==0)
{
header('location:login.php');
}

?>