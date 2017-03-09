-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: kn_fsm
-- ------------------------------------------------------
-- Server version	5.5.54-0+deb8u1

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
-- Table structure for table `coaches`
--

DROP TABLE IF EXISTS `coaches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coaches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coach_fname` varchar(20) DEFAULT NULL,
  `coach_lname` varchar(20) DEFAULT NULL,
  `coach_rate` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coaches`
--

LOCK TABLES `coaches` WRITE;
/*!40000 ALTER TABLE `coaches` DISABLE KEYS */;
INSERT INTO `coaches` VALUES (1,'Dasha','Kabanova',30),(2,'Stephanie','Bardykin',35);
/*!40000 ALTER TABLE `coaches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ice_time`
--

DROP TABLE IF EXISTS `ice_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ice_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `ice_time` int(11) NOT NULL,
  `ice_cost` int(11) NOT NULL,
  `skate_type` int(11) DEFAULT NULL,
  `coach_time` int(11) DEFAULT NULL,
  `coach_id` int(11) DEFAULT NULL,
  `rink_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ice_time`
--

LOCK TABLES `ice_time` WRITE;
/*!40000 ALTER TABLE `ice_time` DISABLE KEYS */;
INSERT INTO `ice_time` VALUES (1,'2017-03-03',60,14,1,30,2,1),(2,'0000-00-00',60,14,1,30,2,1),(3,'2016-01-01',60,14,1,30,2,1),(4,'2016-01-01',60,14,1,30,2,1),(5,'2016-01-02',60,14,1,30,2,1),(6,'2016-01-02',60,14,1,35,2,1),(7,'2016-01-03',30,7,1,30,1,1),(8,'2016-01-03',60,12,1,0,0,1),(9,'2016-01-04',90,21,1,70,2,1),(10,'2016-01-05',120,10,1,0,0,2),(11,'2016-11-16',15,0,5,0,2,1),(12,'2017-03-08',60,15,6,30,2,1);
/*!40000 ALTER TABLE `ice_time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ice_type`
--

DROP TABLE IF EXISTS `ice_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ice_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ice_type`
--

LOCK TABLES `ice_type` WRITE;
/*!40000 ALTER TABLE `ice_type` DISABLE KEYS */;
INSERT INTO `ice_type` VALUES (1,'Free Style'),(2,'Public'),(3,'Coaching Session'),(4,'Competition'),(5,'Performance'),(6,'Club Ice');
/*!40000 ALTER TABLE `ice_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` varchar(30) DEFAULT NULL,
  `location_city` varchar(20) DEFAULT NULL,
  `location_state` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'Raleigh Ice Plex','Raleigh','NC'),(2,'Cleland Ice Rink','Fayetteville','NC');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-08 21:49:26
