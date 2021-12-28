-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ilf_servidesk_database.category
CREATE TABLE IF NOT EXISTS `category` (
  `CATEGORYID` int(11) NOT NULL AUTO_INCREMENT,
  `CATEGORY` text,
  `CREATED` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`CATEGORYID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ilf_servidesk_database.category: ~3 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`CATEGORYID`, `CATEGORY`, `CREATED`) VALUES
	(1, 'Sistemas', '2021-07-23 23:15:36'),
	(2, 'Talento Humano', '2021-07-23 23:16:56'),
	(3, 'Finanzas', '2021-07-23 23:17:14');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table ilf_servidesk_database.department
CREATE TABLE IF NOT EXISTS `department` (
  `DEPARTMENTID` int(11) NOT NULL AUTO_INCREMENT,
  `DEPARTMENT` text NOT NULL,
  `DEPARTEMENT_CREATED` timestamp NOT NULL,
  PRIMARY KEY (`DEPARTMENTID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ilf_servidesk_database.department: ~0 rows (approximately)
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`DEPARTMENTID`, `DEPARTMENT`, `DEPARTEMENT_CREATED`) VALUES
	(1, 'SISTEMAS', '2021-07-23 20:41:20');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- Dumping structure for table ilf_servidesk_database.level_category_1
CREATE TABLE IF NOT EXISTS `level_category_1` (
  `LEVEL_CATEGORY_ID_1` int(11) NOT NULL AUTO_INCREMENT,
  `LEVEL_1` varchar(150) NOT NULL DEFAULT '0',
  `CATEGORYID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`LEVEL_CATEGORY_ID_1`),
  KEY `CATEGORYID` (`CATEGORYID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table ilf_servidesk_database.level_category_1: ~2 rows (approximately)
/*!40000 ALTER TABLE `level_category_1` DISABLE KEYS */;
INSERT INTO `level_category_1` (`LEVEL_CATEGORY_ID_1`, `LEVEL_1`, `CATEGORYID`) VALUES
	(1, 'Redes', 1),
	(2, 'Sap', 1);
/*!40000 ALTER TABLE `level_category_1` ENABLE KEYS */;

-- Dumping structure for table ilf_servidesk_database.level_category_2
CREATE TABLE IF NOT EXISTS `level_category_2` (
  `LEVEL_CATEGORY_ID_2` int(11) NOT NULL AUTO_INCREMENT,
  `LEVEL_2` varchar(150) NOT NULL DEFAULT '0',
  `CATEGORYID` int(11) NOT NULL DEFAULT '0',
  `LEVEL_CATEGORY_ID_1` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`LEVEL_CATEGORY_ID_2`),
  KEY `CATEGORIYD` (`CATEGORYID`),
  KEY `level_category_1_id` (`LEVEL_CATEGORY_ID_1`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ilf_servidesk_database.level_category_2: ~3 rows (approximately)
/*!40000 ALTER TABLE `level_category_2` DISABLE KEYS */;
INSERT INTO `level_category_2` (`LEVEL_CATEGORY_ID_2`, `LEVEL_2`, `CATEGORYID`, `LEVEL_CATEGORY_ID_1`) VALUES
	(1, 'Internet', 1, 1),
	(2, 'Creación de usuario', 1, 2),
	(3, 'Roles de usuario', 1, 2);
/*!40000 ALTER TABLE `level_category_2` ENABLE KEYS */;

-- Dumping structure for table ilf_servidesk_database.level_category_3
CREATE TABLE IF NOT EXISTS `level_category_3` (
  `LEVEL_CATEGORY_ID_3` int(11) NOT NULL AUTO_INCREMENT,
  `LEVEL_3` varchar(150) NOT NULL DEFAULT '0',
  `CATEGORYID` int(11) NOT NULL DEFAULT '0',
  `LEVEL_CATEGORY_ID_1` int(11) DEFAULT NULL,
  `LEVEL_CATEGORY_ID_2` int(11) DEFAULT NULL,
  PRIMARY KEY (`LEVEL_CATEGORY_ID_3`),
  KEY `CATEGORYID` (`CATEGORYID`),
  KEY `LEVEL_CATEGORY_ID_1` (`LEVEL_CATEGORY_ID_1`),
  KEY `LEVEL_CATEGORY_ID_2` (`LEVEL_CATEGORY_ID_2`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ilf_servidesk_database.level_category_3: ~3 rows (approximately)
/*!40000 ALTER TABLE `level_category_3` DISABLE KEYS */;
INSERT INTO `level_category_3` (`LEVEL_CATEGORY_ID_3`, `LEVEL_3`, `CATEGORYID`, `LEVEL_CATEGORY_ID_1`, `LEVEL_CATEGORY_ID_2`) VALUES
	(1, 'Métricas', 1, 2, 3),
	(2, 'Parametros en general', 1, 2, 3),
	(3, 'Dar de alta ', 1, 2, 2);
/*!40000 ALTER TABLE `level_category_3` ENABLE KEYS */;

-- Dumping structure for table ilf_servidesk_database.level_category_solution
CREATE TABLE IF NOT EXISTS `level_category_solution` (
  `solution_id` int(11) NOT NULL AUTO_INCREMENT,
  `SOLUTION` varchar(200) NOT NULL DEFAULT '0',
  `LEVEL_CATEGORY_ID_1` int(11) NOT NULL DEFAULT '0',
  `LEVEL_CATEGORY_ID_2` int(11) NOT NULL DEFAULT '0',
  `LEVEL_CATEGORY_ID_3` int(11) NOT NULL DEFAULT '0',
  `CATEGORYID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`solution_id`),
  KEY `LEVEL_CATEGORY_ID_1` (`LEVEL_CATEGORY_ID_1`),
  KEY `LEVEL_CATEGORY_ID_2` (`LEVEL_CATEGORY_ID_2`),
  KEY `LEVEL_CATEGORY_ID_3` (`LEVEL_CATEGORY_ID_3`),
  KEY `CATEGORYID` (`CATEGORYID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ilf_servidesk_database.level_category_solution: ~0 rows (approximately)
/*!40000 ALTER TABLE `level_category_solution` DISABLE KEYS */;
/*!40000 ALTER TABLE `level_category_solution` ENABLE KEYS */;

-- Dumping structure for table ilf_servidesk_database.ticket
CREATE TABLE IF NOT EXISTS `ticket` (
  `TICKETID` int(11) NOT NULL AUTO_INCREMENT,
  `TICKETNUM` int(11) NOT NULL DEFAULT '0',
  `DESCRIPTION` text NOT NULL,
  `STATUS` int(1) NOT NULL DEFAULT '0',
  `IMPACT` int(1) NOT NULL DEFAULT '0',
  `URGENCY` int(1) NOT NULL DEFAULT '0',
  `PRIORITY` int(1) NOT NULL DEFAULT '0',
  `CATEGORYID` int(11) NOT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`TICKETID`,`TICKETNUM`),
  KEY `TICKETNUM` (`TICKETNUM`),
  KEY `FK_ticket_category` (`CATEGORYID`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table ilf_servidesk_database.ticket: ~3 rows (approximately)
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` (`TICKETID`, `TICKETNUM`, `DESCRIPTION`, `STATUS`, `IMPACT`, `URGENCY`, `PRIORITY`, `CATEGORYID`, `USER_ID`) VALUES
	(6, 100000000, '', 0, 0, 0, 0, 0, NULL),
	(8, 100000001, '', 2, 0, 0, 0, 0, 2),
	(11, 100000002, '', 1, 0, 0, 0, 0, 2);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;

-- Dumping structure for table ilf_servidesk_database.ticket_date
CREATE TABLE IF NOT EXISTS `ticket_date` (
  `TICKET_DATEID` int(11) NOT NULL AUTO_INCREMENT,
  `CREATED` timestamp NOT NULL,
  `CHANGED` timestamp NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '0',
  `EXPIRATION` date NOT NULL,
  `TICKETID` int(11) DEFAULT NULL,
  PRIMARY KEY (`TICKET_DATEID`),
  KEY `TIKECTID` (`TICKETID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table ilf_servidesk_database.ticket_date: ~2 rows (approximately)
/*!40000 ALTER TABLE `ticket_date` DISABLE KEYS */;
INSERT INTO `ticket_date` (`TICKET_DATEID`, `CREATED`, `CHANGED`, `STATUS`, `EXPIRATION`, `TICKETID`) VALUES
	(3, '2021-07-23 22:07:29', '0000-00-00 00:00:00', 0, '0000-00-00', 8),
	(6, '2021-07-25 20:07:27', '0000-00-00 00:00:00', 0, '0000-00-00', 11);
/*!40000 ALTER TABLE `ticket_date` ENABLE KEYS */;

-- Dumping structure for table ilf_servidesk_database.user
CREATE TABLE IF NOT EXISTS `user` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(45) NOT NULL,
  `PASSWORD` varchar(45) DEFAULT NULL,
  `PERFIL_PIC` varchar(155) DEFAULT NULL,
  `NAME` text,
  `LASTNAME` text,
  `EMAIL` varchar(45) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `INTENTS` int(1) DEFAULT NULL,
  `CREATED_ON` timestamp NULL DEFAULT NULL COMMENT 'CREATED USER DATE',
  `DEPARTMENTID` int(11) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`,`USERNAME`),
  KEY `DEPARTMENTID` (`DEPARTMENTID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ilf_servidesk_database.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`USER_ID`, `USERNAME`, `PASSWORD`, `PERFIL_PIC`, `NAME`, `LASTNAME`, `EMAIL`, `STATUS`, `INTENTS`, `CREATED_ON`, `DEPARTMENTID`) VALUES
	(2, 'jgolindano', '12345', NULL, 'jader', 'golindano', NULL, 100, 0, '2021-07-23 20:40:23', 1),
	(3, 'jgolindano', '12345', NULL, 'Pedro ', 'Sierra', NULL, 300, 0, '2021-07-24 08:23:52', NULL),
	(4, 'jgolindano', '12345', NULL, 'Alfredo', 'Alcarnaval', NULL, 300, 0, '2021-07-24 08:24:23', NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
