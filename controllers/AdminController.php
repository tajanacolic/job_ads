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
                header('Location:/jobs');
                exit;
            }
        }
        $router -> renderView('jobs/signin', [
            "admin" => $adminData, 
            "errors" => $errors
        ]);
    }
}