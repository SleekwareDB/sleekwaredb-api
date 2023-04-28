<?php
namespace SleekwaredbApi\core;

use Exception;
use SleekDB\Query;
use SleekDB\Store;
use SleekwaredbApi\core\helpers\DatabaseHelper;

class Db
{
    protected $databaseStore;
    protected $configuration;

    public function __construct($databaseName = null)
    {
        $this->databaseStore = $databaseName === null ? CORE_SYSTEM_STORE_DATABASES : APP_DATABASE_STORE;
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
            $this->databaseStore,
            $this->configuration
        );
        return $store;
    }

    public function createSystemStores()
    {
        $success = false;
        try {
            for ($i=0; $i < count(CORE_DOCUMENT_STORES); $i++) { 
                $this->store(CORE_DOCUMENT_STORES[$i]);
            }
            $success = true;
            return $success;
        } catch (Exception $e) {
            echo $e->getMessage();
            return $success;
        }
    }

    public function listAllSystemStores()
    {
        return DatabaseHelper::listFolders($this->databaseStore, ['.gitignore','index.html']);
    }
}

