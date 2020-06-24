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
<title>Add Product</title>
  </head>
<body>
    <div class="container">
        <div class="header">
              <h1>Gas Station System</h1>
        </div>
<div class="wrapper">
<h3 class="heading"> Add Product </h3>
<div class="center">
<?php 

if (isset($_POST['save'])) { 

 $filename = $_FILES['myfile']['name'];
 $destination = 'upload/' . $filename;
 $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['jpeg', 'jpg', 'png'])) {
        echo "You file extension must be .jpeg, .jpg or .png";
    } elseif ($_FILES['myfile']['size'] > 1000000) { 
        echo "File too large!";
    } else {
        
        if (move_uploaded_file($file, $destination)) {


		$sql="INSERT INTO software_product(P_id,P_amount,P_price,Vat,P_sellingprice,P_points,product_keywords,name) values('{$_POST["P_id"]}','{$_POST["P_amount"]}','{$_POST["P_price"]}','{$_POST["Vat"]}','{$_POST["P_sellingprice"]}','{$_POST["P_points"]}','{$_POST["product_keywords"]}','$filename')";
            if(mysqli_query($db, $sql)) {
               
			   echo "<p class='success'> Product Added</p>";
            }
        } else {
            echo "<p class='error'>Error while uploading</p>";
        }

	}
}
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data"> 
<label> Product ID </label>
<input type="text" name="P_id" required>
<label> Product Amount </label>
<input type="text" name="P_amount" required>
<label> Product Price </label>
<input type="text" name="P_price" required>
<label> VAT </label>
<input type="text" name="Vat" required>
<label> Selling Price </label>
<input type="text" name="P_sellingprice" required>
<label> Product Points </label>
<input type="text" name="P_points" required>
<label> Product Keywords </label>
<textarea name="product_keywords" required></textarea>
<label> Upload Photo </label>
<input type="file" name="myfile" required>
<button type="submit" name="save" class="btnr"> Add Product</button>
</form>

</div>
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