<?php

class Produit
{
    public $id;
    public $libelle;
    public $prix;

    public function __construct($id, $libelle, $prix)
    {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->prix = $prix;
    }
}
