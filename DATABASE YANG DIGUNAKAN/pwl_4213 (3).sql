-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2023 at 11:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl_4213`
--

-- --------------------------------------------------------

--
-- Table structure for table `brg`
--

CREATE TABLE `brg` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` float NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `foto` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brg`
--

INSERT INTO `brg` (`id`, `nama`, `harga`, `jumlah`, `keterangan`, `foto`) VALUES
(0, 'aglonemaKhocin', 22000, 12, '-', '1686568889_d3ce39ae74f3d858efc9.jpg'),
(1, 'algonema Suksom', 40000, 77, 'bagus', 'aglonemaSuksom.jpg'),
(3, 'algonema Suksom 2', 45000, 12, 'well', 'aglonemaSuksom.jpg'),
(4, 'kkk', 12345, 11, 'r', 'icikiwir.jpg'),
(7, 'aglonemaSnowWhiteRemaja', 100000, 23, 'Bunga Keren', 'aglonemaSnowWhiteRemaja.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `total_harga` double NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ongkir` double NOT NULL,
  `status` int(1) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `username`, `total_harga`, `alamat`, `ongkir`, `status`, `created_by`, `created_date`) VALUES
(1, 'zhafif', 71000, 'KAMPUNG NGABEAN ', 9000, 0, 'zhafif', '2023-06-21 03:02:49'),
(2, 'zhafif', 81000, 'KAMPUNG NGABEAN ', 19000, 0, 'zhafif', '2023-06-22 03:49:22'),
(3, 'zhafif', 108000, 'KAMPUNG NGABEAN ', 86000, 0, 'zhafif', '2023-06-24 07:15:34'),
(4, 'usertest', 147690, 'KAMPUNG NGABEAN ', 83000, 0, 'usertest', '2023-06-24 07:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `diskon` double NOT NULL,
  `subtotal_harga` double NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `id_transaksi`, `id_barang`, `jumlah`, `diskon`, `subtotal_harga`, `created_by`, `created_date`) VALUES
(1, 1, 0, 1, 0, 22000, 'zhafif', '2023-06-21 03:02:49'),
(2, 1, 1, 1, 0, 40000, 'zhafif', '2023-06-21 03:02:49'),
(3, 2, 0, 1, 0, 22000, 'zhafif', '2023-06-22 03:49:22'),
(4, 2, 1, 1, 0, 40000, 'zhafif', '2023-06-22 03:49:22'),
(5, 3, 0, 1, 0, 22000, 'zhafif', '2023-06-24 07:15:34'),
(6, 4, 1, 1, 0, 40000, 'usertest', '2023-06-24 07:49:04'),
(7, 4, 4, 2, 0, 24690, 'usertest', '2023-06-24 07:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `role` varchar(25) NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `vcode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `role`, `password`, `email`, `isActive`, `vcode`) VALUES
(1, 'zhafif', 'admin', '202cb962ac59075b964b07152d234b70', 'naufalarya0@gmail.com', 1, '0'),
(2, 'naufal', 'user', 'caf1a3dfb505ffed0d024130f58c5cfa', '', 1, '0'),
(3, 'user2', 'user', '202cb962ac59075b964b07152d234b70', '', 0, '0'),
(4, 'user4', 'user', '202cb962ac59075b964b07152d234b70', '', 0, '0'),
(6, 'aurel', 'admin', '8ef6c91b0c669894af01d616ddf16519', '', 1, '0'),
(7, 'user', 'user', '202cb962ac59075b964b07152d234b70', 'nzpstorage2@gmail.com', 1, '123456'),
(9, 'orang', 'user', '202cb962ac59075b964b07152d234b70', '', 0, '0'),
(12, 'aurel2', 'user', 'caf1a3dfb505ffed0d024130f58c5cfa', 'aurelwyt@gmail.com', 1, '080081'),
(13, 'usertest', 'user', '202cb962ac59075b964b07152d234b70', 'nzpstorage@gmail.com', 1, '111189'),
(15, 'testing', 'user', 'caf1a3dfb505ffed0d024130f58c5cfa', 'nzpstorage@gmail.com', 0, '675661');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brg`
--
ALTER TABLE `brg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
