<?php

require_once 'ProductService.php';
$service = new ProductService();
$dto = $service->getProductDTO(1);

echo json_encode($dto);