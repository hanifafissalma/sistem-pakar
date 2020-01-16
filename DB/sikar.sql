-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2020 at 01:32 AM
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
  `kd_gejala` varchar(10) NOT NULL,
  `gejala` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `gejala`) VALUES
('G01', 'Kopling Keras'),
('G02', 'Kopling bunyi'),
('G03', 'Tidak bisa starter'),
('G04', 'Pengisian kurang'),
('G05', 'Mesin pincang'),
('G06', 'Brebet');

-- --------------------------------------------------------

--
-- Table structure for table `pakar`
--

CREATE TABLE `pakar` (
  `kode_pakar` int(11) NOT NULL,
  `kd_gejala` varchar(10) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pakar`
--

INSERT INTO `pakar` (`kode_pakar`, `kd_gejala`, `kode`, `bobot`) VALUES
(2, 'G01', 'P01', 0.275),
(3, 'G02', 'P01', 0.225),
(4, 'G03', 'P02', 0.15),
(5, 'G04', 'P02', 0.25),
(6, 'G05', 'P03', 0.1),
(7, 'G06', 'P03', 0.3);

-- --------------------------------------------------------

--
-- Table structure for table `pencegahan`
--

CREATE TABLE `pencegahan` (
  `kd_pencegahan` varchar(10) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pencegahan`
--

INSERT INTO `pencegahan` (`kd_pencegahan`, `kode`, `deskripsi`) VALUES
('PP01', 'P01', 'Diperiksa secara berkala'),
('PP02', 'P02', 'Cek arus Alternator'),
('PP03', 'P09', 'Sistem rem'),
('PP04', 'P04', 'Sistem starter'),
('PP05', 'P05', 'Sistem kemudi'),
('PP06', 'P06', 'Sistem kemudi'),
('PP07', 'P11', 'Sistem AC'),
('PP08', 'P12', 'Sistem pendingin mesin'),
('PP09', 'P10', 'Sistem rem'),
('PP10', 'P07', 'Sistem kemudi'),
('PP11', 'P08', 'Sistem suspensi'),
('PP12', 'P03', 'Sistem pengapian');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kode` varchar(50) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `penyebab` varchar(50) NOT NULL,
  `bobot` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kode`, `nama_penyakit`, `penyebab`, `bobot`) VALUES
('P01', 'Kopling Rusak', 'Penggunaan Kopling yang tidak benar', '0.5'),
('P02', 'Kurang pengisian', 'Alternator rusak', '0.4'),
('P03', 'Mesin pincang', 'Busi Mati atau Igniter mati', '0.4'),
('P04', 'Sistem starter', 'Hubungan kabel dari Baterai ke starter terputus', '0.24'),
('P05', 'Steer Miring', 'Posisi ban depan kanan dan kiri tidak seimbang ', '0.22'),
('P06', 'Steer getar', 'Terdapat benda asing yang menancap di bagian luar ', '0.18'),
('P07', 'Kemudi terasa goyang', 'Kaki-kaki sudah mulai lemah', '0.26'),
('P08', 'Suspensi limbung', 'Sistem suspensi mulai lemah', '0.16'),
('P09', 'Minyak rem kurang', 'Terjadi kebocoran pada sistem pengereman', '0.2'),
('P10', 'Rem dalam', 'Setelan rem tangan tinggi', '0.23'),
('P11', 'AC tidak dingin', 'Motor Van AC mati', '0.16'),
('P12', 'Temperatur mesin naik', 'Terjadi kebocoran pada sisitem pendingin mesin', '0.18');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `jika` varchar(50) NOT NULL,
  `maka` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`jika`, `maka`) VALUES
('G01ANDG02', 'P01'),
('G03ANDG04', 'P02'),
('G05ANDG06', 'P03');

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id` int(10) NOT NULL,
  `kd_solusi` varchar(10) NOT NULL,
  `kd_pencegahan` varchar(10) NOT NULL,
  `solusi` text NOT NULL,
  `kode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id`, `kd_solusi`, `kd_pencegahan`, `solusi`, `kode`) VALUES
(1, 'S01', 'PP01', 'Ganti Kopling', 'P01'),
(2, 'S02', 'PP02', 'Ganti Alternator', 'P02'),
(3, 'S03', 'PP03', 'Periksa komponen selang dan wheele cylinder pada sistem rem', 'P09'),
(4, 'S04', 'PP04', 'Periksa kabel dan dinamo starter', 'P04'),
(5, 'S05', 'PP05', 'Spooring', 'P05'),
(6, 'S06', 'PP06', 'Spooring', 'P06'),
(7, 'S07', 'PP07', 'Ganti motor van dan periksa pipa persambungan AC', 'P11'),
(8, 'S08', 'PP08', 'Periksa Oli mesin dan selang persambungan sistem pendingin mesin', 'P12'),
(9, 'S09', 'PP09', 'Setel rem tangan', 'P10'),
(10, 'S10', 'PP10', 'Periksa komponen BallJoint dan Bearing roda', 'P07'),
(11, 'S11', 'PP11', 'Periksa baut baut suspensi dan Absorber pada suspensi', 'P08'),
(12, 'S12', 'PP12', 'periksa busi dan igniter pada sistem pengapian', 'P03');

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
(3, 'admin', 'admin', 'adminsikar', '-- Pilih L');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indexes for table `pakar`
--
ALTER TABLE `pakar`
  ADD PRIMARY KEY (`kode_pakar`);

--
-- Indexes for table `pencegahan`
--
ALTER TABLE `pencegahan`
  ADD PRIMARY KEY (`kd_pencegahan`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`jika`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pakar`
--
ALTER TABLE `pakar`
  MODIFY `kode_pakar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
