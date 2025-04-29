<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: index.php'); // Якщо не авторизований, повертаємо на сторінку входу
    exit;
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Головна</title>
    <style>
        /* Додаємо стилі для вкладок */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
        }
        .tabs {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: background-color 0.3s;
        }
        .tab:hover {
            background-color: #ff69b4;
            color: white;
        }
        .content {
            padding: 20px;
            background-color: #ffffff;
            margin: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="tabs">
    <div class="tab">Клієнти</div>
    <div class="tab">Послуги</div>
    <div class="tab">Записи</div>
    <div class="tab">Працівники</div>
</div>

<div class="content">
    <h2>Вітаємо в системі!</h2>
    <p>Тут буде основний контент в залежності від вкладки.</p>
</div>
</body>
</html>