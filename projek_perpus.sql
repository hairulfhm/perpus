-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 06 Jan 2023 pada 16.21
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `kd_anggota` varchar(6) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `tlp` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tgl_daftar` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`kd_anggota`, `nama_anggota`, `tlp`, `email`, `tgl_daftar`) VALUES
('ANG001', 'Imran Khan', '08765423478', 'iroel.ami@gmail.com', '2023-01-06 14:47:21'),
('ANG002', 'Muliadi', '878787878', 'mul@gmail.com', '2023-01-06 22:17:48'),
('ANG003', 'Markona', '98989898', 'mar@kona.com', '2023-01-06 22:18:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kd_buku` varchar(12) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `thn_terbit` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kd_buku`, `judul_buku`, `id_penerbit`, `thn_terbit`) VALUES
('BK001', 'Sistem Basis Data', 2, 2020),
('BK002', 'Matematika Diskrit', 3, 2021),
('BK003', 'Sistem Basis Data', 2, 2020),
('BK004', 'Mahir 6 Jam Belajar PHP', 5, 2022);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_pinjam` varchar(5) NOT NULL,
  `kd_buku` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_pinjam`, `kd_buku`) VALUES
('TR001', 'BK001'),
('TR001', 'BK002'),
('TR002', 'BK003'),
('TR002', 'BK004'),
('TR003', 'BK002'),
('TR003', 'BK003'),
('TR003', 'BK004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('yati', '1a3de730b78358fdd87727f123245162');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` varchar(6) NOT NULL,
  `kd_anggota` varchar(6) NOT NULL,
  `tgl_pinjam` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `kd_anggota`, `tgl_pinjam`) VALUES
('TR001', 'ANG001', '2023-01-06 21:47:59'),
('TR002', 'ANG003', '2023-01-06 22:18:54'),
('TR003', 'ANG002', '2023-01-06 22:19:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `alamat`) VALUES
(2, 'Gramedia', 'Jakarta'),
(3, 'Gunung Agung', 'Jakarta'),
(4, 'El-Rahma', 'Bandung'),
(5, 'Bukunesia', 'Malang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`kd_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kd_buku`),
  ADD KEY `fk_penerbit` (`id_penerbit`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_penerbit` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
