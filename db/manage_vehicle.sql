-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2017 at 05:57 PM
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
-- Table structure for table `manage_vehicle`
--

CREATE TABLE IF NOT EXISTS `manage_vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_number` varchar(50) NOT NULL,
  `total_seat` int(50) NOT NULL,
  `total_seat_allow` int(50) NOT NULL,
  `ownership_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `is_delete` int(11) NOT NULL,
  `delete_by` int(11) NOT NULL,
  `delete_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `manage_vehicle`
--

INSERT INTO `manage_vehicle` (`id`, `vehicle_number`, `total_seat`, `total_seat_allow`, `ownership_id`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
(1, '12', 12, 12, 2, 1, 1, '0000-00-00 00:00:00', 1, '2017-06-24 04:34:13', 0, 1, '2017-06-12 10:27:42'),
(2, '3333', 33, 33, 2, 1, 0, '0000-00-00 00:00:00', 1, '2017-06-24 04:25:47', 0, 1, '2017-06-24 04:35:26'),
(3, '12', 12, 1, 1, 1, 1, '2017-06-24 04:52:49', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(4, '12', 12, 12, 2, 0, 1, '2017-06-24 04:01:55', 1, '2017-06-24 04:17:55', 0, 0, '0000-00-00 00:00:00'),
(5, '5', 5, 5, 1, 1, 1, '2017-06-24 10:52:56', 1, '2017-06-24 10:01:57', 0, 0, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
