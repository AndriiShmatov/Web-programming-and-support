<?php
session_start();

$dsn = "pgsql:host=postgres;port=5432;dbname=laravel-getting-started";
$username = "laravel-getting-started-user";
$password = "laravel-getting-started-password";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user_data && password_verify($pass, $user_data['password'])) {
            $_SESSION['user'] = $user_data['username'];
            echo "success";
        } else {
            echo "Помилка входу: Неправильний логін або пароль.";
        }
    } else {
        echo "Будь ласка, введіть електронну пошту та пароль.";
    }
} catch (PDOException $e) {
    echo "Сталася помилка. Будь ласка, спробуйте пізніше.";
}

$conn = null;
?>
