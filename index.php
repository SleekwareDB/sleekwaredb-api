<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';

$loaders = require_once __DIR__ . '/src/injectors/loader.php';

$dotenv = new Dotenv();
$dotenv->load('.env');

$container = new Container();
$container->set('config', $loaders['config']);

require_once __DIR__ . '/src/injectors/app.container.php';

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();

$errorSettings = $container->get('config');
$errorMiddleware = $app->addErrorMiddleware(
    $errorSettings['displayErrorDetails'], 
    $errorSettings['logErrors'], 
    $errorSettings['logErrorDetails']
);

require_once __DIR__ . '/src/routes/api.php';

$app->run();