<?php

namespace app\controllers;

use app\Router;
use app\models\Admin;

class AdminController {

    public static function signin(Router $router)
    {
        $adminData = [
            "username" => '',
            "password" => ''
        ];
        
        $errors = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $adminData['username'] = $_POST['username'];
            $adminData['password'] = $_POST['password'];

            $admin = new Admin();
            $admin -> load($adminData); 
            $errors = $admin -> check();
            if(empty($errors))
            {
                session_start();
                $_SESSION['name'] = 'admin';
                header('Location:/jobs');
                exit;
            }
        }
        $router -> renderView('jobs/signin', [
            "admin" => $adminData, 
            "errors" => $errors
        ]);
    }

    public static function signout() {
        $_SESSION['name'] = "user";
        header('Location:/jobs');
    }
}