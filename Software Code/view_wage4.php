<?php
session_start();
include "db.php";

if(!isset($_SESSION["fattendant_id"]))
{
 header("location:fattendant_login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
<title>View Wage</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> View Wage</h3>
<br>
<?php
if(isset($_GET["mes"]))
{
echo"<div class='error'>{$_GET["mes"]}</div>";	
}
					
?>
<?php
$sql="SELECT * FROM software_wage inner join software_fattendant on software_wage.name=software_fattendant.fattendant_name";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>Employee Name</th>
 <th>Wage</th>
 <th>Total Work Hours</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$row["name"]}</td>";
	echo "<td>{$row["wage"]}</td>";
	echo "<td>{$row["total_work_hours"]}</td>";
	echo "</tr>";
 }
 echo "</table>";
 }
else
 { 
     echo "<p class='error'> No wage found</p>";
 }
 }
?>

</div>
<div class="navigation">
<?php 
include "fattendant_menu.php";
?>
</div>
<div class="footer">
</div>
</body> 
</html>