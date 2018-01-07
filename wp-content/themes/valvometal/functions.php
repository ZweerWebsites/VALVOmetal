<?php

global $wp;

/**
 * Defining auxiliary constants
 *
 * Now there's no need to execute those functions every time you have to
 * include a file or asset.
 */
define('WP_THEME_PATH', get_template_directory());
define('WP_THEME_URI', get_template_directory_uri());

/**
 * Defining constants for theme slug and prefix
 *
 * In this way we don't have to remember them every single time,and, much more
 * important, don't have to change it every time we begin a new project!!
 */
define('WP_THEME_SLUG', 'valvometal');
define('WP_THEME_PREFIX', 'vm');

$current_uri = home_url(add_query_arg(array(), $wp->request));
define('VM_CURRENT_URI', $current_uri);

/**
 * Including auxiliary files
 *
 * All these files are placed in the 'inc' directory.
 */
$directoryPath = __DIR__ . '/inc';
$directoryPointer = opendir($directoryPath);

while ($fileName = readdir($directoryPointer)) {
    $filePath = $directoryPath . DIRECTORY_SEPARATOR . $fileName;
    $extension = substr(strstr($fileName, '.'), 1);

    if (!is_dir($filePath) and $extension === 'php') {
        require_once $filePath;
    }
}

$directoryPath = __DIR__ . '/plugins';
$directoryPointer = opendir($directoryPath);

while ($dirName = readdir($directoryPointer)) {
    $dirPath = $directoryPath . DIRECTORY_SEPARATOR . $dirName;

    if (is_dir($dirPath) and $dirName !== '.' and $dirName !== '..') {
        $filePath = $dirPath . DIRECTORY_SEPARATOR . 'plugin.php';

        require_once $filePath;
    }
}

