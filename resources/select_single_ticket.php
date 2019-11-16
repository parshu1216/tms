<?php
include '../dbconnection/connect.sqli.php';
$data=json_decode(file_get_contents("php://input"));
$output=array();
if(count($data)>0){
$id=$data->ticket_id;
$query="SELECT * FROM `ticket` where `ticket_id` ='$id' ";
$result=mysqli_query($connect,$query);

if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_array($result))
	{
		$output[]=$row;
	}
	echo json_encode($output);
}
}
?>