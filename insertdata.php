<?php
session_start();

// Include the database connection
include_once './config/database.php';

// Check if the form is submitted
if(isset($_POST['Flight_Number'])) {
    // Retrieve the Flight Number value from the form
    $flightNumber = $_POST['Flight_Number'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle file upload
    if(isset($_FILES['prof']) && $_FILES['prof']['error'] == 0) {
        // Read the image data
        $file_tmp = $_FILES['prof']['tmp_name'];
        $file_content = file_get_contents($file_tmp); // Read file contents directly into variable
    } else {
        // Handle case when no image is uploaded
        echo "No file uploaded.";
        exit;
    }
}

$passenger_count = 15;
$error_message = "Input Data Doesn't Match to Your Login Data.";

// Prepare and bind parameters for the main passenger insertion
$stmt_main_passenger = $conn->prepare("INSERT INTO main_passengers (Flight_ID, first_name, last_name, email, contact_number, dob, seat, accommodation, ticket_price, total_price, Status, prof, Airline) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt_main_passenger->bind_param("ssssssssddsss", $flight_id, $first_name_main, $last_name_main, $email_main, $contact_number_main, $dob_main, $seat_main, $accommodation_main, $main_ticket_price, $total_price_main, $status, $prof_payment, $airline);

// Retrieve data from $_POST array for the main passenger
$airline = $_POST['airline'];
$prof_payment = $file_content;
$flight_id = $flightNumber;
$first_name_main = $_POST['first_name_1'];
$last_name_main = $_POST['last_name_1'];
$email_main = $_POST['email_1'];
$contact_number_main = $_POST['contact_number_1'];
$dob_main = $_POST['dob_1'];
$seat_main = $_POST['seat_1'];
$main_ticket_price = $_POST['hidden_ticket_price_1'];
$accommodation_main = $_POST['accommodation_1'];
$total_price_main = $_POST["total_price"];
$status = 'Pending';

if ($stmt_main_passenger->execute() === TRUE) {
    // Get the ID of the main passenger
    $main_passenger_id = $stmt_main_passenger->insert_id;

    // Insert other passengers
    for ($i = 2; $i <= $passenger_count; $i++) {
        if (isset($_POST['first_name_' . $i])) {
            $first_name = $_POST['first_name_' . $i];
            $last_name = $_POST['last_name_' . $i];
            $email = $_POST['email_' . $i];
            $contact_number = $_POST['contact_number_' . $i];
            $dob = $_POST['dob_' . $i];
            $seat = $_POST['seat_' . $i];
            $ticket_price = $_POST['hidden_ticket_price_' . $i];
            $accommodation = $_POST['accommodation_' . $i];

            // Handle ID proof file upload for each additional passenger
            if (isset($_FILES['IDprofs_' . $i]) && $_FILES['IDprofs_' . $i]['error'] == 0) {
                $ID_tmp = $_FILES['IDprofs_' . $i]['tmp_name'];
                $ID_content = file_get_contents($ID_tmp);
            } else {
                echo "Error: Invalid file upload.";
                $conn->rollback();
                exit;
            }

            // Insert other passengers
            $stmt_other_passenger = $conn->prepare("INSERT INTO Other_passengers (Flight_ID, MainPassenger, first_name, last_name, email, contact_number, dob, seat, accommodation, ticket_price, Status, Airline, IDUpload) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt_other_passenger->bind_param("sisssssssdssb", $flightNumber, $main_passenger_id, $first_name, $last_name, $email, $contact_number, $dob, $seat, $accommodation, $ticket_price, $status, $airline, $ID_content);
            $stmt_other_passenger->send_long_data(12, $ID_content);

            if ($stmt_other_passenger->execute() !== TRUE) {
                echo "Error: " . $stmt_other_passenger->error;
                $conn->rollback();
                exit;
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