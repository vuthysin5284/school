-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table school.department
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) NOT NULL DEFAULT '0',
  `description` varchar(150) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `is_delete` int(11) NOT NULL,
  `delete_by` int(11) NOT NULL,
  `delete_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table school.department: ~3 rows (approximately)
DELETE FROM `department`;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`id`, `department_name`, `description`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
	(1, 'building A', 'for rent', 1, 0, '0000-00-00 00:00:00', 1, '2017-06-21 02:45:58', 1, 1, '2017-06-21 02:51:58'),
	(2, 'building B', 'for rent', 0, 1, '2017-06-21 02:34:58', 1, '2017-06-24 03:52:14', 0, 0, '0000-00-00 00:00:00'),
	(3, 'building A', 'comfortable', 1, 1, '2017-06-23 07:16:13', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- Dumping structure for table school.position
CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(150) DEFAULT '0',
  `description` varchar(50) DEFAULT '0',
  `status` int(1) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table school.position: ~9 rows (approximately)
DELETE FROM `position`;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` (`id`, `position_name`, `description`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
	(1, 'eng', 'pro', 1, NULL, '2017-06-18 17:19:04', NULL, NULL, 0, 1, '2017-06-21 02:37:19'),
	(2, 'mr peter', 'nothing', 0, 1, '2017-06-21 02:39:18', NULL, NULL, 1, 1, '2017-06-24 03:18:42'),
	(3, 'mr hout test 123', 'rupp', 1, 1, '2017-06-21 02:53:19', 1, '2017-07-01 03:45:00', 0, NULL, NULL),
	(4, 'mr hout', 'rupp', 1, 1, '2017-06-21 02:53:19', NULL, NULL, 1, 1, '2017-06-24 03:21:39'),
	(5, 'hak', 'itc', 1, 1, '2017-06-23 07:27:47', NULL, NULL, 1, 1, '2017-06-23 07:25:48'),
	(6, 'hak', 'itc', 1, 1, '2017-06-24 03:14:39', NULL, NULL, 1, 1, '2017-07-01 02:35:27'),
	(7, 'phal', 'rupp', 1, 1, '2017-06-24 03:33:42', NULL, NULL, NULL, NULL, NULL),
	(8, 'phal', 'rupp1', 1, 1, '2017-06-24 03:55:42', NULL, NULL, 1, 1, '2017-06-24 03:14:44'),
	(9, 'kak', 'ntti', 0, 1, '2017-06-24 03:12:43', NULL, NULL, 0, NULL, NULL),
	(10, 'add', '1', 1, 1, '2017-07-01 02:18:30', NULL, NULL, 0, NULL, NULL);
/*!40000 ALTER TABLE `position` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
