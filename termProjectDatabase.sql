-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: elliots_coffee_shop
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

---
--- Create the database
---
CREATE DATABASE  elliots_coffee_shop;
USE elliots_coffee_shop;


--
-- Table structure for table `credentials`
--

DROP TABLE IF EXISTS `credentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credentials` (
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credentials`
--

LOCK TABLES `credentials` WRITE;
/*!40000 ALTER TABLE `credentials` DISABLE KEYS */;
INSERT INTO `credentials` VALUES ('Admin-Elliot','ac37154dff754bcf60ccf3da555da312');
/*!40000 ALTER TABLE `credentials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'The item ID',
  `name` varchar(100) NOT NULL COMMENT 'The Item name',
  `description` varchar(400) NOT NULL COMMENT 'The description of the item',
  `price` float NOT NULL COMMENT 'The price of the item',
  `image_Path` varchar(600) NOT NULL COMMENT 'the file path to the item image',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COMMENT='An item on the menu';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (72,'Carmel Blast Latte','A caramelly, delightful drink served with whipped topping.',5.99,'images/items/latte-macchiato-with-whipped-cream-2021-08-26-16-16-56-utc.jpg'),(73,'Nitro Brew','3 shots of espresso mixed with a green smoothie',6.99,'images/items/turmeric-latte-2021-08-26-16-16-06-utc.jpg'),(74,'Madras Special','A strong iced coffee to power through the longest of grading sessions.',4.99,'images/items/latte-2021-08-31-21-38-12-utc.jpg'),(75,'Café Coffee','Delicious black coffee made from our darkest beans',3.99,'images/items/cup-of-coffee-and-beans-on-pink-background-2021-08-31-15-05-11-utc.jpg'),(76,'Cinnamon Spice Spiral','Cinnamon spice coffee served in a chocolate spiraled glass.',6.99,'images/items/caramel-coffee-latte-2021-08-26-15-28-30-utc.jpg'),(78,'Pumpkin Spice Latte','A pumpkin pie in a creamy latte complete with whipped cream on top',7.99,'images/items/spice-pumpkin-latte-in-glass-with-pumpkins-on-yell-2021-09-04-15-48-34-utc.jpg');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-03 15:40:06
