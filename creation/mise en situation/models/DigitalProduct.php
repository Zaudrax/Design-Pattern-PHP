<?php

require_once __DIR__ . '/Product.php';

class DigitalProduct extends Product
{
    public function getType()
    {
        return 'digital';
    }
}
