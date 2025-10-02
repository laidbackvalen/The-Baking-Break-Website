<?php
session_start();
include 'connect_user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        // Redirect based on role
        if ($row['role'] == 'admin') {
            header("Location: admin-dashboard.php");
        } else {
            header("Location: index.php");
        }
    } else {
        echo "Invalid login";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Baking Break - Login & Registration</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
      background-image: url("image/tbb_poster_recent.png");
      background-repeat: no-repeat;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      display: none;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .container.active {
      display: flex;
    }

    .logo img {
      width: 200px;
      margin-bottom: 10px;
    }

    .form-container {
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 320px;
      text-align: center;
    }

    .form-group {
      text-align: left;
      margin-bottom: 15px;
    }

    label {
      font-weight: bold;
      font-size: 14px;
      display: block;
      margin-bottom: 5px;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
    }

    .button {
      background-color: #fc2fcc;
      color: white;
      border: none;
      padding: 12px;
      margin-top: 10px;
      width: 100%;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    .button:hover {
      background-color: #d129d8;
    }

    .links {
      margin-top: 15px;
    }

    .links button {
      background: none;
      border: none;
      color: #d129d8;
      cursor: pointer;
      font-weight: bold;
      font-size: 14px;
    }

    .error {
      color: red;
      font-size: 13px;
      text-align: left;
    }
  </style>
</head>
<body>
  <!-- SIGN UP FORM -->
  <div class="container" id="signup">
    <div class="logo">
      <img src="image/The Baking Break_NAME_PIC.png" alt="The Baking Break Logo">
    </div>
    <div class="form-container">
      <h2>Register</h2>
      <form method="POST" action="register.php" onsubmit="return validateSignup()">
        <div class="form-group">
          <label for="signup-username">Username</label>
          <input type="text" id="signup-username" name="username" placeholder="Enter Username" required>
        </div>

        <div class="form-group">
          <label for="signup-email">Email</label>
          <input type="email" id="signup-email" name="email" placeholder="Enter Email" required>
        </div>

        <div class="form-group">
          <label for="signup-password">Password</label>
          <input type="password" id="signup-password" name="password" placeholder="Enter Password" required minlength="6">
        </div>

        <div class="form-group">
          <label for="confirm-password">Confirm Password</label>
          <input type="password" id="confirm-password" name="confirm_password" placeholder="Re-enter Password" required minlength="6">
          <span id="password-error" class="error"></span>
        </div>

        <input type="submit" class="button" value="Sign Up" name="signUp">
      </form>

      <div class="links">
        <p>Already have an account? 
          <button onclick="showSignIn()">Sign In</button>
        </p>
      </div>
    </div>
  </div>

  <!-- SIGN IN FORM -->
  <div class="container active" id="signIn">
    <div class="logo">
      <img src="image/The Baking Break_NAME_PIC.png" alt="The Baking Break Logo">
    </div>
    <div class="form-container">
      <h2>Sign In</h2>
      <form method="POST" action="register.php">
        <div class="form-group">
          <label for="signin-email">Email</label>
          <input type="email" id="signin-email" name="email" placeholder="Enter Email" required>
        </div>

        <div class="form-group">
          <label for="signin-password">Password</label>
          <input type="password" id="signin-password" name="password" placeholder="Enter Password" required>
        </div>

        <input type="submit" class="button" value="Sign In" name="signIn">
      </form>

      <div class="links">
        <p>Don't have an account? 
          <button onclick="showSignUp()">Sign Up</button>
        </p>
      </div>
    </div>
  </div>

  <script>
    // Toggle between Sign In and Sign Up
    function showSignUp() {
      document.getElementById("signIn").classList.remove("active");
      document.getElementById("signup").classList.add("active");
    }

    function showSignIn() {
      document.getElementById("signup").classList.remove("active");
      document.getElementById("signIn").classList.add("active");
    }

    // Validate signup form
    function validateSignup() {
      const password = document.getElementById("signup-password").value;
      const confirmPassword = document.getElementById("confirm-password").value;
      const error = document.getElementById("password-error");

      if (password !== confirmPassword) {
        error.textContent = "Passwords do not match!";
        return false;
      } else {
        error.textContent = "";
        return true;
      }
    }
  </script>
</body>
</html>
