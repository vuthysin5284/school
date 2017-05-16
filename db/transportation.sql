-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2017 at 03:58 PM
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
-- Table structure for table `transportation`
--

CREATE TABLE IF NOT EXISTS `transportation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `number_vehicle` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` varchar(250) CHARACTER SET utf8 NOT NULL,
  `route_fare` varchar(50) CHARACTER SET utf8 NOT NULL,
  `two_way` varchar(50) CHARACTER SET utf8 NOT NULL,
  `one_way` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` int(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `is_delete` int(11) NOT NULL,
  `delete_by` int(11) NOT NULL,
  `delete_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `transportation`
--

INSERT INTO `transportation` (`id`, `route_name`, `number_vehicle`, `description`, `route_fare`, `two_way`, `one_way`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
(1, 'SAT', '22', 'Nothing', '22', '2', '1', 1, 0, '0000-00-00 00:00:00', 1, '2017-05-16 08:16:49', 0, 0, '0000-00-00 00:00:00'),
(2, 'MON', '23', 'nothing', '25', '3', '1', 1, 1, '2017-05-13 04:19:10', 1, '2017-05-16 08:03:50', 1, 1, '2017-05-16 08:51:49'),
(3, 'SM', '2222', 'Nothing', '22', '2', '1', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(4, 'SAT', '2223', 'Nothing', '22', '2', '1', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(5, 'SAT', '2223', 'Nothing', '22', '2', '1', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(6, 'SAT', '2223', 'Nothing', '22', '2', '1', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(7, 'SAT', '2223', 'Nothing', '22', '2', '1', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(8, 'SAT', '2223', 'Nothing', '22', '2', '1', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(9, 'SAT', '2223', 'Nothing', '22', '2', '1', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(10, 'SAT', '2223', 'Nothing', '22', '2', '1', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(11, 'SAT', '2223', 'Nothing', '22', '2', '1', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(12, 'SAT', '2223', 'Nothing', '22', '2', '1', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(13, 'SAT', '2223', 'Nothing', '22', '2', '1', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(14, 'SAT', '2223', 'Nothing', '22', '2', '1', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(15, 'SAT', '2223', 'Nothing', '22', '2', '1', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
