<?php

require_once __DIR__ . '/Product.php';

class ProduitManager
{
    private $produits = [];

    public function ajouterProduit(Produit $produit)
    {
        $this->produits[$produit->getId()] = $produit;
        echo 'Produit ajoute : ' . $produit->getLibelle() . ' (' . $produit->getPrix() . ' EUR)' . PHP_EOL;
    }

    public function getProduit($id)
    {
        return $this->produits[$id] ?? null;
    }
}
