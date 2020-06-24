<?php
session_start();
include "db.php";

if(!isset($_SESSION["economist_id"]))
{
 header("location:economist_login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
<title>View Payrolls</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> View Payrolls</h3>
<br>
<div> <a href='prepare_payroll.php' class='btnr'>Prepare Payroll</a></div>
<br>
<div> <a href='wage.php' class='btnr'>ADD WAGE</a></div><br>
<?php
if(isset($_GET["mes"]))
{
echo"<div class='error'>{$_GET["mes"]}</div>";	
}
					
?>
<?php
$sql="SELECT * FROM software_payrolls";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>Payroll Code</th>
 <th>Employee Name</th>
 <th>Hours</th>
 <th>Extra Hours</th>
 <th>Dollar per Hour</th>
 <th>Dollar per Extra Hour</th>
 <th>Vacation</th>
 <th>Other</th>
 <th>Full Transaction</th>
 <th>Datetime</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$row["Payroll_code"]}</td>";
	echo "<td>{$row["Employee_name"]}</td>";
	echo "<td>{$row["Hours"]}</td>";
	echo "<td>{$row["Extra_hours"]}</td>";
	echo "<td>{$row["dollar_perhour"]}</td>";
	echo "<td>{$row["dollar_perextrahour"]}</td>";
	echo "<td>{$row["Vacation"]}</td>";
	echo "<td>{$row["Other"]}</td>";
	echo "<td>{$row["Full_transaction"]}</td>";
	echo "<td>{$row["Datetime"]}</td>";
	echo "</tr>";
 }
 echo "</table>";
 }
else
 { 
     echo "<p class='error'> No payroll found</p>";
 }
 }
?>

</div>
<div class="navigation">
<?php 
include "economist_menu.php";
?>
</div>
<div class="footer">
</div>
</body> 
</html>