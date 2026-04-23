<?php

require_once __DIR__ . '/../common/Product.php';

class ProductDecorator
{
    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;

    }

    public function getInfo(): string
    {
        return $this->product->getInfo();
    }
}
