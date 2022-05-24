<?php require_once("./module.php");

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: content-type");
        
        $controller = new ProductController();
        $router = new Router();

        $router->get('/', [$controller, 'getAllFromDB']);
        $router->post('/add', [$controller, 'postToDB']);
        $router->post('/delete', [$controller, 'deleteFromDB']);
        
        $router->resolve();
?>