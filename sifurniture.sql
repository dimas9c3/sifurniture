-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2018 at 06:56 PM
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
(3, 'Artikel 1 Meja', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</p>\r\n', 'ec3da9e3b0bbd13f40ff183e279b2e1f.jpeg', 0, '2018-08-06 14:09:37'),
(4, 'Artikel 2 Meja', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</p>\r\n', '8cd24aecaa287a89f700eff316f5057b.png', 0, '2018-08-10 07:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_item` varchar(65) DEFAULT NULL,
  `banner_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`banner_id`, `banner_item`, `banner_status`, `created_at`) VALUES
(4, '5145c888135b128b1462eaa4dd468b48.jpg', 1, '2018-08-14 08:13:26'),
(6, '921afd8f71cc05df35d802ff690cbe21.jpg', 1, '2018-08-14 08:16:02');

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
('BRG1', 5, 'Meja Makan Cantik', 10, 0, 100000, 0, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci.&nbsp;</p>\r\n', '20m X 10m X 5m', 44, '2018-08-11 16:26:40'),
('BRG3', 5, 'Meja Makan Gloosy', 10, 0, 1000000, 0, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor.&nbsp;</p>\r\n', '20m X 10m X 5m', 47, '2018-08-14 09:12:40'),
('BRG4', 5, 'Meja Makan Rose', 10, 0, 1000000, 0, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor.&nbsp;</p>\r\n', '20m X 10m X 5m', 48, '2018-08-14 09:14:26'),
('BRG5', 5, 'Meja Makan Blue', 10, 0, 100000, 0, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor.&nbsp;</p>\r\n', '20m X 10m X 5m', 49, '2018-08-14 09:14:52'),
('BRG6', 5, 'Meja Makan Dua', 10, 0, 100000, 0, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor.&nbsp;</p>\r\n', '20m X 10m X 5m', 50, '2018-08-14 09:15:37');

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
(54, 'BRG20', '2018-08-06', '2018-08-06 15:02:39'),
(55, 'BRG8', '2018-08-10', '2018-08-10 07:15:50'),
(56, 'BRG12', '2018-08-10', '2018-08-10 07:18:03'),
(57, 'BRG17', '2018-08-10', '2018-08-10 07:18:29'),
(58, 'BRG1', '2018-08-11', '2018-08-11 15:34:10'),
(59, 'BRG1', '2018-08-11', '2018-08-11 15:34:32'),
(60, 'BRG1', '2018-08-11', '2018-08-11 15:35:16'),
(61, 'BRG1', '2018-08-11', '2018-08-11 15:37:40'),
(62, 'BRG1', '2018-08-11', '2018-08-11 16:27:41'),
(63, 'BRG1', '2018-08-11', '2018-08-11 16:28:45'),
(64, 'BRG1', '2018-08-11', '2018-08-11 16:29:02'),
(65, 'BRG1', '2018-08-11', '2018-08-11 16:29:41'),
(66, 'BRG1', '2018-08-11', '2018-08-11 16:30:25'),
(67, 'BRG1', '2018-08-11', '2018-08-11 16:32:53'),
(68, 'BRG1', '2018-08-11', '2018-08-11 16:35:40'),
(69, 'BRG1', '2018-08-11', '2018-08-11 16:36:09'),
(70, 'BRG1', '2018-08-11', '2018-08-11 16:36:39'),
(71, 'BRG1', '2018-08-11', '2018-08-11 16:37:03'),
(72, 'BRG1', '2018-08-11', '2018-08-11 16:38:02'),
(73, 'BRG1', '2018-08-11', '2018-08-11 16:38:45'),
(74, 'BRG1', '2018-08-11', '2018-08-11 16:39:02'),
(75, 'BRG1', '2018-08-11', '2018-08-11 16:39:29'),
(76, 'BRG1', '2018-08-11', '2018-08-11 16:40:20'),
(77, 'BRG1', '2018-08-11', '2018-08-11 16:41:08'),
(78, 'BRG1', '2018-08-11', '2018-08-11 16:48:37'),
(79, 'BRG1', '2018-08-11', '2018-08-11 16:49:27'),
(80, 'BRG1', '2018-08-12', '2018-08-12 10:19:05'),
(81, 'BRG1', '2018-08-12', '2018-08-12 10:22:33'),
(82, 'BRG1', '2018-08-12', '2018-08-12 10:22:36'),
(83, 'BRG1', '2018-08-12', '2018-08-12 10:23:10'),
(84, 'BRG1', '2018-08-12', '2018-08-12 10:25:29'),
(85, 'BRG1', '2018-08-12', '2018-08-12 10:26:32'),
(86, 'BRG1', '2018-08-12', '2018-08-12 10:26:37'),
(87, 'BRG1', '2018-08-12', '2018-08-12 10:26:40'),
(88, 'BRG1', '2018-08-12', '2018-08-12 10:27:31'),
(89, 'BRG1', '2018-08-12', '2018-08-12 10:27:34'),
(90, 'BRG1', '2018-08-12', '2018-08-12 10:51:07'),
(91, 'BRG1', '2018-08-13', '2018-08-13 03:13:22'),
(92, 'BRG1', '2018-08-13', '2018-08-13 03:14:02'),
(93, 'BRG1', '2018-08-13', '2018-08-13 03:24:31'),
(94, 'BRG1', '2018-08-13', '2018-08-13 03:25:17'),
(95, 'BRG1', '2018-08-13', '2018-08-13 03:26:13'),
(96, 'BRG1', '2018-08-13', '2018-08-13 03:26:25'),
(97, 'BRG1', '2018-08-13', '2018-08-13 14:20:48'),
(98, 'BRG1', '2018-08-13', '2018-08-13 14:21:29'),
(99, 'BRG1', '2018-08-13', '2018-08-13 14:22:34'),
(100, 'BRG1', '2018-08-13', '2018-08-13 14:22:56'),
(101, 'BRG1', '2018-08-13', '2018-08-13 14:23:07'),
(102, 'BRG1', '2018-08-13', '2018-08-13 14:25:01'),
(103, 'BRG1', '2018-08-13', '2018-08-13 14:25:14'),
(104, 'BRG1', '2018-08-13', '2018-08-13 14:25:47'),
(105, 'BRG1', '2018-08-13', '2018-08-13 14:26:12'),
(106, 'BRG1', '2018-08-13', '2018-08-13 14:26:37'),
(107, 'BRG1', '2018-08-13', '2018-08-13 14:26:41'),
(108, 'BRG1', '2018-08-13', '2018-08-13 14:26:52'),
(109, 'BRG1', '2018-08-13', '2018-08-13 14:27:25'),
(110, 'BRG1', '2018-08-13', '2018-08-13 14:27:48'),
(111, 'BRG1', '2018-08-13', '2018-08-13 14:29:03'),
(112, 'BRG1', '2018-08-13', '2018-08-13 14:30:23'),
(113, 'BRG1', '2018-08-13', '2018-08-13 14:34:58'),
(114, 'BRG6', '2018-08-14', '2018-08-14 09:24:08'),
(115, 'BRG4', '2018-08-14', '2018-08-14 09:24:26'),
(116, 'BRG3', '2018-08-14', '2018-08-14 09:24:29'),
(117, 'BRG5', '2018-08-14', '2018-08-14 09:57:15'),
(118, 'BRG5', '2018-08-14', '2018-08-14 09:57:24'),
(119, 'BRG4', '2018-08-14', '2018-08-14 09:57:29');

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
(5, 'BRG8', 1, '2018-08-06 15:20:21'),
(6, 'BRG1', 1, '2018-08-13 14:00:37'),
(7, 'BRG3', 1, '2018-08-14 10:13:34'),
(8, 'BRG6', 6, '2018-08-14 10:24:01'),
(9, 'BRG4', 6, '2018-08-14 10:24:10'),
(10, 'BRG1', 6, '2018-08-14 10:39:07');

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
(44, 'BRG1', '35a78973e09115a4af48c1f172d1dc6b.jpg', '2018-08-11 16:26:59'),
(45, 'BRG1', '26b42bfd2434e9a174d257e4bdf8665f.jpg', '2018-08-11 16:26:59'),
(46, 'BRG1', 'e93cd801cf9d52aba4ac3df3a12a1a70.jpg', '2018-08-11 16:26:59'),
(47, 'BRG3', 'de490900511584984d098140bf5c9554.jpg', '2018-08-14 09:12:45'),
(48, 'BRG4', 'e7e978851cc547e0a61dee59d6efeab2.jpg', '2018-08-14 09:14:28'),
(49, 'BRG5', '0dbb87be766ecb90e2f2e19eb8310b17.jpg', '2018-08-14 09:14:54'),
(50, 'BRG6', '98295eeb199a83f9008b34036c6dd247.jpg', '2018-08-14 09:15:42');

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
-- Table structure for table `tbl_iklan`
--

CREATE TABLE `tbl_iklan` (
  `iklan_id` int(11) NOT NULL,
  `iklan_item` varchar(65) DEFAULT NULL,
  `iklan_text` text,
  `iklan_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_iklan`
--

INSERT INTO `tbl_iklan` (`iklan_id`, `iklan_item`, `iklan_text`, `iklan_status`, `created_at`) VALUES
(1, '2ed5f2185cc0186d1d151f43b5c692b4.jpg', 'sa', 1, '2018-08-14 08:48:34');

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
(1, '33', 'SOLO', 10000011, '2018-07-04 04:10:41'),
(2, '34', 'JOGJA111343434333', 2147483647, '2018-07-28 13:37:45');

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
(1, '127.0.0.1', 'admin@admin.com', '$2y$08$WmGkJQwG6eBSUrURn6EWXOfm32pw9FvXD96z.taHBBFzUkzKuhoIy', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1534240842, 1, 'Admin', 'istrator', 'ADMIN', '0', NULL, NULL, 0),
(6, '::1', 'user1@user.com', '$2y$08$VmTeTaIP0hSb5mITjE64yup5UvjqslFhi1Zq7ljbTLmA.qmZ1sfF6', NULL, 'user1@user.com', NULL, NULL, NULL, NULL, 1530206634, 1534242223, 1, 'Dimas', 'Hermawan', NULL, '089', NULL, NULL, 1);

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
(2, 'SCANDINAVIAN', 'Tidak cocok dengan produk yang sudah ada ? Mari desain sendiri desain yang anda inginkan sendiri, furniture yang dibuat dengan custom design sesuka anda. Silahkan klik link dibawah untuk memulai custom design anda.', '036a8591ce70b20af0d2c2b5a28682b9.jpg', '2018-07-27 07:09:44'),
(3, 'CREDENZIA', 'Tidak cocok dengan produk yang sudah ada ? Mari desain sendiri desain yang anda inginkan sendiri, furniture yang dibuat dengan custom design sesuka anda. Silahkan klik link dibawah untuk memulai custom design anda.', 'cfe399197cfa536b2d7ebdb621d8397f.jpg', '2018-07-27 08:16:43'),
(4, 'RETRO', 'Tidak cocok dengan produk yang sudah ada ? Mari desain sendiri desain yang anda inginkan sendiri, furniture yang dibuat dengan custom design sesuka anda. Silahkan klik link dibawah untuk memulai custom design anda.', '4283adc6517179941efa2ff17146d247.jpg', '2018-07-27 08:16:55');

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
('SKS1', 'BEDROOM', '3e06452e55ebe45bbad7aafc0b04d9ab.jpg', '2018-07-09 13:31:43'),
('SKS2', 'LIVING ROOM', '712e43d495bbca49364acb0cb5b8afd8.jpg', '2018-07-09 13:43:45'),
('SKS3', 'DINING CHAIR', 'c970b46050c2f60e58b15626c4dec901.jpg', '2018-07-09 13:44:07');

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
-- Table structure for table `tbl_theme_option`
--

CREATE TABLE `tbl_theme_option` (
  `theme_option_id` int(11) NOT NULL,
  `theme_option_email` varchar(65) DEFAULT NULL,
  `theme_option_email_pass` varchar(65) DEFAULT NULL,
  `theme_option_whatsapp` varchar(25) DEFAULT NULL,
  `theme_option_telepon` varchar(15) DEFAULT NULL,
  `theme_option_operasional` text,
  `theme_option_alamat` text,
  `theme_option_rekening` text,
  `theme_option_faq` text,
  `theme_option_contact` text,
  `theme_option_privacy` text,
  `theme_option_career` text,
  `theme_option_partner` text,
  `theme_option_links` text,
  `theme_option_links_title` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_theme_option`
--

INSERT INTO `tbl_theme_option` (`theme_option_id`, `theme_option_email`, `theme_option_email_pass`, `theme_option_whatsapp`, `theme_option_telepon`, `theme_option_operasional`, `theme_option_alamat`, `theme_option_rekening`, `theme_option_faq`, `theme_option_contact`, `theme_option_privacy`, `theme_option_career`, `theme_option_partner`, `theme_option_links`, `theme_option_links_title`) VALUES
(1, 'iwoodys@iwoodys.com', 'password', '6282139414263', '(0271)897718', 'Senin-Minggu (09.00 - 21.00)', 'Solo', 'MANDIRI (08282828)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'Properties'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'Landlords'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'Renters'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'Services'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'Pricing');

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
(1, 'PJN3', '6', 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 1, '2018-07-14 23:30:37');

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
(6, 3, 'BRG20', '2018-08-06 06:31:18'),
(7, 1, 'BRG1', '2018-08-11 15:33:58'),
(8, 2, 'BRG1', '2018-08-11 15:33:58'),
(9, 3, 'BRG1', '2018-08-11 15:33:58'),
(10, 1, 'BRG1', '2018-08-11 16:26:40'),
(11, 2, 'BRG1', '2018-08-11 16:26:40'),
(12, 3, 'BRG1', '2018-08-11 16:26:40'),
(13, 1, 'BRG2', '2018-08-13 14:29:56'),
(14, 2, 'BRG2', '2018-08-13 14:29:56'),
(15, 1, 'BRG3', '2018-08-14 09:12:40'),
(16, 2, 'BRG3', '2018-08-14 09:12:40'),
(17, 3, 'BRG3', '2018-08-14 09:12:40'),
(18, 1, 'BRG4', '2018-08-14 09:14:26'),
(19, 2, 'BRG4', '2018-08-14 09:14:26'),
(20, 3, 'BRG4', '2018-08-14 09:14:26'),
(21, 1, 'BRG5', '2018-08-14 09:14:52'),
(22, 2, 'BRG5', '2018-08-14 09:14:52'),
(23, 3, 'BRG5', '2018-08-14 09:14:52'),
(24, 1, 'BRG6', '2018-08-14 09:15:37'),
(25, 2, 'BRG6', '2018-08-14 09:15:37'),
(26, 3, 'BRG6', '2018-08-14 09:15:37');

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
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`banner_id`);

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
-- Indexes for table `tbl_iklan`
--
ALTER TABLE `tbl_iklan`
  ADD PRIMARY KEY (`iklan_id`);

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
-- Indexes for table `tbl_theme_option`
--
ALTER TABLE `tbl_theme_option`
  ADD PRIMARY KEY (`theme_option_id`);

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
  MODIFY `artikel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_barang_dilihat`
--
ALTER TABLE `tbl_barang_dilihat`
  MODIFY `barang_dilihat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
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
  MODIFY `favorit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_foto_barang`
--
ALTER TABLE `tbl_foto_barang`
  MODIFY `foto_barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
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
-- AUTO_INCREMENT for table `tbl_iklan`
--
ALTER TABLE `tbl_iklan`
  MODIFY `iklan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `tbl_theme_option`
--
ALTER TABLE `tbl_theme_option`
  MODIFY `theme_option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `warna_barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
