<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Scandiweb-challenge</title>
</head>
<body>
        <?php
                require_once("./module.php");
                ?>


        <?php

                $searchParam = $_GET['search'] ??= null;
                $filter = $_GET['filter'] ??= null;
        ?>

        <div class="input-group" id="search-bar">
                <form>
                        <input type="text" placeholder="Search Product" name="search" value="<?php echo $searchParam ?>">
                        <select name="filter" onchange="" class="form-control">
                                <option value="name">name</option>
                                <option value="sku">sku</option>
                                <option value="price">price</option>
                                <option value="type">type</option>
                        </select>
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                </form>
        </div>

        <form method="POST" action="" style="display: inline-block;">
                <button><a href="productPage.php">ADD</a></button>
                <button type="submit">MASS DELETE</button>
        </br>
        </br>
        <?php
                
                $service = new ProductService('mysql');
                $productDto = new ProductDto();
                
                if($searchParam){
                        $products = $service->getByParam($filter, $searchParam);
                } else {
                        $products = $service->getAllFromDB();
                }

                foreach($products as $result){ 
                        $product = $productDto->fromResponse($result);
                        echo $product;
                        ?>       
                        <tr>
                                <td>
                                        <input type="checkbox" class="delete-checkbox" name="delete[]" value="<?php echo $product->getSku() ?>">
                                </td>
                        </tr>
                </br>
        </br>
        
        <?php 
                }

                if($_SERVER['REQUEST_METHOD'] === 'POST') {
                        foreach($_POST['delete'] as $toDelete){
                                $service->deleteFromDB($toDelete);
                        }
                        header('Location: ./index.php');
                }
                ?>
        </form>
        
</body>
</html>