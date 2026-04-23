<?php

require_once '../common/Product.php';

class ProductProxy
{
    private $product = null;
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;

    }

    private function load(): Product
    {
        // simulation base de données
        return new Product($this->id, "Produit DB", 99.99);
    }

    public function getProduct(): Product
    {
        if ($this->product === null) {
            $this->product = $this->load();
        }
        return $this->product;
    }
}

$proxy = new ProductProxy(10);

$product = $proxy->getProduct();
echo $product->getInfo();
