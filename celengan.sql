-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 07, 2021 at 04:07 PM
-- Server version: 10.3.31-MariaDB-cll-lve
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u6929295_celengan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_balance`
--

CREATE TABLE `cash_balance` (
  `ID` int(11) NOT NULL,
  `date` date NOT NULL,
  `mutation` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `category` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash_balance`
--

INSERT INTO `cash_balance` (`ID`, `date`, `mutation`, `amount`, `description`, `id_user`, `category`) VALUES
(3, '2021-09-24', 'masuk', 20000, 'Arema', 1, '8'),
(4, '2021-09-28', 'keluar', 5000, 'beli permen', 1, '2'),
(6, '2021-09-28', 'keluar', 12000, 'Lalapan ayam', 4, '11'),
(12, '2021-09-29', 'keluar', 10000, 'Tahu', 4, '11'),
(20, '2021-10-03', 'masuk', 100000, 'Dari Mas Rendy gresik', 2, '3'),
(21, '2021-10-03', 'masuk', 50000, 'Dari Bu Itik ', 2, '3'),
(22, '2021-10-03', 'masuk', 50000, 'Dari tante Elok', 2, '3'),
(23, '2021-10-03', 'masuk', 50000, 'Uang ku ', 2, '3'),
(24, '2021-10-03', 'masuk', 50000, 'Dari Mbak Nino ', 2, '3'),
(25, '2021-10-04', 'keluar', 25000, 'Beli coil', 2, '15'),
(26, '2021-10-04', 'masuk', 100000, 'Dari mama', 2, '3'),
(27, '2021-10-04', 'keluar', 3000, 'Tambah angin ban', 2, '16'),
(28, '2021-10-07', 'keluar', 14000, 'makan di waru ', 2, '6'),
(29, '2021-10-07', 'keluar', 20000, 'print ', 2, '16'),
(30, '2021-10-07', 'keluar', 6000, 'susu indormart', 2, '6'),
(31, '2021-10-07', 'keluar', 10000, 'Warung teras', 2, '6'),
(32, '2021-10-07', 'keluar', 50000, 'Bensin', 2, '13'),
(33, '2021-10-07', 'masuk', 3000, 'Uang di saku ', 2, '5');

-- --------------------------------------------------------

--
-- Table structure for table `categori`
--

CREATE TABLE `categori` (
  `id_categori` int(11) NOT NULL,
  `nama_categori` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categori`
--

INSERT INTO `categori` (`id_categori`, `nama_categori`, `id_user`) VALUES
(2, 'Makan', 1),
(3, 'Uang Masuk', 2),
(4, 'Beli pulsa / Paketan', 2),
(5, 'Saku', 2),
(6, 'Mangan', 2),
(8, 'Uang Masuk', 1),
(11, 'Makanan', 4),
(12, 'Minuman', 4),
(13, 'Beli bensin', 2),
(14, 'Uang Masuk', 4),
(15, 'Rokok / Vape', 2),
(16, 'lain lain', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `role` enum('gudang','admin') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `password`, `created_at`, `foto`, `is_active`) VALUES
(1, 'Adminisitrator', 'admin', 'admin@admin.com', '025123456789', 'admin', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1568689561, 'd5f22535b639d55be7d099a7315e1f7f.png', 1),
(2, 'Muhammad Royyan Zamzami', 'royyan', 'royyanmz87@gmail.com', '0856-4988-8272', 'gudang', '$2y$10$eZim3CSuUFJPUPXvaorGFeIDsm9dFDUP47iCwgYw2OsZROBs1XGqK', 1632469880, 'user.png', 1),
(4, 'Rulitaw', 'rulitaw', 'rulita.mirdasari@gmail.com', '089693986515', 'gudang', '$2y$10$sJy.jSgKdsjEOKVGKQFo/uiak9PBd9HhcNECGNw7hP8AzgOvmMP46', 1632835449, 'user.png', 1),
(5, 'Galang Paksi Permana', 'galangpp7', 'galangpaksipermana77@gmail.com', '083192919886', 'gudang', '$2y$10$vUBj5obiVtH2cKpnUSzrRuQhnNVVGlGJ61ZbF8nufMhh/SCaDzFP.', 1633311959, 'user.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_balance`
--
ALTER TABLE `cash_balance`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_user` (`id_user`,`category`),
  ADD KEY `id_categori` (`category`);

--
-- Indexes for table `categori`
--
ALTER TABLE `categori`
  ADD PRIMARY KEY (`id_categori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cash_balance`
--
ALTER TABLE `cash_balance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `categori`
--
ALTER TABLE `categori`
  MODIFY `id_categori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cash_balance`
--
ALTER TABLE `cash_balance`
  ADD CONSTRAINT `cash_balance_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `categori`
--
ALTER TABLE `categori`
  ADD CONSTRAINT `categori_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
