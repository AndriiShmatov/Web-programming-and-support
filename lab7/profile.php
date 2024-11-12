<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "Необхідно увійти в систему.";
    exit();
}

$dsn = "pgsql:host=postgres;port=5432;dbname=laravel-getting-started";
$username = "laravel-getting-started-user";
$password = "laravel-getting-started-password";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['newUsername'])) {
        $newUsername = $_POST['newUsername'];
        $currentUsername = $_SESSION['user'];

        $sql = "UPDATE users SET username = :newUsername WHERE username = :currentUsername";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':newUsername', $newUsername);
        $stmt->bindParam(':currentUsername', $currentUsername);

        if ($stmt->execute()) {
            $_SESSION['user'] = $newUsername;
            echo "username-updated";
        } else {
            echo "Помилка оновлення імені користувача.";
        }
        exit();
    }

    if (isset($_POST['newPassword'])) {
        $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
        $currentUsername = $_SESSION['user'];

        $sql = "UPDATE users SET password = :newPassword WHERE username = :currentUsername";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':newPassword', $newPassword);
        $stmt->bindParam(':currentUsername', $currentUsername);

        if ($stmt->execute()) {
            echo "password-updated";
        } else {
            echo "Помилка оновлення пароля.";
        }
        exit();
    }
} catch (PDOException $e) {
    error_log($e->getMessage());
    echo "Сталася помилка при оновленні профілю.";
}

$conn = null;

?>
