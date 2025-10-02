<?php
$servername = "localhost";
$dbuser = "root";
$dbpass = "";          // XAMPP default
$dbname = "baking_break";
$conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) die("Connection failed: ".$conn->connect_error);
?>
