-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2019 pada 16.43
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_barang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(20) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `stock_barang` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jenis_barang`, `stock_barang`) VALUES
(1, 'Buku Tulis', 'Alat Tulis', 180),
(5, 'Pulpen', 'Alat Tulis', 90),
(8, 'Kaos Polos', 'Pakaian', 140),
(10, 'Bedak', 'Kosmetik', 85);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(20) NOT NULL,
  `nama_customer` varchar(20) NOT NULL,
  `alamat_customer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat_customer`) VALUES
(1, 'Toko A', 'Tasikmalaya'),
(3, 'Toko B', 'Banjar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(55) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `fullname`, `level`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin'),
(3, 'rizki', 'bdacaeb902ffe38f39293104fecacbe7', 'rizki', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(20) NOT NULL,
  `nama_supplier` varchar(20) NOT NULL,
  `alamat_supplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`) VALUES
(1, 'PT. Mayora', 'Bekasi'),
(4, 'PT. Delfi', 'Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_keluar`
--

CREATE TABLE `transaksi_keluar` (
  `id_transaksi_keluar` int(20) NOT NULL,
  `tgl_transaksi_keluar` date NOT NULL,
  `id_barang` int(20) NOT NULL,
  `id_customer` int(20) NOT NULL,
  `banyak_barang_keluar` int(20) NOT NULL,
  `harga_satuan` int(20) NOT NULL,
  `total_bayar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_keluar`
--

INSERT INTO `transaksi_keluar` (`id_transaksi_keluar`, `tgl_transaksi_keluar`, `id_barang`, `id_customer`, `banyak_barang_keluar`, `harga_satuan`, `total_bayar`) VALUES
(4, '2019-11-06', 10, 1, 15, 5500, 82500);

--
-- Trigger `transaksi_keluar`
--
DELIMITER $$
CREATE TRIGGER `stockBarang` AFTER INSERT ON `transaksi_keluar` FOR EACH ROW BEGIN
UPDATE barang SET stock_barang=stock_barang-NEW.banyak_barang_keluar WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_masuk`
--

CREATE TABLE `transaksi_masuk` (
  `id_transaksi_masuk` int(20) NOT NULL,
  `tgl_transaksi_masuk` date NOT NULL,
  `id_barang` int(20) NOT NULL,
  `id_supplier` int(20) NOT NULL,
  `banyak_barang_masuk` int(20) NOT NULL,
  `harga_satuan` int(20) NOT NULL,
  `total_bayar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_masuk`
--

INSERT INTO `transaksi_masuk` (`id_transaksi_masuk`, `tgl_transaksi_masuk`, `id_barang`, `id_supplier`, `banyak_barang_masuk`, `harga_satuan`, `total_bayar`) VALUES
(16, '2019-11-04', 8, 1, 20, 10000, 200000),
(19, '2019-11-06', 1, 4, 200, 2000, 400000),
(20, '2019-11-07', 1, 1, 50, 1000, 50000),
(21, '2019-10-29', 5, 4, 50, 1000, 50000),
(22, '2019-11-08', 10, 4, 100, 5000, 500000);

--
-- Trigger `transaksi_masuk`
--
DELIMITER $$
CREATE TRIGGER `stock` AFTER INSERT ON `transaksi_masuk` FOR EACH ROW BEGIN
UPDATE barang SET stock_barang=stock_barang+NEW.banyak_barang_masuk WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
  ADD PRIMARY KEY (`id_transaksi_keluar`),
  ADD KEY `id_barang` (`id_barang`,`id_customer`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  ADD PRIMARY KEY (`id_transaksi_masuk`),
  ADD KEY `id_barang` (`id_barang`,`id_supplier`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
  MODIFY `id_transaksi_keluar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  MODIFY `id_transaksi_masuk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
  ADD CONSTRAINT `transaksi_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `transaksi_keluar_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Ketidakleluasaan untuk tabel `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  ADD CONSTRAINT `transaksi_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `transaksi_masuk_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
