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
<title>Add Wage</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Add Wage </h3>
<div class="center">
<?php 

if (isset($_POST['save'])) { 

		$sql="INSERT INTO software_wage(name,wage,total_work_hours) values('{$_POST["name"]}','{$_POST["wage"]}','{$_POST["total_work_hours"]}')";
            if(mysqli_query($db, $sql)) {
               
			   echo "<p class='success'> Wage Added</p>";
            }
        } else {
            echo "<p class='error'>Error while uploading</p>";
        }


?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data"> 
<label> Employee Name </label>
<input type="text" name="name" required>
<label> Wage </label>
<input type="number" name="wage" required>
<label> Total Work Hours </label>
<input type="number" name="total_work_hours" required>
<button type="submit" name="save" class="btnr"> Add Wage</button>
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