<?php

    class Router {

        public array $getRoutes = [];
        public array $postRoutes = [];

        public function get(string $url, $function){
            $this->getRoutes[$url] = $function;
        }

        public function post(string $url, $function) {
            $this->postRoutes[$url] = $function;

        }

        public function resolve(){
            $currentUrl = $_SERVER['REQUEST_URI'];
            $methodRequest = $_SERVER['REQUEST_METHOD'];
            $findFunction = ['GET' => $this->getRoutes[$currentUrl], 'POST' => $this->postRoutes[$currentUrl]];
            $function = $findFunction[$methodRequest];

            call_user_func([new ProductController, $function]);            
        }
    }

?>