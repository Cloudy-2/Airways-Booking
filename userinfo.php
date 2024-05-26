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
</head>
<body>
    <h1>User Information</h1>
    <h2>Main Passenger</h2>
    <table border="1">
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
            <th>ID Upload</th>
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
            <td><img src="data:image/jpeg;base64,<?php echo base64_encode($userData['reg_idUpload']); ?>" alt="ID Upload" style="max-width: 200px; max-height: 200px;"></td>
        </tr>
    </table>
</body>
</html>
