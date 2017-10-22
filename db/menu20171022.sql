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

-- Dumping structure for table eds.menu
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
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

-- Dumping data for table eds.menu: 74 rows
DELETE FROM `menu`;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`MENU_ID`, `MENU_NAME`, `MENU_KHMER_NAME`, `MAIN_MENU_ID`, `MENU_ORDER`, `IS_LEAF`, `check`, `LINK`, `LOAD_TYPE`, `STATUS_ID`, `icon`, `order_by`) VALUES
	(1, 'dashboard', 'ទំព័រមុខ', 0, 1, 0, 'main/dashboard', 'main/dashboard', 1, 1, 'icon-speedometer', 1),
	(50, 'student', 'Student', 0, 2, 1, NULL, NULL, 1, 0, 'fa fa-star', 2),
	(4, 'role', 'កំណត់តួនាទី', 5, 1, 0, 'user_role', 'user/user_role', 1, 1, 'fa fa-gavel', 1),
	(5, 'security', 'សុវត្ថិភាព', 0, 14, 1, '(NULL)', '(NULL)', 1, 1, 'fa fa-key', 14),
	(6, 'user_management', 'តារាងអ្នកប្រើប្រាស់', 5, 2, 0, 'user_management', 'user/user_management', 1, 1, 'fa fa-users', 2),
	(7, 'teacher', 'Teacher', 0, 3, 1, NULL, NULL, 1, 1, 'fa fa-user', 3),
	(8, 'teacher_profile', 'ប្រវត្តិរូបគ្រូ', 7, 1, 0, '', '', 1, 1, '', 1),
	(57, 'lession_plan', 'ផែនការ​មេរៀន', 7, 3, 0, 'report/pivot_table', 'report/pivot_table', 1, 1, NULL, 3),
	(9, 'assign_student_score', 'ផ្តល់ពិន្ទុសិស្ស', 7, 2, 0, '', '', 1, 1, '', 2),
	(11, 'teacher_report', 'Teacher report', 10, 1, 0, '', '', 1, 1, '', 1),
	(12, 'lession_plan_report', 'Lession plan report', 10, 2, 0, '', '', 1, 1, '', 2),
	(13, 'student_score_report', 'student score report', 10, 3, 0, NULL, NULL, 1, 1, 'fa fa-user', 3),
	(14, 'academic', 'ឆ្នាំសិក្សា', 0, 4, 1, '', '', 1, 1, 'fa fa-graduation-cap', 4),
	(15, 'enrollment_management', 'ចុះឈ្មោះសិស្សចូលរៀន', 14, 3, 0, 'student/index', 'student', 1, 1, '', 3),
	(16, 'promote_management', 'គ្រប់គ្រងការឡើងថ្នាក់', 14, 5, 0, 'promote/index', 'promote', 1, 1, '', 5),
	(55, 'attendance', 'កំរង់វត្តមាន', 0, 6, 1, '', '', 1, 1, 'fa fa-bars', 6),
	(17, 'attendance_list', 'តារាងអវត្តមាន', 55, 1, 0, 'student/exam/result_score', 'examination/result_score', 1, 1, '', 7),
	(44, 'schedule_list', 'តារាងកាលវិភាគ', 55, 2, 0, 'student/exam/result_score', 'examination/result_score', 1, 1, '', 1),
	(43, 'financial', 'ហិរញ្ញវត្ថុ', 0, 7, 1, 'finance', 'finance', 1, 1, 'fa fa-money', 7),
	(79, 'suppliers_list', 'បញ្ជីអ្នកផ្គត់ផ្គង់', 78, 1, 0, NULL, NULL, 1, 1, NULL, 1),
	(24, 'sale_reports', 'Sale Reports', 23, 1, 0, '', '', 1, 1, 'fa fa-unlock', 1),
	(27, 'summary_AR', 'Summary AR', 23, 2, 0, NULL, NULL, 1, 1, '', 2),
	(47, 'other_report', 'Other Report', 23, 3, 0, '', '', 1, 1, '', 3),
	(51, 'payrolls', 'បញ្ជីប្រាក់ខែ', 43, 7, 1, NULL, NULL, 1, 1, NULL, 4),
	(46, 'create_payroll', 'Create Payroll', 51, 1, 0, '', '', 1, 1, '', 1),
	(52, 'process_payroll', 'Process Payroll', 51, 2, 0, NULL, NULL, 1, 1, NULL, 2),
	(45, 'bank_setup', 'Bank Setup', 51, 3, 0, 'email_sale_log', 'log/email_sale_log', 1, 1, 'fa fa-calendar', 3),
	(48, 'payroll_reports', 'Payroll Reports', 51, 4, 1, NULL, NULL, 1, 1, 'fa fa-star', 4),
	(56, 'payslip', 'Pay Slip', 48, 1, 0, 'main/pivot_mode', 'main/pivot_mode', 1, 1, NULL, 5),
	(54, 'reports', 'របាយការណ៌', 0, 11, 1, NULL, NULL, 1, 1, 'fa fa-bar-chart', 11),
	(49, 'student_profile', 'ប្រវត្តិរូបរបស់សិស្ស', 50, 1, 0, 'student/profile', 'student/profile', 1, 0, 'fa fa-star', 1),
	(58, 'score_management', 'គ្រប់គ្រងពន្ទុសិស្ស', 14, 7, 0, 'student/score/index', 'score/index', 1, 1, NULL, 7),
	(59, 'student_record', 'កំណត់ត្រាសិស្ស', 50, 3, 0, NULL, NULL, 1, 1, NULL, 3),
	(60, 'fees_management', 'ការគ្រប់គ្រងថ្លៃ', 50, 4, 0, NULL, NULL, 1, 0, NULL, 4),
	(61, 'Examination_management', 'គ្រប់គ្រងការប្រឡង', 14, 6, 0, 'student/exam/index', 'examination/index', 1, 1, NULL, 4),
	(62, 'tasks', 'ភារកិច្ច', 50, 5, 0, NULL, NULL, 1, 0, NULL, 5),
	(63, 'reports', 'របាយការណ៍', 50, 7, 1, NULL, NULL, 1, 1, NULL, 7),
	(64, 'student_report', 'Student report', 63, 1, 0, NULL, NULL, 1, 1, NULL, 1),
	(65, 'score_report', 'Score report', 63, 2, 0, NULL, NULL, 1, 1, NULL, 2),
	(66, 'philine_report', 'Philine report', 63, 3, 0, NULL, NULL, 1, 1, NULL, 3),
	(67, 'master_data', 'ទិន្នន័យមេ', 0, 13, 1, NULL, NULL, 1, 1, 'fa fa-cogs', 13),
	(68, 'location', 'កំណត់ទីតាំង', 67, 2, 0, 'menu/master_data', 'masterdata/master_data', 1, 0, NULL, 2),
	(69, 'acadamic_setup', 'Acadamic Setup', 67, 1, 0, 'menu/master_data', 'masterdata/master_data', 1, 1, NULL, 1),
	(70, 'setup_place', 'កំណត់ទីតាំង', 67, 3, 0, 'menu/setup', 'setup/setup_data', 1, 1, NULL, 3),
	(71, 'classes_data', 'ទិន្នន័យរបស់ថ្នាក់', 67, 4, 0, '', '', 1, 0, NULL, 4),
	(72, 'human_resource', 'ធនធានមនុស្ស', 0, 9, 1, NULL, NULL, 1, 1, 'fa fa-users', 9),
	(73, 'fleet_management', 'គ្រប់គ្រងការដឹកជញ្ជូន', 98, 1, 0, 'transportation', 'transportation', 1, 1, 'fa fa-bus', 1),
	(75, 'staffing_management', 'ការគ្រប់គ្រងបុគ្គលិក', 72, 1, 0, 'staff', 'staff', 1, 1, 'fa fa-user', 2),
	(76, 'leave_management', 'គ្រប់គ្រងការឈប់សំរាក', 72, 2, 0, 'leave', 'leave', 1, 1, 'fa fa-frown-o', 2),
	(77, 'payrolls_management', 'បញ្ជីប្រាក់ខែ', 72, 4, 0, 'human/payroll', 'human/payroll', 1, 1, 'fa fa-usd', 4),
	(78, 'miscellaneous', 'ផ្សេងៗ', 0, 12, 1, NULL, NULL, 1, 1, 'fa fa-rocket', 12),
	(80, 'stationery', 'សម្ភារៈការិយាល័យ', 78, 2, 0, NULL, NULL, 1, 1, NULL, 2),
	(81, 'clinic', 'គ្លីនិក', 78, 3, 0, NULL, NULL, 1, 1, NULL, 3),
	(82, 'testing_enrollment', 'ចុះឈ្មោះសិស្សប្រឡងសាក', 14, 2, 0, 'testing_register/index', 'testing_register', 1, 1, NULL, 2),
	(83, 'setup_HR', 'កំណត់ធនធានមនុស្ស', 67, 3, 0, 'staff/hrSetup', 'hrsetup', 1, 1, NULL, 3),
	(84, 'setup_pleave', 'កំណត់ច្បាប់ឈប់សំរាក់', 67, 4, 0, 'leave/SetupLeave', 'setupLeave/index', 1, 1, NULL, 4),
	(85, 'expense_management', 'ការគ្រប់គ្រងការចំណាយ', 43, 1, 0, 'finance', 'finance', 1, 1, NULL, 1),
	(86, 'setup_expense_type', 'កំណត់ថ្លៃចំណាយ', 67, 5, 0, '', '', 1, 1, NULL, 5),
	(87, 'property', 'ទ្រព្យសម្បត្តិ', 78, 4, 0, NULL, NULL, 1, 1, NULL, 4),
	(88, 'setup_payroll', 'កំណត់បញ្ជីបើកប្រាក់ខែ', 67, 6, 0, 'payroll/Payrollsetup', 'Payrollsetup', 1, 1, NULL, 6),
	(89, 'revenue', 'ប្រាក់ចំណូល', 43, 2, 0, NULL, NULL, 1, 1, NULL, 2),
	(90, 'cashcollection', 'ការប្រមូលប្រាក់', 43, 3, 0, NULL, NULL, 1, 1, NULL, 3),
	(91, 'pending_invoicing', 'រង់ចាំការទូទាត់', 43, 4, 0, NULL, NULL, 1, 1, NULL, 4),
	(92, 'sale_report', 'របាយការណ៍លក់', 43, 5, 0, NULL, NULL, 1, 1, NULL, 5),
	(93, 'summary_report', 'របាយការណ៍សង្ខេប', 43, 0, 0, NULL, NULL, 1, 1, NULL, 6),
	(94, 'finance_report', 'ព័ត៌មានមាតាបិតា', 54, 1, 0, 'report/parent', 'report/parent', 1, 1, NULL, 1),
	(95, 'human_resource', 'ព័ត៌មានបងប្អូន', 54, 2, 0, 'report/sibling', 'report/sibling', 1, 1, NULL, 2),
	(96, 'student_report', 'បញ្ជីគ្រួសារ', 54, 3, 0, 'report/family', 'report/family', 1, 1, NULL, 3),
	(97, 'finally_result_score', 'លទ្ធផលសិស្សពិន្ទុសរុប', 14, 8, 0, 'student/score/result_score', 'score/result_score', 1, 1, NULL, 8),
	(98, 'administrative', 'administrative', 0, 10, 1, NULL, NULL, 1, 1, 'fa fa-eye', 10),
	(99, 'fleet_report', 'fleet_report', 54, 4, 0, NULL, NULL, 1, 1, NULL, 4),
	(100, 'miscellaneous_report', 'miscellaneous_report', 54, 5, 0, NULL, NULL, 1, 1, NULL, 5),
	(101, 'event_management', 'event_management', 98, 2, 0, NULL, NULL, 1, 1, 'fa fa-history', 2),
	(102, 'time_sheet', 'time_sheet', 72, 3, 0, NULL, NULL, 1, 1, 'fa fa-clock-o', 3),
	(103, 'item_master', 'item_master', 67, 7, 0, 'item/itemsetup', 'itemsetup', 1, 1, NULL, 7);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
