-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 02:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `no_kamar` varchar(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `id_status` int(11) DEFAULT NULL,
  `tarif` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `no_kamar`, `id_tipe`, `id_status`, `tarif`) VALUES
(14, '1-101', 1, 1, 1500000),
(15, '1-102', 1, 2, 1500000),
(17, '3-101', 3, 2, 5000000),
(24, '2-101', 2, 1, 3000000),
(28, '1-103', 1, 2, 2000000),
(29, '2-102', 2, 1, 3000000),
(30, '1-104', 1, 2, 1500000),
(31, '3-102', 3, 1, 5000000),
(32, '4-101', 4, 2, 10000000),
(33, '3-103', 3, 2, 5000000),
(34, '2-103', 2, 2, 3000000),
(35, '4-102', 4, 1, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `ketersediaan`
--

CREATE TABLE `ketersediaan` (
  `id_status` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ketersediaan`
--

INSERT INTO `ketersediaan` (`id_status`, `status`) VALUES
(1, 'Tersedia'),
(2, 'Tidak Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id_tipe` int(11) NOT NULL,
  `tipe` varchar(225) NOT NULL,
  `fasilitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id_tipe`, `tipe`, `fasilitas`) VALUES
(1, 'Standard', 'AC, WiFi, TV'),
(2, 'Deluxe', 'AC, WiFi, TV, Sarapan, Kulkas'),
(3, 'Luxury', 'AC, WiFi, TV, Kulkas, Sarapan, Brankas'),
(4, 'Presidential', 'All Included');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_tipe` (`id_tipe`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `ketersediaan`
--
ALTER TABLE `ketersediaan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id_tipe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `ketersediaan`
--
ALTER TABLE `ketersediaan`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_kamar` (`id_tipe`),
  ADD CONSTRAINT `kamar_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `ketersediaan` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
