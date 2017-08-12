-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2017 at 05:50 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `testing_register`
--

CREATE TABLE IF NOT EXISTS `testing_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(250) NOT NULL,
  `middle_name` varchar(250) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(300) NOT NULL,
  `test_id` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `is_delete` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `deleted_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `testing_register`
--

INSERT INTO `testing_register` (`id`, `student_name`, `middle_name`, `gender_id`, `nationality`, `date_of_birth`, `address`, `test_id`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `deleted_by`, `deleted_date`) VALUES
(1, 'Thy', 'Thy', 1, 'Khmer', '1994-12-09', 'Phnom Penh', 'ST1234', 1, 0, '0000-00-00 00:00:00', 1, '2017-07-07 10:54:34', 0, 0, '0000-00-00 00:00:00'),
(2, 'TER', 'TER', 1, 'Khmer', '2017-07-14', 'Kampot', 'ST1111', 1, 1, '2017-07-02 02:33:44', 1, '2017-07-02 02:06:53', 0, 0, '0000-00-00 00:00:00'),
(3, '1', '1', 3, 'fdd', '2017-07-13', 'dfdf', 'dfdf', 1, 1, '2017-07-02 02:48:52', 0, '0000-00-00 00:00:00', 1, 1, '2017-07-02 02:57:52'),
(4, '2', '2', 1, '22', '2017-07-06', '22', '22', 1, 1, '2017-07-02 04:43:08', 0, '0000-00-00 00:00:00', 1, 1, '2017-07-07 10:06:16'),
(5, 'w', '', 2, '', '0000-00-00', '', '', 1, 1, '2017-07-07 10:25:30', 1, '2017-07-07 10:49:34', 0, 0, '0000-00-00 00:00:00'),
(6, 'zs', '', 2, '', '0000-00-00', '', '', 1, 1, '2017-07-07 10:54:30', 1, '2017-07-07 10:37:34', 0, 0, '0000-00-00 00:00:00'),
(7, '4', '4', 1, '4', '2017-08-08', '4', '4', 1, 1, '2017-08-06 03:35:46', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
