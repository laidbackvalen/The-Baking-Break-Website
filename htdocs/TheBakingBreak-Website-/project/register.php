<?php
    include 'connect_user.php';

    // Handle sign up request
    if(isset($_POST['signUp'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Hash password securely using password_hash()
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if the email already exists in the database
        $checkEmail = "SELECT * FROM user WHERE email=?";
        $stmt = $conn->prepare($checkEmail);
        $stmt->bind_param("s", $email); // "s" denotes string type for email
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows > 0){
            echo "Email Address Already Exists!";
        }
        else{
            // Insert new user into the database
            $insertQuery = "INSERT INTO user(username, password, email) VALUES(?, ?, ?)";
            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param("sss", $username, $hashedPassword, $email); // "sss" denotes three string parameters
            if($stmt->execute()){
                header("Location: login-form.php");
            }
            else{
                echo "Error: " . $stmt->error;
            }
        }
    }

    // Handle sign in request
    if(isset($_POST['signIn'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Query to fetch user based on email and password
        $sql = "SELECT * FROM user WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email); // "s" denotes string type for email
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            
            // Verify password using password_verify() to check the hash
            if(password_verify($password, $row['password'])){
                session_start();
                $_SESSION['email'] = $row['email'];
                header("Location: index.php");
                exit();
            } else {
                echo "Incorrect password.";
            }
        }
        else{
            echo "Not Found, Incorrect Email or Password";
        }
    }
?>
