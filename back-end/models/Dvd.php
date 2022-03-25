<?php
    require_once("Product.php");

    class Dvd extends Product {
        private float $uniqueAttibute;

        public function __toString(){
            $name = $this->getName();
            $attribute = $this->getAttribute();
            $price = $this->getPrice();

            return "Dvd: $name ($attribute MB) | Price: U$$price";
        }
    }
?>