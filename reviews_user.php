<?php
// Include database connection and helper functions
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';

// Page title
$title = 'Review List';

// 1. Get total number of reviews to display at the top of the page
$totalReviews = totalReviews($pdo);

// 2. Check for filtering or searching conditions
if (isset($_GET['search']) && !empty($_GET['search'])) {
    // If a search term is provided, filter reviews by keyword
    $reviews = searchReviews($pdo, $_GET['search']);

} elseif (isset($_GET['sort'])) {
    // Check sorting options from query string

    if ($_GET['sort'] == 'most_liked') {
        // Sort reviews by number of likes (descending)
        $reviews = getMostLikedReviews($pdo);

    } elseif ($_GET['sort'] == 'top_rated') {
        // Get films with highest average rating (top-rated content)
        $reviews = getTopRatedFilms($pdo);

    } elseif ($_GET['sort'] == 'latest') {
        // Get the most recent reviews
        $reviews = getLatestReviews($pdo);

    } else {
        // Default fallback sorting (latest reviews)
        $reviews = getLatestReviews($pdo);
    }

} else {
    // Default case: show latest reviews if no filter is applied
    $reviews = getLatestReviews($pdo);
}

// Start output buffering
ob_start();

// Load user-facing review list template
include 'templates/reviews_user.html.php';

// Store generated content
$output = ob_get_clean();

// Load main layout template
include 'templates/layout.html.php';