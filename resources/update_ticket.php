 <?php
 include '../dbconnection/connect.inc.php';
 if (isset($_POST['btnName'])) {

            //$author = $_POST['author'];
  $btnName = $_POST['btnName'];
    $ticket_type = $_POST['ticket_type'];
     $ticket_icon = $_POST['ticket_icon'];
  $ticket_title = $_POST['ticket_title'];
  $ticket_description = $_POST['ticket_description'];
   $ticket_assigned_to = $_POST['ticket_assigned_to'];
   $ticket_status = $_POST['ticket_status'];
    $ticket_updated_by = $_POST['ticket_updated_by'];
   
   
  //$ticket_updated_at=CURRENT_TIMESTAMP();
 if ($btnName=='ADD') {
       
          $id=$_POST['id'];
          $query="UPDATE `ticket` SET `ticket_title`='$ticket_title',`ticket_type`='$ticket_type',`ticket_icon`='$ticket_icon', `ticket_description`='$ticket_description',`ticket_assigned_to`='$ticket_assigned_to',`ticket_status`='$ticket_status',`ticket_updated_by`='$ticket_updated_by',`ticket_updated_at`=CURRENT_TIMESTAMP() WHERE `ticket_id` = '$id'";

          if(mysql_query($query))
          {
           header("location:../view_all_tickets.php");
           echo "Data Updated..";
         }else{
          echo 'Error';
        }
      
    }

      if ($btnName=='Update') {
       
          $id=$_POST['id'];
         $query="UPDATE `ticket` SET `ticket_title`='$ticket_title',`ticket_type`='$ticket_type',`ticket_icon`='$ticket_icon', `ticket_description`='$ticket_description',`ticket_assigned_to`='$ticket_assigned_to',`ticket_status`='$ticket_status',`ticket_updated_by`='$ticket_updated_by',`ticket_updated_at`=CURRENT_TIMESTAMP() WHERE `ticket_id` = '$id'";

          if(mysql_query($query))
          {
            header("location:../view_all_tickets.php");
           echo "Data Updated..";
         }else{
          echo 'Error';
        }
      
    }

  


}

?>
