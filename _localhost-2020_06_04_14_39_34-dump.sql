-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: mvc
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

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
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `completed` tinyint(1) DEFAULT '0',
  `admin_edited` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,'test','test@mail.ru','asdsadsa d1asdasdsad',NULL,0),(2,'test','test@mail.ru','asdsadsa 23213123',NULL,0),(3,'test','test@mail.ru','asdsadsa 3441421421',NULL,0),(4,'test','test@mail.ru','asdsadsa 4',1,0),(5,'test','test@mail.ru','asdsadsa 5',0,0),(6,'test','test@mail.ru','asdsadsa 6',0,0),(7,'test','test@mail.ru','asdsadsa 7',0,0),(8,'test','test@mail.ru','asdsadsa 8',0,0),(9,'test','test@mail.ru','asdsadsa 9',0,0),(10,'test','test@mail.ru','asdsadsa 10',0,0),(11,'test','test@mail.ru','aasd',0,0),(12,'test','test@mail.ru','asdsadsa 12',0,0),(13,'aaatest','test@mail.ru','asdsadsa 13',0,0),(14,'test','test@mail.ru','asdsadsa 14',0,0),(15,'test','d','asdsadsa d',1,0),(16,'test','a','asdsadsa dфыв ыфв ыфв <script>alert(‘test’);</script>',0,0),(17,'test','test@mail.ru','asdsadsa d',0,0),(18,'test','test@mail.ru','asdsadsa d',1,0),(19,'test','test@mail.ru','asdsadsa dвфыв ыфв фыв',1,0),(20,'test','test@mail.ru','asdsadsa d',0,1),(21,'test','test@mail.ru','asdsadsa d',0,1),(22,'test','test@mail.ru','asdsadsa d',0,1),(23,'test','test@mail.ru','asdsadsa d',0,0),(24,'test','test@mail.ru','asdsadsa d',0,0),(25,'test','test@mail.ru','asdsadsa d',0,0),(26,'test','test@mail.ru','asdsadsa d',0,0),(27,'test','test@mail.ru','asdsadsa d',0,0),(28,'test','test@mail.ru','asdsadsa d',0,0),(29,'test','test@mail.ru','asdsadsa d',0,0),(33,'test','test@mail.ru','test',0,0),(34,'asdsadasdas','asdsa@mail.ru','assadsad sad asdsa d',0,0),(35,'привет','hi@mail.ru','прифывыфв ыфвф ы',0,0),(36,'сука','asdasd@mail.ru','asdasdsadsad',0,0),(37,'xss','xss@mail.ru','<script>alert(‘test’);</script>',0,0),(38,'asd','asdasdsa@mail.ru','asdas dsa dasd ',0,0),(39,'asdsadsadsadsa','asdsa@mail.ru','asdasd as',0,0),(40,'фывыфв','sdsa@mail.ru','asdsa d',0,0),(41,'asdasd','asda@mail.ru','asd',0,0),(42,'asdsadsad','assadassadsad@mail.ru','asdsadsad',0,0),(43,'aaaaaaa','aaaaaaaaaaaaa@mail.ru','asdasdsad',0,0);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-04 14:39:34
