<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginandsignup";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check the user credentials
    $sql = "SELECT * FROM users WHERE email = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['pwd'])) {
            $_SESSION['username'] = $user['email'];
            echo "<script>alert('Login Successful!');</script>";
            // Redirect to a protected page
            header("Location: index.php");
        } else {
            echo "<script>alert('Invalid Password!');</script>";
        }
    } else {
        echo "<script>alert('User does not exist!');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
            text-align: center;
        }
        .login-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #2c3e50;
            letter-spacing: 1px;
        }
        .login-container input {
            width: 100%;
            padding-block: 14px;
            padding-left: 14px;
            margin: 12px 0;
            border: 1px solid #dcdde1;
            border-radius: 8px;
            font-size: 16px;
            background: #f9f9f9;
            transition: all 0.3s;
        }
        .login-container input:focus {
            outline: none;
            border-color: #3498db;
            background: #ffffff;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.3);
        }
        .login-container button {
            background: #3498db;
            color: #ffffff;
            padding: 14px;
            width: 100%;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
        }
        .login-container button:hover {
            background: #2980b9;
        }
        .login-container a {
            color: #3498db;
            text-decoration: none;
            font-weight: 500;
        }
        .login-container a:hover {
            text-decoration: underline;
        }
        .forgot-password {
            margin-top: 15px;
            font-size: 14px;
            color: #7f8c8d;
        }
        .signup-link {
            margin-top: 20px;
            font-size: 14px;
            color: #7f8c8d;
        }
        @media (max-width: 420px) {
            .login-container {
                width: 90%;
                padding: 20px;
            }
            .login-container h2 {
                font-size: 20px;
            }
            .login-container button {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Welcome Back</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="forgot-password">
            <a href="forgot_password.php">Forgot Password?</a>
        </div>
        <p class="signup-link">Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
</body>
</html>
