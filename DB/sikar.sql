-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2020 at 05:16 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikar`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(12) NOT NULL,
  `gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `gejala`) VALUES
(1, 'Kopling Keras'),
(2, 'Kopling bunyi'),
(3, 'Tidak bisa starter'),
(4, 'Pengisian kurang'),
(5, 'Mesin pincang'),
(6, 'Brebet');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `kode_konsultasi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `penyakit` varchar(100) NOT NULL,
  `cf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan`
--

CREATE TABLE `pengetahuan` (
  `id_pengetahuan` int(11) NOT NULL,
  `kode_penyakit` varchar(10) NOT NULL,
  `id_gejala` int(12) NOT NULL,
  `mb` float NOT NULL,
  `md` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengetahuan`
--

INSERT INTO `pengetahuan` (`id_pengetahuan`, `kode_penyakit`, `id_gejala`, `mb`, `md`) VALUES
(2, 'A', 2, 0.6, 0.1),
(3, 'A', 3, 0.5, 0.2),
(4, 'A', 4, 0.9, 0.2),
(5, 'A', 5, 0.4, 0.3),
(6, 'A', 6, 0.8, 0.5),
(7, 'B', 1, 0.4, 0.2),
(9, 'B', 2, 0.7, 0.3),
(10, 'A', 1, 0.8, 0.2),
(11, 'B', 3, 0.7, 0.3),
(12, 'B', 4, 0.9, 0.2),
(13, 'B', 5, 0.8, 0.4),
(14, 'B', 6, 0.3, 0.1);

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(12) NOT NULL,
  `kode_penyakit` varchar(100) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `saran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kode_penyakit`, `nama_penyakit`, `saran`) VALUES
(1, 'A', 'Kopling Rusak', NULL),
(2, 'B', 'Kurang pengisian', NULL),
(3, 'C', 'Mesin pincang', NULL),
(4, 'D', 'Sistem starter', NULL),
(5, 'E', 'Steer Miring', NULL),
(6, 'F', 'Steer getar', NULL),
(7, 'G', 'Kemudi terasa goyang', NULL),
(8, 'H', 'Suspensi limbung', NULL),
(9, 'I', 'Minyak rem kurang', NULL),
(10, 'J', 'Rem dalam', NULL),
(11, 'K', 'AC tidak dingin', NULL),
(12, 'L', 'Temperatur mesin naik', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `level`) VALUES
(3, 'admin', 'admin123', 'admin admin', 'admin'),
(5, 'hani', 'hani', 'hani', 'konsultan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`kode_konsultasi`);

--
-- Indexes for table `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD PRIMARY KEY (`id_pengetahuan`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `kode_konsultasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengetahuan`
--
ALTER TABLE `pengetahuan`
  MODIFY `id_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
