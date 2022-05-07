<?php
    require_once('./models/Product.php');

    class ProductValidator{
        public function validateSave(Product $product) {
            $skuKey = $product->getSku();
            $name = $product->getName();
            $price = $product->getPrice();
            $attribute = $product->getAttribute();
            
            $testArray = array($skuKey, $name, $price, $attribute);
            return !in_array(null, $testArray, false);
        }

        public function validateDelete() {

        }
    }
?>