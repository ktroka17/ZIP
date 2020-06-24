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
<title>Order New Product</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Order New Product </h3>
<div class="center">
<?php 

if (isset($_POST['save'])) { 

		$sql="INSERT INTO software_orders(product_name,Ord_id,Ord_amount,Ord_location,Ord_dateshipped) values('{$_POST["product_name"]}','{$_POST["Ord_id"]}','{$_POST["Ord_amount"]}','{$_POST["Ord_location"]}','{$_POST["Ord_dateshipped"]}')";
            if(mysqli_query($db, $sql)) {
               
			   echo "<p class='success'> Order made successfully</p>";
            }
        } else {
            echo "<p class='error'>Error while uploading</p>";
        }


?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data"> 
<label> Product Name </label>
<input type="text" name="product_name" required>
<label> Order ID </label>
<input type="number" name="Ord_id" required>
<label> Ord Amount </label>
<input type="number" name="Ord_amount" required>
<label> Ord Location </label>
<input type="text" name="Ord_location" required>
<label> Order Date Shipped </label>
<input type="datetime-local" name="Ord_dateshipped" required>
<button type="submit" name="save" class="btnr"> Order</button>
</form>

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