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
    <link href="./assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/purchase.css">
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
            <th>Action</th> <!-- Added Action column -->
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
            echo "<td><button class='btn btn-outline-primary view-btn' data-mainpassenger='" . $main_passenger["MainPassenger"] . "'>View Details</button></td>"; // Updated button with data attribute
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
            <th>Action</th> <!-- Added Action column -->
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
                echo "<td><button class='btn btn-outline-primary view-btn' data-mainpassenger='" . $other_passenger["MainPassenger"] . "'>View Details</button></td>"; // Updated button with data attribute
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No other passenger bookings found</td></tr>";
        }
        ?>
    </table>
</div>

<div class="modal fade" id="view-details">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Booking Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" id="modal-body">
    <div class="row">
        <div class="col-md-12">
            <p><strong>Main Passenger:</strong> <span id="mainPassenger"></span></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p><strong>Flight ID:</strong> <span id="flightID"></span></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p><strong>First Name:</strong> <span id="firstName"></span></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p><strong>Last Name:</strong> <span id="lastName"></span></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p><strong>Status:</strong> <span id="status"></span></p>
        </div>
    </div>
</div>


            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button class='btn btn-success download-btn'>Download as Ticket</button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
crossorigin="anonymous"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script>
$(document).ready(function(){
    $('.view-btn').click(function(){
        var mainPassenger = $(this).data('mainpassenger');
        var flightID = $(this).closest('tr').find('td:eq(1)').text();
        var firstName = $(this).closest('tr').find('td:eq(2)').text();
        var lastName = $(this).closest('tr').find('td:eq(3)').text();
        var status = $(this).closest('tr').find('td:eq(4)').text();

        // Populate modal with data
        $('#mainPassenger').text(mainPassenger);
        $('#flightID').text(flightID);
        $('#firstName').text(firstName);
        $('#lastName').text(lastName);
        $('#status').text(status);

        $('#view-details').modal('show');
    });

    // Download Ticket button click event
    $(document).on('click', '.download-btn', function(){
        // Convert ticket details to image and download
        var ticketDetails = $('#modal-body').html();
        html2canvas(document.querySelector("#modal-body")).then(canvas => {
            var link = document.createElement('a');
            link.download = 'ticket.png';
            link.href = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
            link.click();
        });
    });
});

</script>


</body>
</html>
