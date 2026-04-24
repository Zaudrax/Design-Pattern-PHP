<?php

require_once 'Brouillon.php';
class ProduitEtat
{
    private $etat;

    public function __construct()
    {
        $this->etat = new Brouillon();
    }

    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    public function publier()
    {
        $this->etat->publier($this);
    }
}
