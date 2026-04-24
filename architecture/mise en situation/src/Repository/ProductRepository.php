<?php

require_once __DIR__ . '/../Entity/Product.php';

class ProductRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function add(Product $product): int
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO produits (nom, prix, stock) VALUES (:nom, :prix, :stock)'
        );

        $stmt->execute([
            ':nom' => $product->getNom(),
            ':prix' => $product->getPrix(),
            ':stock' => $product->getStock(),
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function update(Product $product): bool
    {
        if ($product->getId() === null) {
            throw new InvalidArgumentException('Impossible de modifier un produit sans id.');
        }

        $stmt = $this->pdo->prepare(
            'UPDATE produits SET nom = :nom, prix = :prix, stock = :stock WHERE id = :id'
        );

        $stmt->execute([
            ':id' => $product->getId(),
            ':nom' => $product->getNom(),
            ':prix' => $product->getPrix(),
            ':stock' => $product->getStock(),
        ]);

        return $stmt->rowCount() > 0;
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM produits WHERE id = :id');
        $stmt->execute([':id' => $id]);

        return $stmt->rowCount() > 0;
    }

    public function findById(int $id): ?Product
    {
        $stmt = $this->pdo->prepare(
            'SELECT id, nom, prix, stock FROM produits WHERE id = :id'
        );
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return new Product(
            (int) $row['id'],
            (string) $row['nom'],
            (float) $row['prix'],
            (int) $row['stock']
        );
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query('SELECT id, nom, prix, stock FROM produits ORDER BY id ASC');
        $rows = $stmt->fetchAll();

        $products = [];
        foreach ($rows as $row) {
            $products[] = new Product(
                (int) $row['id'],
                (string) $row['nom'],
                (float) $row['prix'],
                (int) $row['stock']
            );
        }

        return $products;
    }
}
