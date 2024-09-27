
<?php
$upload_dir = 'uploads/';

if (is_dir($upload_dir)) {
    $files = scandir($upload_dir);
    $files = array_diff($files, ['.', '..']);

    if (!empty($files)) {
        echo "<h2>Список завантажених файлів:</h2>";
        echo "<ul>";
        foreach ($files as $file) {
            echo "<li><a href='$upload_dir/$file'>$file</a></li>";
        }
        echo "</ul>";
    } else {
        echo "Немає завантажених файлів.";
    }
} else {
    echo "Директорію не знайдено.";
}
?>
