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

-- Dumping structure for table school1.deduction_item
CREATE TABLE IF NOT EXISTS `deduction_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deduction_number` varchar(50) NOT NULL,
  `deduction_item` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime NOT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `delete_by` int(11) NOT NULL,
  `delete_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table school1.deduction_item: ~3 rows (approximately)
DELETE FROM `deduction_item`;
/*!40000 ALTER TABLE `deduction_item` DISABLE KEYS */;
INSERT INTO `deduction_item` (`id`, `deduction_number`, `deduction_item`, `description`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
	(1, '232', 'abc', 'good', 1, 0, '0000-00-00 00:00:00', 1, '2017-11-15 08:58:14', NULL, 0, '0000-00-00 00:00:00'),
	(2, '12', 'anchor', 'weak', 0, 1, '2017-11-12 06:41:08', NULL, '0000-00-00 00:00:00', NULL, 0, '0000-00-00 00:00:00'),
	(3, '1', 'abc', 'strong', 0, 1, '2017-11-15 06:45:05', 1, '2017-11-15 06:01:06', NULL, 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `deduction_item` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
