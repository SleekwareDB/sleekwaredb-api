<?php

$container->set('WelcomeController', function($container) {
    return new \SleekwaredbApi\controllers\WelcomeController($container);
});

$container->set('AuthController', function($container) {
    return new \SleekwaredbApi\controllers\AuthController($container);
});
