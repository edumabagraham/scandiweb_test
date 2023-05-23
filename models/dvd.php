<?php

class Dvd extends Products
{
    public $id;
    public $size;

    public function __construct($sku,$name,$price,$size){
        parent::__construct($sku,$name,$price);
        $this->size = $size;

    }

    public function addProductType()
    {   
        if ($this->insertProduct()) {
            $query = 'INSERT INTO
                        dvd
                     SET 
                        product_sku = :product_sku,
                        size = :size;';
    
            
            $stmt = self::connect()->prepare($query);
    
            $stmt->bindParam(':product_sku', $this->sku);
            $stmt->bindParam(':size', $this->size);
    
            if ($stmt->execute()) {
                return true;
            }
    
            return false;
        }

        return false;
    }
}
