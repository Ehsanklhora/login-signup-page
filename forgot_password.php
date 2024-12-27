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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if the email exists in the database
    $query = "SELECT id FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Email exists, redirect to new_password.php
        session_start();
        $_SESSION['email'] = $email; // Store email in session
        header("Location: new_password.php");
        exit();
    } else {
        // Email not found, show error message
        echo "<script>alert('Email not found. Please try again.'); window.location.href='forgot_password.php';</script>";
    }
}

mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .forgot-container {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
            text-align: center;
        }
        .forgot-container h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
            font-weight: 600;
        }
        .forgot-container p {
            font-size: 14px;
            margin-bottom: 20px;
            color: #666;
        }
        .forgot-container input {
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            background: #f9f9f9;
            transition: all 0.3s ease-in-out;
        }
        .forgot-container input:focus {
            outline: none;
            border-color: #3498db;
            background: #ffffff;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.2);
        }
        .forgot-container button {
            background: #3498db;
            color: #fff;
            padding: 14px;
            width: 100%;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }
        .forgot-container button:hover {
            background: #1d73b7;
        }
        .forgot-container a {
            display: block;
            margin-top: 15px;
            font-size: 14px;
            color: #3498db;
            text-decoration: none;
        }
        .forgot-container a:hover {
            text-decoration: underline;
        }
        @media (max-width: 420px) {
            .forgot-container {
                width: 90%;
                padding: 20px;
            }
            .forgot-container h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="forgot-container">
        <h2>Forgot Password?</h2>
        <p>Enter your email address below, and we'll send you instructions to reset your password.</p>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Enter your email address" required>
            <button type="submit">Send Reset Link</button>
        </form>
        <a href="login.php">Back to Login</a>
    </div>
</body>
</html>
