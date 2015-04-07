-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: appstore
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

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
-- Table structure for table `AuthAssignment`
--

DROP TABLE IF EXISTS `AuthAssignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthAssignment`
--

LOCK TABLES `AuthAssignment` WRITE;
/*!40000 ALTER TABLE `AuthAssignment` DISABLE KEYS */;
INSERT INTO `AuthAssignment` VALUES ('admin','1','','N;\r\n'),('developer','2','','N;'),('developer','6',NULL,'N;'),('developer','7',NULL,'N;');
/*!40000 ALTER TABLE `AuthAssignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AuthItem`
--

DROP TABLE IF EXISTS `AuthItem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthItem`
--

LOCK TABLES `AuthItem` WRITE;
/*!40000 ALTER TABLE `AuthItem` DISABLE KEYS */;
INSERT INTO `AuthItem` VALUES ('Activate',1,'','','N;'),('activateAnalyst',0,'','','N;'),('activateDeveloper',0,'','',''),('activateUser',0,'','',''),('admin',2,'','','N;'),('Create',1,'','','N;'),('createAnalyst',0,'','',''),('createApp',1,'','','N;'),('createDeveloper',0,'','','N;'),('createUser',0,'','','N;'),('Delete',1,'','','N;'),('deleteAnalyst',0,'','',''),('deleteDeveloper',0,'','',''),('deleteUser',0,'','','N;'),('developer',2,'','','N;'),('Edit',1,'','','N;'),('editAnalyst',0,'','',''),('editDeveloper',0,'','','N;'),('editUser',0,'','',''),('manageApps',1,'','','N;\r\n'),('qa analyst',2,'','','N;'),('updateOwnPassword',1,'','return Yii:app()->user->id==$params[\"post\"]->authID;','N;\r\n'),('user',2,'','','N;');
/*!40000 ALTER TABLE `AuthItem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AuthItemChild`
--

DROP TABLE IF EXISTS `AuthItemChild`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthItemChild`
--

LOCK TABLES `AuthItemChild` WRITE;
/*!40000 ALTER TABLE `AuthItemChild` DISABLE KEYS */;
INSERT INTO `AuthItemChild` VALUES ('admin','Activate'),('Activate','activateAnalyst'),('Activate','activateDeveloper'),('Activate','activateUser'),('admin','Create'),('Create','createAnalyst'),('developer','createApp'),('Create','createDeveloper'),('Create','createUser'),('admin','Delete'),('Delete','deleteAnalyst'),('Delete','deleteDeveloper'),('Delete','deleteUser'),('admin','Edit'),('Edit','editAnalyst'),('Edit','editDeveloper'),('Edit','editUser'),('developer','manageApps');
/*!40000 ALTER TABLE `AuthItemChild` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_downloads`
--

DROP TABLE IF EXISTS `application_downloads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `version_id` int(11) NOT NULL,
  `download_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `application_id` (`application_id`,`user_id`),
  KEY `user_id` (`user_id`),
  KEY `version_id` (`version_id`),
  CONSTRAINT `application_downloads_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `application_downloads_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `application_downloads_ibfk_3` FOREIGN KEY (`version_id`) REFERENCES `versions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_downloads`
--

LOCK TABLES `application_downloads` WRITE;
/*!40000 ALTER TABLE `application_downloads` DISABLE KEYS */;
/*!40000 ALTER TABLE `application_downloads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_status_ref`
--

DROP TABLE IF EXISTS `application_status_ref`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_status_ref` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(128) NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_status_ref`
--

LOCK TABLES `application_status_ref` WRITE;
/*!40000 ALTER TABLE `application_status_ref` DISABLE KEYS */;
INSERT INTO `application_status_ref` VALUES (1,'Uploaded','Developer upload app.'),(2,'Analyst Pending','Analyst approval pending.'),(3,'Analyst approved','Analyst approved app.'),(4,'Analyst rejected','Analyst rejected app based on checklists.'),(5,'Admin pending','admin approval pending.'),(6,'Approved','App finally approved and can be displayed to user.'),(7,'Rejected','App rejected by admin.');
/*!40000 ALTER TABLE `application_status_ref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Developer''s id',
  `category_id` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '''0'' - disabled , ''1''- enabled',
  `logo` varchar(255) NOT NULL,
  `platform_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `ndownloads` int(11) NOT NULL,
  `disabled_comments` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `category_id` (`category_id`),
  KEY `platform_id` (`platform_id`),
  KEY `device_id` (`device_id`),
  KEY `developer_id` (`user_id`),
  CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`platform_id`) REFERENCES `platforms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `applications_ibfk_3` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `applications_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applications`
--

LOCK TABLES `applications` WRITE;
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` VALUES (4,'Testing',1,3,'ndl','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(5,'Test',2,2,'a','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(6,'Hello kity',2,2,'Hello kity','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(7,'Test App11',2,2,'excuse me girl','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(8,'Hello kity1',2,2,'esdfc','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(11,'abc',2,3,'nsjldij`','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(13,'ndl',2,3,'sj;','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(14,'njdk',2,3,'nskl','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(15,'njk',2,3,'ndkl','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(16,'nsjkd',2,4,'nslk','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(17,'sndkl',2,4,'ndsjl','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(18,'mskl',2,3,'nskl','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(19,'jksd',2,4,'ms;','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(20,'njs',2,3,'mksl','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(21,'mkl',2,4,'nkl','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(22,'jkl',2,3,'ml;s','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(23,'mklmkl',2,3,'nkl;j','0','logo.jpeg',2,1,0,'Not approved by reviewer'),(24,'MikeTesting',7,3,'Testing mike','0','er.jpg',2,1,0,'Not approved by reviewer'),(26,'hjd',2,3,'ndjk','0','algo3.jpg',2,1,0,'Not approved by reviewer'),(27,'namaste london',7,4,'Katrina Kaif\r\nAkshat Khandelwal','0','algo2.jpg',2,1,0,'Not approved by reviewer');
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `description` mediumtext NOT NULL,
  `create_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `parent_id` (`parent_id`),
  CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (2,'None',NULL,'0','No parent.','2014-10-01 22:31:16','0000-00-00 00:00:00'),(3,'Business',2,'0','Business related apps.','2014-10-01 22:31:45','0000-00-00 00:00:00'),(4,'Finance',3,'0','Finance related apps.','2014-10-01 22:32:05','0000-00-00 00:00:00'),(5,'Games',3,'1','bdsk','2014-10-09 22:49:47','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_reviewer_mapping`
--

DROP TABLE IF EXISTS `category_reviewer_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_reviewer_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `category_reviewer_mapping_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `category_reviewer_mapping_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_reviewer_mapping`
--

LOCK TABLES `category_reviewer_mapping` WRITE;
/*!40000 ALTER TABLE `category_reviewer_mapping` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_reviewer_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checklist_category_map`
--

DROP TABLE IF EXISTS `checklist_category_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checklist_category_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `checklist_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `cheecklist_id` (`checklist_id`),
  CONSTRAINT `checklist_category_map_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `checklist_category_map_ibfk_2` FOREIGN KEY (`checklist_id`) REFERENCES `checklists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checklist_category_map`
--

LOCK TABLES `checklist_category_map` WRITE;
/*!40000 ALTER TABLE `checklist_category_map` DISABLE KEYS */;
/*!40000 ALTER TABLE `checklist_category_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checklists`
--

DROP TABLE IF EXISTS `checklists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checklists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checklists`
--

LOCK TABLES `checklists` WRITE;
/*!40000 ALTER TABLE `checklists` DISABLE KEYS */;
INSERT INTO `checklists` VALUES (1,'Has Login','Checks for login page in app ','0','2014-10-01 23:00:20','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `checklists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` mediumtext NOT NULL,
  `date_reviewed` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '''0'' - disabled , ''1''- enabled',
  PRIMARY KEY (`id`),
  KEY `application_id` (`application_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devices`
--

LOCK TABLES `devices` WRITE;
/*!40000 ALTER TABLE `devices` DISABLE KEYS */;
INSERT INTO `devices` VALUES (1,'mobile'),(2,'tablet');
/*!40000 ALTER TABLE `devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_files`
--

DROP TABLE IF EXISTS `media_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `type` enum('image','video') NOT NULL,
  `filename` varchar(128) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `application_id` (`application_id`),
  CONSTRAINT `media_files_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_files`
--

LOCK TABLES `media_files` WRITE;
/*!40000 ALTER TABLE `media_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `platforms`
--

DROP TABLE IF EXISTS `platforms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `platforms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `platforms`
--

LOCK TABLES `platforms` WRITE;
/*!40000 ALTER TABLE `platforms` DISABLE KEYS */;
INSERT INTO `platforms` VALUES (2,'android'),(1,'iOS');
/*!40000 ALTER TABLE `platforms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` enum('0','1','2','3','4','5') NOT NULL,
  `date_rated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `application_id` (`application_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Admin of website.'),(2,'developer','Developer develops applications.'),(3,'qa analyst','QA analyst reviews developer code.'),(4,'user','User downloads app.');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `activation_key` varchar(128) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `reset_password_key` varchar(128) DEFAULT NULL,
  `reset_password_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'shikha.jain@students.iiit.ac.in','password','Shikha','Jain','9876543210',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','1','1','','0000-00-00 00:00:00'),(2,'vatikaharlalka@gmail.com','h','Vatika ','Harlalka','9876512345',2,'0000-00-00 00:00:00','0000-00-00 00:00:00','1','1','','0000-00-00 00:00:00'),(3,'abc@gmail.com','password','Arushi','Vashist','1234567890',4,'0000-00-00 00:00:00','0000-00-00 00:00:00','1','1','','0000-00-00 00:00:00'),(4,'akanksha@gmail.com','hellokity','Akanksha','Akanksha','1234554321',4,'0000-00-00 00:00:00','0000-00-00 00:00:00','1','1','','0000-00-00 00:00:00'),(5,'abc@abc.com','password','His','Story','0987644813',4,'0000-00-00 00:00:00','0000-00-00 00:00:00','1','1','','0000-00-00 00:00:00'),(6,'shikha@jain.com','password','Sh','Jai','0986431628',2,'2014-10-01 20:47:50','0000-00-00 00:00:00','1','1','','0000-00-00 00:00:00'),(7,'dev@dev.com','password','Dev','Will','0987656789',2,'2014-10-07 22:58:29','0000-00-00 00:00:00','1','1','','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `versions`
--

DROP TABLE IF EXISTS `versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `file_name` varchar(128) NOT NULL,
  `version` varchar(128) NOT NULL,
  `create_date` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `comment` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `application_id` (`application_id`),
  KEY `reviewer_id` (`reviewer_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `versions_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `versions_ibfk_2` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `versions_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `application_status_ref` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `versions`
--

LOCK TABLES `versions` WRITE;
/*!40000 ALTER TABLE `versions` DISABLE KEYS */;
INSERT INTO `versions` VALUES (6,4,'','1.0','0000-00-00 00:00:00',1,1,'',''),(7,18,'','1.0','0000-00-00 00:00:00',1,1,'',''),(8,19,'','1.0','0000-00-00 00:00:00',1,1,'',''),(9,20,'','1.0','0000-00-00 00:00:00',1,1,'',''),(10,21,'','1.0','0000-00-00 00:00:00',1,1,'',''),(11,22,'','1.0','0000-00-00 00:00:00',1,1,'',''),(12,23,'logo.jpeg','1.0','0000-00-00 00:00:00',1,1,'',''),(13,24,'er.jpg','1.0','2014-10-07 22:59:18',1,1,'',''),(17,24,'algo3.jpg','2.0','2014-10-08 00:21:19',1,1,'',''),(18,26,'algo2.jpg','1.0','2014-10-08 22:08:10',1,1,'',''),(19,27,'algo3.jpg','1.0','2014-10-08 22:41:45',1,1,'',''),(20,24,'','2.0','2014-10-09 17:23:31',1,1,'',''),(21,24,'classdiagram','pehle pehle pyaar h','2014-10-09 17:23:44',1,1,'','');
/*!40000 ALTER TABLE `versions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-09 23:07:09
