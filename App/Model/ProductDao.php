<?php

namespace App\Model;

use PDO;

class ProductDao
{
    public function create(Product $p)
    {
        $sql = 'INSERT INTO products(name, value, product_type_id) VALUES (?, ?, ?)';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $p->getName());
        $stmt->bindValue(2, $p->getValue());
        $stmt->bindValue(3, $p->getTypeProductId());
        $stmt->execute();
    }

    public function read()
    {
        $sql = 'SELECT p.*, pt.name as product_type FROM products p 
                left join product_types pt
                on pt.id = p.product_type_id';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        return [];
    }

    public function update(Product $p)
    {
        $sql = 'UPDATE products SET name = ?, value = ?, product_type_id = ? WHERE id = ?';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $p->getName());
        $stmt->bindValue(2, $p->getValue());
        $stmt->bindValue(3, $p->getTypeProductId());
        $stmt->bindValue(4, $p->getId());

        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM products WHERE id = ?';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}
