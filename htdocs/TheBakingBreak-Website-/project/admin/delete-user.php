<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login-form.php");
    exit;
}
include '../connect_user.php';

$id = $_GET['id'];

// Prevent admin from deleting themselves
if ($id == $_SESSION['user_id']) {
    echo "<p style='color:red;'>You cannot delete your own account!</p>";
    exit;
}

$conn->query("DELETE FROM user WHERE id=$id");

header("Location: manage-users.php");
exit;
?>
