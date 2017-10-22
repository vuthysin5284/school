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

-- Dumping structure for table school1.employee_general
CREATE TABLE IF NOT EXISTS `employee_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_code` varchar(16) DEFAULT NULL,
  `last_name_kh` varchar(100) NOT NULL,
  `first_name_kh` varchar(100) NOT NULL,
  `latin_last_name` varchar(100) NOT NULL,
  `latin_first_name` varchar(100) NOT NULL,
  `national_card` varchar(16) NOT NULL,
  `id_expiry_date` date NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(50) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `mirrital_status` int(11) NOT NULL,
  `nationality` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `hired_date` date NOT NULL,
  `home_phone` varchar(39) DEFAULT NULL,
  `cell_phone` varchar(39) DEFAULT NULL,
  `extention_num` varchar(10) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `pos_class` int(11) DEFAULT '0',
  `remark` varchar(150) DEFAULT NULL,
  `job_level` int(11) NOT NULL,
  `employee_status` int(11) NOT NULL,
  `position_level` int(11) NOT NULL,
  `confirm_date` datetime NOT NULL,
  `confirm_status` int(11) NOT NULL,
  `leaving_reason` int(11) NOT NULL,
  `leaving_date` datetime NOT NULL,
  `department` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `main_section` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `sub_location` int(11) NOT NULL,
  `line` int(11) NOT NULL,
  `work_shift` int(11) NOT NULL,
  `comments` varchar(250) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table school1.employee_general: ~1 rows (approximately)
DELETE FROM `employee_general`;
/*!40000 ALTER TABLE `employee_general` DISABLE KEYS */;
INSERT INTO `employee_general` (`id`, `emp_code`, `last_name_kh`, `first_name_kh`, `latin_last_name`, `latin_first_name`, `national_card`, `id_expiry_date`, `date_of_birth`, `place_of_birth`, `gender_id`, `mirrital_status`, `nationality`, `country`, `hired_date`, `home_phone`, `cell_phone`, `extention_num`, `email_address`, `address`, `pos_class`, `remark`, `job_level`, `employee_status`, `position_level`, `confirm_date`, `confirm_status`, `leaving_reason`, `leaving_date`, `department`, `section`, `main_section`, `location`, `sub_location`, `line`, `work_shift`, `comments`, `created_by`, `created_date`, `modified_by`, `modified_date`, `status`) VALUES
	(1, NULL, 'ប៊ុន អេង', 'eng', 'Bun', 'Eng', '1053272', '0000-00-00', '1970-01-01', 'kampot', 1, 0, 0, 0, '0000-00-00', '0965868428', '060969848', '115327', 'Phnom Penh', 'No7', 0, 'good', 0, 0, 0, '2017-09-02 15:50:55', 0, 0, '2017-09-02 15:50:58', 0, 0, 0, 0, 0, 0, 0, 'Pro from Cambodia', NULL, NULL, 1, '2017-10-22 15:04:31', 1);
/*!40000 ALTER TABLE `employee_general` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
