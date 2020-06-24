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
<title>View Reports</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> View Reports</h3> <br>
<div> <a href='create_balancesheet1.php' class='btnr'>Create Balance Sheet</a></div> <br>
<div> <a href='create_cashflow1.php' class='btnr'>Create Cash Flow Statement</a></div> <br>
<div> <a href='create_incomestatement1.php' class='btnr'>Create Income Statement</a></div> <br>
<?php
if(isset($_GET["mes"]))
{
echo"<div class='error'>{$_GET["mes"]}</div>";	
}
					
?>
<?php
$sql="SELECT * FROM software_balancesheet";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>Balance Sheet Nr</th>
 <th>Datetime</th>
 <th>Total Assets</th>
 <th>Total Liabilities</th>
 <th>Total Equity</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$row["balancesheet_nr"]}</td>";
	echo "<td>{$row["Datetime"]}</td>";
	echo "<td>{$row["total_assets"]}</td>";
	echo "<td>{$row["total_liabilities"]}</td>";
	echo "<td>{$row["total_equity"]}</td>";
	echo "</tr>";
 }
 echo "</table>";
 }
else
 { 
     echo "<p class='error'> No balance sheet found</p>";
 }
 }
?>
<br>
<?php
$sql="SELECT * FROM software_cashflowstatement";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>Cash Flow Statement Nr</th>
 <th>Datetime</th>
 <th>Cash Incoming</th>
 <th>Cash Outflow</th>
 <th>Cash Balance</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$row["cashflowstatement_nr"]}</td>";
	echo "<td>{$row["Datetime"]}</td>";
	echo "<td>{$row["Cash_incoming"]}</td>";
	echo "<td>{$row["Cash_outflow"]}</td>";
	echo "<td>{$row["Cash_balance"]}</td>";
	echo "</tr>";
 }
 echo "</table>";
 }
else
 { 
     echo "<p class='error'> No Cash Flow Statement found</p>";
 }
 }
?>
<br>
<?php
$sql="SELECT * FROM software_incomestatement";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>Income Statement Nr</th>
 <th>Datetime</th>
 <th>Revenues</th>
 <th>Expenses</th>
 <th>Net Income</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$row["incomestatement_nr"]}</td>";
	echo "<td>{$row["Datetime"]}</td>";
	echo "<td>{$row["Revenues"]}</td>";
	echo "<td>{$row["Expenses"]}</td>";
	echo "<td>{$row["Net_income"]}</td>";
	echo "</tr>";
 }
 echo "</table>";
 }
else
 { 
     echo "<p class='error'> No income statement found</p>";
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