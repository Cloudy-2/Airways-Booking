<?php
session_start();
include_once './config/database.php';

// Check if the user is logged in as admin
if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Check if booking ID is provided in the URL
if (!isset($_GET['booking_id'])) {
    header("Location: dashboard.php");
    exit();
}

// Retrieve booking details from the database
if ($conn) {
    $booking_id = $_GET['booking_id'];

    // Retrieve booking details
    $booking_sql = "SELECT * FROM bookings WHERE booking_id = ?";
    $booking_stmt = $conn->prepare($booking_sql);
    $booking_stmt->bind_param("i", $booking_id);
    $booking_stmt->execute();
    $booking_result = $booking_stmt->get_result();

    // Retrieve passenger details
    $passenger_sql = "SELECT * FROM passengers WHERE booking_id = ?";
    $passenger_stmt = $conn->prepare($passenger_sql);
    $passenger_stmt->bind_param("i", $booking_id);
    $passenger_stmt->execute();
    $passenger_result = $passenger_stmt->get_result();
} else {
    echo "Connection failed: " . $conn->connect_error;
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content -->
</head>
<body>
    <!-- Header content -->
    <main>
        <div class="content">
            <h2>Passenger Details</h2>
            <h3>Booking ID: <?php echo $booking_id; ?></h3>
            <table>
                <thead>
                    <tr>
                        <th>Passenger</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Date of Birth</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Display passenger details
                    while ($passenger_row = $passenger_result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $passenger_row['passenger_id'] . "</td>";
                        echo "<td>" . $passenger_row['first_name'] . "</td>";
                        echo "<td>" . $passenger_row['last_name'] . "</td>";
                        echo "<td>" . $passenger_row['email'] . "</td>";
                        echo "<td>" . $passenger_row['contact_number'] . "</td>";
                        echo "<td>" . $passenger_row['dob'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <!-- Footer content -->
</body>
</html>
