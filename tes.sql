-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 25, 2024 at 02:35 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tes`
--

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id_pinjam` int NOT NULL,
  `id_buku` int NOT NULL,
  `id_siswa` int NOT NULL,
  `tgl_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id_pinjam`, `id_buku`, `id_siswa`, `tgl_pinjam`) VALUES
(149, 2, 1, '2012-07-24'),
(151, 11, 5, '2024-07-12'),
(153, 5, 7, '2024-07-12'),
(171, 5, 1, '2024-07-23'),
(172, 2, 2, '2024-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int NOT NULL,
  `nama_buku` text NOT NULL,
  `genre_buku` text NOT NULL,
  `tahun_terbit` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `nama_buku`, `genre_buku`, `tahun_terbit`) VALUES
(1, 'misi gagal', 'ga tau', 2023),
(2, 'aku ga mau', 'komedi', 2007),
(3, 'misi gatot', 'lha mbuh', 2022),
(4, 'aku juga mau', 'misteri', 2000),
(5, 'segera terungkap', 'sudah tau', 2022),
(6, 'salamualaikum', 'ga tau', 2010),
(7, 'tolonggg', 'horor', 2020),
(8, 'salamualaikum', 'drama', 2012),
(11, 'asdsaasdas', 'asd', 123),
(13, 'awikwok bgt', 'mbuh', 2030);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int NOT NULL,
  `nama_siswa` text NOT NULL,
  `kelas_siswa` text NOT NULL,
  `jurusan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nama_siswa`, `kelas_siswa`, `jurusan`) VALUES
(1, 'abdul', '12', 'rpl'),
(2, 'wahyu', '11 ', 'tkl'),
(3, 'babang', '10', 'tkj'),
(4, 'wisnu', '11 ', 'rpl'),
(5, 'zuzu', '12 ', 'tkj'),
(7, 'sumanto', '12', 'rpl'),
(8, 'kiki', '11', 'rpl'),
(10, 'lamanadabi', '11', 'rpl'),
(13, 'upinnn', '12', 'rpl'),
(15, 'ikbal', '13', 'tkl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id_pinjam` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD CONSTRAINT `peminjam_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjam_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
