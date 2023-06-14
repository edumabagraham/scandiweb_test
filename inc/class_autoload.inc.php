<?php
spl_autoload_register('models_autoloader');

function models_autoloader($class_name)
{
if ($class_name === 'Controller') {
    $path = '../controller/';
}elseif ($class_name === 'Database') {
    $path = '../config/';
}
else {
    $path = '../models/';
}

$extension = '.php';
$fullpath = $path . $class_name . $extension;

include_once $fullpath;
}


