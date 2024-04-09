-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2024 at 01:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3lte`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_bank`
--

CREATE TABLE `master_bank` (
  `bank_id` int(11) NOT NULL,
  `bank_nama` varchar(255) NOT NULL,
  `bank_rekening` varchar(255) NOT NULL,
  `bank_atas_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_bank`
--

INSERT INTO `master_bank` (`bank_id`, `bank_nama`, `bank_rekening`, `bank_atas_nama`) VALUES
(1, 'BRI', '123123123123', 'Update'),
(2, 'BNI', '123412341234', 'Test Atas Nama BNI');

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE `master_barang` (
  `barang_id` int(11) NOT NULL,
  `barang_nama` varchar(255) NOT NULL,
  `barang_harga` decimal(10,0) NOT NULL,
  `barang_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_barang`
--

INSERT INTO `master_barang` (`barang_id`, `barang_nama`, `barang_harga`, `barang_keterangan`) VALUES
(1, 'Oxva Xlim PRO', '220000', 'The OXVA XLIM Pro Kit is a Pro edition of the XLIM series product equipped with a 1000mAh bigger battery &  Top Fill Cartridge!  More power with fast charge, updated cartridge with direct top fill, new RGB light to enlighten your passion, and new cartridges!  Compatible with the upgraded Anti-leak Top-fill V3 cartridge & V2 cartridge.'),
(2, 'Liquid Foom series', '150000', 'Experience our newly developed e-liquid, made with perfection in our minds and sincerity in our hearts. Foom Liquid will satisfy your nicotine cravings without all that bad after-taste in your mouth and leave no odor in your clothes. Find your favourite flavors:'),
(3, 'Caliburn Series', '250000', 'Founded in 2015, Shenzhen UWELL Technology Co., Ltd. has been developing in the Electronic Vaping Industry. Starting from E-cigarette device production, UWELL has built an ecological closed-loop chain of R&D, production, brand communication, and service. In 2018, UWELL was awarded the title of NATIONAL HIGH-TECH ENTERPRISE and grew into a scientific and technological company.');

-- --------------------------------------------------------

--
-- Table structure for table `master_barang_foto`
--

CREATE TABLE `master_barang_foto` (
  `barang_foto_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `barang_foto_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_barang_foto`
--

INSERT INTO `master_barang_foto` (`barang_foto_id`, `barang_id`, `barang_foto_file`) VALUES
(1, 1, 'oxva31.jpg'),
(2, 1, 'oxva21.jpg'),
(3, 1, 'oxva11.jpg'),
(4, 2, 'liq-foom3.jpg'),
(5, 2, 'liq-foom2.jpg'),
(6, 3, 'caliburn3.jpg'),
(7, 3, 'caliburn2.jpg'),
(8, 3, 'caliburn1.jpg'),
(9, 3, 'caliburn.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `master_ekspedisi`
--

CREATE TABLE `master_ekspedisi` (
  `ekspedisi_id` int(11) NOT NULL,
  `ekspedisi_nama` varchar(255) NOT NULL,
  `ekspedisi_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_ekspedisi`
--

INSERT INTO `master_ekspedisi` (`ekspedisi_id`, `ekspedisi_nama`, `ekspedisi_link`) VALUES
(1, 'JNT', 'https://jnt.com'),
(2, 'JNE', 'https://jne.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_nama_lengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`user_id`, `user_username`, `user_password`, `user_nama_lengkap`) VALUES
(1, 'admin', '$2y$10$bG3S0KGTsOEIdaZRb55LE.yKBe8cUVghJEKewlbAlmTi27eY0vdG.', 'Administrator'),
(2, 'danu', '$2y$10$IdEL5Jfw3J3Uum7aFLygZuBI4e.rjLXHZCjc9JmTJwCzxrGuUYVoK', 'Julyan Danu Cahya'),
(4, 'user', '$2y$10$p749USzrE0bjadcjZYFREOQyQwi42S3ugV9OHG.YyH3B6dJ0bNkSO', 'Test Nama Lengkap'),
(7, 'users', '$2y$10$jIp3UaoOUEzOuFO8RsK9CusDXc1cbWn.TJFvXIE0uPLyu9noCv41C', 'Test Nama Lengkap');

-- --------------------------------------------------------

--
-- Table structure for table `proses_keranjang`
--

CREATE TABLE `proses_keranjang` (
  `keranjang_id` int(11) NOT NULL,
  `pembayaran_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `keranjang_jumlah` decimal(10,0) NOT NULL,
  `keranjang_harga` decimal(10,0) NOT NULL,
  `keranjang_total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proses_keranjang`
--

INSERT INTO `proses_keranjang` (`keranjang_id`, `pembayaran_id`, `barang_id`, `keranjang_jumlah`, `keranjang_harga`, `keranjang_total`) VALUES
(1, 1, 1, '1', '120000', '120000');

-- --------------------------------------------------------

--
-- Table structure for table `proses_pembayaran`
--

CREATE TABLE `proses_pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `pembayaran_waktu` datetime NOT NULL,
  `pembayaran_nama_pemesan` varchar(255) NOT NULL,
  `pembayaran_no_wa` varchar(255) NOT NULL,
  `pembayaran_alamat` varchar(255) NOT NULL,
  `pembayaran_total` decimal(10,0) NOT NULL,
  `pembayaran_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proses_pembayaran`
--

INSERT INTO `proses_pembayaran` (`pembayaran_id`, `pembayaran_waktu`, `pembayaran_nama_pemesan`, `pembayaran_no_wa`, `pembayaran_alamat`, `pembayaran_total`, `pembayaran_status`) VALUES
(1, '2024-04-05 17:24:37', 'Danu', '085123123', 'Wonogiri', '120000', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_bank`
--
ALTER TABLE `master_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `master_barang_foto`
--
ALTER TABLE `master_barang_foto`
  ADD PRIMARY KEY (`barang_foto_id`);

--
-- Indexes for table `master_ekspedisi`
--
ALTER TABLE `master_ekspedisi`
  ADD PRIMARY KEY (`ekspedisi_id`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `proses_keranjang`
--
ALTER TABLE `proses_keranjang`
  ADD PRIMARY KEY (`keranjang_id`);

--
-- Indexes for table `proses_pembayaran`
--
ALTER TABLE `proses_pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_bank`
--
ALTER TABLE `master_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_barang`
--
ALTER TABLE `master_barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_barang_foto`
--
ALTER TABLE `master_barang_foto`
  MODIFY `barang_foto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `master_ekspedisi`
--
ALTER TABLE `master_ekspedisi`
  MODIFY `ekspedisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `proses_keranjang`
--
ALTER TABLE `proses_keranjang`
  MODIFY `keranjang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proses_pembayaran`
--
ALTER TABLE `proses_pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
