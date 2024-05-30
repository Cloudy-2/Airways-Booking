<?php
include './config/database.php';

// Check if email is provided
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Query to retrieve user information based on email from the logindata table
    $stmt = $conn->prepare("SELECT `reg_id`, `reg_firstname`, `reg_lastname`, `reg_email`, `reg_region`, `reg_province`, `reg_city`, `reg_barangay`, `reg_idUpload`, `gender`, `dob`, `age`, `status`, `phone`, `nationality` FROM `logindata` WHERE `reg_email` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists in logindata table
    if ($result->num_rows > 0) {
        // Fetch user information from logindata table
        $userData = $result->fetch_assoc();
    } else {
        echo "No user found with the provided email.";
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
        body {  background-image: url("../assets/images/registration.jpg");
            font-family: Arial, sans-serif;
            background-size: cover; 
            background-repeat: no-repeat; 
            background-position: center;
            background-attachment: fixed; 
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1400px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
         
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .image-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .back-button {
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
    <div class="container">
        <h1>User Information</h1>
        <h2>Main Passenger</h2>

        <?php if (!empty($userData['reg_idUpload'])): ?>
            <div class="image-container">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($userData['reg_idUpload']); ?>" alt="ID Upload">
            </div>
        <?php else: ?>
            <div class="image-container">No ID uploaded</div>
        <?php endif; ?>

        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Region</th>
                <th>Province</th>
                <th>City</th>
                <th>Barangay</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Status</th>
                <th>Phone</th>
                <th>Nationality</th>
            </tr>
            <tr>
                <td><?php echo $userData['reg_firstname']; ?></td>
                <td><?php echo $userData['reg_lastname']; ?></td>
                <td><?php echo $userData['reg_email']; ?></td>
                <td><?php echo $userData['reg_region']; ?></td>
                <td><?php echo $userData['reg_province']; ?></td>
                <td><?php echo $userData['reg_city']; ?></td>
                <td><?php echo $userData['reg_barangay']; ?></td>
                <td><?php echo $userData['gender']; ?></td>
                <td><?php echo $userData['dob']; ?></td>
                <td><?php echo $userData['age']; ?></td>
                <td><?php echo $userData['status']; ?></td>
                <td><?php echo $userData['phone']; ?></td>
                <td><?php echo $userData['nationality']; ?></td>
            </tr>
        </table>

        <div class="back-button">
            <button type="button" onclick="location.href='admin.php'">Back</button>
        </div>
    </div>
</body>
</html>
