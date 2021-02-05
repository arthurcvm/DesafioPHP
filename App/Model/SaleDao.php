<?php

namespace App\Model;

use PDO;

class SaleDao
{
    public function create(Sale $s)
    {
        $sql = 'INSERT INTO sales(date_sale, total) VALUES (?, ?)';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $s->getDateSale());
        $stmt->bindValue(2, $s->getTotal());
        $stmt->execute();

        return Connection::getConn()->lastInsertId();
    }

    public function read()
    {
        $sql = 'SELECT * FROM sales';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        return [];
    }

    public function update(Sale $s)
    {
        $sql = 'UPDATE sales SET date_sale = ?, total = ? WHERE id = ?';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $s->getDateSale());
        $stmt->bindValue(2, $s->getTotal());
        $stmt->bindValue(3, $s->getId());

        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM sales WHERE id = ?';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}
