<?php
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    echo "Привіт, $username!";
} else {
    echo '
    <form action="" method="POST">
        Введіть ваше ім\'я: <input type="text" name="username" required>
        <button type="submit">Зберегти</button>
    </form>
    ';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
    $username = $_POST['username'];
    setcookie('username', $username, time() + 7 * 24 * 60 * 60);
    header('Location: index.php');
}

echo '<br><a href="delete_cookie.php">Видалити cookie</a>';
?>