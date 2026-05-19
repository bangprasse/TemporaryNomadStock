<?php

session_start();

require '../config/config.php';

// Logic if user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to index.php if user is already logged in
    header('Location: index.php');
    exit();
}

require '../app/controllers/AuthController.php';

$auth = new AuthController();
$auth->login();
