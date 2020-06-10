-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 03:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `alamat`, `tlp`, `created_at`, `updated_at`) VALUES
(2, 'sarjono', 'kulom', '0091212121222', '2020-04-03 19:10:35', '2020-04-12 05:29:25'),
(7, 'cc', 'bb', '1212', '2020-04-06 22:20:04', '2020-04-06 22:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_user`, `nama`, `nilai`, `created_at`, `updated_at`) VALUES
(1, '2', 'bb', '20', '2020-04-10 22:07:54', '2020-04-10 22:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(255) NOT NULL,
  `user_id` int(45) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `nama`, `tlp`, `alamat`, `npm`, `gambar`, `updated_at`, `created_at`) VALUES
(3, 12, 'ganti', '13', 'adad', '234', '1111111111.jpg', '2020-04-15 23:44:18', '2020-04-13 02:10:10'),
(4, 13, 'mahasiswa1', '12311', 'ff', '232321', '112957i018FEA41D376BD28.gif', '2020-04-15 23:41:07', '2020-04-13 22:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_04_02_080934_create_customer_table', 1),
(5, '2020_04_11_044746_create_jawaban_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `npm` int(20) NOT NULL,
  `tlp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id` int(222) NOT NULL,
  `soal` text NOT NULL,
  `a` varchar(30) NOT NULL,
  `b` varchar(30) NOT NULL,
  `c` varchar(30) NOT NULL,
  `d` varchar(30) NOT NULL,
  `knc_jawaban` varchar(30) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_soal`
--

INSERT INTO `tbl_soal` (`id`, `soal`, `a`, `b`, `c`, `d`, `knc_jawaban`, `gambar`, `aktif`, `updated_at`, `created_at`) VALUES
(15, 'Berikut yang bukan termasuk alat output adalah...?111', 'keyboard', 'speaker', 'monitor', 'printer', 'a', '30DFC13E2.jpg', 'Y', '2020-04-12 20:48:11', '2020-04-12 11:49:20'),
(16, 'Tanda panah (tanda lain) yang mewakili posisi gerakan mouse disebut dengan...?', 'kursor', 'mouse', 'pointer', 'printer', 'c', '', 'Y', '2020-04-12 11:42:22', '2020-04-12 11:49:20'),
(17, 'Fungsi printer adalah untuk....?', 'mengeluarkan suara', 'mencetak dokumen', 'menyimpan dokumen', 'salah semua', 'b', '30DFC13E2.jpg', 'Y', '2020-04-12 21:00:21', '2020-04-12 11:49:20'),
(18, 'USB merupakan singkatan dari', 'universal serial buss', 'unit serial bus', 'Universal Serial Bus', 'Unit serial booster', 'c', 'c', 'N', '2020-04-12 21:00:40', '2020-04-12 11:49:20'),
(19, 'Salah satu perangkat Lunak pengolah kata adalah', 'Ms.Word', 'Winamp', 'CC cleaner', 'Jet audio', 'a', '', 'Y', '2020-04-12 11:42:22', '2020-04-12 11:49:20'),
(20, 'Program yang digunakan untuk disain gambar adalah..?', 'Ms.Exel', 'Media Player', 'Power Point', 'Photoshop', 'd', '', 'N', '2020-04-12 11:42:22', '2020-04-12 11:49:20'),
(29, 'jawaban e B', 'd', 'v', 'd', 'd', 'b', 'deadpool-movie-logo-wallpaper-hd-resolution-On-High-Resolution-Wallpaper.jpg', 'Y', '2020-04-15 23:17:51', '2020-04-12 07:18:39'),
(30, 'berapa jumlah kaki kuda', 'lima', 'sepuluh', 'satu', 'sembilan', 'd', NULL, 'Y', '2020-04-12 07:46:45', '2020-04-12 07:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'bb', 'bb@gmail.com', NULL, '$2y$10$Z3sUi.nfL9Dr2vblWRP1YewzVvrGl.jT0MT4d02R34gR2pO6NmmlC', 'LSZsHMwNOqKNkSMKbErsVbYolzsJqTjTtKRNssRh7ddShaIFTJPtxnoqgYGg', '2020-04-08 00:02:04', '2020-04-08 00:02:04'),
(12, 'mahasiswa', 'coba1', 'vv@gmail.com', NULL, '$2y$10$4dh0.1ITiTVDIL26k/49XuJMC1Mk6YkuICs1weRoejAPuxa0IAy1.', 'psARKsdlBrKzj3Uz3xYMOIkTdTrws02eHpIZlSWQSEHfgAHZWPhZdAZKza8V', '2020-04-13 02:10:09', '2020-04-13 02:10:09'),
(13, 'mahasiswa', 'mahasiswa1', 'm@gmail.com', NULL, '$2y$10$a1MU.9zvmoqNgFV0IO0iaOdWnenKpjtMdPO47hpx.MDvYBQnwnA0i', 'AdeTpJWdgNjRG0vHK8er7dPBsCv5MroBVpGu3GOxOlNjinksCwFybN0Wv3Gu', '2020-04-13 22:38:28', '2020-04-13 22:38:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
