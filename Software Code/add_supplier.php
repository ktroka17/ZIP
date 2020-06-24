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
<title>Add Supplier</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Add Supplier </h3>
<div class="center">
<?php 

if (isset($_POST['save'])) { 

		$sql="INSERT INTO software_suppliers(Supplier_id,P_id,S_name,S_surname,Contract_begin,Contract_end,Amount) values('{$_POST["Supplier_id"]}','{$_POST["P_id"]}','{$_POST["S_name"]}','{$_POST["S_surname"]}','{$_POST["Contract_begin"]}','{$_POST["Contract_end"]}','{$_POST["Amount"]}')";
            if(mysqli_query($db, $sql)) {
               
			   echo "<p class='success'> Supplier Added</p>";
            }
        } else {
            echo "<p class='error'>Error while uploading</p>";
        }


?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data"> 
<label> Supplier ID </label>
<input type="text" name="Supplier_id" required>
<label> Product ID </label>
<input type="text" name="P_id" required>
<label> Supplier Name </label>
<input type="text" name="S_name" required>
<label> Supplier Surname </label>
<input type="text" name="S_surname" required>
<label> Contract begin </label>
<input type="date" name="Contract_begin" required>
<label> Contract End</label>
<input type="date" name="Contract_end" required>
<label> Amount</label>
<input type="text" name="Amount" required>
<button type="submit" name="save" class="btnr"> Add Supplier</button>
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