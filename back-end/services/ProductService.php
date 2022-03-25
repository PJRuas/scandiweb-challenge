<?php
    require_once('./gateways/implementations/ProductCollection.php');
    require_once('./services/validators/ProductValidator.php');

    class ProductService {
        private $repository;
        private $validator;
        private $dbType;

        public function __construct(string $dbType){
            $this->dbType = $dbType;
        }

        private function checkRepository(){
            $dbSlector = ['collection' => new ProductCollection()];
            
            $this->repository ??= $dbSlector[$this->dbType];
        }

        private function checkValidator(){
            $this->validator ??= new ProductValidator();
         }

        public function saveToDB (Product $product) {
            $this->checkRepository();
            $this->checkValidator();
            
            return $this->repository->save($product);
        }

        public function deleteFromDB (Product $product) {
            $this->checkRepository();
            $this->checkValidator();

            $this->repository->delete($product);
        }

        public function getAllFromDB () {
            $this->checkRepository();
            return $this->repository->getAll();
        }

        public function getBySku (string $productSku) {
            $this->checkRepository();
            
            return $this->repository->getBySku($productSku);
        }

    }
?>