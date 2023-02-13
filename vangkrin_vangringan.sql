-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 13, 2023 at 09:25 AM
-- Server version: 10.3.37-MariaDB-log-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vangkrin_vangringan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` char(10) DEFAULT NULL,
  `id_produk` char(10) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `totalhargaitem` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `id_produk`, `jumlah`, `totalhargaitem`) VALUES
('TRS0000003', 'PDK0000001', 1, 2000),
('TRS0000004', 'PDK0000004', 1, 1500),
('TRS0000005', 'PDK0000001', 1, 2000),
('TRS0000005', 'PDK0000004', 1, 1500),
('TRS0000006', 'PDK0000010', 1, 25000),
('TRS0000007', 'PDK0000010', 1, 25000),
('TRS0000008', 'PDK0000004', 1, 1500),
('TRS0000009', 'PDK0000004', 1, 1500),
('TRS0000010', 'PDK0000007', 1, 2000),
('TRS0000011', 'PDK0000002', 1, 6000),
('TRS0000011', 'PDK0000006', 1, 2500),
('TRS0000011', 'PDK0000009', 1, 2000),
('TRS0000012', 'PDK0000009', 2, 4000),
('TRS0000013', 'PDK0000007', 1, 2000),
('TRS0000014', 'PDK0000001', 1, 2000),
('TRS0000015', 'PDK0000010', 2, 50000),
('TRS0000016', 'PDK0000010', 2, 50000),
('TRS0000017', 'PDK0000010', 3, 75000),
('TRS0000018', 'PDK0000001', 4, 8000),
('TRS0000019', 'PDK0000002', 2, 12000),
('TRS0000019', 'PDK0000007', 2, 4000),
('TRS0000019', 'PDK0000008', 1, 3000),
('TRS0000019', 'PDK0000003', 1, 4000),
('TRS0000019', 'PDK0000010', 3, 75000),
('TRS0000020', 'PDK0000002', 3, 18000),
('TRS0000021', 'PDK0000014', 1, 8000),
('TRS0000022', 'PDK0000005', 2, 2000),
('TRS0000023', 'PDK0000004', 10, 15000),
('TRS0000024', 'PDK0000002', 2, 12000),
('TRS0000024', 'PDK0000007', 2, 4000),
('TRS0000024', 'PDK0000008', 1, 3000),
('TRS0000024', 'PDK0000003', 1, 4000),
('TRS0000024', 'PDK0000010', 3, 75000),
('TRS0000025', 'PDK0000002', 2, 12000),
('TRS0000026', 'PDK0000016', 2, 6000),
('TRS0000027', 'PDK0000002', 2, 12000),
('TRS0000027', 'PDK0000007', 2, 4000),
('TRS0000027', 'PDK0000008', 1, 3000),
('TRS0000027', 'PDK0000003', 1, 4000),
('TRS0000027', 'PDK0000010', 3, 75000),
('TRS0000027', 'PDK0000016', 2, 6000);

--
-- Triggers `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `detail_transaksi` FOR EACH ROW UPDATE produk  
SET 
  stok = stok-NEW.jumlah
WHERE 
  id_produk = NEW.id_produk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_transaksi` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_produk` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `totalhargaitem` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_transaksi`, `username`, `id_produk`, `jumlah`, `totalhargaitem`) VALUES
(NULL, 'edzam', 'PDK0000002', 3, 18000),
(NULL, 'edzam', 'PDK0000007', 2, 4000),
(NULL, 'ahmad', 'PDK0000001', 1, 2000),
(NULL, 'ahmad', 'PDK0000005', 11, 11000),
(NULL, 'admin', 'PDK0000010', 3, 75000),
(NULL, 'admin', 'PDK0000003', 2, 8000),
(NULL, 'maulanaaf2', 'PDK0000002', 2, 12000),
(NULL, 'maulanaaf2', 'PDK0000007', 2, 4000),
(NULL, 'afizi', 'PDK0000002', 2, 12000),
(NULL, 'afizi', 'PDK0000007', 2, 4000),
(NULL, 'afizi', 'PDK0000008', 1, 3000),
(NULL, 'afizi', 'PDK0000003', 1, 4000),
(NULL, 'afizi', 'PDK0000010', 3, 75000),
(NULL, 'afizi', 'PDK0000016', 2, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `kupon`
--

CREATE TABLE `kupon` (
  `username` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `idkupon` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_kupon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nilai` int(10) NOT NULL,
  `minimal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kupon`
--

INSERT INTO `kupon` (`username`, `idkupon`, `nama_kupon`, `nilai`, `minimal`) VALUES
('ahmad', 'KOA00000000000000002', 'Kupon Gratis Ongkir A', 4000, 50000),
('admin', 'KOA00000000000000004', 'Kupon Gratis Ongkir A', 4000, 50000),
('afizi', 'KOA00000000000000015', 'Kupon Gratis Ongkir A', 4000, 50000),
('admin', 'KOB00000000000000003', 'Kupon Gratis Ongkir B', 3000, 30000),
('ahmad', 'KOB00000000000000012', 'Kupon Gratis Ongkir B', 3000, 30000),
('afizi', 'KOB00000000000000014', 'Kupon Gratis Ongkir B', 3000, 30000),
('admin', 'KOC00000000000000001', 'Kupon Gratis Ongkir C', 2000, 20000),
('maulanaaf2', 'KOC00000000000000008', 'Kupon Gratis Ongkir C', 2000, 20000),
('ahmad', 'KOC00000000000000009', 'Kupon Gratis Ongkir C', 2000, 20000),
('ahmad', 'KOC00000000000000010', 'Kupon Gratis Ongkir C', 2000, 20000),
('ahmad', 'KOC00000000000000011', 'Kupon Gratis Ongkir C', 2000, 20000),
('afizi', 'KOC00000000000000013', 'Kupon Gratis Ongkir C', 2000, 20000),
('admin', 'KSB00000000000000005', 'Kupon Cashback B', 4000, 50000),
('admin', 'KSB00000000000000006', 'Kupon Cashback B', 4000, 50000),
('afizi', 'KSB00000000000000017', 'Kupon Cashback B', 4000, 50000),
('admin', 'KSC00000000000000007', 'Kupon Cashback C', 2000, 30000),
('afizi', 'KSC00000000000000016', 'Kupon Cashback C', 2000, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` char(10) NOT NULL,
  `nama_produk` varchar(40) NOT NULL,
  `deskripsi_produk` text DEFAULT NULL,
  `harga` int(15) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `kategori` varchar(30) NOT NULL,
  `gambar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `harga`, `stok`, `kategori`, `gambar`) VALUES
('PDK0000001', 'Nasi Putih', '1 porsi nasi putih hangat', 2000, 8, 'makanan', 'nasi.jpg'),
('PDK0000002', 'Nasi Rames', 'Nasi putih dengan berbagai macam lauk', 6000, 5, 'makanan', 'nasi-remes.jpeg'),
('PDK0000003', 'Nasi Pecel', 'Nasi putih dengan saus kacang dan berbagai macam lauk pendamping', 4000, 9, 'makanan', 'pecel.jpeg'),
('PDK0000004', 'Tempe Bacem', 'Tempe goreng dengan bumbu gula merah yang manis dan gurih', 1500, 0, 'cemilan', 'tempe1.jpeg'),
('PDK0000005', 'Sate Usus', 'Sate yang terbuat dari usus ayam', 1000, 8, 'cemilan', 'sate-usus.jpg'),
('PDK0000006', 'Teh Hangat', 'Segelas Teh Hangat yang manis dan menyegarkan', 3000, 8, 'minumanpanas', 'teh-hangat.jpg'),
('PDK0000007', 'Jeruk Hangat', 'Segelas Jeruk manis yang dapat menghangatkan tubuh', 2000, 13, 'minumanpanas', 'jeruk-hangat.jpg'),
('PDK0000008', 'Es Teh', 'Teh Dingin dengan rasa manis menyegarkan', 3000, 7, 'minumandingin', 'es-teh.jpeg'),
('PDK0000009', 'Sosis', 'Sosis adalah produk makanan yang diperoleh dari campuran daging halus dan tepung atau pati dengan penambahan bumbu, bahan tambahan makanan.', 2000, 12, 'cemilan', 'sosisbakar.jpg'),
('PDK0000010', 'Paket Promo Tahun Baru', 'nikmati promo tahun baru dengan makanan yang siap disajikan untuk keluarga', 25000, 0, 'promo', 'WhatsApp Image 2023-01-05 at 11.17.19.jpeg'),
('PDK0000011', 'Paket Berbuka Hemat', 'Nikmati berbuka ramadhan dengan makanan lezat dan nikmat', 25000, 23, 'promo', 'WhatsApp Image 2023-01-05 at 11.17.32.jpeg'),
('PDK0000012', 'Paket Akhir Tahun', 'Nikmati makanan paket dengan menu yang enak dan lezat', 30000, 31, 'promo', 'WhatsApp Image 2023-01-05 at 11.17.24.jpeg'),
('PDK0000013', 'Nasi Goreng', 'Nikmati nasi goreng khas kediri dengan rasa yang enak dan lezat', 10000, 9, 'makanan', 'nasi-goreng.jpg'),
('PDK0000014', 'Nasi Kuning', 'Nikmati nasi kuning dengan rasa khas yang unik dan lezat', 8000, 9, 'makanan', 'nasi kuning.jpg'),
('PDK0000015', 'Nugget', 'nikmati kelezatan makanan ini dengan rasa yang enak dan fresh', 3000, 10, 'frozenfood', 'nugget.jpg'),
('PDK0000016', 'Usus rebus', 'Usus bakar dengan saus kacang', 3000, 36, 'cemilan', 'nasi padang.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` char(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `subtotal` bigint(15) DEFAULT NULL,
  `pengiriman` varchar(150) DEFAULT NULL,
  `metode` varchar(100) DEFAULT NULL,
  `status` enum('0','1','2','3') DEFAULT NULL,
  `catatanpbl` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tanggal_transaksi` date NOT NULL DEFAULT current_timestamp(),
  `gambarbukti` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `username`, `subtotal`, `pengiriman`, `metode`, `status`, `catatanpbl`, `catatan`, `tanggal_transaksi`, `gambarbukti`) VALUES
('TRS0000003', 'ahmad', 10000, 'Antar ke JL KH Wakid Hasim, Tanjunganom, Nganjuk', 'Tunai', '2', '', NULL, '2023-02-01', 'https://workshopjti.com/v-angkringan/vangkringanmobile/gambarbukti/gambar61.jpg'),
('TRS0000004', 'edzam', 9500, 'Antar ke Candirejo', 'Tunai', '2', '', NULL, '2023-02-01', NULL),
('TRS0000005', 'edzam', 11500, 'Antar ke Lamongan', 'Tunai', '2', '', NULL, '2023-02-01', 'https://workshopjti.com/v-angkringan/vangkringanmobile/gambarbukti/gambar55.jpg'),
('TRS0000006', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-01', NULL),
('TRS0000007', 'admin', 33000, 'Antar ke Kawedanan, Magetan', 'Transfer', '2', 'Promonya apa aja sini???', NULL, '2023-02-01', NULL),
('TRS0000008', 'edzam', 9500, 'Antar ke Lamongan', 'Tunai', '2', '', NULL, '2023-02-01', 'https://workshopjti.com/v-angkringan/vangkringanmobile/gambarbukti/gambar10.jpg'),
('TRS0000009', 'edzam', 9500, 'Antar ke Lamongan', 'Tunai', '2', '', NULL, '2023-02-01', NULL),
('TRS0000010', 'admin', 10000, 'Antar ke Kawedanan, Magetan', 'Tunai', '1', '', NULL, '2023-02-01', NULL),
('TRS0000011', 'admin', 18500, 'Antar ke Perumnas Candirejo, Desa Gejagan, Kecamatan Loceret, Kabupaten Nganjuk', 'COD', '2', 'bang tolong gratis', NULL, '2023-02-02', NULL),
('TRS0000012', 'afizi', 12000, 'Antar ke Banyuwangi', 'Tunai', '2', '', NULL, '2023-02-02', NULL),
('TRS0000013', 'afizi', 10000, 'Antar ke Banyuwangi', 'Tunai', '2', '', NULL, '2023-02-02', 'https://v-angkringan.my.id/vangkringanmobile/gambar/gambar1.jpg'),
('TRS0000014', 'afizi', 10000, 'Antar ke Banyuwangi', 'Tunai', '2', '', NULL, '2023-02-02', 'https://v-angkringan.my.id/vangkringanmobile/gambar/gambar83.jpg'),
('TRS0000015', 'afizi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02', NULL),
('TRS0000016', 'afizi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02', NULL),
('TRS0000017', 'afizi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02', NULL),
('TRS0000018', 'afizi', 16000, 'Antar ke Banyuwangi', 'Tunai', '2', '', NULL, '2023-02-02', NULL),
('TRS0000019', 'afizi', 106000, 'Antar ke Banyuwangi', 'Tunai', '3', '', 'makanan sudah habis / tidak tersedia', '2023-02-02', NULL),
('TRS0000020', 'afizi', 26000, 'Antar ke Banyuwangi', 'COD', '2', '', NULL, '2023-02-02', NULL),
('TRS0000021', 'afizi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02', NULL),
('TRS0000022', 'afizi', 10000, 'Antar ke Banyuwangi', 'Tunai', '2', '', NULL, '2023-02-02', 'https://v-angkringan.my.id/vangkringanmobile/gambar/gambar4.jpg'),
('TRS0000023', 'afizi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02', NULL),
('TRS0000024', 'afizi', 106000, 'Antar ke Banyuwangi', 'Tunai', '2', '', NULL, '2023-02-02', NULL),
('TRS0000025', 'afizi', 20000, 'Antar ke Banyuwangi', 'COD', '2', '', NULL, '2023-02-02', NULL),
('TRS0000026', 'afizi', 14000, 'Antar ke Banyuwangi', 'Tunai', '0', '', NULL, '2023-02-02', NULL),
('TRS0000027', 'afizi', 112000, 'Antar ke Banyuwangi', 'Tunai', '0', '', NULL, '2023-02-02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `level` enum('admin','pelanggan','''') DEFAULT NULL,
  `kodeotp` int(10) DEFAULT NULL,
  `gambaruser` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `nama_lengkap`, `no_hp`, `alamat`, `level`, `kodeotp`, `gambaruser`) VALUES
('admin', 'altixspherd@gmail.com', '123', 'Maulana Akbar M', '85236167349', 'Kawedanan, Magetan, Jatim', 'admin', 17697809, ''),
('afizi', 'mzafizi1234@gmail.com', '123', 'Ahmad Firdaus', '082233814533', 'Banyuwangi', 'pelanggan', 18463717, ''),
('ahmad', 'e41210577@student.polije.ac.id', '12345', 'Ahmad Ansori', '086859483849', 'JL KH Wakid Hasim, Tanjunganom, Nganjuk', 'pelanggan', 88663484, ''),
('edzam', 'izamap77@gmail.com', '0000', 'Ahmad Edzam Prasetya', '85731318313', 'Lamongan', 'pelanggan', 11504078, ''),
('firdaus1', 'ahmadedzamprasetya@gmail.com', '1234', 'ahmad firdaus', '085232145625', 'nganjuk', 'pelanggan', 50232779, ''),
('maulanaaf2', 'mavindv1@gmail.com', '123456', 'AgnesMonika2', '08215636126', 'Bumi', 'pelanggan', 11604618, ''),
('maya', 'trismayanti', '1234', 'trismayanti', '085859184555', 'jember', 'pelanggan', 84634501, ''),
('nova', 'novana66266@gmal.com', '123', 'Nova A', '085748573827', 'Nganjuk', 'pelanggan', 0, ''),
('tarmidzi123', 'fikrilraw@gmail.com', '123', 'fikril', '085156023639', 'szsczs', 'pelanggan', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD KEY `username` (`username`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `kupon`
--
ALTER TABLE `kupon`
  ADD UNIQUE KEY `idkupon` (`idkupon`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `id_produk` (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `gambarbukti` (`gambarbukti`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `no_hp` (`no_hp`,`kodeotp`,`gambaruser`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `keranjang_ibfk_3` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `kupon`
--
ALTER TABLE `kupon`
  ADD CONSTRAINT `kupon_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
