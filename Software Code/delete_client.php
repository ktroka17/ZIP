<?php
	include "db.php";
	session_start();
	
	$sql="DELETE FROM software_client where client_id={$_GET["id"]}";
	(mysqli_query($db,$sql));

	echo "<script>window.open('view_client.php?mes=Data Deleted','_self');</script>";

?>

