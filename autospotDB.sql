-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: gg
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `Color`
--

DROP TABLE IF EXISTS `Color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Color` (
  `Name` varchar(255) DEFAULT NULL,
  `id_Color` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_Color`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Color`
--

LOCK TABLES `Color` WRITE;
/*!40000 ALTER TABLE `Color` DISABLE KEYS */;
INSERT INTO `Color` VALUES ('Balta',1),('Sidabrine',2),('Juoda',3);
/*!40000 ALTER TABLE `Color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ContactInfo`
--

DROP TABLE IF EXISTS `ContactInfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ContactInfo` (
  `phoneNum` varchar(255) NOT NULL,
  `EMail` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `fk_Townsid_Towns` int(11) NOT NULL,
  `id_ContactInfo` int(11) NOT NULL AUTO_INCREMENT,
  `fk_Countiresid_Countries` int(11) DEFAULT '1',
  PRIMARY KEY (`id_ContactInfo`),
  KEY `has` (`fk_Townsid_Towns`),
  CONSTRAINT `has` FOREIGN KEY (`fk_Townsid_Towns`) REFERENCES `towns` (`id_Towns`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ContactInfo`
--

LOCK TABLES `ContactInfo` WRITE;
/*!40000 ALTER TABLE `ContactInfo` DISABLE KEYS */;
INSERT INTO `ContactInfo` VALUES ('862480441','biliutavicius.lukas@gmail.com','Lukas',2,13,1);
/*!40000 ALTER TABLE `ContactInfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CoolingTypes`
--

DROP TABLE IF EXISTS `CoolingTypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CoolingTypes` (
  `id_CoolingTypes` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_CoolingTypes`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CoolingTypes`
--

LOCK TABLES `CoolingTypes` WRITE;
/*!40000 ALTER TABLE `CoolingTypes` DISABLE KEYS */;
INSERT INTO `CoolingTypes` VALUES (1,'oru'),(2,'skysciu'),(3,'misrus'),(4,'kita');
/*!40000 ALTER TABLE `CoolingTypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Countries`
--

DROP TABLE IF EXISTS `Countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Countries` (
  `Name` varchar(255) NOT NULL,
  `id_Countries` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_Countries`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Countries`
--

LOCK TABLES `Countries` WRITE;
/*!40000 ALTER TABLE `Countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `Countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Defect`
--

DROP TABLE IF EXISTS `Defect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Defect` (
  `Name` varchar(255) DEFAULT NULL,
  `id_Defect` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_Defect`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Defect`
--

LOCK TABLES `Defect` WRITE;
/*!40000 ALTER TABLE `Defect` DISABLE KEYS */;
INSERT INTO `Defect` VALUES ('Dauztas',1),('Skendes',2),('Be defektu',3);
/*!40000 ALTER TABLE `Defect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EngineTypes`
--

DROP TABLE IF EXISTS `EngineTypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EngineTypes` (
  `id_EngineTypes` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_EngineTypes`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EngineTypes`
--

LOCK TABLES `EngineTypes` WRITE;
/*!40000 ALTER TABLE `EngineTypes` DISABLE KEYS */;
INSERT INTO `EngineTypes` VALUES (1,'dvitaktis'),(2,'keturtaktis'),(3,'kita');
/*!40000 ALTER TABLE `EngineTypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FuelTypes`
--

DROP TABLE IF EXISTS `FuelTypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FuelTypes` (
  `id_FuelTypes` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_FuelTypes`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FuelTypes`
--

LOCK TABLES `FuelTypes` WRITE;
/*!40000 ALTER TABLE `FuelTypes` DISABLE KEYS */;
INSERT INTO `FuelTypes` VALUES (1,'benzinas'),(2,'dyzelinas');
/*!40000 ALTER TABLE `FuelTypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GearBoxes`
--

DROP TABLE IF EXISTS `GearBoxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GearBoxes` (
  `id_GearBoxes` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_GearBoxes`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GearBoxes`
--

LOCK TABLES `GearBoxes` WRITE;
/*!40000 ALTER TABLE `GearBoxes` DISABLE KEYS */;
INSERT INTO `GearBoxes` VALUES (1,'automatine'),(2,'mechanine');
/*!40000 ALTER TABLE `GearBoxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Make`
--

DROP TABLE IF EXISTS `Make`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Make` (
  `Name` varchar(255) NOT NULL,
  `id_Make` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_Make`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Make`
--

LOCK TABLES `Make` WRITE;
/*!40000 ALTER TABLE `Make` DISABLE KEYS */;
INSERT INTO `Make` VALUES ('Opel',1);
/*!40000 ALTER TABLE `Make` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Message`
--

DROP TABLE IF EXISTS `Message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Message` (
  `Text` text,
  `id_Message` int(11) NOT NULL AUTO_INCREMENT,
  `fk_Userid` int(11) NOT NULL,
  PRIMARY KEY (`id_Message`),
  KEY `has1` (`fk_Userid`),
  CONSTRAINT `has1` FOREIGN KEY (`fk_Userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Message`
--

LOCK TABLES `Message` WRITE;
/*!40000 ALTER TABLE `Message` DISABLE KEYS */;
/*!40000 ALTER TABLE `Message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Model`
--

DROP TABLE IF EXISTS `Model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Model` (
  `Name` varchar(255) NOT NULL,
  `id_Model` int(11) NOT NULL AUTO_INCREMENT,
  `fk_Makeid_Make` int(11) NOT NULL,
  PRIMARY KEY (`id_Model`),
  KEY `has2` (`fk_Makeid_Make`),
  CONSTRAINT `has2` FOREIGN KEY (`fk_Makeid_Make`) REFERENCES `Make` (`id_Make`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Model`
--

LOCK TABLES `Model` WRITE;
/*!40000 ALTER TABLE `Model` DISABLE KEYS */;
INSERT INTO `Model` VALUES ('Astra',1,1);
/*!40000 ALTER TABLE `Model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MotoOrder`
--

DROP TABLE IF EXISTS `MotoOrder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MotoOrder` (
  `engineCapacity` double(11,2) DEFAULT NULL,
  `enginePower` double(11,2) DEFAULT NULL,
  `manufactorYear` int(11) DEFAULT NULL,
  `manufactorMonth` int(11) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `exportPrice` int(11) DEFAULT NULL,
  `distanceTraveled` int(11) DEFAULT NULL,
  `isNew` tinyint(1) DEFAULT NULL,
  `techInspValidTo` int(11) DEFAULT NULL,
  `Weight` double(11,2) DEFAULT NULL,
  `Euro` int(11) DEFAULT NULL,
  `Description` text,
  `coolingType` int(11) DEFAULT NULL,
  `fuelType` int(11) DEFAULT NULL,
  `Gearbox` int(11) DEFAULT '1',
  `engineType` int(11) DEFAULT NULL,
  `id_MotoOrder` int(11) NOT NULL AUTO_INCREMENT,
  `fk_Userid` int(11) NOT NULL,
  `fk_MotoTypeid_MotoType` int(11) NOT NULL,
  `fk_Colorid_Color` int(11) NOT NULL,
  `fk_ContactInfoid_ContactInfo` int(11) NOT NULL,
  `fk_Modelid_Model` int(11) NOT NULL,
  `fk_Defectid_Defect` int(11) NOT NULL,
  `tyreLeft` int(11) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_MotoOrder`),
  KEY `coolingType` (`coolingType`),
  KEY `fuelType` (`fuelType`),
  KEY `Gearbox` (`Gearbox`),
  KEY `engineType` (`engineType`),
  KEY `has3` (`fk_Userid`),
  CONSTRAINT `MotoOrder_ibfk_1` FOREIGN KEY (`coolingType`) REFERENCES `CoolingTypes` (`id_CoolingTypes`),
  CONSTRAINT `MotoOrder_ibfk_2` FOREIGN KEY (`fuelType`) REFERENCES `FuelTypes` (`id_FuelTypes`),
  CONSTRAINT `MotoOrder_ibfk_3` FOREIGN KEY (`Gearbox`) REFERENCES `GearBoxes` (`id_GearBoxes`),
  CONSTRAINT `MotoOrder_ibfk_4` FOREIGN KEY (`engineType`) REFERENCES `EngineTypes` (`id_EngineTypes`),
  CONSTRAINT `has3` FOREIGN KEY (`fk_Userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MotoOrder`
--

LOCK TABLES `MotoOrder` WRITE;
/*!40000 ALTER TABLE `MotoOrder` DISABLE KEYS */;
INSERT INTO `MotoOrder` VALUES (123.00,99.00,2019,1,1000,NULL,1235,0,2019,NULL,5,'Gerule auto eina nx',3,2,1,2,22,1,4,1,1,1,2,99,1),(1499.00,99.00,2017,3,1000,NULL,1235,0,2019,NULL,5,'Ziauriai gera masina as tau atsakau',4,1,1,2,23,3,1,1,14,1,3,99,1);
/*!40000 ALTER TABLE `MotoOrder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MotoType`
--

DROP TABLE IF EXISTS `MotoType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MotoType` (
  `Name` varchar(255) DEFAULT NULL,
  `id_MotoType` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_MotoType`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MotoType`
--

LOCK TABLES `MotoType` WRITE;
/*!40000 ALTER TABLE `MotoType` DISABLE KEYS */;
INSERT INTO `MotoType` VALUES ('Enduro',1),('Krosinis',2),('Keturatis',3),('Britva',4);
/*!40000 ALTER TABLE `MotoType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RecentSearches`
--

DROP TABLE IF EXISTS `RecentSearches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `RecentSearches` (
  `fk_usersid` int(11) NOT NULL,
  `makeID` int(11) DEFAULT NULL,
  `modelID` int(11) DEFAULT NULL,
  `pf` int(11) DEFAULT NULL,
  `pt` int(11) DEFAULT NULL,
  `yf` int(11) DEFAULT NULL,
  `yt` int(11) DEFAULT NULL,
  `ftid` int(11) DEFAULT NULL,
  `mtid` int(11) DEFAULT NULL,
  `id_RecentSearches` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_RecentSearches`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RecentSearches`
--

LOCK TABLES `RecentSearches` WRITE;
/*!40000 ALTER TABLE `RecentSearches` DISABLE KEYS */;
INSERT INTO `RecentSearches` VALUES (1,1,1,0,0,0,0,0,0,5),(1,1,1,0,0,0,0,0,0,6),(3,1,0,0,0,0,0,0,0,7),(3,1,0,0,0,0,0,0,4,8),(3,1,0,0,0,0,0,0,1,9),(3,0,0,0,0,0,0,0,0,10);
/*!40000 ALTER TABLE `RecentSearches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Lukas','biliutavicius.lukas@gmail.com',NULL,'$2y$10$039KywX2FOt7uk1JDmBiIebl8t1JFk2Hz3Mv6Rrk.Mno1iFX6SDxu','DtNbv0kwL27lewk1LJxPB7pSXegtSctv3QNOClKbXFWvzyN1dZB9Rn9sZreX','2019-09-28 05:19:26','2019-09-28 05:19:26'),(2,'Lukas','lukas2@gmail.com',NULL,'Lopaslopas',NULL,NULL,NULL),(3,'Lukas','admin@admin.com',NULL,'$2y$10$.lc/6qkBKbdoLn7etjFBNuJqgSuQXyhRZwUE6sqBompxjQ4/Cd/Cm',NULL,'2019-10-30 09:16:21','2019-10-30 09:16:21');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feature`
--

DROP TABLE IF EXISTS `feature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feature` (
  `id_Feature` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_Feature`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feature`
--

LOCK TABLES `feature` WRITE;
/*!40000 ALTER TABLE `feature` DISABLE KEYS */;
INSERT INTO `feature` VALUES (1,'4x4 varomi ratai'),(2,'Priekinis stiklas'),(3,'Sildomos sedynes'),(4,'Sildomi veidrodeliai'),(5,'Audio sistema');
/*!40000 ALTER TABLE `feature` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feature_motoorder`
--

DROP TABLE IF EXISTS `feature_motoorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feature_motoorder` (
  `fk_Featureid_Feature` int(11) NOT NULL,
  `fk_MotoOrderid_MotoOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feature_motoorder`
--

LOCK TABLES `feature_motoorder` WRITE;
/*!40000 ALTER TABLE `feature_motoorder` DISABLE KEYS */;
INSERT INTO `feature_motoorder` VALUES (1,22),(2,22),(5,22),(1,23),(3,23),(5,23);
/*!40000 ALTER TABLE `feature_motoorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderfiles`
--

DROP TABLE IF EXISTS `orderfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderfiles` (
  `id_orderfiles` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `fk_MotoOrderid_MotoOrder` int(11) NOT NULL,
  PRIMARY KEY (`id_orderfiles`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderfiles`
--

LOCK TABLES `orderfiles` WRITE;
/*!40000 ALTER TABLE `orderfiles` DISABLE KEYS */;
INSERT INTO `orderfiles` VALUES (5,'1569682308.jpg',22),(6,'1569682309.png',22),(7,'1571745012.png',23);
/*!40000 ALTER TABLE `orderfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `towns`
--

DROP TABLE IF EXISTS `towns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `towns` (
  `Name` varchar(255) NOT NULL,
  `id_Towns` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_Towns`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `towns`
--

LOCK TABLES `towns` WRITE;
/*!40000 ALTER TABLE `towns` DISABLE KEYS */;
INSERT INTO `towns` VALUES ('Kaunas',1),('Vilnius',2);
/*!40000 ALTER TABLE `towns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Lukas','biliutavicius.lukas@gmail.com',NULL,'$2y$10$039KywX2FOt7uk1JDmBiIebl8t1JFk2Hz3Mv6Rrk.Mno1iFX6SDxu','RTVsnYrDvM3Tegk2veiGtbb3Ui6MNNa5uIjCu4fPmnu0nqgA44ie3u1PmDQx','2019-09-28 08:19:26','2019-09-28 08:19:26'),(2,'Lopas','lopas@gmail.com',NULL,'$2y$10$arhB8OYQEgyG1eK34LEDa.RxEeAXdQdxeNj2ZBFKI90wa3NCqTEUy','xFP3CqAVCnrYokSQApT6ZBnyTM2PHLBSSEoLwwMA7YEF5VEQ14JVTXigMqNp','2019-09-28 11:26:11','2019-09-28 11:26:11'),(3,'Lukas','Lukas2@gmail.com',NULL,'$2y$10$9FXErcZpMV2RFB2XmUyUbO8MnSMCnqAnuynq.9RGxhzoMO.NSnRY6','UMNyDhFv59pAasxBfnnWhTvizMoxHiHT4rNbZkApa5nbHF26YFIIqTY6hybx','2019-10-22 08:48:38','2019-10-22 08:48:38');
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

-- Dump completed on 2019-10-30 17:38:01
