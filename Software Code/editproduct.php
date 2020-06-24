
<?php
include "db.php";

$id=$_POST['P_id'];
$name=$_POST['P_amount'];
$mi=$_POST['P_price'];
$idb=$_POST['Vat'];
$lname=$_POST['P_sellingprice'];
$address=$_POST['P_points'];
$bday=$_POST['product_keywords'];

$qw ="UPDATE software_product SET P_amount='$name', P_price='$mi', Vat='$idb', P_sellingprice='$lname', 
P_points='$address', product_keywords='$bday'";



?> 