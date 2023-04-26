<?php

$app->get('/', 'WelcomeController:index');

$app->post('/login', 'AuthController:login');
