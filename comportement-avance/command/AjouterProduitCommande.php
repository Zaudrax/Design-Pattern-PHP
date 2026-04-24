<?php

require_once '../common/Produit.php';
require_once 'Commande.php';
class AjouterProduitCommande implements Commande
{
    private $produit;

    public function __construct($produit)
    {
        $this->produit = $produit;
    }

    public function executer()
    {
        echo "Produit {$this->produit->libelle} ajouté\n";
    }
}
