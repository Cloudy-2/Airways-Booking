<?php
session_start();
include_once './config/database.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if the payment method is selected
if (!isset($_POST['payment_method'])) {
    header("Location: confirm_booking.php");
    exit();
}

// Retrieve payment method from the form
$payment_method = $_POST['payment_method'];

// Process payment based on the selected method
if ($payment_method === 'gcash') {
    // Process GCash payment
    // Redirect to GCash payment page or execute GCash payment API
} elseif ($payment_method === 'paypal') {
    // Process PayPal payment
    // Redirect to PayPal payment page or execute PayPal payment API
} elseif ($payment_method === 'credit_card') {
    // Process Credit Card payment
    // Redirect to Credit Card payment page or execute Credit Card payment API
} else {
    // Invalid payment method selected
    header("Location: confirm_booking.php");
    exit();
}
?>
