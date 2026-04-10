<?php
// Connect database
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

// Handle form submission
if (isset($_POST['reviewtext'])) {

    $image = '';

    // Upload review image if exists
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $image);
    }

    // Insert review with image
    insertReview(
        $pdo,
        $_POST['reviewtext'],
        $_POST['userid'],
        $_POST['filmid'],
        $image
    );

    header('Location: reviews.php');
    exit();
}

// Get data for dropdown
$users = getUsers($pdo);
$films = getFilms($pdo);

$title = 'Add Review';

// Load template
ob_start();
include '../templates/addreview.html.php';
$output = ob_get_clean();

include '../templates/layout.html.php';