<?php
session_start(); // Старт сесії для збереження інформації про користувача

// Параметри підключення до бази даних
$dsn = "pgsql:host=postgres;port=5432;dbname=laravel-getting-started";
$username = "laravel-getting-started-user";
$password = "laravel-getting-started-password";

try {
    // Створення з'єднання через PDO
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    // Перевірка даних з форми
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        
        // Перевірка, чи введені значення не порожні
        if (empty($user) || empty($pass)) {
            echo "Username or password cannot be empty.";
            exit();
        }
        
        // Підготовка SQL-запиту для перевірки наявності користувача
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $user);
        $stmt->execute();

        // Отримання результатів запиту
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user_data) {
            // Користувач знайдений, перевіряємо пароль
            if (password_verify($pass, $user_data['password'])) {
                // Якщо пароль правильний, зберігаємо інформацію про користувача в сесії
                $_SESSION['user'] = $user_data['username'];
                
                // Перенаправлення на захищену сторінку
                header("Location: welcome.php");
                session_write_close();
                exit();
            } else {
                // Невірний пароль
                echo "Invalid password.";
            }
        } else {
            // Користувач не знайдений
            echo "User not found.";
        }
        
    } else {
        echo "Please provide both username and password.";
    }
    
} catch (PDOException $e) {
    error_log($e->getMessage()); // Запис у лог
    echo "An error occurred. Please try again later."; // Користувачеві
}

// Закриття з'єднання
$conn = null;
?>
