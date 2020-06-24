<?php
session_start();
include "db.php";

if(!isset($_SESSION["fattendant_id"]))
{
 header("location:fattendant_login.php");
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
<title>Fuel Attendant Receipt</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> View Receipt </h3>
<br>
<div> <a href='add_fuelreceipt.php' class='btnr'>Add Receipt</a></div>
<br>
<?php
if(isset($_GET["mes"]))
{
echo"<div class='error'>{$_GET["mes"]}</div>";	
}
					
?>
<?php
$sql="SELECT * FROM software_fuelreceipts";
$res=mysqli_query($db,$sql);
if($res)
 { if(mysqli_num_rows($res)>0){ 

 echo "<table>
 <tr>
 <th>Receipt Nr</th>
 <th>Receipt Date</th>
 <th>Fuel Amount</th>
 <th>Price</th>
 <th>Vat</th>
 <th>Total Price</th>
 </tr>
 ";
 $i=0;
 while($row=mysqli_fetch_assoc($res))
 { 
    $i++;
	echo "<tr>";
	echo "<td>{$row["Receipt_nr"]}</td>";
	echo "<td>{$row["Receipt_date"]}</td>";
	echo "<td>{$row["fuel_amount"]}</td>";
	echo "<td>{$row["price"]}</td>";
	echo "<td>{$row["Vat"]}</td>";
	echo "<td>{$row["total_price"]}</td>";
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
<style>
.button {width: 50%;}
</style>

<input class="button" type="button" value="Print/Download" onclick="javascript:window.print()" style="cursor:pointer; float:left;"/>
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