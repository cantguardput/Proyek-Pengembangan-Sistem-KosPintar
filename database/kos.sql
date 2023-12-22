-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 03:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Hidayatul Muhajir', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `data_game`
--

CREATE TABLE `data_game` (
  `id_game` int(11) NOT NULL,
  `nama_game` varchar(30) NOT NULL,
  `id_ps` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_game`
--

INSERT INTO `data_game` (`id_game`, `nama_game`, `id_ps`) VALUES
(1, '1', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_ps` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `setatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_ps`, `kode_barang`, `nama_barang`, `jenis_barang`, `stok_barang`, `deskripsi`, `setatus`) VALUES
(13, 'ROOM1', 'Kamar Biasa 1', '', 0, '', 'Ready'),
(14, 'ROOM2', 'Kamar Biasa 2', '', 1, '', 'Ready'),
(15, 'ROOM3', 'Kamar Biasa 3', '', 1, '', 'Ready'),
(16, 'ROOM4', 'Kamar Biasa 4', '', 1, '', 'Ready'),
(17, 'ROOM5', 'Kamar Biasa 5', '', 1, '', 'Ready'),
(18, 'ROOM6', 'Kamar Menengah 1', '', 1, '', 'Ready'),
(19, 'ROOM7', 'Kamar Menengah 2', '', 1, '', 'Ready'),
(20, 'ROOM8', 'Kamar Menengah 3', '', 1, '', 'Ready'),
(21, 'ROOM9', 'Kamar Menengah 4', '', 1, '', 'Ready'),
(22, 'ROOM10', 'Kamar Menengah 5', '', 1, '', 'Ready'),
(23, 'ROOM11', 'Kamar Menengah 6', '', 1, '', 'Ready'),
(24, 'ROOM12', 'Kamar Mewah', '', 1, '', 'Ready');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sewa`
--

CREATE TABLE `tb_sewa` (
  `id_sewa` int(11) NOT NULL,
  `kd_sewa` varchar(20) NOT NULL,
  `id_ps` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `waktu_sewa` varchar(20) NOT NULL,
  `sewa_akhir` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `nama_pelanggan` varchar(30) NOT NULL,
  `estimasi` varchar(20) NOT NULL,
  `perjanjian` varchar(10) NOT NULL DEFAULT 'Pending',
  `waktu_klaim` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sewa`
--

INSERT INTO `tb_sewa` (`id_sewa`, `kd_sewa`, `id_ps`, `id_user`, `id_game`, `tgl_sewa`, `tgl_kembali`, `waktu_sewa`, `sewa_akhir`, `status`, `nama_pelanggan`, `estimasi`, `perjanjian`, `waktu_klaim`) VALUES
(33, 'casde', 12, 4, 1, '2022-12-09', '0000-00-00', '12:00', '', 'Sukses', '', '2', 'YA', ''),
(34, 'gejbp', 12, 4, 2, '2022-12-23', '0000-00-00', '12:00', '', 'Sukses', '', '1', 'YA', ''),
(35, '4huad', 12, 4, 1, '2022-12-24', '0000-00-00', '12:00', '', 'Sukses', '', '2', 'YA', ''),
(36, 'ubOhB', 12, 4, 2, '2022-12-10', '0000-00-00', '12:00', '', 'Sukses', '', '1', 'YA', ''),
(37, 'QdUf4', 12, 4, 2, '2022-12-22', '0000-00-00', '12:00', '09:57:47', 'Sukses', '', '3', 'YA', ''),
(38, '3e1ws', 12, 4, 2, '2022-12-10', '0000-00-00', '23:09', '02:15:35', 'Sukses', '', '2', 'YA', ''),
(39, 'dfeop', 12, 4, 3, '2022-12-09', '0000-00-00', '21:30', '02:21:54', 'Sukses', '', '1', 'YA', ''),
(40, 'S2un5', 0, 4, 1, '2022-12-09', '0000-00-00', '21:35', '', 'Pending', '', '1', 'YA', ''),
(41, 'SeWhf', 12, 4, 3, '2022-12-10', '0000-00-00', '21:35', '05:46:49', 'Sukses', '', '3', 'YA', ''),
(42, 'd2gFj', 12, 4, 3, '2022-12-23', '0000-00-00', '08:36', '05:49:10', 'Sukses', '', '3', 'YA', ''),
(43, 'b537d', 2, 4, 2, '2022-12-09', '0000-00-00', '23:50', '11:50:45', 'Sukses', '', '3', 'YA', ''),
(44, 'gqCnl', 2, 4, 2, '2022-12-10', '0000-00-00', '02:30', '04:30:00', 'Pending', '', '1', 'YA', ''),
(45, 'nDefj', 12, 4, 2, '2022-12-10', '0000-00-00', '01:50', '02:50:00', 'Pending', '', '1 hours', 'YA', ''),
(46, 'Yi4XR', 2, 4, 1, '2022-12-10', '0000-00-00', '01:00', '02:00:00', 'Pending', '', ' hours', 'YA', ''),
(47, 'FEaie', 12, 4, 1, '2022-12-09', '0000-00-00', '01:04', '02:04:00', 'Disewakan', '', 's', 'YA', ''),
(48, '8lduA', 2, 4, 2, '2022-12-10', '0000-00-00', '01:05', '02:05:00', 'Sukses', '', ' hours', 'YA', '09:03:44'),
(49, 'kMiSC', 12, 19, 1, '2022-12-10', '0000-00-00', '09:06', '10:06:00', 'Pending', '', ' hours', 'YA', ''),
(50, '', 0, 0, 0, '0000-00-00', '0000-00-00', '', '10:18:00', 'Pending', '', '', 'Pending', ''),
(51, '8uCdZ', 12, 19, 2, '2022-12-10', '0000-00-00', '09:18', '', 'Pending', '', '1', 'YA', ''),
(52, 'YwQhc', 2, 19, 1, '2022-12-10', '0000-00-00', '09:21', '', 'Pending', '', '1', 'YA', ''),
(53, 'kNSgH', 2, 19, 1, '2022-12-10', '0000-00-00', '09:21', '10:21:00', 'Sukses', '', '1', 'YA', '04:27:30'),
(54, '9bFIi', 12, 19, 1, '2022-12-10', '0000-00-00', '09:26', '10:26:00', 'Pending', '', '1', 'YA', ''),
(55, 'ja7u2', 2, 19, 1, '2022-12-10', '0000-00-00', '09:26', '11:26:00', 'Pending', '', '2', 'YA', ''),
(56, 'i9Ief', 12, 19, 2, '2022-12-10', '0000-00-00', '09:27', '12:27:00', 'Pending', '', '3', 'YA', ''),
(57, 'Av3Bf', 12, 19, 3, '2022-12-10', '0000-00-00', '09:27', '13:27:00', 'Pending', '', '4', 'YA', ''),
(58, '7f8va', 2, 19, 4, '2022-12-10', '0000-00-00', '09:27', '15:27:00', 'Pending', '', '6', 'YA', ''),
(59, 'b83Hu', 2, 19, 2, '2022-12-10', '0000-00-00', '09:28', '21:28:00', 'Dibatalkan', '', '12', 'YA', ''),
(60, 'hH7NA', 2, 18, 5, '2023-12-10', '0000-00-00', '09:00', '11:00:00', 'Disewakan', '', '2', 'YA', ''),
(61, 'qJHh1', 12, 18, 1, '2023-12-10', '0000-00-00', '22:00', '02:00:00', 'Pending', '', '4', 'YA', ''),
(105, 'wudyE', 13, 20, 1, '2023-12-12', '0000-00-00', '00:00', '2024-01-12 00:00:00', 'Pending', '', '1', 'YA', ''),
(106, '3Aisn', 13, 20, 0, '2023-12-12', '0000-00-00', '00:00', '2024-01-12 00:00:00', 'Pending', '', '1', 'YA', ''),
(107, 'CmUMJ', 13, 20, 1, '2023-12-12', '0000-00-00', '09:09', '2024-01-12 09:09:00', 'Disewakan', '', '1', 'YA', ''),
(108, 'BkL9d', 14, 25, 1, '2023-12-12', '0000-00-00', '09:00', '2024-03-12 09:00:00', 'Pending', '', '3', 'YA', ''),
(109, 'cu45l', 24, 26, 1, '2023-12-12', '0000-00-00', '09:00', '2024-03-12 09:00:00', 'Sukses', '', '3', 'YA', '03:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `kd_user` varchar(20) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username_user` varchar(30) NOT NULL,
  `password_user` varchar(30) NOT NULL,
  `no_telp_user` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `kd_user`, `nama_user`, `username_user`, `password_user`, `no_telp_user`, `alamat`, `level`) VALUES
(16, '', 'Hidayatul Muhajir', 'admin', 'admin', '082121554432', 'Jl Babakan Tengah ', 1),
(20, 'USR003', 'Ahmad Malik Baehaqi', 'malik', 'malik', '081212121212', 'Kp. Sidomukti Tanjungpinang', 2),
(21, 'USR004', 'Prasdiantama', 'prasdiantama', 'prasdiantama', '081212121211', 'Jl. Dompak Tanjungpinang', 2),
(22, 'USR005', 'Putu Ardika Wijaya', 'putu', 'putu', '81212121219', 'Jl. Hangtuah 4 Tanjungpinang', 2),
(23, 'USR006', 'Akmal Zeilani', 'akmal', 'akmal', '081212121233', 'Jl. Merdeka Tanjungpinang', 2),
(24, 'USR007', 'Nanda Alif Bakri', 'nanda', 'nanda', '081212121244', 'Jl. Ganet Tanjungpinang', 2),
(25, 'USR008', 'Mamat', 'udin', 'udin', '081212122121', 'Jl. Merdeka', 2),
(26, 'USR009', 'Ahmad Kasim', 'ahmad', 'ahmad', '81212121210', 'Jl. Merdeka', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_game`
--
ALTER TABLE `data_game`
  ADD PRIMARY KEY (`id_game`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_ps`);

--
-- Indexes for table `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_game`
--
ALTER TABLE `data_game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_ps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_sewa`
--
ALTER TABLE `tb_sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
