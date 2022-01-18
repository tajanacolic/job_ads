<?php

namespace app\models;

use app\Database;

class Admin {

    public ?string $username = null;
    public ?string $password = null;

    public function load($adminData) 
    {
        $this -> username = $adminData['username'];
        $this -> password = $adminData['password'];
    }

    public function check() 
    {
        if(!$this -> username)
        $errors[] = "Please enter a username";
        if(!$this -> password)
        $errors[] = "Please enter your password";
        if(empty($errors))
        {
            $db = Database::$db;
            $adminsdb = $db -> getAdmin();
            $validation = false;
            foreach ($adminsdb as $admindb) {
                if($this -> username == $admindb['username'] && $this -> password == $admindb['password'])
                {
                   $validation = true;
                }
            }
            if($validation == false)
            $errors[] = "Invalid username or password";
        }
        return $errors;
    }
}