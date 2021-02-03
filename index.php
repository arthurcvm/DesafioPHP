<?php

require_once 'vendor/autoload.php';

$sale = new \App\Model\Sale();
$sale->setDateSale('2020-10-31');

$saleDao = new \App\Model\SaleDao();
$saleDao->create($sale);