-- MySQL dump 10.13  Distrib 5.7.11, for Win32 (AMD64)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	5.7.11

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
-- Table structure for table `ordroom`
--

DROP TABLE IF EXISTS `ordroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordroom` (
  `con_rec` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `team_id` char(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_id` int(5) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `duration` int(2) DEFAULT NULL,
  PRIMARY KEY (`con_rec`),
  KEY `team_id` (`team_id`),
  KEY `room_id` (`room_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordroom`
--

LOCK TABLES `ordroom` WRITE;
/*!40000 ALTER TABLE `ordroom` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordroom` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `addordroom` AFTER INSERT ON `ordroom` FOR EACH ROW BEGIN
insert into teamstatis values (new.con_rec,NULL,NULL,new.team_id);
UPDATE room SET room.room_sta='已预定' WHERE room.room_id=new.room_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ordseat`
--

DROP TABLE IF EXISTS `ordseat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordseat` (
  `con_rec` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `stu_id` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seat_id` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `arr_time` datetime DEFAULT NULL,
  PRIMARY KEY (`con_rec`),
  KEY `stu_id` (`stu_id`),
  KEY `seat_id` (`seat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordseat`
--

LOCK TABLES `ordseat` WRITE;
/*!40000 ALTER TABLE `ordseat` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordseat` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `addordseat` AFTER INSERT ON `ordseat` FOR EACH ROW BEGIN
insert into psnstatis values (new.con_rec,NULL,NULL,new.stu_id);
UPDATE seat SET seat.seat_sta='已预定' WHERE seat.seat_id=new.seat_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `psnbc`
--

DROP TABLE IF EXISTS `psnbc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `psnbc` (
  `bre_rec` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `stu_id` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bre_time` datetime DEFAULT NULL,
  `bre_rea` enum('迟到') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`bre_rec`),
  KEY `stu_id` (`stu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `psnbc`
--

LOCK TABLES `psnbc` WRITE;
/*!40000 ALTER TABLE `psnbc` DISABLE KEYS */;
/*!40000 ALTER TABLE `psnbc` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `addpsnbc` AFTER INSERT ON `psnbc` FOR EACH ROW update psnstatic set psnstatis.bre_rec=new.bre_rec where psnstatis.con_rec=(select max(psnstatis.con_rec) from psnstatis where psnstatis.stu_id=new.stu_id) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `psninout`
--

DROP TABLE IF EXISTS `psninout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `psninout` (
  `inout_rec` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `mec_id` int(2) DEFAULT NULL,
  `stu_id` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `in_time` datetime DEFAULT NULL,
  `out_time` datetime DEFAULT NULL,
  PRIMARY KEY (`inout_rec`),
  KEY `stu_id` (`stu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `psninout`
--

LOCK TABLES `psninout` WRITE;
/*!40000 ALTER TABLE `psninout` DISABLE KEYS */;
/*!40000 ALTER TABLE `psninout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `psnstatis`
--

DROP TABLE IF EXISTS `psnstatis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `psnstatis` (
  `con_rec` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `bre_rec` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inout_rec` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_id` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`con_rec`),
  KEY `bre_rec` (`bre_rec`),
  KEY `inout_rec` (`inout_rec`),
  KEY `stu_id` (`stu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `psnstatis`
--

LOCK TABLES `psnstatis` WRITE;
/*!40000 ALTER TABLE `psnstatis` DISABLE KEYS */;
/*!40000 ALTER TABLE `psnstatis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_sta` enum('未预定','已预定') COLLATE utf8_unicode_ci NOT NULL,
  `room_sch` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seat`
--

DROP TABLE IF EXISTS `seat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seat` (
  `seat_id` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `seat_sta` enum('未预定','已预定') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`seat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seat`
--

LOCK TABLES `seat` WRITE;
/*!40000 ALTER TABLE `seat` DISABLE KEYS */;
INSERT INTO `seat` VALUES ('1_1_1','未预定'),('1_1_2','未预定'),('1_1_3','已预定'),('1_1_4','未预定'),('1_1_5','未预定'),('1_1_6','未预定'),('1_2_1','未预定'),('1_2_2','未预定'),('1_2_3','已预定'),('1_2_4','未预定'),('1_2_5','未预定'),('1_2_6','未预定'),('1_3_1','已预定'),('1_3_2','已预定'),('1_3_3','已预定'),('1_3_4','已预定'),('1_3_5','已预定'),('1_3_6','已预定'),('1_4_1','未预定'),('1_4_2','未预定'),('1_4_3','已预定'),('1_4_4','未预定'),('1_4_5','未预定'),('1_4_6','未预定'),('1_5_1','未预定'),('1_5_2','未预定'),('1_5_3','已预定'),('1_5_4','未预定'),('1_5_5','未预定'),('1_5_6','未预定'),('1_6_1','已预定'),('1_6_2','已预定'),('1_6_3','已预定'),('1_6_4','已预定'),('1_6_5','已预定'),('1_6_6','已预定'),('1_7_1','未预定'),('1_7_2','未预定'),('1_7_3','已预定'),('1_7_4','未预定'),('1_7_5','未预定'),('1_7_6','未预定'),('1_8_1','未预定'),('1_8_2','未预定'),('1_8_3','已预定'),('1_8_4','未预定'),('1_8_5','未预定'),('1_8_6','未预定'),('1_9_1','已预定'),('1_9_2','已预定'),('1_9_3','已预定'),('1_9_4','已预定'),('1_9_5','已预定'),('1_9_6','已预定'),('1_10_1','未预定'),('1_10_2','未预定'),('1_10_3','已预定'),('1_10_4','未预定'),('1_10_5','未预定'),('1_10_6','未预定'),('1_11_1','未预定'),('1_11_2','未预定'),('1_11_3','已预定'),('1_11_4','未预定'),('1_11_5','未预定'),('1_11_6','未预定'),('1_12_1','已预定'),('1_12_2','已预定'),('1_12_3','已预定'),('1_12_4','已预定'),('1_12_5','已预定'),('1_12_6','已预定'),('1_13_1','未预定'),('1_13_2','未预定'),('1_13_3','已预定'),('1_13_4','未预定'),('1_13_5','未预定'),('1_13_6','未预定'),('1_14_1','未预定'),('1_14_2','未预定'),('1_14_3','已预定'),('1_14_4','未预定'),('1_14_5','未预定'),('1_14_6','未预定'),('2_1_1','未预定'),('2_1_2','未预定'),('2_1_3','已预定'),('2_1_4','未预定'),('2_1_5','未预定'),('2_1_6','未预定'),('2_2_1','未预定'),('2_2_2','未预定'),('2_2_3','已预定'),('2_2_4','未预定'),('2_2_5','未预定'),('2_2_6','未预定'),('2_3_1','已预定'),('2_3_2','已预定'),('2_3_3','已预定'),('2_3_4','已预定'),('2_3_5','已预定'),('2_3_6','已预定'),('2_4_1','未预定'),('2_4_2','未预定'),('2_4_3','已预定'),('2_4_4','未预定'),('2_4_5','未预定'),('2_4_6','未预定'),('2_5_1','未预定'),('2_12_5','已预定'),('2_5_2','未预定'),('2_5_3','已预定'),('2_5_4','未预定'),('2_5_5','未预定'),('2_5_6','未预定'),('2_7_1','未预定'),('2_7_2','未预定'),('2_7_3','已预定'),('2_7_4','未预定'),('2_7_5','未预定'),('2_7_6','未预定'),('2_8_1','未预定'),('2_8_2','未预定'),('2_8_3','已预定'),('2_8_4','未预定'),('2_8_5','未预定'),('2_8_6','未预定'),('2_9_1','已预定'),('2_9_2','已预定'),('2_9_3','已预定'),('2_9_4','已预定'),('2_9_5','已预定'),('2_9_6','已预定'),('2_10_1','未预定'),('2_10_2','未预定'),('2_10_3','已预定'),('2_10_4','未预定'),('2_10_5','未预定'),('2_10_6','未预定'),('2_11_1','未预定'),('2_11_2','未预定'),('2_11_3','已预定'),('2_11_4','未预定'),('2_11_5','未预定'),('2_11_6','未预定'),('2_12_1','已预定'),('2_12_2','已预定'),('2_12_3','已预定'),('2_12_4','已预定'),('2_12_6','已预定'),('2_13_1','未预定'),('2_13_2','未预定'),('2_13_3','已预定'),('2_13_4','未预定'),('2_13_5','未预定'),('2_13_6','未预定'),('2_14_1','未预定'),('2_14_2','未预定'),('2_14_3','已预定'),('2_14_4','未预定'),('2_14_5','未预定'),('2_14_6','未预定'),('2_6_1','已预定'),('2_6_2','已预定'),('2_6_3','已预定'),('2_6_4','已预定'),('2_6_5','已预定'),('2_6_6','已预定');
/*!40000 ALTER TABLE `seat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `staff_id` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `staff_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `staff_sex` enum('男','女') COLLATE utf8_unicode_ci NOT NULL,
  `staff_psw` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `staff_pho` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `staff_exp` date NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `stu_id` char(10) NOT NULL,
  `stu_name` varchar(10) NOT NULL,
  `stu_sex` enum('男','女') NOT NULL,
  `stu_psw` varchar(20) DEFAULT NULL,
  `stu_pho` varchar(11) DEFAULT NULL,
  `stu_dep` int(11) DEFAULT NULL,
  `stu_exp` date DEFAULT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES ('0014061176','黄秋宇','女',NULL,'13021238201',6,'2016-11-30'),('0014061001','王雅洁','女',NULL,'13021238201',6,'2016-11-30');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `team_id` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `team_pro` enum('社团','班级','学院') COLLATE utf8_unicode_ci NOT NULL,
  `team_psw` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_pho` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_cre` date NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teambc`
--

DROP TABLE IF EXISTS `teambc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teambc` (
  `bre_rec` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `team_id` char(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bre_time` datetime DEFAULT NULL,
  `bre_rea` enum('迟到','超时') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`bre_rec`),
  KEY `team_id` (`team_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teambc`
--

LOCK TABLES `teambc` WRITE;
/*!40000 ALTER TABLE `teambc` DISABLE KEYS */;
/*!40000 ALTER TABLE `teambc` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = gbk */ ;
/*!50003 SET character_set_results = gbk */ ;
/*!50003 SET collation_connection  = gbk_chinese_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger addteambc
after insert on teambc
for each row
update teamstatic set teamstatis.bre_rec=new.bre_rec where teamstatis.con_rec=(select max(teamstatis.con_rec) from teamstatis where teamstatis.team_id=new.team_id) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `teaminout`
--

DROP TABLE IF EXISTS `teaminout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teaminout` (
  `inout_rec` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `mec_id` int(2) DEFAULT NULL,
  `team_id` char(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `in_time` datetime DEFAULT NULL,
  `out_time` datetime DEFAULT NULL,
  PRIMARY KEY (`inout_rec`),
  KEY `team_id` (`team_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teaminout`
--

LOCK TABLES `teaminout` WRITE;
/*!40000 ALTER TABLE `teaminout` DISABLE KEYS */;
/*!40000 ALTER TABLE `teaminout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teamstatis`
--

DROP TABLE IF EXISTS `teamstatis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teamstatis` (
  `con_rec` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `bre_rec` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inout_rec` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_id` char(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`con_rec`),
  KEY `bre_rec` (`bre_rec`),
  KEY `inout_rec` (`inout_rec`),
  KEY `team_id` (`team_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teamstatis`
--

LOCK TABLES `teamstatis` WRITE;
/*!40000 ALTER TABLE `teamstatis` DISABLE KEYS */;
/*!40000 ALTER TABLE `teamstatis` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-22  7:55:59
