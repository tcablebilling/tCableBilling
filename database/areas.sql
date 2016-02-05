-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2016 at 03:57 PM
-- Server version: 5.5.44
-- PHP Version: 5.6.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cabletvaccounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Kumarpara', 'KUM', '2016-02-03 11:10:30', '2016-02-03 11:10:30'),
(2, 'Jharnar Par', 'JNP', '2016-02-03 11:11:03', '2016-02-03 11:11:03'),
(3, 'Sawdagar Tula', 'SDT', '2016-02-03 11:11:24', '2016-02-03 11:11:24'),
(4, 'Naiorpool', 'NAIP', '2016-02-03 11:11:57', '2016-02-03 11:11:57'),
(5, 'Mira Bazar', 'MRBZ', '2016-02-03 11:12:22', '2016-02-03 11:12:22'),
(6, 'Dhopa Dighir Par', 'DHDP', '2016-02-03 11:12:49', '2016-02-03 11:12:49'),
(7, 'Jail Road', 'JRD', '2016-02-03 11:13:06', '2016-02-03 11:13:06'),
(8, 'Barut Khana', 'BKHN', '2016-02-03 11:13:32', '2016-02-03 11:13:32'),
(9, 'Puran Lane', 'PRLN', '2016-02-03 11:14:06', '2016-02-03 11:14:06'),
(10, 'Lal Bazar', 'LBZR', '2016-02-03 11:14:30', '2016-02-03 11:14:30'),
(11, 'Bondor', 'BNDR', '2016-02-03 11:15:07', '2016-02-03 11:15:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
