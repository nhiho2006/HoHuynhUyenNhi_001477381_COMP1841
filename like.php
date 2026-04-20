<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];

    if ($type == 'like') {
        likeReview($pdo, $id);
    } elseif ($type == 'dislike') {
        dislikeReview($pdo, $id);
    }
}


header('Location: reviews_user.php');
exit();
