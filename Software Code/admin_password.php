<?php
session_start();
include "db.php";

if(!isset($_SESSION["admin_id"]))
{
 header("location:admin_login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Change Password</title>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
<title></title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Online Library</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Change Password </h3>
<div class="center">
<?php 
if(isset($_POST["submit"])) 
{
	$sql="SELECT * FROM software_admin where admin_pass='{$_POST["old_pass"]}' and admin_id='{$_SESSION["admin_id"]}'";
    $res=mysqli_query($db,$sql);
	if($res)
	{ if(mysqli_num_rows($res)>0){
		
		$s="update software_admin set admin_pass='{$_POST["new_pass"]}' WHERE admin_id=".$_SESSION["admin_id"];
		(mysqli_query($db,$s));
		
		echo "<p class='success'> Password Changed Successfully</p>";
	} 
	}	
	else 
	{
	echo "<p class='error'> Try a new password</p>";	
	}
}
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<label> Old Password </label>
<input type="password" name="old_pass" required>
<label> New Password</label>
<input type="password" name="new_pass" required>
<button type="submit" name="submit"  class="btnr"> Update Password</button>
</form>

</div>
</div>
<div class="navigation">
<?php 
include "admin_menu.php";
?>
</div>
<div class="footer">
<p>Copyright &copy; Sheila 2020</p>
</div>
</body> 
</html>