<?php
require_once 'Product.php';

class DiscountedProduct extends Product {
    public $discount;

    public function __construct($name, $price, $description, $discount) {
        parent::__construct($name, $price, $description);
        $this->discount = $discount;
    }

    public function getDiscountedPrice() {
        return $this->price * (1 - $this->discount / 100);
    }

    public function getInfo() {
        $originalInfo = parent::getInfo();
        $discountedPrice = $this->getDiscountedPrice();
        return $originalInfo . "<br>" .
               "<strong>Знижка:</strong> " . $this->discount . "%<br>" .
               "<strong>Ціна зі знижкою:</strong> " . round($discountedPrice, 2) . " грн";
    }
}
?>
