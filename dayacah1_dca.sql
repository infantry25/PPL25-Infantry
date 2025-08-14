-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2025 at 04:36 AM
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
-- Database: `dayacah1_dca`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL,
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `id_user`, `slug_kategori`, `nama_kategori`, `urutan`, `hits`, `created_at`, `updated_at`) VALUES
(1, 1, 'gondola-gedung', 'Gondola Gedung', 1, 0, '2024-02-18 05:19:45', '2024-02-18 05:19:45'),
(2, 1, 'desain-interior', 'Desain Interior', 2, 0, '2024-02-18 05:19:57', '2024-02-18 05:19:57'),
(3, 1, 'general-trading', 'General Trading', 3, 0, '2024-02-18 05:20:09', '2024-02-18 05:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `nama`, `image`, `created_at`, `updated_at`, `id_user`) VALUES
(1, 'Kementerian Lingkungan Hidup dan Kehutanan', 'client-image/u3Ss1USPP37Iy7U3VoqL5W9ZUkrOyaLp2dRfoGJM.png', '2024-02-18 05:57:30', '2024-02-18 05:57:30', 1),
(2, 'Badan Penanggulangan Bencana Daerah DKI Jakarta', 'client-image/fhDjVLH0KgUSbpDmbYd0O8t0mzenxFtgqd6CZdZl.png', '2024-02-18 05:58:23', '2024-02-18 05:58:23', 1),
(3, 'Dinas Kelautan dan Perikanan Provinsi Banten', 'client-image/ExS8O17n2xof7Xjw4JoVPpJecF7pvcUwVrdpkq45.png', '2024-02-18 05:58:58', '2025-06-17 07:46:06', 5);

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_web` varchar(255) DEFAULT NULL,
  `nama_singkat` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `tagline_2` varchar(255) DEFAULT NULL,
  `tentang` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `meta_text` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `nama_facebook` varchar(255) DEFAULT NULL,
  `nama_twitter` varchar(255) DEFAULT NULL,
  `nama_instagram` varchar(255) DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `id_user`, `nama_web`, `nama_singkat`, `tagline`, `tagline_2`, `tentang`, `deskripsi`, `website`, `email`, `alamat`, `telepon`, `hp`, `logo`, `icon`, `keywords`, `meta_text`, `facebook`, `twitter`, `instagram`, `nama_facebook`, `nama_twitter`, `nama_instagram`, `google_map`, `created_at`, `updated_at`) VALUES
(1, 5, 'PT. Daya Cahya Abadi', 'PT. DCA', '“WE ARE GONDOLA SPECIALIST.  CONTRACTOR, DESIGNER, INSTALATION & MATERIAL SUPPLIER.”', '“WE ARE INTERIOR SPECIALIST.  CONTRACTOR, DESIGN, INSTALATION, AUDIO VISUAL, FURNITURE & SUPPLIER.”', '<p style=\"color: rgb(155, 155, 155); font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" background-color:=\"\" rgb(246,=\"\" 247,=\"\" 248);=\"\" line-height:=\"\" 1.8em;\"=\"\"><span style=\"font-weight: bolder;\">PT. DAYA CAHYA ABADI</span> Merupakan perusahaan swasta nasional yang bergerak dibidang sales & Maintenance/spesialis Gondola. Semua berawal dari kemitraan kami dalam menangani kontrak service pada beberapa gedung di jakarta sejak tahun 2020. Selain itu, kami bergerak dibidang general trading barang dan jasa. Meliputi jasa pengadaan tenaga kerja, pengadaan cleaning service, jasa pengamanan dan jasa pengemudi serta bidang lain seperti printing, office supply, civil, furniture dan interiror, M&E, Elektronik, Audio Visual dan Show Room Mobil.</p><h3 style=\"font-family: Roboto, sans-serif; font-weight: 700; color: rgb(26, 42, 54); font-size: calc(1.3rem + 0.6vw); background-color: rgb(246, 247, 248);\" class=\"\">Visi</h3><p style=\"color: rgb(155, 155, 155); font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" background-color:=\"\" rgb(246,=\"\" 247,=\"\" 248);=\"\" line-height:=\"\" 1.8em;\"=\"\">Menjadi perusahaan dibidang perdangan umum, barang dan jasa terkemuka dengan melayani stake holder berbasis profesionalisme, responsive, perhatian kepada karyawan, masyarakat dan kesadaran lingkungan.</p><p style=\"color: rgb(155, 155, 155); font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" background-color:=\"\" rgb(246,=\"\" 247,=\"\" 248);=\"\" line-height:=\"\" 1.8em;\"=\"\"><span style=\"background-color: rgb(246, 247, 248); color: rgb(26, 42, 54); font-family: Roboto, sans-serif; font-size: calc(1.3rem + 0.6vw); font-weight: 700;\">Misi</span></p><p style=\"font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" background-color:=\"\" rgb(246,=\"\" 247,=\"\" 248);\"=\"\"><span class=\"fa fa-check-circle text-primary me-3\" style=\"margin-right: 1rem !important; color: rgb(215, 34, 41) !important;\"></span>Menjalankan bisnis secara beretika dan berakhlak</p><p style=\"font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" background-color:=\"\" rgb(246,=\"\" 247,=\"\" 248);\"=\"\"><span class=\"fa fa-check-circle text-primary me-3\" style=\"margin-right: 1rem !important; color: rgb(215, 34, 41) !important;\"></span>Meningkatkan daya saing melalui inovasi</p><p style=\"font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" background-color:=\"\" rgb(246,=\"\" 247,=\"\" 248);\"=\"\"><span class=\"fa fa-check-circle text-primary me-3\" style=\"margin-right: 1rem !important; color: rgb(215, 34, 41) !important;\"></span>Bersama karyawan memberikan nilai terbaik</p><p style=\"font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" background-color:=\"\" rgb(246,=\"\" 247,=\"\" 248);\"=\"\"><span class=\"fa fa-check-circle text-primary me-3\" style=\"margin-right: 1rem !important; color: rgb(215, 34, 41) !important;\"></span>Kami berkontribusi menjaga kesejahteraan dan meningkatkan kualitas hidup masyarakat</p>', 'PT. DAYA CAHYA ABADI Merupakan perusahaan swasta nasional yang bergerak dibidang sales & Maintenance/spesialis Gondola. Semua berawal dari kemitraan kami dalam menangani kontrak service pada beberapa gedung di jakarta sejak tahun 2020. Selain itu, kami bergerak dibidang general trading barang dan jasa.  test\r\nWe Are Gondola Specialist, Interior Specialist and General Trading Specialist Since 2021.', NULL, 'pt.dayacahyaabadi21@gmail.com', 'Jl. Pondok Kacang Raya No. 48 RT.002/RW.003 Pondok Kacang Barat, Pondok Aren, Tangerang Selatan – Banten 15226', '02184907825', '081291668897', 'konfigurasi-image/EQmBm6UKhGkM4ZtpRFRRhygz7sm9MbgDgNdFtdmI.png', 'konfigurasi-image/yyKed5dqAkaoVVWa5qCXw1am8vt9w55KbTH6kgxO.png', 'Gondola, Instalasi Gondola, Desain Interior, Furniture, Audio Visual, General Trading, Pengadaan Barang dan Jasa, Percetakaan, Showroom Mobil', 'We Are Gondola Specialist, Interior Specialist and General Trading Specialist Since 2021.', NULL, NULL, 'https://www.instagram.com/dayacahyaabadi?igsh=aWJ3bGYyMndjeW83', NULL, NULL, 'Daya Cahya Abadi', '<iframe class=\"position-absolute w-100 h-100\" style=\"object-fit: cover;\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1387672197675!2d106.68696017316775!3d-6.245437261149887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fa463864d4df%3A0x36fd289fd8972285!2sJl.%20Pd.%20Kacang%20No.48%2C%20RT.2%2FRW.003%2C%20Pd.%20Kacang%20Bar.%2C%20Kec.%20Pd.%20Aren%2C%20Kota%20Tangerang%20Selatan%2C%20Banten%2015226!5e0!3m2!1sid!2sid!4v1704272909319!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2024-01-03 02:14:22', '2024-01-07 02:21:53');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_02_030138_create_configurations_table', 2),
(19, '2024_01_07_111401_create_testimonials_table', 3),
(20, '2024_01_07_114538_add_id_user_to_testimonials_table', 4),
(21, '2024_01_14_082005_create_categories_table', 5),
(22, '2024_01_15_072754_create_staff_table', 6),
(23, '2024_01_19_035225_create_services_table', 7),
(24, '2024_01_29_031845_add_tagline_to_services_table', 8),
(25, '2024_02_05_082716_create_clients_table', 9),
(26, '2024_02_05_094617_add_id_user_to_clients_table', 10),
(27, '2024_02_07_070537_create_projects_table', 11),
(28, '2024_02_10_150306_alter_projects_table', 12),
(29, '2024_02_10_154500_add_id_user_to_projects_table', 13),
(31, '2024_02_20_042511_create_project_images_table', 14),
(32, '2024_02_20_091541_add_roles_to_users_table', 15),
(33, '2024_02_20_102140_add_image_to_users_table', 16),
(34, '2024_02_20_121640_add_status_to_users_table', 17),
(35, '2024_02_27_061256_alter_staff_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `partnerships`
--

CREATE TABLE `partnerships` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `kode_tiket` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partnerships`
--

INSERT INTO `partnerships` (`id`, `nama`, `email`, `perihal`, `file`, `kode_tiket`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'test', 'annyeonghaseyo20@gmail.com', 'test', 'partnership-files/ACbFsIlSrZy0oy8CKsskvLf77wCneYUSfbKfUzPY.pdf', 'Z6JOKK0P', 'Pending', NULL, '2025-07-09 08:56:30', '2025-07-09 08:56:30'),
(2, 'test', 'annyeonghaseyo20@gmail.com', 'test', 'partnership-files/yJzOy42q7Pwg6akfesUDQuL3ybP96loYc1VielIa.pdf', 'NGBO2FTO', 'Pending', NULL, '2025-07-09 09:03:19', '2025-07-09 09:03:19'),
(3, 'test', 'annyeonghaseyo20@gmail.com', 'test', 'partnership-files/CXhaXltDeyY5PJRI3QGEF1uPKE0gXbr7cZnjozCS.pdf', 'JS6CUATK', 'Pending', NULL, '2025-07-09 09:04:57', '2025-07-09 09:04:57'),
(4, 'Zahra', 'annyeonghaseyo20@gmail.com', 'test', 'partnership-files/ATDqc3L5SHhZuGftisBTpU543mZCzFPQPSPmap9v.pdf', 'AFWTFLEB', 'Pending', NULL, '2025-07-09 09:06:30', '2025-07-09 09:06:30'),
(5, 'Zahra', 'annyeonghaseyo20@gmail.com', 'test', 'partnership-files/yZyKGRiJsjqgztCnrVZ9z2AbjC2NAAnbmU6IqFuX.pdf', 'KFJTUJLY', 'Pending', NULL, '2025-07-09 09:07:47', '2025-07-09 09:07:47'),
(6, 'Zahra', 'fb.ipin@gmail.com', 'test', 'partnership-files/C3syDX8qALAxq6kjAZLVNANO8jAvQZaB8qcFHlES.pdf', 'NI1ZSVL5', 'Pending', NULL, '2025-07-09 09:16:24', '2025-07-09 09:16:24'),
(7, 'testes', 'tugastugasku01@gmail.com', 'test123', 'partnership-files/dBsTR4whFeSqf7dJXWYwQV6ImBcSAw5VknKcP7hT.pdf', 'YELZN06K', 'Disetujui', NULL, '2025-07-09 09:19:38', '2025-07-11 08:35:43'),
(8, 'juli 11', 'fb.ipin@gmail.com', 'juli 11', 'partnership-files/NvcsT4MFmPxTelz3iQwYHBlvOcQjuPiOaoX1EEwa.pdf', '8NJEYTAX', 'Pending', NULL, '2025-07-11 09:21:16', '2025-07-11 09:34:11'),
(9, 'karin', 'karinanafa22@gmail.com', 'pengajuan kerjasama', NULL, 'EQLC13TP', 'Pending', NULL, '2025-07-18 20:51:09', '2025-07-18 20:51:09'),
(10, 'karin', 'karinanafa22@gmail.com', 'pengajuan kerjasama', 'partnership-files/ByCRcL8swJ6mun6GbikTzVKsMuNsAIHX7A8VJpuO.pdf', 'J5GPZNMI', 'Pending', NULL, '2025-07-18 20:52:37', '2025-07-18 20:52:37'),
(11, 'karin', 'karinanafa22@gmail.com', 'pengajuan kerjasama', 'partnership-files/XVgyFkXiCpVGVGIBbHwBu7l7cNvscnPe5ff5VMgs.pdf', '1NZWIRSZ', 'Disetujui', NULL, '2025-07-18 20:55:32', '2025-07-18 20:57:18');

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
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `id_kategori`, `nama`, `lokasi`, `deskripsi`, `created_at`, `updated_at`, `id_user`) VALUES
(2, 1, 'Badan Meteorologi, Klimatologi dan Geofisika', 'Tangerang', '<p>Membuat dan menyediakan alat gondol serta melakukan maintenance</p>', '2024-02-19 22:41:00', '2024-02-24 03:36:44', 1),
(10, 2, 'Kementerian Lingkungan Hidup dan Kehutanan', 'DKI Jakarta', '<p style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sagittis vitae et leo duis. Leo duis ut diam quam nulla porttitor massa id. Elit pellentesque habitant morbi tristique. Morbi blandit cursus risus at ultrices mi.<br></p>', '2024-02-20 01:42:40', '2024-02-24 02:57:33', 1),
(11, 3, 'Kementerian Lingkungan Hidup dan Kehutanan', 'DKI Jakarta', '<p>Menyediakan percetakan buku</p>', '2024-02-20 01:58:10', '2024-02-20 01:58:10', 1),
(13, 2, 'Net Techonology', 'Tangerang', '<p>werwr</p>', '2024-02-27 17:25:16', '2024-02-27 17:25:16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_project` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `id_project`, `image`, `created_at`, `updated_at`) VALUES
(12, 10, 'project-image/xbB6ubtA3X7MDV1ws5X3dxuW3dTq1BjLnAPj7bhS.jpg', '2024-02-20 01:42:40', '2024-02-20 01:42:40'),
(13, 10, 'project-image/tdeWdcYXovibKEntSOtQYXIaWCD0TUpaFxuHdFZC.jpg', '2024-02-20 01:42:40', '2024-02-20 01:42:40'),
(14, 11, 'project-image/rZAhE06KJZDXVz2muVHM8RXanA2jyGMDNTRatA20.jpg', '2024-02-20 01:58:10', '2024-02-20 01:58:10'),
(15, 11, 'project-image/MU3jbc6MEXRD9HVx1VcV6egiOL9WYqco7vDX2A5i.jpg', '2024-02-20 01:58:10', '2024-02-20 01:58:10'),
(16, 11, 'project-image/31g9axbhL8mZvivvHUDyjQQ7H9ef1uZ4UOQHqNTA.jpg', '2024-02-20 01:58:10', '2024-02-20 01:58:10'),
(18, 11, 'project-image/XLtjdAD4KzFO8SKn49iPsJRxD2cjd7OvW6zH2JDy.jpg', '2024-02-20 01:58:10', '2024-02-20 01:58:10'),
(22, 13, 'project-image/jho2vP2OqEZemRes0RkI2VAmfrzuznEL7lwZAHLv.jpg', '2024-02-27 17:25:16', '2024-02-27 17:25:16'),
(23, 13, 'project-image/fA7z1xj6mqhRsLw0ey03JEaDzZIKdk38F3KfswgF.jpg', '2024-02-27 17:25:16', '2024-02-27 17:25:16'),
(24, 2, 'project-image/caL7H6RfSehxmlmJwjqIMide6pwh2TLjuylvSi5q.jpg', '2024-03-17 03:40:36', '2024-03-17 03:40:36'),
(25, 2, 'project-image/W2fxrC0s1LsO6K7iwEfuBkVZAbjE8AqfGBb900Zs.jpg', '2024-03-17 03:40:36', '2024-03-17 03:40:36'),
(26, 2, 'project-image/othvn0IOxaK3gOvIpi4DqHQEplafHSWgMdnNEsPh.jpg', '2024-03-17 03:40:36', '2024-03-17 03:40:36'),
(27, 2, 'project-image/fHuqX3QGEviuQ3Ao1IpmMLu9qm8xw46T2QXfmeaK.jpg', '2024-03-17 03:40:36', '2024-03-17 03:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `ringkasan` text NOT NULL,
  `deskripsi` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tagline` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `id_user`, `id_kategori`, `ringkasan`, `deskripsi`, `icon`, `image`, `created_at`, `updated_at`, `tagline`) VALUES
(1, 5, 1, 'Kami Melaksanakan Pekerjaan Design, Estimasi, Instalasi dan Test Commissioning Pada Beberapa gedung, seperti gedung perkantoran, hotel dan apartemen, serta shopping mall.', '<p style=\"\"><font color=\"#000000\"><b style=\"\">PT. DAYA CAHYA ABADI</b> Merupakan perusahaan swasta nasional yang bergerak dibidang sales &amp; Maintenance/spesialis Gondola. Semua berawal dari kemitraan kami dalam menangani kontrak service pada beberapa gedung di jakarta sejak tahun 2020.</font></p><p style=\"\"><font color=\"#000000\">Layanan yang sampai saat ini PT. DCA Tangani antara lain :</font></p><ul><li style=\"\"><font color=\"#000000\">Design</font></li><li style=\"\"><font color=\"#000000\">Fabrikasi</font></li><li style=\"\"><font color=\"#000000\">Instalasi</font></li><li style=\"\"><font color=\"#000000\">Maintenace &amp; Services</font></li><li style=\"\"><font color=\"#000000\">Supplier</font></li></ul><h2 style=\"\" class=\"\"><font color=\"#000000\">Kontraktor</font></h2><p style=\"\"><font color=\"#000000\">Kami Melaksanakan Pekerjaan Design, Estimasi, Instalasi dan Test Commissioning Pada Beberapa gedung, seperti gedung perkantoran, hotel dan apartemen, serta shopping mall.</font></p><h2 style=\"\" class=\"\"><font color=\"#000000\">Fabrikasi &amp; Desain</font></h2><p style=\"\"><font color=\"#000000\">Berbekal pengalaman dalam Bidang Fabrikasi Gondola untuk lingkup pekerjaan di highrise building, kami sanggup memberikan pelayanan design dan engineering nya, antara lain sebagai berikut :</font></p><ul><li style=\"\"><font color=\"#000000\">Modifikasi Unit Gondola Liffting</font></li><li style=\"\"><font color=\"#000000\">Arm gondola</font></li><li style=\"\"><font color=\"#000000\">System traveling</font></li><li style=\"\"><font color=\"#000000\">Platform gondola</font></li></ul><h2 style=\"\" class=\"\"><font color=\"#000000\">Material Supplier</font></h2><p style=\"\"><font color=\"#000000\">Selama dalam Pekerjaan Pemasangan gondola kami mempunyai hubungan kerja&nbsp;sama yang baik dengan produsen, sehingga kami dapat melakukan supply material dan produk gondola, antara lain:</font></p><ul><li style=\"\"><font color=\"#000000\">Pengganti unit system gondola trade in</font></li><li style=\"\"><font color=\"#000000\">Pengganti hoist temporary</font></li><li style=\"\"><font color=\"#000000\">Paengadaan peralatan safety</font></li><li style=\"\"><font color=\"#000000\">Maintenance, service gondola, part</font></li><li style=\"\"><font color=\"#000000\">Assesoris gondola</font></li></ul>', '<i class=\"fas fa-tram fa-3x\"></i>', 'layanan-image/o25PYCEdzoFC3i3hxZVuiwlcv2XF2dgVWcBT9w0B.png', '2024-02-18 05:29:24', '2025-07-18 09:16:33', 'We Are Gondola Specialist'),
(2, 5, 2, 'Kami melakasanakan pekerjaan Design Interior, Estimasi, Instalasi dan Maintenace pada beberapa gedung perkantoran, pemerintahan dan sebagainya.', '<p style=\"text-align: justify; \"><font color=\"#000000\"><b>PT. DAYA CAHYA ABADI</b> Merupakan perusahaan swasta nasional yang bergerak&nbsp;</font><span style=\"color: rgb(0, 0, 0); font-size: 1rem;\">dibidang Interior. Semua berawal dari kemitraan kami dalam menangani kontrak service pada beberapa Perusahaan Swasta maupun di Pemerintahan sejak tahun 2020.</span></p><p style=\"text-align: justify; \"><font color=\"#000000\">Layanan yang sampai saat ini PT. DCA Tangani antara lain :</font></p><ul><li style=\"text-align: justify;\"><font color=\"#000000\">Interior</font></li><li style=\"text-align: justify;\"><font color=\"#000000\">Furniture</font></li><li style=\"text-align: justify;\"><font color=\"#000000\">Audio Visual</font></li><li style=\"text-align: justify;\"><font color=\"#000000\">Instalasi</font></li><li style=\"text-align: justify;\"><font color=\"#000000\">Maintenace &amp; Services</font></li><li style=\"text-align: justify;\"><font color=\"#000000\">Supplier</font></li></ul><h2 style=\"text-align: justify; \" class=\"\"><font color=\"#000000\">Kontraktor</font></h2><p style=\"text-align: justify; \"><font color=\"#000000\">Kami melakasanakan pekerjaan Design Interior, Estimasi, Instalasi dan Maintenance pada beberapa gedung perkantoran, pemerintahan dan sebagainya.</font></p><h2 style=\"text-align: justify; \" class=\"\"><font color=\"#000000\">Workshop &amp; Desain</font></h2><p style=\"text-align: justify; \"><font color=\"#000000\">Berbekal pengalaman dalam Bidang Pembuatan Custom Furniture untuk lingkup&nbsp;</font><font color=\"#000000\" style=\"font-size: 1rem;\">Pemerintahan, kami sanggup memberikan pelayanan design Custom Furniture dan&nbsp;</font><span style=\"font-size: 1rem; color: rgb(0, 0, 0);\">Maintenance,&nbsp; antara lain sebagai berikut :</span></p><ul><li style=\"text-align: justify;\"><font color=\"#000000\">Sofa</font></li><li style=\"text-align: justify;\"><font color=\"#000000\">Kursi Kerja/Meeting</font></li><li style=\"text-align: justify;\"><font color=\"#000000\"></font></li><li style=\"text-align: justify;\"><font color=\"#000000\">Meja</font></li><li style=\"text-align: justify;\"><font color=\"#000000\">Dry Box/Locker</font></li><li style=\"text-align: justify;\"><font color=\"#000000\">Maintenance AC</font></li></ul><h2 style=\"text-align: justify; \" class=\"\"><font color=\"#000000\">Supplier</font></h2><p style=\"text-align: justify; \"><font color=\"#000000\">Selama dalam Pekerjaan Interior kami mempunyai hubungan kerja sama yang baik dengan produsen, sehingga kami dapat melakukan supply Kelengkapan Audio Visual, antara lain:</font></p><ul><li style=\"text-align: justify;\"><font color=\"#000000\">Smart TV</font></li><li style=\"text-align: justify;\"><font color=\"#000000\">PC Dan Laptop</font></li><li style=\"text-align: justify;\"><font color=\"#000000\">Videowall</font></li><li style=\"text-align: justify;\"><font color=\"#000000\">Tablet</font></li><li style=\"text-align: justify;\"><font color=\"#000000\">Sound &amp; Mic Conference System</font></li></ul>', '<i class=\"fa fa-home fa-3x\"></i>', 'layanan-image/DWYfRu1anHODM57JDKLXZnpKmnQU2SucsVjN3I7S.jpg', '2024-02-18 05:53:03', '2025-07-29 19:17:14', 'We Are Design Interior Specialist'),
(3, 5, 3, 'Kami bergerak di bidang perdagangan umum, barang dan jasa terkemuka dengan stakeholder berbasis profesionalisme, responsif, perhatian kepada karyawan, masyarakat dan kesadaran lingkungan.', '<p><font color=\"#000000\">Kami bergerak di bidang perdagangan umum, barang dan jasa terkemuka dengan stakeholder berbasis profesionalisme, responsif, perhatian kepada karyawan, masyarakat dan kesadaran lingkungan.</font><br></p>', '<i class=\"fa fa-print fa-3x\"></i>', 'layanan-image/Hr9NrXFZL7ZPQw7oFDg8QGsRc8wUQcZwJlrxjHqD.jpg', '2024-02-18 06:05:57', '2025-07-29 19:17:43', 'We Are General Trading Specialist');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status_staff` enum('AKTIF','TIDAK AKTIF') NOT NULL DEFAULT 'AKTIF',
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `id_user`, `nama`, `jabatan`, `email`, `instagram`, `telepon`, `image`, `status_staff`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 5, 'Suria Haditia, S.H.', 'Owner', 'pt.dayacahyaabadi21@gmail.com', 'https://www.instagram.com/dayacahyaabadi?igsh=aWJ3bGYyMndjeW83', '081291668897', 'staff-image/gyF7zpgaAhejLf7uQtuwDVMGYSNfiL7rDEZbHPYL.jpg', 'AKTIF', 1, '2024-02-18 06:00:42', '2025-07-11 09:17:44'),
(4, 5, 'contoh staf', 'aaa', 'tugastugasku01@gmail.com', '-', '123456787654', 'staff-image/8HYccYspnWbwY3hdQeS0VJB6GFODeNlX7d3eXODw.png', 'AKTIF', 2, '2025-07-11 09:27:08', '2025-07-11 09:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `komentar` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `nama`, `pekerjaan`, `image`, `komentar`, `created_at`, `updated_at`, `id_user`) VALUES
(5, 'John Doe', 'Business Owner', 'testimonial-image/3KFZz0UKw4xFb6tPpQEtbgwqEmqN8RkbULH7HEw2.jpg', 'Good! 5 stars', '2024-02-27 00:18:40', '2025-07-29 19:26:58', 5),
(6, 'Zahra', 'Staff', 'testimonial-image/WA2Eh863BHDs5Qp8up8lqY2qt9dixSj0iBv3hgYh.jpg', 'Satisfied', '2025-06-17 05:52:43', '2025-07-29 19:27:24', 5);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` enum('ADMIN','USER') NOT NULL DEFAULT 'USER',
  `image` varchar(255) NOT NULL,
  `status` enum('AKTIF','TIDAK AKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`, `image`, `status`) VALUES
(1, 'user', 'user@gmail.com', NULL, '$2y$12$Qr2SRSv5rFrj02sAfzybM.cakKSQ0Fcvhhb2jzzpclyuLaG7oJnFm', NULL, '2024-02-20 06:03:40', '2025-07-11 09:13:31', 'USER', 'staff-image/YLSCVSzaMkcgKberJUzmCFf2AnhhqhMl4HRwI8Wy.png', 'AKTIF'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$EixZaYVK1fsbw1ZfbX3OXe.P4WCK.O6HRY1KlgktG5uXH6OtFXVO2', NULL, '2024-02-20 06:08:42', '2024-03-17 01:00:31', 'ADMIN', 'staff-image/vOf7KbmXqPS6UVa58L5ivPqf8NJA4sL8EffzHIIs.jpg', 'AKTIF'),
(4, 'Marketing', 'marketing@gmail.com', NULL, '$2y$12$DVFrQn3T6ucIkm8T24LyrOVGSJCKfel9M9tVYrFnOjlSycLophW0S', NULL, '2024-02-26 04:56:46', '2024-02-26 04:56:46', 'USER', '', 'AKTIF'),
(5, 'admincuy', 'admincuy@gmail.com', NULL, '$2y$10$dokciisYLxy3JiQ8VfqrHemGap112IbU1mMQY2yMwUncpgHRXbUPe', NULL, NULL, '2025-07-29 19:26:15', 'ADMIN', 'staff-image/K5OUbqumZ8TJFuHoFHYGn8EnDkEWtLrO0fPcrXqR.jpg', 'AKTIF'),
(6, 'zara', 'zara@gmail.com', '2025-05-28 02:36:29', '$2y$10$EixZaYVK1fsbw1ZfbX3OXe.P4WCK.O6HRY1KlgktG5uXH6OtFXVO2', NULL, NULL, NULL, 'USER', '', 'AKTIF'),
(7, 'Zhong', 'rtyu@gmail.com', NULL, '$2y$12$faasGh8Vk1skDPLgBwkSROqFaGOKsY.Y7xMRaS5ZmpR2P.hYzTY0W', NULL, NULL, '2025-07-29 19:24:43', 'ADMIN', 'staff-image/sI17dTDggy3DL8Sx9dJtrKbn89CN2mshi4cM1SaQ.jpg', 'AKTIF'),
(8, 'aaai', 'infantri@gmail.com', NULL, '$2y$12$NHlIToZMauMm82y6VNVpLeLt/PPYSU7o.nZWBJfRgRaJUXymtHA0W', NULL, '2025-06-17 08:10:06', '2025-07-29 19:24:16', 'USER', 'staff-image/SbqWYiZarg9uxZmuNS1U8UCDX3JFkwTfsL5FjJfm.jpg', 'AKTIF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partnerships`
--
ALTER TABLE `partnerships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_images_id_project_foreign` (`id_project`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `partnerships`
--
ALTER TABLE `partnerships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_images`
--
ALTER TABLE `project_images`
  ADD CONSTRAINT `project_images_id_project_foreign` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
