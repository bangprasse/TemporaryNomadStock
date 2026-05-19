<?php

require_once '../app/core/Hash.php';
require_once '../app/core/Database.php';

// class to handle interactions related to user_tb
class Admin
{

    private $db; // variable to hold database connection

    public function __construct() // constructor to initialize database connection
    {
        $database = new Database();
        $this->db = $database->connecting();
    }

    // method to get user data from database by username and store code
    public function get_admin($store_code, $username)
    {
        $store_id = md5($store_code);

        $query = 'SELECT * FROM user_tb WHERE company_id = :store_id AND username = :username LIMIT 1';

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':store_id', $store_id);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // method to verify password
    public function verify_password($store_code, $input_password, $stored_hash)
    {
        return Hash::verify_hash($store_code, $input_password, $stored_hash);
    }
}
