-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: posts
-- ------------------------------------------------------
-- Server version	5.7.33

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `allow` tinyint(4) NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  KEY `postId_idx` (`post_id`),
  CONSTRAINT `postId` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `userId` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (23,'Hello!',6,1,1,'2022-04-08 11:19:02','2022-04-08 11:18:38',NULL),(24,'Cool!',7,1,1,'2022-04-08 11:19:04','2022-04-08 11:18:47',NULL);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'The Irishman','In a nursing home, a very elderly man named Frank Sheeran remembers his life. In the 1950s, he worked as a simple truck driver, did not want to be a gangster at all and thought that painters were those who painted houses when he accidentally met crime boss Russell Bufalino. He took the guy under his wing, started giving him small assignments, and now Frank, nicknamed the Irishman, is working as a painter himself, a mafia killer. Soon Russell sets him up with the famous union leader Jimmy Hoffa.','2022-03-31 19:04:35','2022-03-31 08:10:13',NULL),(2,1,'The Wolf of Wall Street','1987. Jordan Belfort becomes a broker in a successful investment bank. Soon the bank closes after the sudden collapse of the Dow Jones index. On the advice of his wife Teresa, Jordan gets a job in a small institution dealing with small stocks. His persistent style of communication with clients and innate charisma quickly bears fruit. He meets Donnie\'s housemate, a merchant, who immediately finds a common language with Jordan and decides to open his own company with him. As employees, they hire several friends of Belfort, his father Max, and call the company Stratton Oakmont...','2022-04-01 11:30:49','2022-04-01 11:30:49',NULL),(3,1,'Interstellar','When drought, dust storms and the extinction of plants lead humanity to a food crisis, a team of researchers and scientists goes through a wormhole (which supposedly connects the regions of space-time over a long distance) on a journey to surpass the previous limitations for human space travel and find a planet with suitable conditions for humanity.','2022-04-01 11:32:08','2022-04-01 11:32:08',NULL),(4,1,'The Gentlemen','One smart American had been dealing drugs since his student years, and now he came up with a scheme for illegal enrichment using the estates of the impoverished English aristocracy and got rich very well on it. Another sneaky journalist comes to Ray, the American\'s right—hand man, and offers him to buy a screenplay detailing the crimes of his boss with the participation of other representatives of the London criminal world - a Jewish partner, the Chinese diaspora, black athletes and even a Russian oligarch.','2022-04-01 11:33:18','2022-04-01 11:33:18',NULL),(5,1,'The Godfather','A crime saga that tells the story of the New York Sicilian mafia family Corleone. The film covers the period 1945-1955.\r\n\r\nThe head of the family, Don Vito Corleone, marries his daughter. At this time, his beloved son Michael returns from the Second World War. Michael, a war hero, the pride of the family, does not express a desire to engage in a cruel family business. Don Corleone conducts business according to the old rules, but different times are coming, and there are people who want to change the established order. An attempt is being made on Don Corleone.','2022-04-01 11:36:54','2022-04-01 11:36:54',NULL),(6,1,'Wrath of Man','Trucks of the Los Angeles collection company Forticom Security are often attacked, and during the next robbery, both guards are killed. After a while, a strong, laconic Briton, Patrick Hill, gets a job in the company. He gets the nickname H from the boss and, having passed fitness, shooting and driving tests close to the required minimum, goes on his first assignment. Soon armed robbers try to rob his truck, but H. alone deals with the whole gang and becomes a hero. It seems that the fame and respect of colleagues does not interest him at all, because he pursues his goals.','2022-04-01 11:37:40','2022-04-01 11:37:40',NULL),(7,1,'Scarface','In the spring of 1980, the port of Mariel Harbor was opened, and thousands of Cuban refugees rushed to the United States in search of the American Dream. One of them found her on the sunlit streets of Miami. Wealth, power and passion surpassed even his most incredible dreams. His name was Tony Montana. The world remembered him by another name - \"Scarface\"...','2022-04-01 11:38:13','2022-04-01 11:38:13',NULL),(8,1,'Lock, Stock and Two Smoking Barrels','Four young guys have accumulated 25 thousand pounds each, so that one of them could play cards with an experienced sharpie and a seasoned criminal known by the nickname Harry the Axe. The guy eventually lost 500 thousand, he was given a week to pay the debt. Otherwise, he and his ','2022-04-01 12:07:53','2022-04-01 11:40:01',NULL),(9,1,'Goodfellas','The story is about Henry Hill, an aspiring gangster engaged in robberies with accomplices Jimi Conway and Tommy DeVito, who easily kill anyone who gets in their way.','2022-04-08 11:20:44','2022-04-01 11:42:03',NULL),(20,1,'Casino','No one can compare with Sam Rothstein. No one knows how to make money like him. No one knows how to work as selflessly and accurately as hardworking Sam. For his undeniable advantages, Rothstein received the nickname Ace. And that s why the mafia bosses decided to assign Asa to run a huge luxury casino in Las Vegas. And so that no one interfered with Sam s work, the mafiosi sent Rothstein s childhood friend Nikki Santoro, an inveterate bandit and ruthless thug, after the Ace.','2022-04-11 16:11:41','2022-04-11 16:11:41',NULL),(21,1,'The Sopranos','The daily life of a modern Godfather: his thoughts are swift, his actions are decisive, and his humor is black. Mafia boss of North Jersey Tony Soprano successfully copes with the problems of Family. But my own family has let me down a little: the children have strayed from the hands, the marriage is under threat, the mother is sawing. He hopes for the help of a psychotherapist, but how can he tell about all his problems if he is bound by omerta — a vow of silence, which cannot be broken on pain of death?','2022-04-17 09:38:01','2022-04-11 16:16:57',NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin',NULL),(2,'Content-manager',NULL),(3,'Registered',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `static_pages`
--

DROP TABLE IF EXISTS `static_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `static_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `static_pages`
--

LOCK TABLES `static_pages` WRITE;
/*!40000 ALTER TABLE `static_pages` DISABLE KEYS */;
INSERT INTO `static_pages` VALUES (1,'dasd','asdasdasd');
/*!40000 ALTER TABLE `static_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribes`
--

DROP TABLE IF EXISTS `subscribes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscribes` (
  `subscriber_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  KEY `subscriber_id_idx` (`subscriber_id`),
  KEY `author_id_idx` (`author_id`),
  CONSTRAINT `author_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `subscriber_id` FOREIGN KEY (`subscriber_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribes`
--

LOCK TABLES `subscribes` WRITE;
/*!40000 ALTER TABLE `subscribes` DISABLE KEYS */;
INSERT INTO `subscribes` VALUES (18,1,'2022-04-08 11:33:35','2022-04-08 11:33:35',NULL),(1,18,'2022-04-18 15:43:44','2022-04-18 15:43:44',NULL),(1,19,'2022-04-18 15:43:53','2022-04-18 15:43:53',NULL);
/*!40000 ALTER TABLE `subscribes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id_idx` (`role_id`),
  CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Nikita','Babichenko','','babichenkona@gmail.com','babichenkona','$2y$10$xvU6/ewrQtd3RXwQZfIlw.wlMLZ6MsM/oIaSylYOTQC6wEpDz1s52','2022-03-30 13:46:34','2022-04-17 19:25:18',NULL),(18,3,'Dima','Bamberg','','schokk@bamberg.de','schokk','$2y$10$xvU6/ewrQtd3RXwQZfIlw.wlMLZ6MsM/oIaSylYOTQC6wEpDz1s52','2022-03-31 07:49:35','2022-04-11 16:08:35',NULL),(19,3,'Miron','Fedorov','123','norimyxxxo@bm.ru','norimyxxxo','$2y$10$xvU6/ewrQtd3RXwQZfIlw.wlMLZ6MsM/oIaSylYOTQC6wEpDz1s52','2022-04-01 14:13:29','2022-04-17 09:37:30',NULL),(20,3,'asd','asd','','asdasdasda@eqweqsd','asdasdasda','$2y$10$b/IHDxbadHQ1s9H9mBkPr.OeBu8WFrLOt/IUhL2kJ6eq0/XwnuRNa','2022-04-17 09:30:05','2022-04-17 09:30:05',NULL),(21,3,'Nikita','123Babichenko','','yep@flase','yep','$2y$10$H6YFJToz2rLTNW11BNrGJuyvo3vmoDoJgl7HLF/vlBEODPM6D1PqK','2022-04-17 09:39:16','2022-04-17 09:41:07',NULL),(22,3,'Roma','Belkov','','belkov@yandex.ru','belkov','$2y$10$Kco93KCWDQjJ22jGEQZLv.OZNuFKLxRg9K449cqiixm4yCyXzD4iq','2022-04-18 14:09:17','2022-04-18 14:09:37',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-18 18:44:45
