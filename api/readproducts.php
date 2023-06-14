<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


include_once '../inc/class_autoload.inc.php';


$read_products = new Controller();
$read_products->fetchProducts();
