<?php
    require_once('./gateways/ProductGateway.php');

    class ProductCollection implements ProductGateway{
        private $products = [];

        public function save(Product $product){
            $this->products[$product->getSku()] = $product;
            return $product;
        }

        public function delete(string $productSku){
            unset($this->products[$this->getBySku($productSku)]);
        }

        public function getBySku(string $productSku){
            return $this->products[$productSku] ??= 'SKU not registered';
        }

        public function getAll(){
            return $this->products;
        }

        public function update(Product $product){
        //     $productToUpdate = $this->getBySku($product->getSku());
            
        }

        public function getByParam(string $parameter, string $value){
            
        }

    }
?>