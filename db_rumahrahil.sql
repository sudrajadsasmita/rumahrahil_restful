-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Nov 2020 pada 04.40
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rumahrahil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'rumahrahileducation', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bab_latihan`
--

CREATE TABLE `tb_bab_latihan` (
  `id_bab_latihan` int(11) NOT NULL,
  `jurusan_id` int(11) DEFAULT NULL,
  `mapel_id` int(11) NOT NULL,
  `jenjang_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama_bab` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bab_latihan`
--

INSERT INTO `tb_bab_latihan` (`id_bab_latihan`, `jurusan_id`, `mapel_id`, `jenjang_id`, `kelas_id`, `nama_bab`) VALUES
(1, NULL, 1, 2, 7, 'Besaran Satuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban_latihan`
--

CREATE TABLE `tb_jawaban_latihan` (
  `id_jawaban_latihan` int(11) NOT NULL,
  `soal_latihan_id` int(11) NOT NULL,
  `kunci_jawaban_latihan_id` int(11) NOT NULL,
  `option_a` varchar(128) NOT NULL,
  `option_b` varchar(128) NOT NULL,
  `option_c` varchar(128) NOT NULL,
  `option_d` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban_latihan_sd`
--

CREATE TABLE `tb_jawaban_latihan_sd` (
  `id_jawaban_latihan_sd` int(11) NOT NULL,
  `paket_latihan_sd_id` int(11) NOT NULL,
  `no_soal_id` int(11) NOT NULL,
  `option_a` varchar(128) NOT NULL,
  `option_b` varchar(128) NOT NULL,
  `option_c` varchar(128) NOT NULL,
  `option_d` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jawaban_latihan_sd`
--

INSERT INTO `tb_jawaban_latihan_sd` (`id_jawaban_latihan_sd`, `paket_latihan_sd_id`, `no_soal_id`, `option_a`, `option_b`, `option_c`, `option_d`) VALUES
(7, 7, 1, 'dsa', 'dsa', 'dsa', 'dsa'),
(8, 7, 2, 'dsa', 'dsa', 'dsa', 'dsa'),
(9, 7, 2, 'dsa', 'dsa', 'dsa', 'dsa'),
(10, 7, 2, 'dsa', 'dsa', 'dsa', 'dsa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban_ujian`
--

CREATE TABLE `tb_jawaban_ujian` (
  `id_jawaban_ujian` int(11) NOT NULL,
  `kunci_jawaban_ujian_id` int(11) NOT NULL,
  `soal_ujian_id` int(11) NOT NULL,
  `option_a` varchar(128) NOT NULL,
  `option_b` varchar(128) NOT NULL,
  `option_c` varchar(128) NOT NULL,
  `option_d` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenjang`
--

CREATE TABLE `tb_jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `nama_jenjang` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenjang`
--

INSERT INTO `tb_jenjang` (`id_jenjang`, `nama_jenjang`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'IPA'),
(2, 'IPS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'Kelas 1'),
(2, 'Kelas 2'),
(3, 'Kelas 3'),
(4, 'Kelas 4'),
(5, 'Kelas 5'),
(6, 'Kelas 6'),
(7, 'Kelas 7'),
(8, 'Kelas 8'),
(9, 'Kelas 9'),
(10, 'Kelas 10'),
(11, 'Kelas 11'),
(12, 'Kelas 12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kunci_jawaban_latihan`
--

CREATE TABLE `tb_kunci_jawaban_latihan` (
  `id_kunci_jawaban_latihan` int(11) NOT NULL,
  `paket_latihan_id` int(11) NOT NULL,
  `jawaban_benar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kunci_jawaban_sd`
--

CREATE TABLE `tb_kunci_jawaban_sd` (
  `id_kunci_jawaban_sd` int(11) NOT NULL,
  `paket_latihan_sd_id` int(11) NOT NULL,
  `no_soal_id` int(11) NOT NULL,
  `jawaban_benar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kunci_jawaban_sd`
--

INSERT INTO `tb_kunci_jawaban_sd` (`id_kunci_jawaban_sd`, `paket_latihan_sd_id`, `no_soal_id`, `jawaban_benar`) VALUES
(12, 7, 1, 'A'),
(13, 7, 2, 'D'),
(14, 7, 2, 'D'),
(15, 7, 2, 'D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kunci_jawaban_ujian`
--

CREATE TABLE `tb_kunci_jawaban_ujian` (
  `id_kunci_jawaban_ujian` int(11) NOT NULL,
  `paket_ujian_id` int(11) NOT NULL,
  `jawaban_benar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama_mapel` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `kelas_id`, `nama_mapel`) VALUES
(1, 7, 'IPA'),
(2, 7, 'IPS'),
(3, 8, 'IPA'),
(4, 8, 'IPS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu_backend`
--

CREATE TABLE `tb_menu_backend` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_menu_backend`
--

INSERT INTO `tb_menu_backend` (`id_menu`, `menu`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA'),
(4, 'TES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_latihan`
--

CREATE TABLE `tb_nilai_latihan` (
  `id_nilai_latihan` int(11) NOT NULL,
  `bab_latihan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_latihan_sd`
--

CREATE TABLE `tb_nilai_latihan_sd` (
  `id_nilai_latihan_sd` int(11) NOT NULL,
  `subtema_sd_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_ujian`
--

CREATE TABLE `tb_nilai_ujian` (
  `id_nilai_ujian` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `paket_ujian_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_no_soal`
--

CREATE TABLE `tb_no_soal` (
  `id_no_soal` int(11) NOT NULL,
  `no_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_no_soal`
--

INSERT INTO `tb_no_soal` (`id_no_soal`, `no_soal`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 39),
(40, 40),
(41, 41),
(42, 42),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(48, 48),
(49, 49),
(50, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket_latihan`
--

CREATE TABLE `tb_paket_latihan` (
  `id_paket_latihan` int(11) NOT NULL,
  `bab_latihan_id` int(11) NOT NULL,
  `nama_paket` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket_latihan_sd`
--

CREATE TABLE `tb_paket_latihan_sd` (
  `id_paket_latihan_sd` int(11) NOT NULL,
  `subtema_sd_id` int(11) NOT NULL,
  `nama_paket_sd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_paket_latihan_sd`
--

INSERT INTO `tb_paket_latihan_sd` (`id_paket_latihan_sd`, `subtema_sd_id`, `nama_paket_sd`) VALUES
(7, 7, 'Paket 1'),
(8, 8, 'Paket 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket_ujian`
--

CREATE TABLE `tb_paket_ujian` (
  `id_paket_ujian` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `jenjang_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama_paket` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal_latihan`
--

CREATE TABLE `tb_soal_latihan` (
  `id_soal_latihan` int(11) NOT NULL,
  `paket_latihan_id` int(11) NOT NULL,
  `no_soal` int(11) NOT NULL,
  `soal_text` text NOT NULL,
  `soal_gambar` varchar(256) NOT NULL,
  `soal_suara` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal_latihan_sd`
--

CREATE TABLE `tb_soal_latihan_sd` (
  `id_soal_latihan_sd` int(11) NOT NULL,
  `paket_latihan_sd_id` int(11) NOT NULL,
  `no_soal_id` int(11) NOT NULL,
  `soal_text` text NOT NULL,
  `soal_gambar` varchar(256) DEFAULT NULL,
  `soal_suara` varchar(256) DEFAULT NULL,
  `option_a` varchar(256) NOT NULL,
  `option_b` varchar(256) NOT NULL,
  `option_c` varchar(256) NOT NULL,
  `option_d` varchar(256) NOT NULL,
  `jawaban_benar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_soal_latihan_sd`
--

INSERT INTO `tb_soal_latihan_sd` (`id_soal_latihan_sd`, `paket_latihan_sd_id`, `no_soal_id`, `soal_text`, `soal_gambar`, `soal_suara`, `option_a`, `option_b`, `option_c`, `option_d`, `jawaban_benar`) VALUES
(41, 7, 1, 'sada', 'http://localhost/rumahrahil_restful/restserver_rumahrahil/assets/img/20160307_123051_-_Copy.jpg', '', 'a', 's', 'a', 'q', 'A'),
(42, 7, 2, 'dsa', 'http://localhost/rumahrahil_restful/restserver_rumahrahil/assets/img/default.png', '', 'a', 'dsa', 'e', 'q', 'B'),
(43, 7, 3, 'dsaasfsfa', 'http://localhost/rumahrahil_restful/restserver_rumahrahil/assets/img/default.png', '', 'a', 'd', 'a', 'dsa', 'C'),
(44, 7, 4, 'dgs', 'http://localhost/rumahrahil_restful/restserver_rumahrahil/assets/img/default.png', '', 'a', 's', 'f', 'q', 'D'),
(45, 7, 5, 'gaddagadg', 'http://localhost/rumahrahil_restful/restserver_rumahrahil/assets/img/default.png', '', 'dsa', 'a', 'e', 'w', 'D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal_ujian`
--

CREATE TABLE `tb_soal_ujian` (
  `id_soal_ujian` int(11) NOT NULL,
  `paket_soal_id` int(11) NOT NULL,
  `no_soal` int(11) NOT NULL,
  `soal_text` text NOT NULL,
  `soal_gambar` varchar(256) NOT NULL,
  `soal_suara` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_submenu_backend`
--

CREATE TABLE `tb_submenu_backend` (
  `id_submenu` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `url` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_subtema_sd`
--

CREATE TABLE `tb_subtema_sd` (
  `id_subtema_sd` int(11) NOT NULL,
  `tema_sd_id` int(11) NOT NULL,
  `nama_subtema` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_subtema_sd`
--

INSERT INTO `tb_subtema_sd` (`id_subtema_sd`, `tema_sd_id`, `nama_subtema`) VALUES
(7, 7, 'Subtema 1'),
(8, 8, 'Subtema 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tema_sd`
--

CREATE TABLE `tb_tema_sd` (
  `id_tema_sd` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama_tema` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tema_sd`
--

INSERT INTO `tb_tema_sd` (`id_tema_sd`, `kelas_id`, `nama_tema`) VALUES
(7, 1, 'Tema 1'),
(8, 2, 'Tema 1'),
(9, 3, 'Tema 1'),
(10, 4, 'Tema 1'),
(11, 5, 'Tema 1'),
(12, 1, 'Tema 2'),
(13, 2, 'Tema 2'),
(14, 3, 'Tema 2'),
(15, 4, 'Tema 2'),
(16, 5, 'Tema 2'),
(17, 6, 'Tema 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jurusan_id` int(11) DEFAULT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `jenjang_id` int(11) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `foto_profile` varchar(256) NOT NULL,
  `asal_sekolah` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `role_id`, `jurusan_id`, `mapel_id`, `jenjang_id`, `kelas_id`, `nama`, `alamat`, `email`, `password`, `foto_profile`, `asal_sekolah`) VALUES
(1, 1, 0, 0, 3, 0, 'Sudrajad Dwi Sasmita', 'Blimbing, Malang', 'sudrajad.dwi@gmail.com', 'uwik1234', 'SUDRAJAT_EDIT1.png', 'SMAN 1 Kutorejo'),
(2, 2, 1, 0, 3, 0, 'Bambang', 'Polehan, Malang', 'bambang@gmail.com', '123456789', '2015-09-24_13_17_25.jpg', 'SMAN 1 Malang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_bab_latihan`
--
ALTER TABLE `tb_bab_latihan`
  ADD PRIMARY KEY (`id_bab_latihan`);

--
-- Indeks untuk tabel `tb_jawaban_latihan`
--
ALTER TABLE `tb_jawaban_latihan`
  ADD PRIMARY KEY (`id_jawaban_latihan`);

--
-- Indeks untuk tabel `tb_jawaban_latihan_sd`
--
ALTER TABLE `tb_jawaban_latihan_sd`
  ADD PRIMARY KEY (`id_jawaban_latihan_sd`);

--
-- Indeks untuk tabel `tb_jawaban_ujian`
--
ALTER TABLE `tb_jawaban_ujian`
  ADD PRIMARY KEY (`id_jawaban_ujian`);

--
-- Indeks untuk tabel `tb_jenjang`
--
ALTER TABLE `tb_jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_kunci_jawaban_latihan`
--
ALTER TABLE `tb_kunci_jawaban_latihan`
  ADD PRIMARY KEY (`id_kunci_jawaban_latihan`);

--
-- Indeks untuk tabel `tb_kunci_jawaban_sd`
--
ALTER TABLE `tb_kunci_jawaban_sd`
  ADD PRIMARY KEY (`id_kunci_jawaban_sd`);

--
-- Indeks untuk tabel `tb_kunci_jawaban_ujian`
--
ALTER TABLE `tb_kunci_jawaban_ujian`
  ADD PRIMARY KEY (`id_kunci_jawaban_ujian`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tb_menu_backend`
--
ALTER TABLE `tb_menu_backend`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tb_nilai_latihan`
--
ALTER TABLE `tb_nilai_latihan`
  ADD PRIMARY KEY (`id_nilai_latihan`);

--
-- Indeks untuk tabel `tb_nilai_latihan_sd`
--
ALTER TABLE `tb_nilai_latihan_sd`
  ADD PRIMARY KEY (`id_nilai_latihan_sd`);

--
-- Indeks untuk tabel `tb_nilai_ujian`
--
ALTER TABLE `tb_nilai_ujian`
  ADD PRIMARY KEY (`id_nilai_ujian`);

--
-- Indeks untuk tabel `tb_no_soal`
--
ALTER TABLE `tb_no_soal`
  ADD PRIMARY KEY (`id_no_soal`);

--
-- Indeks untuk tabel `tb_paket_latihan`
--
ALTER TABLE `tb_paket_latihan`
  ADD PRIMARY KEY (`id_paket_latihan`);

--
-- Indeks untuk tabel `tb_paket_latihan_sd`
--
ALTER TABLE `tb_paket_latihan_sd`
  ADD PRIMARY KEY (`id_paket_latihan_sd`);

--
-- Indeks untuk tabel `tb_paket_ujian`
--
ALTER TABLE `tb_paket_ujian`
  ADD PRIMARY KEY (`id_paket_ujian`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tb_soal_latihan`
--
ALTER TABLE `tb_soal_latihan`
  ADD PRIMARY KEY (`id_soal_latihan`);

--
-- Indeks untuk tabel `tb_soal_latihan_sd`
--
ALTER TABLE `tb_soal_latihan_sd`
  ADD PRIMARY KEY (`id_soal_latihan_sd`);

--
-- Indeks untuk tabel `tb_soal_ujian`
--
ALTER TABLE `tb_soal_ujian`
  ADD PRIMARY KEY (`id_soal_ujian`);

--
-- Indeks untuk tabel `tb_submenu_backend`
--
ALTER TABLE `tb_submenu_backend`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indeks untuk tabel `tb_subtema_sd`
--
ALTER TABLE `tb_subtema_sd`
  ADD PRIMARY KEY (`id_subtema_sd`);

--
-- Indeks untuk tabel `tb_tema_sd`
--
ALTER TABLE `tb_tema_sd`
  ADD PRIMARY KEY (`id_tema_sd`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_bab_latihan`
--
ALTER TABLE `tb_bab_latihan`
  MODIFY `id_bab_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_jawaban_latihan`
--
ALTER TABLE `tb_jawaban_latihan`
  MODIFY `id_jawaban_latihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jawaban_latihan_sd`
--
ALTER TABLE `tb_jawaban_latihan_sd`
  MODIFY `id_jawaban_latihan_sd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_jawaban_ujian`
--
ALTER TABLE `tb_jawaban_ujian`
  MODIFY `id_jawaban_ujian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jenjang`
--
ALTER TABLE `tb_jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_kunci_jawaban_latihan`
--
ALTER TABLE `tb_kunci_jawaban_latihan`
  MODIFY `id_kunci_jawaban_latihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kunci_jawaban_sd`
--
ALTER TABLE `tb_kunci_jawaban_sd`
  MODIFY `id_kunci_jawaban_sd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_kunci_jawaban_ujian`
--
ALTER TABLE `tb_kunci_jawaban_ujian`
  MODIFY `id_kunci_jawaban_ujian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_menu_backend`
--
ALTER TABLE `tb_menu_backend`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_latihan`
--
ALTER TABLE `tb_nilai_latihan`
  MODIFY `id_nilai_latihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_latihan_sd`
--
ALTER TABLE `tb_nilai_latihan_sd`
  MODIFY `id_nilai_latihan_sd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_ujian`
--
ALTER TABLE `tb_nilai_ujian`
  MODIFY `id_nilai_ujian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_no_soal`
--
ALTER TABLE `tb_no_soal`
  MODIFY `id_no_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `tb_paket_latihan`
--
ALTER TABLE `tb_paket_latihan`
  MODIFY `id_paket_latihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_paket_latihan_sd`
--
ALTER TABLE `tb_paket_latihan_sd`
  MODIFY `id_paket_latihan_sd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_paket_ujian`
--
ALTER TABLE `tb_paket_ujian`
  MODIFY `id_paket_ujian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_soal_latihan`
--
ALTER TABLE `tb_soal_latihan`
  MODIFY `id_soal_latihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_soal_latihan_sd`
--
ALTER TABLE `tb_soal_latihan_sd`
  MODIFY `id_soal_latihan_sd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tb_soal_ujian`
--
ALTER TABLE `tb_soal_ujian`
  MODIFY `id_soal_ujian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_submenu_backend`
--
ALTER TABLE `tb_submenu_backend`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_subtema_sd`
--
ALTER TABLE `tb_subtema_sd`
  MODIFY `id_subtema_sd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_tema_sd`
--
ALTER TABLE `tb_tema_sd`
  MODIFY `id_tema_sd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
