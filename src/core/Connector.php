<?php
namespace SleekwaredbApi\core;

use SleekDB\Store;

final class Connector
{
    protected $databaseDirectory;

    public function __construct()
    {
        $this->databaseDirectory = __DIR__ . "/src/core/db";
    }

    public function store($name)
    {
        $store = new Store($name, $this->databaseDirectory);
        return $store;
    }
}

