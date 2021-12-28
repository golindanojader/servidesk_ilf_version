-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando datos para la tabla ilf_servidesk_database.category: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
REPLACE INTO `category` (`CATEGORYID`, `CATEGORY`, `CREATED`) VALUES
	(1, 'SISTEMAS', '2021-07-20 12:18:03');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Volcando datos para la tabla ilf_servidesk_database.department: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
REPLACE INTO `department` (`DEPARTMENTID`, `DEPARTMENT`, `DEPARTEMENT_CREATED`) VALUES
	(1, 'SISTEMAS', '2021-07-20 09:33:55');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- Volcando datos para la tabla ilf_servidesk_database.level_category_1: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `level_category_1` DISABLE KEYS */;
REPLACE INTO `level_category_1` (`LEVEL_1_CATEGORYID`, `LEVEL1`, `CATEGORYID`) VALUES
	(1, '0', 1);
/*!40000 ALTER TABLE `level_category_1` ENABLE KEYS */;

-- Volcando datos para la tabla ilf_servidesk_database.level_category_2: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `level_category_2` DISABLE KEYS */;
/*!40000 ALTER TABLE `level_category_2` ENABLE KEYS */;

-- Volcando datos para la tabla ilf_servidesk_database.level_category_3: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `level_category_3` DISABLE KEYS */;
/*!40000 ALTER TABLE `level_category_3` ENABLE KEYS */;

-- Volcando datos para la tabla ilf_servidesk_database.solution_category: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `solution_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `solution_category` ENABLE KEYS */;

-- Volcando datos para la tabla ilf_servidesk_database.ticket: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
REPLACE INTO `ticket` (`TICKETID`, `TICKETNUM`, `DESCRIPTION`, `STATUS`, `IMPACT`, `URGENCY`, `PRIORITY`, `USER_ID`, `CATEGORY_CATEGORYID`) VALUES
	(1, 10000000, 'null', 0, 0, 0, 0, NULL, NULL),
	(59, 10000001, '', 1, 0, 0, 0, 2, NULL);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;

-- Volcando datos para la tabla ilf_servidesk_database.ticket_date: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `ticket_date` DISABLE KEYS */;
REPLACE INTO `ticket_date` (`TICKET_DATEID`, `CREATED`, `CHANGED`, `STATUS`, `EXPIRATION`, `TICKETID`) VALUES
	(1, '2021-07-20 11:53:18', '2021-07-20 11:53:19', 0, '2021-07-20', 1),
	(44, '2021-07-22 11:07:15', '0000-00-00 00:00:00', 0, '0000-00-00', 59);
/*!40000 ALTER TABLE `ticket_date` ENABLE KEYS */;

-- Volcando datos para la tabla ilf_servidesk_database.user: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`ID`, `USERNAME`, `PASSWORD`, `PERFIL_PIC`, `NAME`, `LASTNAME`, `EMAIL`, `STATUS`, `INTENTS`, `CREATED_ON`, `DEPARTMENTID`) VALUES
	(2, 'jgolindano', '12345', NULL, 'jader', 'golindano', NULL, NULL, 0, '2021-07-10 09:34:20', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
