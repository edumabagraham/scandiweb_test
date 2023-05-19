<?php 

    class Book extends Products
    {
        public $id;
        public $product_sku;
        public $weight;

        public function read()
        {
            $query = 'SELECT 
                            p.sku,
                            p.name,
                            p.price,
                            b.weight
                        FROM
                        ' . $this->table . ' p
                        INNER JOIN book b ON p.sku = b.product_sku        
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