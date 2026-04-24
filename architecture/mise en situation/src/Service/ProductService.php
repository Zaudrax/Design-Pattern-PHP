<?php

require_once __DIR__ . '/../Repository/ProductRepository.php';
require_once __DIR__ . '/../DTO/ProductDTO.php';

class ProductService
{
    private ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function ajouterProduit(string $nom, float $prix, int $stock): ProductDTO
    {
        $this->validateData($nom, $prix, $stock);

        $product = new Product(null, $nom, $prix, $stock);
        $id = $this->repository->add($product);
        $product->setId($id);

        return ProductDTO::fromEntity($product);
    }

    public function modifierProduit(int $id, string $nom, float $prix, int $stock): ?ProductDTO
    {
        $this->validateData($nom, $prix, $stock);

        $existing = $this->repository->findById($id);
        if ($existing === null) {
            return null;
        }

        $existing->setNom($nom);
        $existing->setPrix($prix);
        $existing->setStock($stock);
        $this->repository->update($existing);

        return ProductDTO::fromEntity($existing);
    }

    public function supprimerProduit(int $id): bool
    {
        return $this->repository->delete($id);
    }

    public function recupererProduit(int $id): ?ProductDTO
    {
        $product = $this->repository->findById($id);

        if ($product === null) {
            return null;
        }

        return ProductDTO::fromEntity($product);
    }

    public function listerProduits(): array
    {
        $products = $this->repository->findAll();
        $dtos = [];

        foreach ($products as $product) {
            $dtos[] = ProductDTO::fromEntity($product);
        }

        return $dtos;
    }

    private function validateData(string $nom, float $prix, int $stock): void
    {
        if (trim($nom) === '') {
            throw new InvalidArgumentException('Le nom du produit est obligatoire.');
        }

        if ($prix < 0) {
            throw new InvalidArgumentException('Le prix ne peut pas etre negatif.');
        }

        if ($stock < 0) {
            throw new InvalidArgumentException('Le stock ne peut pas etre negatif.');
        }
    }
}
