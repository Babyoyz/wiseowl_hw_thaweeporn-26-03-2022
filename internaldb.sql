-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: internaldb
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
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FristName` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LastName` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Position` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `UpdatedDatte` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางข้อมูลพนักงาน	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'Thaweeporn','Areepun','Programmer','2022-03-25 20:37:40','2022-03-25 13:37:47'),(2,'Oilza','BabaOhbaba','LeadProgrammer','2022-03-26 07:04:35',NULL),(3,'สมศรี','มีความสามารถ','HR','2022-03-26 08:46:43',NULL);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hardwares`
--

DROP TABLE IF EXISTS `hardwares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hardwares` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `HwID` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Namehardware` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `UpDateDated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `borrowerID` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statushd` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateBy` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hardwares`
--

LOCK TABLES `hardwares` WRITE;
/*!40000 ALTER TABLE `hardwares` DISABLE KEYS */;
INSERT INTO `hardwares` VALUES (1,'A0001','Mousepad','อุปกรณ์คอมพิวเตอร์','Acer','2022-03-25 20:45:17','2022-03-27 05:03:57',NULL,NULL,'admin'),(2,'A0002','Notebook','อุปกรณ์คอมพิวเตอร์','Lenovo','2022-03-26 09:36:24','2022-03-27 05:03:57','1','1','admin'),(3,'A0003','คอมพิวเตอร์','อุปกรณ์คอมพิวเตอร์','ASUS','2022-03-26 10:38:21','2022-03-27 09:00:40','3','1','admin'),(4,'A0004','คอมพิวเตอร์','อุปกรณ์คอมพิวเตอร์','toshiba','2022-03-26 10:39:46','2022-03-27 05:03:57','2','1','admin'),(16,'A0005','เมาส์','อุปกรณ์คอมพิวเตอร์','logitech','2022-03-27 14:00:05','2022-03-27 09:04:06','3','3','admin'),(17,'A0071','logitech super light','อุปกรณ์คอมพิวเตอร์','logitech','2022-03-27 14:01:06','2022-03-27 09:03:01',NULL,NULL,'admin'),(18,'A2500','keyboard','อุปกรณ์คอมพิวเตอร์','logitech','2022-03-27 14:04:36','2022-03-27 08:55:29',NULL,NULL,'admin'),(19,'X0024','พัดลม','อื่นๆ','toshiba','2022-03-27 14:10:23','2022-03-27 07:10:41',NULL,NULL,'admin'),(20,'X1125','แอร์','แอร์','samsung','2022-03-27 14:12:58','2022-03-27 08:52:07',NULL,NULL,'admin');
/*!40000 ALTER TABLE `hardwares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hw_activities`
--

DROP TABLE IF EXISTS `hw_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hw_activities` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `hardwareID` int(11) DEFAULT NULL,
  `EmployeeID` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อผู้ยืมอุปกรณ์',
  `typeactivities` int(11) DEFAULT NULL COMMENT '1 ยืม\n\n2 คืน\n\n3 ส่งซ่อม',
  `CreatedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `CreateBy` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='เก็บข้อมูลหรือส่งซ่อมอุปกรณ์';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hw_activities`
--

LOCK TABLES `hw_activities` WRITE;
/*!40000 ALTER TABLE `hw_activities` DISABLE KEYS */;
INSERT INTO `hw_activities` VALUES (1,1,'1',2,'2022-03-25 20:45:54',''),(2,1,'2',1,'2022-03-25 20:46:11',''),(3,2,'1',2,'2022-03-25 22:08:01',''),(4,1,'2',3,'2022-03-25 22:10:11',''),(5,2,'1',3,'2022-03-25 22:10:18',''),(18,2,'1',1,'2022-03-27 09:27:13',NULL),(19,4,'3',1,'2022-03-27 09:30:57',NULL),(20,4,'3',2,'2022-03-27 09:31:48',NULL),(21,4,'2',1,'2022-03-27 09:35:11',NULL),(23,17,'1',1,'2022-03-27 14:04:57',NULL),(24,20,'1',1,'2022-03-27 14:20:03',NULL),(25,18,'1',3,'2022-03-27 14:30:05',NULL),(26,20,'1',3,'2022-03-27 15:52:01',NULL),(27,3,'3',1,'2022-03-27 16:00:40',NULL),(28,16,'3',3,'2022-03-27 16:04:06',NULL);
/*!40000 ALTER TABLE `hw_activities` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-27 16:07:07
