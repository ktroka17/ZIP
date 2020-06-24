<?php
session_start();
include "db.php";

if(!isset($_SESSION["cashier_id"]))
{
 header("location:cashier_login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
<title>Add Receipt</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Add Receipt </h3>
<div class="center">
<?php 

if (isset($_POST['save'])) { 

		$sql="INSERT INTO software_cashierreceipts(Receipt_nr,Receipt_date,Product_name,Quantity,Description,Price,Vat,total_amount) values('{$_POST["Receipt_nr"]}','{$_POST["Receipt_date"]}','{$_POST["Product_name"]}','{$_POST["Quantity"]}','{$_POST["Description"]}','{$_POST["Price"]}','{$_POST["Vat"]}','{$_POST["total_amount"]}')";
            if(mysqli_query($db, $sql)) {
               
			   echo "<p class='success'> Receipt Added</p>";
            }
        } else {
            echo "<p class='error'>Error while uploading</p>";
        }


?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data"> 
<label> Receipt Nr </label>
<input type="number" name="Receipt_nr" required>
<label> Receipt Date </label>
<input type="datetime-local" name="Receipt_date" required>
<label> Product Name </label>
<input type="text" name="Product_name" required>
<label> Quantity </label>
<input type="number" name="Quantity" required>
<label> Description </label>
<textarea name="Description" required></textarea>
<label> Price </label>
<input type="text" name="Price" required>
<label> Vat </label>
<input type="text"name="Vat" required>
<label> Total Amount</label>
<input type="text"name="total_amount" required>
<button type="submit" name="save" class="btnr"> Add Receipt</button>
</form>

</div>
</div>
<div class="navigation">
<?php 
include "cashier_menu.php";
?>
</div>
<div class="footer">
</div>
</body> 
</html>