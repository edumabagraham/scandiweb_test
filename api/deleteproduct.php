<?php 
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: *');

    include_once '../inc/class_autoload.inc.php';

    $delete_product = new Controller();
    $delete_product->deleteProduct();
?>