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
<title>Add Inventory</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Add Inventory </h3>
<div class="center">
<?php 

if (isset($_POST['save'])) { 

		$sql="INSERT INTO software_inventory(Inventory_id,Products_name,Categories_name,Description,Unit_price,Quantity_instock,Quantity_ordered,Quantity_purchased,Datetime) values('{$_POST["Inventory_id"]}','{$_POST["Products_name"]}','{$_POST["Categories_name"]}','{$_POST["Description"]}','{$_POST["Unit_price"]}','{$_POST["Quantity_instock"]}','{$_POST["Quantity_ordered"]}','{$_POST["Quantity_purchased"]}','{$_POST["Datetime"]}')";
            if(mysqli_query($db, $sql)) {
               
			   echo "<p class='success'> Inventory Added</p>";
            }
        } else {
            echo "<p class='error'>Error while uploading</p>";
        }


?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data"> 
<label> Inventory ID </label>
<input type="text" name="Inventory_id" required>
<label> Products Names </label>
<input type="text" name="Products_name" required>
<label> Categories Names </label>
<input type="text" name="Categories_name" required>
<label> Description </label>
<input type="text" name="Description" required>
<label> Unit Price </label>
<input type="text" name="Unit_price" required>
<label> Quantity in Stock </label>
<input type="text" name="Quantity_instock" required>
<label> Quantity Ordered </label>
<input type="text" name="Quantity_ordered" required>
<label> Quantity Purchased </label>
<input type="text" name="Quantity_purchased" required>
<label> Datetime </label>
<input type="datetime-local" name="Datetime" required>

<button type="submit" name="save" class="btnr"> Add Inventory</button>
</form>

</div>
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