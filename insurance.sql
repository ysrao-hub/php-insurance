-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 08:35 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insurance`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`) VALUES
(1, 'Australian Unity'),
(2, 'Medibank'),
(3, 'Iman'),
(4, 'Alliance'),
(5, 'Bupa');

-- --------------------------------------------------------

--
-- Table structure for table `plan_prices`
--

CREATE TABLE `plan_prices` (
  `id` int(4) NOT NULL,
  `company_id` int(4) NOT NULL,
  `adult` int(2) NOT NULL,
  `children` int(2) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan_prices`
--

INSERT INTO `plan_prices` (`id`, `company_id`, `adult`, `children`, `price`) VALUES
(1, 1, 1, 0, 62.4),
(2, 2, 1, 0, 71),
(3, 3, 1, 0, 73.23),
(4, 4, 1, 0, 75),
(5, 5, 1, 0, 96.97),
(6, 1, 2, 0, 134.15),
(7, 2, 2, 0, 142),
(8, 3, 2, 0, 146.46),
(9, 4, 2, 0, 150),
(10, 5, 2, 0, 193.93),
(11, 1, 2, 1, 134.15),
(12, 2, 2, 1, 142),
(13, 3, 2, 1, 146.46),
(14, 4, 2, 1, 150),
(15, 5, 2, 1, 193.93);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_prices`
--
ALTER TABLE `plan_prices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `plan_prices`
--
ALTER TABLE `plan_prices`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
