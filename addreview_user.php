<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';

$title = 'Add Review';

try {
    if (isset($_POST['reviewtext'])) {
        insertReview(
            $pdo,
            $_POST['reviewtext'],
            (int)$_POST['userid'],
            (int)$_POST['filmid'],
            $_POST['rating']
        );
        header('location: reviews_user.php');
        exit();
    }

    $films = allFilms($pdo); 
    $users = allUsers($pdo);

} catch (PDOException $e) {
    $title = 'Database error';
    $output = 'Database error: ' . $e->getMessage();
}

ob_start();
include 'templates/addreview_user.html.php';
$output = ob_get_clean();
include 'templates/layout.html.php';