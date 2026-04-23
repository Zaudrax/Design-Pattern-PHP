<?php
require_once __DIR__ . '/../common/product.php';
#Classe produit factory
class ProductFactory {
    public static function create($type) {
        switch ($type) {
            case "book":
                return new Product(1, "Livre", 10);
            case "phone":
                return new Product(2, "Téléphone", 500);
            case "laptop":
                return new Product(3, "Ordinateur portable", 1000);
            case "tablet":
                return new Product(4, "Tablette", 300);
            default:
                throw new Exception("Type inconnu : $type");
        }
    }
}

// Utilisation
$product = ProductFactory::create("phone");
print_r($product);
?>
