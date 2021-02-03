<?

namespace App\Model;

class SaleDao {
    public function create(Sale $s){
        $sql = 'INSERT INTO sales(date_sale) VALUES (?)';

        $stmt = Conection::getConn()->prepare($sql);
        $stmt->bindValue(1, $p->getDateSale());
        $stmt->execute();
    }

    public function read() {

    }

    public function update(Sale $s){

    }

    public function delete($id){

    }
}