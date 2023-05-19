<?php 

    class Furniture extends Products
    {
        public $id;
        public $product_sku;
        public $height;
        public $width;
        public $length;


        public function read()
        {
            $query = 'SELECT 
                            p.sku,
                            p.name,
                            p.price,
                            f.height,
                            f.width,
                            f.length
                        FROM
                        ' . $this->table . ' p
                        INNER JOIN furniture f ON p.sku = f.product_sku        
                        ORDER BY p.sku
                        ;';
            $stmt = $this->connect()->prepare($query);
            if ($stmt->execute()) {
                return $stmt;
            } else {
                $stmt = null;
            }
        }
    }
