<?php
include_once 'config/database.php';

$errorMessage = ''; // Initialize error message variable
$successMessage = ''; // Initialize success message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $upload_dir = 'uploads/';

    // Check if the directory exists, and create it if not
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true); // Create the directory with full permissions
    }

    // Retrieve file data
    $id_upload_name = $_FILES['id_upload']['name'];
    $id_upload_tmp_name = $_FILES['id_upload']['tmp_name'];
    $id_upload_error = $_FILES['id_upload']['error'];

    // Check if password and confirm password match
    if ($password !== $confirm_password) {
        $errorMessage = "Passwords do not match.";
    } elseif ($id_upload_error !== UPLOAD_ERR_OK) {
        $errorMessage = "Error uploading ID.";
    } else {
        // Prepare the statement
        $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, Email, password, id_upload) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $first_name, $last_name, $email, $hashed_password, $id_upload_name);

        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Move uploaded file to desired location
        $upload_dir = 'uploads/'; // Specify your upload directory
        $id_upload_path = $upload_dir . basename($id_upload_name);

        if (!move_uploaded_file($id_upload_tmp_name, $id_upload_path)) {
            $errorMessage = "Error moving uploaded file.";
        } else {
            // Check if email is already taken
            $check_stmt = $conn->prepare("SELECT * FROM user WHERE Email = ?");
            $check_stmt->bind_param("s", $email);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();

            if ($check_result->num_rows > 0) {
                $errorMessage = "Email already exists.";
            } else {
                // Execute the statement
                if ($stmt->execute()) {
                    // Registration successful
                    $successMessage = "Registration successful! You've been successfully registered.";
                } else {
                    // Registration failed
                    $errorMessage = "Error: " . $stmt->error;
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skyline - Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="./assets/images/favicon.jpg">
    <link rel="stylesheet" href="./css/registration.css">
</head>
<header>
    <div class="logo">
        <img src="./assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Skyline Registration</h1>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="./index.php">Dashboard</a></li>
            <li><a href="./contact.php">Contact</a></li>
            <li><a href="./login.php">Login</a></li>
        </ul>
    </nav>
</header>
<body>
<main>
    <div class="registration-container">
        <h2 style="text-align: left;">Registration</h2>

        <form id="registrationForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" onsubmit="return submitForm()">

            
            <input type="text" name="first_name" placeholder="First Name" required><br>
            <input type="text" name="last_name" placeholder="Last Name" required><br>
            <input type="email" name="email" placeholder="Email Address" required><br>
            <input type="password" name="password" id="password" placeholder="Password" required><br>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required><br>
            <input type="file" name="id_upload" id="fileInput" accept="image/*" required onchange="previewImage(event)"><br>
            <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 100%; display: none;"><br>

            <input type="submit" value="Register" onclick="return validatePassword()"><br> 
            
            <!-- Error message -->
            <?php if(isset($errorMessage)): ?>
                <p style="color: red;"><?php echo $errorMessage; ?></p>
            <?php endif; ?>
                    
            <!-- Success notification -->
            <?php if(!empty($successMessage)): ?>
                <div id="notification" style="display: block;">
                    <p style="color: green;"><?php echo $successMessage; ?></p>
                </div>
            <?php endif; ?>

        </form>

    </div>

    <script src="./js/registration.js"></script>
</main>

<footer>
    <p>&copy; 2024 Skyline Airways PH. All rights reserved.</p>
</footer>
</body>
</html>
