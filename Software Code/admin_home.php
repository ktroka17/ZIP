<?php
session_start();
include "db.php";
function countRecord($sql,$db)
{
	$res=mysqli_query($db,$sql);
	return mysqli_num_rows($res);
}
if(!isset($_SESSION["admin_id"]))
{
 header("location:admin_login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Admin Home</title>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Welcome Admin </h3>
<div class="center">
<ul class="record">
<li>Total Clients : <?php echo countRecord ("select * from software_client",$db);?> </li>
<li>Total Employees : <?php echo countRecord ("select * from software_employee",$db);?></li>
<li>Total Products : <?php echo countRecord ("select * from software_product",$db);?></li>
<li>Total Suppliers : <?php echo countRecord ("select * from software_suppliers",$db);?></li>
<li>Total Client Orders: <?php echo countRecord ("select * from software_orders",$db);?></li>
<li>Total Purchases : <?php echo countRecord ("select * from software_purchases",$db);?></li>
</ul>
		
</div>
</div>
<div class="navigation">
<?php 
include "admin_menu.php";
?>
</div>
<div class="footer">
</div>
</body> 
</html>