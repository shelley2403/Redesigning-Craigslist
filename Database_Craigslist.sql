CREATE DATABASE  IF NOT EXISTS `craigslist_data` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `craigslist_data`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: craigslist_data
-- ------------------------------------------------------
-- Server version	5.6.14

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
-- Table structure for table `photos_postdetails`
--

DROP TABLE IF EXISTS `photos_postdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos_postdetails` (
  `photoId` int(11) NOT NULL AUTO_INCREMENT,
  `photoPath` varchar(45) NOT NULL,
  `postId` int(11) NOT NULL,
  PRIMARY KEY (`photoId`),
  KEY `fk_photos_postdetails_postdetails_idx` (`postId`),
  CONSTRAINT `fk_photos_postdetails_postdetails` FOREIGN KEY (`postId`) REFERENCES `postdetails` (`postId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos_postdetails`
--

LOCK TABLES `photos_postdetails` WRITE;
/*!40000 ALTER TABLE `photos_postdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `photos_postdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postdetails`
--

DROP TABLE IF EXISTS `postdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postdetails` (
  `postId` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(45) NOT NULL,
  `subCategory` varchar(45) NOT NULL,
  `postTitle` varchar(45) NOT NULL,
  `postDetails` varchar(1000) NOT NULL,
  `zipcode` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `state` varchar(45) NOT NULL,
  `locality` varchar(45) NOT NULL,
  `Price` int(11) NOT NULL,
  `Date` varchar(15) NOT NULL,
  `userId` int(11) NOT NULL,
  `postRegNo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`postId`),
  KEY `fk_userID_postdetails_idx` (`userId`),
  CONSTRAINT `fk_userID_postdetails` FOREIGN KEY (`userId`) REFERENCES `usertable` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postdetails`
--

LOCK TABLES `postdetails` WRITE;
/*!40000 ALTER TABLE `postdetails` DISABLE KEYS */;
INSERT INTO `postdetails` VALUES (1,'ForSale','Electronics','iPhone','iPhone for sale','02120','United States','Massachusetts','Boston',100,'04/22/2014',2,'1231211');
/*!40000 ALTER TABLE `postdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertable`
--

DROP TABLE IF EXISTS `usertable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usertable` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `emailAddress` varchar(45) NOT NULL,
  `fullName` varchar(45) NOT NULL,
  `contactNumber` varchar(45) DEFAULT NULL,
  `roles` varchar(15) NOT NULL,
  `sellerInformation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertable`
--

LOCK TABLES `usertable` WRITE;
/*!40000 ALTER TABLE `usertable` DISABLE KEYS */;
INSERT INTO `usertable` VALUES (1,'admin','admin','admin@gmail.com','Admin','9871231123','admin','admin'),(2,'madhav','khosla','madhav@gmail.com','Madhav Khosla','7865431234','users','users');
/*!40000 ALTER TABLE `usertable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'craigslist_data'
--

--
-- Dumping routines for database 'craigslist_data'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-23 23:12:33
