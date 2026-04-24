<?php

abstract class Handler
{
    protected $suivant;

    public function setSuivant($suivant)
    {
        $this->suivant = $suivant;
    }

    abstract public function traiter($produit);
}
