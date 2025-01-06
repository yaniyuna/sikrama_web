-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 04:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sikrama`
--

-- --------------------------------------------------------

--
-- Table structure for table `bantuans`
--

CREATE TABLE `bantuans` (
  `bantuan_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_bantuan` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bantuans`
--

INSERT INTO `bantuans` (`bantuan_id`, `jenis_bantuan`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'KIS', 'Kartu Indonesia Sehat', '2025-01-02 16:25:33', '2025-01-02 16:25:33'),
(2, 'PBI', 'Penerima Bantuan Iuran', '2025-01-02 16:25:33', '2025-01-02 16:25:33'),
(3, 'SKTM', 'Surat Keterangan Tidak Mampu', '2025-01-04 17:33:43', '2025-01-04 17:33:43'),
(6, 'KIP', '<p>Kartu Indonesia Pintar</p>', '2025-01-04 20:10:09', '2025-01-04 20:10:09'),
(13, 'KKS', '<p>Kartu Keluarga Sejahtera</p>', '2025-01-04 23:15:45', '2025-01-04 23:15:45'),
(14, 'PKH', '<p>Program Keluarga Harapan</p>', '2025-01-05 00:48:34', '2025-01-05 00:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin2@gmail.com|127.0.0.1', 'i:1;', 1736080891),
('admin2@gmail.com|127.0.0.1:timer', 'i:1736080891;', 1736080891),
('yanyan@gmail.com|127.0.0.1', 'i:1;', 1736080880),
('yanyan@gmail.com|127.0.0.1:timer', 'i:1736080880;', 1736080880);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_penduduk` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`kategori_id`, `kategori_penduduk`, `created_at`, `updated_at`) VALUES
(1, 'Krama Desa Adat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Krama Tamiu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Tamiu', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(4, '2025_01_01_073453_create_bantuans_table', 1),
(5, '2025_01_01_073657_create_pekerjaans_table', 1),
(6, '2025_01_01_074324_create_kategoris_table', 1),
(7, '2025_01_01_074754_create_penduduks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaans`
--

CREATE TABLE `pekerjaans` (
  `pekerjaan_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_pekerjaan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pekerjaans`
--

INSERT INTO `pekerjaans` (`pekerjaan_id`, `jenis_pekerjaan`, `created_at`, `updated_at`) VALUES
(1, 'Petani', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Peternak', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Buruh Tani', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Nelayan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Pegawai Negeri Sipil(PNS)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Pegawai Swasta', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Pedagang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Tidak Bekerja', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Lainnya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Perawat', '2025-01-04 20:10:58', '2025-01-04 20:10:58'),
(16, 'Buruh Bangunan', '2025-01-05 01:25:35', '2025-01-05 01:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `penduduks`
--

CREATE TABLE `penduduks` (
  `penduduk_id` bigint(20) UNSIGNED NOT NULL,
  `nama_kepala_keluarga` varchar(255) NOT NULL,
  `nik` int(11) NOT NULL,
  `no_kk` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pekerjaan_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_anggota_keluarga` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `bantuan_id` bigint(20) UNSIGNED NOT NULL,
  `foto_rumah` varchar(255) NOT NULL,
  `foto_kk` varchar(255) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penduduks`
--

INSERT INTO `penduduks` (`penduduk_id`, `nama_kepala_keluarga`, `nik`, `no_kk`, `tgl_lahir`, `pekerjaan_id`, `jumlah_anggota_keluarga`, `alamat`, `bantuan_id`, `foto_rumah`, `foto_kk`, `kategori_id`, `created_at`, `updated_at`) VALUES
(9, 'Aurellia', 65437896, 24351261, '2025-01-06', 6, 5, 'pemaron', 1, 'uploads/rumah/1736072666STIKER ACC.png', 'uploads/kk/1736072666STIKER ACC.png', 1, '2025-01-04 20:38:13', '2025-01-05 02:24:26'),
(11, 'Suryani Agustini', 12345678, 87654321, '2025-01-05', 5, 5, 'kintamani', 1, 'uploads/rumah/1736068140Cuplikan layar 2025-01-01 214012.png', 'uploads/kk/1736068140Cuplikan layar 2025-01-01 214012.png', 1, '2025-01-04 21:02:14', '2025-01-05 01:22:47'),
(15, 'Gede Budi', 12345609, 90741454, '2025-01-29', 8, 1, 'banjar jawa', 1, 'uploads/rumah/1736068739sari1.jpg', 'uploads/kk/1736068739sari1.jpg', 3, '2025-01-05 01:18:59', '2025-01-05 01:18:59'),
(16, 'sari', 126421, 842567, '2025-01-16', 7, 2, 'singaraja', 13, 'uploads/rumah/1736068944maskot.jpg', 'uploads/kk/1736068944maskot.jpg', 2, '2025-01-05 01:22:24', '2025-01-05 01:22:24'),
(17, 'wayan jaya', 7652354, 135625, '2025-01-22', 9, 3, 'singaraja', 2, 'uploads/rumah/1736069073Hooman.jpg', 'uploads/kk/1736069073Hooman.jpg', 1, '2025-01-05 01:24:33', '2025-01-05 01:24:33'),
(22, 'ayu', 6253652, 6253625, '2024-12-29', 12, 4, 'Pemaron', 3, 'uploads/rumah/1736072763PESERTA-INTERWEEK-2025.png', 'uploads/kk/1736072763PESERTA-INTERWEEK-2025.png', 3, '2025-01-05 02:26:03', '2025-01-05 02:26:03');

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
('47g6LvOPLUj20k14WvcEG9BYCou05ybNbKHHqkLc', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiU2lubWNQOXpzYXhKWlBqdlBpcjZZN0liNnNubUVEVjRzT3FFRG1nMCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYmFudHVhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1736072796),
('EUzELRtLmbvcIxiI9b0ZMUrsXJGpalHZGB8ym6Sm', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSmZJWGZTeHBUNzBOOXhFOTZHR0JUaEpHSFhZZFFqTVpwTFlyck9BNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYW50dWFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1736088606);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yani', 'admin@gmail.com', NULL, '$2y$12$b54DvRuHw.VIlD6qx5wIh.eB.pVGviXkQe6Rxo034g4qGKVQsv6z2', NULL, '2025-01-02 07:11:47', '2025-01-02 07:11:47'),
(2, 'Surya', 'contoh@gmail.com', NULL, '$2y$12$ilr.XgsrbZ.4y5twcK1Cx..l6MWmf2afrlBBHP84g/Du0O9SXhW6W', NULL, '2025-01-02 18:51:44', '2025-01-02 18:51:44'),
(3, 'agustini', 'admin1@gmail.com', NULL, '$2y$12$3tOfoind3FSW/IZxtZGeTefXgfQDhgxid/66Bf9Fun11US3n1ZBTu', NULL, '2025-01-04 08:08:36', '2025-01-04 08:08:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bantuans`
--
ALTER TABLE `bantuans`
  ADD PRIMARY KEY (`bantuan_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  ADD PRIMARY KEY (`pekerjaan_id`);

--
-- Indexes for table `penduduks`
--
ALTER TABLE `penduduks`
  ADD PRIMARY KEY (`penduduk_id`),
  ADD KEY `bantuan_id` (`bantuan_id`),
  ADD KEY `pekerjaan_id` (`pekerjaan_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `bantuans`
--
ALTER TABLE `bantuans`
  MODIFY `bantuan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `kategori_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  MODIFY `pekerjaan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `penduduks`
--
ALTER TABLE `penduduks`
  MODIFY `penduduk_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penduduks`
--
ALTER TABLE `penduduks`
  ADD CONSTRAINT `penduduks_ibfk_1` FOREIGN KEY (`pekerjaan_id`) REFERENCES `pekerjaans` (`pekerjaan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penduduks_ibfk_2` FOREIGN KEY (`bantuan_id`) REFERENCES `bantuans` (`bantuan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penduduks_ibfk_3` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
