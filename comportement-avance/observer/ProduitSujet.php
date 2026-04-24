<?php

require_once '../common/Produit.php';
require_once 'Observateur.php';
class ProduitSujet
{
    private $observateurs = [];

    public function ajouterObservateur(Observateur $obs)
    {
        $this->observateurs[] = $obs;
    }

    public function notifier($produit)
    {
        foreach ($this->observateurs as $obs) {
            $obs->notifier($produit);
        }
    }
}
