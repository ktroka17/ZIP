<?php
session_start();
include_once 'db.php';
if(!isset($_SESSION["admin_id"]))
{
 header("location:admin_login.php");
}
$err=false; 
if(isset($_POST['submit'])) {
	$msg=array();
	if(isset($_POST['client_name'])&& preg_match("/^[a-z]+$/i",$_POST['client_name'])){
		$name=$_POST['client_name'];
	} else { $err=true; 
		$msg[0]="<sub style='color:red'>Name must contain only letters</sub><br />";
	}
	if(isset($_POST['client_surname']) && preg_match("/^[a-z]+$/i",$_POST['client_surname'])){
		$surname=$_POST['client_surname'];
	} else { $err=true; 
		$msg[1]="<sub style='color:red'>Surname must contain only letters</sub><br />";
	}
	if(isset($_POST['client_username']) && preg_match("/^[\w\.-]+$/i",$_POST['client_username'])){
		$user=$_POST['client_username'];
	} else { $err=true; 
		$msg[2]="<sub style='color:red'>Username must contain Letters, numbers and . - _</sub><br />";
	}
	if(!isset($_POST['client_pass']) || $_POST['client_pass']=='') $no;
	else if(isset($_POST['client_pass']) && preg_match("/.*[A-Z].*/",$_POST['client_pass'])
		&& preg_match("/.*[a-z].*/",$_POST['client_pass'])
		&& preg_match("/.*[\d].*/",$_POST['client_pass'])
		&& preg_match("/.{8,16}/",$_POST['client_pass'])){
		$pass=$_POST['client_pass'];
	} else { $err=true; 
		$msg[3]="<sub style='color:red'>Password must contain 8-16 characters, at least 
1 uppercase letter, 1 lower case letter and 1 number</sub><br />";
	}
	if(isset($_POST['client_email']) && preg_match("/^[\w\.-]+@([a-z\d-]+\.)+[a-z]{2,6}$/i",$_POST['client_email'])){
		$email=$_POST['client_email'];
	} else { $err=true; 
		$msg[4]="<sub style='color:red'>Email must be in email format...</sub><br />";
	}
	
	if(!$err) {//If no errors, run this code
		$out= "<h1>Updated Successfully</h1>";
		$conn=mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database);
		$sql="UPDATE software_client SET `client_name`='{$name}', `client_surname`='{$surname}', `client_username`='{$user}'".(isset($pass)?", `client_pass`='{$pass}'":"").", `client_email`='{$email}' where client_id in (select client_id from software_client;);";

		mysqli_query($conn,$sql);
		mysqli_close($conn);
	}
}
if(isset($_SESSION["admin_id"])){
	$conn=mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database);
	$result=mysqli_query($conn,"select * from software_client;");
	$data=mysqli_fetch_assoc($result);
	$name=$data['client_name']; $surname=$data['client_surname']; $user=$data['client_username'];
	$email=$data['client_email'];
}
?>	
<!DOCTYPE html>
<html>
<head><title>Edit Client</title></head>
<body>
<center><h2 style='color:green'><?=isset($out)?$out:""?></h2>
<h3>Edit Form</h3>
<form method="post" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data" >
<p>Name: <input type="text" name="name" value="<?php if(isset($name)){echo $name; };?>"/></p>
<?php if(isset($msg[0])) echo $msg[0];?>
<p>Surname: <input type="text" name="surname" value="<?php if(isset($surname)){echo $surname; };?>"/><br />
<?php if(isset($msg[1])) echo $msg[1];?></p>
<p>Username: <input type="text" name="user" value="<?php if(isset($username)){echo $username; };?>"/><br />
<?php if(isset($msg[2])) echo $msg[2];?></p>
<p>Password: <input type="password" name="pass" value=""/><br />
<?php if(isset($msg[3])) echo $msg[3];?></p>
<p>Email: <input type="text" name="email" value="<?php if(isset($email)){echo $email; };?>"/><br />
<?php if(isset($msg[4])) echo $msg[4];?></p>
<input type="submit" name="submit" /><br />
</form>
<p><a href="view_client.php">Back</a>
</center>
</body>
</html>