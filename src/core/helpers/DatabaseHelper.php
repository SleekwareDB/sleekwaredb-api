<?php
namespace SleekwaredbApi\core\helpers;

use SleekwaredbApi\core\Db;

/**
 * DatabaseHelper
 */
class DatabaseHelper
{
    /**
     * List all stores in core database
     *
     * @param string $dir
     * @param array $defaultExcludes
     * @return array
     */
    public static function listFolders(string $dir, array $defaultExcludes = []) : array
    {
        $exludes = array_merge($defaultExcludes, DEFAULT_DIRECTORY_EXCLUDES);
        $folders = array();
        $contents = scandir($dir);
        foreach ($contents as $content) {
            if (is_dir($dir . '/' . $content) && !in_array($content, $exludes)) {
                $db = new Db();
                $docCount = $db->store($content)->count();
                array_push($folders, [
                    'name' => $content,
                    'totalRows' => $docCount,
                    'size' => recursiveDirectorySize($dir)
                ]);
            }
        }
        $stores['stores'] = $folders;
        return $stores;
    }

    public static function createDatabase(string $databaseName) : bool
    {
        $databasePath = APP_DATABASE_STORE . DIRECTORY_SEPARATOR . $databaseName;
        return createDirectory($databasePath);
    }
}
