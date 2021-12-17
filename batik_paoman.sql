-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 10 Jun 2021 pada 17.06
-- Versi Server: 10.1.47-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.4.20

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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `nama`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'dzikra@gmail.com', '$2y$10$Tm6xNWeKIcMbRZkGLPBT9etlusFd8CcJUlPzuqxsVmEUdJwgaxyR6', 'Dzikra Fathin', '089', 'bekasi', '2021-05-23 08:34:50', '2021-05-23 08:34:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
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
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `pemesanan_id`, `produk_id`, `qty`, `jumlah_harga`, `status`, `created_at`, `updated_at`) VALUES
(15, 10, 1, 1, 200000, 0, '2021-06-09 09:37:32', '2021-06-09 09:37:32'),
(16, 11, 2, 6, 1500000, 0, '2021-06-09 09:46:52', '2021-06-10 01:28:33'),
(17, 12, 2, 2, 500000, 0, '2021-06-10 06:50:36', '2021-06-10 06:50:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) UNSIGNED NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `id_provinsi` int(10) UNSIGNED NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `kodepos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `tipe`, `id_provinsi`, `nama_kota`, `kodepos`) VALUES
(1, 'Kabupaten', 21, 'Aceh Barat', '23681'),
(2, 'Kabupaten', 21, 'Aceh Barat Daya', '23764'),
(3, 'Kabupaten', 21, 'Aceh Besar', '23951'),
(4, 'Kabupaten', 21, 'Aceh Jaya', '23654'),
(5, 'Kabupaten', 21, 'Aceh Selatan', '23719'),
(6, 'Kabupaten', 21, 'Aceh Singkil', '24785'),
(7, 'Kabupaten', 21, 'Aceh Tamiang', '24476'),
(8, 'Kabupaten', 21, 'Aceh Tengah', '24511'),
(9, 'Kabupaten', 21, 'Aceh Tenggara', '24611'),
(10, 'Kabupaten', 21, 'Aceh Timur', '24454'),
(11, 'Kabupaten', 21, 'Aceh Utara', '24382'),
(12, 'Kabupaten', 32, 'Agam', '26411'),
(13, 'Kabupaten', 23, 'Alor', '85811'),
(14, 'Kota', 19, 'Ambon', '97222'),
(15, 'Kabupaten', 34, 'Asahan', '21214'),
(16, 'Kabupaten', 24, 'Asmat', '99777'),
(17, 'Kabupaten', 1, 'Badung', '80351'),
(18, 'Kabupaten', 13, 'Balangan', '71611'),
(19, 'Kota', 15, 'Balikpapan', '76111'),
(20, 'Kota', 21, 'Banda Aceh', '23238'),
(21, 'Kota', 18, 'Bandar Lampung', '35139'),
(22, 'Kabupaten', 9, 'Bandung', '40311'),
(23, 'Kota', 9, 'Bandung', '40111'),
(24, 'Kabupaten', 9, 'Bandung Barat', '40721'),
(25, 'Kabupaten', 29, 'Banggai', '94711'),
(26, 'Kabupaten', 29, 'Banggai Kepulauan', '94881'),
(27, 'Kabupaten', 2, 'Bangka', '33212'),
(28, 'Kabupaten', 2, 'Bangka Barat', '33315'),
(29, 'Kabupaten', 2, 'Bangka Selatan', '33719'),
(30, 'Kabupaten', 2, 'Bangka Tengah', '33613'),
(31, 'Kabupaten', 11, 'Bangkalan', '69118'),
(32, 'Kabupaten', 1, 'Bangli', '80619'),
(33, 'Kabupaten', 13, 'Banjar', '70619'),
(34, 'Kota', 9, 'Banjar', '46311'),
(35, 'Kota', 13, 'Banjarbaru', '70712'),
(36, 'Kota', 13, 'Banjarmasin', '70117'),
(37, 'Kabupaten', 10, 'Banjarnegara', '53419'),
(38, 'Kabupaten', 28, 'Bantaeng', '92411'),
(39, 'Kabupaten', 5, 'Bantul', '55715'),
(40, 'Kabupaten', 33, 'Banyuasin', '30911'),
(41, 'Kabupaten', 10, 'Banyumas', '53114'),
(42, 'Kabupaten', 11, 'Banyuwangi', '68416'),
(43, 'Kabupaten', 13, 'Barito Kuala', '70511'),
(44, 'Kabupaten', 14, 'Barito Selatan', '73711'),
(45, 'Kabupaten', 14, 'Barito Timur', '73671'),
(46, 'Kabupaten', 14, 'Barito Utara', '73881'),
(47, 'Kabupaten', 28, 'Barru', '90719'),
(48, 'Kota', 17, 'Batam', '29413'),
(49, 'Kabupaten', 10, 'Batang', '51211'),
(50, 'Kabupaten', 8, 'Batang Hari', '36613'),
(51, 'Kota', 11, 'Batu', '65311'),
(52, 'Kabupaten', 34, 'Batu Bara', '21655'),
(53, 'Kota', 30, 'Bau-Bau', '93719'),
(54, 'Kabupaten', 9, 'Bekasi', '17837'),
(55, 'Kota', 9, 'Bekasi', '17121'),
(56, 'Kabupaten', 2, 'Belitung', '33419'),
(57, 'Kabupaten', 2, 'Belitung Timur', '33519'),
(58, 'Kabupaten', 23, 'Belu', '85711'),
(59, 'Kabupaten', 21, 'Bener Meriah', '24581'),
(60, 'Kabupaten', 26, 'Bengkalis', '28719'),
(61, 'Kabupaten', 12, 'Bengkayang', '79213'),
(62, 'Kota', 4, 'Bengkulu', '38229'),
(63, 'Kabupaten', 4, 'Bengkulu Selatan', '38519'),
(64, 'Kabupaten', 4, 'Bengkulu Tengah', '38319'),
(65, 'Kabupaten', 4, 'Bengkulu Utara', '38619'),
(66, 'Kabupaten', 15, 'Berau', '77311'),
(67, 'Kabupaten', 24, 'Biak Numfor', '98119'),
(68, 'Kabupaten', 22, 'Bima', '84171'),
(69, 'Kota', 22, 'Bima', '84139'),
(70, 'Kota', 34, 'Binjai', '20712'),
(71, 'Kabupaten', 17, 'Bintan', '29135'),
(72, 'Kabupaten', 21, 'Bireuen', '24219'),
(73, 'Kota', 31, 'Bitung', '95512'),
(74, 'Kabupaten', 11, 'Blitar', '66171'),
(75, 'Kota', 11, 'Blitar', '66124'),
(76, 'Kabupaten', 10, 'Blora', '58219'),
(77, 'Kabupaten', 7, 'Boalemo', '96319'),
(78, 'Kabupaten', 9, 'Bogor', '16911'),
(79, 'Kota', 9, 'Bogor', '16119'),
(80, 'Kabupaten', 11, 'Bojonegoro', '62119'),
(81, 'Kabupaten', 31, 'Bolaang Mongondow (Bolmong)', '95755'),
(82, 'Kabupaten', 31, 'Bolaang Mongondow Selatan', '95774'),
(83, 'Kabupaten', 31, 'Bolaang Mongondow Timur', '95783'),
(84, 'Kabupaten', 31, 'Bolaang Mongondow Utara', '95765'),
(85, 'Kabupaten', 30, 'Bombana', '93771'),
(86, 'Kabupaten', 11, 'Bondowoso', '68219'),
(87, 'Kabupaten', 28, 'Bone', '92713'),
(88, 'Kabupaten', 7, 'Bone Bolango', '96511'),
(89, 'Kota', 15, 'Bontang', '75313'),
(90, 'Kabupaten', 24, 'Boven Digoel', '99662'),
(91, 'Kabupaten', 10, 'Boyolali', '57312'),
(92, 'Kabupaten', 10, 'Brebes', '52212'),
(93, 'Kota', 32, 'Bukittinggi', '26115'),
(94, 'Kabupaten', 1, 'Buleleng', '81111'),
(95, 'Kabupaten', 28, 'Bulukumba', '92511'),
(96, 'Kabupaten', 16, 'Bulungan (Bulongan)', '77211'),
(97, 'Kabupaten', 8, 'Bungo', '37216'),
(98, 'Kabupaten', 29, 'Buol', '94564'),
(99, 'Kabupaten', 19, 'Buru', '97371'),
(100, 'Kabupaten', 19, 'Buru Selatan', '97351'),
(101, 'Kabupaten', 30, 'Buton', '93754'),
(102, 'Kabupaten', 30, 'Buton Utara', '93745'),
(103, 'Kabupaten', 9, 'Ciamis', '46211'),
(104, 'Kabupaten', 9, 'Cianjur', '43217'),
(105, 'Kabupaten', 10, 'Cilacap', '53211'),
(106, 'Kota', 3, 'Cilegon', '42417'),
(107, 'Kota', 9, 'Cimahi', '40512'),
(108, 'Kabupaten', 9, 'Cirebon', '45611'),
(109, 'Kota', 9, 'Cirebon', '45116'),
(110, 'Kabupaten', 34, 'Dairi', '22211'),
(111, 'Kabupaten', 24, 'Deiyai (Deliyai)', '98784'),
(112, 'Kabupaten', 34, 'Deli Serdang', '20511'),
(113, 'Kabupaten', 10, 'Demak', '59519'),
(114, 'Kota', 1, 'Denpasar', '80227'),
(115, 'Kota', 9, 'Depok', '16416'),
(116, 'Kabupaten', 32, 'Dharmasraya', '27612'),
(117, 'Kabupaten', 24, 'Dogiyai', '98866'),
(118, 'Kabupaten', 22, 'Dompu', '84217'),
(119, 'Kabupaten', 29, 'Donggala', '94341'),
(120, 'Kota', 26, 'Dumai', '28811'),
(121, 'Kabupaten', 33, 'Empat Lawang', '31811'),
(122, 'Kabupaten', 23, 'Ende', '86351'),
(123, 'Kabupaten', 28, 'Enrekang', '91719'),
(124, 'Kabupaten', 25, 'Fakfak', '98651'),
(125, 'Kabupaten', 23, 'Flores Timur', '86213'),
(126, 'Kabupaten', 9, 'Garut', '44126'),
(127, 'Kabupaten', 21, 'Gayo Lues', '24653'),
(128, 'Kabupaten', 1, 'Gianyar', '80519'),
(129, 'Kabupaten', 7, 'Gorontalo', '96218'),
(130, 'Kota', 7, 'Gorontalo', '96115'),
(131, 'Kabupaten', 7, 'Gorontalo Utara', '96611'),
(132, 'Kabupaten', 28, 'Gowa', '92111'),
(133, 'Kabupaten', 11, 'Gresik', '61115'),
(134, 'Kabupaten', 10, 'Grobogan', '58111'),
(135, 'Kabupaten', 5, 'Gunung Kidul', '55812'),
(136, 'Kabupaten', 14, 'Gunung Mas', '74511'),
(137, 'Kota', 34, 'Gunungsitoli', '22813'),
(138, 'Kabupaten', 20, 'Halmahera Barat', '97757'),
(139, 'Kabupaten', 20, 'Halmahera Selatan', '97911'),
(140, 'Kabupaten', 20, 'Halmahera Tengah', '97853'),
(141, 'Kabupaten', 20, 'Halmahera Timur', '97862'),
(142, 'Kabupaten', 20, 'Halmahera Utara', '97762'),
(143, 'Kabupaten', 13, 'Hulu Sungai Selatan', '71212'),
(144, 'Kabupaten', 13, 'Hulu Sungai Tengah', '71313'),
(145, 'Kabupaten', 13, 'Hulu Sungai Utara', '71419'),
(146, 'Kabupaten', 34, 'Humbang Hasundutan', '22457'),
(147, 'Kabupaten', 26, 'Indragiri Hilir', '29212'),
(148, 'Kabupaten', 26, 'Indragiri Hulu', '29319'),
(149, 'Kabupaten', 9, 'Indramayu', '45214'),
(150, 'Kabupaten', 24, 'Intan Jaya', '98771'),
(151, 'Kota', 6, 'Jakarta Barat', '11220'),
(152, 'Kota', 6, 'Jakarta Pusat', '10540'),
(153, 'Kota', 6, 'Jakarta Selatan', '12230'),
(154, 'Kota', 6, 'Jakarta Timur', '13330'),
(155, 'Kota', 6, 'Jakarta Utara', '14140'),
(156, 'Kota', 8, 'Jambi', '36111'),
(157, 'Kabupaten', 24, 'Jayapura', '99352'),
(158, 'Kota', 24, 'Jayapura', '99114'),
(159, 'Kabupaten', 24, 'Jayawijaya', '99511'),
(160, 'Kabupaten', 11, 'Jember', '68113'),
(161, 'Kabupaten', 1, 'Jembrana', '82251'),
(162, 'Kabupaten', 28, 'Jeneponto', '92319'),
(163, 'Kabupaten', 10, 'Jepara', '59419'),
(164, 'Kabupaten', 11, 'Jombang', '61415'),
(165, 'Kabupaten', 25, 'Kaimana', '98671'),
(166, 'Kabupaten', 26, 'Kampar', '28411'),
(167, 'Kabupaten', 14, 'Kapuas', '73583'),
(168, 'Kabupaten', 12, 'Kapuas Hulu', '78719'),
(169, 'Kabupaten', 10, 'Karanganyar', '57718'),
(170, 'Kabupaten', 1, 'Karangasem', '80819'),
(171, 'Kabupaten', 9, 'Karawang', '41311'),
(172, 'Kabupaten', 17, 'Karimun', '29611'),
(173, 'Kabupaten', 34, 'Karo', '22119'),
(174, 'Kabupaten', 14, 'Katingan', '74411'),
(175, 'Kabupaten', 4, 'Kaur', '38911'),
(176, 'Kabupaten', 12, 'Kayong Utara', '78852'),
(177, 'Kabupaten', 10, 'Kebumen', '54319'),
(178, 'Kabupaten', 11, 'Kediri', '64184'),
(179, 'Kota', 11, 'Kediri', '64125'),
(180, 'Kabupaten', 24, 'Keerom', '99461'),
(181, 'Kabupaten', 10, 'Kendal', '51314'),
(182, 'Kota', 30, 'Kendari', '93126'),
(183, 'Kabupaten', 4, 'Kepahiang', '39319'),
(184, 'Kabupaten', 17, 'Kepulauan Anambas', '29991'),
(185, 'Kabupaten', 19, 'Kepulauan Aru', '97681'),
(186, 'Kabupaten', 32, 'Kepulauan Mentawai', '25771'),
(187, 'Kabupaten', 26, 'Kepulauan Meranti', '28791'),
(188, 'Kabupaten', 31, 'Kepulauan Sangihe', '95819'),
(189, 'Kabupaten', 6, 'Kepulauan Seribu', '14550'),
(190, 'Kabupaten', 31, 'Kepulauan Siau Tagulandang Biaro (Sitaro)', '95862'),
(191, 'Kabupaten', 20, 'Kepulauan Sula', '97995'),
(192, 'Kabupaten', 31, 'Kepulauan Talaud', '95885'),
(193, 'Kabupaten', 24, 'Kepulauan Yapen (Yapen Waropen)', '98211'),
(194, 'Kabupaten', 8, 'Kerinci', '37167'),
(195, 'Kabupaten', 12, 'Ketapang', '78874'),
(196, 'Kabupaten', 10, 'Klaten', '57411'),
(197, 'Kabupaten', 1, 'Klungkung', '80719'),
(198, 'Kabupaten', 30, 'Kolaka', '93511'),
(199, 'Kabupaten', 30, 'Kolaka Utara', '93911'),
(200, 'Kabupaten', 30, 'Konawe', '93411'),
(201, 'Kabupaten', 30, 'Konawe Selatan', '93811'),
(202, 'Kabupaten', 30, 'Konawe Utara', '93311'),
(203, 'Kabupaten', 13, 'Kotabaru', '72119'),
(204, 'Kota', 31, 'Kotamobagu', '95711'),
(205, 'Kabupaten', 14, 'Kotawaringin Barat', '74119'),
(206, 'Kabupaten', 14, 'Kotawaringin Timur', '74364'),
(207, 'Kabupaten', 26, 'Kuantan Singingi', '29519'),
(208, 'Kabupaten', 12, 'Kubu Raya', '78311'),
(209, 'Kabupaten', 10, 'Kudus', '59311'),
(210, 'Kabupaten', 5, 'Kulon Progo', '55611'),
(211, 'Kabupaten', 9, 'Kuningan', '45511'),
(212, 'Kabupaten', 23, 'Kupang', '85362'),
(213, 'Kota', 23, 'Kupang', '85119'),
(214, 'Kabupaten', 15, 'Kutai Barat', '75711'),
(215, 'Kabupaten', 15, 'Kutai Kartanegara', '75511'),
(216, 'Kabupaten', 15, 'Kutai Timur', '75611'),
(217, 'Kabupaten', 34, 'Labuhan Batu', '21412'),
(218, 'Kabupaten', 34, 'Labuhan Batu Selatan', '21511'),
(219, 'Kabupaten', 34, 'Labuhan Batu Utara', '21711'),
(220, 'Kabupaten', 33, 'Lahat', '31419'),
(221, 'Kabupaten', 14, 'Lamandau', '74611'),
(222, 'Kabupaten', 11, 'Lamongan', '64125'),
(223, 'Kabupaten', 18, 'Lampung Barat', '34814'),
(224, 'Kabupaten', 18, 'Lampung Selatan', '35511'),
(225, 'Kabupaten', 18, 'Lampung Tengah', '34212'),
(226, 'Kabupaten', 18, 'Lampung Timur', '34319'),
(227, 'Kabupaten', 18, 'Lampung Utara', '34516'),
(228, 'Kabupaten', 12, 'Landak', '78319'),
(229, 'Kabupaten', 34, 'Langkat', '20811'),
(230, 'Kota', 21, 'Langsa', '24412'),
(231, 'Kabupaten', 24, 'Lanny Jaya', '99531'),
(232, 'Kabupaten', 3, 'Lebak', '42319'),
(233, 'Kabupaten', 4, 'Lebong', '39264'),
(234, 'Kabupaten', 23, 'Lembata', '86611'),
(235, 'Kota', 21, 'Lhokseumawe', '24352'),
(236, 'Kabupaten', 32, 'Lima Puluh Koto/Kota', '26671'),
(237, 'Kabupaten', 17, 'Lingga', '29811'),
(238, 'Kabupaten', 22, 'Lombok Barat', '83311'),
(239, 'Kabupaten', 22, 'Lombok Tengah', '83511'),
(240, 'Kabupaten', 22, 'Lombok Timur', '83612'),
(241, 'Kabupaten', 22, 'Lombok Utara', '83711'),
(242, 'Kota', 33, 'Lubuk Linggau', '31614'),
(243, 'Kabupaten', 11, 'Lumajang', '67319'),
(244, 'Kabupaten', 28, 'Luwu', '91994'),
(245, 'Kabupaten', 28, 'Luwu Timur', '92981'),
(246, 'Kabupaten', 28, 'Luwu Utara', '92911'),
(247, 'Kabupaten', 11, 'Madiun', '63153'),
(248, 'Kota', 11, 'Madiun', '63122'),
(249, 'Kabupaten', 10, 'Magelang', '56519'),
(250, 'Kota', 10, 'Magelang', '56133'),
(251, 'Kabupaten', 11, 'Magetan', '63314'),
(252, 'Kabupaten', 9, 'Majalengka', '45412'),
(253, 'Kabupaten', 27, 'Majene', '91411'),
(254, 'Kota', 28, 'Makassar', '90111'),
(255, 'Kabupaten', 11, 'Malang', '65163'),
(256, 'Kota', 11, 'Malang', '65112'),
(257, 'Kabupaten', 16, 'Malinau', '77511'),
(258, 'Kabupaten', 19, 'Maluku Barat Daya', '97451'),
(259, 'Kabupaten', 19, 'Maluku Tengah', '97513'),
(260, 'Kabupaten', 19, 'Maluku Tenggara', '97651'),
(261, 'Kabupaten', 19, 'Maluku Tenggara Barat', '97465'),
(262, 'Kabupaten', 27, 'Mamasa', '91362'),
(263, 'Kabupaten', 24, 'Mamberamo Raya', '99381'),
(264, 'Kabupaten', 24, 'Mamberamo Tengah', '99553'),
(265, 'Kabupaten', 27, 'Mamuju', '91519'),
(266, 'Kabupaten', 27, 'Mamuju Utara', '91571'),
(267, 'Kota', 31, 'Manado', '95247'),
(268, 'Kabupaten', 34, 'Mandailing Natal', '22916'),
(269, 'Kabupaten', 23, 'Manggarai', '86551'),
(270, 'Kabupaten', 23, 'Manggarai Barat', '86711'),
(271, 'Kabupaten', 23, 'Manggarai Timur', '86811'),
(272, 'Kabupaten', 25, 'Manokwari', '98311'),
(273, 'Kabupaten', 25, 'Manokwari Selatan', '98355'),
(274, 'Kabupaten', 24, 'Mappi', '99853'),
(275, 'Kabupaten', 28, 'Maros', '90511'),
(276, 'Kota', 22, 'Mataram', '83131'),
(277, 'Kabupaten', 25, 'Maybrat', '98051'),
(278, 'Kota', 34, 'Medan', '20228'),
(279, 'Kabupaten', 12, 'Melawi', '78619'),
(280, 'Kabupaten', 8, 'Merangin', '37319'),
(281, 'Kabupaten', 24, 'Merauke', '99613'),
(282, 'Kabupaten', 18, 'Mesuji', '34911'),
(283, 'Kota', 18, 'Metro', '34111'),
(284, 'Kabupaten', 24, 'Mimika', '99962'),
(285, 'Kabupaten', 31, 'Minahasa', '95614'),
(286, 'Kabupaten', 31, 'Minahasa Selatan', '95914'),
(287, 'Kabupaten', 31, 'Minahasa Tenggara', '95995'),
(288, 'Kabupaten', 31, 'Minahasa Utara', '95316'),
(289, 'Kabupaten', 11, 'Mojokerto', '61382'),
(290, 'Kota', 11, 'Mojokerto', '61316'),
(291, 'Kabupaten', 29, 'Morowali', '94911'),
(292, 'Kabupaten', 33, 'Muara Enim', '31315'),
(293, 'Kabupaten', 8, 'Muaro Jambi', '36311'),
(294, 'Kabupaten', 4, 'Muko Muko', '38715'),
(295, 'Kabupaten', 30, 'Muna', '93611'),
(296, 'Kabupaten', 14, 'Murung Raya', '73911'),
(297, 'Kabupaten', 33, 'Musi Banyuasin', '30719'),
(298, 'Kabupaten', 33, 'Musi Rawas', '31661'),
(299, 'Kabupaten', 24, 'Nabire', '98816'),
(300, 'Kabupaten', 21, 'Nagan Raya', '23674'),
(301, 'Kabupaten', 23, 'Nagekeo', '86911'),
(302, 'Kabupaten', 17, 'Natuna', '29711'),
(303, 'Kabupaten', 24, 'Nduga', '99541'),
(304, 'Kabupaten', 23, 'Ngada', '86413'),
(305, 'Kabupaten', 11, 'Nganjuk', '64414'),
(306, 'Kabupaten', 11, 'Ngawi', '63219'),
(307, 'Kabupaten', 34, 'Nias', '22876'),
(308, 'Kabupaten', 34, 'Nias Barat', '22895'),
(309, 'Kabupaten', 34, 'Nias Selatan', '22865'),
(310, 'Kabupaten', 34, 'Nias Utara', '22856'),
(311, 'Kabupaten', 16, 'Nunukan', '77421'),
(312, 'Kabupaten', 33, 'Ogan Ilir', '30811'),
(313, 'Kabupaten', 33, 'Ogan Komering Ilir', '30618'),
(314, 'Kabupaten', 33, 'Ogan Komering Ulu', '32112'),
(315, 'Kabupaten', 33, 'Ogan Komering Ulu Selatan', '32211'),
(316, 'Kabupaten', 33, 'Ogan Komering Ulu Timur', '32312'),
(317, 'Kabupaten', 11, 'Pacitan', '63512'),
(318, 'Kota', 32, 'Padang', '25112'),
(319, 'Kabupaten', 34, 'Padang Lawas', '22763'),
(320, 'Kabupaten', 34, 'Padang Lawas Utara', '22753'),
(321, 'Kota', 32, 'Padang Panjang', '27122'),
(322, 'Kabupaten', 32, 'Padang Pariaman', '25583'),
(323, 'Kota', 34, 'Padang Sidempuan', '22727'),
(324, 'Kota', 33, 'Pagar Alam', '31512'),
(325, 'Kabupaten', 34, 'Pakpak Bharat', '22272'),
(326, 'Kota', 14, 'Palangka Raya', '73112'),
(327, 'Kota', 33, 'Palembang', '30111'),
(328, 'Kota', 28, 'Palopo', '91911'),
(329, 'Kota', 29, 'Palu', '94111'),
(330, 'Kabupaten', 11, 'Pamekasan', '69319'),
(331, 'Kabupaten', 3, 'Pandeglang', '42212'),
(332, 'Kabupaten', 9, 'Pangandaran', '46511'),
(333, 'Kabupaten', 28, 'Pangkajene Kepulauan', '90611'),
(334, 'Kota', 2, 'Pangkal Pinang', '33115'),
(335, 'Kabupaten', 24, 'Paniai', '98765'),
(336, 'Kota', 28, 'Parepare', '91123'),
(337, 'Kota', 32, 'Pariaman', '25511'),
(338, 'Kabupaten', 29, 'Parigi Moutong', '94411'),
(339, 'Kabupaten', 32, 'Pasaman', '26318'),
(340, 'Kabupaten', 32, 'Pasaman Barat', '26511'),
(341, 'Kabupaten', 15, 'Paser', '76211'),
(342, 'Kabupaten', 11, 'Pasuruan', '67153'),
(343, 'Kota', 11, 'Pasuruan', '67118'),
(344, 'Kabupaten', 10, 'Pati', '59114'),
(345, 'Kota', 32, 'Payakumbuh', '26213'),
(346, 'Kabupaten', 25, 'Pegunungan Arfak', '98354'),
(347, 'Kabupaten', 24, 'Pegunungan Bintang', '99573'),
(348, 'Kabupaten', 10, 'Pekalongan', '51161'),
(349, 'Kota', 10, 'Pekalongan', '51122'),
(350, 'Kota', 26, 'Pekanbaru', '28112'),
(351, 'Kabupaten', 26, 'Pelalawan', '28311'),
(352, 'Kabupaten', 10, 'Pemalang', '52319'),
(353, 'Kota', 34, 'Pematang Siantar', '21126'),
(354, 'Kabupaten', 15, 'Penajam Paser Utara', '76311'),
(355, 'Kabupaten', 18, 'Pesawaran', '35312'),
(356, 'Kabupaten', 18, 'Pesisir Barat', '35974'),
(357, 'Kabupaten', 32, 'Pesisir Selatan', '25611'),
(358, 'Kabupaten', 21, 'Pidie', '24116'),
(359, 'Kabupaten', 21, 'Pidie Jaya', '24186'),
(360, 'Kabupaten', 28, 'Pinrang', '91251'),
(361, 'Kabupaten', 7, 'Pohuwato', '96419'),
(362, 'Kabupaten', 27, 'Polewali Mandar', '91311'),
(363, 'Kabupaten', 11, 'Ponorogo', '63411'),
(364, 'Kabupaten', 12, 'Pontianak', '78971'),
(365, 'Kota', 12, 'Pontianak', '78112'),
(366, 'Kabupaten', 29, 'Poso', '94615'),
(367, 'Kota', 33, 'Prabumulih', '31121'),
(368, 'Kabupaten', 18, 'Pringsewu', '35719'),
(369, 'Kabupaten', 11, 'Probolinggo', '67282'),
(370, 'Kota', 11, 'Probolinggo', '67215'),
(371, 'Kabupaten', 14, 'Pulang Pisau', '74811'),
(372, 'Kabupaten', 20, 'Pulau Morotai', '97771'),
(373, 'Kabupaten', 24, 'Puncak', '98981'),
(374, 'Kabupaten', 24, 'Puncak Jaya', '98979'),
(375, 'Kabupaten', 10, 'Purbalingga', '53312'),
(376, 'Kabupaten', 9, 'Purwakarta', '41119'),
(377, 'Kabupaten', 10, 'Purworejo', '54111'),
(378, 'Kabupaten', 25, 'Raja Ampat', '98489'),
(379, 'Kabupaten', 4, 'Rejang Lebong', '39112'),
(380, 'Kabupaten', 10, 'Rembang', '59219'),
(381, 'Kabupaten', 26, 'Rokan Hilir', '28992'),
(382, 'Kabupaten', 26, 'Rokan Hulu', '28511'),
(383, 'Kabupaten', 23, 'Rote Ndao', '85982'),
(384, 'Kota', 21, 'Sabang', '23512'),
(385, 'Kabupaten', 23, 'Sabu Raijua', '85391'),
(386, 'Kota', 10, 'Salatiga', '50711'),
(387, 'Kota', 15, 'Samarinda', '75133'),
(388, 'Kabupaten', 12, 'Sambas', '79453'),
(389, 'Kabupaten', 34, 'Samosir', '22392'),
(390, 'Kabupaten', 11, 'Sampang', '69219'),
(391, 'Kabupaten', 12, 'Sanggau', '78557'),
(392, 'Kabupaten', 24, 'Sarmi', '99373'),
(393, 'Kabupaten', 8, 'Sarolangun', '37419'),
(394, 'Kota', 32, 'Sawah Lunto', '27416'),
(395, 'Kabupaten', 12, 'Sekadau', '79583'),
(396, 'Kabupaten', 28, 'Selayar (Kepulauan Selayar)', '92812'),
(397, 'Kabupaten', 4, 'Seluma', '38811'),
(398, 'Kabupaten', 10, 'Semarang', '50511'),
(399, 'Kota', 10, 'Semarang', '50135'),
(400, 'Kabupaten', 19, 'Seram Bagian Barat', '97561'),
(401, 'Kabupaten', 19, 'Seram Bagian Timur', '97581'),
(402, 'Kabupaten', 3, 'Serang', '42182'),
(403, 'Kota', 3, 'Serang', '42111'),
(404, 'Kabupaten', 34, 'Serdang Bedagai', '20915'),
(405, 'Kabupaten', 14, 'Seruyan', '74211'),
(406, 'Kabupaten', 26, 'Siak', '28623'),
(407, 'Kota', 34, 'Sibolga', '22522'),
(408, 'Kabupaten', 28, 'Sidenreng Rappang/Rapang', '91613'),
(409, 'Kabupaten', 11, 'Sidoarjo', '61219'),
(410, 'Kabupaten', 29, 'Sigi', '94364'),
(411, 'Kabupaten', 32, 'Sijunjung (Sawah Lunto Sijunjung)', '27511'),
(412, 'Kabupaten', 23, 'Sikka', '86121'),
(413, 'Kabupaten', 34, 'Simalungun', '21162'),
(414, 'Kabupaten', 21, 'Simeulue', '23891'),
(415, 'Kota', 12, 'Singkawang', '79117'),
(416, 'Kabupaten', 28, 'Sinjai', '92615'),
(417, 'Kabupaten', 12, 'Sintang', '78619'),
(418, 'Kabupaten', 11, 'Situbondo', '68316'),
(419, 'Kabupaten', 5, 'Sleman', '55513'),
(420, 'Kabupaten', 32, 'Solok', '27365'),
(421, 'Kota', 32, 'Solok', '27315'),
(422, 'Kabupaten', 32, 'Solok Selatan', '27779'),
(423, 'Kabupaten', 28, 'Soppeng', '90812'),
(424, 'Kabupaten', 25, 'Sorong', '98431'),
(425, 'Kota', 25, 'Sorong', '98411'),
(426, 'Kabupaten', 25, 'Sorong Selatan', '98454'),
(427, 'Kabupaten', 10, 'Sragen', '57211'),
(428, 'Kabupaten', 9, 'Subang', '41215'),
(429, 'Kota', 21, 'Subulussalam', '24882'),
(430, 'Kabupaten', 9, 'Sukabumi', '43311'),
(431, 'Kota', 9, 'Sukabumi', '43114'),
(432, 'Kabupaten', 14, 'Sukamara', '74712'),
(433, 'Kabupaten', 10, 'Sukoharjo', '57514'),
(434, 'Kabupaten', 23, 'Sumba Barat', '87219'),
(435, 'Kabupaten', 23, 'Sumba Barat Daya', '87453'),
(436, 'Kabupaten', 23, 'Sumba Tengah', '87358'),
(437, 'Kabupaten', 23, 'Sumba Timur', '87112'),
(438, 'Kabupaten', 22, 'Sumbawa', '84315'),
(439, 'Kabupaten', 22, 'Sumbawa Barat', '84419'),
(440, 'Kabupaten', 9, 'Sumedang', '45326'),
(441, 'Kabupaten', 11, 'Sumenep', '69413'),
(442, 'Kota', 8, 'Sungaipenuh', '37113'),
(443, 'Kabupaten', 24, 'Supiori', '98164'),
(444, 'Kota', 11, 'Surabaya', '60119'),
(445, 'Kota', 10, 'Surakarta (Solo)', '57113'),
(446, 'Kabupaten', 13, 'Tabalong', '71513'),
(447, 'Kabupaten', 1, 'Tabanan', '82119'),
(448, 'Kabupaten', 28, 'Takalar', '92212'),
(449, 'Kabupaten', 25, 'Tambrauw', '98475'),
(450, 'Kabupaten', 16, 'Tana Tidung', '77611'),
(451, 'Kabupaten', 28, 'Tana Toraja', '91819'),
(452, 'Kabupaten', 13, 'Tanah Bumbu', '72211'),
(453, 'Kabupaten', 32, 'Tanah Datar', '27211'),
(454, 'Kabupaten', 13, 'Tanah Laut', '70811'),
(455, 'Kabupaten', 3, 'Tangerang', '15914'),
(456, 'Kota', 3, 'Tangerang', '15111'),
(457, 'Kota', 3, 'Tangerang Selatan', '15332'),
(458, 'Kabupaten', 18, 'Tanggamus', '35619'),
(459, 'Kota', 34, 'Tanjung Balai', '21321'),
(460, 'Kabupaten', 8, 'Tanjung Jabung Barat', '36513'),
(461, 'Kabupaten', 8, 'Tanjung Jabung Timur', '36719'),
(462, 'Kota', 17, 'Tanjung Pinang', '29111'),
(463, 'Kabupaten', 34, 'Tapanuli Selatan', '22742'),
(464, 'Kabupaten', 34, 'Tapanuli Tengah', '22611'),
(465, 'Kabupaten', 34, 'Tapanuli Utara', '22414'),
(466, 'Kabupaten', 13, 'Tapin', '71119'),
(467, 'Kota', 16, 'Tarakan', '77114'),
(468, 'Kabupaten', 9, 'Tasikmalaya', '46411'),
(469, 'Kota', 9, 'Tasikmalaya', '46116'),
(470, 'Kota', 34, 'Tebing Tinggi', '20632'),
(471, 'Kabupaten', 8, 'Tebo', '37519'),
(472, 'Kabupaten', 10, 'Tegal', '52419'),
(473, 'Kota', 10, 'Tegal', '52114'),
(474, 'Kabupaten', 25, 'Teluk Bintuni', '98551'),
(475, 'Kabupaten', 25, 'Teluk Wondama', '98591'),
(476, 'Kabupaten', 10, 'Temanggung', '56212'),
(477, 'Kota', 20, 'Ternate', '97714'),
(478, 'Kota', 20, 'Tidore Kepulauan', '97815'),
(479, 'Kabupaten', 23, 'Timor Tengah Selatan', '85562'),
(480, 'Kabupaten', 23, 'Timor Tengah Utara', '85612'),
(481, 'Kabupaten', 34, 'Toba Samosir', '22316'),
(482, 'Kabupaten', 29, 'Tojo Una-Una', '94683'),
(483, 'Kabupaten', 29, 'Toli-Toli', '94542'),
(484, 'Kabupaten', 24, 'Tolikara', '99411'),
(485, 'Kota', 31, 'Tomohon', '95416'),
(486, 'Kabupaten', 28, 'Toraja Utara', '91831'),
(487, 'Kabupaten', 11, 'Trenggalek', '66312'),
(488, 'Kota', 19, 'Tual', '97612'),
(489, 'Kabupaten', 11, 'Tuban', '62319'),
(490, 'Kabupaten', 18, 'Tulang Bawang', '34613'),
(491, 'Kabupaten', 18, 'Tulang Bawang Barat', '34419'),
(492, 'Kabupaten', 11, 'Tulungagung', '66212'),
(493, 'Kabupaten', 28, 'Wajo', '90911'),
(494, 'Kabupaten', 30, 'Wakatobi', '93791'),
(495, 'Kabupaten', 24, 'Waropen', '98269'),
(496, 'Kabupaten', 18, 'Way Kanan', '34711'),
(497, 'Kabupaten', 10, 'Wonogiri', '57619'),
(498, 'Kabupaten', 10, 'Wonosobo', '56311'),
(499, 'Kabupaten', 24, 'Yahukimo', '99041'),
(500, 'Kabupaten', 24, 'Yalimo', '99481'),
(501, 'Kota', 5, 'Yogyakarta', '55111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) UNSIGNED NOT NULL,
  `metode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_resi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `pemesanan_id`, `metode`, `foto`, `no_resi`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, '1', '1623288657_4pixel.jpg', NULL, '2021-06-10', '4', '2021-06-10 01:30:57', '2021-06-10 02:01:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pembeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id`, `email`, `password`, `nama_pembeli`, `no_hp`, `alamat_lengkap`, `created_at`, `updated_at`) VALUES
(5, 'zulfa@gmail.com', '$2y$10$NcqcYc7/KMzrTThYx8ZL.uYR8YumhlmqXPJTG8i/o3.V11geXd9gC', 'Zulfa Khoerul Mar\'ah', '083276123', 'Plumbon Kabupaten Indramayu', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
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
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `pembeli_id`, `tanggal`, `metode_pembayaran`, `no_hp`, `status`, `total_harga`, `created_at`, `updated_at`) VALUES
(10, 5, '2021-06-09', '1', '083276123', '1', 200000, '2021-06-09 09:37:32', '2021-06-09 09:40:59'),
(11, 5, '2021-06-10', '1', '083276123', '4', 154000, '2021-06-09 09:46:52', '2021-06-10 02:01:30'),
(12, 5, NULL, NULL, NULL, '0', NULL, '2021-06-10 06:50:36', '2021-06-10 06:50:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
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
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `pemesanan_id`, `pendapatan`, `tanggal`, `created_at`, `updated_at`) VALUES
(3, 11, 154000, '2021-06-10', '2021-06-10 02:01:30', '2021-06-10 02:01:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
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
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `stok`, `harga`, `tipe`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Kembang pete', 'Kain batik', 3, 200000, 'Kain', 'kembang-pete.jpg', NULL, '2021-06-09 09:41:00'),
(2, 'Batik Lasem', 'Kain Batik', 31, 250000, 'Kain', 'batik lasem.jpg', NULL, '2021-06-10 01:30:16'),
(3, 'batik', 'batik murah', 12, 30000, 'cap', 'ERD produksi barang.jpg', '2021-06-09 07:48:48', '2021-06-09 07:49:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) UNSIGNED NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pemesanan`
--

CREATE TABLE `riwayat_pemesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembeli_id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayat_pemesanan`
--

INSERT INTO `riwayat_pemesanan` (`id`, `pembeli_id`, `pemesanan_id`, `created_at`, `updated_at`) VALUES
(8, 5, 10, '2021-06-09 09:41:00', '2021-06-09 09:41:00'),
(9, 5, 11, '2021-06-10 01:30:16', '2021-06-10 01:30:16');

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
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD KEY `id_provinsi` (`id_provinsi`);

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
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `riwayat_pemesanan`
--
ALTER TABLE `riwayat_pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`),
  ADD CONSTRAINT `keranjang_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Ketidakleluasaan untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `kota_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_pembeli_id_foreign` FOREIGN KEY (`pembeli_id`) REFERENCES `pembeli` (`id`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`);

--
-- Ketidakleluasaan untuk tabel `riwayat_pemesanan`
--
ALTER TABLE `riwayat_pemesanan`
  ADD CONSTRAINT `riwayat_pemesanan_pembeli_id_foreign` FOREIGN KEY (`pembeli_id`) REFERENCES `pembeli` (`id`),
  ADD CONSTRAINT `riwayat_pemesanan_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
