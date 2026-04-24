<?php

require_once 'Etat.php';
class Publie implements Etat
{
    public function publier($produit)
    {
        echo "Déjà publié\n";
    }
}
