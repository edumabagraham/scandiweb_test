<?php

class Controller
{
    public function fetchProducts()
    {
        $products_results = Products::read();
        $num = $products_results->rowCount();

        if ($num > 0) {
            $products_arr = array();
            $products_arr['data'] = array();

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
                array_push($products_arr['data'], array_filter($product_item));
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
    }
}
