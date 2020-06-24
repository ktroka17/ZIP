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
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Make Comments </h3>
<div class="center">
<?php 
if(isset($_POST["submit"])) 
{
	$sql="INSERT into software_comment (client_id,mess,logs) values(
	{$_SESSION["client_id"]},'{$_POST["mess"]}',now())";
	mysqli_query($db,$sql);
	
		echo "<p class='success'>Comment was done!</p>";
	} 	
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<label> Message </label>
<textarea name="mess" required></textarea>
<button type="submit" name="submit" class="btnr">Send Comment</button>
</form>
</div>
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