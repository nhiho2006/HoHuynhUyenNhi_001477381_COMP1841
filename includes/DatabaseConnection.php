<?php
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=CW;charset=utf8',
        'root',
        ''
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
    include __DIR__ . '/../templates/layout.html.php';
    exit();
}