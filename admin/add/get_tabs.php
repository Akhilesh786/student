<?php

include("config.php");



$stmt=$dbh->query("SELECT a.*,b.work_title FROM `work_home_view`as a JOIN `work` as b ON a.`work_id`=b.`id` ORDER BY `a`.`position` ASC");

$tabs = array();
while ($result=$stmt->fetch()) {
  $tabs[] = $result;
}

header('Content-Type: application/json');
echo json_encode($tabs);
?>