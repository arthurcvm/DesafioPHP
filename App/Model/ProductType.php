<?

namespace App\Model;

class ProductType {
    private $id, $name, $tax;

    public function getId() {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getTax() {
        return $this->tax;
    }

    public function setTax($tax){
        $this->tax = $tax;
    }
}