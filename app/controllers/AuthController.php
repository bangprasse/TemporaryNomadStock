<?php

require_once '../app/core/Controller.php';
require_once '../app/core/Auth.php';
require_once '../app/models/Admin.php';

// Controller to handle authentication login flow related functions

class AuthController extends Controller
{
    private $adminModel; // variable to hold Admin identity

    public function __construct() // constructor to initialize Admin model
    {
        $this->adminModel = new Admin();
    }

    // show login page
    public function login()
    {
        $this->view('auth/login');
    }

    // method to handle admin authentication
    public function admin_authentication()
    {
        $store_code = $_POST['store'] ?? '';
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // get user data from database
        $user = $this->adminModel
            ->get_admin($store_code, $username);

        // if user data is not found
        if (!$user) {
            session_start();
            $_SESSION['error'] = 'Kode Toko atau Nama Pengguna Salah';
            header('Location: login.php'); /* Redirect to login page with error message */
            exit;
        }

        // password verification
        $valid = $this->adminModel
            ->verify_password($store_code, $password, $user['password']);

        // if password is not valid
        if (!$valid) {
            session_start();
            $_SESSION['error'] = 'Kata Sandi Salah';
            header('Location: login.php'); /* Redirect to login page with error message */
            exit;
        }

        // create session
        Auth::login_create([
            'user_id' => $user['user_id'],
            'store_id' => $user['company_id'],
            'username' => $user['username']
        ]);

        header('Location: index.php'); /* Redirect to index page */
        exit;
    }
}
