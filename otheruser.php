<?php
include './config/database.php';

// Check if email is provided
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    // Query to retrieve other passenger information based on email from the other_passengers table
    $stmt_other_passenger = $conn->prepare("SELECT * FROM other_passengers WHERE `email` = ?");
    $stmt_other_passenger->bind_param("s", $email);
    $stmt_other_passenger->execute();
    $result_other_passenger = $stmt_other_passenger->get_result();
} else {
    echo "Email not provided";
    exit; // Terminate script execution if email not provided
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
</head>
<body>
    <h1>User Information</h1>
    <h2>Main Passenger</h2>
    <table border="1">
    <tr>
            <th>Other Passenger ID</th>
            <th>Main Passenger ID</th>
            <th>Flight Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Seat</th>
            <th>Accommodation</th>
            <th>Status</th>
            <th>Seat#</th>
        </tr>
        <?php while ($row = $result_other_passenger->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['MainPassenger']; ?></td>
                <td><?php echo $row['Flight_ID']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['contact_number']; ?></td>
                <td><?php echo $row['seat']; ?></td>
                <td><?php echo $row['accommodation']; ?></td>
                <td><?php echo $row['Status']; ?></td>
                <td><?php echo $row['Seat_Number']; ?></td>
            </tr>
        <?php } ?>
    </table>
    </body>
</html>