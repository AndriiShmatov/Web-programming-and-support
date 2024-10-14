<?php
session_start(); // Старт сесії
session_destroy(); // Знищення сесії

// Перенаправлення на сторінку входу
header("Location: login.html");
exit();
?>
