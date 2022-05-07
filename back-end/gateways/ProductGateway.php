<?php
    interface ProductGateway {
        public function save(Product $product);
        public function delete(string $productSku);
        public function getBySku(string $productSku);
        public function getAll();
        public function update(Product $product);
        public function getByParam(string $parameter, string $value);
    }
?>