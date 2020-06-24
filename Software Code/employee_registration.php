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
 
 $employeename = mysqli_real_escape_string($db, $_POST['employee_name']);
 $employeesurname = mysqli_real_escape_string($db, $_POST['employee_surname']);
 $employeeusername= mysqli_real_escape_string($db, $_POST['employee_username']);
 $employeepassword = mysqli_real_escape_string($db, $_POST['employee_pass']);
 $employeepassword = md5($employeepassword);
 $employeejob= mysqli_real_escape_string($db, $_POST['employee_job']);
 $employeeemail= mysqli_real_escape_string($db, $_POST['employee_email']);
 
 $sql = "INSERT INTO software_employee(employee_name,employee_surname,employee_username,employee_pass,employee_job,employee_email)
 values('$employeename','$employeesurname','$employeeusername','$employeepassword','$employeejob','$employeeemail')";
 $res= mysqli_query($db, $sql);
	echo "<p class='success'>Employee Registered!!</p>";
}
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<span class="text-center"> Employee Registration </span> 
<div class="input-container">
<input type="text" name="employee_name" required>
<label> Name </label>
</div>
<div class="input-container">
<input type="text" name="employee_surname" required>
<label> Surname </label>
</div>
<div class="input-container">
<input type="text" name="employee_username" required>
<label> Username </label>
</div>
<div class="input-container">
<input type="password" name="employee_pass" required>
<label> Password</label>
</div>
<div class="input-container">
<input type="text" name="employee_job" required>
<label>Job Position</label>
</div>
<div class="input-container">
<input type="email" name="employee_email" required>
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