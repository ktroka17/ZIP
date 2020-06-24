<?php
session_start();
include "db.php";
function countRecord($sql,$db)
{
	$res=mysqli_query($db,$sql);
	return mysqli_num_rows($res);
}
if(!isset($_SESSION["economist_id"]))
{
 header("location:economist_login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Economist Home</title>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Welcome Economist </h3>
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
