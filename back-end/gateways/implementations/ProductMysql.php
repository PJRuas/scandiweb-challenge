<?php
    require_once('./gateways/ProductGateway.php');
        
    class ProductMysql implements ProductGateway {
        private $dbType = 'mysql';
        private $dbHost = 'sql11.freemysqlhosting.net';
        private $dbPort = '3306';
        private $dbName = 'sql11494752';
        private $dbLogin = 'sql11494752';
        private $dbPass = 'SZzREsH2nE';
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
            $statement = $this->pdo->prepare("DELETE FROM products WHERE sku = '$productSku' ");
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
        }
        
        public function getAll(){
            $this->pdo ? : $this->connect();
            $statement = $this->pdo->prepare('SELECT * FROM products');
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>