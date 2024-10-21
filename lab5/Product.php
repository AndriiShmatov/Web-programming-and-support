<?php
class Product {
    public $name;
    protected $price;
    public $description;

    public function __construct($name, $price, $description) {
        $this->name = $name;
        $this->setPrice($price);
        $this->description = $description;
    }

    protected function setPrice($price) {
        if ($price >= 0) {
            $this->price = $price;
        } else {
            throw new Exception("Ціна не може бути від'ємною.");
        }
    }

    public function getPrice() {
        return $this->price;
    }

    public function getInfo() {
        return "<strong>Назва:</strong> " . $this->name . "<br>" .
               "<strong>Ціна:</strong> " . $this->price . " грн<br>" .
               "<strong>Опис:</strong> " . $this->description;
    }
}
?>
