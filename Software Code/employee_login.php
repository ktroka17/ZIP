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
<title>Employee Login</title>
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

$employeeusername= clean($_POST['employee_username']);
$employeejob =clean($_POST['employee_job']);
$employeepassword =clean($_POST['employee_pass']);
	


 $employeeusername= mysqli_real_escape_string ($db, $_POST['employee_username']);
 $employeejob= mysqli_real_escape_string ($db, $_POST['employee_job']);
 $employeepassword = mysqli_real_escape_string ($db, $_POST['employee_pass']);
 $clientpassword = md5($clientpassword); 
 $sql="SELECT * FROM software_employee WHERE employee_username='$employeeusername' AND employee_pass='$employeepassword' AND employee_job='$employeejob'";
 $res=mysqli_query($db,$sql);
 if($res)
 { if(mysqli_num_rows($res)>0){
		 $row=mysqli_fetch_assoc($res);
 $_SESSION["employee_id"]=$row["employee_id"];
 $_SESSION["employee_username"]=$row["employee_username"];
 $_SESSION["employee_job"]=$row["employee_job"];
  header("location:employee_home.php");
 } }
 else 
	 
	 {
		 echo"<p class='error'> Invalid employee details</p>";
	 }
}

?>
	<form method="post" action="employee_login.php">
		<span class="text-center">Employee Login</span>
	<div class="input-container">
		<input type="text" name="employee_username" required>
		<label>Username</label>		
	</div>
	<div class="input-container">
		<input type="text" name="employee_job" required>
		<label>Job Position</label>		
	</div>
	<div class="input-container">		
		<input type="password" name="employee_pass" required>
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