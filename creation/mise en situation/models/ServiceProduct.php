<?php

require_once __DIR__ . '/Product.php';

class ServiceProduct extends Product
{
    public function getType()
    {
        return 'service';
    }
}
