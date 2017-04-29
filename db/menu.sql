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
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

-- Dumping data for table school.menu: 51 rows
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
	(68, 'Country Data', 'Country Data', 67, 1, 0, 'masterdata/master_data', 'masterdata/master_data', 1, 1, NULL, 1),
	(69, 'Branch Data', 'Branch Data', 67, 2, 0, 'masterdata/master_data', 'masterdata/master_data', 1, 1, NULL, 2),
	(70, 'Room Data', 'Room Data', 67, 3, 0, 'masterdata/master_data', 'masterdata/master_data', 1, 1, NULL, 3),
	(71, 'Classes Data', 'Classes Data', 67, 4, 0, 'masterdata/master_data', 'masterdata/master_data', 1, 1, NULL, 4),
	(72, 'Staffing', 'Staffing', 0, 10, 0, 'staff/staffing', 'staff/staffing', 1, 1, NULL, 10),
	(73, 'Transportation', 'Transportation', 67, 5, 0, 'masterdata/master_data', 'masterdata/master_data', 1, 1, NULL, 5);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table school.room
CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL DEFAULT '0',
  `floor` int(11) NOT NULL DEFAULT '0',
  `building` int(11) NOT NULL DEFAULT '0',
  `room_number` varchar(50) NOT NULL DEFAULT '0',
  `room_name` varchar(50) NOT NULL DEFAULT '0',
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table school.room: 2 rows
DELETE FROM `room`;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` (`id`, `branch_id`, `floor`, `building`, `room_number`, `room_name`, `width`, `height`, `description`, `created_date`, `modified_date`, `created_by`, `modified_by`, `is_delete`, `status`, `delete_by`, `delete_date`) VALUES
	(1, 0, 333, 33, '21', 'Grad 12', 0, 0, 'Grad 12', '2017-04-26 11:39:25', '2017-04-27 11:52:36', 1, 1, 1, 1, 1, '2017-04-28 12:57:12'),
	(2, 0, 22, 111, '22', 'Grad 12 A', 0, 0, 'Grad 12 A', '2017-04-26 11:37:46', '2017-04-27 11:45:36', 1, 1, 0, 1, 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `room` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
