<?php
namespace SleekwaredbApi\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use SleekwaredbApi\core\helpers\CoreHelper;

class WelcomeController extends Controller
{
    public function index(Request $request, Response $response) {
        return CoreHelper::responseJson($response, ['message' => 'Welcome to our SleekwareDB API']);
    }

    public function install(Request $request, Response $response)
    {
        if (CoreHelper::checkIsInstalled() == 0) {
            $done = $this->createSystemStores();
            if ($done) {
                return CoreHelper::responseJson($response, [
                    'status' => true,
                    'message' => 'All core document stores successfully created!'
                ]);
            } else {
                return CoreHelper::responseJson($response, [
                    'status' => false,
                    'message' => 'All core document stores failed created!'
                ]);
            }
        } else {
            return CoreHelper::responseJson($response, [
                'status' => true,
                'message' => 'Core document stores already installed'
            ]);
        }
    }
}
