<?php

namespace app;

use app\models\Job;
use PDO;

class Database
{

    public $pdo = null;
    public static ?Database $db = null;

    public function  __construct() {

        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=jobs_crud', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        self::$db = $this;
    }

    public function getAds()
    {
        $statement = $this->pdo->prepare('SELECT * FROM job_ads ORDER BY create_date ASC');
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAdById($id) {

        $statement = $this->pdo->prepare('SELECT * FROM job_ads WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);

    }

    public function updateAd($job)
    {
        $statement = $this->pdo->prepare("UPDATE job_ads SET job_title = :job_title, job_type = :job_type, job_location = :job_location,
                                        job_requirements = :job_requirements, job_description = :job_description, job_image = :job_image
                                        WHERE id = :id");
        $statement->bindValue(':job_title', $job->job_title);
        $statement->bindValue(':job_type', $job->job_type);
        $statement->bindValue(':job_location', $job->job_location);
        $statement->bindValue(':job_requirements', $job->job_requirements);
        $statement->bindValue(':job_description', $job->job_description);
        $statement->bindValue(':job_image', $job->job_imagePath);
        $statement->bindValue(':id', $job->id);

        $statement->execute();
    }

    public function createAd($job)
    {
        $statement = $this->pdo->prepare("INSERT INTO job_ads (job_title, job_type, job_location, 
                      job_requirements, job_description, job_image, create_date)
                VALUES (:job_title, :job_type, :job_location, job_requirements, :job_description, :job_image, :date)");
        $statement->bindValue(':job_title', $job->job_title);
        $statement->bindValue(':job_type', $job->job_type);
        $statement->bindValue(':job_location', $job->job_location);
        $statement->bindValue(':job_requirements', $job->job_requirements);
        $statement->bindValue(':job_description', $job->job_description);
        $statement->bindValue(':job_image', $job->job_imagePath);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));

        $statement->execute();
    }

    public function deleteAd($id) {

        $statement = $this->pdo->prepare('DELETE FROM job_ads WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();


    }

}