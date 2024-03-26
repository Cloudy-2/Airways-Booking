<?php include('./models/LoginReq.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Skyline - Login</title>
<link rel="icon" href="./assets/images/favicon.jpg">
<link rel="stylesheet" href="./css/login.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="./assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Skyline Login</h1>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Flights</a></li>
            <li><a href="#">Analytics</a></li>
            <?php
            if(isset($_SESSION['username'])) {
                // If the user is logged in, display the logout button
                echo '<li><a href="logout.php">Logout</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>
<main>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" method="post">
            <input type="text" id="username" name="username" placeholder="Username" required autocomplete="username"><br>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <!-- Swap the positions of "Select User" dropdown and "Show Password" checkbox -->
            <select name="user_type" id="user_type" required>
                <option value="">Select User Type</option>
                <option value="admin">Administrator</option>
                <option value="regular">Regular User</option>
            </select><br>
            <div style="position: relative;">
                
                <input type="checkbox" id="show-password">
                <label for="show-password">Show Password</label>
            </div><br>
            <input type="submit" value="Login">
            <?php if(isset($errorMessage)): ?>
                <p id="errorMessage" style="text-align: center; margin-top: 10px; color: red;"><?php echo $errorMessage; ?></p>
            <?php endif; ?>
            <p style="text-align: center;"><a href="registration.php">No account? register here</a>.</p>
        </form>
    </div>
</main>
<footer>
    <p>&copy; 2024 Skyline Airways PH. All rights reserved.</p>
</footer>
<script src="./js/login.js"></script>
</body>
</html>




