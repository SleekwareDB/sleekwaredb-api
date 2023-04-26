<?php

namespace SleekwaredbApi\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
        $parsedBody = $request->getParsedBody();
        $payload = json_encode($parsedBody);
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}
