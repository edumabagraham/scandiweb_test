<?php
header('Access-Control-Allow-Origin: *');  
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: *');


include_once '../inc/class_autoload.inc.php';

$add_product = new Controller();
$add_product->addProduct();