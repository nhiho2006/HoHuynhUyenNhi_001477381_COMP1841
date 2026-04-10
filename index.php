<?php
$title = 'Home - Film Review System';

ob_start();
include 'templates/index.html.php';
$output = ob_get_clean();

include 'templates/layout.html.php';