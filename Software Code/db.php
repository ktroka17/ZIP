<?php
$mysql_hostname = "localhost";
$mysql_user = "spinari17";
$mysql_password = "sp708ari";
$mysql_database = "web18_spinari17";
$db=mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database);

if(!$db){
		die("Connection failed: ".mysqli_connect_error());
	}
?>