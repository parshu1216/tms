<?php
include '../dbconnection/connect.inc.php';
$data=json_decode(file_get_contents("php://input"));
if(count($data)>0)
{
 session_start();
 $project_name=$data->project_name[0];
 $ticket_title=$data->ticket_title;
 $ticket_type=$data->ticket_type[0];
  $ticket_icon=$data->ticket_icon[0];
 $ticket_description=$data->ticket_description;
 $ticket_assigned_to=$data->ticket_assigned_to[0];
 $btnName=$data->btnName;
 $ticket_created_by = $_SESSION['sess_user'];
 $ticket_status = "To-Do";


      //$attachment_url= "uploads/home_slider/".$filename;
      //$ticket_created_at = date("Y-m-d H:i:s");
       /*$img = $_FILES['image']['name'];
       $filename = addslashes(($_FILES['image']['name']));
       $tmpname = addslashes(file_get_contents($_FILES['image']['tmp_name']));
       $filetype = addslashes($_FILES['image']['type']);
       $array = array('jpg','jpeg','png');
       $ext = pathinfo($filename, PATHINFO_EXTENSION);*/
       
       

                    //$insert ="INSERT INTO `images`(`name`, `image`, `description`) VALUES ('$filename','$tmpname','$description')";
       if($btnName=="ADD")
       {
        $insert ="INSERT INTO `ticket`(`project_name`,`ticket_type`,`ticket_icon`, `ticket_title`, `ticket_description`, `ticket_assigned_to`,`ticket_status`,`ticket_created_by`, `ticket_created_at`) VALUES ('$project_name','$ticket_type','$ticket_icon','$ticket_title','$ticket_description','$ticket_assigned_to','$ticket_status','$ticket_created_by',CURRENT_TIMESTAMP())";
        if (mysql_query($insert)) {
          $last_id = mysql_insert_id();
            //echo $last_id;
          $query="SELECT * FROM `project` where `project_name` ='$project_name' ";
          if ($res=mysql_query($query)) {

            while ($data=mysql_fetch_array($res)) {
              $prefix=$data['project_short_name'];

              if ($last_id==!NULL) {
                $ticket_number = $prefix.'-'.$last_id;
                    //echo $ticket_number;
                $query2 ="UPDATE `ticket` SET `ticket_number`='$ticket_number' WHERE `ticket_id` = '$last_id'";
                if (mysql_query($query2)) {
                  echo "Ticket Added Succesfully";

                }  else{
                  echo "Error";
                }

              }


            }

          }

        }

      }
    }

    ?>