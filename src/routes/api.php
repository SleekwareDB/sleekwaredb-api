<?php

use Slim\Routing\RouteCollectorProxy;

$app->get('/', 'WelcomeController:index');
$app->get('/install', 'WelcomeController:install');

$app->group('/auth', function (RouteCollectorProxy $group) {
    $group->post('/login', 'AuthController:login');
});

$app->group('/db', function (RouteCollectorProxy $group) {
    $group->get('/tables', 'DatabaseController:index');
    $group->post('/create', 'DatabaseController:create');
});
