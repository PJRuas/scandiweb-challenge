
<?php
        include_once("./components/nav-bar.php");

        require_once("./module.php");

        $dvdTest = new Dvd('Dvd-key', 'A Fuga das Galinhas', 45, 400.65);
        $bookTest = new Book('Book-Key', 'Lord of the Rings', 125, 0.5);
        $furnitureTest = new Furniture('Furniture-Key', 'A Huge Couch', 5000.55, ['H' => 80, 'W' => 300, 'L' => 85]);


        $inputTest = [$dvdTest, $bookTest, $furnitureTest];
        $service = new ProductService('collection');

        foreach($inputTest as $product){
                $service->saveToDB($product);
        }

        $db = $service->getAllFromDB();

        foreach($db as $result){
                echo $result . '</br>';
        }

        $service->deleteFromDB($furnitureTest);
        $db = $service->getAllFromDB();
        $test = $service->getBySku('Book-Key');

        foreach($db as $result){
                echo $result . '</br>';
        }

        echo $test;

        // $arrayTest = [$dvdTest, $bookTest, $furnitureTest];

        // foreach($arrayTest as $product){
        //         echo $product->getSku() . '<br>';
        //         echo $product->getName() . '<br>';
        //         echo $product->getPrice() . '<br>';
        //         echo $product->getAttribute() . '<br>';
        // }

        // $test = $furnitureTest->getAttribute()['W'];

        // echo $test;

        // echo '<pre>';
        // var_dump($furnitureTest->getAttribute());



        // define('PI', 3.14);
        // echo PI . '</br>';

        // include_once("./components/footer.php");
?>