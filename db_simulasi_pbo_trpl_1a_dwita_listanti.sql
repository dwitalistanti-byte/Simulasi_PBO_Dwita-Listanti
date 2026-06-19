-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 19 Jun 2026 pada 02.46
-- Versi server: 8.4.3
-- Versi PHP: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `db_simulasi_pbo_trpl 1a_dwita listanti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` varchar(20) NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` int NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(100) DEFAULT NULL,
  `lokasi_kampus` varchar(100) DEFAULT NULL,
  `jenis_prestasi` varchar(100) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
('KDN-001', 'Oka Antara', 'SMA Taruna Nusantara', 87.50, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-001/DINAS/2026', 'Kementerian Keuangan'),
('KDN-002', 'Putri Titian', 'SMAN 1 Bogor', 86.00, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-002/DINAS/2026', 'Kementerian Dalam Negeri'),
('KDN-003', 'Rizky Nazar', 'SMAN 3 Bandung', 85.00, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-003/DINAS/2026', 'Badan Pusat Statistik'),
('KDN-004', 'Sita Nursanti', 'SMAN 1 Depok', 88.00, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-004/DINAS/2026', 'Kementerian Perhubungan'),
('KDN-005', 'Tora Sudiro', 'SMAN 2 Tangerang', 84.50, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-005/DINAS/2026', 'Kementerian Hukum dan HAM'),
('KDN-006', 'Umar Lubis', 'SMAN 1 Bekasi', 89.50, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-006/DINAS/2026', 'Kementerian Pertahanan'),
('PRS-001', 'Hendra Wijaya', 'SMAN 1 Surakarta', 92.00, 250000, 'Prestasi', NULL, NULL, 'Olimpiade Sains Nasional', 'Nasional', NULL, NULL),
('PRS-002', 'Indah Permata', 'SMAN 4 Denpasar', 95.50, 250000, 'Prestasi', NULL, NULL, 'Lomba Debat Bahasa Inggris', 'Internasional', NULL, NULL),
('PRS-003', 'Joko Susilo', 'SMAN 1 Medan', 89.00, 250000, 'Prestasi', NULL, NULL, 'Kejuaraan Pencak Silat', 'Provinsi', NULL, NULL),
('PRS-004', 'Kiki Amalia', 'SMAN 2 Makassar', 91.50, 250000, 'Prestasi', NULL, NULL, 'Olimpiade Fisika', 'Kabupaten', NULL, NULL),
('PRS-005', 'Lukman Hakim', 'SMAN 3 Padang', 94.00, 250000, 'Prestasi', NULL, NULL, 'Karya Tulis Ilmiah', 'Nasional', NULL, NULL),
('PRS-006', 'Mita Sari', 'SMAN 1 Palembang', 88.50, 250000, 'Prestasi', NULL, NULL, 'Kejuaraan Renang', 'Provinsi', NULL, NULL),
('PRS-007', 'Nina Zatulini', 'SMAN 2 Balikpapan', 93.00, 250000, 'Prestasi', NULL, NULL, 'Olimpiade Kimia', 'Nasional', NULL, NULL),
('REG-001', 'Andi Pratama', 'SMAN 1 Jakarta', 85.50, 250000, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
('REG-002', 'Budi Santoso', 'SMAN 2 Bandung', 78.00, 250000, 'Reguler', 'Sistem Informasi', 'Kampus Cabang', NULL, NULL, NULL, NULL),
('REG-003', 'Citra Kirana', 'SMAN 3 Surabaya', 88.50, 250000, 'Reguler', 'Ilmu Komputer', 'Kampus Utama', NULL, NULL, NULL, NULL),
('REG-004', 'Dewi Lestari', 'SMAN 1 Malang', 82.00, 250000, 'Reguler', 'Teknik Elektro', 'Kampus Cabang', NULL, NULL, NULL, NULL),
('REG-005', 'Eko Saputra', 'SMAN 5 Semarang', 75.50, 250000, 'Reguler', 'Manajemen', 'Kampus Utama', NULL, NULL, NULL, NULL),
('REG-006', 'Fina Melani', 'SMAN 1 Yogyakarta', 90.00, 250000, 'Reguler', 'Akuntansi', 'Kampus Utama', NULL, NULL, NULL, NULL),
('REG-007', 'Gilang Dirga', 'SMKN 2 Jakarta', 81.50, 250000, 'Reguler', 'Teknik Mesin', 'Kampus Cabang', NULL, NULL, NULL, NULL);

--
-- Indeks untuk tabel yang dibuang
--

--
-- Indeks untuk tabel `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
