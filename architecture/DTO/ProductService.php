<?php

require_once '../Repository/ProductRepository.php';
require_once 'ProductDTO.php';
class ProductService
{
    private $repo;
    public function __construct()
    {
        $this->repo = new ProductRepository();
    }
    public function getProductDTO($id)
    {
        $product = $this->repo->findById($id);
        if (!$product) {
            return null;
        }
        return new ProductDTO(
            $product->id,
            $product->libelle,
            $product->prix
        );
    }
}
