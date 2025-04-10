<?php
header('Content-Type: text/plain; charset=utf-8');

$data_file = 'data.txt';
if (file_exists($data_file)) {
    echo file_get_contents($data_file);
} else {
    echo 'Файл даних не знайдено';
}
?>
