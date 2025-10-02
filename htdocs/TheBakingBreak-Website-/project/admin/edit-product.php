<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login-form.php");
    exit;
}
include 'connect_user.php';

// Get product ID
if (!isset($_GET['id'])) {
    echo "No product ID provided.";
    exit;
}

$id = $_GET['id'];

// Fetch product details
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Product not found!";
    exit;
}

$product = $result->fetch_assoc();

// Handle form submission
if (isset($_POST['updateProduct'])) {
    $name = $_POST['name'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $update = $conn->prepare("UPDATE products SET name=?, image=?, price=?, description=? WHERE id=?");
    $update->bind_param("ssisi", $name, $image, $price, $description, $id);

    if ($update->execute()) {
        echo "<p style='color:green;'>Product updated successfully! <a href='admin-dashboard.php'>Go back</a></p>";
    } else {
        echo "<p style='color:red;'>Error: " . $update->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Product</title>
<style>
body { font-family: Arial, sans-serif; margin:0; padding:20px; }
h2 { color: #fc2fcc; }
form input, form textarea { width: 100%; padding: 10px; margin-bottom: 10px; }
form input[type="submit"] { background: #d129d8; color: white; border: none; cursor: pointer; }
</style>
</head>
<body>

<h2>Edit Product</h2>
<form method="POST">
    <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
    <input type="text" name="image" value="<?php echo htmlspecialchars($product['image']); ?>" required>
    <input type="number" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
    <textarea name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea>
    <input type="submit" name="updateProduct" value="Update Product">
</form>

</body>
</html>
