<?php

require_once __DIR__ . '/../common/product.php';

// Interface pour la création d'un produit
interface ProductFactoryInterface {
    public function createProduct();
}

// Classe qui implémente l'interface pour les produits en France
class FrenchFactory implements ProductFactoryInterface {
    public function createProduct() {
        return new Product(1, "Livre FR", 10);
    }
}

// Classe qui implémente l'interface pour les produits aux US
class USFactory implements ProductFactoryInterface {
    public function createProduct() {
        return new Product(2, "Book US", 12);
    }
}

// Classe qui implémente l'interface pour les produits en Allemagne
class GermanFactory implements ProductFactoryInterface {
    public function createProduct() {
        return new Product(3, "Buch DE", 15);
    }
}

// Classe qui implémente l'interface pour les produits au Japon
class JapaneseFactory implements ProductFactoryInterface {
    public function createProduct() {
        return new Product(4, "本 JP", 20);
    }
}

// Utilisation
$factory = new GermanFactory();
$product = $factory->createProduct();
print_r($product);
