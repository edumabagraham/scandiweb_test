<?php 

    abstract class Products extends Database{

        protected $sku;
        protected $name;
        protected $price;

        public static function read(){
            $query = 'SELECT
                        *
                      FROM
                        products p
                      LEFT JOIN book b ON p.sku = b.product_sku
                      LEFT JOIN dvd d ON p.sku = d.product_sku
                      LEFT JOIN furniture f ON p.sku = f.product_sku
                      ORDER BY p.sku';
            
            $stmt = self::connect()->prepare($query);

            if ($stmt->execute()) {
               return $stmt; 
            }else{
                $stmt = null;
            }
        }
    }
?>