<?php
// Include authentication check to ensure only authorised admin can access
include("login/Check.php");

// Include database connection and helper functions
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

// Variable to store error messages
$error = null;

// Check if the form has been submitted
if (isset($_POST['name'])) {
    try {
        // SQL query to insert a new user (name and email only)
        $sql = 'INSERT INTO user (name, email) VALUES (:name, :email)';
        
        // Prepare the statement using PDO (prevents SQL injection)
        $stmt = $pdo->prepare($sql);
        
        // Execute the query with user input
        $stmt->execute([
            'name' => $_POST['name'],
            'email' => $_POST['email']
        ]);
        
        // Redirect to user management page after successful insert
        header('Location: users.php');
        exit();

    } catch (PDOException $e) {
        // Check for duplicate email error (SQLSTATE 23000)
        if ($e->getCode() == '23000') {
            $error = "This email is already taken. Please try another one.";
        } else {
            // Handle any other unexpected database errors
            $error = "An unexpected error occurred. Please try again.";
        }
    }
}

// Page title
$title = 'Add New User';

// Start output buffering to capture page content
ob_start();

// Load the form template
include '../templates/adduser.html.php';

// Store buffered content
$output = ob_get_clean();

// Load main admin layout
include '../templates/adminlayout.html.php';