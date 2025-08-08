-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 08, 2025 at 03:55 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdpal`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangunan`
--

CREATE TABLE `bangunan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_bangunan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bangunan`
--

INSERT INTO `bangunan` (`id`, `nama_bangunan`, `biaya`, `created_at`, `updated_at`) VALUES
(1, 'Rumah Tangga', 120000, NULL, '2025-07-19 10:07:15'),
(2, 'Rumah Makan', 200000, NULL, NULL),
(3, 'Industri', 400000, NULL, NULL),
(4, 'Kantor Intansi Pemerintahan', 500000, NULL, NULL),
(5, 'Perusahaan/Badan Usaha Negara/Daerah', 975000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `berhenti_berlangganan`
--

CREATE TABLE `berhenti_berlangganan` (
  `id` bigint UNSIGNED NOT NULL,
  `petugas_id` bigint UNSIGNED NOT NULL,
  `bukti_berhenti` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pdam` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berhenti_berlangganan`
--

INSERT INTO `berhenti_berlangganan` (`id`, `petugas_id`, `bukti_berhenti`, `bukti_pdam`, `ktp`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 2, 'uploads/berhenti/H6LENSt1IpqG1C97tJ5Z8YkcHiCbbianp2QqHkgj.jpg', 'uploads/berhenti/c5lWHSAaBQ94rcJNe9ALL0duTLaKtQ8zyt4VEtF5.jpg', 'uploads/berhenti/WcnXd3snwZYisNQ9MIJOyAbhqz7gX9tZA4CuPGHV.jpg', 'rumah dijual', '2025-07-19 15:40:59', '2025-08-01 07:00:41'),
(2, 3, 'uploads/berhenti/qB2YPe1Wqzd39xB8mYuKxr8WVETGJ5eN1k2xnT5y.jpg', 'uploads/berhenti/g2OSYKxqbEgI76pgoWv5eQ1OzqAOTO588RIRLmFX.jpg', 'uploads/berhenti/hg75Vie8vFjfgAncCSaRxGO5e34CRCnwegym3bYp.jpg', 'pindah rumah', '2025-07-19 16:56:12', '2025-08-01 07:00:12'),
(3, 4, 'uploads/berhenti/A7KvjRptAmZcHKPtyLcqBf7kDTiAeJBODNkMaCEl.jpg', 'uploads/berhenti/0YVAc9ZKisu3LQyvCA77AFsJ5pRNNWWVgRlsekGj.jpg', 'uploads/berhenti/VPSwwushDuRVdfCZX66BbSg3krYhfNDY6PSdXSV4.jpg', 'sudah punya septic tank sendiri', '2025-07-19 16:56:40', '2025-08-01 06:56:40'),
(4, 2, 'uploads/berhenti/YaNbmlCZWTq2xtzLYjogk952vYi23FmX4kFQPboj.jpg', 'uploads/berhenti/v6YR9GnyHM9Dsjn2TvGSHDaK6Lj12FdTOpgUKDeX.jpg', 'uploads/berhenti/RLtyuAA6Ul3mnucZYOSZGPcptSopdTxerPEMNvYO.jpg', 'ganti pelayanan', '2025-07-19 17:02:02', '2025-08-01 06:57:18'),
(5, 4, 'uploads/berhenti/g9V2USrHBCGXoYBo2KdHL2gHlqwgtObjCMpWHkG2.jpg', 'uploads/berhenti/yZiiv25wCFDisHBAnIIpoij48V5o63KmNvI5Kf4c.jpg', 'uploads/berhenti/r2a1luWKzUMQHC06EUhLYlMoqQGYmpUAiJ35MCr1.jpg', 'ganti pelayanan', '2025-07-20 10:01:28', '2025-08-01 06:57:05'),
(6, 1, 'uploads/berhenti/7Cp2dyN9UxJn527MavJfS5cGgFgxEFjsX062s6mG.jpg', 'uploads/berhenti/wJAmrrTL9fUrUwwLQWV02LYun2wIXfdZW9yDBseA.jpg', 'uploads/berhenti/jry7OEA8iFzTXQXt3G4SLKZDmQ90djOD3kSleD3z.jpg', 'pindah rumah', '2025-07-20 10:01:50', '2025-08-01 06:56:53'),
(7, 3, 'uploads/berhenti/49HiihZCUGYuIKFj5ZwVBBKaDnX6tuVZJlX1DRG5.jpg', 'uploads/berhenti/Lz2CYpn2tsvs5qFCq9b0xJYKabchC4qWJDt4WP51.jpg', 'uploads/berhenti/Qz1BkZCQHB1K0gJKnfHak2oJpvkzkqUNKnfA6trX.jpg', 'sudah punya septic tank sendiri', '2025-07-20 10:03:02', '2025-08-01 06:56:09'),
(8, 2, 'uploads/berhenti/4oqdi4UsUUYGLowkQaogpiQ3vkkqmHxfUn4275Ma.jpg', 'uploads/berhenti/DxLeyEUUrybWlh1kyfoI2dAIcDPIee0Am5h3BjYN.jpg', 'uploads/berhenti/OWbLVQT8c5Ni78DuL4J9wpR1tgDOdGRby3V73wgJ.jpg', 'rumah dijual', '2025-07-20 10:03:27', '2025-08-01 06:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_servis`
--

CREATE TABLE `customer_servis` (
  `id` bigint UNSIGNED NOT NULL,
  `pelanggan_id` bigint UNSIGNED NOT NULL,
  `servisable_id` bigint UNSIGNED NOT NULL,
  `servisable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_servis`
--

INSERT INTO `customer_servis` (`id`, `pelanggan_id`, `servisable_id`, `servisable_type`, `catatan`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'TagihanPemasangan', 'pengganti keloset', '2025-07-20 02:49:43', '2025-07-20 02:49:43'),
(3, 2, 1, 'TagihanPerbaikan', 'perbaikan wc mampet', '2025-07-22 09:39:58', '2025-07-24 04:46:13'),
(4, 1, 2, 'TagihanPemasangan', 'pemasangan toilet baru', '2025-07-24 04:45:19', '2025-07-24 04:45:19'),
(5, 4, 7, 'BerhentiBerlangganan', 'rumah dijual', '2025-07-24 05:25:07', '2025-07-24 05:25:07'),
(6, 3, 5, 'BerhentiBerlangganan', 'rumah dijual', '2025-07-24 07:09:50', '2025-07-24 07:09:50'),
(9, 5, 4, 'TagihanPemasangan', 'ganti wastafel', '2025-08-04 13:26:05', '2025-08-04 13:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `edukasi_sosial`
--

CREATE TABLE `edukasi_sosial` (
  `id` bigint UNSIGNED NOT NULL,
  `petugas_id` bigint UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orang` int NOT NULL,
  `tanggapan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `absensi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_kegiatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `edukasi_sosial`
--

INSERT INTO `edukasi_sosial` (`id`, `petugas_id`, `nama_kegiatan`, `tempat`, `materi`, `point`, `orang`, `tanggapan`, `absensi`, `bukti_kegiatan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 3, 'acara penting pengelolaan air limbah', 'banjarmasin barat', 'Cara Mengelola Air Limbah Rumah Tangga', 'Pisahkan limbah, Buat septic tank, Jangan buang ke sungai', 8, 'Warga sangat antusias dan ingin pelatihan lanjutan', 'uploads/edukasisosial/Xl8aB3QCB6q88ukbbZs9aVccWr4udqdyOdnJ0lej.doc', 'uploads/edukasisosial/cX59EXdA7aXMlTE7LPZ1kHbUQY9HHgMAlIGNsN3z.jpg', 'Kegiatan berjalan lancar meskipun hujan ringan', '2025-07-19 12:00:19', '2025-08-01 06:41:01'),
(2, 1, 'acara pengelolaan limbah dilingkungan rumah', 'banjarmasin timur', 'Cara Mengelola Limbah Rumah tanggan dengan baik', 'Pisahkan limbah, Buat septic tank, Jangan buang kedalam kolong rumah', 6, 'Warga sangat antusias dan ingin pelatihan lanjutan', 'uploads/edukasisosial/WqegRCxIT95VMRcpLLXBgP9OUtNZR9dNVg2NLheE.jpg', 'uploads/edukasisosial/rVRBxn4umROzMNckMrFJIWtqLNLiDEbIsyItAY3d.jpg', 'acaran berjalan sukses', '2025-07-19 15:20:48', '2025-08-01 06:32:07'),
(3, 2, 'acara pengelolaan limbah sisa makanan rumah', 'Gedung Serbaguna RT 04 RW 02', 'Cara Mengelola Limbah makanan sisa', 'Pisahkan limbah, mengubur limbah makanan, Jangan buang ke sungai', 7, 'Warga sangat antusias dan memahami yang disampaikan', 'uploads/edukasisosial/Q0kpyeWS7a5yR8crOU2Ao7zxxp4ltPcQt5WDwgkA.doc', NULL, 'acara berjalan sukses', '2025-07-20 00:24:45', '2025-08-01 06:42:03'),
(4, 1, 'penting pengelolaan air limbah di sekolah', 'banjarmasin barat', 'Cara Mengelola Limbah sekolah', 'Pisahkan limbah,\r\nBuat bank sampah, mengelola limbah dengan baik\r\nJangan buang ke', 6, 'murit sekolah sangat\r\nantusias dan apa sanitasi, serta cara mengelola limbah', 'uploads/edukasisosial/QcqCAN24QiTNMtN3J1nrWIwtHKknKgnWJtrUpavY.pdf', NULL, 'menjawab pertanyaan murit-murit, dan penjelasan bahaya air limbah', '2025-07-20 00:37:41', '2025-07-30 03:04:42'),
(5, 2, 'Penyuluhan Bahaya Limbah Domestik di Kecamatan Banjarmasin Utara', 'Balai Pertemuan Warga, Jalan Cemara Raya', 'Dampak jangka panjang limbah rumah tangga terhadap kesehatan lingkungan', 'Edukasi tentang limbah B3, pentingnya daur ulang, pemanfaatan limbah organik menjadi kompos', 6, 'Warga menyatakan kegiatan sangat bermanfaat dan mengusulkan program rutin bulanan', 'uploads/edukasisosial/ISRhwunvBsSJDBm2qvBCIcase9ZCj6rZ7BiOQsYW.pdf', NULL, 'Kegiatan berjalan tertib, disertai sesi tanya jawab yang cukup aktif dari peserta', '2025-07-20 00:38:34', '2025-08-01 06:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_petugas`
--

CREATE TABLE `hasil_petugas` (
  `id` bigint UNSIGNED NOT NULL,
  `proses_petugas_id` bigint UNSIGNED NOT NULL,
  `jenis_layanan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_hasil` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tindak_lanjut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masalah_ditemukan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kesimpulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_hasil` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil_petugas`
--

INSERT INTO `hasil_petugas` (`id`, `proses_petugas_id`, `jenis_layanan`, `foto_hasil`, `tindak_lanjut`, `masalah_ditemukan`, `kesimpulan`, `status_hasil`, `created_at`, `updated_at`) VALUES
(1, 1, 'PENYEDOTAN', 'uploads/hasil/ZkQnht9DBcnO3dSjmN64RXmVwACrAhSoxQ0nBYi8.jpg', 'melanjutkan penyedotan air limbah pabrik', 'tidak ada', 'air limbah sudah disedot semua tidak ada tersisa', 'Disetujui Dilaksanakan', '2025-07-20 07:52:32', '2025-08-01 04:55:13'),
(2, 2, 'TERTAGIH BUKAN PELANGGAN', 'uploads/hasil/a6GPyMEQkZBocdHdds5eWXSkijtQRobg2orFUlDi.jpg', 'malakukan pengecekan', 'tidak ada', 'hasil pengecekan bukan pelanggan', 'Disetujui Dilaksanakan', '2025-07-22 09:39:31', '2025-08-01 04:56:09'),
(3, 5, 'PENYEDOTAN', 'uploads/hasil/tEZEayrMPxQ5F8a1s0Gs6429Bqnt4iyGsyK4tYFo.jpg', 'melakukan penyedotan limbah rumah makan', 'tidak ada', 'berhasil dilakukan penyedotan pada rumah makan', 'Disetujui Dilaksanakan', '2025-07-22 11:25:34', '2025-08-01 04:59:37'),
(4, 8, 'TERTAGIH BUKAN PELANGGAN', 'uploads/hasil/CkSgVHzr54AZZTi2i5d5jOVIwCE4YSp6Hn6a3Gsg.jpg', 'pengecekan kerumah pelapor', 'tidak ada', 'terbukti buka pelanggan', 'Disetujui Dilaksanakan', '2025-07-22 15:18:11', '2025-08-01 04:54:37'),
(5, 7, 'PENYEDOTAN', 'uploads/hasil/HyeRect3DRd6g4RryNmkcTQhiK3kz8flPexvJtq7.jpg', 'melakukan penyedotan limbah perumahan', 'tidak ada', 'berhasil dilakukan penyedotan', 'Disetujui Dilaksanakan', '2025-07-22 15:36:45', '2025-08-01 05:01:16'),
(6, 3, 'PERBAIKAN', 'uploads/hasil/4We6ClA8RENv4rgddgp80t3LrhOEy2uDzZXCNZso.jpg', 'perbaikan saluran pembuangan kamar mandi buntu', 'rambut dan plastik ditemukan didalam saluran pembuangan', 'melakukan pemberihan saluran air pembungan', 'Disetujui Dilaksanakan', '2025-07-23 09:24:44', '2025-08-01 05:02:45'),
(8, 7, 'PENYEDOTAN', 'uploads/hasil/TWdZZYYbzoF5E5v8422hQ4oXramO6MNmnQrwZhb9.jpg', 'tes', 'tes', 'tes', 'Disetujui Dilaksanakan', '2025-08-04 15:24:52', '2025-08-04 15:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `item_penerimaan_barang`
--

CREATE TABLE `item_penerimaan_barang` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_penerimaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `harga_beli` int NOT NULL,
  `sub_total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_penerimaan_barang`
--

INSERT INTO `item_penerimaan_barang` (`id`, `nomor_penerimaan`, `nama_produk`, `qty`, `harga_beli`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, 'PBR-2107250001', 'Pipa Sambungan 4 inch Standar', 10, 280000, 2800000, '2025-07-21 04:26:08', '2025-07-21 04:26:08'),
(2, 'PBR-2107250001', 'Pasir kerikil dan semen 1 pickup', 1, 900000, 900000, '2025-07-21 04:26:08', '2025-07-21 04:26:08'),
(3, 'PBR-2407250002', 'Pipa Sambungan 4 inch Standar', 5, 270000, 1350000, '2025-07-24 07:07:36', '2025-07-24 07:07:36'),
(4, 'PBR-0408250003', 'Lem Pipa 1 liter', 2, 50000, 100000, '2025-08-04 07:06:36', '2025-08-04 07:06:36'),
(5, 'PBR-0408250003', 'Kloset duduk', 1, 900000, 900000, '2025-08-04 07:06:36', '2025-08-04 07:06:36'),
(6, 'PBR-0408250003', 'Pipa Sambungan 4 inch Standar', 3, 270000, 810000, '2025-08-04 07:06:36', '2025-08-04 07:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `item_pengeluaran_barang`
--

CREATE TABLE `item_pengeluaran_barang` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `harga` int NOT NULL,
  `sub_total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_pengeluaran_barang`
--

INSERT INTO `item_pengeluaran_barang` (`id`, `nomor_pengeluaran`, `nama_produk`, `qty`, `harga`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, 'TRX-2125070001', 'Septic tank 1000 liter', 1, 1500000, 1500000, '2025-07-21 04:21:45', '2025-07-21 04:21:45'),
(2, 'TRX-2125070001', 'Pipa Sambungan 4 inch Standar', 4, 300000, 1200000, '2025-07-21 04:21:45', '2025-07-21 04:21:45'),
(3, 'TRX-2125070001', 'Pipa Ventilasi Septic tank', 1, 100000, 100000, '2025-07-21 04:21:45', '2025-07-21 04:21:45'),
(4, 'TRX-2125070001', 'Pasir kerikil dan semen 1 pickup', 1, 1000000, 1000000, '2025-07-21 04:21:45', '2025-07-21 04:21:45'),
(5, 'TRX-2125070001', 'Upah Harian Pekerja', 4, 120000, 480000, '2025-07-21 04:21:45', '2025-07-21 04:21:45'),
(6, 'TRX-0425080002', 'Kloset duduk', 1, 1000000, 1000000, '2025-08-04 07:34:04', '2025-08-04 07:34:04'),
(7, 'TRX-0425080002', 'Upah Harian Pekerja', 1, 120000, 120000, '2025-08-04 07:34:04', '2025-08-04 07:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"3ae9169e-1a5d-495f-a413-7ccd966a2ad3\",\"displayName\":\"App\\\\Notifications\\\\PengingatPerbaikanBulanan\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:27:\\\"App\\\\Models\\\\PetugasPelayanan\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:43:\\\"App\\\\Notifications\\\\PengingatPerbaikanBulanan\\\":1:{s:2:\\\"id\\\";s:36:\\\"34ec09c2-2ab9-4524-a8b6-b7a2a43e1e72\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:5:\\\"email\\\";}}\"},\"createdAt\":1753098664,\"delay\":null}', 0, NULL, 1753098664, 1753098664),
(2, 'default', '{\"uuid\":\"7e34d418-b5b2-41eb-afb9-15a629780cdd\",\"displayName\":\"App\\\\Notifications\\\\PengingatPerbaikanBulanan\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:27:\\\"App\\\\Models\\\\PetugasPelayanan\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:43:\\\"App\\\\Notifications\\\\PengingatPerbaikanBulanan\\\":1:{s:2:\\\"id\\\";s:36:\\\"36a8ee95-e8f5-465b-9c17-44cb5764fa09\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:5:\\\"email\\\";}}\"},\"createdAt\":1753099166,\"delay\":null}', 0, NULL, 1753099166, 1753099166);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `slug`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Materia bangunan ', 'materia bangunan ', 'Kategori untuk Urukan atau bahan bangunan', '2025-07-19 09:50:39', '2025-07-19 09:50:39'),
(2, 'Toilet', 'Toilet', 'Kategori untuk bahan pemasangan toilet', '2025-07-19 09:50:39', '2025-07-19 09:50:39'),
(3, 'Septic Tank', 'Septic Tank', 'Kategori untuk Bahan Pemasangan septic tank', '2025-07-19 09:50:39', '2025-07-19 09:50:39'),
(4, 'Upah Pekerja', 'Upah Pekerja', 'Upah Harian Pekerja atau Borongan', '2025-07-19 09:50:39', '2025-07-19 09:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kegunaan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nama`, `kegunaan`, `created_at`, `updated_at`) VALUES
(1, 'Mobil Operasional DA 2345 AA', 'Digunakan untuk keperluan operasional lapangan', '2025-07-19 10:14:56', '2025-07-29 10:00:05'),
(2, 'Truk Pengangkut Air Limbah DA 6543 FF', 'Mengangkut limbah dari pelanggan', '2025-07-19 10:14:56', '2025-07-29 10:00:33'),
(3, 'Motor Dinas', 'Transportasi petugas untuk pelayanan', '2025-07-19 10:14:56', '2025-07-19 10:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `kinerja_petugas`
--

CREATE TABLE `kinerja_petugas` (
  `id` bigint UNSIGNED NOT NULL,
  `petugas_id` bigint UNSIGNED NOT NULL,
  `laporan_id` bigint UNSIGNED NOT NULL,
  `kegiatan_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketepatan_waktu` tinyint NOT NULL COMMENT '1-5',
  `kepuasan_masyarakat` tinyint NOT NULL COMMENT '1-5',
  `sikap_kerja` tinyint NOT NULL COMMENT '1-5',
  `nilai_total` tinyint DEFAULT NULL COMMENT 'Total dari semua penilaian',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kinerja_petugas`
--

INSERT INTO `kinerja_petugas` (`id`, `petugas_id`, `laporan_id`, `kegiatan_kerja`, `ketepatan_waktu`, `kepuasan_masyarakat`, `sikap_kerja`, `nilai_total`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'pemasangan septic tank', 5, 5, 4, 5, '2025-07-19 08:47:59', '2025-08-01 05:12:28'),
(2, 1, 1, 'membersikan saluran air pembuangan dalam gorong-gorong', 5, 4, 4, 4, '2025-07-20 10:35:55', '2025-08-01 05:11:52'),
(3, 2, 3, 'pengganti kloset kamar mandi', 3, 3, 4, 3, '2025-07-20 13:00:14', '2025-08-01 05:10:24'),
(4, 2, 2, 'pemasangan aksesori toilet', 3, 2, 2, 2, '2025-07-20 13:16:02', '2025-08-01 05:13:23'),
(5, 2, 3, 'melaksanakan penyedotan air limbah', 2, 3, 5, 3, '2025-07-22 09:37:50', '2025-07-24 04:44:38'),
(6, 3, 4, 'pengecekan lokasi, dan memastikan saluran apakah benar pelanggan', 4, 3, 5, 4, '2025-07-25 06:22:56', '2025-08-01 05:15:37'),
(7, 2, 5, 'pengganti toilet baru', 5, 5, 5, 5, '2025-07-25 07:42:19', '2025-08-01 05:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id` bigint UNSIGNED NOT NULL,
  `petugas_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bangunan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luas_bangunan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orang` int NOT NULL,
  `pertanyaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_konsultasi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id`, `petugas_id`, `nama`, `email`, `no_hp`, `bangunan`, `luas_bangunan`, `orang`, `pertanyaan`, `keterangan`, `bukti_konsultasi`, `ktp`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'gita', 'gitariady@gmail.com', '0823456', 'rumah', '200 meter persegi', 3, 'biaya pemasangan', 'penjelasan anggaran biaya pemasangan septi tank dan waktu yang diperlukan dalam perkerjaan pemasangan', 'uploads/bukti/1QjGj5mrztxndNQvcSNZ9dBRucHMEGIEFJawTUDR.jpg', 'uploads/ktp/qOTUVep57paXWTfZJfpJFWLe2AsdFhEKgPi86SwF.jpg', 'Menerima Lanjut Pemasangan', '2025-07-19 10:27:00', '2025-08-01 05:46:30'),
(2, 1, 'kategori', 'gitariady@gmail.com', '0823456', 'rumah', '300 meter persegi', 2, 'menanyakan jenis septic tank', 'penjelasan jenis septic tank, fungsi,  jenis merek, dan kapasitas daya tampung', 'uploads/bukti/0MqrNRKPN89wSly1h6XhWBSh4hyBk0V2SaDAsjF2.jpg', NULL, 'Menerima Lanjut Pemasangan', '2025-07-19 10:46:33', '2025-08-01 05:48:49'),
(3, 2, 'rahmad', 'admin@example.com', '0823456', 'gedung ruko', '400 meter persegi', 7, 'jenis spetic tank yang bagus', 'penjelasan tentang septic tank', 'uploads/bukti/6jiYzxtximZ7BWVvdwH40FPOFqmG2JhdL0AzTUW2.jpg', 'uploads/ktp/A8p2xw3toMYb3xwCA1yP0ANJQFWg75aNzppFxTal.jpg', 'Memilih Opsi Pekerja Lain', '2025-07-22 11:10:37', '2025-08-01 05:43:12'),
(4, 1, 'rudi', 'gitar@gmail.com', '0823456', 'Rumah 2 lantai', '600 meter persegi', 8, 'berapa biaya, dan jenis septic tank', 'penjelasan pembuatan saluran septic tank, dan anggaran pemasangan', 'uploads/bukti/dhYJeFBfWmLiutBOaHsTYIlPuJmBu6uvMWtRZ6ka.jpg', 'uploads/ktp/lgoCyZMJw032wAz8I6CvWBEKRHqgFu9LyteopZh7.jpg', 'Menunggu Tindak Lanjut', '2025-07-22 11:11:12', '2025-08-01 05:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kritik_saran`
--

INSERT INTO `kritik_saran` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'gita riady', 'gitariady@gmail.com', '0845353', 'perbaikan', 'perbaikan wc tidak rapi', '2025-07-20 11:07:24', '2025-07-20 11:07:24'),
(2, 'gita riady', 'gita@gmail.com', '0845353', 'penyedotan', 'setelah melakukan penyedotan septic tank tidak ditutup', '2025-07-23 07:31:19', '2025-07-23 07:31:19'),
(3, 'gita riady', 'gitariady@gmail.com', '0845353', 'pemasangan', 'petugas terlambat datang tidak tepat waktu', '2025-07-23 07:33:32', '2025-07-23 07:33:32'),
(4, 'rudi', 'admin@example.com', '0845353', 'acaran edukasi sosial', 'sering- sering adakan acara ini, kalo bisa ada acara disekolah', '2025-07-23 12:46:21', '2025-07-23 12:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis_laporan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pelaporan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `jenis_laporan`, `status_pelaporan`, `nama`, `no_hp`, `alamat`, `ktp`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Perbaikan', 'Baru', 'gita riady', '0823456', 'jl.agraria 1', 'uploads/laporan/bsau6FXDRZjeZgYpRwi0olKIIvgbWgtJ2ElKkWMX.jpg', 'saluran pembuang mampet', '2025-07-19 08:42:04', '2025-07-25 04:05:11'),
(2, 'Perbaikan', 'Proses', 'gita riady', '0823456', 'jl.mawar', NULL, 'wc mampet', '2025-07-20 10:38:56', '2025-07-24 04:28:30'),
(3, 'Penyedotan', 'Baru', 'rudi nugraha', '0823456', 'jl.durian', 'uploads/laporan/LwyI5ewZnAGNvbRhmIRSpyFQiFLMl4SjgxHu0JC1.jpg', 'penyedotan rumah makan', '2025-07-20 10:56:18', '2025-07-25 04:05:34'),
(4, 'Salah Tagihan', 'Baru', 'gita', '0823456', 'jl.melati', NULL, 'tidak pernah terdaftar jadi pelanggan', '2025-07-20 14:41:13', '2025-07-24 04:29:56'),
(5, 'Pemasangan', 'Selesai', 'nanda ayu', '0823456', 'jl.cendrawasi', NULL, 'pemadangan dari konsultasi', '2025-07-20 14:41:40', '2025-07-24 04:30:43'),
(6, 'Penyedotan', 'Baru', 'rahmad', '0823456', 'df', NULL, 'sdfs', '2025-07-22 11:11:57', '2025-07-22 11:11:57'),
(7, 'Salah Tagihan', 'Proses', 'rudi', '0823456', 'dfsd', NULL, 'dfs', '2025-07-22 11:12:19', '2025-07-22 11:12:19'),
(8, 'Penyedotan', 'Proses', 'gita', '0823456', 'dfs', 'uploads/laporan/oTyTO3W7hfBIQwzu31YCcJgka4qKrhWkfYJtRbDm.jpg', 'sdfsd', '2025-07-22 11:12:47', '2025-07-22 11:12:47'),
(9, 'Perbaikan', 'Baru', 'gita', '0823456', 'tes', NULL, 'tes', '2025-07-23 15:17:51', '2025-07-23 15:17:51'),
(10, 'Penyedotan', 'Proses', 'gita', '0823456', 'tes', NULL, 'tes', '2025-07-23 15:38:20', '2025-07-23 15:38:20'),
(11, 'Konsultasi', 'Baru', 'rahmad', '0823456', 'tes', NULL, 'tes', '2025-07-23 15:38:53', '2025-07-23 15:38:53'),
(12, 'Konsultasi', 'Baru', 'tes', '0823456', 'tes', NULL, 'tes', '2025-07-23 15:42:34', '2025-07-23 15:42:34'),
(13, 'Pemasangan', 'Baru', 'gita', '0823456', 'jl.mwar', 'uploads/laporan/JxxKp44SbQIwGSmS94sxRrCWUqGhCsJ9MIZ2VztS.jpg', 'pemasang septic tank', '2025-07-24 07:06:12', '2025-07-24 07:06:12'),
(14, 'Salah Tagihan', 'Baru', 'gita', '0823456', 'jl.mawar', NULL, 'tagihan berlebihan', '2025-07-25 04:02:28', '2025-07-25 04:02:28'),
(15, 'Pemasangan', 'Baru', 'nana', '0823456', 'jl.kuripan', 'uploads/laporan/FdeCLN5UIDnSmdassx6SGhnTHlcCJ0W6kCIIyGgh.jpg', 'ganti toilet', '2025-07-25 04:06:14', '2025-07-25 04:06:37'),
(16, 'Perbaikan', 'Baru', 'gita', '0823456', 'tes', NULL, 'tes', '2025-07-25 08:40:47', '2025-07-25 08:40:47'),
(17, 'Penyedotan', 'Baru', 'kategori', '0823456', 'te', NULL, 'tes', '2025-08-02 11:56:50', '2025-08-02 11:56:50'),
(19, 'Perbaikan', 'Proses', 'kategori', '03423', 'tes', NULL, 'tes', '2025-08-04 15:35:51', '2025-08-04 15:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_02_175038_create_petugas_pelayanans_table', 1),
(5, '2025_07_03_000053_create_kendaraans_table', 1),
(6, '2025_07_03_000706_create_laporans_table', 1),
(7, '2025_07_03_003034_create_bangunans_table', 1),
(8, '2025_07_04_011404_create_proses_petugas_table', 1),
(9, '2025_07_05_005804_create_tagihan_penyedotans_table', 1),
(10, '2025_07_05_005851_create_tagihan_perbaikans_table', 1),
(11, '2025_07_05_005937_create_konsultasis_table', 1),
(12, '2025_07_05_010049_create_edukasi_sosials_table', 1),
(13, '2025_07_05_010411_create_tagihan_pemasangans_table', 1),
(14, '2025_07_05_011056_create_kinerja_petugas_table', 1),
(15, '2025_07_05_011237_create_hasil_petugas_table', 1),
(16, '2025_07_05_011616_create_tagihan_no_pelanggans_table', 1),
(17, '2025_07_05_011703_create_berhenti_berlangganans_table', 1),
(18, '2025_07_09_171306_create_kritik_sarans_table', 1),
(19, '2025_07_09_171322_create_pelanggans_table', 1),
(20, '2025_07_10_132918_add_level_to_users_table', 1),
(21, '2025_07_13_001401_create_kategoris_table', 1),
(22, '2025_07_13_154312_create_products_table', 1),
(23, '2025_07_14_235526_create_penerimaan_barangs_table', 1),
(24, '2025_07_15_001551_create_item_penerimaan_barangs_table', 1),
(25, '2025_07_15_161142_create_pengeluaran_barangs_table', 1),
(26, '2025_07_15_162533_create_item_pengeluaran_barangs_table', 1),
(27, '2025_07_17_224530_create_customer_servis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` bigint UNSIGNED NOT NULL,
  `pdpal_id` int NOT NULL,
  `pdam_id` int NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bangunan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `pdpal_id`, `pdam_id`, `nama`, `ktp`, `bangunan`, `kecamatan`, `kelurahan`, `alamat`, `waktu`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 2325, 1755, 'gita riady', 'uploads/pelanggan/ioP5j13xP9QMFSHnYZ1C6TKQnDXgBiNRdJ8BxT23.jpg', 'gedung ruko', 'banjarmasin timur', 'telaga biru', 'jl.kenari', '2025-07-18', 'Aktif', 'baru daftar', '2025-07-19 09:05:38', '2025-08-01 03:36:36'),
(2, 2867, 2252, 'rudi nugraha', 'uploads/pelanggan/N1ES8nCwSXIxiGfwwyprYjScyYuVTWugUKjOwx5G.jpg', 'gedung ruko', 'banjarmasin timur', 'telaga biru', 'jl.kenari', '2025-07-19', 'Aktif', 'sudah berhenti', '2025-07-19 09:14:46', '2025-08-01 05:31:59'),
(3, 3245, 3456, 'rahmad andi', 'uploads/pelanggan/R9R9XdVls8zb9tYkzfh78Lj8ySt2mJ4i4h2qTDGE.jpg', 'Rumah 3 lantai', 'banjarmasin barat', 'telaga kuning', 'jl.mawar', '2025-07-06', 'Tidak Aktif', 'baru daftar', '2025-07-22 13:26:23', '2025-08-01 05:31:33'),
(4, 5875, 4564, 'aldy tupang', 'uploads/pelanggan/pZM0KrPFJUG3MLWeYkMW7VxgzGK1LmS9cQXPDynB.jpg', 'gedung ruko', 'banjarmasin timur', 'telaga biru', 'jl.kenari', '2025-07-07', 'Tidak Aktif', 'rumah dijual', '2025-07-22 13:27:40', '2025-07-30 01:38:12'),
(5, 3543, 9424, 'nana', 'uploads/pelanggan/XJBDItAfJUVXQQfAW7F3wmBbd2hBskIe7Pg5Bc5Z.jpg', 'Rumah 2 lantai', 'banjarmasin selatan', 'telaga bening', 'jl.mawar', '2025-06-29', 'Tidak Aktif', 'baru daftar', '2025-07-22 13:28:51', '2025-08-01 05:31:04'),
(7, 645, 234, 'rahmad', 'uploads/pelanggan/rfUdxXpdaiAJk8lglvrTPlvYe47sYxiANFjyeua3.jpg', 'Rumah 2 lantai', 'banjarmasin timur', 'telaga biru', 'jl.kenari', '2025-07-24', 'Aktif', 'baru daftar', '2025-07-25 03:19:30', '2025-07-25 03:19:30'),
(8, 342, 234, 'gita riady', 'uploads/pelanggan/D3zDsllxhzpOBwZLuvEFZ3n6X5aoyTUxFLSBibzq.jpg', 'gedung', 'banjarmasin timur', 'telaga kuning', 'jl.mawar', '2025-07-23', 'Aktif', 'baru daftar', '2025-07-25 03:34:55', '2025-07-25 03:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan_barang`
--

CREATE TABLE `penerimaan_barang` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_penerimaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_faktur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distributor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `petugas_penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerimaan_barang`
--

INSERT INTO `penerimaan_barang` (`id`, `nomor_penerimaan`, `nomor_faktur`, `distributor`, `petugas_penerima`, `created_at`, `updated_at`) VALUES
(1, 'PBR-2107250001', '65757', 'Samudra Jaya', 'gita riady', '2025-07-21 04:26:08', '2025-07-21 04:26:08'),
(2, 'PBR-2407250002', '1234', 'Samudra Jaya', 'Supervisor Utama', '2025-07-24 07:07:36', '2025-07-24 07:07:36'),
(3, 'PBR-0408250003', '65757', 'Samudra Jaya', 'Admin User', '2025-08-04 07:06:36', '2025-08-04 07:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_barang`
--

CREATE TABLE `pengeluaran_barang` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` int NOT NULL,
  `bayar` int NOT NULL,
  `kembalian` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengeluaran_barang`
--

INSERT INTO `pengeluaran_barang` (`id`, `nomor_pengeluaran`, `nama_petugas`, `total_harga`, `bayar`, `kembalian`, `created_at`, `updated_at`) VALUES
(1, 'TRX-2125070001', 'gita riady', 4280000, 4300000, 20000, '2025-07-21 04:21:45', '2025-07-21 04:21:45'),
(2, 'TRX-0425080002', 'Admin User', 1120000, 1120000, 0, '2025-08-04 07:34:04', '2025-08-04 07:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `petugas_pelayanan`
--

CREATE TABLE `petugas_pelayanan` (
  `id` bigint UNSIGNED NOT NULL,
  `nip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas_pelayanan`
--

INSERT INTO `petugas_pelayanan` (`id`, `nip`, `nama`, `bidang`, `no_hp`, `email`, `alamat`, `created_at`, `updated_at`) VALUES
(1, '1234', 'gita riady', 'Transaksi', '0823456', 'gitariady07@gmail.com', 'jl.kenari no 1', '2025-07-19 08:41:18', '2025-08-01 02:17:08'),
(2, '675677', 'rahmad', 'bimbingan edukasi', '0823456', 'gitariady@gmail.com', 'jl.kenari', '2025-07-20 10:39:47', '2025-07-22 13:33:46'),
(3, '453543', 'rudi nugraha', 'perbaikan', '0823456', 'ahma@gmail.com', 'jl.mawar', '2025-07-22 13:35:26', '2025-07-22 13:35:26'),
(4, '3242', 'setia budi', 'pengelolaan air limbah', '0823456', 'petugas@example.com', 'jl.mawar', '2025-07-22 13:36:56', '2025-07-22 13:36:56'),
(5, '83445', 'aldy tupang', 'pengelolaan air limbah', '0823456', 'rudi@gmail.com', 'jl.kenari no 1', '2025-08-04 17:06:30', '2025-08-04 17:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint UNSIGNED NOT NULL,
  `kategori_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'SKU (Stok Keeping Unit)/Kode Produk',
  `harga_jual` int NOT NULL,
  `harga_beli` int NOT NULL,
  `stok` int NOT NULL,
  `stok_min` int NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `kategori_id`, `name`, `sku`, `harga_jual`, `harga_beli`, `stok`, `stok_min`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 3, 'Septic tank 1000 liter', 'SKU-00001', 1500000, 1300000, 4, 2, 1, '2025-07-21 04:09:09', '2025-07-21 04:21:45'),
(2, 1, 'Pipa Sambungan 4 inch Standar', 'SKU-00002', 300000, 270000, 24, 5, 1, '2025-07-21 04:10:04', '2025-08-04 07:06:36'),
(3, 1, 'Pipa Ventilasi Septic tank', 'SKU-00003', 100000, 80000, 9, 5, 1, '2025-07-21 04:10:53', '2025-07-21 04:21:45'),
(4, 1, 'Lem Pipa 1 liter', 'SKU-00004', 70000, 50000, 12, 5, 1, '2025-07-21 04:11:28', '2025-08-04 07:06:36'),
(5, 1, 'Pasir kerikil dan semen 1 pickup', 'SKU-00005', 1000000, 950000, 5, 5, 1, '2025-07-21 04:14:40', '2025-07-21 04:26:08'),
(6, 2, 'Kloset duduk', 'SKU-00006', 1000000, 900000, 4, 4, 1, '2025-07-21 04:15:24', '2025-08-04 07:34:04'),
(7, 4, 'Upah Harian Pekerja', 'SKU-00007', 120000, 0, 995, 1, 1, '2025-07-21 04:16:38', '2025-08-04 07:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `proses_petugas`
--

CREATE TABLE `proses_petugas` (
  `id` bigint UNSIGNED NOT NULL,
  `petugas_id` bigint UNSIGNED NOT NULL,
  `laporan_id` bigint UNSIGNED NOT NULL,
  `kendaraan_id` bigint UNSIGNED NOT NULL,
  `awal` datetime NOT NULL,
  `akhir` datetime NOT NULL,
  `kendala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solusi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_proses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proses_petugas`
--

INSERT INTO `proses_petugas` (`id`, `petugas_id`, `laporan_id`, `kendaraan_id`, `awal`, `akhir`, `kendala`, `solusi`, `status_proses`, `bukti`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2025-07-20 01:34:00', '2025-07-20 01:34:00', 'susah mencari lokasi septi tank dan membongkarnya', 'membongkar jalur limbah sampai lokasi septi tank', 'sudah selesai', 'uploads/proses/um98N56yuMxsKgZ5Nk2LPhF9iafEQQnax55bNyli.jpg', 'kendala lupa lokasi septi tank pemilik', '2025-07-19 17:35:24', '2025-07-19 17:35:24'),
(2, 2, 2, 1, '2025-07-20 18:41:00', '2025-07-20 18:41:00', 'susah mencari lokasi septi tank dan membongkarnya', 'membongkar jalur limbah sampai lokasi septi tank', 'sudah selesai', 'uploads/proses/eHQphWymPC7R4kRMsLbGXmjtdJNwpsDPWQj5feRC.jpg', 'kendala lupa lokasi septi tank pemilik', '2025-07-20 10:40:35', '2025-07-20 10:40:35'),
(3, 1, 1, 1, '2025-07-21 02:08:00', '2025-07-21 02:10:00', 'tidak ada', 'tidak ada', 'sudah selesai', 'uploads/proses/al5MLiu7V4fYyuzgA19xRjk1c81dHDRsCT0gPYO2.jpg', 'berhasil dilaksanakan', '2025-07-20 18:07:52', '2025-07-24 04:38:04'),
(4, 2, 4, 1, '2025-07-16 17:33:00', '2025-07-22 17:33:00', 'tidak ada kendala', 'tidak ada masalah', 'sudah selesai', 'uploads/proses/bJnSIy7N7MR8BhTqLzXJWlrBWDVXc7eZJVqUb50s.jpg', 'sudah dilaksanakan', '2025-07-22 09:33:32', '2025-07-24 04:39:07'),
(5, 1, 5, 1, '2025-07-16 17:38:00', '2025-07-16 17:38:00', 'tidak ada kendala', 'tidak ada lah', 'dibatalkan', 'uploads/proses/YKlpGL543CKQm5oO2z3uZ34bQtEXOJ1ewVI31JQ7.jpg', 'berhasil', '2025-07-22 09:38:46', '2025-07-24 04:40:40'),
(7, 1, 7, 2, '2025-07-15 19:14:00', '2025-07-17 19:14:00', 'dsfs', 'dfs', 'dilanjutkan nanti', 'uploads/proses/C8UmttNEyum7t3xdaN0BQjqJcRa8v9yXzgBuCs4C.jpg', 'sdfs', '2025-07-22 11:15:01', '2025-07-22 11:15:01'),
(8, 3, 3, 1, '2025-07-20 16:27:00', '2025-07-22 16:27:00', 'tes', 'tes', 'sudah selesai', 'uploads/proses/WMkoGWWKdFNNNYSbeby7mIv54TTOo0fKLO57NtZP.jpg', 'tes', '2025-07-25 08:28:13', '2025-07-25 08:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DR3UgaBXvZlneT6OoF01EmZTPnxOMW8yZJQE0BvV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1BsaHU3a3pXaDdHc0xHUDA4MlV4U2dJM1hRcmhWaW84TmZrTURaQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fX0=', 1754368182),
('f38uFJBV4sm7NbONEHJXyXbQubFjq2HASosHrM1K', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS0JXaE9uS2NKdUpiQzZxaEdMcXNuc05id2RCRGgyZzNyYVc3d1RxSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NTQzNjA5NjQ7fX0=', 1754360965);

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_no_pelanggan`
--

CREATE TABLE `tagihan_no_pelanggan` (
  `id` bigint UNSIGNED NOT NULL,
  `proses_petugas_id` bigint UNSIGNED NOT NULL,
  `bukti_tagihan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagihan_no_pelanggan`
--

INSERT INTO `tagihan_no_pelanggan` (`id`, `proses_petugas_id`, `bukti_tagihan`, `metode`, `total`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/nopelanggan/eDVjzgcxUgzSA8ouPoP8N9RDd7J4JLDIpWYAdbmc.jpg', 'Bayar Cash', 85000, 'memang bukan pelanggan', '2025-07-19 17:44:42', '2025-08-01 07:25:38'),
(3, 3, 'uploads/nopelanggan/J3FBLJteW8uUKnzeP1jxyIyZJLQPZqlM0ABEoXXc.jpg', 'Bayar Cash', 60000, 'bukan pelanggan', '2025-07-23 12:28:53', '2025-08-01 07:25:55'),
(4, 5, 'uploads/nopelanggan/LTPXoYtuTcutnqd5FKkThr6VPGJf5Ln1qQqY70jR.jpg', 'Bayar Cash', 50000, 'kesalah pada inputan sistem', '2025-07-29 15:00:13', '2025-08-01 07:26:19'),
(5, 7, 'uploads/nopelanggan/BhcyyxMxL0bcyJpufw6OI1NpD7T3qytTFtxfFBsV.jpg', 'Bayar Cash', 40000, 'terbukti bukan pelanggan', '2025-08-01 07:27:11', '2025-08-01 07:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_pemasangan`
--

CREATE TABLE `tagihan_pemasangan` (
  `id` bigint UNSIGNED NOT NULL,
  `proses_petugas_id` bigint UNSIGNED NOT NULL,
  `bukti_tagihan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_bayar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagihan_pemasangan`
--

INSERT INTO `tagihan_pemasangan` (`id`, `proses_petugas_id`, `bukti_tagihan`, `bukti_bayar`, `metode`, `total`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/pemasangan/5Wvz4iHmAV9iQvru43OWqValcLXUWJHJEx7R3I7z.jpg', 'uploads/pemasangan/QA4dr946p0myGS6pY2vVvJFoxynanYEp5wOQWLDZ.png', 'Transfer Antar Bank', 4000000, 'pemasangan septic tanki', '2025-07-20 02:19:49', '2025-08-01 07:06:51'),
(2, 5, 'uploads/pemasangan/be5gnsc7q8BrKluQ7mVuSRpIbeH3bt2mLRMKPXo7.jpg', 'uploads/pemasangan/jhynapz3KdqWIAaNm9CwZ8BPHKjVJ3cdSq7zhs0l.png', 'Virtual Akun', 500000, 'penggantian klosest', '2025-07-23 12:17:05', '2025-08-01 07:07:32'),
(4, 7, 'uploads/pemasangan/WaAcv2zHMERsCnoumg5cjMUjNohDsB1HKREFxPho.jpg', 'uploads/pemasangan/m8Mom4GbHhz3B9u89vFEEWKsz6CSN0UT4giQZVG0.png', 'Virtual Akun', 800000, 'ganti toilet', '2025-07-29 14:55:33', '2025-08-01 07:08:02'),
(5, 3, 'uploads/pemasangan/uFejKI3DInQiafOAAO6c0PTw3gd8uL4YH0hpdGrm.jpg', NULL, 'Bayar Cash', 1200000, 'mengganti toilet', '2025-08-01 07:08:52', '2025-08-01 07:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_penyedotan`
--

CREATE TABLE `tagihan_penyedotan` (
  `id` bigint UNSIGNED NOT NULL,
  `proses_petugas_id` bigint UNSIGNED NOT NULL,
  `bangunan_id` bigint UNSIGNED NOT NULL,
  `bukti_tagihan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_bayar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` bigint NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagihan_penyedotan`
--

INSERT INTO `tagihan_penyedotan` (`id`, `proses_petugas_id`, `bangunan_id`, `bukti_tagihan`, `bukti_bayar`, `metode`, `total`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'uploads/penyedotan/ZrSiwqzQgZJmGVYk5v5d6K8aAqBrgpAZMQzPBio0.jpg', 'uploads/penyedotan/kIxF9nWrNIyCsFCow6vkaAhKTYxyJ3I0PXmKwuiW.png', 'Transfer Antar Bank', 200000, 'total volume penyedotan 1,2 kubik', '2025-07-20 01:10:58', '2025-08-01 02:56:37'),
(2, 3, 1, 'uploads/penyedotan/JWFrfpyyZ3tFmaqWHLzsNUHkTlqmRxP3smV1tTMp.jpg', NULL, 'Bayar Cash', 240000, 'penyedotan 1,5 kubik', '2025-07-23 12:26:29', '2025-08-01 02:58:39'),
(4, 5, 2, 'uploads/penyedotan/CztAznc1I4Nr6lCjJA4Qmvpr9QyyXHU8xdv3A2X6.jpg', 'uploads/penyedotan/VVo4bgKlFX7ri2P3j4j6ZtxiJtNIozW1TLvypLj7.png', 'Virtual Akun', 4000000, 'sedot 2 kubik', '2025-07-29 14:58:03', '2025-08-01 02:58:20'),
(6, 2, 2, 'uploads/penyedotan/6uyLKGtVeo9mdQi81AGHeLSL1KzXsR45dlEFFFqX.jpg', 'uploads/penyedotan/Uo9fgzseBezGUtWNIuxl3JvOJaPstKwEHmmqlTu4.jpg', 'Virtual Akun', 125000, 'tes', '2025-08-04 09:38:14', '2025-08-04 09:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_perbaikan`
--

CREATE TABLE `tagihan_perbaikan` (
  `id` bigint UNSIGNED NOT NULL,
  `proses_petugas_id` bigint UNSIGNED NOT NULL,
  `bukti_tagihan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_bayar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagihan_perbaikan`
--

INSERT INTO `tagihan_perbaikan` (`id`, `proses_petugas_id`, `bukti_tagihan`, `bukti_bayar`, `metode`, `total`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/penyedotan/Dyiwa8OFKsgZIgY99EiMamQdU9ocVDJcCsxr2Tsi.jpg', 'uploads/penyedotan/pvjPtuFJMQiwfGqdpXhrBhxXtathO1E75JG1O1sR.jpg', 'Bayar Cash', 100000, 'perbaikan wc mampet', '2025-07-20 01:25:28', '2025-08-01 03:05:44'),
(2, 5, 'uploads/penyedotan/nXgSg95QRGwtylEchJPovI3KPF194fbKPztGNxVe.jpg', NULL, 'Bayar Cash', 120000, 'perbaikan saluran pembuangan mampet', '2025-07-23 12:27:45', '2025-08-01 03:06:20'),
(3, 7, 'uploads/penyedotan/DuLfkwwufdjDI7wjJDGV33pOeWRF3V6gwXuObQpe.jpg', 'uploads/penyedotan/npCNRzsyTZAP3K7Iolgtl3QyYZedMjU7k2M6jQ2M.png', 'Virtual Akun', 150000, 'saluran air pembuangan kamar mandi mampet', '2025-07-23 12:28:10', '2025-08-01 03:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','petugas','supervisor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, '$2y$12$84BdCRjFY7/p7pUOqoj0jedIAg1vydNOrjLhonecblb0TdpWmDkjK', 'admin', NULL, '2025-07-19 08:40:07', '2025-08-04 17:15:18'),
(2, 'Petugas Satu', 'petugas@example.com', NULL, '$2y$12$gr7.IHK6QpTyASn/ymKtseQ0bn64ErVb2y1rVR5laGxzapZETgqJG', 'petugas', NULL, '2025-07-19 08:40:07', '2025-07-19 08:40:07'),
(3, 'Supervisor Utama', 'supervisor@example.com', NULL, '$2y$12$O8OBBG4ir/IeBmObIDdSM./vcCAsAKnUqC7AuJysAURieBd6MxeAq', 'supervisor', NULL, '2025-07-19 08:40:08', '2025-07-19 08:40:08'),
(8, 'gita riady', 'gitariady07@gmail.com', NULL, '$2y$12$4pntTPWAt8Nkvt6MwR3pHe7Brgtxp1SyeAu5BkzJMeCfw6uQDoiI6', 'admin', NULL, '2025-07-20 19:09:56', '2025-07-20 19:09:56'),
(15, 'rudi', 'rudi@gmail.com', NULL, '$2y$12$4.BsKgE9iuBXr2/GeyHRv.aMyU6jBDZIbNLzP02nrWh5ZH1RWUlfK', 'admin', NULL, '2025-08-01 15:32:49', '2025-08-01 15:32:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangunan`
--
ALTER TABLE `bangunan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berhenti_berlangganan`
--
ALTER TABLE `berhenti_berlangganan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berhenti_berlangganan_petugas_id_foreign` (`petugas_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `customer_servis`
--
ALTER TABLE `customer_servis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_servis_pelanggan_id_foreign` (`pelanggan_id`);

--
-- Indexes for table `edukasi_sosial`
--
ALTER TABLE `edukasi_sosial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `edukasi_sosial_petugas_id_foreign` (`petugas_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hasil_petugas`
--
ALTER TABLE `hasil_petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasil_petugas_proses_petugas_id_foreign` (`proses_petugas_id`);

--
-- Indexes for table `item_penerimaan_barang`
--
ALTER TABLE `item_penerimaan_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_pengeluaran_barang`
--
ALTER TABLE `item_pengeluaran_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kinerja_petugas`
--
ALTER TABLE `kinerja_petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kinerja_petugas_petugas_id_foreign` (`petugas_id`),
  ADD KEY `kinerja_petugas_laporan_id_foreign` (`laporan_id`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `konsultasi_petugas_id_foreign` (`petugas_id`);

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerimaan_barang`
--
ALTER TABLE `penerimaan_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran_barang`
--
ALTER TABLE `pengeluaran_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas_pelayanan`
--
ALTER TABLE `petugas_pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_sku_unique` (`sku`),
  ADD KEY `product_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `proses_petugas`
--
ALTER TABLE `proses_petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proses_petugas_petugas_id_foreign` (`petugas_id`),
  ADD KEY `proses_petugas_laporan_id_foreign` (`laporan_id`),
  ADD KEY `proses_petugas_kendaraan_id_foreign` (`kendaraan_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tagihan_no_pelanggan`
--
ALTER TABLE `tagihan_no_pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagihan_no_pelanggan_proses_petugas_id_foreign` (`proses_petugas_id`);

--
-- Indexes for table `tagihan_pemasangan`
--
ALTER TABLE `tagihan_pemasangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagihan_pemasangan_proses_petugas_id_foreign` (`proses_petugas_id`);

--
-- Indexes for table `tagihan_penyedotan`
--
ALTER TABLE `tagihan_penyedotan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagihan_penyedotan_proses_petugas_id_foreign` (`proses_petugas_id`),
  ADD KEY `tagihan_penyedotan_bangunan_id_foreign` (`bangunan_id`);

--
-- Indexes for table `tagihan_perbaikan`
--
ALTER TABLE `tagihan_perbaikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagihan_perbaikan_proses_petugas_id_foreign` (`proses_petugas_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bangunan`
--
ALTER TABLE `bangunan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `berhenti_berlangganan`
--
ALTER TABLE `berhenti_berlangganan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_servis`
--
ALTER TABLE `customer_servis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `edukasi_sosial`
--
ALTER TABLE `edukasi_sosial`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_petugas`
--
ALTER TABLE `hasil_petugas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item_penerimaan_barang`
--
ALTER TABLE `item_penerimaan_barang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item_pengeluaran_barang`
--
ALTER TABLE `item_pengeluaran_barang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kinerja_petugas`
--
ALTER TABLE `kinerja_petugas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penerimaan_barang`
--
ALTER TABLE `penerimaan_barang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengeluaran_barang`
--
ALTER TABLE `pengeluaran_barang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `petugas_pelayanan`
--
ALTER TABLE `petugas_pelayanan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `proses_petugas`
--
ALTER TABLE `proses_petugas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tagihan_no_pelanggan`
--
ALTER TABLE `tagihan_no_pelanggan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tagihan_pemasangan`
--
ALTER TABLE `tagihan_pemasangan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tagihan_penyedotan`
--
ALTER TABLE `tagihan_penyedotan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tagihan_perbaikan`
--
ALTER TABLE `tagihan_perbaikan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berhenti_berlangganan`
--
ALTER TABLE `berhenti_berlangganan`
  ADD CONSTRAINT `berhenti_berlangganan_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `petugas_pelayanan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_servis`
--
ALTER TABLE `customer_servis`
  ADD CONSTRAINT `customer_servis_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `edukasi_sosial`
--
ALTER TABLE `edukasi_sosial`
  ADD CONSTRAINT `edukasi_sosial_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `petugas_pelayanan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hasil_petugas`
--
ALTER TABLE `hasil_petugas`
  ADD CONSTRAINT `hasil_petugas_proses_petugas_id_foreign` FOREIGN KEY (`proses_petugas_id`) REFERENCES `proses_petugas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kinerja_petugas`
--
ALTER TABLE `kinerja_petugas`
  ADD CONSTRAINT `kinerja_petugas_laporan_id_foreign` FOREIGN KEY (`laporan_id`) REFERENCES `laporan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kinerja_petugas_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `petugas_pelayanan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `petugas_pelayanan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `proses_petugas`
--
ALTER TABLE `proses_petugas`
  ADD CONSTRAINT `proses_petugas_kendaraan_id_foreign` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proses_petugas_laporan_id_foreign` FOREIGN KEY (`laporan_id`) REFERENCES `laporan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proses_petugas_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `petugas_pelayanan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tagihan_no_pelanggan`
--
ALTER TABLE `tagihan_no_pelanggan`
  ADD CONSTRAINT `tagihan_no_pelanggan_proses_petugas_id_foreign` FOREIGN KEY (`proses_petugas_id`) REFERENCES `proses_petugas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tagihan_pemasangan`
--
ALTER TABLE `tagihan_pemasangan`
  ADD CONSTRAINT `tagihan_pemasangan_proses_petugas_id_foreign` FOREIGN KEY (`proses_petugas_id`) REFERENCES `proses_petugas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tagihan_penyedotan`
--
ALTER TABLE `tagihan_penyedotan`
  ADD CONSTRAINT `tagihan_penyedotan_bangunan_id_foreign` FOREIGN KEY (`bangunan_id`) REFERENCES `bangunan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tagihan_penyedotan_proses_petugas_id_foreign` FOREIGN KEY (`proses_petugas_id`) REFERENCES `proses_petugas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tagihan_perbaikan`
--
ALTER TABLE `tagihan_perbaikan`
  ADD CONSTRAINT `tagihan_perbaikan_proses_petugas_id_foreign` FOREIGN KEY (`proses_petugas_id`) REFERENCES `proses_petugas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
