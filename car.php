<?php
require_once 'db.php';

// Перевіряємо, чи переданий ID автомобіля
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Помилка: Автомобіль не знайдено. <a href='index.php'>Повернутися на головну</a>");
}

$id = (int)$_GET['id'];

// Отримуємо дані конкретного авто з бази
$stmt = $pdo->prepare('SELECT * FROM cars WHERE id = ?');
$stmt->execute([$id]);
$car = $stmt->fetch();

// Якщо авто з таким ID не існує
if (!$car) {
    die("Помилка: Такого автомобіля не існує в базі. <a href='index.php'>Повернутися на головну</a>");
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($car['brand'] . ' ' . $car['model']) ?> | Автосалон «Швидкість»</title>
    <!-- Підключення стилів -->
    <link rel="stylesheet" href="style.css?v=1.1">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Шапка сайту -->
    <header class="header">
        <div class="container">
            <div class="logo">
                <a href="index.php">ШВИДКІСТЬ<span>.AUTO</span></a>
            </div>
            <nav class="nav-menu">
                <ul>
                    <li><a href="index.php">Головна</a></li>
                    <li><a href="index.php">Каталог</a></li>
                    <li><a href="#">Контакти</a></li>
                </ul>
            </nav>
            <div class="header-contact">
                <a href="tel:+380000000000" class="phone">+38 (000) 000-00-00</a>
            </div>
        </div>
    </header>

    <!-- Детальна інформація про авто -->
    <section class="car-page container">
        <div class="car-page-layout">
            
            <!-- Ліва колонка: Фото -->
            <div class="car-page-gallery">
                <?php if ($car['is_new'] == 1): ?>
                    <div class="car-badge new" style="position: absolute; top: 20px; left: 20px; z-index: 10;">Нове</div>
                <?php else: ?>
                    <div class="car-badge used" style="position: absolute; top: 20px; left: 20px; z-index: 10;">З пробігом</div>
                <?php endif; ?>
                
                <img src="<?= htmlspecialchars($car['image_url']) ?>" alt="<?= htmlspecialchars($car['brand'] . ' ' . $car['model']) ?>" class="car-page-main-img">
            </div>

            <!-- Права колонка: Інформація -->
            <div class="car-page-details">
                <h1><?= htmlspecialchars($car['brand'] . ' ' . $car['model']) ?> <span><?= htmlspecialchars($car['year']) ?></span></h1>
                
                <div class="car-page-price"><?= number_format($car['price'], 0, '', ' ') ?> грн</div>
                
                <div class="car-page-specs">
                    <h3>Характеристики:</h3>
                    <ul>
                        <li><strong>Двигун:</strong> <?= htmlspecialchars($car['engine_type']) ?></li>
                        <li><strong>Коробка передач:</strong> <?= htmlspecialchars($car['transmission']) ?></li>
                        <li><strong>Стан:</strong> <?= $car['is_new'] ? 'Новий автомобіль' : 'З пробігом' ?></li>
                        <?php if ($car['is_new'] == 0): ?>
                            <li><strong>Пробіг:</strong> <?= number_format($car['mileage'], 0, '', ' ') ?> км</li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="car-page-desc">
                    <h3>Опис:</h3>
                    <p><?= nl2br(htmlspecialchars($car['description'])) ?></p>
                </div>

                <div class="car-page-actions">
                    <button class="btn-primary" style="padding: 15px 30px; font-size: 18px; width: 100%;">Записатися на тест-драйв</button>
                </div>
            </div>

        </div>
    </section>

</body>
</html>