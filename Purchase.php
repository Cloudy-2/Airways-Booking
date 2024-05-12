<?php 
session_start();
include './config/database.php';

$email = ""; // Initialize the $email variable

if(isset($_SESSION['username'])) {
    // Retrieve email of logged-in user from session
    $email = $_SESSION['username'];

    // Check if the logged-in user has any booking history or ongoing booking as a main passenger
    $sql_main = "SELECT `Flight_ID`, `MainPassenger`, `first_name`, `last_name`, `email`, `contact_number`, `dob`, `seat`, `accommodation`, `ticket_price`, `total_price`, `Status` FROM `main_passengers` WHERE email = '$email'";
    $result_main = $conn->query($sql_main);
}

$main_passenger_data = array(); // Array to store main passenger data
$other_passenger_data = array(); // Array to store other passenger data

if ($result_main->num_rows > 0) {
    // Fetch and store the main passenger data in an array
    while ($row = $result_main->fetch_assoc()) {
        $main_passenger_data[] = $row;
    }

    // Iterate over each main passenger to fetch associated other passengers
    foreach ($main_passenger_data as $main_passenger) {
        $mainPassengerID = $main_passenger['MainPassenger'];

        // Execute the query to retrieve other passenger data based on the MainPassengerID
        $sql_other = "SELECT `Flight_ID`, `id`, `MainPassenger`, `first_name`, `last_name`, `email`, `contact_number`, `dob`, `seat`, `accommodation`, `ticket_price`, `Status` FROM `other_passengers` WHERE MainPassenger = '$mainPassengerID'";
        $result_other = $conn->query($sql_other);

        // Fetch and store the other passenger data in the array
        while ($row = $result_other->fetch_assoc()) {
            $other_passenger_data[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Status</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .container {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<h2>Booking Status</h2>

<?php
if(empty($main_passenger_data)) {
    echo "<div class='container'><p>No main passenger bookings found</p></div>";
} else {
?>

<div class="container">
    <h3>Main Passenger</h3>
    <table>
        <tr>
            <th>Main Passenger</th>
            <th>Flight ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Status</th>
        </tr>
        <?php
        // Display main passenger data
        foreach ($main_passenger_data as $main_passenger) {
            echo "<tr>";
            echo "<td>" . $main_passenger["MainPassenger"] . "</td>";
            echo "<td>" . $main_passenger["Flight_ID"] . "</td>";
            echo "<td>" . $main_passenger["first_name"] . "</td>";
            echo "<td>" . $main_passenger["last_name"] . "</td>";
            echo "<td>" . $main_passenger["Status"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<?php } ?>

<div class="container">
    <h3>Other Passengers</h3>
    <table>
        <tr>
            <th>Main Passenger ID</th>
            <th>Flight ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Status</th>
        </tr>
        <?php
        // Display other passenger data
        if (!empty($other_passenger_data)) {
            foreach ($other_passenger_data as $other_passenger) {
                echo "<tr>";
                echo "<td>" . $other_passenger["MainPassenger"] . "</td>";
                echo "<td>" . $other_passenger["Flight_ID"] . "</td>";
                echo "<td>" . $other_passenger["first_name"] . "</td>";
                echo "<td>" . $other_passenger["last_name"] . "</td>";
                echo "<td>" . $other_passenger["Status"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No other passenger bookings found</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
