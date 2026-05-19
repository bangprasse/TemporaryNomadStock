<?php

// class to handle hashing related functions, such as password hashing and verification
class Hash
{

    // create hash for password
    public static function create_hash($store_id, $password)
    {
        $store_id = substr($store_id, 0, 5); // get first 5 characters of store_id
        $password = $store_id . $password; // concatenate store_id and password

        return $password;
    }

    // verify password by comparing hash with input password
    public static function verify_hash($store_code, $input_password, $stored_hash)
    {
        $store_id = substr(md5($store_code), 0, 5); // get first 5 characters of md5 hash of store_code
        $input_password = md5($input_password); // hash input password using md5
        $input_password = $store_id . $input_password; // concatenate store_id and input password
        return $input_password === $stored_hash;
    }
}
