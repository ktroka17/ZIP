<?php
session_start();
include "db.php";
function countRecord($sql,$db)
{
	$res=mysqli_query($db,$sql);
	return mysqli_num_rows($res);
}
if(!isset($_SESSION["fattendant_id"]))
{
 header("location:fattendant_login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Fuel Attendant Home</title>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Welcome Fuel Attendant </h3>
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
