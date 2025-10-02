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
/* General body */
body { 
    font-family: 'Poppins', sans-serif; 
    margin: 0; 
    background-color: #f9f9f9;
}

/* Header */
header { 
    background: #fc2fcc; 
    color: white; 
    padding: 20px; 
    text-align: center; 
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}
header nav a { 
    color: white; 
    margin: 0 10px; 
    text-decoration: none; 
    font-weight: 500;
}
header nav a:hover {
    text-decoration: underline;
}

/* Container */
.container { 
    padding: 30px 20px; 
    max-width: 1200px; 
    margin: auto;
}

/* Form styles */
form input, form select, form textarea { 
    width: 100%; 
    padding: 12px; 
    margin-bottom: 15px; 
    border: 1px solid #ccc; 
    border-radius: 10px;
    font-size: 16px;
}
form input[type="submit"] { 
    background: #529a82; 
    color: white; 
    border: none; 
    cursor: pointer; 
    padding: 12px 20px; 
    font-size: 16px;
    border-radius: 15px;
    transition: all 0.3s ease-in-out;
}
form input[type="submit"]:hover {
    background-color: #417a63;
}

/* Product list container */
/* Product list container: flex wrap for even spacing */
.product-list {
    display: flex;
    flex-wrap: wrap;      /* allow multiple rows */
    gap: 20px;            /* spacing between cards */
    margin-top: 40px;
    justify-content: flex-start; /* align cards to start */
    padding-left: 70px;
}

/* Each product card */
.product {
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    background: white;
    padding: 20px;
    width: 280px;         /* fixed width for even alignment */
    display: flex;
    flex-direction: column; /* stack image and text vertically */
    align-items: center;
    transition: transform 0.2s, box-shadow 0.2s;
}
.product:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

/* Product image */
.product img {
    width: 100%;          /* fill card width */
    height: 180px;        /* fixed height */
    border-radius: 10px;
    object-fit: cover;
    margin-bottom: 15px;
}

/* Product text/details */
.product-details {
    text-align: center;   /* center-align text */
}

.product h3 {
    margin: 0 0 10px 0;
    font-size: 18px;
    color: #529a82;
}

.product p {
    margin: 5px 0;
    font-size: 16px;
    color: #555;
}

/* Action links */
a.action {
    margin: 5px 10px 0 10px;
    color: #fc2fcc;
    text-decoration: none;
    font-weight: 500;
}
a.action:hover {
    text-decoration: underline;
}

/* Responsive: adjust for smaller screens */
@media (max-width: 768px) {
    .product-list {
        justify-content: center;
    }
    .product {
        width: 90%;      /* almost full width on mobile */
    }
}


/* Responsive for smaller screens */
@media (max-width: 768px) {
    .product { 
        flex-direction: column; 
        align-items: flex-start; 
    }
    .product img { 
        margin-bottom: 15px; 
    }
}
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
