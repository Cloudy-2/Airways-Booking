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
    <title>Skyline - View Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="./assets/images/favicon.jpg">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url("../assets/images/registration.jpg");
            background-size: cover; 
            background-repeat: no-repeat; 
            background-position: center;
            background-attachment: fixed; 
            background-color: #f4f4f4;
            color: #333;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Align content at the start of the flex container */
            align-items: center; /* Center content horizontally */
        }
        body:before {
            content: "";
            background-color: rgba(0, 0, 0, 0.5); /* Transparent gray color */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Place the pseudo-element behind other content */
        }
        h1 {
            padding-top: 20px;
            font-family: 'Oswald', sans-serif;
            color: white;
            font-size: 50px;
            text-align: center;
            margin: 20px 0; /* Added margin to separate from container */
        }

        h2 {
            padding-bottom: 20px;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            color: white;
            text-align: center;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 1);
            width: 100%;
            max-width: 1800px;
            margin-top: 70px; /* Adjust margin-top as needed */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            color: white;
            
        }
        th, td {
            padding: 8px;
            text-align: center;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
            border: solid black 2px;
            background-color: rgba(242, 242, 242, 0.75);
            color: black;
        }
        th {
            background-color: black;
            color: white;
        }
        .image-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .image-container img {
            padding-top: 20px;
            max-width: 25%; /* Adjust the width as needed */
            height: auto;
            border-radius: 8px;
        }
        .back-button {
            padding-top: 20px;
            display: flex;
            justify-content: center;
        }
        .back-button button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .back-button button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <h1>User Information</h1>

    <div class="container">
        <h2>Main Passenger</h2>

        <?php
        // Fetch one row to display the image separately
        $row = $result_other_passenger->fetch_assoc();
        if (!empty($row['IDUpload'])) {
            echo '<div class="image-container"><img src="data:image/jpeg;base64,' . base64_encode($row['IDUpload']) . '" alt="ID Upload"></div>';
        } else {
            echo '<div class="image-container">No ID uploaded</div>';
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
    </div>
</body>
</html>
