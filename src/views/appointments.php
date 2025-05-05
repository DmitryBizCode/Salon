<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: login.php');
    exit;
}

// Підключення до бази даних
$dsn = 'mysql:host=localhost;dbname=salon';
$username = 'root';
$password = '';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

// Ініціалізація класу
$viewModel = new clients($db);
$appointments = $viewModel->fetchAppointments(); // Отримуємо всі записи
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Записи</title>
    <style>
        /* Стилі для таблиці */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
        }
        .table-container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f9f9f9;
        }
        button {
            background-color: #ff69b4;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="table-container">
    <h2>Список записів</h2>
    <table>
        <thead>
        <tr>
            <th>Клієнт</th>
            <th>Послуга</th>
            <th>Дата</th>
            <th>Час</th>
            <th>Вартість</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($appointments as $appointment): ?>
            <tr>
                <td><?php echo $appointment['client_name']; ?></td>
                <td><?php echo $appointment['service']; ?></td>
                <td><?php echo $appointment['date']; ?></td>
                <td><?php echo $appointment['time']; ?></td>
                <td><?php echo $appointment['total_cost']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <button onclick="window.location.href='add_appointment.php'">Додати новий запис</button>
</div>
</body>
</html>