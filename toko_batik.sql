-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2021 at 06:35 PM
-- Server version: 10.1.47-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batik_paoman`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `nama`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'dzikra@gmail.com', '$2y$10$FEmpEdNE1tyVaYLq.VouHuIawJMSoBtBvONnGJLA6edinb8pHfcly', 'Dzikra Fathin', '089', 'bekasi', '2021-05-23 08:34:50', '2021-05-23 08:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `jumlah_harga` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `pemesanan_id`, `produk_id`, `qty`, `jumlah_harga`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 2, 2, 500000, 0, '2021-05-22 09:53:14', '2021-05-22 09:53:14'),
(5, 2, 1, 2, 400000, 0, '2021-05-22 10:35:01', '2021-05-22 10:35:01'),
(7, 4, 2, 3, 750000, 0, '2021-05-22 20:31:40', '2021-05-22 20:31:51'),
(8, 4, 1, 1, 200000, 0, '2021-05-22 20:32:19', '2021-05-22 20:32:19'),
(9, 5, 1, 2, 400000, 0, '2021-05-24 04:33:44', '2021-05-24 04:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_03_16_182121_create_produk_table', 1),
(2, '2021_03_16_182306_create_admin_table', 1),
(3, '2021_03_16_182313_create_pembeli_table', 1),
(4, '2021_03_20_163623_create_pemesanan_table', 1),
(5, '2021_03_20_163631_create_riwayat_pemesanan_table', 1),
(6, '2021_03_21_164909_create_pembayaran_table', 1),
(7, '2021_04_25_233300_create_penjualan_table', 1),
(8, '2021_05_23_152219_create_keranjang_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) UNSIGNED NOT NULL,
  `metode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `pemesanan_id`, `metode`, `foto`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '1621706309_68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f706c6d44416d683573314d6254413d3d2d3831393630393638302e31356533613734643633363.jpg', '2021-05-23', '2', '2021-05-22 10:58:29', '2021-05-24 04:07:53'),
(2, 2, '1', '1621831107_4pixel.jpg', '2021-05-24', '4', '2021-05-24 04:38:27', '2021-05-24 04:59:55'),
(3, 6, '1', '1621840697_4pixel.jpg', '2021-05-24', '1', '2021-05-24 07:18:17', '2021-05-24 07:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pembeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id`, `email`, `password`, `nama_pembeli`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 'zulfa@gmail.com', '$2y$10$5uju3YFbHx4FoHpisggVw.6MPAnf6lHDNJ3xavBm/uzCtIW8h1g1m', 'Zulfa Khoerul Marah', '089567432234', 'Indramayu', '2021-03-24 08:11:39', '2021-03-24 08:11:39'),
(4, 'firman@gmail.com', '$2y$10$TpBCObxgrc1SMVZ2fmdwLuHASIm6AtHS35sat75RQ8C3BiJiFmQYu', 'Firman', '089987654321', 'Celeng IMY', '2021-05-22 20:29:39', '2021-05-22 20:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembeli_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date DEFAULT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `pembeli_id`, `tanggal`, `metode_pembayaran`, `no_hp`, `status`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 2, '2021-05-23', '1', '089567432235', '4', 500000, '2021-05-22 06:00:21', '2021-05-24 04:08:24'),
(2, 2, '2021-05-23', '2', '089567432234', '4', 400000, '2021-05-22 10:35:00', '2021-05-24 04:59:55'),
(4, 4, '2021-05-23', '1', '089987654111', '1', 950000, '2021-05-22 20:31:40', '2021-05-22 20:32:34'),
(5, 2, '2021-05-24', '1', '089567432234', '5', 400000, '2021-05-24 04:33:44', '2021-05-24 04:40:49'),
(6, 2, '2021-05-24', '1', '089567432234', '2', 450000, '2021-05-24 07:16:32', '2021-05-24 07:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) UNSIGNED NOT NULL,
  `pendapatan` double NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `pemesanan_id`, `pendapatan`, `tanggal`, `created_at`, `updated_at`) VALUES
(4, 1, 900000, '2021-05-24', '2021-05-24 04:08:24', '2021-05-24 04:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` double NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `stok`, `harga`, `tipe`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Kembang pete', 'Kain batik', 6, 200000, 'Kain', 'kembang-pete.jpg', NULL, '2021-05-24 07:17:17'),
(2, 'Batik Lasem', 'Kain Batik', 41, 250000, 'Kain', 'batik lasem.jpg', NULL, '2021-05-24 07:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pemesanan`
--

CREATE TABLE `riwayat_pemesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembeli_id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_pemesanan`
--

INSERT INTO `riwayat_pemesanan` (`id`, `pembeli_id`, `pemesanan_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2021-05-22 10:17:53', '2021-05-22 10:17:53'),
(2, 2, 2, '2021-05-22 10:35:14', '2021-05-22 10:35:14'),
(3, 4, 4, '2021-05-22 20:32:34', '2021-05-22 20:32:34'),
(4, 2, 5, '2021-05-24 04:36:40', '2021-05-24 04:36:40'),
(5, 2, 6, '2021-05-24 07:17:17', '2021-05-24 07:17:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjang_pemesanan_id_foreign` (`pemesanan_id`),
  ADD KEY `keranjang_produk_id_foreign` (`produk_id`);

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
  ADD KEY `pembayaran_pemesanan_id_foreign` (`pemesanan_id`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanan_pembeli_id_foreign` (`pembeli_id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_pemesanan_id_foreign` (`pemesanan_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_pemesanan`
--
ALTER TABLE `riwayat_pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_pemesanan_pembeli_id_foreign` (`pembeli_id`),
  ADD KEY `riwayat_pemesanan_pemesanan_id_foreign` (`pemesanan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `riwayat_pemesanan`
--
ALTER TABLE `riwayat_pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`),
  ADD CONSTRAINT `keranjang_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_pembeli_id_foreign` FOREIGN KEY (`pembeli_id`) REFERENCES `pembeli` (`id`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`);

--
-- Constraints for table `riwayat_pemesanan`
--
ALTER TABLE `riwayat_pemesanan`
  ADD CONSTRAINT `riwayat_pemesanan_pembeli_id_foreign` FOREIGN KEY (`pembeli_id`) REFERENCES `pembeli` (`id`),
  ADD CONSTRAINT `riwayat_pemesanan_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
