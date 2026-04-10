<?php
// Check admin login
include("login/Check.php");

// Connect database
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

// Handle form submission
if (isset($_POST['name'])) {

    // Default image
    $imageName = 'default.png';

    // Upload image if provided
    if (isset($_FILES['film_image']) && $_FILES['film_image']['error'] == 0) {
        $imageName = $_FILES['film_image']['name'];
        move_uploaded_file($_FILES['film_image']['tmp_name'], '../images/' . $imageName);
    }

    // Insert film with alt text (accessibility)
    insertFilm(
        $pdo,
        $_POST['name'],
        $imageName,
        $_POST['alt_text']
    );

    // Redirect after insert
    header('Location: films.php');
    exit();
}

// Page title
$title = 'Add New Film';

// Load template
ob_start();
include '../templates/addfilm.html.php';
$output = ob_get_clean();

include '../templates/adminlayout.html.php';