<?php
// Start session
session_start();

// Hardcoded password (can be improved later)
$actualPassword = "123";

// Get user input
$userPassword = $_POST['password'];

// Check password
if ($userPassword === $actualPassword) {

    // Set session
    $_SESSION["Authorised"] = "Y";

    // Redirect to admin dashboard
    header("Location: ../reviews.php");
    exit();

} else {

    // Redirect if wrong password
    header("Location: wrongpassword.php");
    exit();
}