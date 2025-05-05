<?php
require __DIR__ . '/SQLService.php';

use App\views\SQLService;

// Ініціалізація класу для роботи з базою даних
$sqlService = new SQLService();
$pdo = $sqlService->getPdo();

// Доступні послуги з цінами
$servicesWithPrices = [
    "Стрижка" => 700,
    "Фарбування класичне" => 500,
    "Фарбування у техніці 1 довжини" => 5000,
    "Фарбування у техніці 2 довжини" => 7000,
    "Фарбування у техніці 3 довжини" => 9000,
    "Манікюр класичний" => 800,
    "Нарощення нігтів" => 1200,
    "Педикюр" => 1400,
    "Масаж класичний" => 1100,
    "Масаж антицелюлітний" => 1350,
    "Масаж з ефірними маслами" => 1400,
    "Нарощування вій" => 1100,
    "Ламінування+Фарбування вій" => 800,
    "Кореція+Фарбування брів" => 750,
    "Комплекс брови" => 970
];

$availableTimes = [
    "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00"
];

// Перевірка, чи форма була надіслана
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Отримуємо дані з форми
    $clientName = $_POST['client_name'];
    $selectedServices = $_POST['services'] ?? [];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $discount = $_POST['discount'] ?? 0;

    // Обчислення загальної вартості
    $totalCost = 0;
    foreach ($selectedServices as $service) {
        $totalCost += $servicesWithPrices[$service] ?? 0;
    }
    $totalCost -= $totalCost * ($discount / 100);

    // Вставка нового запису в базу даних
    $stmt = $pdo->prepare("INSERT INTO appointments (client_name, service, date, time, total_cost) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$clientName, implode(", ", $selectedServices), $date, $time, $totalCost]);

//    // Перенаправлення на сторінку записів після збереження
//    header('Location: /index.php?tab=appointments');
//    exit();
}
?>

<div class="add-appointment-container">
    <h1>Додати новий запис</h1>

    <form method="POST" action="add_appointment.php">
        <!-- Дані клієнта -->
        <label for="client_name">Ім'я клієнта</label>
        <input type="text" id="client_name" name="client_name" required>

        <!-- Оберіть послуги -->
        <label for="services">Оберіть послуги</label><br>
        <?php foreach ($servicesWithPrices as $service => $price): ?>
            <input type="checkbox" name="services[]" value="<?= $service ?>" id="<?= $service ?>">
            <label for="<?= $service ?>"><?= $service ?> - ₴<?= number_format($price, 2) ?></label><br>
        <?php endforeach; ?>

        <!-- Дата -->
        <label for="date">Дата</label>
        <input type="date" id="date" name="date" required>

        <!-- Час -->
        <label for="time">Час</label>
        <select id="time" name="time" required>
            <?php foreach ($availableTimes as $timeOption): ?>
                <option value="<?= $timeOption ?>"><?= $timeOption ?></option>
            <?php endforeach; ?>
        </select>

        <!-- Знижка -->
        <label for="discount">Знижка (%)</label>
        <select id="discount" name="discount">
            <option value="0">0%</option>
            <option value="5">5%</option>
            <option value="10">10%</option>
            <option value="15">15%</option>
        </select>

        <!-- Загальна вартість -->
        <p>Загальна вартість: ₴<span id="totalCost">0.00</span></p>

        <button type="submit">Зберегти</button>
        <a href="/index.php?tab=appointments" class="button">Назад до записів</a>
    </form>
</div>

<script>
    // Обчислення загальної вартості на клієнтській стороні
    const services = <?= json_encode($servicesWithPrices) ?>;
    const form = document.querySelector('form');
    const totalCostSpan = document.getElementById('totalCost');

    form.addEventListener('change', function () {
        let totalCost = 0;
        const selectedServices = Array.from(form.querySelectorAll('input[name="services[]"]:checked')).map(input => input.value);
        selectedServices.forEach(service => {
            totalCost += services[service];
        });

        const discount = parseFloat(form.querySelector('[name="discount"]').value);
        totalCost -= totalCost * (discount / 100);

        totalCostSpan.innerText = totalCost.toFixed(2);
    });
</script>