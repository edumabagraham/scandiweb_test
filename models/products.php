<?php

abstract class Products extends Database
{

    public $sku;
    public $name;
    public $price;

    public function __construct($sku, $name,$price){
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    public static function read()
    {
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
        } else {
            $stmt = null;
        }
    }

    public function insertProduct()
    {
        $query = 'INSERT INTO
                        products
                    SET
                        sku = :sku,
                        name = :name,
                        price = :price
                ;';
        $stmt = self::connect()->prepare($query);
        
        //Bind params
        $stmt->bindParam(':sku', $this->sku);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);        
        
        if ($stmt->execute()) {
            return true;
        }
      return false;
    }

    abstract public function addProductType();

}
