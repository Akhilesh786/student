<?php 
include '../config.php';

if(isset($_POST)){ 

//print_r($_POST);

$edit_key=$_POST["edit_key"];

 $job_type=$_POST['job_type'];
  $Short_description=$_POST['Short_description'];
  $experience=$_POST['experience'];
  $date=date('F j, Y');
  $postion=$_POST['postion'];
  $Responsibilities=$_POST['Responsibilities'];
  $Requirements=$_POST['Requirements'];
  $skills_and_Experience= $_POST['skills_and_Experience'];


if($edit_key==0){
	
$data=["job_type"=>$job_type,"postion"=>$postion,"Responsibilities"=>$Responsibilities,"Requirements"=>$Requirements,"skills_and_Experience"=>$skills_and_Experience,"Short_description"=>$Short_description,"experience"=>$experience,"date"=>$date];
$sql="INSERT INTO `career`( `job_type`, `position`, `responsibilities`, `requirements`, `skills_and_Experience`,`Short_description`,`experience`,`date`) VALUES (:job_type,:postion,:Responsibilities,:Requirements,:skills_and_Experience,:Short_description,:experience,:date)";
}
else{
$data=["job_type"=>$job_type,"postion"=>$postion,"Responsibilities"=>$Responsibilities,"Requirements"=>$Requirements,"skills_and_Experience"=>$skills_and_Experience,"edit_key"=>$edit_key,"Short_description"=>$Short_description,"experience"=>$experience];

$sql="UPDATE `career` SET `job_type`=:job_type,`position`=:postion,`responsibilities`=:Responsibilities,`requirements`=:Requirements,`skills_and_Experience`=:skills_and_Experience ,`Short_description`=:Short_description ,`experience`=:experience WHERE  `job_id`=:edit_key ";
}




					$stmt= $dbh->prepare($sql);
					$stmt->execute($data);
					$count= $stmt->Rowcount();		
					if($count){
						echo 'successfull';
					}



}

?>