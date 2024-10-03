<?php
session_start();
$timeout = 300; // 5 хвилин

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
    session_unset();     // видалити змінні сесії
    session_destroy();   // завершити сесію
    echo 'Сесія завершена через неактивність.';
} else {
    $_SESSION['last_activity'] = time();
    echo 'Активна сесія. Остання активність: ' . date('H:i:s', $_SESSION['last_activity']);
}
?>
