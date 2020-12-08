-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2020 at 02:48 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jdk_outdoor`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `Id` int(11) NOT NULL,
  `kode_produk` varchar(255) DEFAULT NULL,
  `foto_produk` text DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga_produk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`Id`, `kode_produk`, `foto_produk`, `nama_produk`, `deskripsi`, `harga_produk`) VALUES
(8, 'C11', 'carrier.jpg', 'Carier Shiuox 60L', 'Kapasitas 60L muat banyak cocok untu pendakian estimasi 3hari atau 2 hari', '30000'),
(9, 'T11', 'tenda_dome_4.jpg', 'Tenda Dome kap 4', 'Tenda Dome single layer kapsitas muat 3-4 Orang tidak disarankan menggunakan digunung diatas ketinggian 300mdpl', '40000'),
(10, 'N11', 'nesting_bundar_set.jpg', 'Paket Nesting bundar', 'kompor kecil praktis mudah dibawa kemana-mana', '15000'),
(11, 'SB11', 'sb.jpg', 'Sleeping Bag', 'selimut camp nyaman dengan bulu polar yang halus', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `Id_transaksi` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `tanggal_transaksi` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_transaksi` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `bukti_foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`Id_transaksi`, `username`, `tanggal_transaksi`, `total_transaksi`, `ket`, `bukti_foto`) VALUES
(8, 'taqin98', '2019-07-14 21:47:09', '60000', 'Selesai', 'buntu.png'),
(9, 'taqin98', '2020-12-08 01:21:27', '30000', 'Belum Melakukan Pembayaran', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penyewaan`
--

CREATE TABLE `transaksi_penyewaan` (
  `Id_transaksi_penyewaan` int(11) NOT NULL,
  `Id_transaksi` varchar(255) DEFAULT NULL,
  `kode_produk` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `hari` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `sub_total` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_penyewaan`
--

INSERT INTO `transaksi_penyewaan` (`Id_transaksi_penyewaan`, `Id_transaksi`, `kode_produk`, `jumlah`, `hari`, `nama`, `harga`, `sub_total`) VALUES
(9, '8', 'SB11', '1', 1, 'Sleeping Bag', '20000', '20000'),
(10, '8', 'T11', '1', 1, 'Tenda Dome kap 4', '40000', '40000'),
(11, '9', 'C11', '1', 1, 'Carier Shiuox 60L', '30000', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `foto_id` text DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL,
  `alm` text DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `username`, `password`, `nama`, `foto_id`, `hp`, `alm`, `level`) VALUES
(1, 'taqin98', 'taqin98', NULL, NULL, NULL, NULL, '0'),
(2, 'adot', 'adot', 'Yy', NULL, '0877655', 'Ggh', '0'),
(3, 'dimas', 'dimas', NULL, NULL, NULL, NULL, '0'),
(4, 'agus', 'agus', 'gfgfgfgfg', 'astronomy-1867616_960_720.jpg', '66565665', 'hghghghghg', '0'),
(5, 'Gg', '123', 'Ggg', NULL, 'Ggg', 'Ggg', '0'),
(6, 'admin', 'admin', 'Nurul Muttaqin', NULL, NULL, NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`Id_transaksi`);

--
-- Indexes for table `transaksi_penyewaan`
--
ALTER TABLE `transaksi_penyewaan`
  ADD PRIMARY KEY (`Id_transaksi_penyewaan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `Id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi_penyewaan`
--
ALTER TABLE `transaksi_penyewaan`
  MODIFY `Id_transaksi_penyewaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
