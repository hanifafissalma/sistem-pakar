-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 05:46 PM
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
  `jenis_mobil` varchar(50) NOT NULL,
  `plat` varchar(20) NOT NULL,
  `penyakit` varchar(100) NOT NULL,
  `cf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`kode_konsultasi`, `nama`, `tanggal`, `jenis_mobil`, `plat`, `penyakit`, `cf`) VALUES
(5, 'Hanifa Fissalma', '2020-01-27', '', '', 'Kopling Rusak', 0.64),
(6, 'Yusuf', '2020-01-27', '', '', 'Kopling Rusak', 0.64),
(7, 'fulan bin fulan', '2020-01-27', '', '', 'Kopling Rusak', 0.59),
(8, 'Gedung 1', '2020-01-27', '', '', 'Kopling Rusak', 0.64),
(9, 'Hanifa Fissalma', '2020-01-27', '', '', 'Kopling Rusak', 0.6),
(10, 'Hanifa Fissalma', '2020-01-30', '', '', 'Kopling Rusak', 0.64),
(11, 'Hanifa Fissalma', '2020-02-03', '', '', 'Kopling Rusak', 64),
(12, 'Hanifa Fissalma', '2020-02-03', '', '', 'Kopling Rusak', 64),
(13, 'Hanifa Fissalma', '2020-02-03', '', '', 'Kopling Rusak', 64),
(14, 'Hanifa Fissalma', '2020-02-03', '', '', 'Kopling Rusak', 64),
(15, 'Hanifa Fissalma', '2020-02-03', '', '', 'Kopling Rusak', 64),
(16, 'Hanifa Fissalma', '2020-02-03', '', '', 'Kopling Rusak', 64),
(17, 'Hanifa Fissalma', '2020-02-03', '', '', 'Kopling Rusak', 64),
(18, 'Hanifa Fissalma', '2020-02-03', '', 'B 3132 KRQ', 'Kopling Rusak', 64),
(19, 'Hanifa Fissalma', '2020-02-03', '1', 'B 3132 KRQ', 'Kopling Rusak', 64),
(20, 'Hanifa Fissalma', '2020-02-03', '1', 'B 3132 KRQ', 'Kopling Rusak', 64);

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan`
--

CREATE TABLE `pengetahuan` (
  `id_pengetahuan` int(11) NOT NULL,
  `kode_penyakit` varchar(10) NOT NULL,
  `id_gejala` int(12) NOT NULL,
  `id_jenis_mobil` int(11) NOT NULL,
  `biaya_service` int(10) NOT NULL,
  `mb` float NOT NULL,
  `md` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengetahuan`
--

INSERT INTO `pengetahuan` (`id_pengetahuan`, `kode_penyakit`, `id_gejala`, `id_jenis_mobil`, `biaya_service`, `mb`, `md`) VALUES
(2, 'A', 2, 1, 0, 0.6, 0.1),
(3, 'A', 3, 2, 0, 0.5, 0.2),
(4, 'A', 4, 3, 0, 0.9, 0.2),
(5, 'A', 5, 4, 0, 0.4, 0.3),
(6, 'A', 6, 12, 0, 0.8, 0.5),
(7, 'B', 1, 11, 0, 0.4, 0.2),
(9, 'B', 2, 10, 0, 0.7, 0.3),
(10, 'A', 1, 9, 0, 0.8, 0.2),
(11, 'B', 3, 8, 0, 0.7, 0.3),
(12, 'B', 4, 7, 0, 0.9, 0.2),
(13, 'B', 5, 6, 0, 0.8, 0.4),
(14, 'B', 6, 5, 0, 0.3, 0.1),
(15, 'G', 5, 8, 0, 0.2, 0.1);

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
-- Table structure for table `ref_jenis_mobil`
--

CREATE TABLE `ref_jenis_mobil` (
  `id_jenis_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_jenis_mobil`
--

INSERT INTO `ref_jenis_mobil` (`id_jenis_mobil`, `nama_mobil`) VALUES
(1, 'Corolla Altis'),
(2, 'Camry'),
(3, 'Vios'),
(4, 'Yaris'),
(5, 'Agya'),
(6, 'Etios'),
(7, 'Innova'),
(8, 'Sienta'),
(9, 'Alphard'),
(10, 'Avanza'),
(11, 'New Venturer'),
(12, 'Calya'),
(13, 'Vellfire'),
(14, 'Fortuner'),
(15, 'Land Cruiser'),
(16, 'Rush');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`) VALUES
(3, 'admin', 'admin123', 'admin admin'),
(5, 'hani', 'hani', 'hani');

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
-- Indexes for table `ref_jenis_mobil`
--
ALTER TABLE `ref_jenis_mobil`
  ADD PRIMARY KEY (`id_jenis_mobil`);

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
  MODIFY `kode_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pengetahuan`
--
ALTER TABLE `pengetahuan`
  MODIFY `id_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ref_jenis_mobil`
--
ALTER TABLE `ref_jenis_mobil`
  MODIFY `id_jenis_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
