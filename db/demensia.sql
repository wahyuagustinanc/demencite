-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 09:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demensia`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id_dokumentasi` int(11) NOT NULL,
  `nama_pemeriksa` varchar(50) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `orientasi_waktu` int(11) DEFAULT 0,
  `orientasi_tempat` int(11) DEFAULT 0,
  `registrasi` int(11) DEFAULT 0,
  `atensi_kalkulus` int(11) DEFAULT 0,
  `recall` int(11) DEFAULT 0,
  `bahasa_benda` int(11) DEFAULT 0,
  `bahasa_kata` int(11) DEFAULT 0,
  `bahasa_perintah` int(11) DEFAULT 0,
  `bahasa_perintah2` int(11) DEFAULT 0,
  `bahasa_tulis` int(11) DEFAULT 0,
  `bahasa_gambar` int(11) DEFAULT 0,
  `total` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokumentasi`
--

INSERT INTO `dokumentasi` (`id_dokumentasi`, `nama_pemeriksa`, `id_pasien`, `tanggal`, `orientasi_waktu`, `orientasi_tempat`, `registrasi`, `atensi_kalkulus`, `recall`, `bahasa_benda`, `bahasa_kata`, `bahasa_perintah`, `bahasa_perintah2`, `bahasa_tulis`, `bahasa_gambar`, `total`) VALUES
(25, 'dr. Lestari Handayani, SpN', 26, '2023-06-15', 5, 5, 3, 5, 1, 2, 1, 3, 1, 1, 1, 28),
(28, 'Wahyu Agustina', 24, '2023-07-05', 2, 2, 2, 3, 2, 2, 0, 2, 1, 1, 1, 18),
(29, 'Wahyu Agustina', 30, '2023-07-28', 1, 1, 1, 1, 1, 1, 1, 3, 1, 1, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` int(3) NOT NULL,
  `pendidikan` varchar(15) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `riwayat_penyakit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama`, `jenis_kelamin`, `tgl_lahir`, `umur`, `pendidikan`, `pekerjaan`, `riwayat_penyakit`) VALUES
(24, 'Wahyu Agustina N C', 'Perempuan', '2001-08-08', 21, 'SMA/SMK', 'Mahasiswa', 'Tidak ada'),
(26, 'Rasna', 'Perempuan', '1986-02-10', 37, 'D4', 'Perawat', 'Tidak ada'),
(29, 'Wahyu A', 'Laki-laki', '2000-07-28', 22, 'SMA/SMK', 'Mahasiswa', 'Tidak ada'),
(30, 'Diah Priyawati', 'Perempuan', '2000-07-28', 22, 'S2', 'Dosen', 'Tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksa`
--

CREATE TABLE `pemeriksa` (
  `id_pemeriksa` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `posisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemeriksa`
--

INSERT INTO `pemeriksa` (`id_pemeriksa`, `nama`, `nik`, `jenis_kelamin`, `posisi`) VALUES
(5, 'dr. Lestari Handayani, SpN', 'x', 'Perempuan', 'Dokter Saraf'),
(7, 'Wahyu', '33060897362729', 'Perempuan', 'Asisten Dokter');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `foto` text DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `no_hp`, `password`, `level`, `foto`) VALUES
(0, 'Wahyu Agustina', 'ayuagstna@gmail.com', '2147483647', 'Sukses1', 1, '_MG_6606.JPG'),
(3, 'Jinendra', 'jinendra@gmail', '845261789', 'Jinendra', 2, '1665980380471.png'),
(4, 'Bayu Aji', 'bayuaji@gmail.com', '2147483647', 'bayuaji', 2, '115892611_193346605460904_5770505647474771016_n.jpg'),
(14, 'dr. Lestari Handayani, SpN', 'x', '8', 'Lestar1', 2, 'default_1.png'),
(17, 'Ayu', 'wahyuagustinanc@gmail.com', '0', '123456', 2, 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id_dokumentasi`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pemeriksa`
--
ALTER TABLE `pemeriksa`
  ADD PRIMARY KEY (`id_pemeriksa`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id_dokumentasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pemeriksa`
--
ALTER TABLE `pemeriksa`
  MODIFY `id_pemeriksa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD CONSTRAINT `id_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
