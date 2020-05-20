-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2020 at 08:27 AM
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
-- Database: `repairme`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPerbaikan` (IN `id_pel` INT(11))  BEGIN 
SELECT tb_tipe_laptop.tipe_laptop AS tipe, tb_merk_laptop.merk_laptop AS merk, tb_mitra.nama_usaha as mitra, tanggal FROM tb_perbaikan_laptop JOIN tb_tipe_laptop ON tb_perbaikan_laptop.id_tipe_laptop = tb_tipe_laptop.id_tipe_laptop JOIN tb_merk_laptop ON tb_tipe_laptop.id_merk_laptop = tb_merk_laptop.id_merk_laptop JOIN tb_mitra ON tb_perbaikan_laptop.id_mitra = tb_mitra.id_mitra WHERE id_pelanggan = id_pel;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `id_jenis` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `id_jenis`, `id_user`, `nama`, `email`, `no_tlp`) VALUES
(1, '1', '1', 'admin', 'admin@repair.me', '089888999909');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(1) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `jenis`) VALUES
(1, 'admin'),
(2, 'mitra'),
(3, 'pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kerusakan_hp`
--

CREATE TABLE `tb_kerusakan_hp` (
  `id_kerusakan_hp` int(11) NOT NULL,
  `kerusakan_hp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kerusakan_hp`
--

INSERT INTO `tb_kerusakan_hp` (`id_kerusakan_hp`, `kerusakan_hp`) VALUES
(1, 'Layar retak'),
(2, 'Baterai cepat habis'),
(4, 'Kerusakann Home Button'),
(5, 'Kamera depan '),
(6, 'Kamera belakang'),
(7, 'dead pixel'),
(8, 'Mati Total');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kerusakan_laptop`
--

CREATE TABLE `tb_kerusakan_laptop` (
  `id_kerusakan_laptop` int(11) NOT NULL,
  `kerusakan_laptop` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kerusakan_laptop`
--

INSERT INTO `tb_kerusakan_laptop` (`id_kerusakan_laptop`, `kerusakan_laptop`) VALUES
(1, 'Layar Bergaris'),
(2, 'Layar Berubah Warna'),
(4, 'Batre Mudah Habis'),
(5, 'Mati total'),
(6, 'Hardisk rusak'),
(7, 'Kursor Eror'),
(8, 'Blue Screen'),
(10, 'sdfsdfasdfds');

-- --------------------------------------------------------

--
-- Table structure for table `tb_merk_hp`
--

CREATE TABLE `tb_merk_hp` (
  `id_merk_hp` int(11) NOT NULL,
  `merk_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_merk_hp`
--

INSERT INTO `tb_merk_hp` (`id_merk_hp`, `merk_hp`) VALUES
(1, 'Samsung'),
(2, 'Xiaomi'),
(3, 'Asus'),
(4, 'Oppo'),
(5, 'Vivo'),
(6, 'Noxia'),
(7, 'I Phone');

-- --------------------------------------------------------

--
-- Table structure for table `tb_merk_laptop`
--

CREATE TABLE `tb_merk_laptop` (
  `id_merk_laptop` int(11) NOT NULL,
  `merk_laptop` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_merk_laptop`
--

INSERT INTO `tb_merk_laptop` (`id_merk_laptop`, `merk_laptop`) VALUES
(3, 'Asus'),
(4, 'Dell'),
(7, 'Acer'),
(8, 'Advan'),
(9, 'Anote'),
(10, 'Toshiba'),
(11, 'Apple'),
(12, 'Samsung'),
(13, 'Hp'),
(14, 'Msi'),
(15, 'Microsoft'),
(16, 'Vivo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mitra`
--

CREATE TABLE `tb_mitra` (
  `id_mitra` int(11) NOT NULL,
  `id_jenis` int(2) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_usaha` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `lat` varchar(20) NOT NULL,
  `lng` varchar(30) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `foto_ktp` varchar(50) NOT NULL,
  `foto_usaha` varchar(50) NOT NULL,
  `foto_transaksi` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mitra`
--

INSERT INTO `tb_mitra` (`id_mitra`, `id_jenis`, `id_user`, `jenis`, `nama`, `nama_usaha`, `email`, `alamat`, `lat`, `lng`, `no_tlp`, `foto_ktp`, `foto_usaha`, `foto_transaksi`, `deskripsi`, `rating`) VALUES
(66, 2, 4, 'serbabisa', 'indah pertiwi', 'indahcell', 'indah@mail.com', 'kauman', '-7.913478948634584', '113.8200195532897', '081234567890', '5e094f771ecf9.jpeg', '5e09599a2ce1e.jpeg', '5e09599a2ce1e.jpeg', '-', 4),
(67, 2, 5, 'serbabisa', 'ari india', 'aricell', 'ari@mail.com', 'kauman bondowoso', '-7.914430034184133', '113.82056675307207', '081234567890', '5e09530645ecb.jpeg', '5e0953064690a.jpg', '5e37b1b126508.png', '-', 0),
(68, 2, 7, 'serbabisa', 'asefasdf', 'sdfsdfsd', 'asdfdsf@sdfdf.df', 'sdfsdfsd', '-7.913287668594195', '113.82072590697', '123213123213', 'foto_ktp_sdfsdfsd_id7', 'foto_usaha_sdfsdfsd_id7', NULL, '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_notif_mitra`
--

CREATE TABLE `tb_notif_mitra` (
  `id_notif_mitra` int(11) NOT NULL,
  `notifikasi` varchar(30) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_perbaikan` int(11) NOT NULL,
  `dibaca` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_notif_pelanggan`
--

CREATE TABLE `tb_notif_pelanggan` (
  `id_notif_pelanggan` int(11) NOT NULL,
  `notifikasi` varchar(30) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_perbaikan` int(11) NOT NULL,
  `dibaca` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(6) NOT NULL,
  `nama_paket` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `nama_paket`, `harga`) VALUES
(1, 'per 6 bulan', 'Rp. 100.000,00'),
(2, 'per 12 bulan', 'Rp. 200.000,00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_jenis` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `id_jenis`, `id_user`, `nama`, `email`, `no_tlp`, `alamat`) VALUES
(33, '3', '3', 'andika firman', 'andikafirman99@gmail.com', '087756476534', 'maesan bondowoso'),
(34, '3', '6', 'ana afi', 'ana@mail.com', '081559855799', 'pal 9 bondowoso'),
(35, '3', '8', 'asfdsf', 'asdf@sadfs.df', '12312312312', 'sdfsdfdsfds'),
(36, '3', '9', 'budi sentosa', 'budi@sentosa.com', '08723283234', 'bondowoso');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perbaikan_hp`
--

CREATE TABLE `tb_perbaikan_hp` (
  `id_perbaikan` int(11) NOT NULL,
  `id_status_perbaikan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `id_tipe_hp` int(11) NOT NULL,
  `id_kerusakan_hp` int(11) NOT NULL,
  `kerusakan_lain` varchar(30) NOT NULL,
  `keterangan_mitra` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `harga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_perbaikan_hp`
--

INSERT INTO `tb_perbaikan_hp` (`id_perbaikan`, `id_status_perbaikan`, `id_pelanggan`, `id_mitra`, `id_tipe_hp`, `id_kerusakan_hp`, `kerusakan_lain`, `keterangan_mitra`, `tanggal`, `harga`) VALUES
(1, 4, 33, 66, 0, 1, 'adf', 'mungkin ada biaya tambahan', '15 Mei 2020', 'Rp. 120.000,00'),
(2, 4, 33, 66, 1, 4, '', 'copot ya', '15 Mei 2020', 'Rp. 181.000,00'),
(3, 1, 33, 67, 0, 0, 'rusak rusak parah', '', '10 Mei 2020', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perbaikan_laptop`
--

CREATE TABLE `tb_perbaikan_laptop` (
  `id_perbaikan` int(11) NOT NULL,
  `id_status_perbaikan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `id_tipe_laptop` int(11) NOT NULL,
  `id_kerusakan_laptop` int(11) NOT NULL,
  `kerusakan_lain` varchar(30) NOT NULL,
  `keterangan_mitra` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_perbaikan_laptop`
--

INSERT INTO `tb_perbaikan_laptop` (`id_perbaikan`, `id_status_perbaikan`, `id_pelanggan`, `id_mitra`, `id_tipe_laptop`, `id_kerusakan_laptop`, `kerusakan_lain`, `keterangan_mitra`, `tanggal`, `harga`) VALUES
(1, 4, 33, 66, 0, 4, 'mudah ', '', '15 Mei 2020', 'Rp. 100.000,00'),
(2, 4, 33, 66, 23, 0, 'as', '', '14 Mei 2020', 'Rp. 150.000,00'),
(3, 1, 33, 66, 19, 4, 'oke', '', '09 Mei 2020', '0'),
(4, 1, 33, 67, 0, 0, 'yolma', '', '10 Mei 2020', '0'),
(5, 1, 36, 66, 0, 0, 'rusak dor', '', '11 Mei 2020', '0'),
(6, 1, 33, 68, 0, 0, 'sangat rusak', '', '12 Mei 2020', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id_rating` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `testimoni` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rating`
--

INSERT INTO `tb_rating` (`id_rating`, `id_pelanggan`, `id_mitra`, `rating`, `testimoni`) VALUES
(17, 33, 66, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_perbaikan`
--

CREATE TABLE `tb_status_perbaikan` (
  `id_status_perbaikan` int(1) NOT NULL,
  `status_perbaikan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status_perbaikan`
--

INSERT INTO `tb_status_perbaikan` (`id_status_perbaikan`, `status_perbaikan`) VALUES
(1, 'Menunggu Persetujuan'),
(2, 'Mitra Siap Memperbaiki'),
(3, 'Mitra Menolak Perbaikan'),
(4, 'Sedang Diperbaiki'),
(5, 'Terdapat Perubahan'),
(6, 'Perbaikan Dibatalkan'),
(7, 'Perbaikan Selesai'),
(8, 'Sudah Dijemput');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipe_hp`
--

CREATE TABLE `tb_tipe_hp` (
  `id_tipe_hp` int(11) NOT NULL,
  `tipe_hp` varchar(15) NOT NULL,
  `id_merk_hp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tipe_hp`
--

INSERT INTO `tb_tipe_hp` (`id_tipe_hp`, `tipe_hp`, `id_merk_hp`) VALUES
(1, 'A50', 1),
(2, 'S9', 1),
(3, 'Redmi Note 5', 2),
(7, 'Note 10', 1),
(9, 'redmi 6', 2),
(10, 'Note pro 7 j', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipe_laptop`
--

CREATE TABLE `tb_tipe_laptop` (
  `id_tipe_laptop` int(11) NOT NULL,
  `tipe_laptop` varchar(15) NOT NULL,
  `id_merk_laptop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tipe_laptop`
--

INSERT INTO `tb_tipe_laptop` (`id_tipe_laptop`, `tipe_laptop`, `id_merk_laptop`) VALUES
(15, 'Zenbook series', 3),
(16, 'Zenbook pro ser', 3),
(17, 'Zenbook s serie', 3),
(18, 'Vivobook s seri', 3),
(19, 'Inspiron 3162', 4),
(20, 'Vostro 14', 4),
(21, 'Aspire one 722', 7),
(22, 'Nitro 5', 7),
(23, 'advest 0976', 8),
(24, 'adv pro gaming', 8),
(25, 'vivo01', 16),
(26, 'X4455T', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ttd_hp`
--

CREATE TABLE `tb_ttd_hp` (
  `id_ttd_hp` int(11) NOT NULL,
  `id_perbaikan` int(11) NOT NULL,
  `merk_hp` varchar(20) NOT NULL,
  `tipe_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ttd_hp`
--

INSERT INTO `tb_ttd_hp` (`id_ttd_hp`, `id_perbaikan`, `merk_hp`, `tipe_hp`) VALUES
(1, 1, 'samsul ', 'arf'),
(2, 3, 'Xiaomi', 'jumbo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ttd_laptop`
--

CREATE TABLE `tb_ttd_laptop` (
  `id_ttd_laptop` int(11) NOT NULL,
  `id_perbaikan` int(11) NOT NULL,
  `merk_laptop` varchar(20) NOT NULL,
  `tipe_laptop` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ttd_laptop`
--

INSERT INTO `tb_ttd_laptop` (`id_ttd_laptop`, `id_perbaikan`, `merk_laptop`, `tipe_laptop`) VALUES
(1, 1, 'usus', 'buntu'),
(2, 4, 'Asus', 'snsv'),
(3, 5, 'Asus', 'buntu'),
(4, 6, 'sangat', 'buntu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$dTTtjRn/BvzLnmIPN0ReG.9Q6qamYYeLydNRToD4GlZRtJBV1FM5.'),
(3, 'andika99', '$2y$10$Dk3ng0oBjQuJHwQGtjm0j.mMg83lfaU7NZmpM9fam3oBe1AXo09wG'),
(4, 'indahcell', '$2y$10$YoG2JzhvJaooAAtwKkj1veD/8Yj31ogJh/LidadryujAeuiCltzey'),
(5, 'aricell', '$2y$10$HRXq5dFwqo49LidEq8eYJ.SKZyCgn7wxLyhiAN6kRMEzd363ojWji'),
(6, 'anaafi', '$2y$10$wU4B4Tgt29TsYs8ZTXMNO.IjmtgBV5Uds9WFm4HOrwBTyUgjaGT5.'),
(7, 'asdfasdf', '$2y$10$ez4gpELjtHIJ0vTOc8mBPuWJ5Y1MG8HHl6zix7t3/XwTEnVhndYUq'),
(8, 'okegoes', '$2y$10$dAahgiK3D/MslMXl9A8UnOLzU9jBTynY2Nm8h8GWEHZ7RLwWxYc46'),
(9, 'budiutomo', '$2y$10$YUX3HTHCvSdZWu1RpM9/iO3pDHCyjHaDXelwJavRe4B00VE10G/Vi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_voucher_hp`
--

CREATE TABLE `tb_voucher_hp` (
  `id_voucher_hp` int(11) NOT NULL,
  `voucher_hp` varchar(7) NOT NULL,
  `id_perbaikan_hp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_voucher_hp`
--

INSERT INTO `tb_voucher_hp` (`id_voucher_hp`, `voucher_hp`, `id_perbaikan_hp`) VALUES
(15, '1aca8bk', 1),
(16, 'mwt666p', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_voucher_laptop`
--

CREATE TABLE `tb_voucher_laptop` (
  `id_voucher_laptop` int(11) NOT NULL,
  `voucher_laptop` varchar(7) NOT NULL,
  `id_perbaikan_laptop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_voucher_laptop`
--

INSERT INTO `tb_voucher_laptop` (`id_voucher_laptop`, `voucher_laptop`, `id_perbaikan_laptop`) VALUES
(28, 'ehr5fly', 2),
(29, '5fxt3mf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_waktu_perbaikan_hp`
--

CREATE TABLE `tb_waktu_perbaikan_hp` (
  `id_waktu_perbaikan_hp` int(11) NOT NULL,
  `waktu_tanggal` varchar(50) NOT NULL,
  `waktu_hari` varchar(10) NOT NULL,
  `berakhir` varchar(20) NOT NULL,
  `id_perbaikan_hp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_waktu_perbaikan_hp`
--

INSERT INTO `tb_waktu_perbaikan_hp` (`id_waktu_perbaikan_hp`, `waktu_tanggal`, `waktu_hari`, `berakhir`, `id_perbaikan_hp`) VALUES
(10, '20-May-2020 sampai 27-May-2020', '7 hari', '1590598799999', 1),
(11, '20-May-2020 sampai 1-June-2020', '12 hari', '1591030799999', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_waktu_perbaikan_laptop`
--

CREATE TABLE `tb_waktu_perbaikan_laptop` (
  `id_waktu_perbaikan_laptop` int(11) NOT NULL,
  `waktu_tanggal` varchar(50) NOT NULL,
  `waktu_hari` varchar(10) NOT NULL,
  `berakhir` varchar(20) NOT NULL,
  `id_perbaikan_laptop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_waktu_perbaikan_laptop`
--

INSERT INTO `tb_waktu_perbaikan_laptop` (`id_waktu_perbaikan_laptop`, `waktu_tanggal`, `waktu_hari`, `berakhir`, `id_perbaikan_laptop`) VALUES
(29, '18-May-2020 sampai 25-May-2020', '7 hari', '1590425999999', 2),
(31, '18-May-2020 sampai 30-May-2020', '12 hari', '1590857999999', 1);

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi_mitra`
--

CREATE TABLE `verifikasi_mitra` (
  `id_verifikasi` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `lama` int(10) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `tanggal_hari` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verifikasi_mitra`
--

INSERT INTO `verifikasi_mitra` (`id_verifikasi`, `id_mitra`, `lama`, `harga`, `tanggal_hari`) VALUES
(8, 66, 183, 'Rp. 100.000,00', '30-December-2019 sam'),
(9, 67, 183, 'Rp. 100.000,00', '30-December-2019 sam'),
(10, 66, 183, 'Rp. 100.000,00', '30-December-2019 sam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_kerusakan_hp`
--
ALTER TABLE `tb_kerusakan_hp`
  ADD PRIMARY KEY (`id_kerusakan_hp`);

--
-- Indexes for table `tb_kerusakan_laptop`
--
ALTER TABLE `tb_kerusakan_laptop`
  ADD PRIMARY KEY (`id_kerusakan_laptop`);

--
-- Indexes for table `tb_merk_hp`
--
ALTER TABLE `tb_merk_hp`
  ADD PRIMARY KEY (`id_merk_hp`);

--
-- Indexes for table `tb_merk_laptop`
--
ALTER TABLE `tb_merk_laptop`
  ADD PRIMARY KEY (`id_merk_laptop`);

--
-- Indexes for table `tb_mitra`
--
ALTER TABLE `tb_mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `tb_notif_mitra`
--
ALTER TABLE `tb_notif_mitra`
  ADD PRIMARY KEY (`id_notif_mitra`);

--
-- Indexes for table `tb_notif_pelanggan`
--
ALTER TABLE `tb_notif_pelanggan`
  ADD PRIMARY KEY (`id_notif_pelanggan`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_perbaikan_hp`
--
ALTER TABLE `tb_perbaikan_hp`
  ADD PRIMARY KEY (`id_perbaikan`);

--
-- Indexes for table `tb_perbaikan_laptop`
--
ALTER TABLE `tb_perbaikan_laptop`
  ADD PRIMARY KEY (`id_perbaikan`),
  ADD UNIQUE KEY `id_perbaikan` (`id_perbaikan`);

--
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `tb_status_perbaikan`
--
ALTER TABLE `tb_status_perbaikan`
  ADD PRIMARY KEY (`id_status_perbaikan`);

--
-- Indexes for table `tb_tipe_hp`
--
ALTER TABLE `tb_tipe_hp`
  ADD PRIMARY KEY (`id_tipe_hp`);

--
-- Indexes for table `tb_tipe_laptop`
--
ALTER TABLE `tb_tipe_laptop`
  ADD PRIMARY KEY (`id_tipe_laptop`);

--
-- Indexes for table `tb_ttd_hp`
--
ALTER TABLE `tb_ttd_hp`
  ADD PRIMARY KEY (`id_ttd_hp`);

--
-- Indexes for table `tb_ttd_laptop`
--
ALTER TABLE `tb_ttd_laptop`
  ADD PRIMARY KEY (`id_ttd_laptop`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_voucher_hp`
--
ALTER TABLE `tb_voucher_hp`
  ADD PRIMARY KEY (`id_voucher_hp`);

--
-- Indexes for table `tb_voucher_laptop`
--
ALTER TABLE `tb_voucher_laptop`
  ADD PRIMARY KEY (`id_voucher_laptop`);

--
-- Indexes for table `tb_waktu_perbaikan_hp`
--
ALTER TABLE `tb_waktu_perbaikan_hp`
  ADD PRIMARY KEY (`id_waktu_perbaikan_hp`);

--
-- Indexes for table `tb_waktu_perbaikan_laptop`
--
ALTER TABLE `tb_waktu_perbaikan_laptop`
  ADD PRIMARY KEY (`id_waktu_perbaikan_laptop`);

--
-- Indexes for table `verifikasi_mitra`
--
ALTER TABLE `verifikasi_mitra`
  ADD PRIMARY KEY (`id_verifikasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kerusakan_hp`
--
ALTER TABLE `tb_kerusakan_hp`
  MODIFY `id_kerusakan_hp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kerusakan_laptop`
--
ALTER TABLE `tb_kerusakan_laptop`
  MODIFY `id_kerusakan_laptop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_merk_hp`
--
ALTER TABLE `tb_merk_hp`
  MODIFY `id_merk_hp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_merk_laptop`
--
ALTER TABLE `tb_merk_laptop`
  MODIFY `id_merk_laptop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_mitra`
--
ALTER TABLE `tb_mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tb_notif_mitra`
--
ALTER TABLE `tb_notif_mitra`
  MODIFY `id_notif_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_notif_pelanggan`
--
ALTER TABLE `tb_notif_pelanggan`
  MODIFY `id_notif_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_tipe_hp`
--
ALTER TABLE `tb_tipe_hp`
  MODIFY `id_tipe_hp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_tipe_laptop`
--
ALTER TABLE `tb_tipe_laptop`
  MODIFY `id_tipe_laptop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_voucher_hp`
--
ALTER TABLE `tb_voucher_hp`
  MODIFY `id_voucher_hp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_voucher_laptop`
--
ALTER TABLE `tb_voucher_laptop`
  MODIFY `id_voucher_laptop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_waktu_perbaikan_hp`
--
ALTER TABLE `tb_waktu_perbaikan_hp`
  MODIFY `id_waktu_perbaikan_hp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_waktu_perbaikan_laptop`
--
ALTER TABLE `tb_waktu_perbaikan_laptop`
  MODIFY `id_waktu_perbaikan_laptop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `verifikasi_mitra`
--
ALTER TABLE `verifikasi_mitra`
  MODIFY `id_verifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
