<?php
session_start();
$error = false;
$username = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if ($username === 'Valeria' && $password === '1234') {
        $_SESSION['authenticated'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = true;
    }
}
?>
<div class="login-container">
    <h1>Авторизація адміністратора</h1>
    <?php if ($error): ?>
        <div class="alert">Невірний логін або пароль</div>
    <?php endif; ?>
    <form method="POST" action="/index.php">
        <input type="text" name="username" placeholder="Логін" value="<?= htmlspecialchars($username) ?>">
        <input type="password" name="password" placeholder="Пароль">
        <button type="submit">Увійти</button>
    </form>
</div>