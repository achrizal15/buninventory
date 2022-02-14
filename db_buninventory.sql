-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Feb 2022 pada 05.20
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_buninventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id`, `nama`, `content`, `created_at`) VALUES
(1, 'home', 'home', '2022-01-30 08:04:51'),
(2, 'produk', 'produk', '2022-01-30 08:04:51'),
(3, 'distributor', 'distributor', '2022-01-30 09:54:06'),
(4, 'gudang', 'gudang & satuan', '2022-01-30 09:54:06'),
(5, 'stokmasuk', 'stok masuk', '2022-01-30 09:54:47'),
(6, 'stokkeluar', 'stok keluar', '2022-01-30 09:54:47'),
(7, 'user', 'User Page', '2022-01-30 13:03:28'),
(8, 'laporan', 'Laporan', '2022-02-14 00:13:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

CREATE TABLE `distributor` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `distributor`
--

INSERT INTO `distributor` (`id`, `nama`, `telepon`, `email`, `alamat`, `created_at`) VALUES
(5, 'Doel Jancukx', '08237818', 'doel@gmail.com', 'Kmonn', '2022-01-28 00:00:00'),
(6, 'Rizal A', '082344566123', 'achrizal@gmail.com', 'Kemiren', '2022-01-31 02:53:03'),
(7, 'Koko', '08831278818', 'achkoko@gmail.com', 'Glagah', '2022-01-31 03:01:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang`
--

CREATE TABLE `gudang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `kode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gudang`
--

INSERT INTO `gudang` (`id`, `nama`, `created_at`, `kode`) VALUES
(1, 'cafe', '2022-01-27 13:59:29', 'G01'),
(4, 'Catering', '0000-00-00 00:00:00', 'G03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_beli` decimal(20,4) NOT NULL,
  `harga_jual` decimal(20,4) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `gudang_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `satuan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `nama`, `created_at`) VALUES
(1, 'Admin', '2022-01-26 06:44:48'),
(4, 'Staf', '2022-01-30 12:50:48'),
(11, 'Kepala Gudang', '2022-02-01 06:07:44'),
(12, 'Admin2', '2022-02-01 07:07:53'),
(13, 'Tukang Kebun', '2022-02-09 06:48:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_akses`
--

CREATE TABLE `role_akses` (
  `akses_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role_akses`
--

INSERT INTO `role_akses` (`akses_id`, `role_id`) VALUES
(0, 0),
(2, 0),
(3, 0),
(5, 0),
(1, 1),
(3, 1),
(5, 1),
(7, 1),
(2, 1),
(4, 1),
(6, 1),
(1, 11),
(5, 11),
(6, 11),
(1, 12),
(3, 12),
(5, 12),
(2, 12),
(4, 12),
(6, 12),
(1, 4),
(1, 13),
(2, 13),
(8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `nama`, `created_at`) VALUES
(2, 'Kardus', '2022-01-27 14:50:29'),
(3, 'Biji', '0000-00-00 00:00:00'),
(4, 'Liter', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_stok_keluar`
--

CREATE TABLE `tr_stok_keluar` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `nama_kapal` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `catatan` text NOT NULL,
  `faktur` varchar(255) NOT NULL,
  `stok_ahir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_stok_masuk`
--

CREATE TABLE `tr_stok_masuk` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `faktur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role_id`, `created_at`) VALUES
(3, 'Rizal Ach', 'achrizal@gmail.com', '$2y$10$LH4CTND9L.Bcmn3l9d9sB.KeSVVMUnZFBPPlyx8eMz/ye5sQYJoQG', 1, '2022-01-30 07:26:07'),
(4, 'Koko', 'koko@gmail.com', '$2y$10$RwnXnVmK5i44meQnGwUfu.3xU4HiPwZJidlEO/3Lo8ACGf13d5LPS', 4, '2022-01-30 14:11:50'),
(9, 'KOko', 'achrizal@gmail.comw', '$2y$10$BHXxZBK33kIxVLwMfpE5UeT1eCmZKofxIbI1ss06FcmlyZYSOee/.', 1, '2022-01-31 02:59:23'),
(11, 'Bre', 'achbre@gmail.com', '$2y$10$4oGuFSPlcDFLFhFzwLcfTehQdnIJh5kdbwFFpx5vWAN0ysjvS1wv2', 11, '2022-02-01 06:08:06'),
(12, 'Bolang', 'bolang@gmail.com', '$2y$10$B7XU2tSWABfNGPjnDSUESe0LA3Js7lrASDHpXVYyFybuAFZkBv8f2', 13, '2022-02-09 06:48:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tr_stok_keluar`
--
ALTER TABLE `tr_stok_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tr_stok_masuk`
--
ALTER TABLE `tr_stok_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tr_stok_keluar`
--
ALTER TABLE `tr_stok_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tr_stok_masuk`
--
ALTER TABLE `tr_stok_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
