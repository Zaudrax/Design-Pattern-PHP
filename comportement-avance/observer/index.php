<?php

require_once '../common/Produit.php';
require_once 'ProduitSujet.php';
require_once 'Logger.php';
require_once 'EmailSender.php';

$produit = new Produit(1, "PC", 1000);

$sujet = new ProduitSujet();
$sujet->ajouterObservateur(new Logger());
$sujet->ajouterObservateur(new EmailSender());

$sujet->notifier($produit);
