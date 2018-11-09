<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
// $app->get('/', function (Request $request, Response $response, array $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");

//     // Render index view
//     return $this->renderer->render($response, 'index.phtml', $args);
// });
// $app->get('/', \App\Controllers\DemoController::class .':users');
$app->get('/', \App\Controllers\DemoController::class .':users');
$app->post('/get-otp', \App\Controllers\DemoController::class .':getOTP');
$app->post('/verify-otp', \App\Controllers\DemoController::class .':verifyOTP');
// $app->get('/', \App\Controllers\DemoController::class .':users')->add(\App\Middlewares\LoginMiddleware::class 
// );
// $app->login('/login', \App\Controllers\DemoController::class .':index');

// $app->post('/upload', \App\Controllers\ImageController::class .':index');


