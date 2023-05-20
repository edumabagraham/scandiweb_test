<?php
spl_autoload_register('my_autoloader');

function my_autoloader($classname)
{
include_once '../models/controller.php';
include_once '../models/products.php';
include_once '../config/database.php';

}


