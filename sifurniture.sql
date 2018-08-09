-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2018 at 09:12 AM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.2.5-1+ubuntu18.04.1+deb.sury.org+1

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
  `foto_barang_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`barang_id`, `sub_kategori_id`, `barang_nama`, `barang_diskon`, `barang_harga_beli`, `barang_harga_jual`, `barang_berat`, `barang_deskripsi`, `foto_barang_id`, `created_at`) VALUES
('BRG1', 5, 'Meja Makan Gloosy', 1, 0, 1000000, 0, '<p>1</p>\r\n', 23, '2018-07-03 18:10:05'),
('BRG10', 5, '1', 1, 0, 1000000, 0, '<p>1</p>\r\n', 32, '2018-07-09 10:14:26'),
('BRG11', 2, 'sad', 1, 0, 1, 0, '<p>sda</p>\r\n', 33, '2018-07-09 10:17:22'),
('BRG12', 5, '1', 1, 0, 1000000, 0, '<p>1</p>\r\n', 34, '2018-07-09 10:18:18'),
('BRG13', 5, '1', 1, 0, 1000000, 0, '<p>1</p>\r\n', 35, '2018-07-09 10:20:06'),
('BRG14', 5, '1', 1, 0, 1, 0, '<p>1</p>\r\n', 36, '2018-07-09 10:21:21'),
('BRG15', 5, 'sda', 1, 0, 1000000, 0, '<p>sd</p>\r\n', 37, '2018-07-09 10:30:25'),
('BRG16', 2, 'asd', 1, 0, 1, 0, '<p>asd</p>\r\n', 38, '2018-07-09 10:32:05'),
('BRG17', 5, '1', 1, 0, 1, 0, '<p>111</p>\r\n', 39, '2018-07-09 10:38:05'),
('BRG18', 5, 'MEJA', 1, 0, 1000000, 0, '<p>1w</p>\r\n', 40, '2018-07-09 10:38:53'),
('BRG2', 2, '11', 0, 0, 1000000, 0, '<p>1</p>\r\n', 24, '2018-07-03 18:10:40'),
('BRG3', 5, 'c', 25, 0, 1000000, 0, '<p>q</p>\r\n', 25, '2018-07-09 09:59:59'),
('BRG4', 2, '1', 45, 0, 1000000, 0, '<p>1</p>\r\n', 26, '2018-07-09 10:01:23'),
('BRG5', 4, '1', 1, 0, 1000000, 0, '<p>1</p>\r\n', 27, '2018-07-09 10:02:48'),
('BRG6', 2, '1', 15, 0, 1000000, 0, '<p>1</p>\r\n', 28, '2018-07-09 10:03:59'),
('BRG7', 5, '1', 11, 0, 1000000, 0, '<p>1</p>\r\n', 29, '2018-07-09 10:05:15'),
('BRG8', 4, '1', 1, 0, 1, 0, '<p>1</p>\r\n', 30, '2018-07-09 10:05:48'),
('BRG9', 5, '1', 1, 0, 1, 0, '<p>1</p>\r\n', 31, '2018-07-09 10:13:14');

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
(10, 'PJN4', 'BRG1', 1, 990000, '2018-07-08 12:18:55');

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
(40, 'BRG18', 'ea231b6b44a49549cbcc48d39b75bc04.png', '2018-07-09 10:38:54');

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
(4, 'ITR1', 'a2760adcadee0cbdf6028407f38352dd.png', '2018-07-09 18:13:49');

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
('ITR1', 'KTI1', 'asd', 22, 22, '<p>sad</p>\r\n', '<p>dsa</p>\r\n', 3, '2018-07-09 18:13:48');

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
('KTI1', 'SKS1', 'SKD1', 'KURSI 2 SEAT', 'dc1ab52d381beeb6cddd090a2a9cdb26.png', '2018-07-09 16:04:37');

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
  `provinsi_id` int(11) DEFAULT NULL,
  `ongkir_tarif` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ongkir`
--

INSERT INTO `tbl_ongkir` (`ongkir_id`, `provinsi_id`, `ongkir_tarif`, `created_at`) VALUES
(1, 1, 100000, '2018-07-04 04:10:41');

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
(1, '127.0.0.1', 'admin@admin.com', '$2y$08$WmGkJQwG6eBSUrURn6EWXOfm32pw9FvXD96z.taHBBFzUkzKuhoIy', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1531188675, 1, 'Admin', 'istrator', 'ADMIN', '0', NULL, NULL, 0),
(6, '::1', 'user1@user.com', '$2y$08$VmTeTaIP0hSb5mITjE64yup5UvjqslFhi1Zq7ljbTLmA.qmZ1sfF6', NULL, 'user1@user.com', NULL, NULL, NULL, NULL, 1530206634, 1531188729, 1, 'Dimas', 'Hermawan', NULL, '089', NULL, NULL, 1);

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
('PJN4', 6, 1, 'ds', NULL, 1, '2018-07-08 12:18:55');

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
('SKS1', 'BEDROOM', 'f725f57ba02142d1379fd85540c404f2.png', '2018-07-09 13:31:43'),
('SKS2', 'LIVING ROOM', '0edd8180320eda454b4b7c45db976786.png', '2018-07-09 13:43:45'),
('SKS3', 'DINING CHAIR', 'b8f71c74d1ce8277ad758c94a556f3d3.png', '2018-07-09 13:44:07');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  ADD PRIMARY KEY (`detail_penjualan_id`);

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
-- Indexes for table `tbl_percobaan_login`
--
ALTER TABLE `tbl_percobaan_login`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  MODIFY `detail_penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_foto_barang`
--
ALTER TABLE `tbl_foto_barang`
  MODIFY `foto_barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_foto_interior`
--
ALTER TABLE `tbl_foto_interior`
  MODIFY `foto_interior_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- AUTO_INCREMENT for table `tbl_kategori_barang`
--
ALTER TABLE `tbl_kategori_barang`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_notifikasi_pembelian`
--
ALTER TABLE `tbl_notifikasi_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_ongkir`
--
ALTER TABLE `tbl_ongkir`
  MODIFY `ongkir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `tbl_sub_kategori_barang`
--
ALTER TABLE `tbl_sub_kategori_barang`
  MODIFY `sub_kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
