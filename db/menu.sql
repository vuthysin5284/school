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

-- Dumping structure for table school.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `MENU_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MENU_NAME` varchar(1000) NOT NULL,
  `MENU_KHMER_NAME` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MAIN_MENU_ID` int(11) NOT NULL,
  `MENU_ORDER` int(11) DEFAULT '0',
  `IS_LEAF` int(11) DEFAULT '0',
  `check` varchar(50) DEFAULT NULL,
  `LINK` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `LOAD_TYPE` smallint(2) NOT NULL DEFAULT '1',
  `STATUS_ID` smallint(1) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `order_by` int(1) DEFAULT '0',
  PRIMARY KEY (`MENU_ID`,`MAIN_MENU_ID`),
  UNIQUE KEY `TBLMENU_PK` (`MENU_ID`,`MAIN_MENU_ID`),
  UNIQUE KEY `IDX_TBLMENU_1` (`MENU_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

-- Dumping data for table school.menu: 44 rows
DELETE FROM `menu`;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`MENU_ID`, `MENU_NAME`, `MENU_KHMER_NAME`, `MAIN_MENU_ID`, `MENU_ORDER`, `IS_LEAF`, `check`, `LINK`, `LOAD_TYPE`, `STATUS_ID`, `icon`, `order_by`) VALUES
	(1, 'Home', 'Home', 0, 1, 0, 'main/dashboard', 'main/dashboard', 1, 1, 'icon-speedometer', 1),
	(50, 'Student', 'Student', 0, 2, 1, NULL, NULL, 1, 1, 'fa fa-star', 2),
	(4, 'Role', 'Role', 5, 1, 0, 'user_role', 'user/user_role', 1, 1, 'fa fa-gavel', 1),
	(5, 'Security', 'Security', 0, 12, 1, '(NULL)', '(NULL)', 1, 1, 'fa fa-key', 12),
	(6, 'User management', 'User management', 5, 2, 0, 'user_management', 'user/user_management', 1, 1, 'fa fa-users', 2),
	(7, 'Teacher', 'Teacher', 0, 3, 1, NULL, NULL, 1, 1, 'fa fa-rocket', 3),
	(8, 'Teacher profile', 'Teacher profile', 7, 1, 0, '', '', 1, 1, '', 1),
	(57, 'Lession plan', 'Lession plan', 7, 3, 0, 'report/pivot_table', 'report/pivot_table', 1, 1, NULL, 3),
	(9, 'Assign student score', 'Assign student score', 7, 2, 0, '', '', 1, 1, '', 2),
	(10, 'Report', 'Report', 7, 5, 1, '(NULL)', '(NULL)', 1, 1, 'icon-layers', 5),
	(11, 'Teacher report', 'Teacher report', 10, 1, 0, '', '', 1, 1, '', 1),
	(12, 'Lession plan report', 'Lession plan report', 10, 2, 0, '', '', 1, 1, '', 2),
	(13, 'student score report', 'student score report', 10, 3, 0, NULL, NULL, 1, 1, 'fa fa-user', 3),
	(14, 'Parents', 'Parents', 0, 4, 1, '', '', 1, 1, '', 4),
	(15, 'Parent list', 'Parent list', 14, 1, 0, '', '', 1, 1, '', 1),
	(16, 'Quest list', 'Quest list', 14, 2, 0, '', '', 1, 1, '', 2),
	(55, 'Attendance', 'Attendance', 0, 6, 1, '', '', 1, 1, NULL, 6),
	(17, 'Attendance list', 'Attendance list', 55, 1, 0, '(NULL)', '(NULL)', 1, 1, '', 7),
	(44, 'Schedule list', 'Schedule list', 55, 2, 0, '', '', 1, 1, '', 1),
	(43, 'Financial', 'Financial', 0, 7, 1, '', '', 1, 1, '', 7),
	(53, 'Cash Collection', 'Cash Collection', 43, 1, 0, NULL, NULL, 1, 1, NULL, 1),
	(21, 'Revenue', 'Revenue', 43, 2, 0, 'main/profile', 'main/profile', 1, 1, '', 2),
	(22, 'Transaction', 'Transaction', 43, 3, 0, '', '', 1, 1, '', 3),
	(23, 'Financial Reports', 'Financial Reports', 43, 4, 1, '', '', 1, 1, '', 4),
	(24, 'Sale Reports', 'Sale Reports', 23, 1, 0, '', '', 1, 1, 'fa fa-unlock', 1),
	(27, 'Summary AR', 'Summary AR', 23, 2, 0, NULL, NULL, 1, 1, '', 2),
	(47, 'Other Report', 'Other Report', 23, 3, 0, '', '', 1, 1, '', 3),
	(51, 'Payrolls', 'Payrolls', 43, 7, 1, NULL, NULL, 1, 1, NULL, 4),
	(46, 'Create Payroll', 'Create Payroll', 51, 1, 0, '', '', 1, 1, '', 1),
	(52, 'Process Payroll', 'Process Payroll', 51, 2, 0, NULL, NULL, 1, 1, NULL, 2),
	(45, 'Bank Setup', 'Bank Setup', 51, 3, 0, 'email_sale_log', 'log/email_sale_log', 1, 1, 'fa fa-calendar', 3),
	(48, 'Payroll Reports', 'Payroll Reports', 51, 4, 1, NULL, NULL, 1, 1, 'fa fa-star', 4),
	(56, 'Pay Slip', 'Pay Slip', 48, 1, 0, 'main/pivot_mode', 'main/pivot_mode', 1, 1, NULL, 5),
	(54, 'Reports', 'Reports', 0, 8, 1, NULL, NULL, 1, 1, NULL, 8),
	(49, 'Student profile', 'Student profile', 50, 1, 0, 'student/profile', 'student/profile', 1, 1, 'fa fa-star', 1),
	(58, 'Enrolment', 'Enrolment', 50, 2, 0, 'sale/contact', 'sales/contact', 1, 1, 'fa fa-star', 2),
	(59, 'Student record', 'Student record', 50, 3, 0, NULL, NULL, 1, 1, NULL, 3),
	(60, 'Fees management', 'Fees management', 50, 4, 0, NULL, NULL, 1, 1, NULL, 4),
	(61, 'Assignments', 'Assignments', 50, 6, 0, NULL, NULL, 1, 1, NULL, 6),
	(62, 'Tasks', 'Tasks', 50, 5, 0, NULL, NULL, 1, 1, NULL, 5),
	(63, 'Reports', 'Reports', 50, 7, 1, NULL, NULL, 1, 1, NULL, 7),
	(64, 'Student report', 'Student report', 63, 1, 0, NULL, NULL, 1, 1, NULL, 1),
	(65, 'Score report', 'Score report', 63, 2, 0, NULL, NULL, 1, 1, NULL, 2),
	(66, 'Philine report', 'Philine report', 63, 3, 0, NULL, NULL, 1, 1, NULL, 3),
	(67, 'Master Data', 'Master Data', 0, 9, 1, NULL, NULL, 1, 1, NULL, 9),
	(68, 'Country Data', 'Country Data', 67, 1, 0, NULL, NULL, 1, 1, NULL, 1),
	(69, 'Branch Data', 'Branch Data', 67, 2, 0, NULL, NULL, 1, 1, NULL, 2),
	(70, 'Room Data', 'Room Data', 67, 3, 0, NULL, NULL, 1, 1, NULL, 3),
	(71, 'Classes Data', 'Classes Data', 67, 4, 0, NULL, NULL, 1, 1, NULL, 4),
	(72, 'Staffing', 'Staffing', 0, 10, 0, NULL, NULL, 1, 1, NULL, 10);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table school.menu_role
DROP TABLE IF EXISTS `menu_role`;
CREATE TABLE IF NOT EXISTS `menu_role` (
  `ROLE_MENU_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ROLE_ID` int(11) DEFAULT NULL,
  `MENU_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ROLE_MENU_ID`),
  KEY `GROUP_ID` (`ROLE_ID`,`MENU_ID`),
  KEY `IDX_TBLGROUP_MENU_2` (`ROLE_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- Dumping data for table school.menu_role: 22 rows
DELETE FROM `menu_role`;
/*!40000 ALTER TABLE `menu_role` DISABLE KEYS */;
INSERT INTO `menu_role` (`ROLE_MENU_ID`, `ROLE_ID`, `MENU_ID`) VALUES
	(1, 2, 1),
	(2, 2, 49),
	(3, 2, 58),
	(4, 2, 59),
	(5, 2, 60),
	(6, 2, 62),
	(7, 2, 61),
	(28, 2, 70),
	(27, 2, 69),
	(26, 2, 68),
	(11, 2, 4),
	(12, 2, 6),
	(13, 2, 8),
	(14, 2, 9),
	(15, 2, 57),
	(16, 2, 15),
	(17, 2, 16),
	(18, 2, 44),
	(19, 2, 17),
	(20, 2, 53),
	(21, 2, 21),
	(22, 2, 22),
	(23, 2, 11),
	(24, 2, 12),
	(25, 2, 13),
	(29, 2, 71),
	(30, 2, 72);
/*!40000 ALTER TABLE `menu_role` ENABLE KEYS */;

-- Dumping structure for table school.role
DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table school.role: ~2 rows (approximately)
DELETE FROM `role`;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`role_id`, `name`, `description`, `status`) VALUES
	(1, 'Teacher', 'Teacher', 1),
	(2, 'Adminstrator', 'Adminstrator', 1),
	(3, 'Staff', 'Staff', 1),
	(4, 'Parents', 'Parents', 1),
	(5, 'Quest', 'Quest', 1),
	(6, 'Chairman', 'Chairman', 1);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
