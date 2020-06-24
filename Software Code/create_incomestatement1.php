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
<title>Create Income Statement</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Create Income Statement </h3>
<div class="center">
<?php 

if (isset($_POST['save'])) { 

		$sql="INSERT INTO software_incomestatement(incomestatement_nr,Datetime,Revenues,Expenses,Net_income) values('{$_POST["incomestatement_nr"]}','{$_POST["Datetime"]}','{$_POST["Revenues"]}','{$_POST["Expenses"]}','{$_POST["Net_income"]}')";
            if(mysqli_query($db, $sql)) {
               
			   echo "<p class='success'> Income Statement Created</p>";
            }
        } else {
            echo "<p class='error'>Error while uploading</p>";
        }


?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data"> 
<label> Income Statement Nr </label>
<input type="number" name="incomestatement_nr" required>
<label> Datetime </label>
<input type="datetime-local" name="Datetime" required>
<label> Revenues </label>
<input type="text" name="Revenues" required>
<label> Expenses </label>
<input type="text" name="Expenses" required>
<label> Net Income </label>
<input type="text" name="Net_income" required>
<button type="submit" name="save" class="btnr"> Create Income Statement</button>
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