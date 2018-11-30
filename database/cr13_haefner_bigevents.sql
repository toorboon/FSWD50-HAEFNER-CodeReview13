CREATE DATABASE  IF NOT EXISTS `cr13_marco_haefner_bigevents` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cr13_marco_haefner_bigevents`;
-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: cr13_marco_haefner_bigevents
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.36-MariaDB

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
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `description` varchar(2555) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(2555) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(2555) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (3,'Vini Vici pres. by Prater Dome','2018-12-14 23:00:00','Vini Vici changed the festival sound in the last 2 years completely! Now is your chance to see and hear them!','/img/vini.jpg',756,'vini.gmail.com','0043157849333','Prater Dome 7 Riesenradplatz, 1020 Wien','https://www.youtube.com/watch?v=yo4pmauhugo','Music','2018-11-30 20:57:40'),(4,'AKIBA Pass Festival 2019','2019-02-10 09:00:00','Next year you can be delighted to have again a lot of anime movies just for your service! Come and get them!','/img/anime.jpg',45,'akibat@gmail.com','00431467857634','UCI Kinowelt Millenium City, 66 Wehlistraße, 1200 Wien','www.akibapassfestival.de','Movie','2018-11-30 20:01:54'),(5,'WeAreDevelopers AI Congress Vienna','2018-12-04 08:00:00','The Congress will focus on human-machine interactions and will bring together two sides: The academy and the industry. We will try to answer questions such as: Can we trust computer decisions?','/img/ai.jpg',34,'developers@gmail.com','004315789478','Hofburg Palace  Heldenplatz  1010 Vienna','https://www.facebook.com/wearedevelopers','Theater','2018-11-30 20:08:57'),(6,'The Magic Flute','2013-01-01 00:00:00','This famous opera by Mozart is about the exciting story of the young Prince Tamino sent by the Queen of the Night to rescue her daughter Pamina, who was abducted by the Sovereign Sarastro. Tamino receives a Magic Flute, Papageno - the Birdcatcher - a magical carillon. Many tests have to be passed until Papageno gets his Papagena and Prince Tamino can marry his Princess Pamina.','/img/zauber.jpg',78,'marionette@gmail.com','004318976389','Marionettentheater Schloss Schönbrunn  Hofratstrakt  1130 Wien','www.marionette.com','Music','2018-11-30 20:17:56');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-30 21:02:43
