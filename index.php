<?php

use Symfony\Component\Dotenv\Dotenv;
use DI\Container;
use DI\ContainerBuilder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load('.env');

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/src/config/loader.php');
$container = $containerBuilder->build();

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();

$errorSettings = $container->get('Config')->getErrorSettings();
$errorMiddleware = $app->addErrorMiddleware(
    $errorSettings['displayErrorDetails'], 
    $errorSettings['logErrors'], 
    $errorSettings['logErrorDetails']
);

require_once __DIR__ . '/src/routes/api.php';

$app->run();