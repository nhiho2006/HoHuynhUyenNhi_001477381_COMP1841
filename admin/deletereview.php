<?php
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

if (isset($_POST['id'])) {
    deleteReview($pdo, $_POST['id']);
}

header('Location: reviews.php');
exit();