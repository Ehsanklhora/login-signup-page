<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            background: #eef2f3;
            color: #333;
        }

        /* Navigation Bar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #35495e;
            padding: 15px 30px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar .logo {
            font-size: 26px;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
        }

        .navbar ul {
            list-style: none;
            display: flex;
        }

        .navbar ul li {
            margin: 0 10px;
        }

        .navbar ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }

        .navbar ul li a:hover {
            background: #2c3e50;
            color: #fff;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .hero h1 {
            font-size: 56px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 25px;
            max-width: 600px;
            line-height: 1.8;
        }

        .hero button {
            background: #fff;
            color: #4facfe;
            border: none;
            padding: 14px 28px;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            font-weight: 500;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .hero button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

        /* Features Section */
        .features {
            padding: 60px 20px;
            text-align: center;
            background: #f9f9f9;
        }

        .features h2 {
            font-size: 34px;
            margin-bottom: 25px;
            font-weight: 600;
            color: #35495e;
        }

        .features .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .features .card {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .features .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .features .card h3 {
            margin-bottom: 15px;
            color: #4facfe;
            font-size: 20px;
            font-weight: 600;
        }

        .features .card p {
            font-size: 16px;
            color: #666;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            background: #35495e;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 14px;
        }

        .footer p {
            margin: 5px 0;
            line-height: 1.5;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="#" class="logo">MyWebsite</a>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Welcome to MyWebsite</h1>
        <p>Discover amazing content, services, and opportunities with us. Your journey starts here!</p>
        <button>Get Started</button>
    </div>

    <!-- Features Section -->
    <div class="features">
        <h2>Our Features</h2>
        <div class="cards">
            <div class="card">
                <h3>Feature 1</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros.</p>
            </div>
            <div class="card">
                <h3>Feature 2</h3>
                <p>Quisque fermentum tortor at sollicitudin finibus. Nulla facilisi. Mauris non lacinia orci.</p>
            </div>
            <div class="card">
                <h3>Feature 3</h3>
                <p>Curabitur tristique, metus in hendrerit placerat, neque felis malesuada libero, vitae.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 MyWebsite. All rights reserved.</p>
    </div>

</body>
</html>
