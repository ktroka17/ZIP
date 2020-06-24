<?php
session_start();
include "db.php";
 ?>
<!DOCTYPE html>
<html>
  <head>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style1.css">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<title>Fuel Delivery Driver Login</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<div class="box">
<?php
if(isset($_POST["submit"]))
{
	function clean($str) {
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
	$str = stripslashes($str);
	}
	echo "Value: $str";
	return $str;
}

$fdriverusername= clean($_POST['fdriver_username']);
$fdriverpassword =clean($_POST['fdriver_pass']);
	
	
 $sql="SELECT * FROM software_fdriver WHERE fdriver_username='$fdriverusername' AND fdriver_pass='$fdriverpassword'";
 $res=mysqli_query($db,$sql);
 if($res)
 { if(mysqli_num_rows($res)>0){
		 $row=mysqli_fetch_assoc($res);
 $_SESSION["fdriver_id"]=$row["fdriver_id"];
 $_SESSION["fdriver_username"]=$row["fdriver_username"];
  header("location:fdriver_home.php");
 } }
 else 
	 
	 {
		 echo"<p class='error'> Invalid Fuel Delivery Driver details</p>";
	 }
}

?>
	<form method="post" action="fdriver_login.php">
		<span class="text-center">Fuel Delivery Driver Login</span>
	<div class="input-container">
		<input type="text" name="fdriver_username" required>
		<label>Username</label>		
	</div>

	<div class="input-container">		
		<input type="password" name="fdriver_pass" required>
		<label>Password</label>
	</div>
		<button type="submit" name="submit" class="btn">Login</button>
</form>	
</div>
</div>
</div>
<div class="navigation">
<?php 
include "menu.php";
?>
</div>
<div class="footer">
</div>
</body> 
</html>