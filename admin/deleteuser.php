<?php
include("login/Check.php");
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

if (isset($_POST['id'])) {
    deleteUser($pdo, $_POST['id']);
}
header('Location: users.php');