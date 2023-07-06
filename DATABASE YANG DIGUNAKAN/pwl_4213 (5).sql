-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 06:19 AM
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
  `foto` varchar(225) DEFAULT NULL,
  `diskon` int(11) NOT NULL,
  `hargaDiskon` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brg`
--

INSERT INTO `brg` (`id`, `nama`, `harga`, `jumlah`, `keterangan`, `foto`, `diskon`, `hargaDiskon`) VALUES
(1, 'Air Jordan 1 Retro High OG Lost and Found', 4000000, 3, 'Authentic. Guaranteed.', '1688382497_318903d394c59354ad45.png', 20, 3200000),
(2, 'Nike Blazer Mid 77 Vintage White Black 2021', 1250000, 2, 'Authentic. Guaranteed.', '1688382648_ce70986f9b9cbd11e0c4.png', 0, 0),
(3, 'Louis Vuitton LV Archlight Sneaker ', 20150000, 1, 'Authentic. Guaranteed.', '1688382871_e58dda3d36823feafdba.png', 0, 0),
(4, 'Nike Dunk High Ambush Active Fuchsia', 3450000, 2, 'Authentic. Guaranteed.', '1688383154_d5e5c3c0e545a383caa3.png', 0, 0),
(5, 'Air Jordan 1 Low Fragment x Travis Scott', 18000000, 1, 'Authentic. Guaranteed.', '1688383205_c4043cfed31170c3aead.png', 0, 0),
(6, 'Jordan 4 Retro Thunder 2023', 3450000, 5, 'Authentic. Guaranteed.', '1688383257_0d49659749b9ae7fff4d.png', 0, 0);

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
(1, 'zhafif', 6915000, 'KAMPUNG NGABEAN ', 15000, 2, 'zhafif', '2023-07-03 11:31:16'),
(2, 'zhafif', 26709000, 'KAMPUNG NGABEAN ', 9000, 0, 'zhafif', '2023-07-03 11:39:30');

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
(1, 1, 4, 2, 0, 6900000, 'zhafif', '2023-07-03 11:31:16'),
(2, 2, 5, 1, 0, 18000000, 'zhafif', '2023-07-03 11:39:30'),
(3, 2, 1, 1, 0, 4000000, 'zhafif', '2023-07-03 11:39:30'),
(4, 2, 4, 1, 0, 3450000, 'zhafif', '2023-07-03 11:39:30'),
(5, 2, 2, 1, 0, 1250000, 'zhafif', '2023-07-03 11:39:30');

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
(6, 'aurel', 'admin', '8ef6c91b0c669894af01d616ddf16519', 'nzpstorage4@gmail.com', 0, '0'),
(7, 'user', 'user', '202cb962ac59075b964b07152d234b70', 'nzpstorage2@gmail.com', 1, '123456'),
(9, 'orang', 'user', '202cb962ac59075b964b07152d234b70', '', 0, '0'),
(12, 'aurel2', 'user', 'caf1a3dfb505ffed0d024130f58c5cfa', 'aurelwyt@gmail.com', 1, '080081'),
(13, 'usertest', 'user', '202cb962ac59075b964b07152d234b70', 'nzpstorage@gmail.com', 1, '111189'),
(15, 'testing', 'user', 'caf1a3dfb505ffed0d024130f58c5cfa', 'nzpstorage@gmail.com', 0, '675661'),
(16, 'org2', 'user', '25d55ad283aa400af464c76d713c07ad', 'nzpstorage4@gmail.com', 1, '756182'),
(17, 'user33', 'user', '25d55ad283aa400af464c76d713c07ad', 'nzpstorage3@gmail.com', 1, '432246');

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
-- AUTO_INCREMENT for table `brg`
--
ALTER TABLE `brg`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
