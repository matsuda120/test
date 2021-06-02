-- MySQL dump 10.16  Distrib 10.2.36-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: kensyu_develop
-- ------------------------------------------------------
-- Server version	10.2.36-MariaDB

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
-- Table structure for table `fishing_results`
--

DROP TABLE IF EXISTS `fishing_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fishing_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fishing_date` date NOT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `weather_id` int(11) DEFAULT NULL,
  `temperature` decimal(3,1) DEFAULT NULL,
  `water_temperature` decimal(3,1) DEFAULT NULL,
  `prefecture_id` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `spot` varchar(50) NOT NULL,
  `water_depth` int(3) unsigned DEFAULT NULL,
  `water_depth_unit` varchar(2) DEFAULT NULL,
  `fish_type` varchar(25) NOT NULL,
  `fish_caught_time` time DEFAULT NULL,
  `length` decimal(3,1) unsigned DEFAULT NULL,
  `length_unit` varchar(2) DEFAULT NULL,
  `weight` decimal(3,1) unsigned DEFAULT NULL,
  `weight_unit` varchar(2) DEFAULT NULL,
  `quantity` int(3) unsigned DEFAULT NULL,
  `fishing_type_id` int(11) DEFAULT NULL,
  `lure_feed_name` varchar(25) DEFAULT NULL,
  `lure_feed` varchar(5) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `weather_key` (`weather_id`),
  KEY `prefecture_key` (`prefecture_id`),
  KEY `fishing_type_key` (`fishing_type_id`),
  KEY `user_key` (`user_id`),
  CONSTRAINT `fishing_type_key` FOREIGN KEY (`fishing_type_id`) REFERENCES `fishing_types` (`id`),
  CONSTRAINT `prefecture_key` FOREIGN KEY (`prefecture_id`) REFERENCES `prefectures` (`id`),
  CONSTRAINT `user_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `weather_key` FOREIGN KEY (`weather_id`) REFERENCES `weathers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fishing_results`
--

LOCK TABLES `fishing_results` WRITE;
/*!40000 ALTER TABLE `fishing_results` DISABLE KEYS */;
INSERT INTO `fishing_results` VALUES (1,'2021-05-21','10:00:00','13:00:00',1,15.0,10.0,4,'半田市美原町','亀井海岸',80,'cm','サケ','12:30:00',50.1,'cm',99.0,'g',1,1,'エビ','（えさ）','久しぶりの海釣り。天気も良く、気温も丁度良い。一匹目が釣れるまで時間を要したが、結果２種３匹。',1,'2021-06-01 16:28:46','2021-06-01 16:28:46');
/*!40000 ALTER TABLE `fishing_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fishing_types`
--

DROP TABLE IF EXISTS `fishing_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fishing_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(15) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fishing_types`
--

LOCK TABLES `fishing_types` WRITE;
/*!40000 ALTER TABLE `fishing_types` DISABLE KEYS */;
INSERT INTO `fishing_types` VALUES (1,'船釣り','2021-06-01 16:05:22','2021-06-01 16:05:22'),(2,'堤防釣り','2021-06-01 16:05:22','2021-06-01 16:05:22'),(3,'磯釣り','2021-06-01 16:05:22','2021-06-01 16:05:22'),(4,'釣り堀','2021-06-01 16:05:22','2021-06-01 16:05:22'),(5,'渓流','2021-06-01 16:05:22','2021-06-01 16:05:22'),(6,'河川','2021-06-01 16:05:22','2021-06-01 16:05:22'),(7,'湖沼/池','2021-06-01 16:05:22','2021-06-01 16:05:22'),(8,'その他','2021-06-01 16:05:22','2021-06-01 16:05:22');
/*!40000 ALTER TABLE `fishing_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phinxlog`
--

LOCK TABLES `phinxlog` WRITE;
/*!40000 ALTER TABLE `phinxlog` DISABLE KEYS */;
/*!40000 ALTER TABLE `phinxlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prefectures`
--

DROP TABLE IF EXISTS `prefectures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prefectures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(5) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prefectures`
--

LOCK TABLES `prefectures` WRITE;
/*!40000 ALTER TABLE `prefectures` DISABLE KEYS */;
INSERT INTO `prefectures` VALUES (1,'東京都','2021-06-01 16:02:03','2021-06-01 16:02:03'),(2,'神奈川県','2021-06-01 16:02:03','2021-06-01 16:02:03'),(3,'大阪府','2021-06-01 16:02:03','2021-06-01 16:02:03'),(4,'愛知県','2021-06-01 16:02:03','2021-06-01 16:02:03'),(5,'福岡県','2021-06-01 16:02:03','2021-06-01 16:02:03');
/*!40000 ALTER TABLE `prefectures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(10) NOT NULL,
  `name` varchar(15) NOT NULL,
  `age` int(3) DEFAULT NULL,
  `fishing_history` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'hogehoge','山田太郎',30,'1年5ヶ月','taro_yamada@itbook.com','1111',0,NULL,NULL),(2,'admin','管理者',51,'13年','admin@itbook.com','0000',0,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weathers`
--

DROP TABLE IF EXISTS `weathers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `weathers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weathers`
--

LOCK TABLES `weathers` WRITE;
/*!40000 ALTER TABLE `weathers` DISABLE KEYS */;
INSERT INTO `weathers` VALUES (1,'晴れ','2021-06-01 15:57:44','2021-06-01 15:57:44'),(2,'曇り','2021-06-01 15:58:14','2021-06-01 15:58:14'),(3,'雨','2021-06-01 15:58:58','2021-06-01 15:58:58'),(4,'雪','2021-06-01 15:58:58','2021-06-01 15:58:58');
/*!40000 ALTER TABLE `weathers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-02  4:16:00
