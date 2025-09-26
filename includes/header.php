<?php
// includes/header.php
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>ТехноСфера — <?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Главная'; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/index.php">ТехноСфера</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/index.php">Главная</a></li>
        <li class="nav-item"><a class="nav-link" href="/about.php">О компании</a></li>
        <li class="nav-item"><a class="nav-link" href="/contact.php">Контакты</a></li>
      </ul>
    </div>
  </div>
</nav>

<main class="container my-5">
