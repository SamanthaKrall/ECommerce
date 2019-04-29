<?php
require_once 'ProductDataService.php';

class BusinessService {
    function findProduct($p) {
        $product = array();
        $dbService = new ProductDataService();
        $product = $dbService->findProduct($p);
        return $product;
    }
}