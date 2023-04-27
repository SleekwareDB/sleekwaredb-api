<?php
namespace SleekwaredbApi\core;

use SleekDB\Query;
use SleekDB\Store;

class Db
{
    protected $databaseDirectory;
    protected $configuration;

    public function __construct()
    {
        $this->databaseDirectory = __DIR__ . "/db";
        $this->configuration = [
            "auto_cache" => true,
            "cache_lifetime" => null,
            "timeout" => false,
            "primary_key" => "_id",
            "search" => [
                "min_length" => 2,
                "mode" => "or",
                "score_key" => "scoreKey",
                "algorithm" => Query::SEARCH_ALGORITHM["hits"]
            ],
            "folder_permissions" => 0777
        ];
    }

    public function store($name)
    {
        $store = new Store(
            $name,
            $this->databaseDirectory,
            $this->configuration
        );
        return $store;
    }

    public function listAllStores()
    {
        return listFolders($this->databaseDirectory, ['.gitignore','index.html']);
    }
}

