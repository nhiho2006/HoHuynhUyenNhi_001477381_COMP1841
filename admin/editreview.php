<?php
// Include database connection and helper functions
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

// Page title
$title = 'Edit Review';

// Check if the form has been submitted
if (isset($_POST['id'])) {
    // Get review ID from POST request
    $reviewId = $_POST['id'];
    
    // Update review text, user ID, and film ID
    // When the film ID changes, the displayed image will automatically change based on the selected film
    updateReview($pdo, $reviewId, $_POST['reviewtext'], $_POST['userid'], $_POST['filmid']);

    
    // Redirect back to review management page after update
    header('Location: reviews.php');
    exit();
}

// Get review ID from URL (GET request)
$id = $_GET['id'];

// Retrieve current review data
$review = getReview($pdo, $id); 

// Retrieve all users for dropdown selection
$users = allUsers($pdo); 

// Retrieve all films for dropdown selection
$films = allFilms($pdo); 

// Start output buffering
ob_start();

// Load edit review template
include '../templates/editreview.html.php';

// Store output content
$output = ob_get_clean();

// Load main admin layout
include '../templates/adminlayout.html.php';