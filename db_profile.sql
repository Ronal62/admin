-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 05:21 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_agenda` date NOT NULL,
  `deskripsi` text NOT NULL,
  `pelaksana` varchar(50) NOT NULL,
  `kode_agenda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `nama`, `tgl_agenda`, `deskripsi`, `pelaksana`, `kode_agenda`) VALUES
(6, 'PELANTIKAN OSIS SMK DWK PRIODE 2021-2022', '2021-10-11', '<p><strong>PELANTIKAN OSIS SMK DWK PRIODE 2022-2023</strong></p>\r\n\r\n<p><strong>ACARA</strong></p>\r\n\r\n<p>1.Pembacaan Ayat Suci Al-Qur&#39;an</p>\r\n\r\n<p>2.Sambutan&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp;*Kepala Sekolah</p>\r\n\r\n<p>&nbsp; &nbsp;*Waka Kurikulum</p>\r\n\r\n<p>&nbsp; &nbsp;*Ketua Osis Periode 2021-2022</p>\r\n\r\n<p>3.Penutup/Do&#39;a</p>\r\n', 'OSIS SMK DWK ', 'pelantikan osis smk dwk priode 2021-2022');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id_alumni` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tetala` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tahun_lulus` varchar(50) NOT NULL,
  `jenjang` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id_alumni`, `nama`, `tetala`, `alamat`, `tahun_lulus`, `jenjang`, `foto`) VALUES
(2, 'Ade Dwi Saputra', 'Probolinggo, 13-01-2003', 'Besuk Agung -Besuk-Probolinngo', '2021', 'Universitas Zainul Hasan Genggong ', '616789ca831eb.jpg'),
(5, 'Ahmad.Hidayat', 'Probolinggo, 28-10-2021', 'Besuk Agung -Gading -Probolinngo', '2014', 'Universitas Zainul Hasan Genggong ', '830IMG_9589.JPG'),
(6, 'Dafi Rizaldi  ', 'Probolinggo, 05-12-2003', 'Batur-Gading -Probolinngo', '2021', 'Universitas indonesia ', '61834f172ea8e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tgl_upload` date NOT NULL,
  `isi` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `tgl_upload` date NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `foto`, `tgl_upload`, `nama`) VALUES
(4, '61678a09c0f5c.jpg', '2021-10-14', 'Siswa Smk Dwk'),
(5, '61678e02c52fb.jpg', '2021-10-14', 'Siswa Smk Dwk');

-- --------------------------------------------------------

--
-- Table structure for table `mou`
--

CREATE TABLE `mou` (
  `id_mou` int(11) NOT NULL,
  `industri` varchar(50) NOT NULL,
  `tgl_mou` date NOT NULL,
  `alamat` text NOT NULL,
  `isi_mou` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mou`
--

INSERT INTO `mou` (`id_mou`, `industri`, `tgl_mou`, `alamat`, `isi_mou`) VALUES
(1, 'MLI', '2021-11-04', 'Krejengan-Kraksaan-Probolinggo ', 'Praktek kerja lapangan aplikasi ');

-- --------------------------------------------------------

--
-- Table structure for table `stuktur`
--

CREATE TABLE `stuktur` (
  `id_stuktur` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Dafi Rizaldi', 'admin', '22222', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `mou`
--
ALTER TABLE `mou`
  ADD PRIMARY KEY (`id_mou`);

--
-- Indexes for table `stuktur`
--
ALTER TABLE `stuktur`
  ADD PRIMARY KEY (`id_stuktur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mou`
--
ALTER TABLE `mou`
  MODIFY `id_mou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stuktur`
--
ALTER TABLE `stuktur`
  MODIFY `id_stuktur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
