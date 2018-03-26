
CREATE DATABASE  IF NOT EXISTS `burger` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `burger`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: burger
-- ------------------------------------------------------
-- Server version	5.7.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(255) DEFAULT NULL,
  `home` int(8) DEFAULT NULL,
  `housing` int(8) DEFAULT NULL,
  `apartment` int(8) DEFAULT NULL,
  `floor` int(8) DEFAULT NULL,
  `comment` text,
  `money` int(8) DEFAULT NULL,
  `callback` int(8) DEFAULT NULL,
  `user_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,'Комсомольская',111,1,1,1,'Вкусняшки!!',1,1,1),(2,'Комсомольская',111,1,1,1,'Вкусняшки!!',1,1,1),(3,'Комсомольская',133,2,3,1,'Вкусняшки!!',0,0,2),(4,'Комсомольская',133,2,3,1,'Вкусняшки!!',1,1,2),(5,'Комсомольская',122,2,4,1,'Вкусняшки!!',1,1,2),(6,'Комсомольская',122,2,4,1,'Вкусняшки!!',1,0,2),(7,'Комсомольская',122,2,4,1,'Вкусняшки!!',1,0,2),(8,'Комсомольская',122,2,4,1,'Вкусняшки!!',0,0,2),(9,'Комсомольская',122,2,4,1,'Вкусняшки!!',0,0,3),(10,'Комсомольская',122,2,4,1,'Вкусняшки!!',0,0,3),(11,'Комсомольская',122,2,4,1,'Вкусняшки!!',0,0,3),(12,'Комсомольская',122,2,4,1,'Вкусняшки!!',1,1,3),(13,'Комсомольская',122,2,4,1,'Вкусняшки!!',1,1,4),(14,'Улица',123,1,7,3,'Вкусняшки!!',1,0,5),(15,'Улица',333,2,12,5,'Вкусняшки!!',0,1,6),(16,'Улица',333,2,12,5,'Вкусняшки!!',0,1,6);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Василий','+7 (111) 111 11 11','company1@yandex.ru'),(2,'Тимофей','+7 (111) 111 11 12','company2@yandex.ru'),(3,'Мария','+7 (111) 111 11 13','company3@yandex.ru'),(4,'Владимир','+7 (111) 111 11 17','company4@yandex.ru'),(5,'Руслан','+7 (111) 111 11 18','company5@yandex.ru'),(6,'Людмила','+7 (111) 111 11 19','company8@yandex.ru');
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

-- Dump completed on 2018-03-11 18:00:24