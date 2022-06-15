<?php

    require_once("./module.php");

    class ProductDto {

        public function __construct(){}

        public static function fromRequest(array $productRequest) {
            $productType = $productRequest["productType"]; 
            $productSku = $productRequest["productSku"];
            $productName = $productRequest["productName"];
            $productPrice = (float) $productRequest["productPrice"];

            $commonFields = [$productType, $productSku, $productName, $productPrice];

            $productAttribute = array_map('floatval', array_values(array_diff($productRequest, $commonFields)));
            if(sizeof($productAttribute) == 1) { $productAttribute = (float) $productAttribute[0];}
            
            return ['sku' => $productSku, 'name' => $productName, 'price' => $productPrice, 'attribute' => $productAttribute];
        }

        public static function fromResponse(array $productResponse){ 
            $productSku = $productResponse["sku"];
            $productName = $productResponse["name"];
            $productPrice = (float) $productResponse["price"];
            $productAttribute = json_decode($productResponse['attribute']);

            return ['sku' => $productSku, 'name' => $productName, 'price' => $productPrice, 'attribute' => $productAttribute];
        }

    }
?>