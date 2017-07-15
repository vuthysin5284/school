-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2017 at 03:43 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL DEFAULT '0',
  `name` varchar(110) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `is_delete` int(11) NOT NULL,
  `delete_by` int(11) NOT NULL,
  `delete_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `code`, `name`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
(2, 'CR', 'Criantain Ronaldo', 1, 1, '2017-07-08 03:10:55', 1, '2017-07-08 03:39:55', 0, 0, '0000-00-00 00:00:00'),
(3, 'BE', 'Buneng', 0, 1, '2017-07-08 03:23:55', 0, '0000-00-00 00:00:00', 1, 1, '2017-07-08 03:42:55'),
(4, 'BB', 'BistleBack', 0, 1, '2017-07-08 05:59:43', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(5, 'NM', 'Neymar', 0, 1, '2017-07-09 09:42:18', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
