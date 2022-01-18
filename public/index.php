<?php
session_start();
$_SESSION['name'] =  $_SESSION['name'] ?? 'user';
$_SESSION['activity'] = $_SESSION['activity'] ?? '';
require_once __DIR__.'/../vendor/autoload.php';

use app\Router;
use app\controllers\JobController;
use app\controllers\AppController;
use app\controllers\AdminController;

$router = new Router();

$router->get('/', [JobController::class, 'index']);
$router->get('/jobs', [JobController::class, 'index']);
$router->get('/jobs/', [JobController::class, 'index']);
$router->get('/jobs/index', [JobController::class, 'index']);
$router->get('/jobs/create', [JobController::class, 'create']);
$router->post('/jobs/create', [JobController::class, 'create']);
$router->get('/jobs/view', [JobController::class, 'view']);
$router->post('/jobs/view', [AppController::class, 'create_app']);
$router->get('/jobs/view/update', [JobController::class, 'update']);
$router->post('/jobs/view/update', [JobController::class, 'update']);
$router->post('/jobs/view/delete', [JobController::class, 'delete']);
$router->post('/jobs/applications/view/delete', [AppController::class, 'delete_app']);
$router->get('/jobs/applications', [AppController::class, 'index_app']);
$router->get('/jobs/applications/view', [AppController::class, 'view_app']);
$router->get('/jobs/signin',[AdminController::class,'signin']);
$router->post('/jobs/signin',[AdminController::class,'signin']);
$router->get('/jobs/signout', [AdminController::class, 'signout']);
$router->resolve();
