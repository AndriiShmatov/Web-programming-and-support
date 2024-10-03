<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_COOKIE['previous_purchases'])) {
    $previous_purchases = unserialize($_COOKIE['previous_purchases']);
} else {
    $previous_purchases = [];
}

echo "<h2>Корзина</h2>";
foreach ($_SESSION['cart'] as $item) {
    echo $item . "<br>";
}

echo "<h2>Попередні покупки</h2>";
foreach ($previous_purchases as $item) {
    echo $item . "<br>";
}

echo '<a href="add.php?item=товар1">Додати товар 1</a><br>';
?>
