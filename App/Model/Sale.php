<?
namespace App\Model;

class Sale {
    private $id, $date_sale;

    public function getId() {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getDateSale() {
        return $this->date_sale;
    }

    public function setDateSale($date_sale){
        $this->date_sale = $date_sale;
    }
}