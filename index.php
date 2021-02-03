<?php

require_once 'vendor/autoload.php';

$sale = new \App\Model\Sale();
$sale->setId('2');
$sale->setDateSale('2020-10-31');

$saleDao = new \App\Model\SaleDao();

try {
    $saleDao->create($sale);
} catch (\Throwable $th) {
    echo $th;
}