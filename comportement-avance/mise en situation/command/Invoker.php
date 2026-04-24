<?php

require_once __DIR__ . '/Commande.php';

class Invoker
{
    public function executer(Commande $commande): void
    {
        $commande->executer();
    }
}
