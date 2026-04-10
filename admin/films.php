<?php
include("login/Check.php");
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

$films = getFilms($pdo);
$title = 'Manage Films';

ob_start();
include '../templates/films.html.php';
$output = ob_get_clean();
include '../templates/adminlayout.html.php';