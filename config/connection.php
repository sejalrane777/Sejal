<?php
	// error_reporting(0);
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "eshop";
	$conn = @new mysqli($servername, $username, $password, $dbname);
		if (!$conn)
			{
				echo"<script> alert('Unable to connect database server'); </script>";
			}
?>