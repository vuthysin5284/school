-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.9 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table school.building
CREATE TABLE IF NOT EXISTS `building` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT '0',
  `building_name` varchar(150) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table school.building: 0 rows
DELETE FROM `building`;
/*!40000 ALTER TABLE `building` DISABLE KEYS */;
/*!40000 ALTER TABLE `building` ENABLE KEYS */;

-- Dumping structure for table school.floor
CREATE TABLE IF NOT EXISTS `floor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) NOT NULL DEFAULT '0',
  `floor` int(10) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0:inactive;1:active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='this table store the information of the school floor';

-- Dumping data for table school.floor: ~7 rows (approximately)
DELETE FROM `floor`;
/*!40000 ALTER TABLE `floor` DISABLE KEYS */;
INSERT INTO `floor` (`id`, `branch_id`, `floor`, `description`, `status`) VALUES
	(1, 0, 0, 'Ground Floor', 1),
	(2, 0, 0, 'First Floor', 1),
	(3, 0, 0, 'Second Floor', 1),
	(4, 0, 0, 'Thirth Floor', 1),
	(5, 0, 0, 'Four Floor', 1),
	(6, 0, 0, 'Five Floor', 1),
	(7, 0, 0, 'Six Floor', 1);
/*!40000 ALTER TABLE `floor` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
