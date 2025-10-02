<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'login';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("❌ Failed to connect to database: " . $conn->connect_error);
}
// echo "✅ Database connection successful!"; // Uncomment this line to test
?>
