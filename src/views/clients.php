<?php
// Массив клієнтів (пізніше замінити на отримання з MySQL)
$clients = [
    ['id' => 1, 'name' => 'Олена Коваленко', 'phoneNumber' => '+380501234567', 'email' => 'olena@gmail.com', 'details' => 'Постійний клієнт. Віддає перевагу фарбуванню у техніці балаяж.', 'imageName' => 'worker1'],
    ['id' => 2, 'name' => 'Аліса Обдар', 'phoneNumber' => '+380671234567', 'email' => 'alisa@gmail.com', 'details' => 'Замовляла масаж кілька разів. Відгуки лише позитивні.', 'imageName' => 'worker2'],
    ['id' => 3, 'name' => 'Марія Іванова', 'phoneNumber' => '+380931234567', 'email' => 'maria@gmail.com', 'details' => 'Найчастіше звертається за послугами манікюру.', 'imageName' => 'worker3'],
    ['id' => 4, 'name' => 'Каріна Абдулова', 'phoneNumber' => '+380501111111', 'email' => 'karina@gmail.com', 'details' => 'Ходить часто на догляд та зачіски. Постійний клієнт.', 'imageName' => 'worker4'],
    ['id' => 5, 'name' => 'Анна Шевченко', 'phoneNumber' => '+380671111111', 'email' => 'anna@gmail.com', 'details' => 'Часто замовляє комплексні послуги для волосся.', 'imageName' => 'worker5'],
    ['id' => 6, 'name' => 'Аліна Шевчук', 'phoneNumber' => '+380631111111', 'email' => 'alina@gmail.com', 'details' => 'Постійно ходить на масажі.', 'imageName' => 'worker6'],
    ['id' => 7, 'name' => 'Кіра Коваленко', 'phoneNumber' => '+380991111111', 'email' => 'kira@gmail.com', 'details' => 'Найчастіше буває у косметолога. Постійний клієнт.', 'imageName' => 'worker7'],
    ['id' => 8, 'name' => 'Ірина Тарнавська', 'phoneNumber' => '+380781111111', 'email' => 'irina@gmail.com', 'details' => 'Постійно ходить на комплекс для брів.', 'imageName' => 'worker8'],
];

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$client = null;
foreach ($clients as $c) {
    if ($c['id'] === $id) {
        $client = $c;
        break;
    }
}
?>
<div class="container">
    <!-- Ліва панель зі списком клієнтів -->
    <div class="sidebar">
        <h2>Список клієнтів</h2>
        <ul class="client-list">
            <?php foreach ($clients as $clientData): ?>
                <li class="client-card">
                    <a href="?id=<?= $clientData['id'] ?>">
                        <img src="assets/images/<?= htmlspecialchars($clientData['imageName']) ?>.jpg" alt="<?= htmlspecialchars($clientData['name']) ?>">
                        <div class="client-info">
                            <h3><?= htmlspecialchars($clientData['name']) ?></h3>
                            <p><?= htmlspecialchars($clientData['phoneNumber']) ?></p>
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Основний контент з детальною інформацією -->
    <div class="main-content">
        <?php if ($client): ?>
            <div class="client-detail">
                <img src="assets/images/<?= htmlspecialchars($client['imageName']) ?>.jpg" alt="<?= htmlspecialchars($client['name']) ?>" class="client-photo">
                <h1><?= htmlspecialchars($client['name']) ?></h1>
                <p><strong>Телефон:</strong> <?= htmlspecialchars($client['phoneNumber']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($client['email']) ?></p>
                <p><strong>Деталі:</strong> <?= htmlspecialchars($client['details']) ?></p>
                <a href="?tab=clients" class="back-button">Назад до списку клієнтів</a>
            </div>
        <?php else: ?>
            <p>Клієнта не знайдено</p>
        <?php endif; ?>
    </div>
</div>
