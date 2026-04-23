<?php

require_once __DIR__ . '/ProductManager.php';

class ProduitManagerProxy
{
    private $manager;
    private $isAdmin;

    public function __construct($isAdmin = true)
    {
        $this->manager = new ProduitManager();
        $this->isAdmin = $isAdmin;
    }

    public function ajouterProduit(Produit $produit)
    {
        if (!$this->isAdmin) {
            echo "Ajout bloque : utilisateur non autorise." . PHP_EOL;
            return;
        }

        if ($produit->getPrix() < 0) {
            echo 'Ajout bloque : prix negatif pour ' . $produit->getLibelle() . '.' . PHP_EOL;
            return;
        }

        $this->manager->ajouterProduit($produit);
    }

    public function getProduit($id)
    {
        return $this->manager->getProduit($id);
    }
}
