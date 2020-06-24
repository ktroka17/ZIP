<?php
session_start();
include "db.php";

if(!isset($_SESSION["admin_id"]))
{
 header("location:admin_login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
<meta charset="UTF-8">  
<link rel="stylesheet" href="style.css">
<title>View Products</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> View Supplier Details </h3>
<br>
<div> <a href='add_supplier.php' class='btnr'>Add New Supplier</a></div>
<br>
<?php
if(isset($_GET["mes"]))
{
echo"<div class='error'>{$_GET["mes"]}</div>";	
}
					
?>
<?php
$sql="SELECT * FROM software_suppliers";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>Supplier ID</th>
 <th>Product ID</th>
 <th>Supplier Name</th>
 <th>Supplier Surname</th>
 <th>Contract begin</th>
 <th>Contract End</th>
 <th>Amount</th>
 <th>Delete Supplier</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$row["Supplier_id"]}</td>";
	echo "<td>{$row["P_id"]}</td>";
	echo "<td>{$row["S_name"]}</td>";
	echo "<td>{$row["S_surname"]}</td>";
	echo "<td>{$row["Contract_begin"]}</td>";
	echo "<td>{$row["Contract_end"]}</td>";
	echo "<td>{$row["Amount"]}</td>";
	echo "<td><a href='delete_supplier.php?id={$row["Supplier_id"]}'class='btnr'>Delete</a></td>";
	echo "</tr>";
 }
 echo "</table>";
 }
else
 { 
     echo "<p class='error'> No supplier found</p>";
 }
 }
?>

</div>
<div class="navigation">
<?php 
include "admin_menu.php";
?>
</div>
<div class="footer">
</div>
</body> 
</html>