-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2025 at 11:00 PM
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
-- Database: `academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` int(1) NOT NULL,
  `wali_kelas` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `wali_kelas`) VALUES
(1, 1, 'Marcelino Mattius'),
(2, 2, 'Andy Kurnia Tama'),
(3, 3, 'Vardhana Ardian'),
(4, 4, 'Diana Lestari'),
(5, 5, 'Dias Saputra'),
(7, 6, 'Wielino Danang');

-- --------------------------------------------------------

--
-- Table structure for table `lain_lain`
--

CREATE TABLE `lain_lain` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lain_lain`
--

INSERT INTO `lain_lain` (`id`, `keterangan`, `nominal`, `tanggal`) VALUES
(1, 'BOS', 2000000, '2025-03-23'),
(2, 'BOS', 200000, '2025-03-23'),
(3, 'Beasiswa', 3500000, '2024-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_19_193248_academy', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nominal` int(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nisn`, `keterangan`, `nominal`, `tanggal`) VALUES
(1, '0032334833', 'spp', 350000, '2025-03-23'),
(2, '0032334885', 'seragam', 200000, '2024-05-21'),
(3, '0032334827', 'spp', 350000, '2025-03-12'),
(4, '0032334928', 'spp', 5190000, '2023-10-25'),
(5, '0032334899', 'spp', 5190000, '2023-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nominal` int(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `jenis`, `keterangan`, `nominal`, `tanggal`) VALUES
(1, 'gaji', 'Gaji Guru PPKN', 5000000, '2025-03-25'),
(9, 'operasional', 'Service AC', 500000, '2024-06-25'),
(12, 'gaji', 'Gaji Guru Matematika', 5500000, '2025-03-18'),
(13, 'operasional', 'Service PC', 250000, '2025-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('wDhmqRimfhBW8BwtpIcc5hzNT9SprbctkTeTCweu', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaWt1QTVKSWxXYnBkVnEzbUpuelZWbnpzamZ6a0Y3cVo5N3JkT3ZrOSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMToxMDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6MTAwMC9kZXRhaWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1742939757);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(10) NOT NULL,
  `nama_siswa` varchar(60) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `kelas` int(1) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama_siswa`, `jenis_kelamin`, `kelas`, `alamat`, `created_at`, `updated_at`) VALUES
('0032334811', 'Andika Rendy', 'Laki-laki', 4, 'Slamet Riyadi St No.594, RT.04/RW.03, Jajar, Laweyan, Surakarta City, Central Java 57144', '2025-03-15 12:20:15', '2025-03-16 06:41:27'),
('0032334821', 'Elsa Noviana', 'Perempuan', 4, 'Jalan Raya, Garen, Pandeyan, Kec. Ngemplak, Kabupaten Boyolali, Jawa Tengah', '2025-03-15 11:38:47', '2025-03-16 06:41:02'),
('0032334822', 'Yusua Febrian', 'Laki-laki', 3, 'Jl. Tulang Bawang Sel. No.26, Kadipiro, Kec. Banjarsari, Kota Surakarta, Jawa Tengah 57136', '2025-03-15 11:38:16', '2025-03-16 06:40:48'),
('0032334827', 'M. Ilham Aji Saputra', 'Laki-laki', 1, 'Ring Road, Mojosongo, Kec. Jebres, Kota Surakarta, Jawa Tengah 57127', '2025-03-15 11:36:36', '2025-03-19 19:07:17'),
('0032334833', 'Dewangga Putra', 'Laki-laki', 3, 'Jl. Tulang Bawang Sel. No.26, Kadipiro, Kec. Banjarsari, Kota Surakarta, Jawa Tengah 57136', '2025-03-15 12:22:54', '2025-03-16 06:41:57'),
('0032334885', 'Adi Wicaksono', 'Laki-laki', 3, 'asdlkhjwqklhdkljqhwiodhqiuwdiuqgwidgqiudwgiuqgiudqiwduhdqiuw', '2025-03-22 06:03:17', NULL),
('0032334888', 'When yah', 'Laki-laki', 6, 'Slamet Riyadi St No.594, RT.04/RW.03, Jajar, Laweyan, Surakarta City, Central Java 57144', '2025-03-15 12:22:00', '2025-03-16 06:42:16'),
('0032334899', 'Placeholder Girl', 'Perempuan', 2, 'Jalan Raya, Garen, Pandeyan, Kec. Ngemplak, Kabupaten Boyolali, Jawa Tengah', '2025-03-15 12:21:26', '2025-03-16 06:42:06'),
('0032334928', 'Placeholder Man', 'Laki-laki', 5, 'Unnamed Road, Mojosongo, Kec. Jebres, Kota Surakarta, Jawa Tengah 57127', '2025-03-15 12:20:43', '2025-03-16 06:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ilham', 'ilham@gmail.com', 'images/1742905710.png', NULL, '$2y$12$wr625PCUxh8ROoalVCaS4O4aqZ.taL9CT8uzV7kfklKLeEo.0C6LS', NULL, NULL, '2025-03-25 05:28:30'),
(2, 'Ilham', 'aji@gmail.com', 'images/1741971263.png', NULL, '$2y$12$UWVeHuIeA8yIJUtwioNWf.mUjLSdB92izgy9P.IPACR5Dh83xhwc2', NULL, NULL, NULL),
(3, 'Yusua', 'yus@gmail', 'images/1741977495.png', NULL, '$2y$12$cxG94X2tZCCHtvn3PbbEz.NJb3elJo25mrcruDIJbVCTToMj69Q7G', NULL, NULL, '2025-03-14 11:38:31'),
(4, 'Mail', 'mail@gmail.com', 'images/1742068865.png', NULL, '$2y$12$WCc5SWE.gSKO95/UlaiQp.ohnyz/qxr2zmHOYxCG8Yplj0dgaPUEW', NULL, '2025-03-15 11:30:25', '2025-03-15 13:01:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_kelas` (`nama_kelas`);

--
-- Indexes for table `lain_lain`
--
ALTER TABLE `lain_lain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lain_lain`
--
ALTER TABLE `lain_lain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`nama_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
