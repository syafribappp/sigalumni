-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Jan 2021 pada 06.50
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `kode_jurusan` varchar(10) DEFAULT NULL,
  `jurusan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `kode_jurusan`, `jurusan`) VALUES
(1, 'S001', 'IPA'),
(2, 'S002', 'IPS'),
(3, 'S003', 'Bahasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `nohp` varchar(12) DEFAULT NULL,
  `wali` varchar(50) DEFAULT NULL,
  `latittude` varchar(30) DEFAULT NULL,
  `longitude` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `kode_jurusan` varchar(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `alamat`, `nohp`, `wali`, `latittude`, `longitude`, `password`, `kode_jurusan`) VALUES
(1, '1234050', 'Joni Saputra', 'Desa Grobog Kulon', '08529346345', 'Repal', '-6.9547828', '109.1632257', '1234567', 'S002'),
(2, '123401', 'Nur Laeli Ramadhani', 'Desa Kalikangkung', '08253759674', 'Joni', '-6.9622448', '109.1479797', '1234567', 'S001'),
(3, '123402', 'Muhammad Akil', 'Desa Pegirikan', '+62852001469', 'Indra Budiman', '-6.9450328', '109.1368227', '12345', 'S001'),
(4, '123451', 'Nurul Amaliya', 'Desa Pecabean', '+62852001469', 'Indra Budiman', '-6.9475482', '109.1537391', '12345', 'S003'),
(5, '1234030', 'Dani Putra', 'Desa Balamoa', '+62852001469', 'Indra Budiman', '-6.9487817', '109.1834572', '12345', 'S003'),
(6, '123408', 'Tya Maryanti', 'Desa Kalikangkung', '+62852001469', 'Indra Budiman', '-6.9528577', '109.1658269', '12345', 'S002'),
(7, '123409', 'Syafri Bayu A.', 'Desa Grobog Wetan', '+62852001469', 'Indra Budiman', '-6.9633133', '109.1624239', '12345', 'S001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
