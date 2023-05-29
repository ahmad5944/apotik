-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2023 pada 19.21
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `no_akun` varchar(5) NOT NULL,
  `nm_akun` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`no_akun`, `nm_akun`) VALUES
('11100', 'Kas'),
('11200', 'Kas Kecil'),
('11300', 'Bank'),
('14000', 'Persediaan Barang'),
('41000', 'Retur'),
('51000', 'Penjualan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kd_brg` varchar(5) NOT NULL,
  `nm_brg` varchar(25) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kd_brg`, `nm_brg`, `jenis`, `harga`, `stok`, `tgl`) VALUES
('O01', 'Alleron (4mg)', 'Tablet', 25000, 48, '2024-06-01'),
('O02', 'Paracetamol (500mg)', 'Tablet', 20000, 48, '2024-06-01'),
('O03', 'Antasida Doen', 'Tablet', 25000, 32, '2024-06-01'),
('O04', 'OBH Combi', 'Sirup', 25000, 42, '2024-06-01'),
('O05', 'Opistan', 'Tablet', 15000, 47, '2024-06-01'),
('O06', 'Ambeven', 'Kapsul', 15000, 38, '2024-06-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapenjualan`
--

CREATE TABLE `datapenjualan` (
  `no_jual` varchar(16) NOT NULL,
  `tgl_jual` date NOT NULL,
  `total_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datapenjualan`
--

INSERT INTO `datapenjualan` (`no_jual`, `tgl_jual`, `total_jual`) VALUES
('001/TRX/IV/2023', '2023-04-26', 50000),
('002/TRX/IV/2023', '2023-04-27', 70000),
('003/TRX/IV/2023', '2023-04-29', 25000),
('004/TRX/IV/2023', '2023-04-29', 50000),
('005/TRX/IV/2023', '2023-04-30', 40000),
('006/TRX/V/2023', '2023-05-01', 60000),
('007/TRX/V/2023', '2023-05-03', 50000),
('008/TRX/V/2023', '2023-05-03', 90000),
('009/TRX/V/2023', '2023-05-03', 45000),
('010/TRX/V/2023', '2023-05-03', 45000),
('011/TRX/V/2023', '2023-05-03', 95000),
('012/TRX/V/2023', '2023-05-03', 50000),
('013/TRX/V/2023', '2023-05-03', 45000),
('014/TRX/V/2023', '2023-05-18', 25000),
('015/TRX/V/2023', '2023-05-24', 50000),
('016/TRX/V/2023', '2023-05-24', 50000),
('017/TRX/V/2023', '2023-05-24', 40000),
('018/TRX/V/2023', '2023-05-28', 30000),
('019/TRX/V/2023', '2023-05-28', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_datapenjualan`
--

CREATE TABLE `detail_datapenjualan` (
  `no_jual` varchar(16) NOT NULL,
  `kd_brg` varchar(5) NOT NULL,
  `qty_jual` int(11) NOT NULL,
  `sub_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_datapenjualan`
--

INSERT INTO `detail_datapenjualan` (`no_jual`, `kd_brg`, `qty_jual`, `sub_jual`) VALUES
('003/TRX/IV/2023', 'O01', 1, 25000),
('005/TRX/IV/2023', 'O02', 2, 40000),
('006/TRX/V/2023', 'O02', 3, 60000),
('001/TRX/IV/2023', 'O01', 2, 50000),
('007/TRX/V/2023', 'O03', 2, 50000),
('008/TRX/V/2023', 'O02', 2, 40000),
('008/TRX/V/2023', 'O01', 1, 25000),
('008/TRX/V/2023', 'O03', 1, 25000),
('009/TRX/V/2023', 'O01', 1, 25000),
('009/TRX/V/2023', 'O02', 1, 20000),
('009/TRX/V/2023', 'O01', 1, 25000),
('009/TRX/V/2023', 'O02', 1, 20000),
('010/TRX/V/2023', 'O02', 1, 20000),
('010/TRX/V/2023', 'O03', 1, 25000),
('010/TRX/V/2023', 'O02', 1, 20000),
('010/TRX/V/2023', 'O03', 1, 25000),
('001/TRX/IV/2023', 'O01', 2, 50000),
('001/TRX/IV/2023', 'O01', 2, 50000),
('011/TRX/V/2023', 'O01', 1, 25000),
('011/TRX/V/2023', 'O02', 1, 20000),
('011/TRX/V/2023', 'O03', 2, 50000),
('012/TRX/V/2023', 'O04', 2, 50000),
('013/TRX/V/2023', 'O05', 3, 45000),
('014/TRX/V/2023', 'O04', 1, 25000),
('015/TRX/V/2023', 'O04', 2, 50000),
('014/TRX/V/2023', 'O04', 1, 25000),
('015/TRX/V/2023', 'O04', 2, 50000),
('016/TRX/V/2023', 'O01', 2, 50000),
('017/TRX/V/2023', 'O02', 2, 40000),
('018/TRX/V/2023', 'O06', 2, 30000),
('018/TRX/V/2023', 'O06', 2, 30000),
('018/TRX/V/2023', 'O06', 2, 30000),
('018/TRX/V/2023', 'O06', 2, 30000),
('018/TRX/V/2023', 'O06', 2, 30000),
('018/TRX/V/2023', 'O06', 2, 30000),
('019/TRX/V/2023', 'O03', 2, 50000),
('019/TRX/V/2023', 'O03', 2, 50000),
('019/TRX/V/2023', 'O03', 2, 50000),
('019/TRX/V/2023', 'O03', 2, 50000),
('019/TRX/V/2023', 'O03', 2, 50000),
('019/TRX/V/2023', 'O03', 2, 50000),
('019/TRX/V/2023', 'O03', 2, 50000),
('019/TRX/V/2023', 'O03', 2, 50000),
('019/TRX/V/2023', 'O03', 2, 50000);

--
-- Trigger `detail_datapenjualan`
--
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `detail_datapenjualan` FOR EACH ROW BEGIN
	UPDATE barang
    SET barang.stok= 
    barang.stok - new.qty_jual 
    WHERE
    barang.kd_brg=new.kd_brg;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `no_jual` varchar(16) NOT NULL,
  `kd_brg` varchar(5) NOT NULL,
  `qty_jual` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`no_jual`, `kd_brg`, `qty_jual`, `subtotal`) VALUES
('001/TRX/IV/2023', 'O01', 2, 50000),
('002/TRX/IV/2023', 'O02', 1, 20000),
('002/TRX/IV/2023', 'O01', 2, 50000),
('003/TRX/IV/2023', 'O01', 1, 25000),
('004/TRX/IV/2023', 'O01', 2, 50000),
('005/TRX/IV/2023', 'O02', 2, 40000),
('006/TRX/V/2023', 'O02', 3, 60000),
('007/TRX/V/2023', 'O03', 2, 50000),
('008/TRX/V/2023', 'O02', 2, 40000),
('008/TRX/V/2023', 'O01', 1, 25000),
('008/TRX/V/2023', 'O03', 1, 25000),
('009/TRX/V/2023', 'O01', 1, 25000),
('009/TRX/V/2023', 'O02', 1, 20000),
('010/TRX/V/2023', 'O02', 1, 20000),
('010/TRX/V/2023', 'O03', 1, 25000),
('011/TRX/V/2023', 'O01', 1, 25000),
('011/TRX/V/2023', 'O02', 1, 20000),
('011/TRX/V/2023', 'O03', 2, 50000),
('012/TRX/V/2023', 'O04', 2, 50000),
('013/TRX/V/2023', 'O05', 3, 45000),
('014/TRX/V/2023', 'O04', 1, 25000),
('015/TRX/V/2023', 'O04', 2, 50000),
('016/TRX/V/2023', 'O01', 2, 50000),
('017/TRX/V/2023', 'O02', 2, 40000),
('018/TRX/V/2023', 'O06', 2, 30000),
('019/TRX/V/2023', 'O03', 2, 50000);

--
-- Trigger `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `clear_temp_penjualan` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN
	DELETE FROM temp_penjualan;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_retur`
--

CREATE TABLE `detail_retur` (
  `no_retur` varchar(16) NOT NULL,
  `kd_brg` varchar(5) NOT NULL,
  `qty_retur` int(11) NOT NULL,
  `sub_retur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_retur`
--

INSERT INTO `detail_retur` (`no_retur`, `kd_brg`, `qty_retur`, `sub_retur`) VALUES
('001/RTR/V/2023', 'O02', 1, 20000),
('001/RTR/V/2023', 'O02', 1, 20000),
('002/RTR/V/2023', 'O01', 0, 0),
('002/RTR/V/2023', 'O02', 0, 0),
('002/RTR/V/2023', 'O03', 1, 25000),
('003/RTR/V/2023', 'O04', 1, 25000),
('004/RTR/V/2023', 'O05', 2, 30000),
('005/RTR/V/2023', 'O05', 1, 15000),
('006/RTR/V/2023', 'O04', 1, 25000),
('006/RTR/V/2023', 'O04', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `no_jurnal` varchar(16) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tgl_jurnal` date NOT NULL,
  `no_akun` varchar(5) DEFAULT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurnal`
--

INSERT INTO `jurnal` (`no_jurnal`, `keterangan`, `tgl_jurnal`, `no_akun`, `debet`, `kredit`) VALUES
('001/JRU/V/2023', 'Kas', '2023-05-02', '11100', 20000, 0),
('001/JRU/V/2023', 'Retur penjualan', '2023-05-02', '41000', 0, 20000),
('002/JRU/V/2023', 'Penjualan Barang ', '2023-04-26', '11100', 50000, 0),
('002/JRU/V/2023', 'Kas', '2023-04-26', '11100', 0, 50000),
('003/JRU/V/2023', 'Penjualan Barang ', '2023-04-26', '11100', 50000, 0),
('003/JRU/V/2023', 'Kas', '2023-04-26', '11100', 0, 50000),
('004/JRU/V/2023', 'Penjualan Barang ', '2023-05-03', '11100', 50000, 0),
('004/JRU/V/2023', 'Kas', '2023-05-03', '11100', 0, 50000),
('005/JRU/V/2023', 'Penjualan Barang ', '2023-05-03', '11100', 90000, 0),
('005/JRU/V/2023', 'Kas', '2023-05-03', '11100', 0, 90000),
('006/JRU/V/2023', 'Penjualan Barang ', '2023-05-03', '11100', 45000, 0),
('006/JRU/V/2023', 'Kas', '2023-05-03', '11100', 0, 45000),
('007/JRU/V/2023', 'Penjualan Barang ', '2023-05-03', '11100', 45000, 0),
('007/JRU/V/2023', 'Kas', '2023-05-03', '11100', 0, 45000),
('008/JRU/V/2023', 'Penjualan Barang ', '2023-05-03', '11100', 45000, 0),
('008/JRU/V/2023', 'Kas', '2023-05-03', '11100', 0, 45000),
('009/JRU/V/2023', 'Penjualan Barang ', '2023-05-03', '11100', 45000, 0),
('009/JRU/V/2023', 'Kas', '2023-05-03', '11100', 0, 45000),
('010/JRU/V/2023', 'Penjualan Barang ', '2023-04-26', '11100', 50000, 0),
('010/JRU/V/2023', 'Kas', '2023-04-26', '11100', 0, 50000),
('011/JRU/V/2023', 'Penjualan Barang ', '2023-05-03', '11100', 95000, 0),
('011/JRU/V/2023', 'Kas', '2023-05-03', '11100', 0, 95000),
('012/JRU/V/2023', 'Kas', '2023-05-04', '11100', 25000, 0),
('012/JRU/V/2023', 'Retur penjualan', '2023-05-04', '41000', 0, 25000),
('013/JRU/V/2023', 'Penjualan Barang ', '2023-05-03', '11100', 50000, 0),
('013/JRU/V/2023', 'Kas', '2023-05-03', '11100', 0, 50000),
('014/JRU/V/2023', 'Kas', '2023-05-04', '11100', 25000, 0),
('014/JRU/V/2023', 'Retur penjualan', '2023-05-04', '41000', 0, 25000),
('015/JRU/V/2023', 'Penjualan Barang ', '2023-05-03', '11100', 45000, 0),
('015/JRU/V/2023', 'Kas', '2023-05-03', '11100', 0, 45000),
('016/JRU/V/2023', 'Kas', '2023-05-04', '11100', 30000, 0),
('016/JRU/V/2023', 'Retur penjualan', '2023-05-04', '41000', 0, 30000),
('017/JRU/V/2023', 'Penjualan Barang ', '2023-05-18', '11100', 25000, 0),
('017/JRU/V/2023', 'Kas', '2023-05-18', '11100', 0, 25000),
('018/JRU/V/2023', 'Kas', '2023-05-18', '11100', 15000, 0),
('018/JRU/V/2023', 'Retur penjualan', '2023-05-18', '41000', 0, 15000),
('019/JRU/V/2023', 'Penjualan Barang ', '2023-05-24', '11100', 50000, 0),
('019/JRU/V/2023', 'Kas', '2023-05-24', '11100', 0, 50000),
('020/JRU/V/2023', 'Penjualan Barang ', '2023-05-18', '11100', 25000, 0),
('020/JRU/V/2023', 'Kas', '2023-05-18', '11100', 0, 25000),
('021/JRU/V/2023', 'Penjualan Barang ', '2023-05-24', '11100', 50000, 0),
('021/JRU/V/2023', 'Kas', '2023-05-24', '11100', 0, 50000),
('022/JRU/V/2023', 'Kas', '2023-05-25', '11100', 0, 0),
('022/JRU/V/2023', 'Retur penjualan', '2023-05-25', '41000', 0, 0),
('023/JRU/V/2023', 'Penjualan Barang ', '2023-05-24', '11100', 0, 50000),
('023/JRU/V/2023', 'Kas', '2023-05-24', '11100', 50000, 0),
('024/JRU/V/2023', 'Penjualan Barang ', '2023-05-24', '11100', 0, 40000),
('024/JRU/V/2023', 'Kas', '2023-05-24', '11100', 40000, 0),
('025/JRU/V/2023', 'Penjualan', '2023-05-28', NULL, 0, 30000),
('025/JRU/V/2023', 'Kas', '2023-05-28', NULL, 30000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapobt`
--

CREATE TABLE `lapobt` (
  `tgl_jual` date NOT NULL,
  `kd_brg` varchar(5) NOT NULL,
  `nm_brg` varchar(25) NOT NULL,
  `qty_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lappenj`
--

CREATE TABLE `lappenj` (
  `no_jual` varchar(16) NOT NULL,
  `tgl_jual` date NOT NULL,
  `total_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `lap_jurnal`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `lap_jurnal` (
`nm_akun` varchar(25)
,`tgl` date
,`debet` decimal(32,0)
,`kredit` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `lap_stok`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `lap_stok` (
`kd_brg` varchar(5)
,`nm_brg` varchar(25)
,`harga` int(11)
,`stok` int(11)
,`jual` decimal(32,0)
,`retur` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_04_13_124345_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 2),
(2, 'App\\User', 3),
(2, 'App\\User', 4),
(2, 'App\\User', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `no_jual` varchar(20) NOT NULL,
  `tgl_jual` date NOT NULL,
  `total` int(11) NOT NULL,
  `kd_rs` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`no_jual`, `tgl_jual`, `total`, `kd_rs`) VALUES
('001/TRX/IV/2023', '2023-04-26', 50000, 'RS01'),
('002/TRX/IV/2023', '2023-04-27', 70000, 'RS02'),
('003/TRX/IV/2023', '2023-04-29', 25000, '00'),
('004/TRX/IV/2023', '2023-04-29', 50000, 'RS01'),
('005/TRX/IV/2023', '2023-04-30', 40000, 'RS01'),
('006/TRX/V/2023', '2023-05-01', 60000, '00'),
('007/TRX/V/2023', '2023-05-03', 50000, '00'),
('008/TRX/V/2023', '2023-05-03', 90000, 'RS01'),
('009/TRX/V/2023', '2023-05-03', 45000, 'RS02'),
('010/TRX/V/2023', '2023-05-03', 45000, '00'),
('011/TRX/V/2023', '2023-05-03', 95000, 'RS01'),
('012/TRX/V/2023', '2023-05-03', 50000, '00'),
('013/TRX/V/2023', '2023-05-03', 45000, '00'),
('014/TRX/V/2023', '2023-05-18', 25000, '00'),
('015/TRX/V/2023', '2023-05-24', 50000, '00'),
('016/TRX/V/2023', '2023-05-24', 50000, '00'),
('017/TRX/V/2023', '2023-05-24', 40000, '00'),
('018/TRX/V/2023', '2023-05-28', 30000, '00'),
('019/TRX/V/2023', '2023-05-28', 50000, '00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `kd_rs` varchar(5) NOT NULL,
  `tgl_rs` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `telepon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`kd_rs`, `tgl_rs`, `nama`, `umur`, `telepon`) VALUES
('00', '0000-00-00', 'Non Resep - Pelanggan Umum', 0, 0),
('RS01', '2023-04-13', 'Jules', 25, 821876854),
('RS02', '2023-04-14', 'Farah', 15, 629872387);

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur_jual`
--

CREATE TABLE `retur_jual` (
  `no_retur` varchar(16) NOT NULL,
  `tgl_retur` date NOT NULL,
  `total_retur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `retur_jual`
--

INSERT INTO `retur_jual` (`no_retur`, `tgl_retur`, `total_retur`) VALUES
('001/RTR/V/2023', '2023-05-02', 20000),
('002/RTR/V/2023', '2023-05-04', 25000),
('003/RTR/V/2023', '2023-05-04', 25000),
('004/RTR/V/2023', '2023-05-04', 30000),
('005/RTR/V/2023', '2023-05-18', 15000),
('006/RTR/V/2023', '2023-05-25', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-04-13 06:02:55', '2023-04-13 06:02:55'),
(2, 'user', 'web', '2023-04-13 06:02:55', '2023-04-13 06:02:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id_setting` varchar(5) NOT NULL,
  `no_akun` varchar(5) NOT NULL,
  `nama_transaksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id_setting`, `no_akun`, `nama_transaksi`) VALUES
('1', '41000', 'Retur'),
('2', '51000', 'Penjualan'),
('3', '11100', 'Kas');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `tampil_datapenjualan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `tampil_datapenjualan` (
`kd_brg` varchar(5)
,`no_jual` varchar(16)
,`nm_brg` varchar(25)
,`harga` int(11)
,`qty_jual` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `tampil_penjualan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `tampil_penjualan` (
`kd_brg` varchar(5)
,`no_jual` varchar(16)
,`nm_brg` varchar(25)
,`qty_jual` int(11)
,`subtotal` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_penjualan`
--

CREATE TABLE `temp_penjualan` (
  `kd_brg` varchar(5) NOT NULL,
  `qty_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `temp_penjualan`
--

INSERT INTO `temp_penjualan` (`kd_brg`, `qty_jual`) VALUES
('O02', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'lia', 'lia@gmail.com', NULL, '$2y$10$G2AfqAWEB5eBtt2pFHUq3OtbQKFeNz00xL5gYL496T9WaDdKDNXyK', NULL, '2023-04-12 23:26:39', '2023-04-12 23:26:39'),
(2, 'admin', 'admin@test.com', NULL, '$2y$10$nzbIQV8cSLUrDPhNSPgKyOqfnxjvlffp8bRSUN1bqbA42wpWU2Dk2', NULL, '2023-04-13 06:02:55', '2023-04-13 06:02:55'),
(3, 'user', 'user@test.com', NULL, '$2y$10$amlaD19UfPYhL0COe2gPhun7wdrG3BXHAv/YAMXlPxducGXXRPkee', NULL, '2023-04-13 06:02:56', '2023-04-13 06:02:56'),
(4, 'hana', 'hana@test.com', NULL, '$2y$10$Xrs6lxGUT2M9pjBwphG57ex05/eKp1RjKAsPdR8jQCtVXNYPfEuWm', NULL, '2023-04-13 06:20:33', '2023-04-13 06:20:33'),
(12, 'dwi', 'dwi@gmail.com', NULL, '$2y$10$.GnKhKdrC8udopXJftpHyuk7fuScLMu4kThObs/pbaeWAYcPRdu52', NULL, '2023-04-16 01:25:46', '2023-04-16 01:25:46');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_temp_jual`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_temp_jual` (
`kd_brg` varchar(5)
,`nm_brg` varchar(36)
,`qty_jual` int(11)
,`sub_total` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `lap_jurnal`
--
DROP TABLE IF EXISTS `lap_jurnal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lap_jurnal`  AS SELECT `akun`.`nm_akun` AS `nm_akun`, `jurnal`.`tgl_jurnal` AS `tgl`, sum(`jurnal`.`debet`) AS `debet`, sum(`jurnal`.`kredit`) AS `kredit` FROM (`akun` join `jurnal`) WHERE `akun`.`no_akun` = `jurnal`.`no_akun` GROUP BY `jurnal`.`no_jurnal` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `lap_stok`
--
DROP TABLE IF EXISTS `lap_stok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lap_stok`  AS   (select `barang`.`kd_brg` AS `kd_brg`,`barang`.`nm_brg` AS `nm_brg`,`barang`.`harga` AS `harga`,`barang`.`stok` AS `stok`,sum(`detail_datapenjualan`.`qty_jual`) AS `jual`,sum(`detail_retur`.`qty_retur`) AS `retur` from ((`barang` join `detail_retur`) join `detail_datapenjualan`) where `barang`.`kd_brg` = `detail_retur`.`kd_brg` and `barang`.`kd_brg` = `detail_datapenjualan`.`kd_brg` group by `barang`.`kd_brg`,`barang`.`nm_brg`,`barang`.`harga`,`barang`.`stok`)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `tampil_datapenjualan`
--
DROP TABLE IF EXISTS `tampil_datapenjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tampil_datapenjualan`  AS   (select `barang`.`kd_brg` AS `kd_brg`,`detail_datapenjualan`.`no_jual` AS `no_jual`,`barang`.`nm_brg` AS `nm_brg`,`barang`.`harga` AS `harga`,`detail_datapenjualan`.`qty_jual` AS `qty_jual` from (`barang` join `detail_datapenjualan`) where `barang`.`kd_brg` = `detail_datapenjualan`.`kd_brg`)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `tampil_penjualan`
--
DROP TABLE IF EXISTS `tampil_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tampil_penjualan`  AS SELECT `detail_penjualan`.`kd_brg` AS `kd_brg`, `detail_penjualan`.`no_jual` AS `no_jual`, `barang`.`nm_brg` AS `nm_brg`, `detail_penjualan`.`qty_jual` AS `qty_jual`, `detail_penjualan`.`subtotal` AS `subtotal` FROM (`barang` join `detail_penjualan`) WHERE `detail_penjualan`.`kd_brg` = `barang`.`kd_brg` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_temp_jual`
--
DROP TABLE IF EXISTS `view_temp_jual`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_temp_jual`  AS SELECT `temp_penjualan`.`kd_brg` AS `kd_brg`, concat(`barang`.`nm_brg`,`barang`.`harga`) AS `nm_brg`, `temp_penjualan`.`qty_jual` AS `qty_jual`, `barang`.`harga`* `temp_penjualan`.`qty_jual` AS `sub_total` FROM (`temp_penjualan` join `barang`) WHERE `temp_penjualan`.`kd_brg` = `barang`.`kd_brg` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`no_akun`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indeks untuk tabel `datapenjualan`
--
ALTER TABLE `datapenjualan`
  ADD PRIMARY KEY (`no_jual`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_jual`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`kd_rs`);

--
-- Indeks untuk tabel `retur_jual`
--
ALTER TABLE `retur_jual`
  ADD PRIMARY KEY (`no_retur`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
