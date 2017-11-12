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

-- Dumping structure for table school1.payrollsetup
CREATE TABLE IF NOT EXISTS `payrollsetup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payroll_tax_name_kh` varchar(50) DEFAULT NULL,
  `payroll_tax_name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(39) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `prefix` varchar(25) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table school1.payrollsetup: ~0 rows (approximately)
DELETE FROM `payrollsetup`;
/*!40000 ALTER TABLE `payrollsetup` DISABLE KEYS */;
INSERT INTO `payrollsetup` (`id`, `payroll_tax_name_kh`, `payroll_tax_name`, `phone_number`, `email`, `prefix`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
	(1, 'អេង', 'Eng', '0965868428', 'engpro@gmail.com', 'Ps', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `payrollsetup` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
