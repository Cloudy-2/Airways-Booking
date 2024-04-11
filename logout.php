<?php
session_start();

// Check if the user is an administrator
$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'];

$_SESSION = array();

session_destroy();

setcookie(session_name(), '', time() - 3600);


if ($is_admin) {
    // Redirect administrators to login.php
    header("Location: login.php");
} else {
    // Redirect regular users to index.php
    header("Location: index.php");
}

exit();
?>
