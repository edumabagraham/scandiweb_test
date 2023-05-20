<?php
spl_autoload_register('my_autoloader');

function my_autoloader($classname)
{
    $path = '../models/';
    $extension = '.php';
    $fullpath = $path. $classname . $extension;

    if (!file_exists($fullpath)) {
        return false;
    }
    include_once $fullpath;
}
