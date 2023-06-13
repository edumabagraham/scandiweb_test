<?php

include_once 'book.php';
include_once 'dvd.php';
include_once 'furniture.php';

class Controller
{
    public function fetchProducts()
    {
        $products_results = Products::read();
        $num = $products_results->rowCount();

        if ($num > 0) {
            $products_arr = array();

            while ($row = $products_results->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $product_item = array(
                    'sku' => $sku,
                    'name' => $name,
                    'price' => $price,
                    'size' => $size,
                    'weight' => $weight,
                    'height' => $height,
                    'width' => $width,
                    'length' => $length
                );
                array_push($products_arr, array_filter($product_item));
            }
            echo json_encode($products_arr);
        } else {
            echo json_encode(array(
                'message' => 'No products yet'
            ));
        }
    }


    public function addProduct()
    {
        //Get data -- postman
        $data = json_decode(file_get_contents('php://input'));

        $type = $data->type;
        unset($data->type);
        $data = (array) $data;  // convert object to array
        $product = new $type(...$data); //spreading to provide only data peculiar to the class

        try {
            if ($product->addProductType()) {
                echo json_encode(
                    array(
                        'message' => 'Product added'
                    )
                );
            } else {
                echo json_encode(
                    array('message' => 'Product Not Added')
                );
            }
        } catch (Exception) {
            echo json_encode(
                array(
                    'message' => 'SKU already exists!'
                )
            );
        }
    }

    public function deleteProduct()
    {
        $data = json_decode(file_get_contents('php://input'));
        print_r($data);
        foreach($data as $sku)
        {
            Products::delete($sku);
        }
    }
}
 