<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: another_page.php');
    exit();
}
?>
