<?php

require_once __DIR__ . '/ProductDecorator.php';

class DiscountDecorator extends ProductDecorator
{
    public $discount;

    public function __construct(Product $product, float $discount)
    {
        parent::__construct($product);

        $this->discount = $discount;

    }

    public function getInfo(): string
    {
        $newPrice = $this->product->prix - $this->discount;
        return "{$this->product->id} - {$this->product->libelle} -
{$newPrice}€ (promo)";
    }
}

$product = new Product(1, "Souris", 30);

$promo = new DiscountDecorator($product, 5);

echo $promo->getInfo();
