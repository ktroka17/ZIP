<?php
session_start();
include "db.php";

if(!isset($_SESSION["employee_id"]))
{
 header("location:employee_login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
<title>Add Shift</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Add Shift</h3>
<div class="center">
<?php 

if (isset($_POST['save'])) { 

		$sql="INSERT INTO software_shift(emp_name,position,clock_in,clock_out,extra_hr) values('{$_POST["emp_name"]}','{$_POST["position"]}','{$_POST["clock_in"]}','{$_POST["clock_out"]}','{$_POST["extra_hr"]}')";
            if(mysqli_query($db, $sql)) {
               
			   echo "<p class='success'>Shift Added</p>";
            }
}  else {
            echo "<p class='error'>Error while uploading</p>";
        }


?>
<br> <br> <br> 
<?php
$sql="SELECT * FROM software_shift where position='janitor' and position='security'";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>Employee Name</th>
 <th>Employee Position</th>
 <th>Clock In</th>
 <th>Clock Out</th>
 <th>Extra Hours</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$row["emp_name"]}</td>";
	echo "<td>{$row["position"]}</td>";
	echo "<td>{$row["clock_in"]}</td>";
	echo "<td>{$row["clock_out"]}</td>";
	echo "<td>{$row["extra_hr"]}</td>";
	echo "</tr>";
 }
 echo "</table>";
 }
else
 { 
     echo "<p class='error'> No record found</p>";
 }
 }
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data"> 
<label> Employee Name </label>
<input type="text" name="emp_name" required>
<label> Position </label>
<input type="text" name="position" required>
<label> Clock in </label>
<input type="datetime-local" name="clock_in" required>
<label> Clock out </label>
<input type="datetime-local" name="clock_out" required>
<label> Extra Hours </label>
<input type="number" name="extra_hr" required>
<button type="submit" name="save" class="btnr"> Add Shift</button>
</form>

</div>
</div>
<div class="navigation">
<?php 
include "employee_menu.php";
?>
</div>
<div class="footer">
</div>
</body> 
</html>