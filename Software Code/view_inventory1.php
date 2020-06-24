<?php
session_start();
include "db.php";

if(!isset($_SESSION["economist_id"]))
{
 header("location:economist_login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
<title>View Inventory</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> View Inventory </h3> <br>
<div> <a href='add_inventory1.php' class='btnr'>Add New Inventory</a></div>
<br>
<?php
if(isset($_GET["mes"]))
{
echo"<div class='error'>{$_GET["mes"]}</div>";	
}
					
?>
<br>
<?php
$sql="SELECT * FROM software_inventory";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>Inventory ID</th>
 <th>Products Names</th>
 <th>Categories</th>
 <th>Description</th>
 <th>Unit Price</th>
 <th>Quantity in Stock</th>
 <th>Quantity ordered</th>
 <th>Quantity purchased</th>
 <th>Datetime</th>
 <th>Edit</th>
 <th>Delete</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$row["Inventory_id"]}</td>";
	echo "<td>{$row["Products_name"]}</td>";
	echo "<td>{$row["Categories_name"]}</td>";
	echo "<td>{$row["Description"]}</td>";
	echo "<td>{$row["Unit_price"]}</td>";
	echo "<td>{$row["Quantity_instock"]}</td>";
	echo "<td>{$row["Quantity_ordered"]}</td>";
	echo "<td>{$row["Quantity_purchased"]}</td>";
	echo "<td>{$row["Datetime"]}</td>";
	echo "<td><a href='edit_inventory1.php?id={$row["Inventory_id"]}'class='btnr'>Edit</a></td>";
	echo "<td><a href='delete_inventory.php?id={$row["Inventory_id"]}'class='btnr'>Delete</a></td>";
	echo "</tr>";
 }
 echo "</table>";
 }
else
 { 
     echo "<p class='error'> No inventory found</p>";
 }
 }
?>

</div>
<div class="navigation">
<?php 
include "economist_menu.php";
?>
</div>
<div class="footer">
</div>
</body> 
</html>