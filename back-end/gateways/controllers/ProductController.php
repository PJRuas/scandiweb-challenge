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

        public function postToDB(){
            $productRequest = $_POST;
            $this->startController();
            $productToSave = $this->productDto->fromRequest($productRequest);
            $this->service->saveToDB($productToSave);
        }

        public function deleteFromDB(){
            $this->startController();
            $markedProducts = json_decode(file_get_contents('php://input'));

            foreach($markedProducts as $toDelete){
                $this->service->delete($toDelete);
            }
        }
    }
?>