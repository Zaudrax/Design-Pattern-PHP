<?php

class Produit
{
    public ?int $id;
    public string $nom;
    public float $prix;
    public int $stock;

    public function __construct(?int $id, string $nom, float $prix, int $stock)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->stock = $stock;
    }
}
