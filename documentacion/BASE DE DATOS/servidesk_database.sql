-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla servidesk_database.connected_user: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `connected_user` DISABLE KEYS */;
REPLACE INTO `connected_user` (`connected_id`, `connected`, `user_id`) VALUES
	(8, 1, 3);
/*!40000 ALTER TABLE `connected_user` ENABLE KEYS */;

-- Volcando datos para la tabla servidesk_database.data_connection: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `data_connection` DISABLE KEYS */;
REPLACE INTO `data_connection` (`connection_id`, `date_connection`, `ip_address`, `navigator`, `user_id`) VALUES
	(13, '2021-11-14 20:46:19', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; rv:94.0) Gecko/20100101 Firefox/94.0', 11);
/*!40000 ALTER TABLE `data_connection` ENABLE KEYS */;

-- Volcando datos para la tabla servidesk_database.department: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
REPLACE INTO `department` (`DEPARTMENTID`, `DEPARTMENT`, `CREATED`, `ENABLED`) VALUES
	(49, 'Sistemas', '2021-11-14 18:30:07', 1),
	(52, 'Cobranzas', '0000-00-00 00:00:00', 1);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- Volcando datos para la tabla servidesk_database.level_category_1: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `level_category_1` DISABLE KEYS */;
REPLACE INTO `level_category_1` (`LEVEL_CATEGORY_ID_1`, `LEVEL_1`, `DEPARTMENTID`, `ENABLED`) VALUES
	(28, 'SAP', 49, 1),
	(29, 'Profit', 49, 1);
/*!40000 ALTER TABLE `level_category_1` ENABLE KEYS */;

-- Volcando datos para la tabla servidesk_database.level_category_2: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `level_category_2` DISABLE KEYS */;
REPLACE INTO `level_category_2` (`LEVEL_CATEGORY_ID_2`, `LEVEL_2`, `DEPARTMENTID`, `LEVEL_CATEGORY_ID_1`, `ENABLED`) VALUES
	(68, 'Creacion de usuarios', 49, 28, 1),
	(69, 'Instalcion', 49, 29, 1);
/*!40000 ALTER TABLE `level_category_2` ENABLE KEYS */;

-- Volcando datos para la tabla servidesk_database.level_category_3: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `level_category_3` DISABLE KEYS */;
/*!40000 ALTER TABLE `level_category_3` ENABLE KEYS */;

-- Volcando datos para la tabla servidesk_database.level_category_solution: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `level_category_solution` DISABLE KEYS */;
/*!40000 ALTER TABLE `level_category_solution` ENABLE KEYS */;

-- Volcando datos para la tabla servidesk_database.ticket: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
REPLACE INTO `ticket` (`TICKETID`, `TICKETNUM`, `DESCRIPTION`, `STATUS`, `URGENCY`, `PRIORITY`, `DEPARTMENTID`, `USER_ID`, `level_category_id_1`, `level_category_id_2`, `MESSAGE`, `IMAGE`) VALUES
	(1, 1000000, '0', 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
	(161, 1000001, 'sdsdsd', 2, 0, 30, 49, 11, 28, 68, NULL, NULL);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;

-- Volcando datos para la tabla servidesk_database.ticket_date: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `ticket_date` DISABLE KEYS */;
REPLACE INTO `ticket_date` (`TICKET_DATEID`, `CREATED`, `CHANGED`, `STATUS`, `EXPIRATION`, `TICKETID`) VALUES
	(148, '2021-11-14 20:11:01', '0000-00-00 00:00:00', 0, '0000-00-00', 157),
	(149, '2021-12-27 19:12:17', '0000-00-00 00:00:00', 0, '0000-00-00', 158),
	(150, '2021-12-27 19:12:26', '0000-00-00 00:00:00', 0, '0000-00-00', 159),
	(151, '2021-12-27 19:12:58', '0000-00-00 00:00:00', 0, '0000-00-00', 160),
	(152, '2021-12-27 19:12:37', '0000-00-00 00:00:00', 0, '0000-00-00', 161);
/*!40000 ALTER TABLE `ticket_date` ENABLE KEYS */;

-- Volcando datos para la tabla servidesk_database.user: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`USER_ID`, `USERNAME`, `PASSWORD`, `PERFIL_PIC`, `NAME`, `LASTNAME`, `EMAIL`, `STATUS`, `INTENTS`, `CREATED_ON`, `ENABLED`, `DEPARTMENTID`) VALUES
	(3, 'psierra', '5a5f7a7bdac6bf251a0337ae772f7fa05b89858ad9f8254b3d57966c7ab5e722', NULL, 'Pedro ', 'Sierra', 'psierra@gmail.com', 300, 0, '2021-07-24 00:00:00', 1, 49),
	(4, 'acarnaval', '5a5f7a7bdac6bf251a0337ae772f7fa05b89858ad9f8254b3d57966c7ab5e722', NULL, 'Alfredo', 'Alcarnaval', 'acarnaval@gmail.com', 300, 0, '2021-07-24 00:00:00', 1, 49),
	(11, 'jgolindano', '5a5f7a7bdac6bf251a0337ae772f7fa05b89858ad9f8254b3d57966c7ab5e722', NULL, 'Jader', 'Golindano', 'golindano.jader@gmail.com', 300, 0, '2021-10-20 00:00:00', 1, 49);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
