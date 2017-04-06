-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2017 at 07:16 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `network_police`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_hash`
--

CREATE TABLE `app_hash` (
  `id` int(5) NOT NULL,
  `application` varchar(50) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pc_usage`
--

CREATE TABLE `pc_usage` (
  `pc_id` varchar(10) NOT NULL,
  `status` int(5) NOT NULL,
  `last_boot` int(10) NOT NULL,
  `on_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pc_usage`
--

INSERT INTO `pc_usage` (`pc_id`, `status`, `last_boot`, `on_time`) VALUES
('comp10-10', 1, 1491382109, 15),
('comp10-20', 0, 1491382109, 10),
('comp10-30', 0, 1491382109, 12),
('comp10-40', -1, 1486284508, 2),
('comp10-50', -1, 1486284508, 2),
('comp10-60', 1, 1491382109, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
('001', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_hash`
--
ALTER TABLE `app_hash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pc_usage`
--
ALTER TABLE `pc_usage`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_hash`
--
ALTER TABLE `app_hash`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
