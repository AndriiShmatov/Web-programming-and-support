<?php
session_start();
$item = $_GET['item'];

$_SESSION['cart'][] = $item;

// Зберігаємо попередні покупки в cookie
$previous_purchases = isset($_COOKIE['previous_purchases']) ? unserialize($_COOKIE['previous_purchases']) : [];
$previous_purchases[] = $item;
setcookie('previous_purchases', serialize($previous_purchases), time() + 30 * 24 * 60 * 60);

header('Location: index.php');
?>
