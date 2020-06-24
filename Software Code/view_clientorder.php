<?php
session_start();
include "db.php";

if(!isset($_SESSION["admin_id"]))
{
 header("location:admin_login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
<title>View Client Orders</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> View Client Orders </h3>
<?php
if(isset($_GET["mes"]))
{
echo"<div class='error'>{$_GET["mes"]}</div>";	
}
					
?>
<?php
$sql="SELECT * FROM software_orders";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>Product Name</th>
 <th>Order ID</th>
 <th>Order Amount</th>
 <th>Order Location</th>
 <th>Ordere Date Shipped</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$row["product_name"]}</td>";
	echo "<td>{$row["Ord_id"]}</td>";
	echo "<td>{$row["Ord_amount"]}</td>";
	echo "<td>{$row["Ord_location"]}</td>";
	echo "<td>{$row["Ord_dateshipped"]}</td>";
	echo "</tr>";
 }
 echo "</table>";
 }
else
 { 
     echo "<p class='error'> No orders found</p>";
 }
 }
?>

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