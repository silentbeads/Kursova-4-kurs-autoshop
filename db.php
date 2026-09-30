<?php
// Налаштування для локального сервера
$host = '127.0.0.1';
$db   = 'auto_shop';
$user = 'root';
$pass = ''; // Залишаємо порожнім для локального сервера
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Виводити помилки
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Дані у вигляді асоціативного масиву
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Створюємо підключення
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Якщо помилка — виводимо її на екран
    die("Помилка підключення до бази даних: " . $e->getMessage());
}
?>