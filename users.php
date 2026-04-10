<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';

$users = getUsers($pdo);

$title = 'Users';

ob_start();
include 'templates/users.html.php';
$output = ob_get_clean();

include 'templates/layout.html.php';