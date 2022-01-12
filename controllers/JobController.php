<?php

namespace app\controllers;

use app\models\Job;
use app\Router;

class JobController
{

    public static function index(Router $router)
    {
        $jobs = $router->db->getAds();
        $router->renderView('jobs/index', [
            'jobs' => $jobs
        ]);
    }

    public static function create(Router $router) {

        $errors = [];

        $adData = [

            'job_title' => '',
            'job_type' => '',
            'job_location' => '',
            'job_requirements' => '',
            'job_description' => '',
            'job_image' => '',

        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $adData['job_title'] = $_POST['job_title'];
            $adData['job_type'] = $_POST['job_type'];
            $adData['job_location'] = $_POST['job_location'];
            $adData['job_requirements'] = $_POST['job_requirements'];
            $adData['job_description'] = $_POST['job_description'];
            $adData['job_imageFile'] = $_FILES['job_image'] ?? null;

            $job = new Job();
            $job->load($adData);
            $errors = $job->save();

            if (empty($errors)) {

                header('Location: /jobs');
                exit;

            }

        }

        $router->renderView('jobs/create',
            ['job' => $adData, 'errors' => $errors]);

    }

    public static function update(Router $router) {

        $id = $_GET['id'] ?? null;

        if (!$id) {

            header('Location: /jobs');
            exit;

        }

        $errors = [];

        $adData = $router->db->getAdById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $adData['job_title'] = $_POST['job_title'];
            $adData['job_type'] = $_POST['job_type'];
            $adData['job_location'] = $_POST['job_location'];
            $adData['job_requirements'] = $_POST['job_requirements'];
            $adData['job_description'] = $_POST['job_description'];
            $adData['job_imageFile'] = $_FILES['job_image'] ?? null;

            $job = new Job();
            $job->load($adData);
            $errors = $job->save();

            if (empty($errors)) {

                header('Location: /jobs');
                exit;

            }

        }

        $router->renderView ('jobs/update', [
            'job' => $adData,
            'errors' => $errors
        ]);

    }

    public static function delete(Router $router) {

        $id = $_POST['id'] ?? null;

        if (!$id) {

            header('Location: /jobs');
            exit;

        }

        $router->db->deleteAd($id);
        header('Location: /jobs');

    }

}