-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2017 at 07:23 AM
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
-- Table structure for table `enrolment`
--

CREATE TABLE `enrolment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
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
-- Dumping data for table `enrolment`
--

INSERT INTO `enrolment` (`id`, `name`, `email`, `address`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_delete`, `delete_by`, `delete_date`) VALUES
(9, 'Buneng', 'buneng@gmail.com', 'Kompot', 1, 1, '2017-07-16 16:30:11', 0, '0017-07-16 16:30:15', 0, 0, '2017-07-16 16:30:34'),
(10, 'Petter', 'peter@gmail.com', 'Kompot', 1, 1, '2017-07-16 16:31:04', 1, '2017-08-10 01:37:57', 0, 0, '2017-07-16 16:31:14'),
(11, 'Hout', 'hout123@gmail.com', 'Phnom Penh', 1, 1, '2017-07-16 16:31:50', 1, '2017-08-10 02:34:16', 0, 0, '2017-07-16 16:32:26'),
(56, 'Heang', 'heang@gmail.com', 'Kompot', 1, 1, '2017-08-06 02:23:50', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(57, 'Pat', 'pat@gmail.com', 'KompongCham', 1, 1, '2017-08-06 02:40:50', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(58, 'Jek', 'jek@gmail.com', 'Siemreap', 1, 1, '2017-08-06 03:04:28', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(59, 'Dina ', 'dina@gmail.com', 'Kompong Cham', 0, 1, '2017-08-06 03:18:28', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrolment`
--
ALTER TABLE `enrolment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrolment`
--
ALTER TABLE `enrolment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
