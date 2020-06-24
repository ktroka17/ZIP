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
<title>Create Balance Sheet</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Create Balance Sheet </h3>
<div class="center">
<?php 

if (isset($_POST['save'])) { 

		$sql="INSERT INTO software_balancesheet(balancesheet_nr,Datetime,total_assets,total_liabilities,total_equity) values('{$_POST["balancesheet_nr"]}','{$_POST["Datetime"]}','{$_POST["total_assets"]}','{$_POST["total_liabilities"]}','{$_POST["total_equity"]}')";
            if(mysqli_query($db, $sql)) {
               
			   echo "<p class='success'> Balance Sheet Created</p>";
            }
        } else {
            echo "<p class='error'>Error while uploading</p>";
        }


?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data"> 
<label> Balance Sheet Nr </label>
<input type="number" name="balancesheet_nr" required>
<label> Datetime </label>
<input type="datetime-local" name="Datetime" required>
<label> Total Assets </label>
<input type="text" name="total_assets" required>
<label> Total Liabilities </label>
<input type="text" name="total_liabilities" required>
<label> Total Equity </label>
<input type="text" name="total_equity" required>
<button type="submit" name="save" class="btnr"> Create Balance Sheet</button>
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