<?php
    $basePath = ".";

    //MODELS
    require_once("$basePath/models/Product.php");
    require_once("$basePath/models/Dvd.php");
    require_once("$basePath/models/Furniture.php");
    require_once("$basePath/models/Book.php");
    
    //SERVICES
    require_once("$basePath/services/ProductService.php");
    require_once("$basePath/gateways/controllers/dto/ProductDto.php");
    require_once("$basePath/gateways/controllers/ProductController.php");
    require_once("$basePath/gateways/controllers/Router.php");

?>