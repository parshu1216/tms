<?php
include '../dbconnection/connect.sqli.php';
$output=array();
$query="SELECT * FROM `ticket` order by ticket_id desc  ";
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