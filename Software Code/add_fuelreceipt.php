<?php
session_start();
include "db.php";

if(!isset($_SESSION["fattendant_id"]))
{
 header("location:fattendant_login.php");
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

		$sql="INSERT INTO software_fuelreceipts(Receipt_nr,Receipt_date,fuel_amount,price,Vat,total_price) values('{$_POST["Receipt_nr"]}','{$_POST["Receipt_date"]}','{$_POST["fuel_amount"]}','{$_POST["price"]}','{$_POST["Vat"]}','{$_POST["total_price"]}')";
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
<label> Fuel Amount </label>
<input type="number" name="fuel_amount" required>
<label> Price </label>
<input type="text" name="price" required>
<label> Vat </label>
<input type="text"name="Vat" required>
<label> Total Price</label>
<input type="text" name="total_price" required>
<button type="submit" name="save" class="btnr"> Add Receipt</button>
</form>

</div>
</div>
<div class="navigation">
<?php 
include "fattendant_menu.php";
?>
</div>
<div class="footer">
</div>
</body> 
</html>