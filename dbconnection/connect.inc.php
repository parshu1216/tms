<?php
$conn_error = 'Could not connect to database';
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'tickets';

if (!@mysql_connect($mysql_host, $mysql_user, $mysql_pass))
{
die($conn_error);
}

mysql_select_db($mysql_db) ;


?>