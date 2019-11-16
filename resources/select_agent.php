<?php
include '../dbconnection/connect.sqli.php';
$output=array();
$query="SELECT * FROM `login_info` where `type` = 'agent'";
$result=mysqli_query($connect,$query);

if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_array($result))
	{
		$output[]=$row;
	}
	echo json_encode($output);
}

?>