<?php

class Auth
{

    public static function login_detector()
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header('location: login.php');
            exit();
        }
    }
}
