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
<title>Prepare Payroll</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Prepare Payroll </h3>
<div class="center">
<?php 

if (isset($_POST['save'])) { 

		$sql="INSERT INTO software_payrolls(Payroll_code,Employee_name,Hours,Extra_hours,dollar_perhour,dollar_perextrahour,Vacation,Other,Full_transaction,Datetime) values('{$_POST["Payroll_code"]}','{$_POST["Employee_name"]}','{$_POST["Hours"]}','{$_POST["Extra_hours"]}','{$_POST["dollar_perhour"]}','{$_POST["dollar_perextrahour"]}','{$_POST["Vacation"]}','{$_POST["Other"]}','{$_POST["Full_transaction"]}','{$_POST["Datetime"]}')";
            if(mysqli_query($db, $sql)) {
               
			   echo "<p class='success'> Inventory Added</p>";
            }
        } else {
            echo "<p class='error'>Error while uploading</p>";
        }


?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data"> 
<label> Payroll Code </label>
<input type="text" name="Payroll_code" required>
<label> Employee Name </label>
<input type="text" name="Employee_name" required>
<label> Hours </label>
<input type="number" name="Hours" required>
<label> Extra Hours </label>
<input type="number" name="Extra_hours" required>
<label> Dollar per Hour </label>
<input type="text" name="dollar_perhour" required>
<label> Dollar per Extra Hour </label>
<input type="text" name="dollar_perextrahour" required>
<label> Vacation </label>
<input type="number"name="Vacation" required>
<label> Other</label>
<textarea name="Other" required></textarea>
<label> Full Transaction </label>
<input type="number" name="Full_transaction" required>
<label> Datetime </label>
<input type="datetime-local" name="Datetime" required>

<button type="submit" name="save" class="btnr"> Prepare Payroll</button>
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