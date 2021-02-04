<?php

namespace App\Model;

use PDO;

class ProductTypeDao {
    public function create(ProductType $pt){
        $sql = 'INSERT INTO product_types(name, tax) VALUES (?, ?)';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $pt->getName());
        $stmt->bindValue(2, $pt->getTax());
        $stmt->execute();
    }

    public function read() {
        $sql = 'SELECT * FROM product_types';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        return [];
    }

    public function update(ProductType $pt){
        $sql = 'UPDATE product_types SET name = ?, tax = ? WHERE id = ?';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $pt->getName());
        $stmt->bindValue(2, $pt->getTax());
        $stmt->bindValue(3, $pt->getId());

        $stmt->execute();
    }

    public function delete($id){
        $sql = 'DELETE FROM product_types WHERE id = ?';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}