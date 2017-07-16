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

-- Dumping structure for table school.position_status
CREATE TABLE IF NOT EXISTS `position_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_status_name` varchar(150) DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table school.position_status: ~2 rows (approximately)
DELETE FROM `position_status`;
/*!40000 ALTER TABLE `position_status` DISABLE KEYS */;
INSERT INTO `position_status` (`id`, `position_status_name`, `description`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
	(1, 'Eng', '168', 1, 1, '2017-07-05 10:14:04', NULL, NULL, 0, NULL, NULL),
	(2, 'peter', '068', 1, 1, '2017-07-05 10:28:04', 1, '2017-07-05 10:32:04', 0, NULL, NULL);
/*!40000 ALTER TABLE `position_status` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
