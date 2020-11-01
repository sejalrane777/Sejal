<?php include "../config/database.php";
session_start();
// $EMAIL=$_SESSION["email"];

$_SESSION = array();
session_destroy();
header("location:admin.php");
exit();
?>