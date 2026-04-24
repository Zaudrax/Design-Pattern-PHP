<?php

require_once 'Handler.php';
class LibelleHandler extends Handler
{
    public function traiter($produit)
    {
        if (empty($produit->libelle)) {
            echo "Libelle invalide\n";
            return;
        }
        echo "Produit valide\n";
    }
}
