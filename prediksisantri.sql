-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2024 pada 13.41
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prediksisantri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aplikasi`
--

CREATE TABLE `aplikasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `app_name` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `copy_right` varchar(50) DEFAULT NULL,
  `version` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `aplikasi`
--

INSERT INTO `aplikasi` (`id`, `owner`, `address`, `telephone`, `title`, `app_name`, `logo`, `copy_right`, `version`) VALUES
(1, NULL, 'jl kemana aja ..', '0812-9936-9059', 'SPK', 'SPK', 'logo.png', 'Copy Right ©', '1.0.0.0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kriteria`
--

CREATE TABLE `detail_kriteria` (
  `id` int(11) NOT NULL,
  `keys_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `jenis` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_kriteria`
--

INSERT INTO `detail_kriteria` (`id`, `keys_kriteria`, `nilai`, `jenis`, `created_at`) VALUES
(1, 100, 1, '< 500', '2024-01-11 13:47:57'),
(2, 100, 0.9, '500 - 1.000', '2024-01-11 13:47:57'),
(3, 100, 0.8, '1.000 - 2.000', '2024-01-11 13:50:49'),
(4, 100, 0.7, '2.000 - 3.000', '2024-01-11 13:51:01'),
(5, 100, 0.6, '3.000 - 4.000', '2024-01-11 13:51:08'),
(6, 100, 0.5, '4.000 - 5.000', '2024-01-11 13:51:20'),
(7, 200, 1, '3 Bersaudara', '2024-01-11 13:52:10'),
(8, 200, 0.9, '4 Bersaudara', '2024-01-11 13:52:26'),
(9, 200, 0.8, '5 Bersaudara', '2024-01-11 13:52:58'),
(10, 200, 0.7, '6 Bersaudara', '2024-01-11 13:53:05'),
(11, 200, 0.6, '7 Bersaudara', '2024-01-11 13:53:11'),
(12, 200, 0.5, '8 Bersaudara', '2024-01-11 13:53:16'),
(13, 300, 1, '40 - 49', '2024-01-11 13:54:18'),
(14, 300, 0.9, '50 - 59', '2024-01-11 13:54:25'),
(15, 300, 0.8, '60 - 69', '2024-01-11 13:54:33'),
(16, 300, 0.7, '70 - 79', '2024-01-11 13:54:38'),
(17, 300, 0.6, '80 - 89', '2024-01-11 13:54:44'),
(18, 400, 1, 'Mampu', '2024-01-11 13:57:22'),
(19, 400, 0.9, 'Sederhana', '2024-01-11 13:57:26'),
(20, 400, 0.8, 'Kurang Mampu', '2024-01-11 13:57:32'),
(21, 400, 0.7, 'Tidak Mampu', '2024-01-11 13:57:39'),
(22, 500, 0.9, 'Sehat', '2024-01-11 13:58:25'),
(23, 500, 0.8, 'Kurang Sehat', '2024-01-11 13:58:39'),
(24, 500, 0.7, 'Lansia', '2024-01-11 13:58:46'),
(25, 600, 1, 'Petani', '2024-01-11 13:59:39'),
(26, 600, 0.9, 'Buruh', '2024-01-11 13:59:43'),
(27, 600, 0.8, 'Nelayan', '2024-01-11 14:06:05'),
(28, 600, 0.7, 'Tidak Bekerja', '2024-01-11 13:59:53'),
(29, 700, 1, 'Kayu Jati', '2024-01-11 14:10:09'),
(30, 700, 0.9, 'Batu Bata', '2024-01-11 14:10:11'),
(31, 700, 0.8, 'Papan Biasa', '2024-01-11 14:10:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `keys` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `nilai` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `keys`, `nama_kriteria`, `nilai`, `created_at`) VALUES
(1, 100, 'Pendapatan Rumah Tangga (prt)', 0.2, '2024-01-09 14:06:26'),
(2, 200, 'Jumlah Anggota Keluarga (jak)', 0.1, '2024-01-09 14:06:37'),
(3, 300, 'Usia', 0.2, '2024-01-09 13:34:07'),
(4, 400, 'Status Sosial (ss)', 0.2, '2024-01-09 14:06:45'),
(5, 500, 'Kondisi Kesehatan (ks)', 0.1, '2024-01-09 14:06:55'),
(6, 600, 'Bobot Pekerjaan (bk)', 0.1, '2024-01-09 14:08:36'),
(7, 700, 'Kondisi Rumah (kr)', 0.1, '2024-01-09 14:08:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('danilukman2206@gmail.com', 'fa342bc92048ef7c702eaf35805d3f183f23361d1401f2ed36c96c5516aaa525', '2023-06-20 01:03:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `prt` float NOT NULL,
  `jak` float NOT NULL,
  `usia` float NOT NULL,
  `ss` float NOT NULL,
  `kk` float NOT NULL,
  `bp` float NOT NULL,
  `kr` float NOT NULL,
  `hasil` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`id`, `nis`, `full_name`, `prt`, `jak`, `usia`, `ss`, `kk`, `bp`, `kr`, `hasil`, `created_at`, `updated_at`) VALUES
(68, 234234, 'Aflah Rafael Yuwono', 0.7, 0.7, 0.9, 0.7, 0.8, 0.7, 0.8, 0.909722, '2024-01-12 12:33:52', '2024-01-12 19:31:31'),
(69, 5235635, 'Ahmad Fadli Sholihin', 0.8, 0.8, 0.6, 0.7, 0.7, 0.7, 0.8, 0.863889, '2024-01-12 12:33:52', '2024-01-12 19:31:31'),
(70, 523565, 'Annasya Nabila Syakayla', 0.5, 0.5, 0.6, 0.7, 0.7, 0.8, 0.8, 0.776389, '2024-01-12 12:33:52', '2024-01-12 19:31:31'),
(71, 287534, 'Elok Shanum Nacita', 0.9, 0.9, 0.8, 0.7, 0.7, 0.7, 0.9, 0.952778, '2024-01-12 12:33:52', '2024-01-12 19:31:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(360) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(5) DEFAULT NULL COMMENT '1 = Admin, 2 = Gudang, 3 = Manager , 4. Kepala Bagian',
  `image` varchar(360) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `role`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dani', 'danilukman2206@gmail.com', '087654738290', 'qweqwe', NULL, '$2y$10$hGHfDWFUJVoJQMw6v6ho8eeCqGsi1qV9QSOVuEdu7nFM8nXTVg6zm', '1', 'Dani Lukman Hakim.jpg', 'ON', NULL, NULL, '2023-06-25 23:41:20'),
(36, 'asd', 'dadsdf@gmail.com', '5345345345', 'sdfsdf', '2023-10-10 12:52:32', '$2y$10$eiOsyKXXv7yAtY4.igqcieWevZlGG6DmXOkhrhA6yCLx12KlFl1La', '3', 'Diagram Tanpa Judul.drawio (7).png', 'ON', 'ZGFkc2RmQGdtYWlsLmNvbQ==', '2023-10-10 12:52:32', '2023-10-10 12:52:50'),
(37, 'asdasd', 'dsad@gmail.com', '534545', 'asdsfd', '2023-10-10 12:53:12', '$2y$10$ATVb5qNk83DInBYDKp6Dh.PAzDEdmSOBe4gIdqt6H2Phxr6wZlYmK', '3', 'Diagram Tanpa Judul.drawio (7).png', 'ON', 'ZHNhZEBnbWFpbC5jb20=', '2023-10-10 12:53:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_kriteria`
--
ALTER TABLE `detail_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail_kriteria`
--
ALTER TABLE `detail_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
