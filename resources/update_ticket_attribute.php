<?php
include '../dbconnection/connect.sqli.php';
$data=json_decode(file_get_contents("php://input"));
if(count($data)>0){
	 session_start();
	$id=$data->ticket_id;
	$btn= $data->btn;
	 $ticket_updated_by = $_SESSION['sess_user'];
	if ($btn == 'Title') {
		$ticket_title = $data->ticket_title;
		$query="UPDATE `ticket` SET `ticket_title`='$ticket_title',`ticket_updated_at`=CURRENT_TIMESTAMP(),`ticket_updated_by`='$ticket_updated_by' WHERE ticket_id='$id'";
	if(mysqli_query($connect,$query)){
		echo "Data Updated successfully";
	}else{
		echo "Failed";
	}
	}
		if ($btn == 'Description') {
			$ticket_description= $data->ticket_description;
		$query="UPDATE `ticket` SET `ticket_description`='$ticket_description',`ticket_updated_at`=CURRENT_TIMESTAMP(),`ticket_updated_by`='$ticket_updated_by' WHERE ticket_id='$id'";
	if(mysqli_query($connect,$query)){
		echo "Data Updated successfully";
	}else{
		echo "Failed";
	}
	}
	if ($btn == 'assigned_to') {
			$assigned_to= $data->assigned_to;
		$query="UPDATE `ticket` SET `ticket_assigned_to`='$assigned_to',`ticket_updated_at`=CURRENT_TIMESTAMP(),`ticket_updated_by`='$ticket_updated_by' WHERE ticket_id='$id'";
	if(mysqli_query($connect,$query)){
		echo "Data Updated successfully";
	}else{
		echo "Failed";
	}
	}
	if ($btn == 'status') {
			$ticket_status= $data->ticket_status;
		$query="UPDATE `ticket` SET `ticket_status`='$ticket_status',`ticket_updated_at`=CURRENT_TIMESTAMP(),`ticket_updated_by`='$ticket_updated_by' WHERE ticket_id='$id'";
	if(mysqli_query($connect,$query)){
		echo "Data Updated successfully";
	}else{
		echo "Failed";
	}
	}
	if ($btn == 'ticket_type') {
			$ticket_type= $data->ticket_type[0];
			$ticket_icon= $data->ticket_icon[0];
		$query="UPDATE `ticket` SET `ticket_type`='$ticket_type',`ticket_icon`='$ticket_icon',`ticket_updated_at`=CURRENT_TIMESTAMP(),`ticket_updated_by`='$ticket_updated_by'  WHERE ticket_id='$id'";
	if(mysqli_query($connect,$query)){
		echo "Data Updated successfully";
	}else{
		echo "Failed";
	}
	}
	



}
?>