-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2020 at 03:42 PM
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
(2, 'sarjono', 'kulom', '0091212121222', '2020-04-03 19:10:35', '2020-04-12 05:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `kode`
--

CREATE TABLE `kode` (
  `id` int(222) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_praktikum` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(5, 14, 'aaa', '1212', 'aaaa', '121212', NULL, '2020-06-11 19:05:58', '2020-06-11 19:05:58'),
(6, 16, 'bagus', '12132', 'asdad', '1212', NULL, '2020-06-11 19:55:14', '2020-06-11 19:29:16');

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
-- Table structure for table `praktikum`
--

CREATE TABLE `praktikum` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kode` varchar(255) NOT NULL,
  `aktif` varchar(221) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `praktikum`
--

INSERT INTO `praktikum` (`id`, `nama`, `kode`, `aktif`) VALUES
(1, 'JARKOM-1', 'asdasd', 'Y'),
(4, 'SO', 'LM12', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `praktikum_user`
--

CREATE TABLE `praktikum_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `praktikum_id` int(255) DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `praktikum_user`
--

INSERT INTO `praktikum_user` (`id`, `user_id`, `praktikum_id`, `nama`, `nilai`, `created_at`, `updated_at`) VALUES
(1, '2', 1, 'bb', '80', '2020-04-10 22:07:54', '2020-04-10 22:07:54'),
(3, '2', 4, 'bb', '20', '2020-06-13 00:28:51', '2020-06-13 00:28:51'),
(5, '2', 4, 'bb', '0', '2020-06-15 01:29:07', '2020-06-15 01:29:07'),
(6, '2', 1, 'bb', '0', '2020-07-06 20:48:38', '2020-07-06 20:48:38'),
(7, '2', 1, 'bb', '10', '2020-07-06 20:52:37', '2020-07-06 20:52:37'),
(8, '12', 4, 'coba1', '20', '2020-07-07 00:15:29', '2020-07-07 00:15:29'),
(16, '12', 2, 'coba1', '10', '2020-07-10 10:27:48', '2020-07-10 10:27:48'),
(17, '12', 2, 'coba1', '10', '2020-07-11 19:32:48', '2020-07-11 19:32:48'),
(18, '12', 1, 'coba1', '50', '2020-07-11 19:33:16', '2020-07-11 19:33:16');

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
  `id` int(100) NOT NULL,
  `soal` text NOT NULL,
  `a` varchar(30) NOT NULL,
  `b` varchar(30) NOT NULL,
  `c` varchar(30) NOT NULL,
  `d` varchar(30) NOT NULL,
  `knc_jawaban` varchar(30) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_soal`
--

INSERT INTO `tbl_soal` (`id`, `soal`, `a`, `b`, `c`, `d`, `knc_jawaban`, `gambar`, `tanggal`, `aktif`, `updated_at`) VALUES
(9, 'User atau Operator Komputer dalam Istilah Komputer disebut dengan..?', 'Brainware', 'Fireware', 'Software', 'Hardware', 'a', '', '0000-00-00', 'Y', '2020-06-13 07:32:30'),
(10, 'CPU Merupakan Singkatan dari', 'Central Progamming Unit', 'Central Promoting Unit', 'Central Processing Unit', 'Central Producing Unit', 'c', '', '0000-00-00', 'Y', '2020-06-13 07:32:30'),
(11, 'Jaringan dari elemen-elemen yang saling berhubungan adalah ?', 'pentium ', 'instal', 'system', 'data', 'c', '', '0000-00-00', 'Y', '2020-06-13 07:32:30'),
(12, 'Berikut merupakan elemen-elemen sistem komputer kecuali...?', 'Fireware', 'Brainware', 'Software', 'Hadware', 'a', '', '0000-00-00', 'Y', '2020-06-13 07:32:30'),
(13, 'Program yang berisi perinta-perintah / perangkat lunak disebut...?', 'Pentium', 'Brainware', 'Hardware', 'software', 'd', '', '0000-00-00', 'Y', '2020-06-13 07:32:30'),
(14, 'Proses memasukkan dan memasang software ke dalam komputer disebut...?', 'data', 'instal', 'loading', 'online', 'b', '', '0000-00-00', 'Y', '2020-06-13 07:32:30'),
(15, 'Berikut yang bukan termasuk alat output adalah...?', 'keyboard', 'speaker', 'monitor', 'printer', 'a', '', '0000-00-00', 'Y', '2020-06-13 07:32:30'),
(16, 'Tanda panah (tanda lain) yang mewakili posisi gerakan mouse disebut dengan...?', 'kursor', 'mouse', 'pointer', 'printer', 'c', '', '0000-00-00', 'Y', '2020-06-13 07:32:30'),
(17, 'Fungsi printer adalah untuk....?', 'mengeluarkan suara', 'mencetak dokumen', 'menyimpan dokumen', 'salah semua', 'b', 'Logo-ITATS.png', '0000-00-00', 'N', '2020-07-13 07:42:06'),
(18, 'USB merupakan singkatan dari', 'universal serial buss', 'unit serial bus', 'Universal Serial Bus', 'Unit serial booster', 'c', '', '0000-00-00', 'N', '2020-06-13 07:32:30'),
(19, 'Salah satu perangkat Lunak pengolah kata adalah', 'Ms.Word', 'Winamp', 'CC cleaner', 'Jet audio', 'a', '', '0000-00-00', 'Y', '2020-06-13 07:32:30'),
(20, 'Program yang digunakan untuk disain gambar adalah..?', 'Ms.Exel', 'Media Player', 'Power Point', 'Photoshop', 'd', '', '0000-00-00', 'N', '2020-06-13 07:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` enum('admin','mahasiswa') COLLATE utf8mb4_unicode_ci NOT NULL,
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
(2, 'admin', 'bb', 'bb@gmail.com', NULL, '$2y$10$Z3sUi.nfL9Dr2vblWRP1YewzVvrGl.jT0MT4d02R34gR2pO6NmmlC', 'LDVbPgPoUTNfYpa02EB5AvT2e5htJGICJIH6QP9BpcqfdFqhVD80b1MKCBOF', '2020-04-08 00:02:04', '2020-06-13 20:53:24'),
(12, 'admin', 'coba1', 'vv@gmail.com', NULL, '$2y$10$4dh0.1ITiTVDIL26k/49XuJMC1Mk6YkuICs1weRoejAPuxa0IAy1.', 'nN5tJ8paM2TISOrv4wBDiKqXWeMvD4ypglVtc53hiiOb5XZDvIw1hQW8lUaB', '2020-04-13 02:10:09', '2020-07-13 07:59:50'),
(13, 'mahasiswa', 'mahasiswa1', 'm@gmail.com', NULL, '$2y$10$a1MU.9zvmoqNgFV0IO0iaOdWnenKpjtMdPO47hpx.MDvYBQnwnA0i', 'AdeTpJWdgNjRG0vHK8er7dPBsCv5MroBVpGu3GOxOlNjinksCwFybN0Wv3Gu', '2020-04-13 22:38:28', '2020-04-13 22:38:28'),
(14, 'mahasiswa', 'aaa', 'ahoy@gmail.com', NULL, '$2y$10$r90RA3FI0.n1NVMFuTkwIOdoXiTWNW5DvZMRcwd20sPHhBGj3u3Yi', 'tVErPef63ngufbYIQr7YGBP4NVjCngbYeibA5PTTDTiBWSqoD8NrdqjMP9fc', '2020-06-11 19:05:58', '2020-06-13 22:38:02'),
(16, 'mahasiswa', 'addss', 'vsasv@gmail.com', NULL, '$2y$10$wWZwcpI7Ma.6t9je1jMtOeV.8La7x4Qn8skcNeGXTe3vrGizc1S4.', 'tbJsDonOcxBqBFpOusxi60s8qslw3wSFR7VUGROBLWW7PZjwsT1wJnhakoUG', '2020-06-11 19:29:16', '2020-06-13 21:02:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kode`
--
ALTER TABLE `kode`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `praktikum`
--
ALTER TABLE `praktikum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `praktikum_user`
--
ALTER TABLE `praktikum_user`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `kode`
--
ALTER TABLE `kode`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `praktikum`
--
ALTER TABLE `praktikum`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `praktikum_user`
--
ALTER TABLE `praktikum_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
