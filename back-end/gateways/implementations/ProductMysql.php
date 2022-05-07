<?php
    require_once('./gateways/ProductGateway.php');
        
    class ProductMysql implements ProductGateway {
        private $dbType = 'mysql';
        private $dbHost = 'localhost';
        private $dbPort = '3306';
        private $dbName = 'scandiweb_challenge';
        private $dbLogin = 'pedro';
        private $dbPass = '0306201526';
        private $dbDeclare;
        private $pdo;
        
        
        private function connect(){
            $this->dbDeclare = "$this->dbType:host=$this->dbHost;port=$this->dbPort;dbname=$this->dbName";
            $this->pdo = new PDO($this->dbDeclare, $this->dbLogin, $this->dbPass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }

        public function save(Product $product){
            $sku = $product->getSku();
            $name = $product->getName();
            $price = $product->getPrice();
            $attribute = json_encode($product->getAttribute());
            $type = $product->getType();

            $this->pdo ? : $this->connect();
            $statement = $this->pdo->prepare("INSERT INTO products
                (sku, name, price, attribute, type)
                VALUES('$sku', '$name', '$price', '$attribute', '$type');
            ");
            $statement->execute();
        }

        public function delete(string $productSku){
            $this->pdo ? : $this->connect();
            $statement = $this->pdo->prepare("DELETE FROM products p WHERE p.sku = '$productSku' ");
            $statement->execute();
        }

        public function getBySku(string $productSku){
            $this->pdo ? : $this->connect();
            $statement = $this->pdo->prepare("SELECT * FROM products p WHERE p.sku = '$productSku' ");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getByParam(string $parameter, string $value){
            $this->pdo ? : $this->connect();
            $statement = $this->pdo->prepare("SELECT * FROM products p WHERE p.$parameter like '%$value%' ");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update(Product $productToUpdate){
            // $this->pdo ? : $this->connect();
            
            // $productSku = $productToUpdate->getSku();
            // $sku = $productToUpdate->getSku();
            // $name = $productToUpdate->getName();
            // $price = $productToUpdate->getPrice();
            // $attribute = json_encode($productToUpdate->getAttribute());
            // $type = $productToUpdate->getType();


            // $statement = $this->pdo->prepare('SELECT * FROM products');
            // $statement->execute();
            // return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function getAll(){
            $this->pdo ? : $this->connect();
            $statement = $this->pdo->prepare('SELECT * FROM products');
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>