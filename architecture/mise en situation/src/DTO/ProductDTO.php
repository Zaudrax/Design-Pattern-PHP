<?php

require_once __DIR__ . '/../Entity/Product.php';

class ProductDTO
{
    public int $id;
    public string $nom;
    public float $prix;
    public int $stock;

    public function __construct(int $id, string $nom, float $prix, int $stock)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->stock = $stock;
    }

    public static function fromEntity(Product $product): self
    {
        return new self(
            (int) $product->getId(),
            $product->getNom(),
            $product->getPrix(),
            $product->getStock()
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'prix' => $this->prix,
            'stock' => $this->stock,
        ];
    }
}
