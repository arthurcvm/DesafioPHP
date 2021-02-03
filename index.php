<?php

require_once 'vendor/autoload.php';

use App\Model\Sale;

$sale = new Sale();
$sale->setDateSale('2020-10-31');

$saleDao = new \App\Model\SaleDao();
$saleDao->create($sale);