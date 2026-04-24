<?php

require_once '../common/Produit.php';
require_once 'PrixHandler.php';
require_once 'LibelleHandler.php';
$p = new Produit(1, "PC", 1000);
$h1 = new PrixHandler();
$h2 = new LibelleHandler();

$h1->setSuivant($h2);
$h1->traiter($p);
