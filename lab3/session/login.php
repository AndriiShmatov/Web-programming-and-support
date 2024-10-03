<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: welcome.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($login == 'Andrew' && $password == 'ilovekhpi') {
        $_SESSION['user'] = $login;
        header('Location: open_title.php');
    } else {
        echo 'Невірний логін або пароль!';
    }
}
?>

<form action="" method="POST">
    Логін: <input type="text" name="login" required><br>
    Пароль: <input type="password" name="password" required><br>
    <button type="submit">Увійти</button>
</form>
