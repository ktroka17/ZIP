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
<title>View Purchases</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> View Purchases</h3> <br>
<div> <a href='make_neworder1.php' class='btnr'>Make New Order</a></div>
<br>
<?php
if(isset($_GET["mes"]))
{
echo"<div class='error'>{$_GET["mes"]}</div>";	
}					
?>
<?php
$sql="SELECT * FROM software_purchases";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>Purchase ID</th>
 <th>Purchase Buying Price</th>
 <th>Date Purchased</th>
 <th>Purchase Amount</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$row["Pur_id"]}</td>";
	echo "<td>{$row["Pur_buyingprice"]}</td>";
	echo "<td>{$row["Pur_datepurchased"]}</td>";
	echo "<td>{$row["Pur_amount"]}</td>";
	echo "</tr>";
 }
 echo "</table>";
 }
else
 { 
     echo "<p class='error'> No purchase found</p>";
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