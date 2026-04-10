<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';

try {
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id']; // Sanitize input

        // Fetch detailed review with joined user and film data
        $review = getReview($pdo, $id);

        if (!$review) {
            die("Review not found!");
        }

        $title = $review['filmname'] . ' - Details';

        ob_start();
        include 'templates/review-detail.html.php';
        $output = ob_get_clean();
    } else {
        die("Missing Review ID.");
    }

} catch (PDOException $e) {
    $title = 'An error occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';