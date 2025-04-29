<?php
require 'vendor/autoload.php';

session_start();

// Перевірка, чи користувач авторизований
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    // Якщо авторизований, показуємо ContentView
    require __DIR__ . '/src/View/contentview.php';
} else {
    // Якщо не авторизований, показуємо LoginView
    require __DIR__ . '/src/View/loginview.php';

}
