<?php
    interface ProductGateway {
        public function save(Product $product);
        public function delete(Product $product);
        public function getBySku(string $productSku);
        public function getAll();
        // public function update(Product $product);
    }
?>