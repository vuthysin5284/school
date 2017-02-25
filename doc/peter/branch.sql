-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.9 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table aaiischo_ais1.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `brand_name_kh` varchar(250) NOT NULL,
  `brand_name` varchar(250) NOT NULL,
  `prefix` varchar(10) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0:Inactive; 1:active',
  `created_by` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `address` varchar(350) NOT NULL,
  `address1` varchar(350) NOT NULL,
  `address2` varchar(350) NOT NULL,
  `address3` varchar(350) NOT NULL,
  `address4` varchar(350) NOT NULL,
  `is_upload` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='this table using for set location of the school.';

-- Dumping data for table aaiischo_ais1.brand: ~0 rows (approximately)
DELETE FROM `brand`;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
