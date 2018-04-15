-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2018 at 04:03 AM
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
-- Database: `kopertais`
--

-- --------------------------------------------------------

--
-- Table structure for table `perjalanan_dinas`
--

CREATE TABLE `perjalanan_dinas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maksud_perjalanan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kendaraan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_berangkat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_tujuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama_perjalanan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tanggal_keberangkatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kembali` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perjalanan_dinas`
--

INSERT INTO `perjalanan_dinas` (`id`, `nama`, `pangkat`, `jabatan`, `maksud_perjalanan`, `kendaraan`, `tempat_berangkat`, `tempat_tujuan`, `lama_perjalanan`, `created_at`, `updated_at`, `deleted_at`, `tanggal_keberangkatan`, `tanggal_kembali`, `status`) VALUES
(1, 'Rizki', 'Golongan 2', 'Ketua Bidang Pendididkan', 'Rapat', 'Kendaraan dinas', 'UIN Bandung', 'IAIN Cirebon', 2, '2018-04-14 19:03:18', '2018-04-14 19:03:18', NULL, '2018-04-04', '2018-04-04', 'berangkat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perjalanan_dinas`
--
ALTER TABLE `perjalanan_dinas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perjalanan_dinas`
--
ALTER TABLE `perjalanan_dinas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
