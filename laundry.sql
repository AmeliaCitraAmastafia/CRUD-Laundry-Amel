-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 09 Jun 2025 pada 08.04
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detil_transaksi`
--

CREATE TABLE `detil_transaksi` (
  `kd_detil` char(16) NOT NULL,
  `no_nota` char(36) NOT NULL,
  `kd_paket` char(10) NOT NULL,
  `berat` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detil_transaksi`
--

INSERT INTO `detil_transaksi` (`kd_detil`, `no_nota`, `kd_paket`, `berat`, `total_biaya`) VALUES
('0', 'abc', 'PA00001', 3, 60000),
('detail9', '12345678', 'PA00001', 5, 100000),
('DetailNota1', 'NoNota11223', 'PA00001', 4, 80000),
('jk', 'a', 'PA00001', 1, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `kd_paket` char(10) NOT NULL,
  `nama_paket` varchar(30) NOT NULL,
  `jenis_paket` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`kd_paket`, `nama_paket`, `jenis_paket`, `harga`) VALUES
('PA00001', 'PAKET 1', 'Setrika, Cuci, Kering    \r\n   ', 20000),
('PA00002', 'PAKET 2', 'Cuci, Setrika\r\n       ', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kd_pelanggan` char(10) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`kd_pelanggan`, `nama_pelanggan`, `alamat`, `no_telp`) VALUES
('P00001', 'Amelia Citra Amastafia', 'Jalan kucing', '089765434543'),
('P00002', 'Zaskia Aprilia', 'Jalan Kumis Harimau No.10', '089518044109');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_nota` char(36) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `kd_pelanggan` char(10) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_nota`, `tgl_transaksi`, `kd_pelanggan`, `total_bayar`) VALUES
('12345678', '2025-06-09 00:00:00', 'P00001', 100000),
('a', '2025-06-09 00:00:00', 'P00002', 20000),
('abc', '2025-06-09 09:57:00', 'P00001', 60000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD PRIMARY KEY (`kd_detil`),
  ADD KEY `no_nota` (`no_nota`),
  ADD KEY `kd_paket` (`kd_paket`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`kd_paket`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kd_pelanggan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_nota`),
  ADD KEY `kd_pelanggan` (`kd_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
