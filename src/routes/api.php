<?php

use Slim\Routing\RouteCollectorProxy;

$app->get('/', 'WelcomeController:index');

$app->group('/auth', function (RouteCollectorProxy $group) {
    $group->post('/login', 'AuthController:login');
});
