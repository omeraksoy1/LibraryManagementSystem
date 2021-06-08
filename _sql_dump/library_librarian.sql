-- MySQL dump 10.13  Distrib 8.0.24, for Win64 (x86_64)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	8.0.24

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
-- Table structure for table `librarian`
--

DROP TABLE IF EXISTS `librarian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `librarian` (
  `LID` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `phone` bigint DEFAULT NULL,
  PRIMARY KEY (`LID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `librarian`
--

LOCK TABLES `librarian` WRITE;
/*!40000 ALTER TABLE `librarian` DISABLE KEYS */;
INSERT INTO `librarian` VALUES (1,'Eliott','Underwood',5538413616),(2,'Lester','Harding',5513374234),(3,'Kasim','Munoz',5554342337),(4,'Tobi','Millar',5536503733),(5,'Harmony','Lynn',5542758594),(6,'Maksim','Greig',5558431045),(7,'Safiyah','Mellor',5546996048),(8,'Cleo','Hollis',5505457846),(9,'Jem','Irving',5544320288),(10,'Agata','Clarke',5522108638),(11,'Eamonn','Franco',5553384034),(12,'Amiya','Erickson',5504574856),(13,'Sid','Akhtar',5532410479),(14,'Dominik','Berger',5544369334),(15,'Alishba','Stafford',5557472882),(16,'Franklyn','Jacobson',5535088189),(17,'Barbara','Murray',5515328579),(18,'Sheila','Turner',5555332072),(19,'Mollie','Cabrera',5551245204),(20,'Shannan','Stacey',5504396854),(21,'Loki','Huffman',5552397030),(22,'Pharrell','Britt',5513677326),(23,'Riley-James','Burch',5517923987),(24,'Olivier','Pineda',5553121576),(25,'Darrel','Holder',5503292431),(26,'Sanah','Dunne',5505555798),(27,'Kalem','Strong',5511292437),(28,'Terri','Boyer',5537038345),(29,'Raisa','Rocha',5560131458),(30,'Gregory','Rosario',5560771051),(31,'Mackenzie','Gunn',5524736119),(32,'Mysha','Hicks',5541777145),(33,'Archibald','O\'Connor',5508768678),(34,'Mimi','Finney',5538092440),(35,'Abbigail','Mcloughlin',5517372654),(36,'Matas','Bradford',5518376459),(37,'Eleanor','Flower',5502709191),(38,'Fabien','Handley',5559635467),(39,'Reema','Sutton',5535971456),(40,'Stevie','Huerta',5544352250),(41,'Carol','Maldonado',5527995135),(42,'Nevaeh','Waller',5519575809),(43,'Ava-Rose','Hodges',5544735523),(44,'Blanka','Gillespie',5521536608),(45,'Darnell','Austin',5522924706),(46,'Coen','Robinson',5549130585),(47,'Stanislaw','Wiggins',5512650334),(48,'Amiee','Slater',5503478672),(49,'Abdulrahman','Sutherland',5534445273),(50,'Eric','Rossi',5514695863);
/*!40000 ALTER TABLE `librarian` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-15  4:32:11
