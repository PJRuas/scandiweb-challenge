<?php
    abstract class Product {
        private string $skuKey;
        private string $name;
        private float $price;
        private mixed $uniqueAttribute;

        public function __construct($skuKey, $name, $price, $uniqueAttribute){
            $this->name = $name;
            $this->price = $price;
            $this->skuKey = $skuKey;
            $this->uniqueAttribute = $uniqueAttribute;
        }

        abstract public function __toString();

        public function getSku() {return $this->skuKey;}
        public function getName() {return $this->name;}
        public function getPrice() {return $this->price;}
        public function getAttribute() {return $this->uniqueAttribute;}
        public function getType() {return '';}
        

        public function setSku($skuKey) {$this->skuKey = $skuKey;}
        public function setName($name) {$this->name = $name;}
        public function setPrice($price) {$this->price = $price;}
        public function setAttribute($attribute) {$this->uniqueAttribute = $attribute;}

    }
?>