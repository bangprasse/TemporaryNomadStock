<?php


// Class to handle authentication method related functions
// - login detector
// - login state
// - logout method
// - access restriction
class Auth
{
    // login detector method
    public static function login_detector()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header('location: login.php');
            exit();
        }
    }

    // create session for logged in admin
    public static function login_create($user)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['store_id'] = $user['store_id'];
        $_SESSION['username'] = $user['username'];
    }
}
