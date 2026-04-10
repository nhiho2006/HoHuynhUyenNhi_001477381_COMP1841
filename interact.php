<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';

if (isset($_GET['id']) && isset($_GET['type'])) {
    updateInteraction($pdo, $_GET['id'], $_GET['type']);
}

header('Location: ' . $_SERVER['HTTP_REFERER']); // Quay lại trang trước đó
exit();