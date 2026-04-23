<?php

require_once '../common/product.php';
#Classe builder
class ProductBuilder
{
    private $id;
    private $libelle;
    private $prix;
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }
    public function setPrix($prix)
    {
        $this->prix = $prix;
        return $this;
    }
    public function build()
    {
        return new Product($this->id, $this->libelle, $this->prix);
    }
}
// utilisation
$product = (new ProductBuilder())
->setId(1)
->setLibelle("PC Gamer")
->setPrix(1500)
->build();

print_r($product);
