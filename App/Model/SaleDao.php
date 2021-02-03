<?php

namespace App\Model;


class SaleDao {
    public function create(Sale $s){
        $sql = 'INSERT INTO sales(id, date_sale) VALUES (?, ?)';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $s->getId());
        $stmt->bindValue(2, $s->getDateSale());
        $stmt->execute();
    }

    public function read() {

    }

    public function update(Sale $s){

    }

    public function delete($id){

    }
}