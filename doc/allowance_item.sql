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

-- Dumping structure for table school1.allowance_item
CREATE TABLE IF NOT EXISTS `allowance_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `allowance_number` varchar(50) NOT NULL,
  `period` varchar(50) DEFAULT NULL,
  `allowance_name` varchar(50) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
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

-- Dumping data for table school1.allowance_item: ~1 rows (approximately)
DELETE FROM `allowance_item`;
/*!40000 ALTER TABLE `allowance_item` DISABLE KEYS */;
INSERT INTO `allowance_item` (`id`, `allowance_number`, `period`, `allowance_name`, `description`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
	(1, '123', 'Weekly', 'God', 'legend', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, '1', '... period ...', '11', '11', 1, 1, '2017-11-15 07:56:26', 1, '2017-11-15 08:09:12', NULL, NULL, NULL);
/*!40000 ALTER TABLE `allowance_item` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
