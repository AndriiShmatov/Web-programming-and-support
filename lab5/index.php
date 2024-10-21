<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Інтернет-магазин</title>
</head>
<body>
    <h1>Товари у нашому інтернет-магазині</h1>

    <?php
    require_once 'Product.php';          
    require_once 'DiscountedProduct.php'; 
    require_once 'Category.php';   

    $product1 = new Product("Ноутбук", 30000, "Потужний ноутбук для роботи.");
    $product2 = new Product("Навушники", 1500, "Безпровідні навушники.");
    $discountedProduct1 = new DiscountedProduct("Смартфон", 12000, "Сучасний смартфон.", 15);
    $discountedProduct2 = new DiscountedProduct("Телевізор", 25000, "4K телевізор.", 20);

    $category1 = new Category("Електроніка");
    $category1->addProduct($product1);
    $category1->addProduct($discountedProduct1);

    $category2 = new Category("Аксесуари");
    $category2->addProduct($product2);
    $category2->addProduct($discountedProduct2);

    echo $category1->getProductsInfo();
    echo $category2->getProductsInfo();
    ?>
</body>
</html>
