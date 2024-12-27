
<?php


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
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Basic validation
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert data into the database
        $sql = "INSERT INTO users (name, email, pwd) VALUES ('$fullName', '$email', '$hashedPassword')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Sign-Up Successful!');</script>";
           
            // Redirect to a protected page
            header("Location: login.php");
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Sign Up Form</title>
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
        .signup-container {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 360px;
            text-align: center;
        }
        .signup-container h2 {
            margin-bottom: 25px;
            font-size: 24px;
            color: #2c3e50;
            letter-spacing: 1px;
        }
        .signup-container input {
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            border: 1px solid #dcdde1;
            border-radius: 8px;
            font-size: 16px;
            background: #f9f9f9;
            transition: all 0.3s;
        }
        .signup-container input:focus {
            outline: none;
            border-color: #3498db;
            background: #ffffff;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.3);
        }
        .signup-container button {
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
        .signup-container button:hover {
            background: #2980b9;
        }
        .signup-container p {
            margin-top: 15px;
            font-size: 14px;
            color: #7f8c8d;
        }
        .signup-container a {
            color: #3498db;
            text-decoration: none;
            font-weight: 500;
        }
        .signup-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Create an Account</h2>
        <form method="POST" action="">
            <input type="text" name="fullName" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
