<?php
use function DI\create;
require_once __DIR__ . '/config.php';

return [
    'config' => create(Config::class)
];