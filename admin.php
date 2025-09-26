<?php
// admin.php
// Простая админка для просмотра отправленных сообщений.
// Защита: паролем (в учебных целях, не для продакшна).

$ADMIN_PASSWORD = 'admin123'; // поменяй перед загрузкой на хостинг

$show = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pw = $_POST['password'] ?? '';
    if ($pw === $ADMIN_PASSWORD) {
        $show = true;
    } else {
        $error = 'Неверный пароль';
    }
}
$pageTitle = 'Админка';
include __DIR__ . '/includes/header.php';
?>
<h2>Администратор — Просмотр сообщений</h2>

<?php if (!$show): ?>
  <?php if ($error): ?>
    <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
  <?php endif; ?>
  <form method="post" class="mb-3">
    <div class="mb-3">
      <label for="password" class="form-label">Пароль администратора</label>
      <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <button class="btn btn-primary">Войти</button>
  </form>
<?php else: ?>
  <?php
    $file = __DIR__ . '/data/submissions.csv';
    if (!file_exists($file)) {
        echo "<div class='alert alert-info'>Файл с отправками пуст или не существует.</div>";
    } else {
        $rows = array_map('str_getcsv', file($file));
        if (count($rows) <= 1) {
            echo "<div class='alert alert-info'>Нет отправленных сообщений.</div>";
        } else {
            echo "<div class='table-responsive'><table class='table table-striped'><thead><tr>";
            foreach ($rows[0] as $h) echo "<th>" . htmlspecialchars($h) . "</th>";
            echo "</tr></thead><tbody>";
            for ($i = 1; $i < count($rows); $i++) {
                echo "<tr>";
                foreach ($rows[$i] as $cell) echo "<td>" . htmlspecialchars($cell) . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table></div>";
        }
    }
  ?>
<?php endif; ?>

<?php include __DIR__ . '/includes/footer.php'; ?>
