<?php
include 'connect_user.php';
header('Content-Type: application/json');

$result = $conn->query("SELECT * FROM products");
$products = [];

while ($row = $result->fetch_assoc()) {
    $products[] = [
        "id" => $row["id"],
        "name" => $row["name"],
        "description" => $row["description"],
        "image" => "image/" . $row["image"], // adjust if your path differs
        "price" => (int)$row["price"],
        "discount" => "Minimum 20% Off" // optional static discount
    ];
}

echo json_encode($products);
