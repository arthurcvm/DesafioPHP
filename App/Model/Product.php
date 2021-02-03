<?

namespace App\Model;

class Product {
    private $id, $name, $value, $type_product_id;

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

    public function getValue() {
        return $this->value;
    }

    public function setValue($value){
        $this->value = $value;
    }

    public function getTypeProductId() {
        return $this->type_product_id;
    }

    public function setTypeProductId($type_product_id){
        $this->type_product_id = $type_product_id;
    }
}