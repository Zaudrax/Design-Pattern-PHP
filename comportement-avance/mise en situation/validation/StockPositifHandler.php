<?php

require_once __DIR__ . '/ValidationHandler.php';

class StockPositifHandler extends ValidationHandler
{
    protected function check(Produit $produit): void
    {
        if ($produit->stock < 0) {
            throw new InvalidArgumentException('Le stock ne peut pas etre inferieur a 0.');
        }
    }
}
