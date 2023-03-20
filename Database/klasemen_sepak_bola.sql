-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 07:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klasemen_sepak_bola`
--

-- --------------------------------------------------------

--
-- Table structure for table `klub`
--

CREATE TABLE `klub` (
  `id` int(11) NOT NULL,
  `Nama_klub` varchar(50) DEFAULT NULL,
  `Kota_klub` varchar(50) DEFAULT NULL,
  `Main` int(11) NOT NULL,
  `Menang` int(11) NOT NULL,
  `Seri` int(11) NOT NULL,
  `Kalah` int(11) NOT NULL,
  `Goal_Menang` int(11) NOT NULL,
  `Goal_Kalah` int(11) NOT NULL,
  `Point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klub`
--

INSERT INTO `klub` (`id`, `Nama_klub`, `Kota_klub`, `Main`, `Menang`, `Seri`, `Kalah`, `Goal_Menang`, `Goal_Kalah`, `Point`) VALUES
(1, 'Persib', 'Bandung', 0, 0, 0, 0, 0, 0, 0),
(2, 'Arema', 'Malang', 0, 0, 0, 0, 0, 0, 0),
(3, 'Persija', 'Jakarta', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pertandingan`
--

CREATE TABLE `pertandingan` (
  `id` int(11) NOT NULL,
  `kluba` int(11) DEFAULT NULL,
  `klubb` int(11) DEFAULT NULL,
  `skora` int(11) DEFAULT NULL,
  `skorb` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klub`
--
ALTER TABLE `klub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klub1` (`kluba`) USING BTREE,
  ADD KEY `klub2` (`klubb`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klub`
--
ALTER TABLE `klub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pertandingan`
--
ALTER TABLE `pertandingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD CONSTRAINT `FK_pertandingan_klub` FOREIGN KEY (`kluba`) REFERENCES `klub` (`id`),
  ADD CONSTRAINT `FK_pertandingan_klub_2` FOREIGN KEY (`klubb`) REFERENCES `klub` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
