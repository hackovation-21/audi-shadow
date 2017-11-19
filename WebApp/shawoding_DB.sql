-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2017 at 02:56 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shadow`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_devices_status`
--

CREATE TABLE `tb_devices_status` (
  `id` int(11) NOT NULL,
  `device_Id` text NOT NULL,
  `signal_id` int(11) NOT NULL,
  `desired_status` int(11) NOT NULL,
  `current_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_devices_status`
--

INSERT INTO `tb_devices_status` (`id`, `device_Id`, `signal_id`, `desired_status`, `current_status`) VALUES
(4, '10000', 1, 1, 0),
(5, '10000', 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_devices_status`
--
ALTER TABLE `tb_devices_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_devices_status`
--
ALTER TABLE `tb_devices_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
