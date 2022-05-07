<?php
    require_once("Product.php");

    class Dvd extends Product {

        public function __toString(){
            $name = $this->getName();
            $attribute = $this->getAttribute();
            $price = $this->getPrice();
            $sku = $this->getSku();

            return "Dvd: [$sku] $name ($attribute MB) | Price: U$$price";
        }

        public static function listAttribute(){ return ['size']; }
        public function getType(){ return 'dvd'; }

    }
?>