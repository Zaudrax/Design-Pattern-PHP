<?php

require_once __DIR__ . '/../common/Product.php';

class ProductAdapter
{
    public static function fromArray(array $data): Product
    {
        return new Product(
            $data['id'],
            $data['name'],
            $data['price']
        );
    }
}
$data = ["id" => 1, "name" => "Clavier", "price" => 50];

$product = ProductAdapter::fromArray($data);

echo $product->getInfo();
