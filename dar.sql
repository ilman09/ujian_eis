-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Bulan Mei 2022 pada 06.50
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL COMMENT 'Primary Key',
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` text NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `entry_date` datetime DEFAULT NULL COMMENT 'Create Time',
  `delete_date` datetime DEFAULT NULL COMMENT 'Update Time',
  `update_date` datetime DEFAULT NULL COMMENT 'Update Time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`id_comment`, `id_post`, `id_user`, `comment`, `is_delete`, `entry_date`, `delete_date`, `update_date`) VALUES
(1, 1, 1, 'tes komentar', 1, '2022-04-30 23:35:28', '2022-04-30 23:35:28', '2022-04-30 23:35:28'),
(2, 2, 1, 'test status', 0, '2022-04-30 23:41:15', '2022-04-30 23:41:15', '2022-04-30 23:41:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL COMMENT 'Primary Key',
  `id_user` int(11) NOT NULL DEFAULT 0,
  `status` text NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `entry_date` datetime DEFAULT NULL COMMENT 'Create Time',
  `delete_date` datetime DEFAULT NULL COMMENT 'Create Time',
  `update_date` datetime DEFAULT NULL COMMENT 'Update Time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id_post`, `id_user`, `status`, `is_deleted`, `entry_date`, `delete_date`, `update_date`) VALUES
(1, 1, 'post status', 1, '2022-04-30 23:27:09', '2022-04-30 23:27:09', '2022-04-30 23:27:09'),
(2, 1, 'status 1', 0, '2022-04-30 23:41:02', '2022-04-30 23:41:02', '2022-04-30 23:41:02'),
(3, 1, 'status 2', 0, '2022-04-30 23:41:51', '2022-04-30 23:41:51', '2022-04-30 23:41:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL COMMENT 'Primary Key',
  `name` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `password`, `email`) VALUES
(1, 'jalzae', 'adcd7048512e64b48da55b027577886ee5a36350', 'jalzae@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
