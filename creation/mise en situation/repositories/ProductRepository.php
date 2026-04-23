<?php

class ProductRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertProduct($product)
    {
        $sql = 'INSERT INTO products (name, price, type) VALUES (?, ?, ?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $product->name,
            $product->price,
            $product->getType(),
        ]);
    }
}
