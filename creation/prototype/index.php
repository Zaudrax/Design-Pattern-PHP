<?php

require_once __DIR__ . '/../common/product.php';

// Classe prototype qui hérite de Product
class ProductPrototype extends Product
{
    #Utilisation du mot-clé clone

    public function __clone()
    {
    }
}

// Objet prototype de base
$prototype = new ProductPrototype(1, 'Livre', 10);

// Création de produits similaires à partir du prototype
$product2 = clone $prototype;
$product2->id = 2;
$product2->libelle = 'Livre Edition Poche';
$product2->prix = 8;

$product3 = clone $prototype;
$product3->id = 3;
$product3->libelle = 'Livre Edition Collector';
$product3->prix = 25;

$product4 = clone $prototype;
$product4->id = 4;
$product4->libelle = 'Livre Numerique';
$product4->prix = 5;

// Affichage des produits clones
print_r($product2);
print_r($product3);
print_r($product4);
