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
    <title>Manage Users - Admin</title>
    <link rel="stylesheet" href="admin-dashboard.css">
    <style>
        /* Container */
        .container {
            padding: 30px;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Table header */
        table th {
            background: #fc2fcc;
            color: white;
            padding: 15px;
            text-align: left;
            font-size: 16px;
        }

        /* Table cells */
        table td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            font-size: 15px;
            color: #333;
        }

        /* Alternate row coloring */
        table tr:nth-child(even) {
            background: #f9f9f9;
        }

        /* Hover effect */
        table tr:hover {
            background: #f1f1f1;
        }

        /* Action links */
        table td a {
            color: #529a82;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
            transition: color 0.2s ease;
        }

        table td a:hover {
            color: #fc2fcc;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <header>
        <nav>
            <div class="admin-nav">
                <div class="logo"> <a href="https://www.google.com/search?q=the+baking+break&oq=&aqs=chrome.0.35i39i362l8.360970j0j7&sourceid=chrome&ie=UTF-8"> <img src="../image/2D-PNG.png" alt="The Baking Break" width="150px" height="120px"> </a>
                </div>
                <h1 style="align-content: center; margin-left: 30px;">Manage Users</h1>
            </div>
            <div class="nav-a">
                <a href="admin-dashboard.php" style="color:white; margin-right: 30px; font-weight: bold;">Dashboard</a>
                <a href="manage-users.php" style="color:white; margin-right: 30px; font-weight: bold;">Manage Users</a>
                <a href="logout.php" style="color:white; margin-right: 30px; font-weight: bold;">Logout</a>
            </div>
        </nav>
    </header>

    <div class="container">
        <h2>User List</h2>
        <table border="1" cellpadding="10" cellspacing="0" style="width:100%; text-align:left;">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>

            <?php
            $result = $conn->query("SELECT * FROM user");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['role']}</td>
                        <td>
                            <a href='edit-user.php?id={$row['id']}'>Edit</a> | 
                            <a href='delete-user.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found.</td></tr>";
            }
            ?>
        </table>
    </div>

</body>

</html>