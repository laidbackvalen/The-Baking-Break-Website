<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login-form.php");
    exit;
}
include 'connect_user.php';

$id = $_GET['id'];
$conn->query("DELETE FROM products WHERE id=$id");

header("Location: admin-dashboard.php");
exit;
?>
