<?php
session_start();

// Check if the user is already logged in
if(isset($_SESSION['username'])) {
    // If the user is logged in, redirect to mainmenu.php or admin_dashboard.php
    if ($_SESSION['is_admin'] == 1) {
        header("Location: ./admin/admin_dashboard.php");
    } else {
        header("Location: index.php");
    }
    exit();
}

include_once 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type']; 

    if ($user_type == 'admin') {
        // Check if the user is an admin
        $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $admin_result = $stmt->get_result();

        if ($admin_result->num_rows == 1) {
            $admin_row = $admin_result->fetch_assoc();
            $admin_stored_password = $admin_row['password'];
        
            if ($password === $admin_stored_password) {
                $_SESSION['username'] = $username;
                $_SESSION['is_admin'] = 1;
                
                header("Location: ./admin/admin_dashboard.php");
                exit();

            } else {
                // Incorrect password
                $errorMessage = "Invalid password. Please try again.";
            }
        } else {
            $errorMessage = "Invalid username or password. Please try again.";
        }
    } elseif ($user_type == 'regular') {
        // Check if the user is a regular user
        $stmt = $conn->prepare("SELECT * FROM logindata WHERE Email = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $regular_result = $stmt->get_result();

        if ($regular_result->num_rows == 1) {
            $regular_row = $regular_result->fetch_assoc();
            $regular_stored_password = $regular_row['password'];
            if (password_verify($password, $regular_stored_password)) {
                $_SESSION['username'] = $username;
                header("Location: index.php");
                exit();
                
            } else {
                // Incorrect password
                $errorMessage = "Invalid password. Please try again.";
            }
        } else {
            // Regular user does not exist
            $errorMessage = "Invalid username or password. Please try again.";
        }
    } else {
        // Invalid user type
        $errorMessage = "Invalid user type selected.";
    }
}
?>