-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2025 at 01:38 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

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
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `npsn` int DEFAULT NULL,
  `nss` int DEFAULT NULL,
  `kodepos` int DEFAULT NULL,
  `no_telp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama_kepsek` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nip_kepsek` int DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `nama`, `npsn`, `nss`, `kodepos`, `no_telp`, `alamat`, `email`, `website`, `nama_kepsek`, `nip_kepsek`, `logo`, `updated_at`) VALUES
(0, 'SD Islam Cokroaminoto', 20328245, NULL, 57196, '0271633726', 'Jl. S. Langkat No.2 RT07/RW10, Sangkrah, Pasar Kliwon, Surakarta, Jawa Tengah', 'sdicokroaminoto15@gmail.com', NULL, 'Asmuni S.Ag. M.Pd.', NULL, 'images/1746964229.png', '2025-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_penerimaan`
--

CREATE TABLE `jenis_penerimaan` (
  `kode` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kategori` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `jenis_penerimaan`
--

INSERT INTO `jenis_penerimaan` (`kode`, `kategori`, `nama`, `created_at`, `updated_at`) VALUES
('ABC123', 'Pembayaran', 'SPP', '2025-05-25', '2025-05-25'),
('CBA321', 'Lain-lain', 'Dana BOS', '2025-05-25', '2025-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengeluaran`
--

CREATE TABLE `jenis_pengeluaran` (
  `kode` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `jenis_pengeluaran`
--

INSERT INTO `jenis_pengeluaran` (`kode`, `nama`, `updated_at`, `created_at`) VALUES
('ABC123', 'Gaji Guru Matematika', '2025-05-25', '2025-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int NOT NULL,
  `nama_kelas` int NOT NULL,
  `wali_kelas` varchar(60) COLLATE utf8mb4_general_ci NOT NULL
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
(6, 6, 'Wielino Danang');

-- --------------------------------------------------------

--
-- Table structure for table `lain_lain`
--

CREATE TABLE `lain_lain` (
  `id` int NOT NULL,
  `nominal` int NOT NULL,
  `tanggal` date NOT NULL,
  `kode_jenis` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lain_lain`
--

INSERT INTO `lain_lain` (`id`, `nominal`, `tanggal`, `kode_jenis`) VALUES
(7, 1570000, '2023-06-15', 'CBA321');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
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
  `id` int NOT NULL,
  `nisn` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nominal` int NOT NULL,
  `tanggal` date NOT NULL,
  `kode_jenis` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nisn`, `nominal`, `tanggal`, `kode_jenis`) VALUES
(16, '0032334885', 3200000, '2024-02-14', 'ABC123'),
(17, '0032334821', 2700000, '2025-05-26', 'ABC123');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int NOT NULL,
  `kode_jenis` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nominal` int NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `kode_jenis`, `nominal`, `tanggal`) VALUES
(2, 'ABC123', 4100500, '2023-06-09'),
(3, 'ABC123', 2005000, '2025-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('IFTlxt6IXy7xFb2x1q9w3yTutJI5ZYxWI7ESQa77', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiT2hHZE1yZ3JWZ1BaaW5hc0FNejJ0a3laSGF4QmtpaFNzVUJ5WUwzbyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rYXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O30=', 1748223036),
('wbwhSXnEJvifzmz5qhkoelaUFgpuAo1MsYWzp0yv', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVGlZRXBFNmdzSTM1czdDd3lmWVdEUnZ1WU5NaXBuRjdSOE1vbWphUCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9rYXMvZG93bmxvYWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O30=', 1748223256);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_siswa` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(9) COLLATE utf8mb4_general_ci NOT NULL,
  `kelas` int DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
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
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Alexander Graham', 'alexander', 'alexander@gmail', 'images/1746963414.png', NULL, '$2y$12$5qv0mYWYPZ2B64qOUM4I3u8afs//GPJjacr3Tj./WPGMO0KnxsBVy', NULL, '2025-04-30 05:11:20', '2025-05-11 04:36:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_penerimaan`
--
ALTER TABLE `jenis_penerimaan`
  ADD PRIMARY KEY (`kode`),
  ADD UNIQUE KEY `kategori` (`kategori`);

--
-- Indexes for table `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `nama` (`nama`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_jenis` (`kode_jenis`);

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
  ADD KEY `nisn` (`nisn`),
  ADD KEY `kode_jenis` (`kode_jenis`),
  ADD KEY `kode_jenis_2` (`kode_jenis`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis` (`kode_jenis`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lain_lain`
--
ALTER TABLE `lain_lain`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lain_lain`
--
ALTER TABLE `lain_lain`
  ADD CONSTRAINT `lain_lain_ibfk_1` FOREIGN KEY (`kode_jenis`) REFERENCES `jenis_penerimaan` (`kode`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`kode_jenis`) REFERENCES `jenis_penerimaan` (`kode`);

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`kode_jenis`) REFERENCES `jenis_pengeluaran` (`kode`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`nama_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
