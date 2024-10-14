<?php
// Параметри підключення до PostgreSQL
$dsn = "pgsql:host=postgres;port=5432;dbname=laravel-getting-started";
$username = "laravel-getting-started-user";
$password = "laravel-getting-started-password";

try {
    // Створення з'єднання через PDO
    $conn = new PDO($dsn, $username, $password);
    // Встановлення режиму помилок
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Отримання даних з форми
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Хешування пароля (краще використовувати password_hash, як описано раніше)
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);


    // Підготовка SQL-запиту
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    
    // Підготовка запиту до виконання
    $stmt = $conn->prepare($sql);

    // Прив'язка значень до запиту
    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);

    // Виконання запиту
    $stmt->execute();

    echo "New record created successfully";
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Закриття з'єднання
$conn = null;
?>
