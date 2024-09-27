
<?php
$upload_dir = 'uploads/';

if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
    $file_name = basename($_FILES['file']['name']);
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = mime_content_type($file_tmp);
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    $allowed_extensions = ['png', 'jpg', 'jpeg'];

    if (in_array($file_ext, $allowed_extensions) && $file_size <= 2 * 1024 * 1024) {
        if (file_exists($upload_dir . $file_name)) {
            $file_name = pathinfo($file_name, PATHINFO_FILENAME) . '_' . time() . '.' . $file_ext;
        }

        if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
            echo "Файл успішно завантажено!<br>";
            echo "Ім'я файлу: $file_name<br>";
            echo "Тип файлу: $file_type<br>";
            echo "Розмір файлу: " . round($file_size / 1024) . " КБ<br>";
            echo "<a href='uploads/$file_name'>Завантажити файл</a><br>";
        } else {
            echo "Помилка при завантаженні файлу!";
        }
    } else {
        echo "Файл не відповідає вимогам! Дозволені лише зображення до 2 МБ.";
    }
} else {
    echo "Файл не завантажено.";
}
?>
