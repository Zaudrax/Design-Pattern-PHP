<?php

require_once 'StrategiePrix.php';
class CalculateurPrix
{
    private $strategie;

    public function __construct(StrategiePrix $strategie)
    {
        $this->strategie = $strategie;
    }

    public function calculer($prix)
    {
        return $this->strategie->calculer($prix);
    }
}
