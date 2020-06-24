<?php
session_start();
include "db.php";
if(!isset($_SESSION["client_id"]))
{
 header("location:client_login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
<title>Client Home</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Welcome <?php echo $_SESSION["client_username"]; ?> </h3>
</div>
<div class="navigation">
<?php 
include "client_menu.php";
?>
</div>
<div class="footer">
</div>
</body> 
</html>