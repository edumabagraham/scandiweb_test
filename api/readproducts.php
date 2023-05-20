<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// include_once '../inc/class_autoload.inc.php';
// echo __DIR__;
include_once '../models/controller.php';
include_once '../models/products.php';
include_once '../config/Database.php';

$read_products = new Controller();
$read_products->fetchProducts();
