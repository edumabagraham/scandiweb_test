<?php
spl_autoload_register('my_autoloader');

function my_autoloader($classname)
{
    // $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    // $path = strpos($url, 'includes')  !== false ? '../classes/' : 'classes/';
    $path = './classes/';
    $extension = '.class.php';
    $fullpath = $path . $classname . $extension;

    if (!file_exists($fullpath)) {
        return false;
    }

    include_once $fullpath;
}
