<?php
require_once 'Product.php'; // Підключаємо файл з класом Product

// Клас Category для категорій товарів
class Category {
    public $categoryName;
    public $products = [];

    public function __construct($categoryName) {
        $this->categoryName = $categoryName;
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function getProductsInfo() {
        $info = "<h2>Категорія: " . $this->categoryName . "</h2>";
        foreach ($this->products as $product) {
            $info .= "<p>" . $product->getInfo() . "</p><hr>";
        }
        return $info;
    }
}
?>
