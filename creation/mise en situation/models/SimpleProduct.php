<?php

require_once __DIR__ . '/Product.php';

class SimpleProduct extends Product
{
    public function getType()
    {
        return 'simple';
    }
}
