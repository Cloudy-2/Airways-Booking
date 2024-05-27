<?php
include './config/database.php';

// Check if email is provided
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Query to retrieve other passenger information based on email from the other_passengers table
    $stmt_other_passenger = $conn->prepare("SELECT * FROM other_passengers WHERE email = ?");
    $stmt_other_passenger->bind_param("s", $email);
    $stmt_other_passenger->execute();
    $result_other_passenger = $stmt_other_passenger->get_result();

    // Check if any rows returned
    if ($result_other_passenger->num_rows == 0) {
        echo "No passengers found with the provided email.";
        exit;
    }
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
    <style>
         table {
            width: 80%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
            font-size: large;
            
        }
        .image-container {
            margin-bottom: 20px;
        }
        .back-button {
            margin-top: 20px;
            
        }
    </style>
</head>
<body>
    <h1>User Information</h1>
    <h2>Other Passengers</h2>

    <?php
    // Fetch one row to display the image separately
    $row = $result_other_passenger->fetch_assoc();
    if (!empty($row['IDUpload'])) {
        echo '<div><img src="data:image/jpeg;base64,' . base64_encode($row['IDUpload']) . '" alt="ID Upload" style="max-width: 400px; max-height: 400px;"></div>';
    } else {
        echo '<div>No ID uploaded</div>';
    }

    // Reset the pointer to the beginning
    $result_other_passenger->data_seek(0);
    ?>

    <table>
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
    <div class="back-button">
        <button type="button" onclick="location.href='admin.php'">Back</button>
    </div>
</body>
</html>
