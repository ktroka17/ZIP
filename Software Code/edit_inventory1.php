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
<title>Edit Inventory</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Edit Inventory </h3>
<div class="center">
<?php 

if (isset($_POST['save'])) { 

$sql="UPDATE software_inventory SET Products_name='{$_POST["Products_name"]}',Categories_name='{$_POST["Categories_name"]}',Description='{$_POST["Description"]}',Unit_price='{$_POST["Unit_price"]}',Quantity_instock='{$_POST["Quantity_instock"]}',Quantity_ordered='{$_POST["Quantity_ordered"]}',Quantity_purchased='{$_POST["Quantity_purchased"]}',Datetime='{$_POST["Datetime"]}'";
  (mysqli_query($db,$sql));
}

if(isset($id)){
	$db=mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database);
	$res=mysqli_query($db,"select * from software_inventory where Inventory_id={$_GET["id"]}");
	$row=mysqli_fetch_assoc($res);
	$Products_name=$row['Products_name']; 
	$Categories_name=$row['Categories_name']; 
	$Description=$row['Description'];
	$Unit_price=$row['Unit_price']; 
	$Quantity_instock=$row['Quantity_instock'];
	$Quantity_ordered=$row['Quantity_ordered'];
	$Quantity_purchased=$row['Quantity_purchased'];
	$Datetime=$row['Datetime'];
}  
  
  
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data"> 
<label> Products Names </label>
<input type="text" name="Products_name">
<label> Categories Names </label>
<input type="text" name="Categories_name">
<label> Description </label>
<input type="text" name="Description">
<label> Unit Price </label>
<input type="text" name="Unit_price">
<label> Quantity in Stock </label>
<input type="text" name="Quantity_instock">
<label> Quantity Ordered </label>
<input type="text"name="Quantity_ordered">
<label> Quantity Purchased </label>
<input type="text" name="Quantity_purchased">
<label> Datetime </label>
<input type="datetime-local" name="Datetime">

<button type="submit" name="save" class="btnr"> Edit Inventory</button>
</form>

</div>
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