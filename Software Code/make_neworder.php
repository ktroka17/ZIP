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
<title>Make New Order</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Make New Order </h3>
<div class="center">
<?php 

if (isset($_POST['save'])) { 

		$sql="INSERT INTO software_purchases (Pur_id,Pur_buyingprice,Pur_datepurchased,Pur_amount) values('{$_POST["Pur_id"]}','{$_POST["Pur_buyingprice"]}','{$_POST["Pur_datepurchased"]}','{$_POST["Pur_amount"]}')";
            if(mysqli_query($db, $sql)) {
               
			   echo "<p class='success'> Purchaase Made</p>";
            }
        } else {
            echo "<p class='error'>Error while uploading</p>";
        }
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data"> 
<label> Purchase ID </label>
<input type="number" name="Pur_id" required>
<label> Buying Price </label>
<input type="text" name="Pur_buyingprice" required>
<label> Date Purchased </label>
<input type="datetime-local" name="Pur_datepurchased" required>
<label> Amount</label>
<input type="number" name="Pur_amount" required>
<button type="submit" name="save" class="btnr"> Order</button>
</form>

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