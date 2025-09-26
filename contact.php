<?php
$pageTitle = 'Контакты';
$success = isset($_GET['sent']) && $_GET['sent'] === '1';
include __DIR__ . '/includes/header.php';
?>
<h2>Свяжитесь с нами</h2>
<p>Заполните форму, и мы ответим вам в ближайшее время.</p>

<?php if ($success): ?>
  <div class="alert alert-success">Спасибо! Ваше сообщение успешно отправлено.</div>
<?php endif; ?>

<form id="contactForm" action="/process_contact.php" method="post" novalidate>
  <div class="mb-3">
    <label for="name" class="form-label">Имя</label>
    <input type="text" class="form-control" id="name" name="name" required>
    <div class="invalid-feedback">Пожалуйста, укажите имя.</div>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
    <div class="invalid-feedback">Укажите корректный E-mail.</div>
  </div>

  <div class="mb-3">
    <label for="message" class="form-label">Сообщение</label>
    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
    <div class="invalid-feedback">Напишите сообщение.</div>
  </div>

  <button type="submit" class="btn btn-primary">Отправить</button>
</form>

<?php include __DIR__ . '/includes/footer.php'; ?>
