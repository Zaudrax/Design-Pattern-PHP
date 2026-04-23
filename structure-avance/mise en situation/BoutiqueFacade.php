<?php

require_once __DIR__ . '/Product.php';
require_once __DIR__ . '/ProductManagerProxy.php';

class BoutiqueFacade
{
    private $produitManager;

    public function __construct($isAdmin = true)
    {
        $this->produitManager = new ProduitManagerProxy($isAdmin);
    }

    public function ajouterProduit($id, $libelle, $prix)
    {
        $produit = new Produit($id, $libelle, $prix);
        $this->produitManager->ajouterProduit($produit);
    }

    public function afficherProduit($id)
    {
        $produit = $this->produitManager->getProduit($id);

        if ($produit === null) {
            echo 'Produit introuvable pour id=' . $id . PHP_EOL;
            return;
        }

        echo 'Produit : ' . $produit->getLibelle() . ' - ' . $produit->getPrix() . ' EUR' . PHP_EOL;
    }
}
