<?php
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
include 'login/Check.php'; 

$contacts = getContacts($pdo);
$title = 'View Contacts';

ob_start();
include '../templates/viewcontacts.html.php';
$output = ob_get_clean();
include '../templates/adminlayout.html.php';
