<?php
    // Include the database connection file
    include_once '../config/database.php';

    // Check if the user_id, flight_id, and booking_date are set
    if(isset($_POST['user_id']) && isset($_POST['flight_id']) && isset($_POST['booking_date'])) {
        // Fetch parameters from the AJAX request
        $user_id = $_POST['user_id'];
        $flight_id = $_POST['flight_id'];
        $booking_date = $_POST['booking_date'];

        // SQL query to insert booking into the bookings table
        $sql = "INSERT INTO bookings (flight_id, passenger_id, booking_datetime) VALUES (?, ?, ?)";
        
        // Using prepared statement to prevent SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $flight_id, $user_id, $booking_date);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "Booking successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Missing parameters!";
    }
?>
