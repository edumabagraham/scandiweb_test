<?php

class Dvd extends Products
{
    public $id;
    public $product_sku;
    public $size;

    public function read()
    {
        $query = 'SELECT 
                        p.sku,
                        p.name,
                        p.price,
                        d.size
                    FROM
                    ' . $this->table . ' p
                    INNER JOIN dvd d ON p.sku = d.product_sku        
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
