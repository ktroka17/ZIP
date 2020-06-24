<?php
session_start();
include "db.php";

if(!isset($_SESSION["economist_id"]))
{
 header("location:economist_login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="tcal.js"></script> 
<script type="text/javascript">

var popupWindow=null;

function child_open()
{ 

popupWindow =window.open('print_user.php',"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=950, height=400,top=200,left=200");

}
</script>
<title>View Employees</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> View Employee Details </h3> 
<div> <a href='employee_registration.php' class='btnr'>Add New Employees</a></div>
<?php
if(isset($_GET["mes"]))
{
echo"<div class='error'>{$_GET["mes"]}</div>";	
}
					
?>
<?php
$sql="SELECT * FROM software_employee";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>UserNo</th>
 <th>Name</th>
 <th>Surname</th>
 <th>Username</th>
 <th>Job Position</th>
 <th>Email</th>
 <th>Delete user</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$i}</td>";
	echo "<td>{$row["employee_name"]}</td>";
	echo "<td>{$row["employee_surname"]}</td>";
	echo "<td>{$row["employee_username"]}</td>";
	echo "<td>{$row["employee_job"]}</td>";
	echo "<td>{$row["employee_email"]}</td>";
	echo "<td><a href='delete_employee.php?id={$row["employee_id"]}' class='btnr'>Delete</a></td>";
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
<br>
<h3 class="heading"> View Manager Details </h3> 
<br>
<?php
$sql="SELECT * FROM software_manager";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>User No</th>
 <th>Name</th>
 <th>Surname</th>
 <th>Username</th>
 <th>Email</th>
 <th>Delete user</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$i}</td>";
	echo "<td>{$row["manager_name"]}</td>";
	echo "<td>{$row["manager_surname"]}</td>";
	echo "<td>{$row["manager_username"]}</td>";
	echo "<td>{$row["manager_email"]}</td>";
	echo "<td><a href='delete_manager.php?id={$row["manager_id"]}' class='btnr'>Delete</a></td>";
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
<br>
<h3 class="heading"> View Economist Details </h3> 
<br>
<?php
$sql="SELECT * FROM software_economist";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>User No</th>
 <th>Name</th>
 <th>Surname</th>
 <th>Username</th>
 <th>Email</th>
 <th>Delete user</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$i}</td>";
	echo "<td>{$row["economist_name"]}</td>";
	echo "<td>{$row["economist_surname"]}</td>";
	echo "<td>{$row["economist_username"]}</td>";
	echo "<td>{$row["economist_email"]}</td>";
	echo "<td><a href='delete_economist.php?id={$row["economist_id"]}' class='btnr'>Delete</a></td>";
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
<br> <br> 
<h3 class="heading"> View cashier Details </h3> 
<div> <a href='cashier_registration.php' class='btnr'>Add New cashier</a></div>
<?php
$sql="SELECT * FROM software_cashier";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>UserNo</th>
 <th>Name</th>
 <th>Surname</th>
 <th>Username</th>
 <th>Email</th>
 <th>Delete user</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$i}</td>";
	echo "<td>{$row["cashier_name"]}</td>";
	echo "<td>{$row["cashier_surname"]}</td>";
	echo "<td>{$row["cashier_username"]}</td>";
	echo "<td>{$row["cashier_email"]}</td>";
	echo "<td><a href='delete_cashier.php?id={$row["cashier_id"]}' class='btnr'>Delete</a></td>";
	echo "</tr>";
	


 }
 echo "</table>";
 }
else
 { 
     echo "<p class='error'> No record found</p>";
 }
 } ?>
 <br> <br>
 <h3 class="heading"> View Fuel Attendant Details </h3> 
<div> <a href='fattendant_registration.php' class='btnr'>Add New Fuel Attendant</a></div>

<?php
$sql="SELECT * FROM software_fattendant";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>UserNo</th>
 <th>Name</th>
 <th>Surname</th>
 <th>Username</th>
 <th>Email</th>
 <th>Delete user</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$i}</td>";
	echo "<td>{$row["fattendant_name"]}</td>";
	echo "<td>{$row["fattendant_surname"]}</td>";
	echo "<td>{$row["fattendant_username"]}</td>";
	echo "<td>{$row["fattendant_email"]}</td>";
	echo "<td><a href='delete_fattendant.php?id={$row["fattendant_id"]}' class='btnr'>Delete</a></td>";
	echo "</tr>";
	


 }
 echo "</table>";
 }
else
 { 
     echo "<p class='error'> No record found</p>";
 }
 } ?>
 <br> <br>
 <h3 class="heading"> View Fuel Delivery Driver Details </h3> 
<div> <a href='fdriver_registration.php' class='btnr'>Add New Fuel Delivery Driver</a></div>

<?php
$sql="SELECT * FROM software_fdriver";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>UserNo</th>
 <th>Name</th>
 <th>Surname</th>
 <th>Username</th>
 <th>Email</th>
 <th>Delete user</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$i}</td>";
	echo "<td>{$row["fdriver_name"]}</td>";
	echo "<td>{$row["fdriver_surname"]}</td>";
	echo "<td>{$row["fdriver_username"]}</td>";
	echo "<td>{$row["fdriver_email"]}</td>";
	echo "<td><a href='delete_fdriver.php?id={$row["fdriver_id"]}' class='btnr'>Delete</a></td>";
	echo "</tr>";
	


 }
 echo "</table>";
 }
else
 { 
     echo "<p class='error'> No record found</p>";
 }
 } ?>
<br/><br/>
<input name="" type="button" value="Print/Download" onclick="javascript:window.print()" style="cursor:pointer; float:left;"/>
</div>
<div class="navigation">
<?php 
include "economist_menu.php";
?>
</div>
<div class="footer">
</div>
</script>
</body> 
</html>