-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 08:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailpesanan`
--

CREATE TABLE `detailpesanan` (
  `id_detailpesanan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailpesanan`
--

INSERT INTO `detailpesanan` (`id_detailpesanan`, `jumlah`, `id_produk`, `id_pesanan`) VALUES
(1, 2, 2, 1),
(2, 3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `tanggal_pesanan`, `id_user`) VALUES
(1, '2023-12-27', 1),
(2, '2023-12-27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `harga`, `gambar`, `stok`) VALUES
(1, 'Paracetamol', 'Obat pereda demam dan nyeri ringan', 5000, 'paracetamol.png', 97),
(2, 'Amoxicillin', 'Antibiotik untuk infeksi bakteri', 10000, 'amoxicillin.png', 48),
(3, 'Omeprazole', 'Obat untuk masalah lambung', 8000, 'omeprazole.png', 75),
(4, 'Cetirizine', 'Obat antihistamin untuk alergi', 6000, 'cetirizine.png', 80),
(5, 'Ibuprofen', 'Obat pereda nyeri dan peradangan', 7000, 'ibuprofen.png', 90),
(6, 'Aspirin', 'Obat pereda nyeri dan pengencer darah', 6000, 'aspirin.png', 85),
(7, 'Ranitidine', 'Obat untuk masalah lambung', 8500, 'ranitidine.png', 60),
(8, 'Dexamethasone', 'Obat antiinflamasi dan imunosupresan', 12000, 'dexamethasone.png', 40),
(9, 'Loperamide', 'Obat antidiare', 7500, 'loperamide.png', 70),
(10, 'Metformin', 'Obat untuk diabetes', 11000, 'metformin.png', 55),
(11, 'Simvastatin', 'Obat untuk menurunkan kolesterol', 13000, 'simvastatin.png', 65),
(12, 'Amlodipine', 'Obat untuk tekanan darah tinggi', 9000, 'amlodipine.png', 80),
(13, 'Cefixime', 'Antibiotik untuk infeksi bakteri', 9500, 'cefixime.png', 45),
(14, 'Lisinopril', 'Obat untuk tekanan darah tinggi', 10000, 'lisinopril.png', 70),
(15, 'Atorvastatin', 'Obat untuk menurunkan kolesterol', 12000, 'atorvastatin.png', 60),
(16, 'Hydrochlorothiazide', 'Obat diuretik', 8500, 'hydrochlorothiazide.png', 75),
(17, 'Metoprolol', 'Obat untuk tekanan darah tinggi', 11000, 'metoprolol.png', 55),
(18, 'Clopidogrel', 'Obat antiplatelet', 13000, 'clopidogrel.png', 50),
(19, 'Enalapril', 'Obat untuk tekanan darah tinggi', 9500, 'enalapril.png', 65),
(20, 'Gabapentin', 'Obat antikonvulsan dan analgesik', 12000, 'gabapentin.png', 40);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `role`, `username`, `password`) VALUES
(1, 'Admin', 'admin1', 'admin123'),
(2, 'Customer', 'andre', 'd66102f1e1727c238782b536ac6e68df41374ed2989a7fd669bf2bb4269765ff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  ADD PRIMARY KEY (`id_detailpesanan`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  MODIFY `id_detailpesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  ADD CONSTRAINT `id_pesanan` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
