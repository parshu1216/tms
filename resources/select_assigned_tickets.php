<?php
include '../dbconnection/connect.sqli.php';
session_start();
$name=$_SESSION['sess_user'];
           
$output=array();
$query="SELECT * FROM `ticket` where ticket_assigned_to = '$name' order by ticket_id desc   ";
$result=mysqli_query($connect,$query);

if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		$output[]=$row;
	}
	echo json_encode($output);
}

?>