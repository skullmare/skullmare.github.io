CREATE DATABASE  IF NOT EXISTS `ticketclub` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ticketclub`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: ticketclub
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Концерт'),(2,'Фестиваль');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `date_s` date DEFAULT NULL,
  `date_e` date DEFAULT NULL,
  `place` varchar(150) DEFAULT NULL,
  `text` varchar(1000) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `time_s` time DEFAULT NULL,
  `time_e` time DEFAULT NULL,
  `img` longtext,
  PRIMARY KEY (`id`),
  KEY `category_idx` (`category_id`),
  CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'РИТМОLOVE','2022-07-20','2022-07-20','НСК Олимпийский улица Большая Васильковская, 55, Киев, Украина, 02000','20 июля 2022 года один из самых ярких украинских музыкантов нового поколения, певец, танцор, хореограф и композитор представит в Киеве шоу «LOVE IT РИТМ – THE SHOW» в расширенном формате! Билеты в продаже уже с 5 декабря 2019 года – торопитесь!',2000,1,'19:00:00','21:00:00','https://allstars.by/public/images/Monatik_Allstars_1200x630.jpg'),(2,'BlackPink концерт','2022-08-11','2022-08-11','25 Olympic-ro, Songpa-gu, Seoul, Республика Корея','Blackpink — южнокорейская гёрл-группа, сформированная в 2016 году компанией YG Entertainment. Коллектив состоит из четырёх участниц: Джису, Дженни, Розэ и Лисы. Дебют состоялся 8 августа 2016 года с сингловым альбомом Square One.',3000,1,'19:00:00','21:00:00','https://sevastopolfm.ru/wp-content/uploads/%D0%B1%D0%BB%D1%8D%D0%BA%D0%BF%D0%B8%D0%BD%D0%BA.jpg'),(3,'Coachella 2022','2022-09-17','2022-09-19','Coachella beatch Калифорния, США','Фестиваль музыки и искусств в долине Коачелла (англ. Coachella Valley Music and Arts Festival), также известный как Коачелла-фест или просто Коачелла — трёхдневный (ранее одно- или двухдневный) музыкальный фестиваль, проводимый компанией Goldenvoice в городе Индио, штат Калифорния.',5000,2,'10:00:00','24:00:00','https://tlsanmartin.com/wp-content/uploads/2022/04/coachella-2022-festival-elle-1650269812.webp'),(4,'TheWeeknd концерт','2022-07-21','2022-07-21','Ледовая арена ул. Передовиков, 14к2, Санкт-Петербург, 195299','В 2012 году Абель Тесфайе, более известный как The Weeknd, выпустил микстейп-триптих, который задал новую планку качества сенсуальному и неподцензурному R’n’B, заодно блестяще исполнив «Dirty Diana» и заявив о себе как об андеграундном наследнике Майкла Джексона».',2000,1,'19:00:00','21:00:00','https://www.film.ru/sites/default/files/filefield_paths/the-weeknd_d186b_opgh.jpg'),(5,'L\'One концерт','2022-09-20','2022-09-20','г.Москва НСК Олимпийский Олимпийский проспект 16, стр.1, 2, Москва, 129090','Лева́н Емза́рович Горо́зия, также известный под псевдонимом L’One — российский рэп-исполнитель, бывший участник объединения Phlatline, основатель проекта WDKTZ вместе с DJ Pill.One, сооснователь и участник группы Marselle. С 17 апреля 2012 года по 15 марта 2019 года являлся артистом лейбла «Black Star».',2000,1,'19:00:00','21:00:00','https://img04.rl0.ru/afisha/e904x508p0x0f1365x780q85i/s1.afisha.ru/mediastorage/d5/5d/110fa74028a54a11b03cfd175dd5.jpg'),(21,'Apple Music','2022-06-29','2022-06-30','Peninsula Square, London SE10 0DX, Великобритания','Apple Music Festival — музыкальный фестиваль, проводимый ежегодно с 2007 года при поддержке американской корпорации Apple. Билеты распространяются в Великобритании через специальные локальные розыгрыши при поддержке партнёров.',5000,2,'18:00:00','20:00:00','https://www.iphones.ru/wp-content/uploads/2017/09/London_apple_music_festival.jpg'),(22,'Sting концерт','2022-08-04','2022-08-04','Peninsula Square, London SE10 0DX, Великобритания','Стинг CBE — британский музыкант-мультиинструменталист, певец и автор песен, актёр, общественный деятель и филантроп. Вокалист группы The Police в 1976—1984 годах. С 1984 года выступает сольно.',3000,1,'20:00:00','22:30:00','https://avatars.yandex.net/get-music-content/103235/f6118346.p.680/m1000x1000'),(23,'Billie Eilish концерт','2022-11-01','2022-11-01','1038 S Hill St, Los Angeles, CA 90015, Соединенные Штаты','Би́лли А́йлиш Па́йрат Бэрд О’Ко́ннелл — американская певица и автор песен. Лауреат премии «Оскар» за песню «No Time to Die», написанную для фильма «Не время умирать». Снискала известность в 2015 году благодаря публикации дебютного сингла «Ocean Eyes» на SoundCloud. ',1500,1,'23:00:00','01:00:00','https://worldnationnews.com/wp-content/uploads/2022/02/Billie-Eilish-stops-concert-again-over-fans-safety.jpg'),(24,'Marshmello концерт','2022-10-10','2022-10-10','1 E 161 St, Bronx, NY 10451, Соединенные Штаты','Кристофер Комсток, более известный по сценическому псевдониму Marshmello — американский диджей и музыкальный продюсер в жанре электронной музыки. По состоянию на 2021 год занимает 11 место в списке лучших диджеев мира по версии журнала DJ Magazine.',2500,1,'18:00:00','21:00:00','https://www.proconcert.ru/netcat_files/multifile/2560/Marshmello_1.jpg'),(25,'21 Savage','2022-08-01','2022-08-01','1 E 161 St, Bronx, NY 10451, Соединенные Штаты','Ша́йя Бин Э́йбрахам-Джо́зеф, более известный как 21 Savage — американский рэпер, автор песен и музыкальный продюсер. Получил широкую известность после выпуска микстейпа The Slaughter Tape и мини-альбома Savage Mode, совместно с Metro Boomin.',2000,1,'19:00:00','21:30:00','https://modernrock.ru/wp-content/uploads/2017/07/21-Savage.jpg'),(26,'Adele концерт','2022-07-01','2022-07-01','НСК Олимпийский улица Большая Васильковская, 55, Киев, Украина, 02000','Аде́ль Ло́ри Блу Э́дкинс — британская певица, автор-исполнитель и поэтесса, лауреат 15 премий Грэмми и первый музыкант, сумевший выиграть в номинациях «Альбом года», «Запись года» и «Песня года» дважды. Песня «Skyfall» в её исполнении получила премии «Оскар» и «Золотой глобус».',3000,1,'20:00:00','22:00:00','https://media.tatler.ru/photos/619764f52825871e845c4878/16:9/w_1280,c_limit/242518295_570142324183310_5732784850682005900_n.jpg'),(27,'DJ Snake music show','2023-05-01','2023-05-01','1 E 161 St, Bronx, NY 10451, Соединенные Штаты','Уильям Сами Этьен Григасин, более известен как DJ Snake — французский музыкальный продюсер и диджей. Дважды номинант на премию «Грэмми», обладатель MTV Video Music Awards в 2014 году за сингл «Turn Down for What» совместно с Лилом Джоном.',4000,1,'20:00:00','22:00:00','https://cdn.forbes.ru/forbes-static/1082x609/new/2021/09/Hublot-Ambassador-DJ-Snake-wearing-the-Big-Bang-DJ-Snake-3-6144a4a277969-6144a4a2a2867.webp'),(28,'LISA 1t Solo concert','2023-07-02','2023-07-02','25 Olympic-ro, Songpa-gu, Seoul, Республика Корея','Лали́са Маноба́н — тайская певица, танцовщица и модель. Является участницей южнокорейской поп-группы BLACKPINK и занимает позиции главного танцора, ведущего рэпера, саб-вокалиста и макнэ.',2500,1,'21:00:00','22:30:00','https://www.buro247.ru/local/share/images/72169.jpg'),(29,'BTS концерт','2022-09-01','2022-09-01','25 Olympic-ro, Songpa-gu, Seoul, Республика Корея','BTS — южнокорейский бой-бэнд, сформированный в 2013 году компанией Big Hit Entertainment. Коллектив состоит из семи участников: RM, Чина, Сюги, Джей-Хоупа, Чимина, Ви и Джонгука.',3500,1,'21:00:00','22:30:00','https://cloudfront-us-east-1.images.arcpublishing.com/infobae/OP3VXEFN5ZGXPJQTY3PW63XLI4.png'),(30,'Oxxxymiron','2022-07-01','2022-07-01','1 E 161 St, Bronx, NY 10451, Соединенные Штаты','Oxxxymiron — российский хип-хоп-исполнитель, общественный деятель. Является одним из наиболее коммерчески успешных рэп-исполнителей России, его альбомы «Вечный жид» и, особенно, «Горгород» внесли значительный вклад в историю русского рэпа.',3000,1,'18:00:00','20:00:00','https://cdni.rt.com/russian/images/2021.11/article/6185449dae5ac906923426e5.jpg'),(31,'Lil Pump','2022-08-01','2022-08-01','1 E 161 St, Bronx, NY 10451, Соединенные Штаты','Газзи Гарсия, более известный по сценическому псевдониму Lil Pump — американский рэпер и автор песен из Майами, штат Флорида.',3000,1,'19:00:00','21:00:00','https://i.ytimg.com/vi/4LfJnj66HVQ/maxresdefault.jpg');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscribers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribers`
--

LOCK TABLES `subscribers` WRITE;
/*!40000 ALTER TABLE `subscribers` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(16) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `sum` decimal(10,0) DEFAULT NULL,
  `status_id` int DEFAULT NULL,
  `event_id` int DEFAULT NULL,
  `st` int DEFAULT NULL,
  `gt` int DEFAULT NULL,
  `dt` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_idx` (`event_id`),
  CONSTRAINT `event` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'ticketclub'
--

--
-- Dumping routines for database 'ticketclub'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-26 11:06:59
