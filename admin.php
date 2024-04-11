<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <title>Skyline - Admin Dashboard</title>
    <link rel="icon" href="./assets/images/icon.jpg">
    <link rel="stylesheet" href="./css/admin_dasboard.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="./assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Skyline Admin Page</h1>
        </div>
    </div>
    <nav>
        <ul>

            <li><a href="#">Ongoing Flights</a></li>
            <li><a href="#">Analytics</a></li>
            <?php
            session_start();
            if(isset($_SESSION['username'])) {
                // If the user is logged in, display a welcome message which will serve as the dropdown button
                echo '<div class="dropdown">';
                echo '<button class="dropbtn">Hello, ' . $_SESSION['username'] . '</button>';
                echo '<div class="dropdown-content">';
                echo '<a href="#">Profile</a>';
                echo '<a href="logout.php" class="logout">Logout</a>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<li><a href="login.php">Login</a></li>';
            }
            ?> 
        </ul>  
    </nav>
</header> 
<main>
    <div class="content">
    </div>
</main>      
<script src="./js/admin.js"></script>
</body>
</html>