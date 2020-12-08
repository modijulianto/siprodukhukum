-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2020 at 03:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siprodukhukum`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_produk`
--

CREATE TABLE `tb_jenis_produk` (
  `id_jenis` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `nama_jenis` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_produk`
--

INSERT INTO `tb_jenis_produk` (`id_jenis`, `id_unit`, `nama_jenis`) VALUES
(1, 1, 'Peraturan'),
(2, 1, 'Edaran'),
(3, 1, 'SK'),
(4, 1, 'Surat Keterangan'),
(7, 5, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `id_unit`, `id_jenis`, `nama_kategori`) VALUES
(5, 1, 4, 'SK Rektor'),
(6, 1, 3, 'SK Dekan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_tentang` int(11) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `tahun` year(4) NOT NULL,
  `status` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `file` varchar(128) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `validasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `no`, `id_kategori`, `id_tentang`, `judul`, `tahun`, `status`, `keterangan`, `file`, `id_unit`, `validasi`) VALUES
(1, 5, 6, 13, 'Produk Hukum', 2020, 'Berlaku', 'pelaksanaan pengumuman', 'SMT_3_1805021004_KHS_Ganjil_2019-2020_signed.pdf', 1, 1),
(5, 60, 6, 16, 'Produk Hukum Baru Diupdate', 2020, 'Tidak Berlaku', 'peraturan KPU nomor 17 Tahun 2020', '1805021004_Putu_Modi_Julianto_SIM_Swap.pdf', 2, 1),
(6, 1, 5, 3, '1', 2001, 'Berlaku', '1', '', 1, 1),
(7, 2, 5, 3, '2', 2002, 'Berlaku', '2', '', 2, 1),
(8, 3, 6, 3, '3', 2003, 'Berlaku', '3', '', 3, 1),
(9, 4, 6, 3, '4', 2004, 'Berlaku', '4', '', 4, 1),
(10, 5, 5, 3, '5', 2005, 'Berlaku', '5', '', 5, 1),
(11, 6, 6, 3, '6', 2020, 'Berlaku', '6', '', 6, 0),
(12, 7, 6, 3, '7', 2007, 'Berlaku', '7', '', 7, 1),
(13, 8, 6, 3, '8', 2008, 'Berlaku', '8', '', 8, 1),
(14, 9, 6, 3, '9', 2009, 'Berlaku', '9', '', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tentang`
--

CREATE TABLE `tb_tentang` (
  `id_tentang` int(11) NOT NULL,
  `nama_tentang` varchar(512) NOT NULL,
  `id_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tentang`
--

INSERT INTO `tb_tentang` (`id_tentang`, `nama_tentang`, `id_unit`) VALUES
(3, 'awodkoakwdgasdkjasdas dasdawd', 5),
(13, 'PELAKSANAAN PENGUMUMAN RENCANA UMUM PENGADAAN MELALUI APLIKASI SISTEM INFORMASI RENCANA UMUM PENGADAAN (SIRUP) SEBELUM ANGGARAN ', 1),
(15, 'PERATURAN KPU NOMOR 17 TAHUN 2020, BN RI NOMOR 1181 PERATURAN KOMISI PEMILIHAN UMUM NOMOR 17 TAHUN 2020 TENTANG PERUBAHAN KEDUA ', 1),
(16, 'PERATURAN KPU NOMOR 17 TAHUN 2020, BN RI NOMOR 1181\nPERATURAN KOMISI PEMILIHAN UMUM NOMOR 17 TAHUN 2020 TENTANG PERUBAHAN KEDUA ATAS\nPERATURAN KOMISI PEMILIHAN UMUM NOMOR 2 TAHUN 2017 TENTANG PEMUTAKHIRAN DATA\nDAN PENYUSUNAN DAFTAR PEMILIH DALAM PEMILIHAN GUBERNUR DAN WAKIL GUBERNUR, BUPATI\nDAN WAKIL BUPATI, DAN/ATAU WALIKOTA DAN WAKIL WALIKOTA.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE `tb_unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`id_unit`, `nama_unit`) VALUES
(1, 'Universitas Pendidikan Ganesha'),
(2, 'Fakultas Teknik dan Kejuruan'),
(3, 'Fakultas Bahasa dan Seni'),
(4, 'Fakultas Matematika dan Ilmu Pengetahuan Alam'),
(5, 'Fakultas Olahraga dan Kesehatan'),
(6, 'Fakultas Ilmu Pendidikan'),
(7, 'Fakultas Kedokteran'),
(8, 'Fakultas Hukum dan Ilmu Sosial'),
(9, 'Fakultas Ekonomi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `id_unit`, `is_active`, `date_created`) VALUES
(4, 'putu modi', 'putumodi@gmail.com', 'Logo_Undiksha.png', '$2y$10$0UvBNzBycztWZWpP/LxRXOcerSL9fijpSP6iVrMg9zkyZg4TSlRdm', 2, 5, 1, 1595435152),
(5, 'modi', 'modi@gmail.com', 'logo.png', '$2y$10$0UvBNzBycztWZWpP/LxRXOcerSL9fijpSP6iVrMg9zkyZg4TSlRdm', 2, 6, 1, 1596118041),
(18, 'Putu Modi Julianto', 'putumodi25@gmail.com', 'Leo_Sign_Compatibility__Whats_the_Perfect_Leo_Love_Match_-_Astrology_Bay.jpeg', '$2y$10$0UvBNzBycztWZWpP/LxRXOcerSL9fijpSP6iVrMg9zkyZg4TSlRdm', 1, 1, 1, 1592921943);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jenis_produk`
--
ALTER TABLE `tb_jenis_produk`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_tentang`
--
ALTER TABLE `tb_tentang`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indexes for table `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jenis_produk`
--
ALTER TABLE `tb_jenis_produk`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_tentang`
--
ALTER TABLE `tb_tentang`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_unit`
--
ALTER TABLE `tb_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
