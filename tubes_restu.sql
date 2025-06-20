-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2025 pada 14.04
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_restu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `ikon` varchar(100) DEFAULT NULL,
  `penjelasan` text DEFAULT NULL,
  `kode` text DEFAULT NULL,
  `output` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `judul`, `ikon`, `penjelasan`, `kode`, `output`) VALUES
(1, 'Operator', 'fa-plus', 'Operator digunakan untuk melakukan operasi pada variabel.', '<?php $a=5; $b=3; echo $a+$b; ?>', '8'),
(2, 'Struktur Kontrol', 'fa-code-branch', 'Digunakan untuk mengatur alur program berdasarkan kondisi.', '<?php $nilai=80; if($nilai>=75){ echo \"Lulus\"; } ?>', 'Lulus'),
(3, 'Perulangan', 'fa-repeat', 'Perulangan digunakan untuk mengulang eksekusi kode.', '<?php for($i=1;$i<=5;$i++){ echo $i; } ?>', '12345'),
(4, 'Require & Include', 'fa-file-import', 'Digunakan untuk menyisipkan file lain ke dalam file utama PHP.', '<?php include(\"header.php\"); echo \"Isi Halaman\"; ?>', 'Isi dari header.php + Isi Halaman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Tri Restu Sanubari', 'admin', 'admin@email.com', '123', 'user', '2025-06-19 06:57:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
