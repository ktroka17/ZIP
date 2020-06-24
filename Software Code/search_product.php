<?php
session_start();
include "db.php";

if(!isset($_SESSION["client_id"]))
{
 header("location:client_login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Search Product </h3>
<div class="center">

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<label> Enter Product Keywords </label>
<input type="text" name="product" required>
<button type="submit" name="submit" class="btnr">Search</button>
</form>
<?php
if(isset($_POST["submit"])) 
{

 $sql="SELECT * FROM software_product WHERE product_keywords like '%{$_POST["product"]}%'";
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
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<td>{$row["P_id"]}</td>";
	echo "<td>{$row["P_amount"]}</td>";
	echo "<td>{$row["P_price"]}</td>";
	echo "<td>{$row["Vat"]}</td>";
	echo "<td>{$row["P_sellingprice"]}</td>";
	echo "<td>{$row["P_points"]}</td>";
	echo "<td>{$row["product_keywords"]}</td>";
	echo "<td><img src='upload/".$row['name']."' width='75' height='100' ></td>";
	echo "</tr>";
	


 }
 echo "</table>";
 }
else
 { 
     echo "<p class='error'> No product found</p>";
 }
 }
}
?>
</div>
</div>
<div class="navigation">
<?php 
include "client_menu.php";
?>
</div>
<div class="footer">
</div>
</body> 
</html>