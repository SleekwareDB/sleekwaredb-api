<?php
namespace SleekwaredbApi\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class WelcomeController extends Controller
{
    public function index(Request $request, Response $response) {
        $response_str = json_encode(['message' => 'Welcome to our SleekwareDB API']);
        $response->getBody()->write($response_str);
        return $response->withHeader('Content-Type', 'application/json');
    }
}
