<?php
    require_once("./module.php");

    class ProductController {

        private $service;
        
        private function startController(){
            $this->service ??= new ProductService('mysql');
        }

        public function getAllFromDB(){
            $this->startController();
            echo json_encode($this->service->getAllFromDB());
        }

        private function postToDB($productToSave){
            $this->startController();
            $this->service->saveToDB($productToSave);
        }

        public function postBook(){
            $productRequest = $_POST;
            $productArgs = ProductDto::fromRequest($productRequest);
            $book = new Book($productArgs['sku'], $productArgs['name'], $productArgs['price'], $productArgs['attribute']);
            $this->postToDB($book);
        }

        public function postDvd(){
            $productRequest = $_POST;
            $productArgs = ProductDto::fromRequest($productRequest);
            $dvd = new Dvd($productArgs['sku'], $productArgs['name'], $productArgs['price'], $productArgs['attribute']);
            $this->postToDB($dvd);
        }

        public function postFurniture(){
            $productRequest = $_POST;
            $productArgs = ProductDto::fromRequest($productRequest);
            $furniture = new Furniture($productArgs['sku'], $productArgs['name'], $productArgs['price'], $productArgs['attribute']);
            $this->postToDB($furniture);
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