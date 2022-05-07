<?php

    require_once("./module.php");

    class ProductDto {

        public function __construct(){}

        public function fromRequest(array $productRequest) {
            $productType = $productRequest["productType"]; 
            $productSku = $productRequest["productSku"];
            $productName = $productRequest["productName"];
            $productPrice = (float) $productRequest["productPrice"];

            $commonFields = [$productType, $productSku, $productName, $productPrice];

            $productAttribute = array_map('floatval', array_values(array_diff($productRequest, $commonFields)));
            if(sizeof($productAttribute) == 1) { $productAttribute = (float) $productAttribute[0];}
            
            return $this->typeSelector($productType, $productSku, $productName, $productPrice, $productAttribute);
        }

        public function fromResponse(array $productResponse){
            $productType = $productResponse["type"]; 
            $productSku = $productResponse["sku"];
            $productName = $productResponse["name"];
            $productPrice = (float) $productResponse["price"];
            $productAttribute = json_decode($productResponse['attribute']);

            return $this->typeSelector($productType, $productSku, $productName, $productPrice, $productAttribute);
        }

        private function typeSelector($productType, $productSku, $productName, $productPrice, $productAttribute){
            $typeSelector = ["dvd" => new Dvd($productSku, $productName, $productPrice, $productAttribute),
            "book" => new Book($productSku, $productName, $productPrice, $productAttribute),
            "furniture" => new Furniture($productSku, $productName, $productPrice, $productAttribute)];
            
            return $typeSelector[$productType];
        }

    }
?>