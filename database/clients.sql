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
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) unsigned NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection_type` enum('home','office','business','govt') COLLATE utf8_unicode_ci NOT NULL,
  `channel_package` bigint(20) NOT NULL,
  `client_status` enum('active','suspended','deactive') COLLATE utf8_unicode_ci NOT NULL,
  `address_proof` enum('voter_id','passport','electricity_bill','gas_bill','driving_license') COLLATE utf8_unicode_ci NOT NULL,
  `address_proof_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `device_box_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_id`, `area`, `name`, `phone_no_1`, `phone_no_2`, `address`, `connection_type`, `channel_package`, `client_status`, `address_proof`, `address_proof_no`, `device_box_no`, `created_at`, `updated_at`) VALUES
(1, 'KUM-009', 1, 'Khan Mohammad Rashedun-Naby', '01676290850', '01818270292', '56/B, Kumarpara,\r\nSurma R/A, Sylhet.', 'govt', 2, 'active', '', 'kkkkkkkkkkkkkk', 'ddddddddddddddd', '2016-02-02 12:04:06', '2016-02-03 11:15:47'),
(2, 'NAIP-005', 4, 'Kawsar Ahmed', '099867546', '0984598675', '54/B, Khulia Para,\r\nAkhalia, Sylhet-3400\r\nBangladesh.', 'home', 2, 'active', 'passport', 'fajklfjaklf', 'afadfafaad', '2016-02-04 07:45:26', '2016-02-04 07:45:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
