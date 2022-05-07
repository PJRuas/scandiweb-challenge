<?php
    require_once("Product.php");

    class Furniture extends Product {

        public function __toString(){
            $name = $this->getName();
            $dimensions = $this->getAttribute()[0] . "x" . $this->getAttribute()[1] . "x" . $this->getAttribute()[2] . " cm";
            $price = $this->getPrice();
            $sku = $this->getSku();

            return "Furniture: [$sku] $name ($dimensions) | Price: U$$price";
        }

        public static function listAttribute(){ return ['lenght', 'width', 'height']; }
        public function getType(){ return 'furniture'; }
    }
?>