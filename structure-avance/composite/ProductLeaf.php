<?php

require_once "ProductComponent.php";

class ProductLeaf implements ProductComponent
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;

    }

    public function getInfo(): string
    {
        return $this->product->getInfo();
    }
}
