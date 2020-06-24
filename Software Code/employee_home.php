<?php
session_start();
include "db.php";
function countRecord($sql,$db)
{
	$res=mysqli_query($db,$sql);
	return mysqli_num_rows($res);
}
if(!isset($_SESSION["employee_id"]))
{
 header("location:employee_login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Employee Home</title>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Welcome Employee</h3>
</div>
<div class="navigation">
<?php 
include "employee_menu.php";
?>
</div>
<div class="footer">
</div>
</body> 
</html>
