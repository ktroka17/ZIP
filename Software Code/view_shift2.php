<?php
session_start();
include "db.php";

if(!isset($_SESSION["manager_id"]))
{
 header("location:manager_login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
<title>View Shifts</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> View Shift Details </h3>
<br>
<div> <a href='add_shift2.php' class='btnr'>Add New Shift</a></div>
<br>
<?php
if(isset($_GET["mes"]))
{
echo"<div class='error'>{$_GET["mes"]}</div>";	
}
					
?>
<?php
$sql="SELECT * FROM software_shift";
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

</div>
<div class="navigation">
<?php 
include "manager_menu.php";
?>
</div>
<div class="footer">
</div>
</body> 
</html>