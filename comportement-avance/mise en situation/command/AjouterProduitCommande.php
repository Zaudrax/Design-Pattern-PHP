<?php

require_once __DIR__ . '/Commande.php';
require_once __DIR__ . '/../model/Produit.php';
require_once __DIR__ . '/../validation/ValidationHandler.php';
require_once __DIR__ . '/../repository/ProduitRepository.php';

class AjouterProduitCommande implements Commande
{
    private ProduitRepository $repository;
    private ValidationHandler $validationChain;
    private Produit $produit;

    public function __construct(
        ProduitRepository $repository,
        ValidationHandler $validationChain,
        Produit $produit
    ) {
        $this->repository = $repository;
        $this->validationChain = $validationChain;
        $this->produit = $produit;
    }

    public function executer(): void
    {
        $this->validationChain->valider($this->produit);
        $id = $this->repository->ajouter($this->produit);
        echo "[AJOUT] Produit ajoute avec l'id {$id}.\n";
    }
}
