<?php
    require_once("Product.php");

    class Furniture extends Product {
        private array $uniqueAttibute;

        public function __toString(){
            $name = $this->getName();
            $dimensions = $this->getAttribute()['H'] . "x" . $this->getAttribute()['W'] . "x" . $this->getAttribute()['L'] . " cm";
            $price = $this->getPrice();

            return "Furniture: $name ($dimensions) | Price: U$$price";
        }
    }
?>