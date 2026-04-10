<?php
include("login/Check.php");
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

$users = getUsers($pdo);
$title = 'Manage Users';

ob_start();
include '../templates/users.html.php';
$output = ob_get_clean();
include '../templates/adminlayout.html.php';