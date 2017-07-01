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
-- Table structure for table `manage_route`
--

CREATE TABLE IF NOT EXISTS `manage_route` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_name` varchar(250) NOT NULL,
  `route_fare` varchar(50) NOT NULL,
  `two_way` varchar(50) NOT NULL,
  `one_way` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` int(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `is_delete` int(11) NOT NULL,
  `delete_by` int(11) NOT NULL,
  `delete_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `manage_route`
--

INSERT INTO `manage_route` (`id`, `route_name`, `route_fare`, `two_way`, `one_way`, `description`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
(1, '1', '1', '1', '1', 'nothing', 1, 0, '0000-00-00 00:00:00', 1, '2017-06-23 11:52:36', 0, 0, '0000-00-00 00:00:00'),
(2, '1', '2', '1', '2', 'tttrrr', 0, 0, '0000-00-00 00:00:00', 1, '2017-06-24 04:17:57', 0, 0, '0000-00-00 00:00:00'),
(3, '2', '3', '4', '5', 'ttttt', 1, 1, '2017-06-24 04:06:57', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(4, '2', '4', '55', '55', '55555', 1, 1, '2017-06-24 05:20:13', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
