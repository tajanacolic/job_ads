<?php


require_once __DIR__.'/../vendor/autoload.php';

use app\Router;
use app\controllers\JobController;
use app\controllers\AppController;

$router = new Router();

$router->get('/', [JobController::class, 'index']);
$router->get('/jobs', [JobController::class, 'index']);
$router->get('/jobs/', [JobController::class, 'index']);
$router->get('/jobs/index', [JobController::class, 'index']);
$router->get('/jobs/create', [JobController::class, 'create']);
$router->post('/jobs/create', [JobController::class, 'create']);
$router->get('/jobs/view', [JobController::class, 'view']);
$router->get('/jobs/view/update', [JobController::class, 'update']);
$router->post('/jobs/view/update', [JobController::class, 'update']);
$router->post('/jobs/view/delete', [JobController::class, 'delete']);
$router->get('/jobs/applications', [AppController::class, 'index_app']);
$router->get('/jobs/applications/view', [JobController::class, 'appview']);

$router->resolve();
