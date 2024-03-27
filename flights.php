<?php
// Start session
session_start();

include_once './config/database.php';

if ($conn) {
    // Retrieve user input from the form
    if(isset($_GET['locationInput']) && isset($_GET['destinationInput']) && isset($_GET['departureInput'])) {
        $location = $_GET['locationInput'];
        $destination = $_GET['destinationInput'];
        $departureDate = $_GET['departureInput'];

        // Perform a database query to search for flights based on user input
        $sql = "SELECT * FROM flights WHERE departure_location LIKE '%$location%' AND arrival_location LIKE '%$destination%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output table header
            echo "<table>";
            echo "<tr><th>Flight Number</th><th>Departure</th><th>Departure Date</th><th>Departure-Time</th><th>Arrival</th><th>Arrival Date</th><th>Arrival-Time</th><th>Price</th><th>Book</th></tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["flight_number"] . "</td>";
                echo "<td>" . $row["departure_location"] . "</td>";
                echo "<td>" . $departureDate . "</td>"; 
                echo "<td>" . $row["Departure-Time"] . "</td>";
                echo "<td>" . $row["arrival_location"] . "</td>";
                echo "<td>" . $departureDate . "</td>"; 
                echo "<td>" . $row["Arrival-Time"] . "</td>"; 
                echo "<td>₱" . $row["price"] . "</td>";
                // Check if user is logged in
                if(isset($_SESSION['username'])) {
                    echo "<td><button class='book-now-button' data-flight-id='" . $row["flight_number"] . "'>Book Now</button></td>";
                } else {
                    echo "<td><button disabled>Log in to Book</button></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No flights found.";
        }
    }
} else {
    echo "Connection failed: " . $conn->connect_error;
}
?>
