<?php
include("login/Check.php");
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

if (isset($_POST['name'])) {
    updateUser($pdo, $_POST['id'], $_POST['name'], $_POST['email']);
    header('Location: users.php');
    exit();
}

$user = getUser($pdo, $_GET['id']);
$title = 'Edit User';

ob_start();
include '../templates/edituser.html.php';
$output = ob_get_clean();
include '../templates/adminlayout.html.php';