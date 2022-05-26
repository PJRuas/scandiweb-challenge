<?php require_once("./module.php");

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: content-type");
        header("Access-Control-Allow-Methods: *");
        
        $router = new Router();

        $router->get('/', 'getAllFromDB');
        $router->post('/add', 'postToDB');
        $router->post('/delete', 'deleteFromDB');
        
        $router->resolve();
?>