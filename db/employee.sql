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

-- Dumping structure for table school.employee
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_number` varchar(50) NOT NULL DEFAULT '0',
  `latin_name` varchar(50) NOT NULL DEFAULT '0',
  `khmer_name` varchar(50) NOT NULL DEFAULT '0',
  `gender` varchar(50) NOT NULL DEFAULT '0',
  `position` varchar(50) NOT NULL DEFAULT '0',
  `department` varchar(50) NOT NULL DEFAULT '0',
  `phone` varchar(50) NOT NULL DEFAULT '0',
  `joined_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hired_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `email` varchar(150) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `is_delete` int(11) NOT NULL,
  `delete_by` int(11) NOT NULL,
  `delete_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table school.employee: ~2 rows (approximately)
DELETE FROM `employee`;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`id`, `employee_number`, `latin_name`, `khmer_name`, `gender`, `position`, `department`, `phone`, `joined_date`, `hired_date`, `email`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
	(11, '1', 'hout', 'ហ៊ួត', 'male', 'IT', 'building A', '060969848', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'houtkikilu@gmail.com', 'single', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
	(12, '2', 'Eng', 'អេង', 'Male', 'IT', 'Building B', ')965868428', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'buneng99@gmail.com', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
