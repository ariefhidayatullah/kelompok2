-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2020 pada 22.27
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_actived` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `is_actived`, `date_created`) VALUES
(1, 'admin', '$2y$10$dTTtjRn/BvzLnmIPN0ReG.9Q6qamYYeLydNRToD4GlZRtJBV1FM5.', 0, 0),
(3, 'andika99', '$2y$10$Dk3ng0oBjQuJHwQGtjm0j.mMg83lfaU7NZmpM9fam3oBe1AXo09wG', 1, 0),
(4, 'indahcell', '$2y$10$YoG2JzhvJaooAAtwKkj1veD/8Yj31ogJh/LidadryujAeuiCltzey', 0, 0),
(5, 'aricell', '$2y$10$HRXq5dFwqo49LidEq8eYJ.SKZyCgn7wxLyhiAN6kRMEzd363ojWji', 0, 0),
(6, 'anaafi', '$2y$10$wU4B4Tgt29TsYs8ZTXMNO.IjmtgBV5Uds9WFm4HOrwBTyUgjaGT5.', 0, 0),
(7, 'asdfasdf', '$2y$10$ez4gpELjtHIJ0vTOc8mBPuWJ5Y1MG8HHl6zix7t3/XwTEnVhndYUq', 0, 0),
(8, 'okegoes', '$2y$10$dAahgiK3D/MslMXl9A8UnOLzU9jBTynY2Nm8h8GWEHZ7RLwWxYc46', 0, 0),
(9, 'saih', '$2y$10$vucLTE0LwhABebvZbdJRS.JFSx5740QwO0k4ESl33LlpC/5E8Nejm', 1, 1589842859);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
