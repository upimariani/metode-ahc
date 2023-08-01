-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 05:35 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metode-ahc`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_produk`, `qty`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 2, 5, 2),
(5, 3, 8, 1),
(6, 4, 10, 1),
(7, 4, 2, 2),
(8, 5, 4, 1),
(9, 6, 6, 2),
(10, 7, 1, 1),
(11, 7, 3, 1),
(12, 8, 4, 1),
(13, 8, 6, 2),
(14, 9, 4, 1),
(15, 10, 9, 1),
(16, 10, 6, 1),
(17, 11, 1, 5),
(18, 12, 3, 2),
(19, 13, 6, 3),
(20, 14, 1, 1),
(21, 14, 9, 1),
(22, 14, 10, 1),
(23, 15, 4, 2),
(24, 16, 10, 2),
(25, 17, 5, 1),
(26, 17, 4, 1),
(27, 18, 9, 1),
(28, 19, 2, 1),
(29, 20, 2, 1),
(30, 21, 4, 2),
(31, 22, 3, 2),
(32, 23, 8, 1),
(33, 24, 7, 2),
(34, 25, 1, 1),
(35, 25, 9, 1),
(36, 25, 10, 2),
(37, 26, 2, 1),
(38, 27, 6, 1),
(39, 28, 5, 1),
(40, 29, 7, 1),
(41, 30, 4, 1),
(42, 31, 1, 1),
(43, 32, 2, 1),
(44, 33, 8, 1),
(45, 34, 6, 1),
(46, 36, 1, 1),
(47, 36, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tgl_diskon` varchar(15) NOT NULL,
  `diskon` int(11) NOT NULL,
  `nama_diskon` varchar(20) NOT NULL,
  `member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_produk`, `tgl_diskon`, `diskon`, `nama_diskon`, `member`) VALUES
(1, 1, '2023-06-14', 5, 'Sale', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `level_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `tgl_lahir`, `jk`, `username`, `password`, `no_hp`, `level_member`) VALUES
(1, 'Ahmad Syahid', ' Ciberem', '30 Desember ', 'L', 'ahmad111', 'ahmad111', '89945360982', 1),
(2, 'Dewi Rahayu', 'Ciberem', '24 Januari', 'P', 'dewirahayu111', 'dewirahayu111', '82143215678', 1),
(3, 'Budi Santoso', 'Jalaksana', '3 Maret', 'L', 'budisantoso111', 'budisantoso111', '82145679132', 1),
(4, 'Maya Sari', 'Jalaksana', '18 Januari', 'P', 'mayasari111', 'mayasari', '89965437891', 0),
(5, 'Siti Aisyah', 'Kuningan', '21 Maret', 'P', 'sitiaisyah111', 'sitiaisyah111', '82176892456', 0),
(6, 'Desi Wulandari', 'Kuningan', '16 Juni', 'P', 'desiwulandari111', 'desiwulandari111', '89987614562', 1),
(7, 'Rina Fitriani', 'Kuningan', '12 juli', 'P', 'rinafitriani111', 'rinafitriani111', '82145980127', 1),
(8, 'Indra Kusuma', 'Kuningan', '1 Januari', 'L', 'indrakusuma111', 'indrakusuma111', '89925679810', 1),
(9, 'Agus Salim', 'Kuningan', '2023-04-14', 'L', 'agus111', 'agus111', '89887654543', 1),
(10, 'Rizki Maulana', 'Kuningan', '2023-04-18', 'L', 'rizki111', 'rizki111', '89099123212', 1),
(11, 'Andi Nugraha', 'Kuningan', '14 April', 'L', 'andinugraha111', 'andinugraha111', '89998712350', 1),
(12, 'Mochammad Ali', 'Kuningan', '18 April', 'L', 'mochamadali111', 'mochamadali111', '82198011278', 0),
(13, 'Rizki Maulana', 'Kuningan', '20 Januari', 'L', 'rizkimaulana111', 'rizkimaulana111', '82176890912', 0),
(14, 'Rina Indriani', 'Setianegara', '4 April', 'P', 'rinaindriani111', 'rinaindriani111', '89945267891', 1),
(15, 'Ahmad Ridwan', 'Setianegara', '17 Januari', 'L', 'ahmadridwan111', 'ahmadridwan111', '82165728901', 1),
(16, 'Siti Rahayu', 'Cirebon ', '10 November', 'P', 'sitirahayu111', 'sitirahayu111', '82176091270', 0),
(17, 'Ani Setiawati', 'Cirebon ', '15 September', 'P', 'anisetiawati111', 'anisetiawati111', '89909812379', 0),
(18, 'Dewi Sulistiani', 'Cirebon ', '7 Maret', 'P', 'dewisulistiani111', 'dewisulistiani111', '82265718901', 0),
(19, 'Joko Susanto', 'Cirebon ', '17 Juni', 'L', 'jokosusanto111', 'jokosusanto111', '89923760981', 0),
(20, 'Rudi Hermawan', 'Cirebon ', '24 Januari', 'L', 'rudihermawan111', 'rudihermawan111', '89954217801', 0),
(21, 'Andi Pratama', 'Cirebon ', '7 Desember', 'L', 'andipratama111', 'andipratama111', '89987012356', 0),
(22, 'Anton Wijaya', 'Cirebon ', '9 Maret', 'L', 'antonwijaya111', 'antonwijaya111', '82134896571', 0),
(23, 'Lina wulandari', 'Cirebon ', '28 September', 'P', 'linawlandari111', 'linawlandari111', '89971024586', 0),
(24, 'Dedy Sutomo', 'Cirebon ', '14 November', 'L', 'dedysutomo111', 'dedysutomo111', '82154710923', 0),
(25, 'Rina Maulida', 'Ancaran', '18 Februari', 'p', 'rinamaulida111', 'rinamaulida111', '82176120945', 0),
(26, 'Hadi santoso', 'Ancaran', '21 Maret', 'L', 'hadisantoso111', 'hadisantoso111', '89965810976', 0),
(27, 'Imam Sutisna', 'Ancaran', '18 Novemver', 'L', 'imamsutisan111', 'imamsutisna111', '89227810976', 0),
(28, 'Desi Rahmawati', 'Ancaran', '9 September', 'P', 'desirahmawati111', 'desirahmawati111', '82115459822', 0),
(29, 'Sri Rahayu', 'Ancaran', '7 Desember', 'P', 'srirahayu111', 'srirahayu111', '82154789644', 0),
(30, 'Agus Susanto', 'Ancaran', '29 Maret', 'L', 'agussusanto111', 'agussusanto111', '82187615643', 0),
(31, 'Anisa Setiawan', 'Ancaran', '8 Juni', 'P', 'anissetiawan111', 'anisasetiawan111', '8996578342', 0),
(32, 'Maya Sulistiani', 'Ancaran', '24 November', 'P', 'mayasulistiani111', 'mayasuliatiani111', '82154718734', 0),
(33, 'Heri Prasetyo', 'Linggarjati', '26 Juli', 'L', 'heriprasetyo111', 'heriprasetyo111', '89976915787', 0),
(34, 'Nina Kusuma', 'Linggarjari', '14 September', 'P', 'ninakusuma111', 'ninakusuma111', '89987291071', 0),
(35, 'Joko Wijaya', 'Cigandamekar', '31 Januari', 'L', 'jokowijaya111', 'jokowijaya111', '82145629865', 0),
(36, 'Dewi Setyowati', 'Cigandamekar', '4 April', 'P', 'dewisetyowati111', 'dewisetyowati111', '82176542891', 0),
(37, 'Surya Hermawan', 'Cigandamekar', '19 Desember', 'L', 'suryahermawan111', 'suryahermawan111', '89976532561', 0),
(38, 'Nita Wulandari', 'Cigandamekar', '27 November', 'P', 'nitawulandari111', 'nitawulandari111', '82145367811', 0),
(39, 'Heru Sutomo', 'Cigandamekar', '14 Maret', 'L', 'herusutomo111', 'herusutomo111', '89976421567', 0),
(40, 'Lusi Maulida', 'Cigandamekar', '25 September', 'P', 'lusimaulida111', 'lusimaulida111', '82154367186', 0),
(41, 'Rina rahmawati', 'Cikaso', '16 November', 'P', 'rinarahmawati111', 'rinarahmawati111', '82176534716', 0),
(42, 'Siti Sutisna', 'Cikaso', '25 Januari', 'P', 'sitisutisna111', 'sitisutisna111', '82154267185', 0),
(43, 'Toni Sutisna', 'Cikaso', '17 Desember', 'L', 'tonisutisna111', 'tonisutisna111', '82154367614', 0),
(45, 'Ahmad Susanto', 'Cikaso', '3 September', 'L', 'ahmadsusanto111', 'ahmadsusanto111', '89927365416', 0),
(46, 'Yani Wulandari', 'Cikaso', '4 April', 'P', 'yaniwulandari111', 'yaniwulandari111', '82176483916', 0),
(47, 'Arif Setiawan', 'Cibentang', '27 Desember', 'L', 'arifsetiawan111', 'arifsetiawan111', '89976482682', 0),
(48, 'Tuti Prasetyo', 'Cibentang', '24 Januari', 'P', 'tutiprasetyo111', 'tutiprasetyo111', '89926391074', 0),
(49, 'Yudi Pratama', 'Sukamukti', '14 September', 'L', 'yudipratama111', 'yudipratama111', '82163574820', 0),
(50, 'Nita Kusuma', 'Sukamukti', '16 Juli 1998', 'P', 'nitakusuma111', 'nitakusuma111', '89984372915', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(125) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi`, `stok`, `harga`, `gambar`) VALUES
(1, 'Le Mineral', 'Air kemasan ukuran 300 ml', 1, '10000', 'lemineral.png'),
(2, 'Cristaline', 'ukuran 600 ml', 2, '18000', 'crystaline.png'),
(3, 'Cleo', 'air mineral', 4, '37000', 'cleo.png'),
(4, 'Aqua', 'auq', 3, '28000', 'aqua.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_wisatawan` int(11) NOT NULL,
  `tgl_transaksi` varchar(15) NOT NULL,
  `tot_transaksi` varchar(15) NOT NULL,
  `stat_transaksi` int(11) NOT NULL,
  `stat_pembayaran` int(11) NOT NULL,
  `bukti_pembayaran` text NOT NULL,
  `pengiriman` text NOT NULL,
  `ongkir` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_wisatawan`, `tgl_transaksi`, `tot_transaksi`, `stat_transaksi`, `stat_pembayaran`, `bukti_pembayaran`, `pengiriman`, `ongkir`) VALUES
(1, 1, '2023-05-19', '65000', 2, 1, '0', '', '0'),
(2, 1, '2023-05-20', '130000', 2, 1, '0', '', '0'),
(3, 1, '2023-05-21', '45000', 2, 1, '0', '', '0'),
(4, 1, '2023-05-22', '26000', 2, 1, '0', '', '0'),
(5, 1, '2023-05-23', '28000', 2, 1, '0', '', '0'),
(6, 2, '2023-05-24', '110000', 2, 1, '0', '', '0'),
(7, 2, '2023-05-24', '47000', 2, 1, '0', '', '0'),
(8, 2, '2023-05-24', '28000', 2, 1, '0', '', '0'),
(9, 9, '2023-05-24', '28000', 2, 1, '0', '', '0'),
(10, 10, '2023-05-24', '83000', 2, 1, '0', '', '0'),
(11, 11, '2023-05-24', '50000', 2, 1, '0', '', '0'),
(12, 11, '2023-05-24', '74000', 2, 1, '0', '', '0'),
(13, 11, '2023-05-19', '165000', 2, 1, '0', '', '0'),
(14, 14, '2023-05-19', '47000', 2, 1, '0', '', '0'),
(15, 15, '2023-05-19', '56000', 2, 1, '0', '', '0'),
(16, 3, '2023-05-19', '18000', 2, 1, '0', '', '0'),
(17, 3, '2023-05-19', '93000', 2, 1, '0', '', '0'),
(18, 3, '2023-05-19', '28000', 2, 1, '0', '', '0'),
(19, 3, '2023-05-19', '18000', 2, 1, '0', '', '0'),
(20, 1, '2023-05-28', '18000', 2, 1, '0', '', '0'),
(21, 5, '2023-05-28', '56000', 2, 1, '0', '', '0'),
(22, 5, '2023-05-28', '74000', 2, 1, '0', '', '0'),
(23, 5, '2023-05-28', '45000', 2, 1, '0', '', '0'),
(24, 5, '2023-05-28', '180000', 2, 1, '0', '', '0'),
(25, 6, '2023-05-28', '56000', 2, 1, '0', '', '0'),
(26, 6, '2023-05-28', '18000', 2, 1, '0', '', '0'),
(27, 6, '2023-05-08', '55000', 2, 1, '0', '', '0'),
(28, 6, '2023-05-08', '65000', 2, 1, '0', '', '0'),
(29, 7, '2023-05-08', '90000', 2, 1, '0', '', '0'),
(30, 7, '2023-05-08', '28000', 2, 1, '0', '', '0'),
(31, 8, '2023-05-08', '10000', 2, 1, '0', '', '0'),
(32, 8, '2023-05-08', '18000', 2, 1, '0', '', '0'),
(33, 8, '2023-05-08', '45000', 2, 1, '0', '', '0'),
(34, 8, '2023-05-08', '55000', 2, 1, '0', '', '0'),
(35, 0, '2023-08-01', '157500', 0, 0, '0', 'dfdfdsfsd Kota.Bangka Selatan Provinsi.Bangka Belitung Expedisi.jne Paket.OKE', '44000'),
(36, 0, '2023-08-01', '157500', 0, 0, '0', 'bnghfyd Kota.Bandung Barat Provinsi.Jawa Barat Expedisi.jne Paket.OKE', '14000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `no_hp`, `username`, `password`, `level_user`) VALUES
(1, 'Admin', 'Kuningan', '085156727388', 'admin', 'admin', 1),
(2, 'Pengelola', 'Kuningan', '0875698745633', 'pengelola', 'pengelola', 2),
(4, 'Sales', 'kuningan', '089987656543', 'sales', 'sales', 3),
(5, 'Marketing', 'Kuningan', '08998231222', 'marketing', 'marketing', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
