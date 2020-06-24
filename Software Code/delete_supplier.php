<?php
	include "db.php";
	session_start();
	
	$sql="DELETE FROM software_suppliers where Supplier_id={$_GET["id"]}";
	(mysqli_query($db,$sql));

	echo "<script>window.open('view_supplier.php?mes=Data Deleted','_self');</script>";

?>