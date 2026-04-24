<?php

require_once '../common/Produit.php';
require_once 'Observateur.php';
class EmailSender implements Observateur
{
    public function notifier($produit)
    {
        echo "Email envoyé pour {$produit->libelle}\n";
    }
}
