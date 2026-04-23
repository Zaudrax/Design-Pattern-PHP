<?php

require_once __DIR__ . '/../common/product.php';
class ProductSingleton
{
    private static $instance = null;

    public $product;

    private function __construct()
    {
        $this->product = new Product(1, "Unique", 100);
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new ProductSingleton();
        }
        return self::$instance;
    }
}

// utilisation du singleton 
$instance = ProductSingleton::getInstance();
print_r($instance->product);
