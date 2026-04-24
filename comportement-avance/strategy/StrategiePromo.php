<?php

require_once 'StrategiePrix.php';
class StrategiePromo implements StrategiePrix
{
    public function calculer($prix)
    {
        return $prix * 0.8;
    }
}
