<?php 
require_once 'db.php'; 

// Отримуємо всі автомобілі з бази даних
$stmt = $pdo->query('SELECT * FROM cars ORDER BY id DESC');
$cars = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Автосалон «Швидкість» | Нові та вживані авто</title>
    <!-- Підключення стилів та шрифтів -->
    <link rel="stylesheet" href="style.css?v=1.2">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Навігація -->
    <header class="header">
        <div class="container">
            <div class="logo">
                <a href="index.php">ШВИДКІСТЬ<span>.AUTO</span></a>
            </div>
            <nav class="nav-menu">
                <ul>
                    <!-- Оновлене меню без тавтології -->
                    <li><a href="index.php" class="active">Головна</a></li>
                    <li><a href="#catalog">Каталог авто</a></li>
                    <li><a href="#">Послуги Trade-In</a></li>
                    <li><a href="#">Контакти</a></li>
                </ul>
            </nav>
            <div class="header-contact">
                <a href="tel:+380000000000" class="phone">+38 (000) 000-00-00</a>
                <button class="btn-primary">Замовити дзвінок</button>
            </div>
        </div>
    </header>

    <!-- Головний банер -->
    <section class="hero">
        <div class="hero-content">
            <h1>Твій ідеальний автомобіль чекає на тебе</h1>
            <p>Великий вибір нових авто та перевірених автомобілів з пробігом з гарантією якості.</p>
            <div class="hero-buttons">
                <!-- Залишили одну кнопку для переходу до каталогу -->
                <a href="#catalog" class="btn-primary">Перейти до каталогу</a>
            </div>
        </div>
    </section>

    <!-- Секція Каталогу -->
    <!-- Додано id="catalog" для плавного переходу по кліку з меню/банера -->
    <section id="catalog" class="catalog container">
        <div class="catalog-header">
            <h2>Популярні пропозиції</h2>
            <!-- Перемикачі табів з data-атрибутами для JS -->
            <div class="catalog-tabs">
                <button class="tab-btn active" data-filter="all">Всі авто</button>
                <button class="tab-btn" data-filter="new">Нові</button>
                <button class="tab-btn" data-filter="used">З пробігом</button>
            </div>
        </div>

        <div class="car-grid">
            <?php foreach ($cars as $car): ?>
                <!-- Додаємо data-type до кожної картки, щоб знати, нова вона чи з пробігом -->
                <div class="car-card" data-type="<?= $car['is_new'] == 1 ? 'new' : 'used' ?>">
                    
                    <!-- Перевіряємо, чи авто нове, щоб вивести правильний бейдж -->
                    <?php if ($car['is_new'] == 1): ?>
                        <div class="car-badge new">Нове</div>
                    <?php else: ?>
                        <div class="car-badge used">З пробігом</div>
                    <?php endif; ?>

                    <img src="<?= htmlspecialchars($car['image_url']) ?>" alt="<?= htmlspecialchars($car['brand'] . ' ' . $car['model']) ?>" class="car-img">
                    
                    <div class="car-info">
                        <h3><?= htmlspecialchars($car['brand'] . ' ' . $car['model']) ?></h3>
                        <p class="car-year"><?= htmlspecialchars($car['year']) ?></p>
                        
                        <ul class="car-specs">
                            <li><span>Двигун:</span> <?= htmlspecialchars($car['engine_type']) ?></li>
                            <li><span>Коробка:</span> <?= htmlspecialchars($car['transmission']) ?></li>
                            <!-- Виводимо пробіг тільки для вживаних авто -->
                            <?php if ($car['is_new'] == 0): ?>
                                <li><span>Пробіг:</span> <?= number_format($car['mileage'], 0, '', ' ') ?> км</li>
                            <?php endif; ?>
                        </ul>
                        
                        <!-- Форматуємо ціну (розділяємо тисячі пробілом) -->
                        <div class="car-price"><?= number_format($car['price'], 0, '', ' ') ?> грн</div>
                        <!-- Посилання на сторінку конкретного авто (car.php) з передачею ID -->
                        <a href="car.php?id=<?= $car['id'] ?>" class="btn-primary full-width">Детальніше</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.tab-btn');
            const cars = document.querySelectorAll('.car-card');

            // Логіка перемикання вкладок
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Знімаємо активний клас з усіх кнопок і додаємо на натиснуту
                    tabs.forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');

                    // Отримуємо тип фільтра (all, new, used)
                    const filter = tab.getAttribute('data-filter');

                    // Показуємо або ховаємо картки
                    cars.forEach(car => {
                        const type = car.getAttribute('data-type');
                        if (filter === 'all' || filter === type) {
                            car.style.display = 'flex';
                        } else {
                            car.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>