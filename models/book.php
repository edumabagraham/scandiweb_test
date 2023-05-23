<?php 

    class Book extends Products
    {
        public $id;
        public $weight;

        public function __construct($sku,$name,$price,$weight)
        {
            parent::__construct($sku,$name,$price);
            $this->weight = $weight;
        }

        public function addProductType()
        {
            if ($this->insertProduct()) {
                $query = 'INSERT INTO
                            book
                         SET 
                            product_sku = :product_sku,
                            weight = :weight;';
    
                $stmt = self::connect()->prepare($query);
        
                $stmt->bindParam(':product_sku', $this->sku);
                $stmt->bindParam(':weight', $this->weight);
        
                if ($stmt->execute()) {
                    return true;
                }
        
                return false;
            }

            return false;
        }
    }