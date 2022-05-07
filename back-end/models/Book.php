<?php
    require_once("Product.php");

    class Book extends Product {
            
            public function __toString(){
                $name = $this->getName();
                $attribute = $this->getAttribute();
                $price = $this->getPrice();
                $sku = $this->getSku();
                
                return "Book: [$sku] $name ($attribute Kg) | Price: U$$price";
            }
            
            
        public static function listAttribute(){ return ['weight']; }
        public function getType(){ return 'book'; }

    }
?>