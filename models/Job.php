<?php

namespace app\models;

use app\Database;
use app\helpers\UtilHelper;

class Job
{

    public ?int $id = null;
    public ?string $job_title = null;
    public ?string $job_type = null;
    public ?string $job_location = null;
    public ?string $job_requirements = null;
    public ?string $job_description = null;
    public ?string $job_imagePath = null;
    public ?array $job_imageFile = null;

    public function load($data) {

        $this->id = $data['id'] ?? null;
        $this->job_title = $data['job_title'];
        $this->job_type = $data['job_type'];
        $this->job_location = $data['job_location'];
        $this->job_requirements = $data['job_requirements'];
        $this->job_description = $data['job_description'];
        $this->job_imageFile = $data['job_imageFile'] ?? null;
        $this->job_imagePath = $data['job_image'] ?? null;

    }

    public function save() {



        $errors = [];

        if (!$this->job_title) {

            $errors[] = 'Job title is required.';

        }

        if (!$this->job_type) {

            $errors[] = 'Job type is required.';

        }

        if (!$this->job_location) {

            $errors[] = 'Job location is required.';

        }

        if (!$this->job_requirements) {

            $errors[] = 'Job requirements is required.';

        }
        if (!$this->job_description) {

            $errors[] = 'Job description is required.';

        }

        if (!is_dir(__DIR__.'/../public/images')) {

            mkdir(__DIR__.'/../public/images');

        }

        if (empty($errors)) {

            if ($this->job_imageFile && $this->job_imageFile['tmp_name']) {

                if ($this->job_imagePath) {

                    unlink(__DIR__ . '/../public/' . $this->job_imagePath);

                }
                $this->job_imagePath = 'images/' . UtilHelper::randomString(8) . '/' . $this->job_imageFile['name'];

                mkdir(dirname(__DIR__ . '/../public/' . $this->job_imagePath));

                move_uploaded_file($this->job_imageFile['tmp_name'], __DIR__ . '/../public/' . $this->job_imagePath);

            }

            $db = Database::$db;

            if ($this->id) {

                $db->updateAd($this);

            } else {

                $db->createAd($this);

            }

        }
        return $errors;
    }


}