<?php

require_once __DIR__ . '/../models/SimpleProduct.php';
require_once __DIR__ . '/../models/DigitalProduct.php';
require_once __DIR__ . '/../models/ServiceProduct.php';

class ProductFactory
{
    public static function create($type, $name, $price)
    {
        switch (strtolower($type)) {
            case 'simple':
                return new SimpleProduct($name, $price);
            case 'digital':
                return new DigitalProduct($name, $price);
            case 'service':
                return new ServiceProduct($name, $price);
            default:
                throw new Exception('Type de produit inconnu: ' . $type);
        }
    }
}
