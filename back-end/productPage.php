<?php
    require_once("./module.php");
    $service = new ProductService("mysql");
    $productDto = new ProductDto();
    $insertFields = $_GET['productType'] ??= 'book';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
</head>
<body>
    <h1>Product Registration</h1>
    
    <form action="" method="GET">
        <div class="form-group">
                <label for="productType">Type</label>
                <button type="submit">
                    <select name="productType" class="form-control" id="productType">
                        <option value="<?php echo $insertFields ?>"><?php echo ucfirst($insertFields) ?></option>
                        <option value="book">Book</option>
                        <option value="dvd">Dvd</option>
                        <option value="furniture">Furniture</option>
                    </select>
                </button>
            </div>
    </form>
</br>
<form action="" method="POST" id="product_form">
        <div class="form-group">
            <label for="productSku">Sku</label>
            <input type="text" name="productSku" class="form-control" id="sku" required>
        </div>
        <div class="form-group">
            <label for="productName">Name</label>
            <input type="text" name="productName" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="productPrice">Price</label>
            <input type="number" name="productPrice" step="0.01" min="0.01" class="form-control" id="price" required>
        </div>

    </br>
    </br>


        <?php

            $productType = ['book' => Book::listAttribute(), 'dvd' => Dvd::listAttribute(), 'furniture' => Furniture::listAttribute()];
            $attributes = $productType[$insertFields];

            foreach($attributes as $field){
                ?>
                    <div>
                        <label for="productAttribute"><?php echo ucfirst($field) ?></label>
                        <input type="number" name="<?php echo $field ?>" step="0.01" min="0" class="form-control" id="<?php echo $field ?>" required>
                    </div>
                <?php
            }
        ?>
        
        <button type="submit">Save</button>
    </form>
    </br>
    <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['productType'] = $_GET['productType'];

            $productToSave = $productDto->fromRequest($_POST);
            $service->saveToDB($productToSave);
            header('Location: ./index.php');
        }
    ?>
    <button><a href="index.php">CANCEL</a></button>
</body>
</html>