<?php

require_once __DIR__ . '/../Repository/ProductRepository.php';
class ProductService
{
    private $repo;
    public function __construct()
    {
        $this->repo = new ProductRepository();
    }
    public function getPrixTTC($id)
    {
        $product = $this->repo->findById($id);

        if (!$product) {
            return null;
        }
        return $product->prix * 1.2;
    }
}
