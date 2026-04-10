<?php
// Check admin login
include("login/Check.php");

// Connect database
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

// Handle update
if (isset($_POST['name'])) {

    // Update film info including alt text
    updateFilm(
        $pdo,
        $_POST['id'],
        $_POST['name'],
        $_POST['alt_text']
    );

    header('Location: films.php');
    exit();
}

// Get film data
$film = getFilm($pdo, $_GET['id']);

$title = 'Edit Film';

// Load template
ob_start();
include '../templates/editfilm.html.php';
$output = ob_get_clean();

include '../templates/adminlayout.html.php';