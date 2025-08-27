<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .main-container{
            display: block;
            justify-content: center;
            align-items: center;
        }
        
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 100vh;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        .logo {
            text-align: center;
            margin-bottom: 10px; /* Adjust spacing */
        }
        
        .logo img {
            width: 250px; /* Adjust size as needed */
        }
        
        .signin-text, .signup-text {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
        }
        
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 400px; /* Adjust width if needed */
            text-align: center;
            margin: 0;
            
        }
        
        .form-container img {
            width: 50%;
            margin-bottom: 20px;
        }
        
        .form-group {
            width: 100%;
            margin-bottom: 15px;
            text-align: left;
        }
        
        label {
            font-weight: bold;
            display: flex;
            margin-bottom: 5px;
        }
        
        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        button {
            background-color: #fc2fcc;
            color: white;
            border: none;
            padding: 12px;
            margin-top: 20px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }
        
        button:hover {
            background-color: #d129d8;
        }
        
        .or {
            font-size: 1.1rem;
            margin-top: 0.5rem;
            text-align: center;
        }
        
        .links {
            display: block;
            text-align: center;
            font-weight: bold;
            margin-top: 0.9rem;
        }
        
        /* Fixing form transition */
        #signup, #signIn {
            position: absolute;
            width: 100vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s ease-in-out;
        }
        
        .hidden {
            opacity: 0;
            pointer-events: none;
        }
        
        
    </style>
</head>

<body>
    <div class="main-container">
    <div class="container" id="signup" style="display: none;">
        <div class="logo">
            <img src="image/The Baking Break_NAME_PIC.png" alt="The Baking Break Logo">
        </div>

        <h2 class="signup-text">Register</h2>

        <div class="form-container" style="margin-left:560px;">
            <img src="image/login.png" alt="Login Image">

            <form method="POST" action="register.php">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter Username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Enter Email" required>
                </div>

                <!-- <div class="remember">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                </div> -->

               <input type="submit" class="button" value="Sign Up" name="signUp">

                <div class="forgot" style="color: white;">
                    <p>Forgotten Account?</p>
                    <p>Sign up for The Baking Break</p>
                </div>
            </form>
            <p class="or">--------or----------</p>
            <div class="icons">
                <i class="fab fa-google"></i>
                <i class="fab fa-facebook"></i>
            </div>
            <div class="links">
                <p>Already Have Account?</p>
                <button id="signInButton" style="background-color:#d129d8;">Sign In</button>
            </div>
        </div>
    </div>

    <div class="container" id="signIn">
    <div class="logo">
        <img src="image/The Baking Break_NAME_PIC.png" alt="The Baking Break Logo">
    </div>

    <h2 class="signin-text">SignIn Form</h2>

    <div class="form-container">
        <img src="image/login.png" alt="Login Image">

        <!-- Sign In Form -->
        <form method="POST" action="index.php"> <!-- Change action to login.php or appropriate file -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter Email" required> <!-- Change username to email -->
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
            </div>

            <p class="recover">
                <a href="#">Recover Password</a>
            </p>
            <input type="submit" class="button" value="Sign In" name="signIn">

            <div class="forgot" style="color: white;">
                <p>Forgotten Account?</p>
                <p>Sign up for The Baking Break</p>
            </div>
        </form>

        <p class="or">--------or----------</p>

        <!-- Social Media Icons (Optional) -->
        <div class="icons">
            <i class="fab fa-google"></i>
            <i class="fab fa-facebook"></i>
        </div>

        <!-- Sign Up Link -->
        <div class="links">
            <p>Don't Have an Account Yet?</p>
            <button id="signUpButton" style="background-color:#d129d8;">Sign Up</button> <!-- Sign Up button (can trigger a modal or redirect) -->
        </div>
    </div>
</div>

    <script>
        // Toggle between SignIn and SignUp forms
        document.getElementById("signUpButton").addEventListener("click", function () {
            document.getElementById("signIn").style.display = "none";
            document.getElementById("signup").style.display = "block";
        });

        document.getElementById("signInButton").addEventListener("click", function () {
            document.getElementById("signup").style.display = "none";
            document.getElementById("signIn").style.display = "block";
        });
    </script>

</body>

</html>
