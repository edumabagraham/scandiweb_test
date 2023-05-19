<?php 
    
    abstract class Products extends Dbh
    {
        protected $table = 'products';

        //Database columns
        public $sku;
        public $name;
        public $price;

        abstract public function read();

    }