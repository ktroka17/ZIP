<?php
session_start();
include "db.php";

if(!isset($_SESSION["admin_id"]))
{
 header("location:admin_login.php");
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
<title>View Clients</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> View Client Details </h3>
<br>
<div> <a href='client_registration.php' class='btnr'>Add New Client</a></div>
<br>
<?php
if(isset($_GET["mes"]))
{
echo"<div class='error'>{$_GET["mes"]}</div>";	
}
					
?>
<?php
$sql="SELECT * FROM software_client";
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
	echo "<td>{$row["client_name"]}</td>";
	echo "<td>{$row["client_surname"]}</td>";
	echo "<td>{$row["client_username"]}</td>";
	echo "<td>{$row["client_email"]}</td>";
	echo "<td><a href='delete_client.php?id={$row["client_id"]}' class='btnr'>Delete</a></td>";
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
<br/><br/>
<input name="" type="button" value="Print/Download" onclick="javascript:window.print()" style="cursor:pointer; float:left;"/>
</div>
<div class="navigation">
<?php 
include "admin_menu.php";
?>
</div>
<div class="footer">
</div>
	</script>
</body> 
</html>