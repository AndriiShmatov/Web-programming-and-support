<?php
setcookie('username', '', time() - 3600); // встановлюємо минулий час
header('Location: index.php');
?>