<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /contact.php');
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
    header('Location: /contact.php');
    exit;
}

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

header('Location: /contact.php?sent=1');
exit;
