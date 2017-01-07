-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2017 at 06:51 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codeigniter3inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
`id_barang` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `status` enum('Baik','Rusak','Rusak Berat','Hilang') NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `jumlah_barang`, `status`, `id_kategori`) VALUES
(1, 'B1', 'Barang 1', 5, 'Baik', 0),
(2, 'B2', 'Barang 2', 10, 'Baik', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang`
--

DROP TABLE IF EXISTS `detail_barang`;
CREATE TABLE IF NOT EXISTS `detail_barang` (
`id_detail_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `madein_barang` varchar(20) NOT NULL,
  `merk_barang` varchar(20) NOT NULL,
  `asal_dana` varchar(10) NOT NULL,
  `tahun_pengadaan` int(4) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_barang`
--

INSERT INTO `detail_barang` (`id_detail_barang`, `id_barang`, `madein_barang`, `merk_barang`, `asal_dana`, `tahun_pengadaan`, `keterangan`) VALUES
(1, 1, '', '', '', 0, ''),
(2, 2, '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

DROP TABLE IF EXISTS `kategori_barang`;
CREATE TABLE IF NOT EXISTS `kategori_barang` (
`id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

DROP TABLE IF EXISTS `peminjaman`;
CREATE TABLE IF NOT EXISTS `peminjaman` (
`id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

DROP TABLE IF EXISTS `pengembalian`;
CREATE TABLE IF NOT EXISTS `pengembalian` (
`id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_dikembalikan` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
`id_role` int(11) NOT NULL,
  `nama_role` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'User'),
(2, 'Petugas'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `username` char(10) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `jurusan` enum('TKI','RPL','TKJ','MM') NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `alamat`, `jenis_kelamin`, `jurusan`, `id_role`) VALUES
(1, 'admin', 'admin', 'admin', '', 'L', 'RPL', 2),
(6, 'user1', 'user1', 'user1', '', 'L', 'MM', 1),
(7, 'user2', 'user2', 'user2', '', 'L', 'MM', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`id_barang`), ADD KEY `FK_barang1` (`id_kategori`);

--
-- Indexes for table `detail_barang`
--
ALTER TABLE `detail_barang`
 ADD PRIMARY KEY (`id_detail_barang`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
 ADD PRIMARY KEY (`id_peminjaman`), ADD KEY `FK_peminjaman` (`id_user`), ADD KEY `FK_peminjaman1` (`id_barang`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
 ADD PRIMARY KEY (`id_pengembalian`), ADD KEY `FK_pengembalian` (`id_peminjaman`), ADD KEY `FK_pengembalian1` (`id_barang`), ADD KEY `FK_pengembalian2` (`id_user`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `username_2` (`username`), ADD KEY `FK_user` (`id_role`), ADD FULLTEXT KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_barang`
--
ALTER TABLE `detail_barang`
MODIFY `id_detail_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
