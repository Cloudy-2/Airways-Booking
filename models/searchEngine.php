<?php
// Include your database connection file here
// Example:
// include_once "db_connect.php";
include_once './config/database.php';

if ($conn) {
// Retrieve user input from the form
$location = $_POST['locationInput'];
$destination = $_POST['destinationInput'];
$departureDate = $_POST['departureInput'];

// Perform a database query to search for flights based on user input
// Example query (make sure to sanitize user input to prevent SQL injection)
// $sql = "SELECT * FROM flights WHERE location = '$location' AND destination = '$destination' AND departure_date = '$departureDate'";
$sql = "SELECT * FROM flights WHERE departure_location = '$location' AND arrival_location = '$distanation'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Output table header
    echo "<table>";
    echo "<tr><th>Flight Number</th><th>Departure</th><th>Departure Date</th><th>Arrival</th><th>Arrival Date</th><th>Price</th><th>Book </th></tr>";

// Output data of each row
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["flight_number"] . "</td>";
    echo "<td>" . $row["departure_location"] . "</td>";
    echo "<td>" . $date . "</td>";
    echo "<td>" . $row["arrival_location"] . "</td>";
    echo "<td>" . $date . "</td>";
    echo "<td>$" . $row["price"] . "</td>";
    echo "<td><button class='book-now-button' data-flight-id='" . $row["flight_number"] . "'>Book Now</button></td>";
}
echo "</table>";
}else{
    echo "connection field";
}


} else {
echo "No flights found.";
}


?>
