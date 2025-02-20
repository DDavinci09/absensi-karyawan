-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2025 at 02:23 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Hadir','Terlambat','Izin','Tidak Hadir') NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_karyawan`, `shift`, `tanggal`, `status`, `keterangan`, `jam_masuk`, `jam_keluar`) VALUES
(1, 1, 'Shift Pagi', '2025-02-01', 'Hadir', NULL, '07:00:00', '15:00:00'),
(2, 1, 'Shift Pagi', '2025-02-02', 'Terlambat', NULL, '07:15:00', '15:00:00'),
(3, 1, 'Shift Pagi', '2025-02-03', 'Hadir', NULL, '07:00:00', '15:00:00'),
(4, 2, 'Shift Siang', '2025-02-01', 'Hadir', NULL, '12:00:00', '20:00:00'),
(5, 2, 'Shift Siang', '2025-02-02', 'Izin', 'Sakit', NULL, NULL),
(6, 2, 'Shift Siang', '2025-02-03', 'Hadir', NULL, '12:00:00', '20:00:00'),
(7, 3, 'Shift Malam', '2025-02-01', 'Hadir', NULL, '18:00:00', '02:00:00'),
(8, 3, 'Shift Malam', '2025-02-02', 'Tidak Hadir', NULL, NULL, NULL),
(9, 3, 'Shift Malam', '2025-02-03', 'Hadir', NULL, '18:00:00', '02:00:00'),
(10, 4, 'Shift Pagi', '2025-02-01', 'Hadir', NULL, '07:00:00', '15:00:00'),
(11, 4, 'Shift Pagi', '2025-02-02', 'Hadir', NULL, '07:00:00', '15:00:00'),
(12, 4, 'Shift Pagi', '2025-02-03', 'Terlambat', NULL, '07:30:00', '15:00:00'),
(13, 5, 'Shift Pagi', '2025-02-01', 'Hadir', NULL, '07:00:00', '15:00:00'),
(14, 5, 'Shift Pagi', '2025-02-02', 'Izin', 'Urusan keluarga', NULL, NULL),
(15, 5, 'Shift Pagi', '2025-02-03', 'Hadir', NULL, '07:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` text,
  `status` enum('Aktif','Nonaktif') NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_shift` int(11) DEFAULT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `jenis_kelamin`, `posisi`, `no_hp`, `alamat`, `status`, `username`, `password`, `id_shift`, `level`) VALUES
(1, 'Ahmad Fauzan', 'Laki-Laki', 'Barista', '081234567890', 'Jl. Merdeka No. 10', 'Aktif', 'ahmad', '$2y$10$SPZme563Gw3zt3IOI3RCw.FPHS93RJNiYSYROYuXx23//.wsFB336', 1, 'Karyawan'),
(2, 'Rina Amelia', 'Perempuan', 'Kasir', '082345678901', 'Jl. Melati No. 20', 'Aktif', 'rina', '$2y$10$LRlBnSZ9mQFKhWUTqx6N1OkrqQAeufyvWbrY24yhuWNogQKVuasKK', 2, 'Karyawan'),
(3, 'Budi Santoso', 'Laki-Laki', 'Chef', '083456789012', 'Jl. Kenanga No. 5', 'Aktif', 'budi', '$2y$10$JzRTBRXm5Bz/KZ4EeHmSIevMptJaSgGBuOGUsq9HdLab3cXP/RxHm', 3, 'Karyawan'),
(4, 'Siti Rahma', 'Perempuan', 'Pelayan', '084567890123', 'Jl. Mawar No. 15', 'Aktif', 'siti', '$2y$10$ePHknK8PeE1XgOBmsym0j.REbmzmd0IImj0.cYFmUj7i53Iq/KefC', 4, 'Karyawan'),
(5, 'Doni Saputra', 'Laki-Laki', 'Supervisor', '085678901234', 'Jl. Anggrek No. 30', 'Aktif', 'doni', '$2y$10$N6fN8KyvMoZMy5xv1E1mYedRJcKxApT5Y5WAdRnhKFLf05BKiksVe', 1, 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `id_shift` int(11) NOT NULL,
  `nama_shift` varchar(50) NOT NULL,
  `hari_kerja` varchar(50) NOT NULL,
  `jam_masuk_shift` time NOT NULL,
  `jam_keluar_shift` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id_shift`, `nama_shift`, `hari_kerja`, `jam_masuk_shift`, `jam_keluar_shift`) VALUES
(1, 'Shift Pagi', 'Senin - Jumat', '07:00:00', '15:00:00'),
(2, 'Shift Siang', 'Senin - Jumat', '13:00:00', '21:00:00'),
(3, 'Shift Malam', 'Senin - Jumat', '21:00:00', '05:00:00'),
(4, 'Shift Weekend', 'Sabtu - Minggu', '08:00:00', '16:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_shift` (`id_shift`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id_shift`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `id_shift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_shift`) REFERENCES `shift` (`id_shift`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
