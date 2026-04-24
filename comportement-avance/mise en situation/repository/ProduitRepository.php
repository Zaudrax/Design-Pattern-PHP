<?php

require_once __DIR__ . '/../model/Produit.php';

class ProduitRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function ajouter(Produit $produit): int
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO produits (nom, prix, stock) VALUES (:nom, :prix, :stock)'
        );
        $stmt->execute([
            ':nom' => $produit->nom,
            ':prix' => $produit->prix,
            ':stock' => $produit->stock,
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function modifier(Produit $produit): void
    {
        if ($produit->id === null) {
            throw new InvalidArgumentException('Impossible de modifier un produit sans id.');
        }

        $stmt = $this->pdo->prepare(
            'UPDATE produits SET nom = :nom, prix = :prix, stock = :stock WHERE id = :id'
        );
        $stmt->execute([
            ':id' => $produit->id,
            ':nom' => $produit->nom,
            ':prix' => $produit->prix,
            ':stock' => $produit->stock,
        ]);

        if ($stmt->rowCount() === 0) {
            throw new RuntimeException("Aucun produit trouve avec l'id {$produit->id}.");
        }
    }

    public function supprimer(int $id): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM produits WHERE id = :id');
        $stmt->execute([':id' => $id]);

        if ($stmt->rowCount() === 0) {
            throw new RuntimeException("Aucun produit trouve avec l'id {$id}.");
        }
    }
}
