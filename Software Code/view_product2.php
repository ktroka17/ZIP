<?php
session_start();
include "db.php";

if(!isset($_SESSION["manager_id"]))
{
 header("location:manager_login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
<title>View Products</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> View Product Details </h3>
<div> <a href='add_product2.php' class='btnr'>Add New Product</a></div>
<?php
if(isset($_GET["mes"]))
{
echo"<div class='error'>{$_GET["mes"]}</div>";	
}
					
?>
<?php
$sql="SELECT * FROM software_product";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>Product ID</th>
 <th>Product Amount</th>
 <th>Product Price</th>
 <th>VAT</th>
 <th>Product Selling Price</th>
 <th>Product Points</th>
 <th>Product Keywords</th>
  <th>Product Image</th>
 <th>Delete Product</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$row["P_id"]}</td>";
	echo "<td>{$row["P_amount"]}</td>";
	echo "<td>{$row["P_price"]}</td>";
	echo "<td>{$row["Vat"]}</td>";
	echo "<td>{$row["P_sellingprice"]}</td>";
	echo "<td>{$row["P_points"]}</td>";
	echo "<td>{$row["product_keywords"]}</td>";
		echo "<td><img src='upload/".$row['name']."' width='75' height='100' ></td>";
	echo "<td><a href='delete_product.php?id={$row["P_id"]}'class='btnr'>Delete</a></td>";
	echo "</tr>";
 }
 echo "</table>";
 }
else
 { 
     echo "<p class='error'> No product found</p>";
 }
 }
?>

</div>
<div class="navigation">
<?php 
include "manager_menu.php";
?>
</div>
<div class="footer">
</div>
</body> 
</html>