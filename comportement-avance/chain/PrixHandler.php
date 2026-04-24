<?php

require_once 'Handler.php';
class PrixHandler extends Handler
{
    public function traiter($produit)
    {
        if ($produit->prix <= 0) {
            echo "Prix invalide\n";
            return;
        }
        if ($this->suivant) {
            $this->suivant->traiter($produit);
        }
    }
}
