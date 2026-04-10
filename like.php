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

// Quay lại trang danh sách review sau khi bấm
header('Location: reviews_user.php');
exit();