<?php

use SleekwaredbApi\core\Db;

function listFolders($dir, $defaultExcludes = [])
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
                'totalRows' => $docCount
            ]);
        }
    }
    $stores['stores'] = $folders;
    return $stores;
}
