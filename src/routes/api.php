<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function(Request $request, Response $response) {
    $response_str = json_encode(['message' => 'Welcome to our SleekwareDB API']);
    $response->getBody()->write($response_str);
    return $response->withHeader('Content-Type', 'application/json');
});
