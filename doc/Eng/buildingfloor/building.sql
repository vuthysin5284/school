-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2017 at 01:42 PM
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
-- Table structure for table `building`
--

CREATE TABLE IF NOT EXISTS `building` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT '0',
  `building` varchar(150) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `is_delete` int(1) NOT NULL,
  `delete_by` int(11) NOT NULL,
  `delete_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_date` (`created_date`),
  KEY `created_date_2` (`created_date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `branch_id`, `building`, `description`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
(1, 1, 'Building A', 'Building A', 1, 0, '2017-05-14 15:44:56', 0, '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00'),
(2, 0, 'Buliding B', 'Buliding B', 1, 0, NULL, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(3, 0, 'Buliding Cc', 'Buliding Cc', 1, 0, NULL, 1, '2017-05-21 06:16:12', 0, 0, '0000-00-00 00:00:00'),
(4, 0, 'Building D', 'Building D', 1, 1, '2017-05-21 06:36:03', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
