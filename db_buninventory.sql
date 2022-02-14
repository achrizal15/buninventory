-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jan 2022 pada 14.45
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
(7, 'user', 'User Page', '2022-01-30 13:03:28');

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
(5, 'Doel', '08237818', 'doel@gmail.com', 'Kmonn', '2022-01-28 00:00:00');

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
(2, 'pujasera', '2022-01-27 13:59:29', 'G02'),
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

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `kode`, `qty`, `harga_beli`, `harga_jual`, `gambar`, `gudang_id`, `created_at`, `satuan_id`) VALUES
(12, 'Pop mie nasi', 'P011', 150, '321.0000', '233.0000', 'ruijie.png', 1, '2022-01-27 00:00:00', 4),
(14, 'Kain', 'P013', 1, '244444.0000', '32144.0000', 'default.png', 2, '2022-01-27 00:00:00', 2),
(15, 'Coba', 'P014', 0, '321.0000', '123.0000', 'default.png', 1, '2022-01-27 00:00:00', 3),
(16, 'Masako', 'P015', 0, '321.0000', '213.0000', 'default.png', 2, '2022-01-28 00:00:00', 2);

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
(1, 'admin', '2022-01-26 06:44:48'),
(4, 'Staf', '2022-01-30 12:50:48'),
(5, 'Catering Staf', '2022-01-30 12:54:41'),
(9, 'Staf It', '2022-01-30 13:21:01');

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
(2, 1),
(1, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(0, 0),
(1, 4),
(3, 4),
(5, 4),
(2, 0),
(3, 0),
(5, 0),
(7, 1),
(1, 9),
(3, 9),
(5, 9),
(1, 5),
(7, 5),
(2, 5);

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

--
-- Dumping data untuk tabel `tr_stok_keluar`
--

INSERT INTO `tr_stok_keluar` (`id`, `produk_id`, `kepada`, `nama_kapal`, `qty`, `created_at`, `catatan`, `faktur`, `stok_ahir`) VALUES
(1, 14, 'kepad', 'kapal', 21, '2022-01-26 00:00:00', '', 'STO51122', 300),
(3, 12, 'Rizal', 'Nusa Bangsa', 20, '2022-01-29 00:00:00', '', 'STO31122', 0),
(5, 16, 'Rizal', 'PT NUSA', 200, '2022-01-30 10:46:54', '', 'STO421122', 0);

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
  `created_at` int(11) NOT NULL,
  `faktur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tr_stok_masuk`
--

INSERT INTO `tr_stok_masuk` (`id`, `produk_id`, `distributor_id`, `qty`, `catatan`, `created_at`, `faktur`) VALUES
(2, 12, 4, 10, '', 2022, ''),
(3, 12, 4, 10, 'Baru saja dirubah', 2022, ''),
(4, 12, 4, 10, '', 2022, NULL),
(5, 14, 4, 321, '', 2022, 'FK'),
(7, 13, 5, 5, '', 2022, 'Kuntul'),
(9, 16, 5, 100, '', 2022, 'COBA LAGI'),
(10, 14, 5, 4, '', 2022, ''),
(11, 14, 5, 2, '', 2022, ''),
(12, 16, 5, 20, '', 2022, 'STI276011227'),
(13, 16, 5, 80, '', 2022, 'STI45001122'),
(14, 12, 5, 150, '', 2022, 'STI9001122');

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
(3, 'Rizal Ach', 'achrizal@gmail.com', '$2y$10$DBv8kFTgwrLfmvEAfm.TCOxz7sxNVVQqOrGhjP1CdYAOMr04y0eS6', 1, '2022-01-30 07:26:07'),
(4, 'Koko', 'koko@gmail.com', '$2y$10$RwnXnVmK5i44meQnGwUfu.3xU4HiPwZJidlEO/3Lo8ACGf13d5LPS', 5, '2022-01-30 14:11:50');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tr_stok_keluar`
--
ALTER TABLE `tr_stok_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tr_stok_masuk`
--
ALTER TABLE `tr_stok_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
