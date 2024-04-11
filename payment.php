<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if the number of passengers is provided
if (!isset($_POST['passengers'])) {
    header("Location: booking.php");
    exit();
}

// Retrieve number of passengers from the form
$passenger_count = $_POST['passengers'];

$ticket_price = $_POST['ticket_price'];
$total_price = $ticket_price * $passenger_count;

include_once './config/database.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // Loop through each passenger to insert details into the database
    for ($i = 1; $i <= $passenger_count; $i++) {
        // Retrieve passenger details from the form
        $first_name = $_POST['first_name_' . $i];
        $last_name = $_POST['last_name_' . $i];
        $email = ($_POST['email_' . $i]) ?? '';
        $contact_number = ($_POST['contact_number_' . $i]) ?? '';
        $dob = $_POST['dob_' . $i];

        // SQL query to insert passenger details into the database using prepared statements
        $stmt = $conn->prepare("INSERT INTO passengers (first_name, last_name, email, contact_number, dob) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $first_name, $last_name, $email, $contact_number, $dob);
        $stmt->execute();

        // Check for errors
        if ($stmt->error) {
            throw new Exception("Error: " . $stmt->error);
        }
    }

    // Close statement
    $stmt->close();


    header("Location: index.php");
    exit();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
