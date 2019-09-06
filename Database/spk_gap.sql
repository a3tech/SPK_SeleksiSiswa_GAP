-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2019 at 08:40 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_gap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Annas Al Amin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `nama_siswa` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nisn`, `nama_siswa`, `jenis_kelamin`, `asal_sekolah`) VALUES
(1, '204033751610001', 'Amanda Febria Devanie', 'Perempuan', 'SMP Negeri 6 Yogyakarta'),
(15, '204033751610018', 'A. Iqbal Madani ', 'Laki-Laki', 'SMP Negeri 5 Yogyakarta'),
(16, '204033751610017', 'Tafidah Farras Rahmani', 'Perempuan', 'SMP Muhammadiyah 10 Yogyakarta'),
(17, '204033751610020', 'Anas malik Hakimi', 'Laki-Laki', 'SMP Negeri 2 Yogyakarta'),
(18, '204033751610021', 'Raihan Alfian Pratama', 'Laki-Laki', 'Muhammadiyah 2'),
(19, '204033751610022', 'Rahmat Abrar Muzakky', 'Laki-Laki', 'MTS Negeri 1 Yogyakarta'),
(20, '204033751610023', 'Syarifah Nabila Rihhadatul Aisy', 'Perempuan', 'SMP Muhammadiyah 3 Yogyakarta'),
(21, '204033751610024', 'Aliya Rahma Nur Sabila', 'Perempuan', 'SMP Muhammadiyah Boarding School Prambanan'),
(22, '204033751610025', 'Azwar Yusuf Hananto Wiryo', 'Laki-Laki', 'SMP Ali Maksum Yogyakarta'),
(23, '204033751610026', 'Marsa Dhia Naufal', 'Laki-Laki', 'Muhammadiyah Boarding School');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` char(3) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
('KR1', 'Penilaian'),
('KR2', 'Keagamaan'),
('KR3', 'Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE `parameter` (
  `id_parameter` int(11) NOT NULL,
  `id_subkriteria` char(5) NOT NULL,
  `parameter_nilai` varchar(30) NOT NULL,
  `bobot_parameter` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`id_parameter`, `id_subkriteria`, `parameter_nilai`, `bobot_parameter`, `keterangan`) VALUES
(1, 'SK001', '10 - <=30', 1, 'Sangat Rendah'),
(2, 'SK001', '>30 - <=60', 2, 'Rendah'),
(3, 'SK001', '>60 - <=70', 3, 'Sedang'),
(4, 'SK001', '>70 - <=85', 4, 'Tinggi'),
(5, 'SK001', '>85 - <=100', 5, 'Sangat Tinggi'),
(6, 'SK002', '10 - <=30', 1, 'Sangat Rendah'),
(7, 'SK002', '>30 - <=60', 2, 'Rendah'),
(8, 'SK002', '>60 - <=70', 3, 'Sedang'),
(9, 'SK002', '>70 - <=85', 4, 'Tinggi'),
(10, 'SK002', '>85 - <=100', 5, 'Sangat Tinggi'),
(11, 'SK003', '10 - <=30', 1, 'Sangat Rendah'),
(12, 'SK003', '>30 - <=60', 2, 'Rendah'),
(13, 'SK003', '>60 - <=70', 3, 'Sedang'),
(14, 'SK003', '>70 - <=85', 4, 'Tinggi'),
(15, 'SK003', '>85 - <=100', 5, 'Sangat Tinggi'),
(16, 'SK004', '<=8 Bacaan Surat Baik', 1, 'Sangat Rendah'),
(17, 'SK004', '9 - 16 Bacaan Surat Baik', 2, 'Rendah'),
(18, 'SK004', '17 - 24 Bacaan Surat Baik', 3, 'Sedang'),
(19, 'SK004', '25 - 30 Bacaan Surat Baik', 4, 'Tinggi'),
(20, 'SK004', '31 - 36 Bacaan Surat Baik', 5, 'Sangat Tinggi'),
(24, 'SK005', 'Bacaan Baik', 4, 'Tinggi'),
(25, 'SK005', 'Bacaan dan Gerakan Baik', 5, 'Sangat Tinggi'),
(26, 'SK006', '5 - <=10 Surat', 1, 'Sangat Rendah'),
(27, 'SK006', '>10- <=15 Surat', 2, 'Rendah'),
(28, 'SK006', '>15 - <=20 Surat', 3, 'Sedang'),
(29, 'SK006', '>20 - <=30 Surat', 4, 'Tinggi'),
(30, 'SK006', '>30 Surat', 5, 'Sangat Tinggi'),
(31, 'SK007', '1 - <=4 Benar', 1, 'Sangat Rendah'),
(32, 'SK007', '>4 - <=8 Benar', 2, 'Rendah'),
(33, 'SK007', '>8 - <=12 Benar', 3, 'Sedang'),
(34, 'SK007', '>12 - <=16 Benar', 4, 'Tinggi'),
(35, 'SK007', '>16 - <=20 Benar', 5, 'Sangat Tinggi'),
(36, 'SK008', 'PECANDU ROKOK', 3, 'Sedang'),
(37, 'SK008', 'TIDAK MEROKOK', 5, 'Sangat Tinggi'),
(38, 'SK009', '150 - <=155 CM', 1, 'Sangat Rendah'),
(39, 'SK009', '>155 - <=165 CM', 2, 'Rendah'),
(40, 'SK009', '>165 - <=175 CM', 3, 'Sedang'),
(41, 'SK009', '>175 - <=185 CM', 4, 'Tinggi'),
(42, 'SK009', '>185 CM', 5, 'Sangat Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `pembobotan`
--

CREATE TABLE `pembobotan` (
  `id_bobot` char(3) NOT NULL,
  `selisih` int(11) NOT NULL,
  `bobot_nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembobotan`
--

INSERT INTO `pembobotan` (`id_bobot`, `selisih`, `bobot_nilai`) VALUES
('BB1', 0, 5),
('BB2', 1, 5),
('BB3', -1, 4),
('BB4', 2, 5),
('BB5', -2, 3),
('BB6', 3, 5),
('BB7', -3, 2),
('BB8', 4, 5),
('BB9', -4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `id_subkriteria` char(5) NOT NULL,
  `nilai` int(11) NOT NULL,
  `gap` int(11) NOT NULL,
  `nilai_bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `nisn`, `id_subkriteria`, `nilai`, `gap`, `nilai_bobot`) VALUES
(109, 1, '204033751610001', 'SK001', 2, -2, 3),
(110, 1, '204033751610001', 'SK002', 4, 1, 5),
(111, 1, '204033751610001', 'SK003', 2, -3, 2),
(112, 1, '204033751610001', 'SK004', 3, -1, 4),
(113, 1, '204033751610001', 'SK005', 5, 0, 5),
(114, 1, '204033751610001', 'SK006', 1, -2, 3),
(115, 1, '204033751610001', 'SK007', 2, -2, 3),
(116, 1, '204033751610001', 'SK008', 5, 0, 5),
(117, 1, '204033751610001', 'SK009', 3, 0, 5),
(118, 15, '204033751610018', 'SK001', 4, 0, 5),
(119, 15, '204033751610018', 'SK002', 3, 0, 5),
(120, 15, '204033751610018', 'SK003', 1, -4, 1),
(121, 15, '204033751610018', 'SK004', 4, 0, 5),
(122, 15, '204033751610018', 'SK005', 4, -1, 4),
(123, 15, '204033751610018', 'SK006', 5, 2, 5),
(124, 15, '204033751610018', 'SK007', 3, -1, 4),
(125, 15, '204033751610018', 'SK008', 3, -2, 3),
(126, 15, '204033751610018', 'SK009', 2, -1, 4),
(127, 16, '204033751610017', 'SK001', 2, -2, 3),
(128, 16, '204033751610017', 'SK002', 2, -1, 4),
(129, 16, '204033751610017', 'SK003', 3, -2, 3),
(130, 16, '204033751610017', 'SK004', 5, 1, 5),
(131, 16, '204033751610017', 'SK005', 5, 0, 5),
(132, 16, '204033751610017', 'SK006', 3, 0, 5),
(133, 16, '204033751610017', 'SK007', 3, -1, 4),
(134, 16, '204033751610017', 'SK008', 5, 0, 5),
(135, 16, '204033751610017', 'SK009', 4, 1, 5),
(136, 17, '204033751610020', 'SK001', 4, 0, 5),
(137, 17, '204033751610020', 'SK002', 4, 1, 5),
(138, 17, '204033751610020', 'SK003', 5, 0, 5),
(139, 17, '204033751610020', 'SK004', 1, -3, 2),
(140, 17, '204033751610020', 'SK005', 4, -1, 4),
(141, 17, '204033751610020', 'SK006', 1, -2, 3),
(142, 17, '204033751610020', 'SK007', 1, -3, 2),
(143, 17, '204033751610020', 'SK008', 5, 0, 5),
(144, 17, '204033751610020', 'SK009', 3, 0, 5),
(145, 18, '204033751610021', 'SK001', 4, 0, 5),
(146, 18, '204033751610021', 'SK002', 3, 0, 5),
(147, 18, '204033751610021', 'SK003', 2, -3, 2),
(148, 18, '204033751610021', 'SK004', 3, -1, 4),
(149, 18, '204033751610021', 'SK005', 5, 0, 5),
(150, 18, '204033751610021', 'SK006', 2, -1, 4),
(151, 18, '204033751610021', 'SK007', 3, -1, 4),
(152, 18, '204033751610021', 'SK008', 3, -2, 3),
(153, 18, '204033751610021', 'SK009', 2, -1, 4),
(154, 19, '204033751610022', 'SK001', 3, -1, 4),
(155, 19, '204033751610022', 'SK002', 3, 0, 5),
(156, 19, '204033751610022', 'SK003', 2, -3, 2),
(157, 19, '204033751610022', 'SK004', 4, 0, 5),
(158, 19, '204033751610022', 'SK005', 5, 0, 5),
(159, 19, '204033751610022', 'SK006', 4, 1, 5),
(160, 19, '204033751610022', 'SK007', 1, -3, 2),
(161, 19, '204033751610022', 'SK008', 3, -2, 3),
(162, 19, '204033751610022', 'SK009', 1, -2, 3),
(163, 20, '204033751610023', 'SK001', 4, 0, 5),
(164, 20, '204033751610023', 'SK002', 4, 1, 5),
(165, 20, '204033751610023', 'SK003', 3, -2, 3),
(166, 20, '204033751610023', 'SK004', 2, -2, 3),
(167, 20, '204033751610023', 'SK005', 4, -1, 4),
(168, 20, '204033751610023', 'SK006', 1, -2, 3),
(169, 20, '204033751610023', 'SK007', 2, -2, 3),
(170, 20, '204033751610023', 'SK008', 5, 0, 5),
(171, 20, '204033751610023', 'SK009', 3, 0, 5),
(172, 21, '204033751610024', 'SK001', 5, 1, 5),
(173, 21, '204033751610024', 'SK002', 4, 1, 5),
(174, 21, '204033751610024', 'SK003', 3, -2, 3),
(175, 21, '204033751610024', 'SK004', 1, -3, 2),
(176, 21, '204033751610024', 'SK005', 5, 0, 5),
(177, 21, '204033751610024', 'SK006', 2, -1, 4),
(178, 21, '204033751610024', 'SK007', 1, -3, 2),
(179, 21, '204033751610024', 'SK008', 5, 0, 5),
(180, 21, '204033751610024', 'SK009', 3, 0, 5),
(181, 22, '204033751610025', 'SK001', 3, -1, 4),
(182, 22, '204033751610025', 'SK002', 3, 0, 5),
(183, 22, '204033751610025', 'SK003', 2, -3, 2),
(184, 22, '204033751610025', 'SK004', 4, 0, 5),
(185, 22, '204033751610025', 'SK005', 5, 0, 5),
(186, 22, '204033751610025', 'SK006', 2, -1, 4),
(187, 22, '204033751610025', 'SK007', 3, -1, 4),
(188, 22, '204033751610025', 'SK008', 5, 0, 5),
(189, 22, '204033751610025', 'SK009', 1, -2, 3),
(190, 23, '204033751610026', 'SK001', 5, 1, 5),
(191, 23, '204033751610026', 'SK002', 5, 2, 5),
(192, 23, '204033751610026', 'SK003', 4, -1, 4),
(193, 23, '204033751610026', 'SK004', 4, 0, 5),
(194, 23, '204033751610026', 'SK005', 4, -1, 4),
(195, 23, '204033751610026', 'SK006', 3, 0, 5),
(196, 23, '204033751610026', 'SK007', 4, 0, 5),
(197, 23, '204033751610026', 'SK008', 3, -2, 3),
(198, 23, '204033751610026', 'SK009', 4, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id_ranking` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id_ranking`, `id_alternatif`, `total`) VALUES
(5, 1, 3.84),
(6, 15, 4.14),
(7, 16, 4.3),
(8, 17, 4.02),
(9, 18, 4.1),
(10, 19, 4.06),
(11, 20, 3.96),
(12, 21, 4.06),
(13, 22, 4.14),
(14, 23, 4.64);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` char(5) NOT NULL,
  `id_kriteria` char(3) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `jenis_penilaian` varchar(20) NOT NULL,
  `nilai_target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `jenis_penilaian`, `nilai_target`) VALUES
('SK001', 'KR1', 'RATA-RATA NILAI UN', 'Core Factor', 4),
('SK002', 'KR1', 'RATA-RATA NILAI RAPORT', 'Secondary Factor', 3),
('SK003', 'KR1', 'NILAI PRAKTIK KEJURURUAN', 'Core Factor', 5),
('SK004', 'KR2', 'MEMBACA AL-QUR\'AN', 'Core Factor', 4),
('SK005', 'KR2', 'TATA CARA SHALAT', 'Core Factor', 5),
('SK006', 'KR2', 'HAFALAN SURAT', 'Secondary Factor', 3),
('SK007', 'KR3', 'TES BUTA WARNA', 'Core Factor', 4),
('SK008', 'KR3', 'PEROKOK', 'Core Factor', 5),
('SK009', 'KR3', 'TINGGI BADAN', 'Secondary Factor', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id_parameter`),
  ADD KEY `id_subkriteria` (`id_subkriteria`);

--
-- Indexes for table `pembobotan`
--
ALTER TABLE `pembobotan`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_subkriteria`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_ranking`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id_parameter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parameter`
--
ALTER TABLE `parameter`
  ADD CONSTRAINT `parameter_ibfk_1` FOREIGN KEY (`id_subkriteria`) REFERENCES `subkriteria` (`id_subkriteria`);

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`),
  ADD CONSTRAINT `penilaian_ibfk_4` FOREIGN KEY (`id_subkriteria`) REFERENCES `subkriteria` (`id_subkriteria`);

--
-- Constraints for table `ranking`
--
ALTER TABLE `ranking`
  ADD CONSTRAINT `ranking_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`);

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
