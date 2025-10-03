<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login-form.php");
    exit;
}
include '../connect_user.php';

// Get user ID
$id = $_GET['id'];

// Fetch user details
$result = $conn->query("SELECT * FROM user WHERE id=$id");
$user = $result->fetch_assoc();

// Update user
if (isset($_POST['updateUser'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE user SET username=?, email=?, role=? WHERE id=?");
    $stmt->bind_param("sssi", $username, $email, $role, $id);

    if ($stmt->execute()) {
        header("Location: manage-users.php");
        exit;
    } else {
        echo "Error updating user: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="admin-dashboard.css">
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <form method="POST">
            <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
            <select name="role" required>
                <option value="user" <?php if ($user['role'] == 'user') echo 'selected'; ?>>User</option>
                <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
            </select>
            <input type="submit" name="updateUser" value="Update User">
        </form>
    </div>
</body>
</html>
