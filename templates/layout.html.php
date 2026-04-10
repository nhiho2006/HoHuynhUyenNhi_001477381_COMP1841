<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<!-- Page title -->
<title><?= $title ?></title>

<!-- External CSS -->
<link rel="stylesheet" href="style.css">

</head>

<body>

<!-- Header -->
<header>
    Film Review System 🎀
</header>

<!-- Navigation -->
<nav>
<a href="index.php">Home</a>
<a href="reviews_user.php">Review List</a>
<a href="addreview_user.php">Add Review</a>
<a href="contact.php">Contact</a>
<a href="admin/login/login.html">Admin</a>
</nav>

<!-- Main content -->
<main>
    <?= $output ?>
</main>
<br>
<br>
<br>
<br>

<!-- Footer -->
<footer>
    © <?= date('Y') ?> Film Review Coursework 💜
</footer>

</body>
</html>
