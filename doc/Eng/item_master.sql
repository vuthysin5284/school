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

-- Dumping structure for table school1.item_master
CREATE TABLE IF NOT EXISTS `item_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(150) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `type` int(11) NOT NULL COMMENT '1:admin fee, 2:transport, 3:lunch, 4:school item',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `is_delete` int(11) NOT NULL,
  `delete_by` int(11) NOT NULL,
  `delete_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Dumping data for table school1.item_master: ~15 rows (approximately)
DELETE FROM `item_master`;
/*!40000 ALTER TABLE `item_master` DISABLE KEYS */;
INSERT INTO `item_master` (`id`, `description`, `status`, `type`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
	(1, 'good', 1, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, '2018-01-06 03:33:16'),
	(2, 'Love', 1, 1, 0, '0000-00-00 00:00:00', 1, '2018-01-08 03:05:17', 0, 1, '2018-01-06 03:25:18'),
	(3, 'eng', 1, 0, 1, '2017-12-16 04:25:12', 1, '2018-01-07 04:04:48', 0, 1, '2018-01-06 03:30:18'),
	(4, 'hout', 1, 0, 1, '2017-12-17 01:15:31', 0, '0000-00-00 00:00:00', 0, 1, '2018-01-06 02:36:40'),
	(5, 'koo', 1, 0, 1, '2017-12-17 02:55:20', 1, '2018-01-13 05:26:20', 0, 1, '2018-01-06 01:47:10'),
	(6, 'meng', 1, 0, 1, '2017-12-24 03:17:22', 1, '2018-01-08 03:15:16', 1, 1, '2018-01-08 04:22:22'),
	(8, 'voat', 1, 0, 1, '2017-12-24 04:28:48', 1, '2018-01-06 04:29:06', 1, 1, '2018-01-08 04:00:20'),
	(9, 'abcd', 1, 0, 1, '2018-01-06 01:39:02', 1, '2018-01-06 04:11:10', 1, 1, '2018-01-08 03:13:53'),
	(10, 'terter', 0, 0, 0, '2018-01-07 05:20:14', 1, '2018-01-08 04:16:02', 1, 1, '2018-01-08 04:56:18'),
	(13, 'MrrNo', 0, 0, 1, '2018-01-08 03:15:42', 1, '2018-01-08 03:33:57', 1, 1, '2018-01-08 03:26:52'),
	(14, 'buneng', 0, 0, 1, '2018-01-08 04:40:41', 0, '0000-00-00 00:00:00', 1, 1, '2018-01-08 04:45:41'),
	(15, 'wwwwwwwwwwwww', 0, 0, 1, '2018-01-08 04:56:52', 1, '2018-01-08 05:11:00', 1, 1, '2018-01-08 05:10:03'),
	(16, 'abc', 1, 0, 1, '2018-01-13 05:37:02', 1, '2018-01-13 05:22:20', 0, 0, '0000-00-00 00:00:00'),
	(17, 'affff', 1, 0, 1, '2018-01-13 05:15:13', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
	(18, 'gg', 1, 0, 1, '2018-01-13 05:33:20', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `item_master` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
