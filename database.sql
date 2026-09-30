-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: auto_shop
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mileage` int(11) DEFAULT 0,
  `is_new` tinyint(1) NOT NULL,
  `engine_type` varchar(50) DEFAULT NULL,
  `transmission` varchar(50) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (1,'Toyota','RAV4',2024,1350000.00,0,1,'2.5 Гібрид','Автомат','https://cdn.riastatic.com/photosnewr/ria/news_common/test-drajv-toyota-rav4-plug-in-hybrid-vy-zakhotite-pereplatit__255436-2560x1600.jpg','Новий кросовер Toyota RAV4. Максимальна комплектація, ідеальний для міста та подорожей.'),(2,'Toyota','Camry',2024,1450000.00,0,1,'2.5 Бензин','Автомат','https://i.infocar.ua/i/12/6462/1400x936.jpg','Легендарний седан бізнес-класу з новим агресивним дизайном та преміальним салоном.'),(3,'Hyundai','Tucson',2024,1150000.00,0,1,'2.0 Дизель','Автомат','https://motorcar.com.ua/wp-content/uploads/2023/03/hyundai-all-new-tucson-1120-05_jpg-1200x800.jpg','Сучасний дизайн та інноваційні технології. Офіційна гарантія від дилера.'),(4,'Hyundai','Elantra',2024,950000.00,0,1,'1.6 Бензин','Автомат','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDSvN4iv0ZTF-RwMwgruh0vF6m5ExMXdS7OkL9naHaMPiEjtUhLjpNRNNd&s=10','Стильний міський седан. Низька витрата пального та багато розумних помічників для водія.'),(5,'Volkswagen','Tiguan',2024,1550000.00,0,1,'2.0 Бензин','Автомат','https://i.infocar.ua/i/12/7003/1200x630.jpg','Оновлений Tiguan. Просторий салон, матричні фари та віртуальна панель приладів.'),(6,'Volkswagen','Touareg',2024,2800000.00,0,1,'3.0 Дизель','Автомат','https://volkswagen.kyiv.ua/wp-content/uploads/novyi-volkswagen-touareg-detalnyi-ohliad.webp','Флагманський позашляховик. Пневмопідвіска, шкіра Nappa та преміальна аудіосистема.'),(7,'Volkswagen','Passat B8',2020,750000.00,120000,0,'2.0 Дизель','Автомат','https://i.infocar.ua/i/12/3942/1200x800.jpg','Надійний та економний автомобіль. Пригнаний з Європи, повністю розмитнений.'),(8,'Volkswagen','Golf',2018,550000.00,145000,0,'1.4 Бензин','Механіка','https://i.infocar.ua/i/12/2378/1400x936.jpg','Компактний хетчбек для міста. Технічно справний, замінено ремінь ГРМ та мастило.'),(9,'Toyota','Corolla',2019,620000.00,95000,0,'1.6 Бензин','Автомат','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6ahmjto_2uYT1OsAz_3mQhk6PuwaBuZxlUc2xbus4Nl5SG6GCYL97NZMm&s=10','Один власник з автосалону. Не бита, не фарбована. Дуже надійний двигун.'),(10,'Hyundai','Santa Fe',2017,850000.00,110000,0,'2.2 Дизель','Автомат','https://www.aelita.ua/wp-content/uploads/2023/11/IMG_0053-scaled-1140x843.jpg','Великий сімейний кросовер на 7 місць. Повний привід, шкіряний салон, панорамний дах.');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-30 22:01:49
