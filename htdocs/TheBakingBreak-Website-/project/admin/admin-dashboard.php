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
    <link rel="stylesheet" href="admin-dashboard.css">
</head>

<body>

    <header>
        <nav>
            <div class="admin-nav">
                <div class="logo"> <a href="https://www.google.com/search?q=the+baking+break&oq=&aqs=chrome.0.35i39i362l8.360970j0j7&sourceid=chrome&ie=UTF-8"> <img src="../image/2D-PNG.png" alt="The Baking Break" width="150px" height="120px"> </a>
                </div>
                <h1 style="align-content: center; margin-left: 30px;">Welcome, <?php echo $_SESSION['username']; ?> (Admin)</h1>
            </div>
            <div class="nav-a">
                <a href="admin-dashboard.php" style="color:white; margin-right: 30px; font-weight: bold;">Dashboard</a>
                <a href="manage-users.php" style="color:white; margin-right: 30px; font-weight: bold;">Manage Users</a>
                <a href="logout.php" style="color:white; margin-right: 30px; font-weight: bold;">Logout</a>
            </div>
        </nav>
    </header>

    <div class="container">
        <h2>Add New Product</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Product Name" required>
            <input type="text" name="image" placeholder="Image Filename (e.g., product.png)" required>
            <input type="number" name="price" placeholder="Price" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <select name="category" required>
                <option value="">Select Category</option>
                <option value="bakeware">Bakeware</option>
                <option value="featured">Featured</option>
                <option value="bestseller">Best Sellers</option>
            </select>
            <input type="submit" name="addProduct" value="Add Product">
        </form>

        <?php
        if (isset($_POST['addProduct'])) {
            $name = $_POST['name'];
            $image = $_POST['image'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $category = $_POST['category'];

            $stmt = $conn->prepare("INSERT INTO products (name, image, price, description, category) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiss", $name, $image, $price, $description, $category);

            if ($stmt->execute()) {
                echo "<p style='color:green;'>Product added successfully!</p>";
            } else {
                echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
            }
        }
        ?>

        <!-- Manage Products Section -->
        <h2>Manage Products</h2>
        <div class="product-list">

            <?php
            $result = $conn->query("SELECT * FROM products");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product'>
                        <h3>{$row['name']}</h3>
                        <p>₹{$row['price']}</p>
                        <p>{$row['description']}</p>
                        <p><strong>Category:</strong> {$row['category']}</p>
                        <img src='../image/{$row['image']}' alt='Product Image'>
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
