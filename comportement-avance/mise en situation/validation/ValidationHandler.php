<?php

require_once __DIR__ . '/../model/Produit.php';

abstract class ValidationHandler
{
    private ?ValidationHandler $suivant = null;

    public function setSuivant(ValidationHandler $suivant): ValidationHandler
    {
        $this->suivant = $suivant;
        return $suivant;
    }

    public function valider(Produit $produit): void
    {
        $this->check($produit);

        if ($this->suivant !== null) {
            $this->suivant->valider($produit);
        }
    }

    abstract protected function check(Produit $produit): void;
}
