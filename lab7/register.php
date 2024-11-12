<?php
session_start();

$dsn = "pgsql:host=postgres;port=5432;dbname=laravel-getting-started";
$username = "laravel-getting-started-user";
$password = "laravel-getting-started-password";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password !== $confirm_password) {
            echo "Паролі не співпадають.";
            exit();
        }

        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password_hash);
        $stmt->execute();

        echo "success";
    } else {
        echo "Будь ласка, заповніть усі поля.";
    }
} catch (PDOException $e) {
    echo "Сталася помилка. Будь ласка, спробуйте пізніше.";
}

$conn = null;
?>
