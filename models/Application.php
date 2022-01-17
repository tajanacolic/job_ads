<?php

namespace app\models;

use app\Database;
use app\helpers\UtilHelper;

class Application
{

    public ?int $app_id = null;
    public ?string $job_name = null;
    public ?string $job_surname = null;
    public ?string $job_email = null;
    public ?string $job_tel = null;
    public ?string $job_cvPath = null;
    public ?array $job_cvFile = null;
    public ?string $job_id = null;

    public function loadApp($data) {

        $this->app_id = $data['app_id'] ?? null;
        $this->job_name = $data['job_name'];
        $this->job_surname = $data['job_surname'];
        $this->job_email = $data['job_email'];
        $this->job_tel = $data['job_tel'];
        $this->job_cvFile = $data['job_cvFile'];
        $this->job_cvPath = $data['job_cv'];
        $this->job_id = $data['job_id'];

    }

    public function saveApp() {



        $errors = [];

        if (!$this->job_name) {

            $errors[] = 'Name is required.';

        }

        if (!$this->job_surname) {

            $errors[] = 'Surname is required.';

        }

        if (!$this->job_email) {

            $errors[] = 'Email is required.';

        }

        if (!$this->job_tel) {

            $errors[] = 'Phone number is required.';

        }
        if (!$this->job_cvFile['tmp_name']) {

            $errors[] = 'CV is required.';

        }

        if (!is_dir(__DIR__.'/../public/cv')) {

            mkdir(__DIR__.'/../public/cv');

        }

        if (empty($errors)) {

            if ($this->job_cvFile && $this->job_cvFile['tmp_name']) {

                $this->job_cvPath = 'cv/' . UtilHelper::randomString(8) . '/' . $this->job_cvFile['name'];

                mkdir(dirname(__DIR__ . '/../public/' . $this->job_cvPath));

                move_uploaded_file($this->job_cvFile['tmp_name'], __DIR__ . '/../public/' . $this->job_cvPath);

            }

            $db = Database::$db;
            $db->createApp($this);

        }
        return $errors;
    }


}