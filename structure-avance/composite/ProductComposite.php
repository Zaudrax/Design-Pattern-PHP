<?php

require_once "ProductComponent.php";
require_once '../common/Product.php';
require_once "ProductLeaf.php";
class ProductComposite implements ProductComponent
{
    private $children = [];

    public function add(ProductComponent $p)
    {
        $this->children[] = $p;
    }
    public function getInfo(): string
    {
        $result = "Groupe:\n";
        foreach ($this->children as $child) {
            $result .= "- " . $child->getInfo() . "\n";
        }
        return $result;
    }
}
$p1 = new Product(1, "Clavier", 50);
$p2 = new Product(2, "Souris", 20);
$leaf1 = new ProductLeaf($p1);
$leaf2 = new ProductLeaf($p2);
$group = new ProductComposite();
$group->add($leaf1);
$group->add($leaf2);

echo $group->getInfo();
