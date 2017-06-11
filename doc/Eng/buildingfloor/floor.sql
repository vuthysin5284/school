-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2017 at 01:43 PM
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
-- Table structure for table `floor`
--

CREATE TABLE IF NOT EXISTS `floor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) NOT NULL DEFAULT '0',
  `floor` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0:inactive;1:active',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `is_delete` int(11) NOT NULL,
  `delete_by` int(11) NOT NULL,
  `delete_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='this table store the information of the school floor' AUTO_INCREMENT=18 ;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`id`, `branch_id`, `floor`, `description`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
(1, 1, 'Ground Floor', 'Ground Floor', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(2, 1, 'First Floor', 'First Floor', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(3, 1, 'Second Floor', 'Second Floor', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(4, 1, 'Thirth Floors', 'Thirth Floors', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(5, 1, 'Four Floor', 'Four Floor', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(6, 1, 'Five Floor', 'Five Floor', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(7, 1, 'Six Floor', 'Six Floor', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(12, 0, 'seven floor', 'seven floor', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(13, 0, '234', 'ghjklkjhgf', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(14, 0, '3', 'Eight', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(15, 0, 'Buliding B', 'Buliding B', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(16, 0, 'Buliding C', 'Buliding C', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(17, 0, 'Buliding Bc', 'Buliding Bb', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
