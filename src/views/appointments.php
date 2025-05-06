<?php
// Start output buffering
ob_start();

require __DIR__ . '/SQLService.php';

use App\views\SQLService;

// Ініціалізація класу для роботи з базою даних
$sqlService = new SQLService();
$pdo = $sqlService->getPdo();

// Перевірка, чи форма була надіслана
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
    // Отримуємо ID запису, який потрібно видалити
    $deleteId = (int)$_POST['delete_id'];

    // Підготовка SQL запиту на видалення
    $stmt = $pdo->prepare("DELETE FROM appointments WHERE id = :id");
    $params = [
        ':id' => $deleteId
    ];
    $stmt->execute($params);

    // Set flag for successful deletion
    $deleteSuccess = true;
}

// Отримуємо записи з таблиці appointments
$stmt = $pdo->query("SELECT * FROM appointments");
$appointments = $stmt->fetchAll();
?>

    <!DOCTYPE html>
    <html lang="uk">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Записи клієнтів</title>
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>

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
                        <strong>Вартість:</strong> ₴<?= number_format($appointment['total_cost'], 2) ?><br>

                        <!-- Форма для видалення -->
                        <form action="/index.php?tab=appointments" method="POST" style="display:inline;">
                            <input type="hidden" name="delete_id" value="<?= $appointment['id'] ?>">
                            <button type="submit" class="delete-button" onclick="return confirm('Ви впевнені, що хочете видалити цей запис?')">Видалити</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <a href="/src/views/add_appointment.php" class="button">Додати запис</a>
    </div>

    <!-- Стилі для кнопки видалення -->
    <style>
        .delete-button {
            color: red;
            text-decoration: none;
            font-weight: bold;
            padding: 5px;
            background: none;
            border: none;
            cursor: pointer;
        }

        .delete-button:hover {
            text-decoration: underline;
        }
    </style>

    <?php if (isset($deleteSuccess) && $deleteSuccess): ?>
        <script>
            // Redirect to the appointments page after successful deletion
            window.location.href = "/index.php?tab=appointments";
        </script>
    <?php endif; ?>

    </body>
    </html>

<?php
// End output buffering and flush the output buffer to the browser
ob_end_flush();
?>