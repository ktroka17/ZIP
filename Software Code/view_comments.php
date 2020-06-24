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
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> View Comment Details </h3>
<?php
$sql="SELECT software_client.client_username, software_comment.mess, software_comment.logs from software_client inner join software_comment on software_client.client_id=software_comment.client_id";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>No</th>
 <th>Username</th>
 <th>Comments</th>
 <th>Logs</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$i}</td>";
	echo "<td>{$row["client_username"]}</td>";
	echo "<td>{$row["mess"]}</td>";
	echo "<td>{$row["logs"]}</td>";
	echo "</tr>";
	


 }
 echo "</table>";
 }
else
 { 
     echo "<p class='error'> No comment found</p>";
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