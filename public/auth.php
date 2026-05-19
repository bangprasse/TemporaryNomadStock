<?php

require '../app/controllers/AuthController.php';

// Forward request to AuthController login method

$controller = new AuthController();

$controller->admin_authentication();
