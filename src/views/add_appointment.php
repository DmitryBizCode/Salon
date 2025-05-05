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

// Перевірка форми
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clientName = $_POST['client_name'] ?? '';
    $service = $_POST['service'] ?? '';
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $totalCost = $_POST['total_cost'] ?? 0;

    // Додаємо новий запис
    $viewModel->addAppointment($clientName, $service, $date, $time, $totalCost);
    header('Location: appointments.php'); // Перехід до списку записів
    exit;
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додати запис</title>
    <style>
        /* Основні стилі для форми */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
        }
        .form-container {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #ff69b4;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Додати новий запис</h2>
    <form method="POST" action="">
        <input type="text" name="client_name" placeholder="Ім'я клієнта" required>
        <input type="text" name="service" placeholder="Послуга" required>
        <input type="date" name="date" required>
        <input type="time" name="time" required>
        <input type="number" name="total_cost" step="0.01" placeholder="Загальна вартість" required>
        <button type="submit">Додати запис</button>
    </form>
</div>
</body>
</html>