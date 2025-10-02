<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login-form.php");
    exit;
}
include '../connect_user.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard - The Baking Break</title>
<style>
body { font-family: Arial, sans-serif; margin:0; }
header { background: #fc2fcc; color: white; padding: 15px; text-align: center; }
.container { padding: 20px; }
form input, form select, form textarea { width: 100%; padding: 10px; margin-bottom: 10px; }
form input[type="submit"] { background: #d129d8; color: white; border: none; cursor: pointer; }
.product-list { margin-top: 30px; }
.product { border: 1px solid #ccc; padding: 15px; margin-bottom: 10px; border-radius: 5px; }
.product h3 { margin: 0; }
.product img { max-width: 100px; display: block; margin-top: 10px; }
a.action { margin-right: 10px; color: #fc2fcc; text-decoration: none; }
a.action:hover { text-decoration: underline; }
</style>
</head>
<body>

<header>
    <h1>Welcome, <?php echo $_SESSION['username']; ?> (Admin)</h1>
    <nav>
        <a href="admin-dashboard.php" style="color:white;">Dashboard</a> |
        <a href="manage-users.php" style="color:white;">Manage Users</a> |
        <a href="logout.php" style="color:white;">Logout</a>
    </nav>
</header>


<div class="container">
    <h2>Add New Product</h2>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="text" name="image" placeholder="Image Path" required>
        <input type="number" name="price" placeholder="Price" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="submit" name="addProduct" value="Add Product">
    </form>

    <?php
    if (isset($_POST['addProduct'])) {
        $name = $_POST['name'];
        $image = $_POST['image'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $stmt = $conn->prepare("INSERT INTO products (name, image, price, description) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $name, $image, $price, $description);

        if ($stmt->execute()) {
            echo "<p style='color:green;'>Product added successfully!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
        }
    }
    ?>

    <!-- Manage Products Section -->
    <div class="product-list">
        <h2>Manage Products</h2>
        <?php
        $result = $conn->query("SELECT * FROM products");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product'>
                        <h3>{$row['name']}</h3>
                        <p>₹{$row['price']}</p>
                        <p>{$row['description']}</p>
                        <img src='{$row['image']}' alt='Product Image'>
                        <br>
                        <a class='action' href='edit-product.php?id={$row['id']}'>Edit</a>
                        <a class='action' href='delete-product.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this product?');\">Delete</a>
                      </div>";
            }
        } else {
            echo "<p>No products found.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>
