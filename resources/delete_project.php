<?php
include '../dbconnection/connect.sqli.php';
$data=json_decode(file_get_contents("php://input"));
if(count($data)>0){
	$id=$data->project_id;
	$query="DELETE FROM `project` WHERE project_id='$id'";
	if(mysqli_query($connect,$query)){
		echo "Data deleted successfully";
	}else{
		echo "Failed";
	}
}
?>