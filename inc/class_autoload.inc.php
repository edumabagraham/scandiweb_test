<?php
spl_autoload_register('my_autoloader');

function my_autoloader()
{
include_once '../models/controller.php';
include_once '../models/products.php';
include_once '../config/database.php';

// include_once 'book.php';
}


