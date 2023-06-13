<?php

class Furniture extends Products
{
    public $height;
    public $width;
    public $length;

    public function __construct($sku, $name, $price, $height, $width, $length)
    {
        parent::__construct($sku, $name, $price);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    public function addProductType()
    {
        if ($this->insert()) {
            $query = 'INSERT INTO
                            furniture
                         SET 
                            product_sku = :product_sku,
                            height = :height,
                            width = :width,
                            length = :length;';

            $stmt = self::connect()->prepare($query);

            $stmt->bindParam(':product_sku', $this->sku);
            $stmt->bindParam(':height', $this->height);
            $stmt->bindParam(':width', $this->width);
            $stmt->bindParam(':length', $this->length);



            if ($stmt->execute()) {
                return true;
            }

            return false;
        }

        return false;
    }

}
