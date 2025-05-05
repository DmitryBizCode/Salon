<?php
session_start();
// Используем тот же массив клиентов для деталей (позже заменить на запрос к MySQL)
$clients = [
    ['id' => 1,'name' => 'Олена Коваленко','phoneNumber' => '+380501234567', 'email' => 'olena@gmail.com','details' => 'Постійний клієнт. Віддає перевагу фарбуванню у техніці балаяж.','imageName' => 'worker1'],
    ['id' => 2,'name' => 'Аліса Обдар','phoneNumber' => '+380671234567', 'email' => 'alisa@gmail.com','details' => 'Замовляла масаж кілька разів. Відгуки лише позитивні.','imageName' => 'worker1'],
    ['id' => 3,'name' => 'Марія Іванова','phoneNumber' => '+380931234567', 'email' => 'maria@gmail.com','details' => 'Найчастіше звертається за послугами манікюру.','imageName' => 'worker1'],
    ['id' => 4,'name' => 'Каріна Абдулова','phoneNumber' => '+380501111111', 'email' => 'karina@gmail.com','details' => 'Ходить часто на догляд та зачіски. Постійний клієнт.','imageName' => 'worker1'],
    ['id' => 5,'name' => 'Анна Шевченко','phoneNumber' => '+380671111111', 'email' => 'anna@gmail.com','details' => 'Часто замовляє комплексні послуги для волосся.','imageName' => 'worker1'],
    ['id' => 6,'name' => 'Аліна Шевчук','phoneNumber' => '+380631111111', 'email' => 'alina@gmail.com','details' => 'Постійно ходить на масажі.','imageName' => 'worker1'],
    ['id' => 7,'name' => 'Кіра Коваленко','phoneNumber' => '+380991111111', 'email' => 'kira@gmail.com','details' => 'Найчастіше буває у косметолога. Постійний клієнт.','imageName' => 'worker1'],
    ['id' => 8,'name' => 'Ірина Тарнавська','phoneNumber' => '+380781111111', 'email' => 'irina@gmail.com','details' => 'Постійно ходить на комплекс для брів.','imageName' => 'worker1'],
];

$id = (int)($_GET['id'] ?? 0);
$client = null;
foreach ($clients as $c) {
    if ($c['id'] === $id) {
        $client = $c;
        break;
    }
}
if (!$client) {
    echo '<p>Клієнта не знайдено</p>';
    exit;
}
?>
<div class="client-detail">
    <img src="/assets/images/<?= htmlspecialchars($client['imageName']) ?>.jpg" alt="<?= htmlspecialchars($client['name']) ?>">
    <h1><?= htmlspecialchars($client['name']) ?></h1>
    <p>Телефон: <?= htmlspecialchars($client['phoneNumber']) ?></p>
    <p>Email: <?= htmlspecialchars($client['email']) ?></p>
    <p><?= htmlspecialchars($client['details']) ?></p>
    <a href="/index.php?tab=clients" class="back-button">Назад до списку клієнтів</a>
</div>
