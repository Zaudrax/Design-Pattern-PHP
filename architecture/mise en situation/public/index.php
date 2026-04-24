<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/Service/ProductService.php';

try {
    $pdo = getConnection();
    $repository = new ProductRepository($pdo);
    $service = new ProductService($repository);

    echo "=== AJOUT ===\n";
    $created = $service->ajouterProduit('Souris Gamer', 39.90, 12);
    echo json_encode($created->toArray(), JSON_UNESCAPED_UNICODE) . "\n";

    echo "=== MODIFICATION ===\n";
    $updated = $service->modifierProduit($created->id, 'Souris Gamer Pro', 49.90, 10);
    echo json_encode($updated?->toArray(), JSON_UNESCAPED_UNICODE) . "\n";

    echo "=== RECUPERATION ===\n";
    $fetched = $service->recupererProduit($created->id);
    echo json_encode($fetched?->toArray(), JSON_UNESCAPED_UNICODE) . "\n";

    echo "=== SUPPRESSION ===\n";
    $deleted = $service->supprimerProduit($created->id);
    echo $deleted ? "Produit supprime\n" : "Produit introuvable\n";

    echo "=== LISTE FINALE ===\n";
    $all = $service->listerProduits();
    $allAsArray = array_map(static fn (ProductDTO $dto) => $dto->toArray(), $all);
    echo json_encode($allAsArray, JSON_UNESCAPED_UNICODE) . "\n";
} catch (Throwable $e) {
    echo 'Erreur: ' . $e->getMessage() . "\n";
}
