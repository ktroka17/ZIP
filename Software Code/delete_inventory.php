<?php
	include "db.php";
	session_start();
	
	$sql="DELETE FROM software_inventory where Inventory_id={$_GET["id"]}";
	(mysqli_query($db,$sql));

	echo "<script>window.open('view_inventory.php?mes=Data Deleted','_self');</script>";

?>