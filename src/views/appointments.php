<?php
// appointments.php
require __DIR__ . '/SQLService.php';

use App\views\SQLService;

// Створюємо об'єкт для підключення до бази даних
$sqlService = new SQLService();

// Отримуємо з'єднання PDO
$pdo = $sqlService->getPdo();

// Отримуємо записи з таблиці appointments
$stmt = $pdo->query("SELECT * FROM appointments");
$appointments = $stmt->fetchAll();
?>

<div class="appointments-container">
    <h1>Записи клієнтів</h1>

    <?php if (empty($appointments)): ?>
        <p class="no-data">Немає записів</p>
    <?php else: ?>
        <ul class="appointment-list">
            <?php foreach ($appointments as $appointment): ?>
                <li class="appointment-item">
                    <strong>Клієнт:</strong> <?= htmlspecialchars($appointment['client_name']) ?><br>
                    <strong>Послуга:</strong> <?= htmlspecialchars($appointment['service']) ?><br>
                    <strong>Дата:</strong> <?= date('d.m.Y', strtotime($appointment['date'])) ?><br>
                    <strong>Час:</strong> <?= htmlspecialchars($appointment['time']) ?><br>
                    <strong>Вартість:</strong> ₴<?= number_format($appointment['total_cost'], 2) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <a href="/src/views/add_appointment.php" class="button">Додати запис</a>
</div>