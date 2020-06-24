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
<title>Fuel Attendant Login</title>
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

$fattendantusername= clean($_POST['fattendant_username']);
$fattendantpassword =clean($_POST['fattendant_pass']);
	
 $sql="SELECT * FROM software_fattendant WHERE fattendant_username='$fattendantusername' AND fattendant_pass='$fattendantpassword'";
 $res=mysqli_query($db,$sql);
 if($res)
 { if(mysqli_num_rows($res)>0){
		 $row=mysqli_fetch_assoc($res);
 $_SESSION["fattendant_id"]=$row["fattendant_id"];
 $_SESSION["fattendant_username"]=$row["fattendant_username"];
  header("location:fattendant_home.php");
 } }
 else 
	 
	 {
		 echo"<p class='error'> Invalid Fuel Attendant details</p>";
	 }
}

?>
	<form method="post" action="fattendant_login.php">
		<span class="text-center">Fuel Attendant Login</span>
	<div class="input-container">
		<input type="text" name="fattendant_username" required>
		<label>Username</label>		
	</div>

	<div class="input-container">		
		<input type="password" name="fattendant_pass" required>
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