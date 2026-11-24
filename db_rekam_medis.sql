-- phpMyAdmin SQL Dump
-- version 5.2.2
-- Host: localhost
-- Server version: 10.11.11-MariaDB
-- PHP Version: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

SET NAMES utf8mb4;

-- Database: db_rekam_medis

-- --------------------------------------------------------
-- Table structure for table dokter
-- --------------------------------------------------------

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `spesialisasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `spesialisasi`) VALUES
(1, 'dr. Rina Dewi, Sp.PD', 'Spesialis Penyakit Dalam'),
(2, 'dr. tari widyanti', 'umum');

-- --------------------------------------------------------
-- Table structure for table obat
-- --------------------------------------------------------

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `obat` (`id_obat`, `nama_obat`, `satuan`, `stok`) VALUES
(1, 'paracetamol', 'tablet', 5000),
(2, 'Ibuprofen', 'tablet', 1500),
(3, 'Asam Mefenamat ', 'Kapsul', 4500),
(4, 'Amoxicillin', 'Kapsul', 2000),
(5, 'Cefadroxil / Cefixime', 'tablet', 1000),
(6, 'Omeprazole', 'Kapsul', 3000),
(7, 'Ranitidin ', 'tablet', 3500),
(8, 'Amlodipin', 'tablet', 5000),
(9, 'Salbutamol', 'Kapsul', 2000),
(10, 'Dexamethasone', 'tablet', 1000),
(11, 'Epinefrin (Adrenalin) ', 'Kapsul', 3000),
(12, 'Ketorolac (Injeksi) ', 'tablet', 5000),
(13, 'Kalnex (Asam Traneksamat)', 'Kapsul', 6000),
(14, 'Betadine (Povidone Iodine)', 'kemasan', 1000),
(15, 'Ondansetron', 'tablet', 1500);

-- --------------------------------------------------------
-- Table structure for table pasien
-- --------------------------------------------------------

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `no_rm` varchar(20) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `pasien` (`id_pasien`, `no_rm`, `nama_pasien`, `jenis_kelamin`, `tanggal_lahir`, `alamat`) VALUES
(1, '0001', 'novi', 'P', '1965-05-12', 'ds turi');

-- --------------------------------------------------------
-- Table structure for table rekam_medis
-- --------------------------------------------------------

CREATE TABLE `rekam_medis` (
  `id_rekam` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosa` text NOT NULL,
  `tindakan` text NOT NULL,
  `resep` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `rekam_medis` (`id_rekam`, `id_pasien`, `id_dokter`, `id_obat`, `tanggal_periksa`, `keluhan`, `diagnosa`, `tindakan`, `resep`) VALUES
(1, 1, 1, 3, '2026-11-11', 'sakit saat menelan makanan/minuman', 'radang tenggorokan', 'rawat jalan', '3x1 tablet sebelum makan');

-- --------------------------------------------------------
-- Indexes
-- --------------------------------------------------------

ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rekam`);

-- --------------------------------------------------------
-- AUTO_INCREMENT
-- --------------------------------------------------------

ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `rekam_medis`
  MODIFY `id_rekam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

COMMIT;