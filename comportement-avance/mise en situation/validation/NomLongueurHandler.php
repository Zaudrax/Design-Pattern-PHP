<?php

require_once __DIR__ . '/ValidationHandler.php';

class NomLongueurHandler extends ValidationHandler
{
    protected function check(Produit $produit): void
    {
        if (mb_strlen(trim($produit->nom)) <= 3) {
            throw new InvalidArgumentException('Le nom du produit doit contenir plus de 3 caracteres.');
        }
    }
}
