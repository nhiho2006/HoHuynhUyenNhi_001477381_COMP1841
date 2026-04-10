<?php
include("login/Check.php");
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

if (isset($_POST['id'])) {
    deleteFilm($pdo, $_POST['id']);
}
header('Location: films.php');