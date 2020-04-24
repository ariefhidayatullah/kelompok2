-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Feb 2020 pada 13.38
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.1.32

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
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
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `id_jenis`, `id_user`, `nama`, `email`, `no_tlp`) VALUES
(1, '1', '1', 'admin', 'admin@repair.me', '089888999909');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(1) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `jenis`) VALUES
(1, 'admin'),
(2, 'mitra'),
(3, 'pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kerusakan_hp`
--

CREATE TABLE `tb_kerusakan_hp` (
  `id_kerusakan_hp` int(11) NOT NULL,
  `kerusakan_hp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kerusakan_hp`
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
-- Struktur dari tabel `tb_kerusakan_laptop`
--

CREATE TABLE `tb_kerusakan_laptop` (
  `id_kerusakan_laptop` int(11) NOT NULL,
  `kerusakan_laptop` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kerusakan_laptop`
--

INSERT INTO `tb_kerusakan_laptop` (`id_kerusakan_laptop`, `kerusakan_laptop`) VALUES
(1, 'Layar Bergaris'),
(2, 'Layar Berubah Warna'),
(4, 'Batre Mudah Habis'),
(5, 'Mati total'),
(6, 'Hardisk rusak'),
(7, 'Kursor Eror'),
(8, 'Blue Screen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_merk_hp`
--

CREATE TABLE `tb_merk_hp` (
  `id_merk_hp` int(11) NOT NULL,
  `merk_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_merk_hp`
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
-- Struktur dari tabel `tb_merk_laptop`
--

CREATE TABLE `tb_merk_laptop` (
  `id_merk_laptop` int(11) NOT NULL,
  `merk_laptop` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_merk_laptop`
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
-- Struktur dari tabel `tb_mitra`
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
-- Dumping data untuk tabel `tb_mitra`
--

INSERT INTO `tb_mitra` (`id_mitra`, `id_jenis`, `id_user`, `jenis`, `nama`, `nama_usaha`, `email`, `alamat`, `lat`, `lng`, `no_tlp`, `foto_ktp`, `foto_usaha`, `foto_transaksi`, `deskripsi`, `rating`) VALUES
(66, 2, 4, 'serbabisa', 'indah pertiwi', 'indahcell', 'indah@mail.com', 'kauman', '-7.913478948634584', '113.8200195532897', '081234567890', '5e094f771ecf9.jpeg', '5e094f771f56c.jpg', '5e09599a2ce1e.jpeg', '-', 0),
(67, 2, 5, 'serbabisa', 'ari india', 'aricell', 'ari@mail.com', 'kauman bondowoso', '-7.914430034184133', '113.82056675307207', '081234567890', '5e09530645ecb.jpeg', '5e0953064690a.jpg', '5e09533dc6c8f.jpeg', '-', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_notif_mitra`
--

CREATE TABLE `tb_notif_mitra` (
  `id_notif_mitra` int(11) NOT NULL,
  `notifikasi` varchar(30) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_perbaikan` int(11) NOT NULL,
  `dibaca` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_notif_mitra`
--

INSERT INTO `tb_notif_mitra` (`id_notif_mitra`, `notifikasi`, `keterangan`, `id_perbaikan`, `dibaca`) VALUES
(29, 'diskon2', 'diskon tahun baru', 5007, 'n'),
(30, 'tambah_harga2', 'beli alat', 5007, 'n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_notif_pelanggan`
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
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(6) NOT NULL,
  `nama_paket` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `nama_paket`, `harga`) VALUES
(1, 'per 6 bulan', 'Rp. 100.000,00'),
(2, 'per 12 bulan', 'Rp. 200.000,00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
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
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `id_jenis`, `id_user`, `nama`, `email`, `no_tlp`, `alamat`) VALUES
(33, '3', '3', 'andika firman', 'andikafirman99@gmail.com', '087756476534', 'maesan bondowoso'),
(34, '3', '6', 'ana afi', 'ana@mail.com', '081559855799', 'pal 9 bondowoso');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perbaikan_hp`
--

CREATE TABLE `tb_perbaikan_hp` (
  `id_perbaikan` int(11) NOT NULL,
  `id_status_perbaikan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `id_tipe_hp` int(11) NOT NULL,
  `id_ttd_hp` int(11) NOT NULL,
  `id_kerusakan_hp` int(11) NOT NULL,
  `kerusakan_lain` varchar(30) NOT NULL,
  `keterangan_mitra` varchar(50) NOT NULL,
  `harga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_perbaikan_hp`
--

INSERT INTO `tb_perbaikan_hp` (`id_perbaikan`, `id_status_perbaikan`, `id_pelanggan`, `id_mitra`, `id_tipe_hp`, `id_ttd_hp`, `id_kerusakan_hp`, `kerusakan_lain`, `keterangan_mitra`, `harga`) VALUES
(5007, 5, 33, 66, 1, 0, 8, 'tercebur air', 'beli alat', 'Rp. 230.000,00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perbaikan_laptop`
--

CREATE TABLE `tb_perbaikan_laptop` (
  `id_perbaikan` int(11) NOT NULL,
  `id_status_perbaikan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `id_tipe_laptop` int(11) NOT NULL,
  `id_ttd_laptop` int(11) NOT NULL,
  `id_kerusakan_laptop` int(11) NOT NULL,
  `kerusakan_lain` varchar(30) NOT NULL,
  `keterangan_mitra` varchar(50) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_perbaikan_laptop`
--

INSERT INTO `tb_perbaikan_laptop` (`id_perbaikan`, `id_status_perbaikan`, `id_pelanggan`, `id_mitra`, `id_tipe_laptop`, `id_ttd_laptop`, `id_kerusakan_laptop`, `kerusakan_lain`, `keterangan_mitra`, `harga`) VALUES
(36, 8, 34, 67, 23, 0, 6, 'booting terus', 'mungkin ada biaya tambahan', 'Rp. 100.000,00'),
(37, 8, 33, 66, 15, 0, 1, '', 'mungkin ada tambahan', 'Rp. 165.000,00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id_rating` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `testimoni` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status_perbaikan`
--

CREATE TABLE `tb_status_perbaikan` (
  `id_status_perbaikan` int(1) NOT NULL,
  `status_perbaikan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_status_perbaikan`
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
-- Struktur dari tabel `tb_tipe_hp`
--

CREATE TABLE `tb_tipe_hp` (
  `id_tipe_hp` int(11) NOT NULL,
  `tipe_hp` varchar(15) NOT NULL,
  `id_merk_hp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tipe_hp`
--

INSERT INTO `tb_tipe_hp` (`id_tipe_hp`, `tipe_hp`, `id_merk_hp`) VALUES
(1, 'A50', 1),
(2, 'S9', 1),
(3, 'Redmi Note 5', 2),
(7, 'Note 10', 1),
(9, 'redmi 6', 2),
(10, 'Note pro 7', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tipe_laptop`
--

CREATE TABLE `tb_tipe_laptop` (
  `id_tipe_laptop` int(11) NOT NULL,
  `tipe_laptop` varchar(15) NOT NULL,
  `id_merk_laptop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tipe_laptop`
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
(25, 'vivo01', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ttd_hp`
--

CREATE TABLE `tb_ttd_hp` (
  `id_ttd_hp` int(11) NOT NULL,
  `merk_hp` varchar(20) NOT NULL,
  `tipe_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ttd_laptop`
--

CREATE TABLE `tb_ttd_laptop` (
  `id_ttd_laptop` int(11) NOT NULL,
  `merk_laptop` varchar(20) NOT NULL,
  `tipe_laptop` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$dTTtjRn/BvzLnmIPN0ReG.9Q6qamYYeLydNRToD4GlZRtJBV1FM5.'),
(3, 'andika99', '$2y$10$Dk3ng0oBjQuJHwQGtjm0j.mMg83lfaU7NZmpM9fam3oBe1AXo09wG'),
(4, 'indahcell', '$2y$10$YoG2JzhvJaooAAtwKkj1veD/8Yj31ogJh/LidadryujAeuiCltzey'),
(5, 'aricell', '$2y$10$HRXq5dFwqo49LidEq8eYJ.SKZyCgn7wxLyhiAN6kRMEzd363ojWji'),
(6, 'anaafi', '$2y$10$wU4B4Tgt29TsYs8ZTXMNO.IjmtgBV5Uds9WFm4HOrwBTyUgjaGT5.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_voucher_hp`
--

CREATE TABLE `tb_voucher_hp` (
  `id_voucher_hp` int(11) NOT NULL,
  `voucher_hp` varchar(7) NOT NULL,
  `id_perbaikan_hp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_voucher_hp`
--

INSERT INTO `tb_voucher_hp` (`id_voucher_hp`, `voucher_hp`, `id_perbaikan_hp`) VALUES
(14, 'q2KpEDR', 5007);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_voucher_laptop`
--

CREATE TABLE `tb_voucher_laptop` (
  `id_voucher_laptop` int(11) NOT NULL,
  `voucher_laptop` varchar(7) NOT NULL,
  `id_perbaikan_laptop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_voucher_laptop`
--

INSERT INTO `tb_voucher_laptop` (`id_voucher_laptop`, `voucher_laptop`, `id_perbaikan_laptop`) VALUES
(24, 'V1zbqrA', 36),
(25, 'cSLtrLB', 37);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_waktu_perbaikan_hp`
--

CREATE TABLE `tb_waktu_perbaikan_hp` (
  `id_waktu_perbaikan_hp` int(11) NOT NULL,
  `waktu_tanggal` varchar(50) NOT NULL,
  `waktu_hari` varchar(10) NOT NULL,
  `berakhir` varchar(20) NOT NULL,
  `id_perbaikan_hp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_waktu_perbaikan_hp`
--

INSERT INTO `tb_waktu_perbaikan_hp` (`id_waktu_perbaikan_hp`, `waktu_tanggal`, `waktu_hari`, `berakhir`, `id_perbaikan_hp`) VALUES
(6, '30-December-2019 sampai 6-January-2020', '7 hari', '1578329999999', 5007);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_waktu_perbaikan_laptop`
--

CREATE TABLE `tb_waktu_perbaikan_laptop` (
  `id_waktu_perbaikan_laptop` int(11) NOT NULL,
  `waktu_tanggal` varchar(50) NOT NULL,
  `waktu_hari` varchar(10) NOT NULL,
  `berakhir` varchar(20) NOT NULL,
  `id_perbaikan_laptop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_waktu_perbaikan_laptop`
--

INSERT INTO `tb_waktu_perbaikan_laptop` (`id_waktu_perbaikan_laptop`, `waktu_tanggal`, `waktu_hari`, `berakhir`, `id_perbaikan_laptop`) VALUES
(22, '30-December-2019 sampai 6-January-2020', '7 hari', '1578329999999', 36),
(23, '30-December-2019 sampai 13-January-2020', '14 hari', '1578934799999', 37);

-- --------------------------------------------------------

--
-- Struktur dari tabel `verifikasi_mitra`
--

CREATE TABLE `verifikasi_mitra` (
  `id_verifikasi` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `lama` int(10) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `tanggal_hari` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `verifikasi_mitra`
--

INSERT INTO `verifikasi_mitra` (`id_verifikasi`, `id_mitra`, `lama`, `harga`, `tanggal_hari`) VALUES
(8, 66, 183, 'Rp. 100.000,00', '30-December-2019 sam'),
(9, 67, 183, 'Rp. 100.000,00', '30-December-2019 sam'),
(10, 66, 183, 'Rp. 100.000,00', '30-December-2019 sam');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tb_kerusakan_hp`
--
ALTER TABLE `tb_kerusakan_hp`
  ADD PRIMARY KEY (`id_kerusakan_hp`);

--
-- Indeks untuk tabel `tb_kerusakan_laptop`
--
ALTER TABLE `tb_kerusakan_laptop`
  ADD PRIMARY KEY (`id_kerusakan_laptop`);

--
-- Indeks untuk tabel `tb_merk_hp`
--
ALTER TABLE `tb_merk_hp`
  ADD PRIMARY KEY (`id_merk_hp`);

--
-- Indeks untuk tabel `tb_merk_laptop`
--
ALTER TABLE `tb_merk_laptop`
  ADD PRIMARY KEY (`id_merk_laptop`);

--
-- Indeks untuk tabel `tb_mitra`
--
ALTER TABLE `tb_mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indeks untuk tabel `tb_notif_mitra`
--
ALTER TABLE `tb_notif_mitra`
  ADD PRIMARY KEY (`id_notif_mitra`);

--
-- Indeks untuk tabel `tb_notif_pelanggan`
--
ALTER TABLE `tb_notif_pelanggan`
  ADD PRIMARY KEY (`id_notif_pelanggan`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_perbaikan_hp`
--
ALTER TABLE `tb_perbaikan_hp`
  ADD PRIMARY KEY (`id_perbaikan`);

--
-- Indeks untuk tabel `tb_perbaikan_laptop`
--
ALTER TABLE `tb_perbaikan_laptop`
  ADD PRIMARY KEY (`id_perbaikan`);

--
-- Indeks untuk tabel `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indeks untuk tabel `tb_status_perbaikan`
--
ALTER TABLE `tb_status_perbaikan`
  ADD PRIMARY KEY (`id_status_perbaikan`);

--
-- Indeks untuk tabel `tb_tipe_hp`
--
ALTER TABLE `tb_tipe_hp`
  ADD PRIMARY KEY (`id_tipe_hp`);

--
-- Indeks untuk tabel `tb_tipe_laptop`
--
ALTER TABLE `tb_tipe_laptop`
  ADD PRIMARY KEY (`id_tipe_laptop`);

--
-- Indeks untuk tabel `tb_ttd_hp`
--
ALTER TABLE `tb_ttd_hp`
  ADD PRIMARY KEY (`id_ttd_hp`);

--
-- Indeks untuk tabel `tb_ttd_laptop`
--
ALTER TABLE `tb_ttd_laptop`
  ADD PRIMARY KEY (`id_ttd_laptop`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_voucher_hp`
--
ALTER TABLE `tb_voucher_hp`
  ADD PRIMARY KEY (`id_voucher_hp`);

--
-- Indeks untuk tabel `tb_voucher_laptop`
--
ALTER TABLE `tb_voucher_laptop`
  ADD PRIMARY KEY (`id_voucher_laptop`);

--
-- Indeks untuk tabel `tb_waktu_perbaikan_hp`
--
ALTER TABLE `tb_waktu_perbaikan_hp`
  ADD PRIMARY KEY (`id_waktu_perbaikan_hp`);

--
-- Indeks untuk tabel `tb_waktu_perbaikan_laptop`
--
ALTER TABLE `tb_waktu_perbaikan_laptop`
  ADD PRIMARY KEY (`id_waktu_perbaikan_laptop`);

--
-- Indeks untuk tabel `verifikasi_mitra`
--
ALTER TABLE `verifikasi_mitra`
  ADD PRIMARY KEY (`id_verifikasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kerusakan_hp`
--
ALTER TABLE `tb_kerusakan_hp`
  MODIFY `id_kerusakan_hp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_kerusakan_laptop`
--
ALTER TABLE `tb_kerusakan_laptop`
  MODIFY `id_kerusakan_laptop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_merk_hp`
--
ALTER TABLE `tb_merk_hp`
  MODIFY `id_merk_hp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_merk_laptop`
--
ALTER TABLE `tb_merk_laptop`
  MODIFY `id_merk_laptop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_mitra`
--
ALTER TABLE `tb_mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `tb_notif_mitra`
--
ALTER TABLE `tb_notif_mitra`
  MODIFY `id_notif_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_notif_pelanggan`
--
ALTER TABLE `tb_notif_pelanggan`
  MODIFY `id_notif_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_perbaikan_hp`
--
ALTER TABLE `tb_perbaikan_hp`
  MODIFY `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5008;

--
-- AUTO_INCREMENT untuk tabel `tb_perbaikan_laptop`
--
ALTER TABLE `tb_perbaikan_laptop`
  MODIFY `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_tipe_hp`
--
ALTER TABLE `tb_tipe_hp`
  MODIFY `id_tipe_hp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_tipe_laptop`
--
ALTER TABLE `tb_tipe_laptop`
  MODIFY `id_tipe_laptop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_voucher_hp`
--
ALTER TABLE `tb_voucher_hp`
  MODIFY `id_voucher_hp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_voucher_laptop`
--
ALTER TABLE `tb_voucher_laptop`
  MODIFY `id_voucher_laptop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_waktu_perbaikan_hp`
--
ALTER TABLE `tb_waktu_perbaikan_hp`
  MODIFY `id_waktu_perbaikan_hp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_waktu_perbaikan_laptop`
--
ALTER TABLE `tb_waktu_perbaikan_laptop`
  MODIFY `id_waktu_perbaikan_laptop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `verifikasi_mitra`
--
ALTER TABLE `verifikasi_mitra`
  MODIFY `id_verifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
