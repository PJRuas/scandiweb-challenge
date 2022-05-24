<?php
    require_once("./module.php");

    class ProductController {

        private $service;
        private $productDto;
        
        private function startController(){
            $this->service ??= new ProductService('mysql');
            $this->productDto ??= new ProductDto();
        }

        public function getAllFromDB(){
            $this->startController();
            echo json_encode($this->service->getAllFromDB());
        }

        public function postToDB($productRequest = null){
            $productRequest ??= $_POST;
            $this->startController();
            $productToSave = $this->productDto->fromRequest($productRequest);
            $this->service->saveToDB($productToSave);
        }

        public function deleteFromDB(array $markedProducts = null){
            $this->startController();
            $markedProducts ??= json_decode(file_get_contents('php://input'));

            foreach($markedProducts as $toDelete){
                echo $toDelete;
                $this->service->delete($toDelete);
            }
        }
    }
?>