<?php
// process_contact.php
// Простая серверная обработка формы: сохраняем в CSV и перенаправляем с флагом успеха.
// Защита: basic sanitization.

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /contact.php');
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
    // можно передавать параметры ошибки, но для простоты — редирект обратно
    header('Location: /contact.php');
    exit;
}

// sanitize
$name_safe = htmlspecialchars($name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$email_safe = filter_var($email, FILTER_SANITIZE_EMAIL);
$message_safe = htmlspecialchars($message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

$dir = __DIR__ . '/data';
if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
}

$file = $dir . '/submissions.csv';
$first_row = !file_exists($file);

$fp = fopen($file, 'a');
if ($fp) {
    if ($first_row) {
        fputcsv($fp, ['datetime', 'name', 'email', 'message']);
    }
    fputcsv($fp, [date('Y-m-d H:i:s'), $name_safe, $email_safe, $message_safe]);
    fclose($fp);
}

// Редирект на страницу контактов с флагом успеха
header('Location: /contact.php?sent=1');
exit;
