<?php
// Перевіряємо, чи була форма відправлена
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримуємо дані з форми
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    // Перевіряємо, чи не є порожніми поля
    if (!empty($first_name) && !empty($last_name)) {
        // Виводимо привітання з іменем та прізвищем
        echo "Привіт, $first_name $last_name!";
    } else {
        echo "Будь ласка, заповніть всі поля форми.";
    }
} else {
    echo "Форма не була відправлена коректно.";
}
?>
