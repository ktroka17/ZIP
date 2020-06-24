<?php
	include "db.php";
	session_start();
	
	$sql="DELETE FROM software_product where P_id={$_GET["id"]}";
	(mysqli_query($db,$sql));

	echo "<script>window.open('view_product.php?mes=Data Deleted','_self');</script>";

?>