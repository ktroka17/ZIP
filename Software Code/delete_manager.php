<?php
	include "db.php";
	session_start();
	
	$sql="DELETE FROM software_manager where manager_id={$_GET["id"]}";
	(mysqli_query($db,$sql));

	echo "<script>window.open('view_employee.php?mes=Data Deleted','_self');</script>";

?>