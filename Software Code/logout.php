<?php
session_start();
unset($_SESSION["admin_id"]);
unset($_SESSION["u_id"]);
session_destroy();
header("location:index.php");
?>