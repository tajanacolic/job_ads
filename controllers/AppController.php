<?php

namespace app\controllers;

use app\models\Application;
use app\Router;

class AppController
{

    public static function index_app(Router $router)
    {
        $apps = $router->db->getApps();
        $router->renderView('jobs/applications', [
            'apps' => $apps
        ]);
    }

    public static function create_app(Router $router) {

        $errors = [];

        $appData = [

            'job_name' => '',
            'job_surname' => '',
            'job_email' => '',
            'job_tel' => '',
            'job_cv' => ''

        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $appData['job_name'] = $_POST['job_name'];
            $appData['job_surname'] = $_POST['job_surname'];
            $appData['job_email'] = $_POST['job_email'];
            $appData['job_tel'] = $_POST['job_tel'];
            $appData['job_description'] = $_POST['job_description'];
            $appData['job_cvFile'] = $_FILES['job_cv'];

            $application = new Application();
            $application->loadApp($appData);
            $errors = $application->saveApp();

            if (empty($errors)) {

                header('Location: /jobs');
                exit;

            }

        }

        $router->renderView('jobs/view',
            ['application' => $appData, 'errors' => $errors]);

    }

}