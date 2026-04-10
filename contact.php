<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';

if (isset($_POST['content'])) {
    // Handle optional film image upload
    $imageName = 'default.png';
    
    if (isset($_FILES['film_image']) && $_FILES['film_image']['error'] === UPLOAD_ERR_OK) {
        $imageName = time() . '_' . $_FILES['film_image']['name']; // Add timestamp to avoid duplicate names
        $target = 'images/' . basename($imageName);
        move_uploaded_file($_FILES['film_image']['tmp_name'], $target);
    }

    // Save contact info and image name to database
    insertContact($pdo, $_POST['name'], $_POST['email'], $_POST['content'], $imageName);
    
    header('Location: index.php?msg=success');
    exit();
}

$title = 'Contact Us';
ob_start();
include 'templates/contact.html.php';
$output = ob_get_clean();

include 'templates/layout.html.php';