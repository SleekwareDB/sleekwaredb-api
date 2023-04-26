<?php

namespace SleekwaredbApi\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
        $article = [
            "title" => "Google Pixel XL",
            "about" => "Google announced a new Pixel!",
            "author" => [
                "avatar" => "profile-12.jpg",
                "name" => "Foo Bar"
            ]
        ];
        $this->store('news')->insert($article);
        $parsedBody = $request->getParsedBody();
        $payload = json_encode($parsedBody);
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}
