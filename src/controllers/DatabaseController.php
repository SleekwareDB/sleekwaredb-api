<?php
namespace SleekwaredbApi\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use SleekwaredbApi\core\helpers\CoreHelper;
use SleekwaredbApi\core\helpers\DatabaseHelper;

class DatabaseController extends Controller
{
    public function index(Request $request, Response $response) {
        $tables = DatabaseHelper::listFolders(CORE_DIRECTORIES . 'db');
        return CoreHelper::responseJson($response, $tables);
    }

    public function create(Request $request, Response $response)
    {
        $data = CoreHelper::requestData($request);
        $storePath = createDirectory(APP_DATABASE_STORE . DIRECTORY_SEPARATOR . $request['name']);
        if (!$storePath) {
            return CoreHelper::responseJson($response, [
                'status' => true,
                'message' => $data
            ]);
        } else {
            return CoreHelper::responseJson($response, [
                'status' => false,
                'message' => 'No database found'
            ]);
        }
    }
}
