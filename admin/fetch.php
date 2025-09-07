<?php 
   include "config.php";
   
   if($_POST["action"]=="project_name"){

      
   	
   	$project_type_id=$_POST["project_type_id"];
     /* if($_POST["project_type_id"]==2){
   													
         echo $data='<option value="0" >Real Estate</option>';
         exit;
         }*/
   	$stmtprojectname=$dbh->query("SELECT * FROM `project_name` WHERE `project_type_id`='".$project_type_id."'");
   	
   												
                                                   while ($rowprojectname = $stmtprojectname->fetch()){ 
   												
   												echo $data='<option value="'.$rowprojectname["id"].'" >'.$rowprojectname["project_name"].'</option>';
   												
   												}
   												//echo $data;
   	
   	
   }if($_POST["action"]=="fetch_gallery"){
   	
   	$gallery_type=$_POST["gallery_type"];
   	
   	if($gallery_type==0){
   	$stmt=$dbh->query("SELECT * FROM `project_gallery` ORDER BY `project_gallery`.`id` DESC");
   												$sr=0;
   												$data='<div class="card-body" ><div class="table-responsive" ><table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><thead><tr><th>Sr. No.</th> <th>Image</th> <th>Action</th> </tr></thead>';
                                                   while ($row = $stmt->fetch()){ 
   												$sr++;
   												 $data.='<tbody id=""><tr><td>'.$sr.'</td><td><img src="../upload/media/'.$row['image'].'" style="width:300px" ></td><td><a class="btn btn-danger" href="'. $row['id'].'">Delete</a></td></tr></tbody>';
   												
   												}
   												$data.='</table></div></div>';
   												echo $data;
   	
   	}else{
   		$stmt=$dbh->query("SELECT * FROM `media_gallery` ORDER BY `media_gallery`.`id` DESC");
                                                   $sr=0;
                                                   while ($row = $stmt->fetch()){ 
   												$sr++;
   												echo $data='<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><thead><tr><th>Sr. No.</th> <th>Image</th> <th>Action</th> </tr></thead><tbody id=""><tr><td>'.$sr.'</td><td><img src="../upload/media/'.$row['image'].'" style="width:300px" ></td><td><a class="btn btn-danger" href="'. $row['id'].'">Delete</a></td></tr></tbody></table>';
   												
   												}
   	}
   }if($_POST["action"]=="project_work"){
   	
   	$project_work_id=$_POST["project_work_id"];
   	$stmtprojectname=$dbh->query("SELECT * FROM `projects` WHERE `project_name_id`='".$project_work_id."'");
                                                   while ($rowprojectname = $stmtprojectname->fetch()){ 
   												
   												echo $data='<option value="'.$rowprojectname["project_id"].'" >'.$rowprojectname["heading"].'</option>';
   												
   												}
   												//echo $data;
   	
   	
   }if($_POST["action"]=="select_featured_project"){
   	
   	$project_search=$_POST["project_search"];
   	
   	$stmt_check=$dbh->query("SELECT * FROM projects where is_featured='1'");
   	 $row_check=$stmt_check->rowCount();
   	  
   	if($row_check < 10){
   	$stmt=$dbh->query("SELECT * FROM `projects`WHERE `heading` LIKE '%".$project_search."%' AND `is_featured`=0; ");					
   											while ($row = $stmt->fetch()) {   
                                   
                               echo  '<div class="card mb-4 blog">
                                    <img class="card-img-top" src="./doc/'.$row["head_image"].'" alt="Card image cap" style="display:non; max-width:450px;">   <img class="card-img-top" src="./doc/logo/'.$row["logo"].'" alt="Card image cap" style="display:non; max-width:100px;">   
                                    <div class="card-body">
                                       <h2 class="card-title blog-title text-capitalize">
                                       '.$row["heading"].'
                                       </h2>
                                       <hr style="height:1px;">
                                       <p class="card-text blog-content">
                                          '.$row["short_description"].'
                                       </p>
                                       <div style="display:flex;">
                                          <a href="add-feature-project-home/'.$row["project_id"].'" class="blog-link btn btn-primary ">Add in list &rarr;</a>	
                                         
                                       </div>
                                    </div>
                                    <div class="card-footer text-muted blog-date">    
                                       Posted on <strong>'.$row['date'].'</strong>  
                                       
                                    </div>
                                 </div>';
                                  } 
   		}else{
   			echo $row_check;
   		}
   	
   }if($_POST["action"]=="fetch_featured_project"){
   	
   	
   	$stmt=$dbh->query("SELECT * FROM `projects`WHERE `is_featured`=1; ");					
   											while ($row = $stmt->fetch()) {   
                                   
                               echo  '<div class="card mb-4 blog">
                                    <img class="card-img-top" src="./doc/'.$row["head_image"].'" alt="Card image cap" style="display:non; max-width:450px;">   <img class="card-img-top" src="./doc/logo/'.$row["logo"].'" alt="Card image cap" style="display:non; max-width:100px;">   
                                    <div class="card-body">
                                       <h2 class="card-title blog-title text-capitalize">
                                       '.$row["heading"].'
                                       </h2>
                                       <hr style="height:1px;">
                                       <p class="card-text blog-content">
                                          '.$row["short_description"].'
                                       </p>
                                       <div style="display:flex;">
                                          <a href="add-feature-project-home.php?project_id='.$row["project_id"].'&action=remove" class="blog-link btn btn-danger ">Remove From list &rarr;</a>	
                                         
                                       </div>
                                    </div>
                                    <div class="card-footer text-muted blog-date">    
                                       Posted on <strong>'.$row['date'].'</strong>  
                                       
                                    </div>
                                 </div>';
                                  } 
   		
   	
   }
   
   
   
   ?>