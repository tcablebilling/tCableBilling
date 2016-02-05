-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2016 at 03:56 PM
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
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fee` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `fee`, `created_at`, `updated_at`) VALUES
(1, 'D-SILVER-300', 300, '2016-02-02 08:49:12', '2016-02-02 08:49:12'),
(2, 'D-GOLD-400', 400, '2016-02-02 08:51:07', '2016-02-02 08:51:07'),
(3, 'D-PLATINUM-500', 500, '2016-02-02 08:51:51', '2016-02-02 08:51:51'),
(4, 'A-GOLD-400', 400, '2016-02-02 08:52:30', '2016-02-02 08:52:30'),
(5, 'A-SILVER-A-350', 350, '2016-02-02 08:52:56', '2016-02-02 08:52:56'),
(6, 'A-SILVER-B-300', 300, '2016-02-02 08:53:26', '2016-02-02 08:53:26'),
(7, 'A-SILVER-C-250', 250, '2016-02-02 08:53:54', '2016-02-02 08:53:54'),
(8, 'A-SILVER-D-200', 200, '2016-02-02 08:54:19', '2016-02-02 08:54:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
