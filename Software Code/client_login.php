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
<title>Client Login</title>
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

$clientusername= clean($_POST['client_username']);
$clientpassword =clean($_POST['client_pass']);
	

 $clientusername= mysqli_real_escape_string ($db, $_POST['client_username']);
 $clientpassword = mysqli_real_escape_string ($db, $_POST['client_pass']);
 $clientpassword = md5($clientpassword); 
 $sql="SELECT * FROM software_client WHERE client_username='$clientusername' AND client_pass='$clientpassword'";
 $res=mysqli_query($db,$sql);
 if($res)
 { if(mysqli_num_rows($res)>0){
		 $row=mysqli_fetch_assoc($res);
 $_SESSION["client_id"]=$row["client_id"];
 $_SESSION["client_username"]=$row["client_username"];
  header("location:client_home.php");
 } }
 else 
	 
	 {
		 echo"<p class='error'> Invalid client details</p>";
	 }
}

?>
	<form method="post" action="client_login.php">
		<span class="text-center">Client Login</span>
	<div class="input-container">
		<input type="text" name="client_username" required>
		<label>Username</label>		
	</div>
	<div class="input-container">		
		<input type="password" name="client_pass" required>
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