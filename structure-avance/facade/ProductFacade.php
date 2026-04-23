<?php

require_once '../common/Product.php';

class ProductFacade
{
    public function createProduct(): Product
    {
        return new Product(1, "Clavier Facade", 70);
    }

    public function show(Product $p): string
    {
        return $p->getInfo();
    }
}

$facade = new ProductFacade();
$product = $facade->createProduct();
echo $facade->show($product);
