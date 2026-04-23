<?php

require_once __DIR__ . '/database/DatabaseSingleton.php';
require_once __DIR__ . '/factories/ProductFactory.php';
require_once __DIR__ . '/repositories/ProductRepository.php';

try {
    $db = DatabaseSingleton::getInstance();
    $repository = new ProductRepository($db->pdo);

    $product1 = ProductFactory::create('simple', 'Livre', 20);
    $product2 = ProductFactory::create('digital', 'Ebook', 10);
    $product3 = ProductFactory::create('service', 'Support Premium', 49.99);

    $repository->insertProduct($product1);
    $repository->insertProduct($product2);
    $repository->insertProduct($product3);

    echo 'Produits inseres avec succes.' . PHP_EOL;
} catch (Exception $e) {
    echo 'Erreur: ' . $e->getMessage() . PHP_EOL;
}
