<?php
namespace SleekwaredbApi\core\helpers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;

class CoreHelper
{
    public static function checkIsInstalled()
    {
        $config = CORE_DIRECTORIES . 'CONFIGURATION.ini';
        $data = parse_ini_file($config);
        return $data['install'];
    }

    public static function writeConfig($key, $value)
    {
        $configFile = CORE_DIRECTORIES . 'CONFIGURATION.ini';
        $config = parse_ini_file($configFile);

        $config[$key] = $value;

        $ini_string = '';
        foreach ($config as $key => $value) {
            $ini_string .= "$key=$value\n";
        }
        $isWrited = file_put_contents($configFile, $ini_string);
        return $isWrited !== false;
    }

    public static function responseJson(Response $response, $data)
    {
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public static function requestData(Request $request)
    {
        return $request->getParsedBody();
    }
}
