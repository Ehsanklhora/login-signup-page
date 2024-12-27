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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);

    if (!isset($_SESSION['email'])) {
        echo "<script>alert('Session expired. Please try again.'); window.location.href='forgot_password.php';</script>";
        exit();
    }

    $email = $_SESSION['email'];

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    // Update the password in the database
    $query = "UPDATE users SET pwd='$hashed_password' WHERE email='$email'";
    if (mysqli_query($conn, $query)) {
        // Success
        echo "<script>alert('Password reset successfully. Please log in.'); window.location.href='login.php';</script>";
    } else {
        // Error
        echo "<script>alert('Error resetting password. Please try again.'); window.location.href='new_password.php';</script>";
    }

    session_destroy(); // Clear session after password reset
}

mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .reset-container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 350px;
            text-align: center;
        }
        .reset-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .reset-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .reset-container input:focus {
            outline: none;
            border-color: #00c6ff;
            box-shadow: 0 0 8px rgba(0, 198, 255, 0.3);
        }
        .reset-container button {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            color: #fff;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .reset-container button:hover {
            background: linear-gradient(to right, #0072ff, #00c6ff);
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <h2>Reset Password</h2>
        <form method="POST" action="">
            <input type="password" name="new_password" placeholder="Enter New Password" required>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
