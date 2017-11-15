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

-- Dumping structure for table school1.banksetup
CREATE TABLE IF NOT EXISTS `banksetup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_number` varchar(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `transfer_fee` float NOT NULL,
  `remark` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `is_delete` int(11) NOT NULL,
  `delete_by` int(11) NOT NULL,
  `delete_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table school1.banksetup: ~3 rows (approximately)
DELETE FROM `banksetup`;
/*!40000 ALTER TABLE `banksetup` DISABLE KEYS */;
INSERT INTO `banksetup` (`id`, `bank_number`, `bank_name`, `transfer_fee`, `remark`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
	(1, '234', 'ABC', 100, 'secure', 1, 0, '0000-00-00 00:00:00', 1, '2017-11-15 08:18:13', 0, 0, 0),
	(2, '12', 'crown', 10, 'non-secure', 0, 0, '0000-00-00 00:00:00', 1, '2017-11-15 07:01:41', 0, 0, 0),
	(3, '1', 'Anchor', 10, 'good', 0, 1, '2017-11-15 07:42:32', 1, '2017-11-15 07:05:33', 0, 0, 0);
/*!40000 ALTER TABLE `banksetup` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
