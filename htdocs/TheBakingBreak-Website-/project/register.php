<?php
include 'connect_user.php'; // Database connection file

// ---------- SIGN UP PROCESS ----------
if (isset($_POST['signUp'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate fields
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "<script>alert('All fields are required!'); window.history.back();</script>";
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format!'); window.history.back();</script>";
        exit();
    }

    // Check password length
    if (strlen($password) < 6) {
        echo "<script>alert('Password must be at least 6 characters long!'); window.history.back();</script>";
        exit();
    }

    // Confirm password check
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit();
    }

    // Check if email already exists
    $checkEmail = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($checkEmail);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email already exists! Please use another one.'); window.history.back();</script>";
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user
    $role = 'user'; // default role for normal users
    $insertQuery = "INSERT INTO user (username, password, email, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssss", $username, $hashedPassword, $email, $role);



    if ($stmt->execute()) {
        echo "<script>alert('Registration successful! You can now sign in.'); window.location.href='login-form.php';</script>";
    } else {
        echo "<script>alert('Error occurred while registering.'); window.history.back();</script>";
    }
}

// ---------- SIGN IN PROCESS ----------
if (isset($_POST['signIn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate fields
    if (empty($email) || empty($password)) {
        echo "<script>alert('Please fill in both email and password!'); window.history.back();</script>";
        exit();
    }

    // Fetch user by email
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role']; // add this line

            // Redirect based on role
            if ($row['role'] == 'admin') {
                header("Location: admin-dashboard.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            echo "<script>alert('Incorrect password.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('No account found with this email.'); window.history.back();</script>";
    }
}
