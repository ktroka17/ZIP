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
<title>Economist Login</title>
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

$economistname= clean($_POST['economist_name']);
$economistpass =clean($_POST['economist_pass']);
	
 $sql="SELECT * FROM software_economist WHERE economist_name='$economistname' AND economist_pass='$economistpass'";
 $res=mysqli_query($db,$sql);
 if($res)
 { if(mysqli_num_rows($res)>0){
		 $row=mysqli_fetch_assoc($res);
 $_SESSION["economist_id"]=$row["economist_id"];
 $_SESSION["economist_name"]=$row["economist_name"];
  header("location:economist_home.php");
 }
 else 
	 
	 {
		 echo"<p class='error'> Invalid manager details</p>";
	 }
} }

?>
	<form method="post" action="economist_login.php">
		<span class="text-center">Economist Login</span>
	<div class="input-container">
		<input type="text" name="economist_name" required>
		<label>Username</label>		
	</div>
	<div class="input-container">		
		<input type="password" name="economist_pass" required>
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