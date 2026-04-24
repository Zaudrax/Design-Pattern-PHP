<?php

require_once 'Commande.php';

class Invoker
{
    public function executerCommande(Commande $cmd)
    {
        $cmd->executer();
    }
}
