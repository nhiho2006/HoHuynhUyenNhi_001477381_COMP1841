<?php
// Check admin login
include("login/Check.php");

// Connect database
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

try {

    // Get all reviews with film + alt text
    $sql = 'SELECT review.id,
                   review.reviewtext,
                   review.reviewdate,
                   user.name AS username,
                   film.name AS filmname,
                   film.image AS filmimage,
                   film.alt_text
            FROM review
            INNER JOIN user ON review.userid = user.id
            INNER JOIN film ON review.filmid = film.id';

    $reviews = query($pdo, $sql);

}
catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage();
    include '../templates/adminlayout.html.php';
    exit();
}

// Count total reviews
$totalReviews = totalReviews($pdo);

$title = 'Review List';

// Load template
ob_start();
include '../templates/reviews.html.php';
$output = ob_get_clean();

include '../templates/adminlayout.html.php';