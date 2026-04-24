<?php

require_once 'StrategiePrix.php';
class StrategieTVA implements StrategiePrix
{
    public function calculer($prix)
    {
        return $prix * 1.2;
    }
}
