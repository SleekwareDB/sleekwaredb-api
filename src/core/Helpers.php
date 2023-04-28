<?php

/**
 * Recursive Directory Size Scanner
 *
 * @param string $directory
 * @return integer
 */
function recursiveDirectorySize(string $directory) : int {
    $total_size = 0;
    $files = scandir($directory);

    foreach ($files as $file) {
        if (!in_array($file, DEFAULT_DIRECTORY_EXCLUDES)) {
            $path = $directory . DIRECTORY_SEPARATOR . $file;
            if (is_dir($path)) {
                $total_size += recursiveDirectorySize($path);
            } else {
                $total_size += filesize($path);
            }
        }
    }

    return $total_size;
}

/**
 * Create Directory
 *
 * @param string $dirPath
 * @return boolean
 */
function createDirectory(string $dirPath) : bool {
    if (!is_dir($dirPath)) {
        $result = mkdir($dirPath, 0777, true);
        if (!$result) {
            return false;
        }
    }
    return true;
}
