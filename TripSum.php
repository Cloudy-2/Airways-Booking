<?php
// Include your database connection file
include './config/database.php';

// Retrieve form data using $_GET, depending on the form method
$flightNumber = isset($_GET['Flight_Number']) ? $_GET['Flight_Number'] : null;
$departure = isset($_GET['Departure']) ? $_GET['Departure'] : null;
$departureDate = isset($_GET['Departure_Date']) ? $_GET['Departure_Date'] : null;
$departureTime = isset($_GET['Departure_Time']) ? $_GET['Departure_Time'] : null;
$arrival = isset($_GET['Arrival']) ? $_GET['Arrival'] : null;
$arrivalDate = isset($_GET['Arrival_Date']) ? $_GET['Arrival_Date'] : null;
$arrivalTime = isset($_GET['Arrival_Time']) ? $_GET['Arrival_Time'] : null;
$price = isset($_GET['Price']) ? $_GET['Price'] : null;
$passengerEmail = isset($_GET['Passenger_Email']) ? $_GET['Passenger_Email'] : null;

// Check if any required fields are missing
if (is_null($flightNumber) || is_null($departure) || is_null($departureDate) || 
    is_null($departureTime) || is_null($arrival) || is_null($arrivalDate) || 
    is_null($arrivalTime) || is_null($price) || is_null($passengerEmail)) {
    echo "Error: Missing required fields.";
    exit;
}

// Prepare SQL statement
$sql = "INSERT INTO tripsum (trip_fno, trip_dep, trip_depdate, trip_deptime, trip_arrival, trip_ardate, trip_artime, trip_price, trip_email)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare statement
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("sssssssss", $flightNumber, $departure, $departureDate, $departureTime, $arrival, $arrivalDate, $arrivalTime, $price, $passengerEmail);

// Execute statement
if ($stmt->execute()) {
    // Insert successful
    echo "Data inserted successfully!";
} else {
    // Insert failed
    echo "Error inserting data.";
}

// Close statement and database connection
$stmt->close();
$conn->close();
?>
