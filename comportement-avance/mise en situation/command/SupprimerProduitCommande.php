<?php

require_once __DIR__ . '/Commande.php';
require_once __DIR__ . '/../repository/ProduitRepository.php';

class SupprimerProduitCommande implements Commande
{
    private ProduitRepository $repository;
    private int $id;

    public function __construct(ProduitRepository $repository, int $id)
    {
        $this->repository = $repository;
        $this->id = $id;
    }

    public function executer(): void
    {
        $this->repository->supprimer($this->id);
        echo "[SUPPRESSION] Produit {$this->id} supprime.\n";
    }
}
