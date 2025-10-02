<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login-form.php");
    exit;
}

include 'connect_user.php';

// Check if id is provided
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Optionally, you can set a success message in session
        $_SESSION['msg'] = "Product deleted successfully!";
    } else {
        $_SESSION['msg'] = "Error deleting product: " . $stmt->error;
    }

    $stmt->close();
}

// Redirect back to admin dashboard
header("Location: admin-dashboard.php");
exit;
?>
