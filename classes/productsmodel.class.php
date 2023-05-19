<?php 

    class ProductsModel{

        public function fetchProducts(){
            $book = new Book();
            $dvd = new Dvd();
            $furniture = new Furniture();

            $book_results = $book->read();
            $dvd_results = $dvd->read();
            $furniture_results = $furniture->read();

            $book_num = $book_results->rowCount();
            $dvd_num = $dvd_results->rowCount();
            $furniture_num = $furniture_results->rowCount();

            $products_arr = array();
            $products_arr['data'] = array();

            if ($book_num > 0) {
                while ($row = $book_results->fetch(PDO::FETCH_ASSOC)) {
                    // print_r($row);
                    extract($row);

                    $product_item = array(
                        'sku' => $sku,
                        'name' => $name,
                        'price' => $price,
                        'weight' => $weight
                    );
                    array_push( $products_arr['data'], $product_item);
                    
                }
            }

            if ($dvd_num > 0) {
                while ($row = $dvd_results->fetch(PDO::FETCH_ASSOC)) {
                    // print_r($row);
                    extract($row);

                    $product_item = array(
                        'sku' => $sku,
                        'name' => $name,
                        'price' => $price,
                        'size' => $size
                    );
                    array_push( $products_arr['data'], $product_item);
                }
            }

            if ($furniture_num > 0) {
                while ($row = $furniture_results->fetch(PDO::FETCH_ASSOC)) {
                    // print_r($row);
                    extract($row);

                    $product_item = array(
                        'sku' => $sku,
                        'name' => $name,
                        'price' => $price,
                        'height' => $height,
                        'width' => $width,
                        'length' => $length
                    );
                    array_push( $products_arr['data'], $product_item);
                }
            }

            if (count($products_arr) > 0) {
                echo json_encode($products_arr);
            }          
            else{
                echo json_encode(array(
                    'message' => 'No products yet'
                ));
            }
        }

        public function addProduct(){

        }
    }


    