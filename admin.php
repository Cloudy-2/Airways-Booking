<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <title>Skyline - Admin Dashboard</title>
    <link rel="icon" href="./assets/images/favicon.jpg">
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
            session_start(); // Start the session
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
                // If the user is not logged in, display a login link
                echo '<li><a href="login.php">Login</a></li>';
            }
            ?> 
        </ul>  
    </nav>
</header> 
<main>
<style>
        main {
            width: 80%;
            margin: auto; /* Center the main content */
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .delete-btn:hover {
            background-color: #da190b;
        }
    </style>
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
            session_start(); // Start the session
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
                // If the user is not logged in, display a login link
                echo '<li><a href="login.php">Login</a></li>';
            }
            ?> 
        </ul>  
    </nav>
</header> 
<main>
    <?php
    include './config/database.php';

    // Retrieve main passenger data
    $stmt_get_main_passenger = $conn->prepare("SELECT * FROM main_passengers");
    $stmt_get_main_passenger->execute();
    $result_main_passenger = $stmt_get_main_passenger->get_result();

    echo "<h2>Main Passenger Data</h2>";
    echo "<table>";
    echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Action</th></tr>";
    while ($main_passenger_data = $result_main_passenger->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $main_passenger_data['first_name'] . "</td>";
        echo "<td>" . $main_passenger_data['last_name'] . "</td>";
        echo "<td>" . $main_passenger_data['email'] . "</td>";
        echo "<td><button class='btn update-btn'>Update</button>";
        echo "<button class='btn delete-btn'>Delete</button></td>";
        echo "</tr>";

        // Retrieve and display other passengers' data for this main passenger
        $main_passenger_id = $main_passenger_data['MainPassenger'];
        $stmt_get_other_passengers = $conn->prepare("SELECT * FROM Other_passengers WHERE MainPassenger = ?");
        $stmt_get_other_passengers->bind_param("i", $main_passenger_id);
        $stmt_get_other_passengers->execute();
        $result_other_passengers = $stmt_get_other_passengers->get_result();

        echo "<h3>Other Passengers Data</h3>";
        echo "<table>";
        echo "<tr><th>Main Passenger</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Action</th></tr>";
        while ($row = $result_other_passengers->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['MainPassenger'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td><button class='btn update-btn'>Update</button>";
            echo "<button class='btn delete-btn'>Delete</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    echo "</table>";
    ?>
   
</main>      
<script src="./js/adminfunct.js"></script>
</body>
</html>
