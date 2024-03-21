
<?php
    // Include the database connection file
    include_once '../config/database.php';

    // Check if the database connection is established
    if ($conn) {
        // Check if the form has been submitted
        if(isset($_GET['from']) && isset($_GET['to']) && isset($_GET['date'])) {
            // Fetch search parameters from the form
            $from = $_GET['from'];
            $to = $_GET['to'];
            $date = $_GET['date'];

            // SQL query to search for flights
            $sql = "SELECT * FROM flights WHERE departure_location = '$from' AND arrival_location = '$to'";
                $result = $conn->query($sql);

                // Check if any flights were found
                if ($result->num_rows > 0) {
                    // Output table header
                    echo "<table>";
                    echo "<tr><th>Flight Number</th><th>Departure</th><th>Departure Date</th><th>Arrival</th><th>Arrival Date</th><th>Price</th><th>Book </th></tr>";

                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["flight_number"] . "</td>";
                        echo "<td>" . $row["departure_location"] . "</td>";
                        echo "<td>" . $date . "</td>"; // Departure date
                        echo "<td>" . $row["arrival_location"] . "</td>";
                        echo "<td>" . $date . "</td>"; // Arrival date
                        echo "<td>$" . $row["price"] . "</td>";
                        echo "<td><button class='book-now-button' data-flight-id='" . $row["flight_number"] . "'>Book Now</button></td>";
                    }

                    echo "</table>";
                } else {
                    echo "No flights found.";
                }
            } else {
                echo "Please log in to make a booking.";
            
        }
        // Close the database connection
        $conn->close();
    } else {
        echo "Failed to connect to the database.";
    }
    
?>
