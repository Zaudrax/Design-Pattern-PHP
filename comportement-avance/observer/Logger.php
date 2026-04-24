<?php

require_once '../common/Produit.php';
require_once 'Observateur.php';
class Logger implements Observateur
{
    public function notifier($produit)
    {
        echo "Log: produit {$produit->libelle}\n";
    }
}
