<?php

require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/model/Produit.php';
require_once __DIR__ . '/repository/ProduitRepository.php';
require_once __DIR__ . '/validation/PrixPositifHandler.php';
require_once __DIR__ . '/validation/StockPositifHandler.php';
require_once __DIR__ . '/validation/NomLongueurHandler.php';
require_once __DIR__ . '/command/Invoker.php';
require_once __DIR__ . '/command/AjouterProduitCommande.php';
require_once __DIR__ . '/command/ModifierProduitCommande.php';
require_once __DIR__ . '/command/SupprimerProduitCommande.php';

try {
    $pdo = Database::getConnection();
    $repository = new ProduitRepository($pdo);

    $prixHandler = new PrixPositifHandler();
    $stockHandler = new StockPositifHandler();
    $nomHandler = new NomLongueurHandler();

    $prixHandler->setSuivant($stockHandler)->setSuivant($nomHandler);

    $invoker = new Invoker();

    $produit = new Produit(null, 'Clavier Gamer', 49.99, 20);
    $invoker->executer(new AjouterProduitCommande($repository, $prixHandler, $produit));

    $idCree = (int) $pdo->lastInsertId();

    $produitModifie = new Produit($idCree, 'Clavier Gamer RGB', 59.99, 15);
    $invoker->executer(new ModifierProduitCommande($repository, $prixHandler, $produitModifie));

    $invoker->executer(new SupprimerProduitCommande($repository, $idCree));

    echo "Execution terminee sans erreur.\n";
} catch (Throwable $e) {
    echo 'Erreur: ' . $e->getMessage() . "\n";
}
