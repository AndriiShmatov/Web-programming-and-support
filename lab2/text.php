
<?php
$log_file = 'log.txt';

if (isset($_POST['text']) && !empty($_POST['text'])) {
    $text = $_POST['text'];
    file_put_contents($log_file, $text . PHP_EOL, FILE_APPEND);
    echo "Текст успішно записано у файл.<br>";
}

if (file_exists($log_file)) {
    echo "<h2>Вміст файлу:</h2>";
    echo nl2br(file_get_contents($log_file));
} else {
    echo "Файл з текстом не знайдено.";
}
?>
