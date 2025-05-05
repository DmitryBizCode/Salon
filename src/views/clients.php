<?php
session_start();
// Массив клиентов (позже заменить на получение из MySQL)
$clients = [
    ['id' => 1, 'name' => 'Олена Коваленко',   'phoneNumber' => '+380501234567', 'email' => 'olena@gmail.com',  'details' => 'Постійний клієнт. Віддає перевагу фарбуванню у техніці балаяж.',       'imageName' => 'client1'],
    ['id' => 2, 'name' => 'Аліса Обдар',        'phoneNumber' => '+380671234567', 'email' => 'alisa@gmail.com',  'details' => 'Замовляла масаж кілька разів. Відгуки лише позитивні.',                  'imageName' => 'client2'],
    ['id' => 3, 'name' => 'Марія Іванова',      'phoneNumber' => '+380931234567', 'email' => 'maria@gmail.com',  'details' => 'Найчастіше звертається за послугами манікюру.',                         'imageName' => 'client3'],
    ['id' => 4, 'name' => 'Каріна Абдулова',    'phoneNumber' => '+380501111111', 'email' => 'karina@gmail.com','details' => 'Ходить часто на догляд та зачіски. Постійний клієнт.',                'imageName' => 'client4'],
    ['id' => 5, 'name' => 'Анна Шевченко',      'phoneNumber' => '+380671111111', 'email' => 'anna@gmail.com',  'details' => 'Часто замовляє комплексні послуги для волосся.',                     'imageName' => 'client5'],
    ['id' => 6, 'name' => 'Аліна Шевчук',       'phoneNumber' => '+380631111111', 'email' => 'alina@gmail.com', 'details' => 'Постійно ходить на масажі.',                                         'imageName' => 'client6'],
    ['id' => 7, 'name' => 'Кіра Коваленко',     'phoneNumber' => '+380991111111', 'email' => 'kira@gmail.com',  'details' => 'Найчастіше буває у косметолога. Постійний клієнт.',                 'imageName' => 'client7'],
    ['id' => 8, 'name' => 'Ірина Тарнавська',   'phoneNumber' => '+380781111111', 'email' => 'irina@gmail.com','details' => 'Постійно ходить на комплекс для брів.',                              'imageName' => 'client8'],
];
?>
<div class="clients-container">
    <h1>Список клієнтів</h1>
    <ul class="client-list">
        <?php foreach ($clients as $client): ?>
            <li class="client-card">
                <a href="client_detail.php?id=<?= $client['id'] ?>">
                    <img src="assets/images/<?= htmlspecialchars($client['imageName']) ?>.jpg" alt="<?= htmlspecialchars($client['name']) ?>">
                    <div class="client-info">
                        <h2><?= htmlspecialchars($client['name']) ?></h2>
                        <p><?= htmlspecialchars($client['phoneNumber']) ?></p>
                    </div>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
