<?php
// Массив працівників (пізніше замінити на отримання з MySQL)
$workers = [
    ['id'=>1,'name'=>'Вероніка','position'=>'Перукар, майстер із зачісок','imageName'=>'worker1','details'=>'Спеціаліст із зачісок для святкових подій. Досвід роботи: 5 років.'],
    ['id'=>2,'name'=>'Альбіна','position'=>'Перукар, колорист','imageName'=>'worker2','details'=>'Майстер з фарбування волосся. Експерт у техніках балаяж та омбре.'],
    ['id'=>3,'name'=>'Діана','position'=>'Перукар, майстер із складних фарбувань','imageName'=>'worker3','details'=>'Фахівець у складних фарбуваннях. Досвід роботи: 7 років.'],
    ['id'=>4,'name'=>'Ольга','position'=>'Косметолог','imageName'=>'worker4','details'=>'Надає професійні косметологічні послуги.'],
    ['id'=>5,'name'=>'Марія','position'=>'Масажист','imageName'=>'worker5','details'=>'Виконує класичний та антицелюлітний масаж.'],
    ['id'=>6,'name'=>'Крістіна','position'=>'Масажист','imageName'=>'worker6','details'=>'Спеціаліст з релаксуючого масажу.'],
    ['id'=>7,'name'=>'Вікторія','position'=>'Майстер манікюру та педикюру','imageName'=>'worker7','details'=>'Надає послуги манікюру та педикюру.'],
    ['id'=>8,'name'=>'Влада','position'=>'Майстер манікюру та педикюру','imageName'=>'worker8','details'=>'Надає послуги манікюру та педикюру.'],
    ['id'=>9,'name'=>'Єлизавета','position'=>'Адміністратор','imageName'=>'worker9','details'=>'Організовує запис клієнтів. Досвід роботи: 3 роки.'],
    ['id'=>10,'name'=>'Валерія','position'=>'Менеджер','imageName'=>'worker10','details'=>'Відповідає за керування персоналом.'],
    ['id'=>11,'name'=>'Таїсія','position'=>'Юрист','imageName'=>'worker11','details'=>'Юридичний супровід бізнесу.'],
    ['id'=>12,'name'=>'В\'ячеслав','position'=>'Охоронець','imageName'=>'worker12','details'=>'Забезпечує безпеку клієнтів та персоналу.'],
    ['id'=>13,'name'=>'Назар','position'=>'Охоронець','imageName'=>'worker13','details'=>'Забезпечує охорону майна та безпеку персоналу.'],
    ['id'=>14,'name'=>'Дарія','position'=>'Прибиральниця','imageName'=>'worker14','details'=>'Забезпечує чистоту салону.'],
];

$id = (int)($_GET['id'] ?? 0);
$worker = null;
foreach ($workers as $w) {
    if ($w['id'] === $id) {
        $worker = $w;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Наші працівники</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div class="container">
    <!-- Ліва панель зі списком працівників -->
    <div class="sidebar">
        <h2>Наші працівники</h2>
        <ul class="worker-list">
            <?php foreach ($workers as $workerData): ?>
                <li class="worker-card">
                    <a href="?tab=workers&id=<?= $workerData['id'] ?>">
                        <img src="assets/images/<?= htmlspecialchars($workerData['imageName']) ?>.jpg" alt="<?= htmlspecialchars($workerData['name']) ?>">
                        <div class="worker-info">
                            <h3><?= htmlspecialchars($workerData['name']) ?></h3>
                            <p><?= htmlspecialchars($workerData['position']) ?></p>
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Основний контент з детальною інформацією -->
    <div class="main-content">
        <?php if ($worker): ?>
            <div class="worker-detail">
                <img src="assets/images/<?= htmlspecialchars($worker['imageName']) ?>.jpg" alt="<?= htmlspecialchars($worker['name']) ?>">
                <h1><?= htmlspecialchars($worker['name']) ?></h1>
                <p class="position"><?= htmlspecialchars($worker['position']) ?></p>
                <p><?= htmlspecialchars($worker['details']) ?></p>
                <a href="/index.php?tab=workers" class="back-button">Назад до списку працівників</a>
            </div>
        <?php else: ?>
            <p>Працівника не знайдено</p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>