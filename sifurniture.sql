-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 08, 2018 at 07:16 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.8-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sifurniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_prov` char(2) NOT NULL,
  `nama` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_prov`, `nama`) VALUES
('11', 'Aceh'),
('12', 'Sumatera Utara'),
('13', 'Sumatera Barat'),
('14', 'Riau'),
('15', 'Jambi'),
('16', 'Sumatera Selatan'),
('17', 'Bengkulu'),
('18', 'Lampung'),
('19', 'Kepulauan Bangka Belitung'),
('21', 'Kepulauan Riau'),
('31', 'DKI Jakarta'),
('32', 'Jawa Barat'),
('33', 'Jawa Tengah'),
('34', 'DI Yogyakarta'),
('35', 'Jawa Timur'),
('36', 'Banten'),
('51', 'Bali'),
('52', 'Nusa Tenggara Barat'),
('53', 'Nusa Tenggara Timur'),
('61', 'Kalimantan Barat'),
('62', 'Kalimantan Tengah'),
('63', 'Kalimantan Selatan'),
('64', 'Kalimantan Timur'),
('65', 'Kalimantan Utara'),
('71', 'Sulawesi Utara'),
('72', 'Sulawesi Tengah'),
('73', 'Sulawesi Selatan'),
('74', 'Sulawesi Tenggara'),
('75', 'Gorontalo'),
('76', 'Sulawesi Barat'),
('81', 'Maluku'),
('82', 'Maluku Utara'),
('91', 'Papua Barat'),
('92', 'Papua');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artikel`
--

CREATE TABLE `tbl_artikel` (
  `artikel_id` int(11) NOT NULL,
  `artikel_judul` varchar(65) DEFAULT NULL,
  `artikel_isi` text,
  `artikel_foto` varchar(65) DEFAULT NULL,
  `artikel_dilihat` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_artikel`
--

INSERT INTO `tbl_artikel` (`artikel_id`, `artikel_judul`, `artikel_isi`, `artikel_foto`, `artikel_dilihat`, `created_at`) VALUES
(3, 'asdasd', '<p>sadsadsad</p>\r\n', 'ec3da9e3b0bbd13f40ff183e279b2e1f.jpeg', 0, '2018-08-06 14:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `barang_id` varchar(10) NOT NULL,
  `sub_kategori_id` int(11) DEFAULT NULL,
  `barang_nama` varchar(65) DEFAULT NULL,
  `barang_diskon` int(11) NOT NULL DEFAULT '0',
  `barang_harga_beli` int(11) DEFAULT '0',
  `barang_harga_jual` int(11) DEFAULT '0',
  `barang_berat` float DEFAULT '0',
  `barang_deskripsi` text,
  `barang_dimensi` varchar(65) DEFAULT NULL,
  `foto_barang_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`barang_id`, `sub_kategori_id`, `barang_nama`, `barang_diskon`, `barang_harga_beli`, `barang_harga_jual`, `barang_berat`, `barang_deskripsi`, `barang_dimensi`, `foto_barang_id`, `created_at`) VALUES
('BRG1', 5, 'Meja Makan Gloosy', 1, 0, 1000000, 0, '<p>1</p>\r\n', NULL, 23, '2018-07-03 18:10:05'),
('BRG10', 5, '1', 1, 0, 1000000, 0, '<p>1</p>\r\n', NULL, 32, '2018-07-09 10:14:26'),
('BRG11', 2, 'sad', 1, 0, 1, 0, '<p>sda</p>\r\n', NULL, 33, '2018-07-09 10:17:22'),
('BRG12', 5, '1', 1, 0, 1000000, 0, '<p>1</p>\r\n', NULL, 34, '2018-07-09 10:18:18'),
('BRG13', 5, '1', 1, 0, 1000000, 0, '<p>1</p>\r\n', NULL, 35, '2018-07-09 10:20:06'),
('BRG14', 5, '1', 1, 0, 1, 0, '<p>1</p>\r\n', NULL, 36, '2018-07-09 10:21:21'),
('BRG15', 5, 'sda', 1, 0, 1000000, 0, '<p>sd</p>\r\n', NULL, 37, '2018-07-09 10:30:25'),
('BRG16', 2, 'asd', 1, 0, 1, 0, '<p>asd</p>\r\n', NULL, 38, '2018-07-09 10:32:05'),
('BRG17', 5, '1', 1, 0, 1, 0, '<p>111</p>\r\n', NULL, 39, '2018-07-09 10:38:05'),
('BRG18', 5, 'MEJA', 1, 0, 1000000, 0, '<p>1w</p>\r\n', NULL, 40, '2018-07-09 10:38:53'),
('BRG19', 2, 'asd', 1, 0, 111, 0, '<p>asd</p>\r\n', NULL, NULL, '2018-08-06 06:28:10'),
('BRG2', 2, '11', 0, 0, 1000000, 0, '<p>1</p>\r\n', NULL, 24, '2018-07-03 18:10:40'),
('BRG20', 4, 'sOSLO', 1, 0, 1, 0, '<p>asdsd</p>\r\n', '20m x22m x21m', 42, '2018-08-06 06:31:18'),
('BRG3', 5, 'c', 25, 0, 1000000, 0, '<p>q</p>\r\n', NULL, 25, '2018-07-09 09:59:59'),
('BRG4', 2, '1', 45, 0, 1000000, 0, '<p>1</p>\r\n', NULL, 26, '2018-07-09 10:01:23'),
('BRG5', 4, '1', 1, 0, 1000000, 0, '<p>1</p>\r\n', NULL, 27, '2018-07-09 10:02:48'),
('BRG6', 2, '1', 15, 0, 1000000, 0, '<p>1</p>\r\n', NULL, 28, '2018-07-09 10:03:59'),
('BRG7', 5, '1', 11, 0, 1000000, 0, '<p>1</p>\r\n', NULL, 29, '2018-07-09 10:05:15'),
('BRG8', 4, '1', 1, 0, 1, 0, '<p>1</p>\r\n', '20m X 10m X 5m', 30, '2018-07-09 10:05:48'),
('BRG9', 5, '1', 1, 0, 1, 0, '<p>1</p>\r\n', NULL, 31, '2018-07-09 10:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_dilihat`
--

CREATE TABLE `tbl_barang_dilihat` (
  `barang_dilihat_id` int(11) NOT NULL,
  `barang_id` varchar(15) DEFAULT NULL,
  `barang_dilihat_tanggal` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_dilihat`
--

INSERT INTO `tbl_barang_dilihat` (`barang_dilihat_id`, `barang_id`, `barang_dilihat_tanggal`, `created_at`) VALUES
(25, 'BRG18', '2018-07-30', '2018-07-30 11:58:55'),
(26, 'BRG16', '2018-07-30', '2018-07-30 12:15:44'),
(27, 'BRG16', '2018-07-31', '2018-07-30 17:10:50'),
(28, 'BRG18', '2018-07-31', '2018-07-30 17:11:04'),
(29, 'BRG5', '2018-07-31', '2018-07-30 17:11:11'),
(30, 'BRG16', '2018-08-05', '2018-08-05 16:16:28'),
(31, 'BRG18', '2018-08-05', '2018-08-05 16:25:31'),
(32, 'BRG18', '2018-08-06', '2018-08-05 17:01:50'),
(33, 'BRG18', '2018-08-06', '2018-08-05 17:02:53'),
(34, 'BRG18', '2018-08-06', '2018-08-05 17:03:53'),
(35, 'BRG16', '2018-08-06', '2018-08-06 12:39:31'),
(36, 'BRG16', '2018-08-06', '2018-08-06 13:16:06'),
(37, 'BRG16', '2018-08-06', '2018-08-06 13:16:37'),
(38, 'BRG16', '2018-08-06', '2018-08-06 13:16:50'),
(39, 'BRG16', '2018-08-06', '2018-08-06 13:17:06'),
(40, 'BRG16', '2018-08-06', '2018-08-06 13:17:23'),
(41, 'BRG16', '2018-08-06', '2018-08-06 13:17:33'),
(42, 'BRG20', '2018-08-06', '2018-08-06 13:23:25'),
(43, 'BRG20', '2018-08-06', '2018-08-06 13:24:13'),
(44, 'BRG20', '2018-08-06', '2018-08-06 13:25:16'),
(45, 'BRG20', '2018-08-06', '2018-08-06 13:25:53'),
(46, 'BRG20', '2018-08-06', '2018-08-06 13:26:32'),
(47, 'BRG16', '2018-08-06', '2018-08-06 13:27:30'),
(48, 'BRG16', '2018-08-06', '2018-08-06 13:28:50'),
(49, 'BRG16', '2018-08-06', '2018-08-06 13:28:59'),
(50, 'BRG18', '2018-08-06', '2018-08-06 13:57:35'),
(51, 'BRG20', '2018-08-06', '2018-08-06 13:57:40'),
(52, 'BRG18', '2018-08-06', '2018-08-06 13:57:44'),
(53, 'BRG8', '2018-08-06', '2018-08-06 15:02:26'),
(54, 'BRG20', '2018-08-06', '2018-08-06 15:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coating_custom`
--

CREATE TABLE `tbl_coating_custom` (
  `coating_id` int(11) NOT NULL,
  `coating_nama` varchar(65) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_coating_custom`
--

INSERT INTO `tbl_coating_custom` (`coating_id`, `coating_nama`, `created_at`) VALUES
(1, 'Natural', '2018-07-22 12:22:07'),
(2, 'ALAM', '2018-07-27 14:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custom`
--

CREATE TABLE `tbl_custom` (
  `custom_id` varchar(10) NOT NULL,
  `style_id` int(11) DEFAULT NULL,
  `jenis_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `coating_id` int(11) DEFAULT NULL,
  `jog_id` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT '0',
  `custom_foto` varchar(65) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_custom`
--

INSERT INTO `tbl_custom` (`custom_id`, `style_id`, `jenis_id`, `material_id`, `coating_id`, `jog_id`, `harga_jual`, `custom_foto`, `created_at`) VALUES
('CTM1', 3, 3, 3, 1, 1, 100000, '43f42a0e743dd986671d9048c2fe4bd1.png', '2018-07-27 14:12:39'),
('CTM2', 3, 4, 5, 1, 1, 123, '3c9c72708f7934fbe15c5bde2eb41f9a.png', '2018-07-27 14:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_penjualan`
--

CREATE TABLE `tbl_detail_penjualan` (
  `detail_penjualan_id` int(11) NOT NULL,
  `penjualan_id` varchar(15) DEFAULT NULL,
  `barang_id` varchar(15) DEFAULT NULL,
  `penjualan_qty` int(11) DEFAULT NULL,
  `penjualan_harga` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_penjualan`
--

INSERT INTO `tbl_detail_penjualan` (`detail_penjualan_id`, `penjualan_id`, `barang_id`, `penjualan_qty`, `penjualan_harga`, `created_at`) VALUES
(5, 'PJN1', 'BRG2', 2, 1000000, '2018-07-06 07:23:21'),
(6, 'PJN1', 'BRG1', 1, 990000, '2018-07-06 07:23:21'),
(7, 'PJN2', 'BRG1', 1, 990000, '2018-07-06 12:42:36'),
(8, 'PJN3', 'BRG1', 1, 990000, '2018-07-07 03:19:14'),
(9, 'PJN3', 'BRG2', 1, 1000000, '2018-07-07 03:19:14'),
(13, 'PJN4', 'BRG18', 1, 990000, '2018-08-05 17:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorit`
--

CREATE TABLE `tbl_favorit` (
  `favorit_id` int(11) NOT NULL,
  `barang_id` varchar(15) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_favorit`
--

INSERT INTO `tbl_favorit` (`favorit_id`, `barang_id`, `customer_id`, `created_at`) VALUES
(1, 'BRG16', 6, '2018-08-06 12:58:53'),
(2, 'BRG11', 6, '2018-08-06 14:04:10'),
(3, 'BRG8', 1, '2018-08-06 15:20:01'),
(4, 'BRG8', 1, '2018-08-06 15:20:05'),
(5, 'BRG8', 1, '2018-08-06 15:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foto_barang`
--

CREATE TABLE `tbl_foto_barang` (
  `foto_barang_id` int(11) NOT NULL,
  `barang_id` varchar(10) DEFAULT NULL,
  `foto_barang_nama` varchar(65) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_foto_barang`
--

INSERT INTO `tbl_foto_barang` (`foto_barang_id`, `barang_id`, `foto_barang_nama`, `created_at`) VALUES
(23, 'BRG1', 'e408699e5b014e575ef6c588d0e25c74.jpg', '2018-07-03 18:10:05'),
(24, 'BRG2', 'a06676df298b29d223c0ccbc420d18d4.jpg', '2018-07-03 18:10:41'),
(25, 'BRG3', '5f9500d9af976a46d6788a7660d73339.png', '2018-07-09 10:00:00'),
(26, 'BRG4', 'ab126fb34b645549a9a75bd5f174a1f1.png', '2018-07-09 10:01:23'),
(27, 'BRG5', '6561d6424b6e1c0b3285044b6cf9ee46.png', '2018-07-09 10:02:48'),
(28, 'BRG6', '3b1688245d4a59df845ddf52ea947f9a.png', '2018-07-09 10:03:59'),
(29, 'BRG7', '0a8b3e6056656bf1b59a29b26a1e93de.png', '2018-07-09 10:05:15'),
(30, 'BRG8', '9f11cf77253b6d47bff0e2f465187636.png', '2018-07-09 10:05:49'),
(31, 'BRG9', '2f17f16be4ea4c3294f0f58fe27c05ea.png', '2018-07-09 10:13:15'),
(32, 'BRG10', 'c72328a7da8d726f1e8647393cd80dc4.png', '2018-07-09 10:14:26'),
(33, 'BRG11', 'f2c9fcaa1301784b79661094fc1b5018.png', '2018-07-09 10:17:22'),
(34, 'BRG12', '13ec20c0d4e0ac946406039d6aa5dfb6.png', '2018-07-09 10:18:18'),
(35, 'BRG13', '30c67ead0d8e2de20c8f3ed6f6739668.png', '2018-07-09 10:20:06'),
(36, 'BRG14', '52afa40b0f6cfc1b6b8f808f464fc3c9.png', '2018-07-09 10:21:22'),
(37, 'BRG15', 'fc3a5b0284aec9d14527d866f00ab010.png', '2018-07-09 10:30:25'),
(38, 'BRG16', 'df20b5fe83c9df3565e1bfaad8c07fc9.png', '2018-07-09 10:32:06'),
(39, 'BRG17', 'b8f2ae778336fc5b9e50a03bf65d0b2e.jpg', '2018-07-09 10:38:06'),
(40, 'BRG18', 'ea231b6b44a49549cbcc48d39b75bc04.png', '2018-07-09 10:38:54'),
(41, 'BRG21', 'fc232c2b574999c3460ccae81109030d.jpeg', '2018-08-06 06:30:23'),
(42, 'BRG20', 'c5c98769a1bbcc6ee391970d79310114.jpeg', '2018-08-06 06:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foto_interior`
--

CREATE TABLE `tbl_foto_interior` (
  `foto_interior_id` int(11) NOT NULL,
  `interior_id` varchar(10) DEFAULT NULL,
  `foto_interior_nama` varchar(65) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_foto_interior`
--

INSERT INTO `tbl_foto_interior` (`foto_interior_id`, `interior_id`, `foto_interior_nama`, `created_at`) VALUES
(3, 'ITR1', 'a2ddef5452cb77a622543e29fdafbc80.png', '2018-07-09 18:13:49'),
(4, 'ITR1', 'a2760adcadee0cbdf6028407f38352dd.png', '2018-07-09 18:13:49'),
(5, 'ITR2', '4095633bbf77dc7b9c418e7056876606.png', '2018-07-12 08:43:22'),
(6, 'ITR2', '8d765dc371245c26faacb991223938fb.png', '2018-07-12 08:43:22'),
(7, 'ITR3', 'c3694cc96c4bf7b871a860cc18cac256.png', '2018-07-12 08:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grup`
--

CREATE TABLE `tbl_grup` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_grup`
--

INSERT INTO `tbl_grup` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grup_pengguna`
--

CREATE TABLE `tbl_grup_pengguna` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_grup_pengguna`
--

INSERT INTO `tbl_grup_pengguna` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(7, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_interior`
--

CREATE TABLE `tbl_interior` (
  `interior_id` varchar(10) NOT NULL,
  `kategori_interior_id` varchar(10) DEFAULT NULL,
  `interior_nama` varchar(65) DEFAULT NULL,
  `interior_harga_jual` int(11) DEFAULT '0',
  `interior_diskon` int(11) NOT NULL DEFAULT '0',
  `interior_deskripsi` text,
  `interior_spek` text,
  `foto_interior_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_interior`
--

INSERT INTO `tbl_interior` (`interior_id`, `kategori_interior_id`, `interior_nama`, `interior_harga_jual`, `interior_diskon`, `interior_deskripsi`, `interior_spek`, `foto_interior_id`, `created_at`) VALUES
('ITR1', 'KTI1', 'asd', 22, 22, '<p>sad</p>\r\n', '<p>dsa</p>\r\n', 3, '2018-07-09 18:13:48'),
('ITR2', 'KTI1', 'asd', 1000000, 10, '<p>asd</p>\r\n', '<p>sad</p>\r\n', 5, '2018-07-12 08:43:21'),
('ITR3', 'KTI1', 'sdasd', 1000000, 10, '<p>sdasd</p>\r\n', '', 7, '2018-07-12 08:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_custom`
--

CREATE TABLE `tbl_jenis_custom` (
  `jenis_id` int(11) NOT NULL,
  `jenis_nama` varchar(65) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_custom`
--

INSERT INTO `tbl_jenis_custom` (`jenis_id`, `jenis_nama`, `created_at`) VALUES
(3, 'KURSI', '2018-07-18 17:42:30'),
(4, 'MEJA', '2018-07-27 14:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jog_custom`
--

CREATE TABLE `tbl_jog_custom` (
  `jog_id` int(11) NOT NULL,
  `jog_nama` varchar(65) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jog_custom`
--

INSERT INTO `tbl_jog_custom` (`jog_id`, `jog_nama`, `created_at`) VALUES
(1, 'REGULER', '2018-07-22 12:22:20'),
(2, 'PREMIUM', '2018-07-27 14:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_barang`
--

CREATE TABLE `tbl_kategori_barang` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(65) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_barang`
--

INSERT INTO `tbl_kategori_barang` (`kategori_id`, `kategori_nama`, `created_at`) VALUES
(2, 'KURSI', '2018-06-22 12:17:01'),
(3, 'MEJA', '2018-06-22 14:33:05'),
(4, 'KASUR', '2018-06-22 15:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_interior`
--

CREATE TABLE `tbl_kategori_interior` (
  `kategori_interior_id` varchar(10) NOT NULL,
  `sub_1_kategori_interior_id` varchar(15) DEFAULT NULL,
  `sub_2_kategori_interior_id` varchar(10) DEFAULT NULL,
  `kategori_interior_nama` varchar(65) DEFAULT NULL,
  `kategori_interior_foto` varchar(65) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_interior`
--

INSERT INTO `tbl_kategori_interior` (`kategori_interior_id`, `sub_1_kategori_interior_id`, `sub_2_kategori_interior_id`, `kategori_interior_nama`, `kategori_interior_foto`, `created_at`) VALUES
('KTI1', 'SKS1', 'SKD1', 'KURSI 2 SEAT', 'dc1ab52d381beeb6cddd090a2a9cdb26.png', '2018-07-09 16:04:37'),
('KTI2', 'SKS1', 'SKD1', 'KURSI 4 SEAT', '2b75a170adc0a797652e2d17b78af245.png', '2018-07-11 17:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material_custom`
--

CREATE TABLE `tbl_material_custom` (
  `material_id` int(11) NOT NULL,
  `material_nama` varchar(65) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_material_custom`
--

INSERT INTO `tbl_material_custom` (`material_id`, `material_nama`, `created_at`) VALUES
(3, 'KAYU MINDI', '2018-07-18 17:42:30'),
(4, 'KAYU JATI', '2018-07-27 14:17:28'),
(5, 'KAYU MAHONI', '2018-07-27 14:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifikasi_pembelian`
--

CREATE TABLE `tbl_notifikasi_pembelian` (
  `id` int(11) NOT NULL,
  `penjualan_id` varchar(15) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notifikasi_pembelian`
--

INSERT INTO `tbl_notifikasi_pembelian` (`id`, `penjualan_id`, `status`, `created_at`) VALUES
(1, 'PJN1', 0, '2018-07-06 09:07:53'),
(2, 'PJN2', 1, '2018-07-06 12:44:34'),
(3, 'PJN3', 1, '2018-07-08 06:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ongkir`
--

CREATE TABLE `tbl_ongkir` (
  `ongkir_id` int(11) NOT NULL,
  `id_prov` char(2) DEFAULT NULL,
  `ongkir_nama` varchar(65) DEFAULT NULL,
  `ongkir_tarif` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ongkir`
--

INSERT INTO `tbl_ongkir` (`ongkir_id`, `id_prov`, `ongkir_nama`, `ongkir_tarif`, `created_at`) VALUES
(1, '33', 'SOLO', 100000, '2018-07-04 04:10:41'),
(2, '34', 'JOGJA', 200000, '2018-07-28 13:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `address` varchar(95) DEFAULT NULL,
  `notifikasi_daftar` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `gender`, `address`, `notifikasi_daftar`) VALUES
(1, '127.0.0.1', 'admin@admin.com', '$2y$08$WmGkJQwG6eBSUrURn6EWXOfm32pw9FvXD96z.taHBBFzUkzKuhoIy', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1533625156, 1, 'Admin', 'istrator', 'ADMIN', '0', NULL, NULL, 0),
(6, '::1', 'user1@user.com', '$2y$08$VmTeTaIP0hSb5mITjE64yup5UvjqslFhi1Zq7ljbTLmA.qmZ1sfF6', NULL, 'user1@user.com', NULL, NULL, NULL, NULL, 1530206634, 1533566376, 1, 'Dimas', 'Hermawan', NULL, '089', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `penjualan_id` varchar(15) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `ongkir_id` int(11) DEFAULT NULL,
  `penjualan_alamat` text,
  `penjualan_transfer` varchar(65) DEFAULT NULL,
  `penjualan_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`penjualan_id`, `customer_id`, `ongkir_id`, `penjualan_alamat`, `penjualan_transfer`, `penjualan_status`, `created_at`) VALUES
('PJN1', 6, 1, 'ds', '999ad33eba3fed6bde091c4edeac7b96.png', 0, '2018-07-06 07:23:21'),
('PJN2', 6, 1, 'ds', 'd3696dc18e3b43c66f0b7bdfd6196f46.png', 0, '2018-07-06 12:42:36'),
('PJN3', 6, 1, 'ds', 'ea77856faeec380559a95d91e7ac4364.png', 0, '2018-07-07 03:19:14'),
('PJN4', 6, 2, 'asle', NULL, 1, '2018-08-05 17:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan_custom`
--

CREATE TABLE `tbl_penjualan_custom` (
  `penjualan_custom_id` varchar(15) NOT NULL,
  `penjualan_custom_jenis` int(11) NOT NULL DEFAULT '1',
  `ongkir_id` int(11) DEFAULT NULL,
  `custom_id` varchar(15) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `alamat` text,
  `dibayarkan` int(11) NOT NULL DEFAULT '0',
  `transfer` varchar(65) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `catatan` text,
  `foto_permintaan` varchar(65) DEFAULT NULL,
  `permintaan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan_custom`
--

INSERT INTO `tbl_penjualan_custom` (`penjualan_custom_id`, `penjualan_custom_jenis`, `ongkir_id`, `custom_id`, `customer_id`, `alamat`, `dibayarkan`, `transfer`, `status`, `catatan`, `foto_permintaan`, `permintaan`, `created_at`) VALUES
('PCT1', 2, 1, NULL, 6, 'sdasdsad', 0, NULL, 1, NULL, '406f23a5eb63acf39934c5ac82aaf07c.jpeg', 'asdasdsadsad', '2018-08-01 05:22:53'),
('PCT2', 1, 1, 'CTM1', 6, 'mmbnmb', 60000, '465d539a6abca2925d6a77aee1cbd1ab.jpg', 0, 'jjghjg', NULL, NULL, '2018-08-06 14:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_percobaan_login`
--

CREATE TABLE `tbl_percobaan_login` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_style_custom`
--

CREATE TABLE `tbl_style_custom` (
  `style_id` int(11) NOT NULL,
  `style_nama` varchar(65) DEFAULT NULL,
  `style_deskripsi` text,
  `style_foto` varchar(65) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_style_custom`
--

INSERT INTO `tbl_style_custom` (`style_id`, `style_nama`, `style_deskripsi`, `style_foto`, `created_at`) VALUES
(2, 'SCANDINAVIAN', 'Tidak cocok dengan produk yang sudah ada ? Mari desain sendiri desain yang anda inginkan sendiri, furniture yang dibuat dengan custom design sesuka anda. Silahkan klik link dibawah untuk memulai custom design anda.', '8a1272fd5cac0f8f897704677edf9e36.jpg', '2018-07-27 07:09:44'),
(3, 'CREDENZIA', 'Tidak cocok dengan produk yang sudah ada ? Mari desain sendiri desain yang anda inginkan sendiri, furniture yang dibuat dengan custom design sesuka anda. Silahkan klik link dibawah untuk memulai custom design anda.', '499552548dc8d9310f12bba1b5fc316e.jpg', '2018-07-27 08:16:43'),
(4, 'RETRO', 'Tidak cocok dengan produk yang sudah ada ? Mari desain sendiri desain yang anda inginkan sendiri, furniture yang dibuat dengan custom design sesuka anda. Silahkan klik link dibawah untuk memulai custom design anda.', '6753a8431a8bb71cf902195ba699d6f3.jpg', '2018-07-27 08:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_1_kategori_interior`
--

CREATE TABLE `tbl_sub_1_kategori_interior` (
  `sub_1_kategori_interior_id` varchar(10) NOT NULL,
  `sub_1_kategori_interior_nama` varchar(65) DEFAULT NULL,
  `sub_1_kategori_interior_foto` varchar(65) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_1_kategori_interior`
--

INSERT INTO `tbl_sub_1_kategori_interior` (`sub_1_kategori_interior_id`, `sub_1_kategori_interior_nama`, `sub_1_kategori_interior_foto`, `created_at`) VALUES
('SKS1', 'BEDROOM', '11f8d850291aa4a3b674dbed769fbbed.jpg', '2018-07-09 13:31:43'),
('SKS2', 'LIVING ROOM', 'f5da72fe752621098a81d61dd210b628.jpg', '2018-07-09 13:43:45'),
('SKS3', 'DINING CHAIR', 'ed6960c76b706c7ac9a73c8b9b56f76d.jpg', '2018-07-09 13:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_2_kategori_interior`
--

CREATE TABLE `tbl_sub_2_kategori_interior` (
  `sub_2_kategori_interior_id` varchar(10) NOT NULL,
  `sub_2_kategori_interior_nama` varchar(65) DEFAULT NULL,
  `sub_2_kategori_interior_foto` varchar(65) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_2_kategori_interior`
--

INSERT INTO `tbl_sub_2_kategori_interior` (`sub_2_kategori_interior_id`, `sub_2_kategori_interior_nama`, `sub_2_kategori_interior_foto`, `created_at`) VALUES
('SKD1', 'KURSI', 'a9c70d9ed73cae24a77c25900c634c91.png', '2018-07-09 14:34:56'),
('SKD2', 'MEJA', 'c447d8421f390df43bc7027db236ad61.png', '2018-07-09 14:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_kategori_barang`
--

CREATE TABLE `tbl_sub_kategori_barang` (
  `sub_kategori_id` int(11) NOT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `sub_kategori_nama` varchar(65) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_kategori_barang`
--

INSERT INTO `tbl_sub_kategori_barang` (`sub_kategori_id`, `kategori_id`, `sub_kategori_nama`, `created_at`) VALUES
(2, 2, 'KURSI 2 SEAT', '2018-06-22 12:09:05'),
(4, 2, 'KURSI 1 SEAT', '2018-06-22 12:19:15'),
(5, 3, 'MEJA MAKAN', '2018-06-22 16:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ulasan`
--

CREATE TABLE `tbl_ulasan` (
  `ulasan_id` int(11) NOT NULL,
  `penjualan_id` varchar(15) DEFAULT NULL,
  `customer_id` varchar(15) DEFAULT NULL,
  `ulasan_rating` int(11) NOT NULL DEFAULT '5',
  `ulasan_isi` text NOT NULL,
  `ulasan_tampil` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ulasan`
--

INSERT INTO `tbl_ulasan` (`ulasan_id`, `penjualan_id`, `customer_id`, `ulasan_rating`, `ulasan_isi`, `ulasan_tampil`, `created_at`) VALUES
(1, 'PJN3', '6', 5, 'adsad\r\n', 1, '2018-07-14 23:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warna`
--

CREATE TABLE `tbl_warna` (
  `warna_id` int(11) NOT NULL,
  `warna_nama` varchar(65) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_warna`
--

INSERT INTO `tbl_warna` (`warna_id`, `warna_nama`, `created_at`) VALUES
(1, 'HIJAU', '2018-08-06 06:05:06'),
(2, 'MERAH', '2018-08-06 06:05:38'),
(3, 'KUNING', '2018-08-06 06:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warna_barang`
--

CREATE TABLE `tbl_warna_barang` (
  `warna_barang_id` int(11) NOT NULL,
  `warna_id` int(11) DEFAULT NULL,
  `barang_id` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_warna_barang`
--

INSERT INTO `tbl_warna_barang` (`warna_barang_id`, `warna_id`, `barang_id`, `created_at`) VALUES
(4, 1, 'BRG20', '2018-08-06 06:31:18'),
(5, 2, 'BRG20', '2018-08-06 06:31:18'),
(6, 3, 'BRG20', '2018-08-06 06:31:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indexes for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  ADD PRIMARY KEY (`artikel_id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `tbl_barang_dilihat`
--
ALTER TABLE `tbl_barang_dilihat`
  ADD PRIMARY KEY (`barang_dilihat_id`);

--
-- Indexes for table `tbl_coating_custom`
--
ALTER TABLE `tbl_coating_custom`
  ADD PRIMARY KEY (`coating_id`);

--
-- Indexes for table `tbl_custom`
--
ALTER TABLE `tbl_custom`
  ADD PRIMARY KEY (`custom_id`);

--
-- Indexes for table `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  ADD PRIMARY KEY (`detail_penjualan_id`);

--
-- Indexes for table `tbl_favorit`
--
ALTER TABLE `tbl_favorit`
  ADD PRIMARY KEY (`favorit_id`);

--
-- Indexes for table `tbl_foto_barang`
--
ALTER TABLE `tbl_foto_barang`
  ADD PRIMARY KEY (`foto_barang_id`);

--
-- Indexes for table `tbl_foto_interior`
--
ALTER TABLE `tbl_foto_interior`
  ADD PRIMARY KEY (`foto_interior_id`);

--
-- Indexes for table `tbl_grup`
--
ALTER TABLE `tbl_grup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_grup_pengguna`
--
ALTER TABLE `tbl_grup_pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `tbl_interior`
--
ALTER TABLE `tbl_interior`
  ADD PRIMARY KEY (`interior_id`);

--
-- Indexes for table `tbl_jenis_custom`
--
ALTER TABLE `tbl_jenis_custom`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `tbl_jog_custom`
--
ALTER TABLE `tbl_jog_custom`
  ADD PRIMARY KEY (`jog_id`);

--
-- Indexes for table `tbl_kategori_barang`
--
ALTER TABLE `tbl_kategori_barang`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_kategori_interior`
--
ALTER TABLE `tbl_kategori_interior`
  ADD PRIMARY KEY (`kategori_interior_id`);

--
-- Indexes for table `tbl_material_custom`
--
ALTER TABLE `tbl_material_custom`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `tbl_notifikasi_pembelian`
--
ALTER TABLE `tbl_notifikasi_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ongkir`
--
ALTER TABLE `tbl_ongkir`
  ADD PRIMARY KEY (`ongkir_id`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`penjualan_id`);

--
-- Indexes for table `tbl_penjualan_custom`
--
ALTER TABLE `tbl_penjualan_custom`
  ADD PRIMARY KEY (`penjualan_custom_id`);

--
-- Indexes for table `tbl_percobaan_login`
--
ALTER TABLE `tbl_percobaan_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_style_custom`
--
ALTER TABLE `tbl_style_custom`
  ADD PRIMARY KEY (`style_id`);

--
-- Indexes for table `tbl_sub_1_kategori_interior`
--
ALTER TABLE `tbl_sub_1_kategori_interior`
  ADD PRIMARY KEY (`sub_1_kategori_interior_id`);

--
-- Indexes for table `tbl_sub_2_kategori_interior`
--
ALTER TABLE `tbl_sub_2_kategori_interior`
  ADD PRIMARY KEY (`sub_2_kategori_interior_id`);

--
-- Indexes for table `tbl_sub_kategori_barang`
--
ALTER TABLE `tbl_sub_kategori_barang`
  ADD PRIMARY KEY (`sub_kategori_id`);

--
-- Indexes for table `tbl_ulasan`
--
ALTER TABLE `tbl_ulasan`
  ADD PRIMARY KEY (`ulasan_id`);

--
-- Indexes for table `tbl_warna`
--
ALTER TABLE `tbl_warna`
  ADD PRIMARY KEY (`warna_id`);

--
-- Indexes for table `tbl_warna_barang`
--
ALTER TABLE `tbl_warna_barang`
  ADD PRIMARY KEY (`warna_barang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  MODIFY `artikel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_barang_dilihat`
--
ALTER TABLE `tbl_barang_dilihat`
  MODIFY `barang_dilihat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `tbl_coating_custom`
--
ALTER TABLE `tbl_coating_custom`
  MODIFY `coating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  MODIFY `detail_penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_favorit`
--
ALTER TABLE `tbl_favorit`
  MODIFY `favorit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_foto_barang`
--
ALTER TABLE `tbl_foto_barang`
  MODIFY `foto_barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_foto_interior`
--
ALTER TABLE `tbl_foto_interior`
  MODIFY `foto_interior_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_grup`
--
ALTER TABLE `tbl_grup`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_grup_pengguna`
--
ALTER TABLE `tbl_grup_pengguna`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_jenis_custom`
--
ALTER TABLE `tbl_jenis_custom`
  MODIFY `jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_jog_custom`
--
ALTER TABLE `tbl_jog_custom`
  MODIFY `jog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_kategori_barang`
--
ALTER TABLE `tbl_kategori_barang`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_material_custom`
--
ALTER TABLE `tbl_material_custom`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_notifikasi_pembelian`
--
ALTER TABLE `tbl_notifikasi_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_ongkir`
--
ALTER TABLE `tbl_ongkir`
  MODIFY `ongkir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_percobaan_login`
--
ALTER TABLE `tbl_percobaan_login`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_style_custom`
--
ALTER TABLE `tbl_style_custom`
  MODIFY `style_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_sub_kategori_barang`
--
ALTER TABLE `tbl_sub_kategori_barang`
  MODIFY `sub_kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_ulasan`
--
ALTER TABLE `tbl_ulasan`
  MODIFY `ulasan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_warna`
--
ALTER TABLE `tbl_warna`
  MODIFY `warna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_warna_barang`
--
ALTER TABLE `tbl_warna_barang`
  MODIFY `warna_barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
