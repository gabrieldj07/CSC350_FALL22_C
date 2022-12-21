CREATE DATABASE  IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mydb`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb
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
-- Table structure for table `confirmation`
--

DROP TABLE IF EXISTS `confirmation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `confirmation` (
  `Uid` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `Unitno` varchar(200) DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `DateC` date DEFAULT NULL,
  `Days` varchar(20) DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  PRIMARY KEY (`Uid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `confirmation`
--

LOCK TABLES `confirmation` WRITE;
/*!40000 ALTER TABLE `confirmation` DISABLE KEYS */;
INSERT INTO `confirmation` VALUES (1,'jeremy','3A','Jeremy Noel','2022-12-18','Sunday','22:00:00','23:59:59'),(2,'noor','1A','Noor Habid','2022-12-18','Sunday','20:00:00','21:59:59');
/*!40000 ALTER TABLE `confirmation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dates`
--

DROP TABLE IF EXISTS `dates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dates` (
  `Uid` int unsigned NOT NULL AUTO_INCREMENT,
  `DateC` date DEFAULT NULL,
  `id` int DEFAULT NULL,
  PRIMARY KEY (`Uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dates`
--

LOCK TABLES `dates` WRITE;
/*!40000 ALTER TABLE `dates` DISABLE KEYS */;
INSERT INTO `dates` VALUES (1,'2022-12-18',7);
/*!40000 ALTER TABLE `dates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `daysname`
--

DROP TABLE IF EXISTS `daysname`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `daysname` (
  `Uid` int unsigned NOT NULL AUTO_INCREMENT,
  `DateC` date DEFAULT NULL,
  `Days` varchar(20) DEFAULT NULL,
  `id` int DEFAULT NULL,
  PRIMARY KEY (`Uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daysname`
--

LOCK TABLES `daysname` WRITE;
/*!40000 ALTER TABLE `daysname` DISABLE KEYS */;
INSERT INTO `daysname` VALUES (1,'2022-12-18','Sunday',7);
/*!40000 ALTER TABLE `daysname` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timeslots`
--

DROP TABLE IF EXISTS `timeslots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timeslots` (
  `Uid` int unsigned NOT NULL AUTO_INCREMENT,
  `DateC` date DEFAULT NULL,
  `Days` varchar(20) DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `id` int DEFAULT NULL,
  PRIMARY KEY (`Uid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timeslots`
--

LOCK TABLES `timeslots` WRITE;
/*!40000 ALTER TABLE `timeslots` DISABLE KEYS */;
INSERT INTO `timeslots` VALUES (1,'2022-12-18','Sunday','00:00:00','01:59:59',7),(2,'2022-12-18','Sunday','02:00:00','03:59:59',7),(3,'2022-12-18','Sunday','04:00:00','05:59:59',7),(4,'2022-12-18','Sunday','06:00:00','07:59:59',7),(5,'2022-12-18','Sunday','08:00:00','09:59:59',7),(6,'2022-12-18','Sunday','10:00:00','11:59:59',7),(7,'2022-12-18','Sunday','12:00:00','13:59:59',7),(8,'2022-12-18','Sunday','14:00:00','15:59:59',7),(9,'2022-12-18','Sunday','16:00:00','17:59:59',7),(10,'2022-12-18','Sunday','18:00:00','19:59:59',7);
/*!40000 ALTER TABLE `timeslots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `UnitNo` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'noor','good123','Noor Habid','1A'),(2,'gabriel','summer123','Gabriel De jesus','2A'),(3,'jeremy','winter123','Jeremy Noel','3A'),(4,'david','bad123','David Jams','4A'),(5,'ava','spring123','Ava Ratch','5A'),(6,'ally','keyboard','Ally Aaggard','6A'),(7,'barlow','computer123','Barlow Martinez','7A'),(8,'liam','world123','liam Habid','8A'),(9,'noah','oldnoah','Noah Brown','9A'),(10,'xena','rose123','Xena Nancy','10A'),(11,'benjamin','jamingod','Benjamin Jones','11A'),(12,'mason','son123','Mason Garcia','12A'),(13,'logan','ganwood123','Logan Paul','13A'),(14,'oliver','vero123','Oliver Taylor','14A'),(15,'jacob','cobbed123','Jacob Thomas','15A'),(16,'sophia','littlespy2','Sophia Hernandez','16A'),(17,'ella','notella123','Ella Miller','17A'),(18,'crystal','google123','Crystal White','18A'),(19,'arianna','grande123','Arianna Grande','19A'),(20,'amelia','liame1','Amelia Moore','20A');
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

-- Dump completed on 2022-12-18 20:17:14
