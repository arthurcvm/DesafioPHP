<?php

namespace App\Model;

class SaleItem {
    private $id, $quantity, $product_id, $sale_id;

    public function getId() {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function setProductId($product_id){
        $this->product_id = $product_id;
    }

    public function getSaleId() {
        return $this->sale_id;
    }

    public function setSaleId($sale_id){
        $this->sale_id = $sale_id;
    }
}