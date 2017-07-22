-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 22, 2017 at 01:58 AM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoes`
--
CREATE DATABASE IF NOT EXISTS `shoes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shoes`;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_name` varchar(30) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_name`, `price`, `id`) VALUES
('nike', 1, 8),
('puma', 2, 9),
('wqert', 3, 10),
('qsdt', 34, 13);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `store_name` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`store_name`, `address`, `id`) VALUES
('the ', '12 nw', 1),
('town', '12 nw', 2),
('what', 'qww', 3);

-- --------------------------------------------------------

--
-- Table structure for table `stores_brands`
--

CREATE TABLE `stores_brands` (
  `store_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stores_brands`
--

INSERT INTO `stores_brands` (`store_id`, `brand_id`, `id`) VALUES
(1, 1, 1),
(1, 1, 2),
(1, 1, 3),
(3, 4, 4),
(1, 4, 5),
(1, 4, 6),
(3, 4, 7),
(3, 4, 8),
(2, 6, 10),
(2, 4, 11),
(1, 7, 12),
(1, 8, 13),
(1, 9, 14),
(1, 10, 15),
(3, 8, 16),
(3, 9, 17),
(3, 10, 18),
(3, 10, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `stores_brands`
--
ALTER TABLE `stores_brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stores_brands`
--
ALTER TABLE `stores_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
