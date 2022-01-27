-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jan 2022 pada 03.00
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
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

CREATE TABLE `distributor` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_barang`
--

CREATE TABLE `laporan_barang` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nama_distributor` varchar(255) NOT NULL,
  `nama_product` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` decimal(20,4) NOT NULL,
  `created_at` datetime NOT NULL,
  `total_harga` decimal(20,4) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `stok_ahir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_beli` decimal(20,4) NOT NULL,
  `harga_jual` decimal(20,4) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `gudang_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
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
(1, 'admin', '2022-01-26 06:44:48'),
(2, 'staf', '2022-01-26 06:44:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_akses`
--

CREATE TABLE `role_akses` (
  `akses_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_stok_keluar`
--

CREATE TABLE `tr_stok_keluar` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `nama_kapal` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `catatan` text NOT NULL,
  `faktur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_stok_masuk`
--

CREATE TABLE `tr_stok_masuk` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `faktur` varchar(255) NOT NULL
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
