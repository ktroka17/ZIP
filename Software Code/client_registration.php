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
 
 $clientname = mysqli_real_escape_string($db, $_POST['client_name']);
 $clientsurname = mysqli_real_escape_string($db, $_POST['client_surname']);
 $clientusername= mysqli_real_escape_string($db, $_POST['client_username']);
 $clientpassword = mysqli_real_escape_string($db, $_POST['client_pass']);
 $clientpassword = md5($clientpassword); 
 $clientemail= mysqli_real_escape_string($db, $_POST['client_email']);
 
 $sql = "INSERT INTO software_client(client_name,client_surname,client_username,client_pass,client_email)
 values('$clientname','$clientsurname','$clientusername','$clientpassword','$clientemail')";
 $res= mysqli_query($db, $sql);
	echo "<p class='success'>Client Registered!!</p>";
}
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<span class="text-center"> Client Registration </span> 
<div class="input-container">
<input type="text" name="client_name" required>
<label> Name </label>
</div>
<div class="input-container">
<input type="text" name="client_surname" required>
<label> Surname </label>
</div>
<div class="input-container">
<input type="text" name="client_username" required>
<label> Username </label>
</div>
<div class="input-container">
<input type="password" name="client_pass" required>
<label> Password</label>
</div>
<div class="input-container">
<input type="email" name="client_email" required>
<label>Email</label>
</div>
<button type="submit" name="submit" class="btn">Register</button>

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