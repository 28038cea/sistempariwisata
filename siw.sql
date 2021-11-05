-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2021 at 04:27 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siw`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_akun`
--

CREATE TABLE `data_akun` (
  `id_akun` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(1) NOT NULL,
  `aktif` enum('Aktif','Tidak Aktif') NOT NULL,
  `profile` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_akun`
--

INSERT INTO `data_akun` (`id_akun`, `email`, `password`, `role_id`, `aktif`, `profile`) VALUES
(1, 'uwu1@yahoo.com', '$2y$10$4Gf7QziFvhb05z0oqJ2x8ujSgjRFyCO422FtTMFwFre2oXp0aJbnG', 2, 'Aktif', 'default.png'),
(2, 'admin@gmail.com', '$2y$10$pieAzeeFdX88jODSkj57su2eTGNFLXJFL8/n5lgv.rKdzA/X0TTom', 1, 'Aktif', 'default.png'),
(19, 'test@gmail.com', '$2y$10$lc7RCBJfDwZaYUe9Hs.s8eHDu5yNCvGU3WNTZKcivobzdqiurtHIO', 1, 'Aktif', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `data_media`
--

CREATE TABLE `data_media` (
  `id_media` int(1) NOT NULL,
  `nama_media` int(255) NOT NULL,
  `media` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `lat`, `lng`, `title`, `body`) VALUES
(1, '-8.33', '115.1822358', 'Gate Desa Gunung Kangin', '<p><span style=\"color: #99cc00;\">lkawbndlakjwblawndka;wnd</span></p>\r\n<p><img src=\"http://localhost/web_map/uploads/post-image-1622720859427.png\" alt=\"\" width=\"155\" height=\"70\" /></p>'),
(2, '-8.3327362', '115.1828474', 'Lapangan Banjar Gunung Kangin', 'isi detail di sini'),
(3, '-8.3340127', '115.1827723', 'Banyan Tree', 'isi detail di sini'),
(4, '-8.3343073', '115.182732', 'Pura Dalem ', 'isi detail di sini'),
(5, '-8.3352946', '115.1830351', 'Pura Subak GK', 'isi detail di sini'),
(6, '-8.3382244', '115.1832792', 'Gazebo Bale Timbang', 'isi detail di sini'),
(7, '-8.3406819', '115.1837835', 'Kayehan Selaka', 'isi detail di sini'),
(8, '-8.3412578', '115.1821929', 'Gazebo Wy Jirna', 'isi detail di sini'),
(9, '-8.3459948', '115.1819193', 'Campuhan', 'isi detail di sini'),
(10, '-8.340658', '115.1812086', 'Jembatan Bambu', 'isi detail di sini'),
(11, '-8.3377388', '115.1797977', 'Pura Dugul Yasa', 'isi detail di sini'),
(12, '-8.3360138', '115.1797199', 'Gazebo Uma Desa', 'isi detail di sini'),
(13, '-8.3430098', '115.1774478', 'Pura Luhur Pucak Padang Dawa', 'isi detail di sini'),
(16, '-8.3339361', '115.1828597', 'Stage Pura Subak GK', 'isi detail di sini'),
(17, '-8.3339361', '115.1828597', 'Pura Dalem ', 'isi detail di sini'),
(19, '-8.3339361', '115.1828597', 'Unnamed Road, Bangli, Baturiti, Kabupaten Tabanan, Bali 82191, Indonesia', 'isi detail di sini'),
(20, '-8.3339361', '115.1828597', 'Unnamed Road, Baturiti, Kabupaten Tabanan, Bali 82191, Indonesia', 'isi detail di sini'),
(21, '-8.3341905', '115.1815143', 'Kayehan Buah', 'isi detail di sini'),
(27, '-8.3331895', '115.180399', 'Permakultur Sampah Organik', 'isi detail di sini'),
(28, '-8.3330443', '115.1817162', 'Kayehan Pitera', 'isi detail di sini');

-- --------------------------------------------------------

--
-- Table structure for table `md_role`
--

CREATE TABLE `md_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `md_role`
--

INSERT INTO `md_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gambar`
--

INSERT INTO `tb_gambar` (`id_gambar`, `id_lokasi`, `gambar`) VALUES
(14, 1, '11.jpg'),
(18, 1, '2.jpg'),
(20, 1, '4.jpg'),
(21, 1, '11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lat` varchar(256) NOT NULL,
  `lng` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `body` longtext NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `lat`, `lng`, `title`, `body`, `deskripsi`) VALUES
(1, '-8.33', '115.1822358', 'Gate Desa Gunung Kangin', '        <p><span style=\"color: #99cc00;\">lkawbndlakjwblawndka;wnd;awawda</span></p>\r\n<p><img src=\"http://localhost/web_map/uploads/post-image-1622720859427.png\" alt=\"\" width=\"155\" height=\"70\" /></p>    ', '        <p>gerbang ini adalah pintu masuk dari desa gunung kangin</p>    '),
(2, '-8.3327362', '115.1828474', 'Lapangan Banjar Gunung Kangin', 'isi detail di sini', ''),
(3, '-8.3340127', '115.1827723', 'Banyan Tree', 'isi detail di sini', ''),
(4, '-8.3343073', '115.182732', 'Pura Dalem ', 'isi detail di sini', ''),
(5, '-8.3352946', '115.1830351', 'Pura Subak GK', 'isi detail di sini', ''),
(6, '-8.3382244', '115.1832792', 'Gazebo Bale Timbang', 'isi detail di sini', ''),
(7, '-8.3406819', '115.1837835', 'Kayehan Selaka', 'isi detail di sini', ''),
(8, '-8.3412578', '115.1821929', 'Gazebo Wy Jirna', 'isi detail di sini', ''),
(9, '-8.3459948', '115.1819193', 'Campuhan', 'isi detail di sini', ''),
(10, '-8.340658', '115.1812086', 'Jembatan Bambu', 'isi detail di sini', ''),
(11, '-8.3377388', '115.1797977', 'Pura Dugul Yasa', 'isi detail di sini', ''),
(12, '-8.3360138', '115.1797199', 'Gazebo Uma Desa', 'isi detail di sini', ''),
(13, '-8.3430098', '115.1774478', 'Pura Luhur Pucak Padang Dawa', 'isi detail di sini', ''),
(15, '-8.3339361', '115.1828597', 'Stage Pura Subak GK', 'isi detail di sini', ''),
(16, '-8.3339361', '115.1828597', 'Pura Dalem ', 'isi detail di sini', ''),
(17, '-8.3339361', '115.1828597', 'Unnamed Road, Bangli, Baturiti, Kabupaten Tabanan, Bali 82191, Indonesia', 'isi detail di sini', ''),
(18, '-8.3339361', '115.1828597', 'Unnamed Road, Baturiti, Kabupaten Tabanan, Bali 82191, Indonesia', 'isi detail di sini', ''),
(19, '-8.3341905', '115.1815143', 'Kayehan Buah', 'isi detail di sini', ''),
(20, '-8.3331895', '115.180399', 'Permakultur Sampah Organik', 'isi detail di sini', ''),
(21, '-8.3330443', '115.1817162', 'Kayehan Pitera', 'isi detail di sini', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_akun`
--
ALTER TABLE `data_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `data_media`
--
ALTER TABLE `data_media`
  ADD PRIMARY KEY (`id_media`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_role`
--
ALTER TABLE `md_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_akun`
--
ALTER TABLE `data_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `data_media`
--
ALTER TABLE `data_media`
  MODIFY `id_media` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `md_role`
--
ALTER TABLE `md_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
