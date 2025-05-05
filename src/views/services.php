<?php
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
ksort($servicesWithPrices);
?>
<div class="services-container">
    <h1>Список послуг</h1>
    <ul class="service-list">
        <?php foreach ($servicesWithPrices as $service => $price): ?>
            <li class="service-item">
                <span class="service-name"><?= htmlspecialchars($service) ?></span>
                <span class="service-price">₴<?= number_format($price, 2) ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
</div>