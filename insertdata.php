<?php
session_start();

// Include the database connection
include_once './config/database.php';

$passenger_count =15;

// Insert main passenger
$stmt_main_passenger = $conn->prepare("INSERT INTO main_passengers (first_name, last_name, email, contact_number, dob, seat, accommodation, ticket_price, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt_main_passenger->bind_param("ssssssssd", $first_name_main, $last_name_main, $email_main, $contact_number_main, $dob_main, $seat_main, $accommodation_main, $main_ticket_price, $total_price_main);

// Retrieve data from $_POST array for the main passenger
$first_name_main = $_POST['first_name_1'];
$last_name_main = $_POST['last_name_1'];
$email_main = $_POST['email_1'];
$contact_number_main = $_POST['contact_number_1'];
$dob_main = $_POST['dob_1'];
$seat_main = $_POST['seat_1'];
$main_ticket_price = $_POST['hidden_ticket_price_1']; // Retrieve updated ticket price from the form
$accommodation_main = $_POST['accommodation_1'];

$total_price_main = $_POST["total_price"];

// Execute the statement for the main passenger
if ($stmt_main_passenger->execute() === TRUE) {
    // Get the ID of the main passenger
    $main_passenger_id = $stmt_main_passenger->insert_id;

    // Insert other passengers
    for ($i = 2; $i <= $passenger_count; $i++) {
        // Obtain passenger details from $_POST array
        if (isset($_POST['first_name_' . $i])) {
            // Retrieve data from $_POST array for other passengers
            $first_name = $_POST['first_name_' . $i];
            $last_name = $_POST['last_name_' . $i];
            $email = $_POST['email_' . $i];
            $contact_number = $_POST['contact_number_' . $i];
            $dob = $_POST['dob_' . $i];
            $seat = $_POST['seat_' . $i];
            $ticket_price = $_POST['hidden_ticket_price_' . $i]; // Retrieve updated ticket price from the form
            $accommodation = $_POST['accommodation_' . $i];

            // Prepare SQL statement for other passengers
            $stmt_other_passenger = $conn->prepare("INSERT INTO Other_passengers (main_passenger_id, first_name, last_name, email, contact_number, dob, seat, accommodation, ticket_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt_other_passenger->bind_param("isssssssd", $main_passenger_id, $first_name, $last_name, $email, $contact_number, $dob, $seat, $accommodation, $ticket_price);

            // Execute the statement for other passengers
            if ($stmt_other_passenger->execute() !== TRUE) {
                echo "Error: " . $stmt_other_passenger->error;
                // Rollback the transaction if an error occurs
                $conn->rollback();
                exit; // Exit the script if an error occurs
            }
        }
    }
    echo "Passenger details inserted successfully.";
    header("Location: pay_success.php");
} else {
    echo "Error: " . $stmt_main_passenger->error;
}

// Close statements
$stmt_main_passenger->close();
if (isset($stmt_other_passenger)) {
    $stmt_other_passenger->close();
}

// Close connection
$conn->close();

?>