-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 06:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_paud`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aset`
--

CREATE TABLE `tb_aset` (
  `id_aset` int(11) NOT NULL,
  `nama_aset` varchar(255) NOT NULL,
  `foto_aset` varchar(255) NOT NULL,
  `kondisi_aset` varchar(255) NOT NULL,
  `banyak_aset` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_aset`
--

INSERT INTO `tb_aset` (`id_aset`, `nama_aset`, `foto_aset`, `kondisi_aset`, `banyak_aset`) VALUES
(1, 'Kursi', '', 'Baik', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nip_guru` varchar(25) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `tgl_guru` varchar(255) NOT NULL,
  `jk_guru` varchar(255) NOT NULL,
  `telp_guru` varchar(255) NOT NULL,
  `foto_guru` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip_guru`, `nama_guru`, `tgl_guru`, `jk_guru`, `telp_guru`, `foto_guru`) VALUES
(1, '35467890897', 'Zihad Al-Haq', '25-12-3234', 'L', '098765433', ''),
(2, '1234', 'nama guru 2', 'tgl a', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `no_absen` int(3) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `tgl_siswa` varchar(255) NOT NULL,
  `jk_siswa` varchar(255) NOT NULL,
  `telp_siswa` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_guru_siswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `no_absen`, `nama_siswa`, `tgl_siswa`, `jk_siswa`, `telp_siswa`, `foto`, `id_guru_siswa`) VALUES
(1, 1, 'Sumiati', '12 Desember 1998', 'L', '0987765658', '', 1),
(2, 2, 'n', 't', 'j', 't', 'f', 2),
(3, 1, 'baru', 'ba', 'q', 'q', 'q', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level_user` int(2) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nip` int(25) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` int(30) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `level_user`, `nama_lengkap`, `nip`, `alamat`, `no_telp`, `jenis_kelamin`, `foto`) VALUES
(1, 'admin1', 'admin1', 1, '', 0, '', 0, '', ''),
(2, 'Guru1', 'Guru1', 2, 'Sukma Indriani, S.Pd', 88376263, 'Jl. Tuan guru bajang nomor 30 A karang baru lombok NTB', 987324, 'P', ''),
(3, 'Guru2', 'Guru2', 2, 'Zihad Al-Haq S.Pd', 32483243, 'Jl Tuan guru bajang ', 32847923, 'L', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aset`
--
ALTER TABLE `tb_aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aset`
--
ALTER TABLE `tb_aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
