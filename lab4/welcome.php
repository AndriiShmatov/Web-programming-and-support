<?php
session_start(); // Старт сесії

// Перевіряємо, чи користувач авторизований
if (!isset($_SESSION['user'])) {
    // Якщо користувач не авторизований, перенаправляємо на сторінку входу
    header("Location: login.php");
    exit();
}

// Якщо користувач авторизований, виводимо привітальне повідомлення
echo "Welcome, " . htmlspecialchars($_SESSION['user']) . "!";
?>

<a href="logout.php">Logout</a>