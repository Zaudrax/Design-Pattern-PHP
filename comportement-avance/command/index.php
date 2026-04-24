<?php

require_once 'AjouterProduitCommande.php';
require_once 'Invoker.php';

$cmd = new AjouterProduitCommande(new Produit(1, "PC", 1000));
$invoker = new Invoker();

$invoker->executerCommande($cmd);
