<?php
    require_once("Product.php");

    class Book extends Product {
        private float $uniqueAttibute;

        public function __toString(){
            $name = $this->getName();
            $attribute = $this->getAttribute();
            $price = $this->getPrice();

            return "Book: $name ($attribute Kg) | Price: U$$price";
        }
    }
?>