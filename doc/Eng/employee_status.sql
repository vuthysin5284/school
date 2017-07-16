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

-- Dumping structure for table school.employee_status
CREATE TABLE IF NOT EXISTS `employee_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_status_name` varchar(150) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table school.employee_status: ~11 rows (approximately)
DELETE FROM `employee_status`;
/*!40000 ALTER TABLE `employee_status` DISABLE KEYS */;
INSERT INTO `employee_status` (`id`, `employee_status_name`, `description`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
	(1, 'peter', 'nothing', 1, NULL, NULL, 1, '2017-07-02 04:36:09', 1, 1, '2017-07-02 04:08:10'),
	(2, 'eng', 'nothing', 1, 1, '2017-06-18 04:05:02', 1, '2017-06-18 04:08:25', 0, NULL, '2017-06-18 16:07:37'),
	(3, 'kaka', 'hero', 1, 1, '2017-06-18 04:55:04', NULL, NULL, 0, NULL, '2017-06-18 16:07:39'),
	(4, 'hout', 'noob', 1, 1, '2017-06-18 04:44:06', NULL, NULL, 0, NULL, '2017-06-18 16:07:40'),
	(5, 'gg', 'noob', 1, 1, '2017-06-18 04:44:10', NULL, NULL, 0, 1, '2017-06-18 04:43:12'),
	(6, 'ert', 'erdtfy', 1, 1, '2017-06-18 04:05:11', NULL, NULL, 1, 1, '2017-06-18 04:54:36'),
	(7, 'rtyj', 'dtyu', 1, 1, '2017-06-18 04:36:12', NULL, NULL, 1, 1, '2017-06-18 04:10:37'),
	(8, 'ewqt', 'wery', 1, 1, '2017-06-18 04:55:21', NULL, NULL, 1, 1, '2017-06-18 04:00:37'),
	(9, 'wery', 'ertiuri', 1, 1, '2017-06-18 04:54:26', NULL, NULL, 1, 1, '2017-06-18 04:05:37'),
	(10, 'last', '123', 1, 1, '2017-06-18 04:49:29', NULL, NULL, 0, NULL, NULL),
	(11, 'gggg', 'ee', 0, 1, '2017-06-18 04:12:30', NULL, NULL, 1, 1, '2017-06-18 04:17:37'),
	(12, 'ehhh', 'qwwee', 1, 1, '2017-06-18 04:11:32', NULL, NULL, 1, 1, '2017-06-18 04:21:37'),
	(13, 'peter', 'nothing', 0, 1, '2017-06-18 04:41:35', 1, '2017-06-18 04:50:35', 1, 1, '2017-06-18 04:56:35'),
	(14, 'master', 'data', 1, 1, '2017-07-02 04:51:09', 1, '2017-07-05 09:47:54', 1, 1, '2017-07-08 03:17:05'),
	(15, 'mr eng', 'pro', 1, 1, '2017-07-08 03:29:13', NULL, NULL, 0, NULL, NULL);
/*!40000 ALTER TABLE `employee_status` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
