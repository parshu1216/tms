 <?php
include '../dbconnection/connect.inc.php';
$data=json_decode(file_get_contents("php://input"));
if(count($data)>0)
{
   $btnName=$data->btnName;
  $project_name = $data->project_name;
  $project_short_name = $data->project_short_name;

      if($btnName=="ADD")
      {
         $insert ="INSERT INTO `project`(`project_name`, `project_short_name`, `project_start_date`) VALUES ('$project_name','$project_short_name',CURRENT_TIMESTAMP())";
        if ( mysql_query($insert)) {
/*          header("location:add_project.php");
*/          echo "Project Added Succesfully";
              }
      } 
      if ($btnName=='Update') {
       
          $id=$data->id;
          $query="UPDATE `project` SET `project_name`='$project_name',`project_short_name`='$project_short_name' WHERE `project_id` = '$id'";

          if(mysql_query($query))
          {
           echo "Project Updated Succesfully";
         }else{
          echo 'Error';
        }
      
    }

  


}

?>
