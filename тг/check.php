<?php
$file = __DIR__.'/test_data.txt';
if(file_put_contents($file, "Тест запису ".date('H:i:s')) {
    echo "Файл створений: ".realpath($file);
    unlink($file); // Видалити тестовий файл
} else {
    echo "Помилка запису. Перевірте права на папку: ".__DIR__;
}
?>