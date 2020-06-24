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
<title>Create Cash Flow Statement</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Create Cash Flow Statement </h3>
<div class="center">
<?php 

if (isset($_POST['save'])) { 

		$sql="INSERT INTO software_cashflowstatement(cashflowstatement_nr,Datetime,Cash_incoming,Cash_outflow,Cash_balance) values('{$_POST["cashflowstatement_nr"]}','{$_POST["Datetime"]}','{$_POST["Cash_incoming"]}','{$_POST["Cash_outflow"]}','{$_POST["Cash_balance"]}')";
            if(mysqli_query($db, $sql)) {
               
			   echo "<p class='success'> Cash Flow Created</p>";
            }
        } else {
            echo "<p class='error'>Error while uploading</p>";
        }


?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data"> 
<label> Cash Flow Statement Nr </label>
<input type="number" name="cashflowstatement_nr" required>
<label> Datetime </label>
<input type="datetime-local" name="Datetime" required>
<label> Cash Incoming </label>
<input type="text" name="Cash_incoming" required>
<label> Cash Outflow </label>
<input type="text" name="Cash_outflow" required>
<label> Cash Balance </label>
<input type="text" name="Cash_balance" required>
<button type="submit" name="save" class="btnr"> Create Cash Flow Statement</button>
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