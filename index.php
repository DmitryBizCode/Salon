<?php
session_start();

require __DIR__ . '/vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SalonApp</title>
    <!-- Подключение общего стиля для проекта -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php
// Проверяем, аутентифицирован ли пользователь
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Если нет — выводим форму входа
    include __DIR__ . '/src/views/login.php';
} else {
    // Если да — основной контент приложения
    include __DIR__ . '/src/views/content.php';
}
?>
</body>
</html>
