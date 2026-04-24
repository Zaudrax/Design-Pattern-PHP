<?php

require_once __DIR__ . '/ValidationHandler.php';

class PrixPositifHandler extends ValidationHandler
{
    protected function check(Produit $produit): void
    {
        if ($produit->prix < 0) {
            throw new InvalidArgumentException('Le prix ne peut pas etre inferieur a 0.');
        }
    }
}
