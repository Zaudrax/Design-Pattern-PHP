<?php

require_once 'Etat.php';
require_once 'Publie.php';
class Brouillon implements Etat
{
    public function publier($produit)
    {
        echo "Produit publié\n";
        $produit->setEtat(new Publie());
    }
}
