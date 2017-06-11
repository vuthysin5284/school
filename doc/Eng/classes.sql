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

-- Dumping structure for table school.classes
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL DEFAULT '0',
  `floor` int(11) NOT NULL DEFAULT '0',
  `building` int(11) NOT NULL DEFAULT '0',
  `classes_number` varchar(50) NOT NULL DEFAULT '0',
  `classes_name` varchar(50) NOT NULL DEFAULT '0',
  `width` float NOT NULL DEFAULT '0',
  `height` float NOT NULL DEFAULT '0',
  `description` varchar(500) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `delete_by` int(11) NOT NULL DEFAULT '0',
  `delete_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table school.classes: ~3 rows (approximately)
DELETE FROM `classes`;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` (`id`, `branch_id`, `floor`, `building`, `classes_number`, `classes_name`, `width`, `height`, `description`, `created_date`, `modified_date`, `created_by`, `modified_by`, `is_delete`, `status`, `delete_by`, `delete_date`) VALUES
	(1, 1, 5, 34, '122', 'Basic', 0, 0, 'this class', '2017-04-30 00:00:00', '2017-04-30 06:08:26', 0, 1, 1, 1, 1, '2017-04-30 06:47:20'),
	(2, 0, 23, 21, '123', 'High', 0, 0, 'for bh', '2017-04-30 05:11:51', '2017-04-30 05:46:51', 1, 1, 0, 0, 0, '0000-00-00 00:00:00'),
	(3, 0, 67, 105, '124', 'AB', 0, 0, 'everything', '2017-05-13 02:50:06', '2017-05-14 02:12:27', 1, 1, 0, 1, 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
