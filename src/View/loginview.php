<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Логіка автентифікації
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Перевірка правильності введених даних
    if ($username === 'Valeria' && $password === '1234') {
        $_SESSION['authenticated'] = true; // Зберігаємо статус авторизації
        header('Location: index.php'); // Перехід до ContentView
        exit;
    } else {
        $error = 'Невірний логін або пароль';
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизація</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .button {
            width: 100%;
            padding: 10px;
            background-color: #ff69b4;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h1>Авторизація адміністратора</h1>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Логін" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button class="button" type="submit">Увійти</button>
    </form>
    <?php if (isset($error)) { echo "<div class='error'>$error</div>"; } ?>
</div>
</body>
</html>