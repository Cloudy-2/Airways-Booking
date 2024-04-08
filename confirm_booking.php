<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if the number of passengers is provided
if (!isset($_POST['passengers'])) {
    // Redirect the user back to the booking page if the number of passengers is not provided
    header("Location: booking.php?flight_id=" . $_GET['flight_id'] . "&departure_date=" . $_GET['departure_date'] . "&arrival_date=" . $_GET['arrival_date']);
    exit();
}

// Retrieve number of passengers from the form
$passenger_count = $_POST['passengers'];

$ticket_price = $_POST['price'];
$total_price = $ticket_price * $passenger_count;


include_once './config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/confirm_booking.css">
    <link rel="icon" href="./assets/images/favicon.jpg">
    <script src=""></script>    
    <script src=""></script>
    <script src=""></script>
    <title>Skyline - Confirm Booking</title>
</head>
<body>

<header>
    <div class="logo">
        <img src="./assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Skyline - Confirm Booking</h1>
        </div>
    </div>
    <nav>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="flights.php">Flights</a></li>
        <li><a href="offers.php">Offers</a></li>
        <?php
       
        echo '<li class="dropdown">'; 
        echo '<a class="dropbtn">Hello, ' . $_SESSION['username'] . '</a>'; 
        echo '<div class="dropdown-content">';
        echo '<a href="#">Profile</a>';
        echo '<a href="logout.php" class="logout">Logout</a>';
        echo '</div>';
        echo '</li>';
        ?>
    </ul>  
</nav>
</header> 

<main>
    <div class="passenger-details">
        <h2 style="padding-left: 620px;">Passenger Details</h2>
        <form action="payment.php" method="POST">
        <?php
            // Loop to generate form fields based on the number of passengers
            for ($i = 1; $i <= $passenger_count; $i++) {
                echo '<div class="passenger-info">';
                echo '<h3>Passenger ' . $i . '</h3>';
                echo '<label for="first_name_' . $i . '">First Name:</label>';
                echo '<input type="text" id="first_name_' . $i . '" name="first_name_' . $i . '" required>';
                echo '<label for="last_name_' . $i . '">Last Name:</label>';
                echo '<input type="text" id="last_name_' . $i . '" name="last_name_' . $i . '" required>';
                
                if ($i === 1) {
                    echo '<label for="email_' . $i . '">Email:</label>';
                    echo '<input type="email" id="email_' . $i . '" name="email_' . $i . '" required>';
                }
                if ($i === 1) {
                    echo '<label for="contact_number_' . $i . '">Contact Number:</label>';
                    echo '<input type="text" id="contact_number_' . $i . '" name="contact_number_' . $i . '" required>';
                }
                echo '<label for="dob_' . $i . '">Date of Birth:</label>';
                echo '<input type="date" id="dob_' . $i . '" name="dob_' . $i . '" required>';
                
                echo '</div>';
            }
            ?>

            <!-- Display total price -->
            <div class="total-price">
                <h3>Total Price: ₱<?php echo $total_price; ?></h3>
            </div>

            <!-- Pass the ticket price to the next page -->
            <input type="hidden" name="ticket_price" value="<?php echo $ticket_price; ?>">
            <div class="payment-methods">
        <h3>Available Payment Methods</h3>
        <ul>
        <div id="gcash-popup" class="popup gcash-popup">
        <span class="close-icon" onclick="togglePopup('gcash-popup')">&times;</span>
        <div class="gcash-payment">
            <h1>GCash</h1>
            <p>Merchant: Airways Flight Booking</p>
            <p>Amount: <?php echo $total_price; ?></p>
            <label for="mobile-number">Mobile number</label>
            <input type="number" id="mobile-number" placeholder="Enter your mobile number">
            <button id="gcash-pay-button">Login to pay with GCash</button>
        </div>
    </div>

    <!-- PayPal pop-up -->
    <div id="paypal-popup" class="popup paypal-popup">
        <span class="close-icon" onclick="togglePopup('paypal-popup')">&times;</span>
        <div class="paypal-login">
            <h1>PayPal</h1>
            <p>Email or mobile number</p>
            <input type="text" id="email-or-mobile" placeholder="Enter your email or mobile number">
            <p>Password</p>
            <input type="password" id="1password" placeholder="Enter your password">
            <button id="paypal-login-button">Log In</button>
        </div>
    </div>

    <!-- Sign-in pop-up -->
    <div id="sign-in-popup" class="popup sign-in-popup">
        <span class="close-icon" onclick="togglePopup('sign-in-popup')">&times;</span>
        <div class="sign-in-form">
            <img src="./assets/images/mastercard.jpg" alt="Credit Card" class="credit-card-image">
            <h1>Welcome Back!</h1>
            <p>
                <label for="username">Username</label>
                <input type="text" id="username" placeholder="Enter your username">
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Enter your password">
            </p>
            <button id="sign-in-button">Sign In</button>
        </div>
    </div>

    
        <ul>
            <li>
                <input type="radio" id="gcash-radio" name="payment-method" value="gcash" onclick="togglePopup('gcash-popup')">
                <label for="gcash-radio">GCash</label>
            </li>
            <li>
                <input type="radio" id="paypal-radio" name="payment-method" value="paypal" onclick="togglePopup('paypal-popup')">
                <label for="paypal-radio">PayPal</label>
            </li>
            <li>
                <input type="radio" id="sign-in-radio" name="payment-method" value="mastercard" onclick="togglePopup('sign-in-popup')">
                <label for="sign-in-radio">Mastercard</label>
            </li>
        </ul>
    </div>
        <input type="submit"  value="Confirm Booking"> </form>

<script src="./js/payment.js"></script>
</body>
</html> 