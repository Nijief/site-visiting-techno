<?php
$pageTitle = 'Главная';
include __DIR__ . '/includes/header.php';
?>
<section class="text-center py-5">
  <h1 class="display-5 fw-bold">ООО «ТехноСфера»</h1>
  <p class="lead">Мы разрабатываем современные IT-решения для бизнеса и образования.</p>
  <p>
    <a class="btn btn-light text-primary me-2" href="/about.php">Подробнее о нас</a>
    <a class="btn btn-light text-primary me-2" href="/contact.php">Связаться</a>
  </p>
</section>

<section class="row g-4">
  <div class="col-md-4">
    <div class="card h-100 text-center">
      <div class="card-body">
        <h5 class="card-title">Разработка</h5>
        <p class="card-text">Создание сайтов, CRM-систем и мобильных приложений под ключ.</p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card h-100 text-center">
      <div class="card-body">
        <h5 class="card-title">Поддержка</h5>
        <p class="card-text">Сопровождение проектов 24/7, регулярные обновления и мониторинг.</p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card h-100 text-center">
      <div class="card-body">
        <h5 class="card-title">Консалтинг</h5>
        <p class="card-text">Анализ бизнес-процессов и внедрение IT-решений для оптимизации.</p>
      </div>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
