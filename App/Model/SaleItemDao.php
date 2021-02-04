<?php

namespace App\Model;

use PDO;

class SaleItemDao {
    public function create(SaleItem $si){
        $sql = 'INSERT INTO sale_items(quantity, product_id, sale_id) VALUES (?, ?, ?)';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $si->getQuantity());
        $stmt->bindValue(2, $si->getProductId());
        $stmt->bindValue(3, $si->getSaleId());
        $stmt->execute();
    }

    public function read() {
        $sql = 'SELECT * FROM sale_items';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        return [];
    }

    public function update(SaleItem $si){
        $sql = 'UPDATE sale_items SET quantity = ?, product_id = ?, sale_id = ? WHERE id = ?';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $si->getQuantity());
        $stmt->bindValue(2, $si->getProductId());
        $stmt->bindValue(3, $si->getSaleId());
        $stmt->bindValue(4, $si->getId());

        $stmt->execute();
    }

    public function delete($id){
        $sql = 'DELETE FROM sale_items WHERE id = ?';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}