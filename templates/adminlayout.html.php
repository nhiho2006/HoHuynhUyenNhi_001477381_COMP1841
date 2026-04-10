<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../style.css">
</head>
<body id="admin">
    <header>Admin Panel 🎀</header>
    <nav>
        <a href="reviews.php">Manage Reviews</a>
        <a href="films.php">Manage Films</a>
        <a href="users.php">Manage Users</a>
        <a href="viewcontacts.php">View Contacts</a>
        <a href="../index.php">Back to Website</a>
        <a href="./login/logout.php" class="logout-link">Logout</a>
    </nav>
    <main><?= $output ?></main>

    <footer>Admin Area 💜</footer>
</body>
</html>