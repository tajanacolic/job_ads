<?php

namespace app\controllers;

use app\models\Application;
use app\Router;

class AppController
{

    public static function index_app(Router $router)
    {
        if($_SESSION['name'] === "user")
        {
            header('Location: /jobs');
            exit;
        }
        $apps = $router->db->getApps();
        $router->renderView('jobs/applications', [
            'apps' => $apps
        ]);
    }

    public static function create_app(Router $router) {

        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: /jobs');
            exit;

        }

        $errors = [];

        $appData = [

            'job_name' => '',
             'job_surname' => '',
            'job_email' => '',
            'job_tel' => '',
            'job_id' => '',
            'job_cvFile' => '',
            'job_cv' => ''

        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $appData['job_name'] = $_POST['job_name'];
            $appData['job_surname'] = $_POST['job_surname'];
            $appData['job_email'] = $_POST['job_email'];
            $appData['job_tel'] = $_POST['job_tel'];
            $appData['job_id'] = $id;
            $appData['job_cvFile'] = $_FILES['job_cv'];

            // echo "<pre>";
            //     var_dump($appData);
            // echo "</pre>";
            // exit;
            $application = new Application();
            $application->loadApp($appData);
            $errors = $application->saveApp();

            if (empty($errors)) {
                $_SESSION['activity'] = 'applied';
                header('Location: /jobs/view');
                exit;

            }

        }

        $adData = $router->db->getAdById($id);

        $router->renderView('jobs/view',
            ['application' => $appData,
                'job' => $adData,
                'errors' => $errors]);

    }

    public static function delete_app(Router $router) {
        if($_SESSION['name'] === "user")
        {
            header('Location: /jobs');
            exit;
        }
        $app_id = $_POST['app_id'] ?? null;

        if (!$app_id) {

            header('Location: /jobs/applications');
            exit;

        }

        $router->db->deleteApp($app_id);
        header('Location: /jobs/applications');

    }

    public static function view_app(Router $router) {
        if($_SESSION['name'] === "user")
        {
            header('Location: /jobs');
            exit;
        }
        $app_id = $_GET['app_id'] ?? null;
        $job_id = $_GET['job_id'] ?? null;

        if (!$app_id && !$job_id) {

            header('Location: /jobs/applications');
            exit;

        }

        $errors = [];

        $adData = $router->db->getAdById($job_id);
        $appData = $router->db->getAppById($app_id);

        $router->renderView('jobs/appview',
            ['app' => $appData,
                'job' => $adData,
                'errors' => $errors]);

    }

}