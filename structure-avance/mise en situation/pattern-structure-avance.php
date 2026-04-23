<?php

require_once __DIR__ . '/BoutiqueFacade.php';

$boutique = new BoutiqueFacade();
$boutique->ajouterProduit(1, 'Clavier', 49.99);
$boutique->ajouterProduit(2, 'Souris', -10);

$boutique->afficherProduit(1);
$boutique->afficherProduit(2);
