-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Okt 2021 pada 22.57
-- Versi server: 10.2.40-MariaDB-cll-lve
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pusb8564_dataku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `CONTACT`
--

CREATE TABLE `CONTACT` (
  `ID` int(11) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `SUBJECT` varchar(250) DEFAULT NULL,
  `MESSAGES` text DEFAULT NULL,
  `STATUS` enum('READ','UNREAD') DEFAULT 'UNREAD',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `CUSTOMER`
--

CREATE TABLE `CUSTOMER` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `TGL_LAHIR` date DEFAULT NULL,
  `ALAMAT` text DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `NO_HP` varchar(16) DEFAULT NULL,
  `IS_AGEN` enum('YES','NO') DEFAULT 'NO',
  `KODE_REFERAL` varchar(10) DEFAULT NULL,
  `STATUS` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `LOG_TRANSAKSI`
--

CREATE TABLE `LOG_TRANSAKSI` (
  `ID` int(11) NOT NULL,
  `TIPE` enum('REQUEST','RESPONSE') DEFAULT 'REQUEST',
  `ID_REFFERENCE` varchar(10) DEFAULT NULL,
  `ID_TRANSAKSI` varchar(11) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT 'SYSTEM'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `LOG_TRANSAKSI`
--

INSERT INTO `LOG_TRANSAKSI` (`ID`, `TIPE`, `ID_REFFERENCE`, `ID_TRANSAKSI`, `DESCRIPTION`, `CREATED_DATE`, `CREATED_BY`) VALUES
(1, 'REQUEST', '068B533ECD', '89559', '{\"ref_id\":\"068B533ECD\",\"status\":0,\"price\":5990,\"message\":\"PROCESS\",\"balance\":99414840,\"tr_id\":89559,\"rc\":\"39\",\"code\":\"hindosat5000\",\"hp\":\"08576456238982\"}', '2021-10-10 06:33:08', 'SYSTEM'),
(2, 'REQUEST', 'BF71734503', '89560', '{\"ref_id\":\"BF71734503\",\"status\":0,\"price\":10800,\"message\":\"PROCESS\",\"balance\":99404040,\"tr_id\":89560,\"rc\":\"39\",\"code\":\"haxis10000\",\"hp\":\"0831823294561\"}', '2021-10-10 06:33:21', 'SYSTEM'),
(3, 'REQUEST', '1F49E2F2B6', '89561', '{\"ref_id\":\"1F49E2F2B6\",\"status\":0,\"price\":15000,\"message\":\"PROCESS\",\"balance\":99389040,\"tr_id\":89561,\"rc\":\"39\",\"code\":\"haxis15000\",\"hp\":\"0831823294562\"}', '2021-10-10 06:33:41', 'SYSTEM'),
(4, 'REQUEST', '5391A99ED6', '89562', '{\"ref_id\":\"5391A99ED6\",\"status\":0,\"price\":26000,\"message\":\"PROCESS\",\"balance\":99363040,\"tr_id\":89562,\"rc\":\"39\",\"code\":\"haxis25000\",\"hp\":\"0831823294563\"}', '2021-10-10 06:33:55', 'SYSTEM'),
(5, 'REQUEST', 'DFB64A5F4B', '89563', '{\"ref_id\":\"DFB64A5F4B\",\"status\":0,\"price\":51000,\"message\":\"PROCESS\",\"balance\":99312040,\"tr_id\":89563,\"rc\":\"39\",\"code\":\"haxis50000\",\"hp\":\"0831823294564\"}', '2021-10-10 06:34:10', 'SYSTEM'),
(6, 'REQUEST', '3CD6F696CC', '89564', '{\"ref_id\":\"3CD6F696CC\",\"status\":0,\"price\":100000,\"message\":\"PROCESS\",\"balance\":99212040,\"tr_id\":89564,\"rc\":\"39\",\"code\":\"haxis100000\",\"hp\":\"0831823294565\"}', '2021-10-10 06:34:23', 'SYSTEM'),
(7, 'RESPONSE', '3CD6F696CC', '89564', '{\"data\":{\"ref_id\":\"3CD6F696CC\",\"status\":\"1\",\"price\":\"100000\",\"message\":\"SUCCESS\",\"balance\":\"99212040\",\"tr_id\":\"89564\",\"rc\":\"00\",\"sn\":\"123456789\",\"sign\":\"dc50dc09efd3d15bab28e332717d8103\",\"code\":\"haxis100000\",\"hp\":\"0831823294565\"}}', '2021-10-10 06:34:42', 'SYSTEM'),
(8, 'RESPONSE', 'DFB64A5F4B', '89563', '{\"data\":{\"ref_id\":\"DFB64A5F4B\",\"status\":\"2\",\"price\":\"51000\",\"message\":\"CUSTOMER NUMBER BLOCKED\",\"balance\":\"99212040\",\"tr_id\":\"89563\",\"rc\":\"13\",\"sign\":\"08fcb7c2213eafe7049d6ce295307fdb\",\"code\":\"haxis50000\",\"hp\":\"0831823294564\"}}', '2021-10-10 06:34:47', 'SYSTEM'),
(9, 'RESPONSE', '5391A99ED6', '89562', '{\"data\":{\"ref_id\":\"5391A99ED6\",\"status\":\"2\",\"price\":\"26000\",\"message\":\"UNDEFINED ERROR\",\"balance\":\"99212040\",\"tr_id\":\"89562\",\"rc\":\"05\",\"sign\":\"21b0ee9387284d2b6483a37b7ead5beb\",\"code\":\"haxis25000\",\"hp\":\"0831823294563\"}}', '2021-10-10 06:34:53', 'SYSTEM'),
(10, 'RESPONSE', '1F49E2F2B6', '89561', '{\"data\":{\"ref_id\":\"1F49E2F2B6\",\"status\":\"2\",\"price\":\"15000\",\"message\":\"INCORRECT DESTINATION NUMBER\",\"balance\":\"99212040\",\"tr_id\":\"89561\",\"rc\":\"14\",\"sign\":\"ebc6753785c45846f32c07acb0d722a2\",\"code\":\"haxis15000\",\"hp\":\"0831823294562\"}}', '2021-10-10 06:35:02', 'SYSTEM'),
(11, 'RESPONSE', 'BF71734503', '89560', '{\"data\":{\"ref_id\":\"BF71734503\",\"status\":\"1\",\"price\":\"10800\",\"message\":\"SUCCESS\",\"balance\":\"99212040\",\"tr_id\":\"89560\",\"rc\":\"00\",\"sn\":\"123456789\",\"sign\":\"ab0af4cab11902790474dd19545eae10\",\"code\":\"haxis10000\",\"hp\":\"0831823294561\"}}', '2021-10-10 06:35:08', 'SYSTEM'),
(12, 'RESPONSE', '068B533ECD', '89559', '{\"data\":{\"ref_id\":\"068B533ECD\",\"status\":\"1\",\"price\":\"5990\",\"message\":\"SUCCESS\",\"balance\":\"99212040\",\"tr_id\":\"89559\",\"rc\":\"00\",\"sn\":\"123456789\",\"sign\":\"0117e83e93374a9b9647c98441fbfbf6\",\"code\":\"hindosat5000\",\"hp\":\"08576456238982\"}}', '2021-10-10 06:35:11', 'SYSTEM'),
(13, 'REQUEST', '819D5467CC', '89570', '{\"ref_id\":\"819D5467CC\",\"status\":0,\"price\":10800,\"message\":\"PROCESS\",\"balance\":99201240,\"tr_id\":89570,\"rc\":\"39\",\"code\":\"haxis10000\",\"hp\":\"08311111111111\"}', '2021-10-10 12:35:35', 'SYSTEM'),
(14, 'RESPONSE', '819D5467CC', '89570', '{\"data\":{\"ref_id\":\"819D5467CC\",\"status\":\"1\",\"price\":\"10800\",\"message\":\"SUCCESS\",\"balance\":\"99201240\",\"tr_id\":\"89570\",\"rc\":\"00\",\"sn\":\"123456789\",\"sign\":\"f44ef2a9d4b846f5d8d0770f6e6ee0a4\",\"code\":\"haxis10000\",\"hp\":\"08311111111111\"}}', '2021-10-10 12:37:20', 'SYSTEM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `MS_AGEN`
--

CREATE TABLE `MS_AGEN` (
  `ID` int(11) DEFAULT NULL,
  `KODE_REFERAL` varchar(10) DEFAULT NULL,
  `POIN` int(11) DEFAULT 0,
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `MS_BANNER`
--

CREATE TABLE `MS_BANNER` (
  `ID` int(11) NOT NULL,
  `ID_NEWS` int(11) DEFAULT NULL,
  `TITLE` varchar(100) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `FILE_URL` varchar(250) DEFAULT NULL,
  `STATUS` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `MS_KATEGORI`
--

CREATE TABLE `MS_KATEGORI` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(250) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `STATUS` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `MS_KATEGORI`
--

INSERT INTO `MS_KATEGORI` (`ID`, `NAME`, `DESCRIPTION`, `STATUS`, `CREATED_DATE`, `CREATED_BY`, `UPDATED_DATE`, `UPDATED_BY`, `DELETED_DATE`, `DELETED_BY`) VALUES
(1, 'PRABAYAR', '', 'ACTIVE', '2021-09-19 04:46:42', 'IRFANDI', '2021-09-19 10:33:30', 'IRFANDI', NULL, NULL),
(2, 'PASCABAYAR', '', 'ACTIVE', '2021-09-19 04:46:59', 'IRFANDI', NULL, NULL, NULL, NULL),
(3, 'E-MONEY', '', 'ACTIVE', '2021-09-19 04:47:20', 'IRFANDI', NULL, NULL, NULL, NULL),
(4, 'VOUCHER GAME', '', 'ACTIVE', '2021-09-19 04:48:10', 'IRFANDI', '2021-09-19 10:33:17', 'IRFANDI', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `MS_NEWS`
--

CREATE TABLE `MS_NEWS` (
  `ID` int(11) DEFAULT NULL,
  `TITLE` varchar(100) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `STATUS` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `MS_PRODUK_PULSA`
--

CREATE TABLE `MS_PRODUK_PULSA` (
  `ID` int(11) NOT NULL,
  `TYPE` enum('PULSA','PAKET NELPON','PAKET SMS') DEFAULT 'PULSA',
  `ID_PROVIDER` int(11) DEFAULT NULL,
  `CODE` varchar(50) DEFAULT NULL,
  `NAME` varchar(250) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `HARGA_MODAL` decimal(15,0) DEFAULT 0,
  `HARGA_JUAL` decimal(15,0) DEFAULT 0,
  `MASA_AKTIF` int(11) DEFAULT NULL,
  `STATUS` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `MS_PRODUK_PULSA`
--

INSERT INTO `MS_PRODUK_PULSA` (`ID`, `TYPE`, `ID_PROVIDER`, `CODE`, `NAME`, `DESCRIPTION`, `HARGA_MODAL`, `HARGA_JUAL`, `MASA_AKTIF`, `STATUS`, `CREATED_DATE`, `CREATED_BY`, `UPDATED_DATE`, `UPDATED_BY`, `DELETED_DATE`, `DELETED_BY`) VALUES
(1, 'PULSA', 3, 'haxis5000', '5,000', 'Pulsa reguler 5,000. Masa aktif 7 Hari', 5900, 6500, 7, 'ACTIVE', '2021-10-03 07:05:46', 'IRFANDI', '2021-10-08 02:35:33', 'SYSTEM', NULL, NULL),
(2, 'PULSA', 3, 'haxis10000', '10,000', 'Pulsa Reguler 10,000. Masa aktif 14 Hari', 10800, 11500, 15, 'ACTIVE', '2021-10-03 07:05:46', 'IRFANDI', '2021-10-09 21:42:01', 'SYSTEM', NULL, NULL),
(3, 'PULSA', 3, 'haxis15000', '15,000', 'Pulsa reguler 15,000. Masa aktif 20 Hari', 15000, 15500, 0, 'ACTIVE', '2021-10-03 07:05:46', 'IRFANDI', '2021-10-09 00:27:51', 'SYSTEM', NULL, NULL),
(4, 'PULSA', 3, 'haxis25000', '25,000', 'Pulsa reguler 25,000. Masa aktif 35 Hari', 26000, 25500, 30, 'ACTIVE', '2021-10-03 07:05:46', 'IRFANDI', '2021-10-10 06:33:55', 'SYSTEM', NULL, NULL),
(5, 'PULSA', 3, 'haxis30000', '30,000', 'Pulsa reguler 30,000. Masa aktif 45 Hari', 29900, 31500, NULL, 'INACTIVE', '2021-10-03 07:05:46', 'IRFANDI', '2021-10-10 06:34:07', 'SYSTEM', NULL, NULL),
(6, 'PULSA', 3, 'haxis50000', '50,000', 'Pulsa reguler 50,000. Masa aktif 75 Hari', 51000, 52000, 60, 'ACTIVE', '2021-10-03 07:12:11', 'IRFANDI', '2021-10-08 12:39:24', 'SYSTEM', NULL, NULL),
(7, 'PULSA', 3, 'haxis100000', '100,000', 'Pulsa reguler 100,000. Masa aktif 150 Hari', 100000, 102000, 90, 'ACTIVE', '2021-10-03 07:12:11', 'IRFANDI', '2021-10-10 06:34:22', 'SYSTEM', NULL, NULL),
(8, 'PULSA', 3, 'haxis200000', '200,000', 'Pulsa reguler 200,000. Masa aktif 300 Hari', 199080, 200000, NULL, 'ACTIVE', '2021-10-03 07:23:43', 'IRFANDI', NULL, NULL, NULL, NULL),
(9, 'PULSA', 3, 'haxis300000', '300,000', 'Pulsa reguler 300,000. Masa aktif 360 Hari', 299000, 300000, NULL, 'ACTIVE', '2021-10-03 07:23:43', 'IRFANDI', NULL, NULL, NULL, NULL),
(10, 'PULSA', 3, 'haxis500000', '500,000', 'Pulsa reguler 500,000. Masa aktif 360 Hari', 498000, 500000, NULL, 'ACTIVE', '2021-10-03 07:23:43', 'IRFANDI', NULL, NULL, NULL, NULL),
(11, 'PULSA', 3, 'haxis1000000', '1,000,000', 'Pulsa reguler 1jt. Masa aktif 360 Hari', 995000, 1000000, NULL, 'ACTIVE', '2021-10-03 07:23:43', 'IRFANDI', NULL, NULL, NULL, NULL),
(12, 'PULSA', 1, 'hindosat5000', '5,000', '-', 5990, 7000, 7, 'ACTIVE', '2021-10-03 08:19:52', 'IRFANDI', '2021-10-08 02:34:27', 'IRFANDI', NULL, NULL),
(13, 'PULSA', 1, 'hindosat10000', '10,000', 'Pulsa reguler 10,000. Masa aktif 15 Hari', 10950, 12000, 15, 'ACTIVE', '2021-10-03 08:19:53', 'IRFANDI', '2021-10-03 09:37:58', 'IRFANDI', NULL, NULL),
(14, 'PULSA', 1, 'hindosat12000', '12,000', 'Pulsa reguler 12,000. Masa aktif 15 Hari', 12500, 13500, 15, 'ACTIVE', '2021-10-03 10:10:10', 'IRFANDI', '2021-10-08 17:41:36', 'SYSTEM', NULL, NULL),
(15, 'PULSA', 1, 'hindosat15000', '15,000', 'Pulsa reguler 15,000. Masa aktif 20 Hari', 15590, 16500, 0, 'INACTIVE', '2021-10-03 10:10:10', 'IRFANDI', '2021-10-09 00:26:40', 'SYSTEM', NULL, NULL),
(16, 'PULSA', 1, 'hindosat20000', '20,000', 'Pulsa reguler 20,000. Masa aktif 30 Hari', 20200, 21500, 30, 'ACTIVE', '2021-10-03 10:10:10', 'IRFANDI', '2021-10-07 09:48:49', 'SYSTEM', NULL, NULL),
(17, 'PULSA', 1, 'hindosat25000', '25,000', 'Pulsa reguler 25,000. Masa aktif 30 Hari', 25000, 26000, NULL, 'ACTIVE', '2021-10-03 10:10:10', 'IRFANDI', NULL, NULL, NULL, NULL),
(18, 'PULSA', 1, 'hindosat30000', '30,000', 'Pulsa reguler 30,000. Masa aktif 30 Hari', 30710, 31500, NULL, 'ACTIVE', '2021-10-03 10:10:10', 'IRFANDI', NULL, NULL, NULL, NULL),
(19, 'PULSA', 1, 'hindosat50000', '50,000', 'Pulsa reguler 50,000. Masa aktif 45 Hari', 48800, 50500, 45, 'ACTIVE', '2021-10-03 10:10:10', 'IRFANDI', '2021-10-08 21:53:14', 'SYSTEM', NULL, NULL),
(20, 'PULSA', 1, 'hindosat60000', '60,000', 'Pulsa reguler 60,000. Masa aktif 60 Hari', 58800, 60500, 0, 'ACTIVE', '2021-10-03 10:10:10', 'IRFANDI', '2021-10-08 16:47:18', 'SYSTEM', NULL, NULL),
(21, 'PULSA', 1, 'hindosat80000', '80,000', 'Pulsa reguler 80,000. Masa aktif 60 Hari', 78410, 79500, NULL, 'ACTIVE', '2021-10-03 10:10:10', 'IRFANDI', NULL, NULL, NULL, NULL),
(22, 'PULSA', 1, 'hindosat100000', '100,000', 'Pulsa reguler 100,000. Masa aktif 60 Hari', 98510, 100000, NULL, 'ACTIVE', '2021-10-03 10:10:10', 'IRFANDI', NULL, NULL, NULL, NULL),
(23, 'PULSA', 1, 'hindosat150000', '150,000', 'Pulsa reguler 150,000. Masa aktif 90 Hari', 143750, 150000, NULL, 'ACTIVE', '2021-10-03 10:10:10', 'IRFANDI', NULL, NULL, NULL, NULL),
(24, 'PULSA', 1, 'hindosat200000', '200,000', 'Pulsa reguler 200,000. Masa aktif 90 Hari', 186470, 200000, NULL, 'ACTIVE', '2021-10-03 10:10:10', 'IRFANDI', NULL, NULL, NULL, NULL),
(25, 'PULSA', 1, 'hindosat500000', '500,000', 'Pulsa reguler 500,000. Masa aktif 120 Hari', 463000, 500000, 60, 'ACTIVE', '2021-10-03 10:10:10', 'IRFANDI', '2021-10-08 13:31:52', 'SYSTEM', NULL, NULL),
(26, 'PAKET SMS', 1, 'hindosat5000SMS', '300 SMS sesama Indosat + 100 SMS operator lain', '300 SMS sesama Isat + 100 SMS operator lain', 6540, 7500, NULL, 'ACTIVE', '2021-10-03 10:23:10', 'IRFANDI', NULL, NULL, NULL, NULL),
(27, 'PAKET SMS', 1, 'hindosat10000SMS', '600 SMS sesama Isat + 200 SMS operator lain', '600 SMS sesama Isat + 200 SMS operator lain', 12070, 13500, NULL, 'ACTIVE', '2021-10-03 10:23:10', 'IRFANDI', '2021-10-03 10:27:51', 'IRFANDI', NULL, NULL),
(28, 'PAKET SMS', 1, 'hindosat25000SMS', '2000 SMS sesama Isat + 500 SMS operator lain', '2000 SMS sesama Isat + 500 SMS operator lain', 28150, 30000, NULL, 'ACTIVE', '2021-10-03 10:23:10', 'IRFANDI', NULL, NULL, NULL, NULL),
(29, 'PULSA', 1, 'hindosat40000', '40,000', '-', 40000, 41500, NULL, 'ACTIVE', '2021-10-06 11:57:13', 'IRFANDI', NULL, NULL, NULL, NULL),
(30, 'PULSA', 1, 'hindosat90000', '90,000', '-', 90000, 91500, NULL, 'INACTIVE', '2021-10-06 11:57:13', 'IRFANDI', '2021-10-08 11:28:00', 'SYSTEM', NULL, NULL),
(31, 'PULSA', 1, 'hindosat125000', '125,000', '-', 125000, 126500, NULL, 'ACTIVE', '2021-10-06 11:57:13', 'IRFANDI', NULL, NULL, NULL, NULL),
(32, 'PULSA', 1, 'hindosat175000', '175,000', '-', 175000, 176500, NULL, 'ACTIVE', '2021-10-06 11:57:13', 'IRFANDI', NULL, NULL, NULL, NULL),
(33, 'PULSA', 1, 'hindosat250000', '250,000', 'Pulsa reguler 250,000. Masa aktif 120 Hari', 233210, 250000, NULL, 'ACTIVE', '2021-10-06 11:57:13', 'IRFANDI', NULL, NULL, NULL, NULL),
(34, 'PAKET NELPON', 1, 'hindosat10000TEL', 'Paket Nelpon Sepuasnya Rp 10.000', 'Paket Nelpon Obrol Sepuasnya ke Sesama / 30 Hari (Unlimited Nelp ke sesama & Spesial Tarif Nelp ke operator lain Rp 10/detik. Masa aktif 30 hari)', 10360, 11500, NULL, 'ACTIVE', '2021-10-06 12:01:46', 'IRFANDI', NULL, NULL, NULL, NULL),
(35, 'PAKET NELPON', 1, 'hindosat25000TEL', 'Paket Nelpon Sepuasnya Rp 25.000', 'Paket Nelpon Obrol Sepuasnya ke Sesama + 60 menit ke Semua / 30 Hari (Unlimited Nelp ke sesama & 60 Menit Nelp ke operator lain. Masa aktif 30 hari)', 24880, 26500, NULL, 'ACTIVE', '2021-10-06 12:01:46', 'IRFANDI', NULL, NULL, NULL, NULL),
(36, 'PAKET NELPON', 1, 'hindosat50000TEL', 'Paket Nelpon Sepuasnya Rp 50.000', 'Paket Nelpon Obrol Sepuasnya ke Sesama + 250 menit ke Semua / 30 Hari (Unlimited Nelp ke sesama & 250 Menit Nelp ke operator lain. Masa aktif 30 hari)', 49710, 52000, NULL, 'ACTIVE', '2021-10-06 12:01:46', 'IRFANDI', NULL, NULL, NULL, NULL),
(37, 'PAKET NELPON', 1, 'hindosat56000TEL', 'Paket Nelpon Obrol Sepuasnya ke Sesama + 60 menit ke Semua / 30 Hari', '-', 57900, 60000, NULL, 'ACTIVE', '2021-10-06 12:01:46', 'IRFANDI', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `MS_PROMO`
--

CREATE TABLE `MS_PROMO` (
  `ID` int(11) NOT NULL,
  `KODE_PROMO` varchar(10) DEFAULT NULL,
  `TITLE` varchar(100) DEFAULT NULL,
  `DESCRIPTION` varchar(250) DEFAULT NULL,
  `TIPE` enum('PERCEN','NOMINAL') DEFAULT NULL,
  `DISC` decimal(18,2) DEFAULT 0.00,
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `MS_PROVIDER`
--

CREATE TABLE `MS_PROVIDER` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `IMAGE` varchar(100) DEFAULT NULL,
  `STATUS` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `MS_PROVIDER`
--

INSERT INTO `MS_PROVIDER` (`ID`, `NAME`, `DESCRIPTION`, `IMAGE`, `STATUS`, `CREATED_DATE`, `CREATED_BY`, `UPDATED_DATE`, `UPDATED_BY`, `DELETED_DATE`, `DELETED_BY`) VALUES
(1, 'INDOSAT', '0814,0815,0816,0855,0856,0857,0858', 'indosat.svg', 'ACTIVE', '2021-10-01 11:11:48', NULL, NULL, NULL, NULL, NULL),
(2, 'XL', '0817,0818,0819,0859,0878,0877', 'xl.png', 'ACTIVE', '2021-10-01 11:12:21', NULL, NULL, NULL, NULL, NULL),
(3, 'AXIS', '0838,0837,0831,0832', 'axis.png', 'ACTIVE', '2021-10-01 11:12:54', NULL, NULL, NULL, NULL, NULL),
(4, 'TELKOMSEL', '0811,0812,0813,0852,0853,0821,0823,0822,0851', 'telkomsel.png', 'ACTIVE', '2021-10-01 11:12:57', NULL, NULL, NULL, NULL, NULL),
(5, 'SMARTFREN', '0881,0882,0883,0884, 0885,0886,0887,0888', 'smartfren.png', 'ACTIVE', '2021-10-01 11:13:30', NULL, NULL, NULL, NULL, NULL),
(6, 'THREE', '0896,0897,0898,0899,0895', 'three.png', 'ACTIVE', '2021-10-01 11:13:32', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `MS_SUB_KATEGORI`
--

CREATE TABLE `MS_SUB_KATEGORI` (
  `ID` int(11) NOT NULL,
  `ID_KATEGORI` int(11) DEFAULT NULL,
  `NAME` varchar(250) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `TITLE_LABEL` enum('ICON','IMAGE') DEFAULT NULL,
  `LABEL` varchar(100) DEFAULT NULL,
  `URL` varchar(250) DEFAULT NULL,
  `STATUS` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `MS_SUB_KATEGORI`
--

INSERT INTO `MS_SUB_KATEGORI` (`ID`, `ID_KATEGORI`, `NAME`, `DESCRIPTION`, `TITLE_LABEL`, `LABEL`, `URL`, `STATUS`, `CREATED_DATE`, `CREATED_BY`, `UPDATED_DATE`, `UPDATED_BY`, `DELETED_DATE`, `DELETED_BY`) VALUES
(1, 1, 'Pulsa Reguler', '', 'ICON', 'fa fa-mobile-alt', 'pulsa-reguler', 'ACTIVE', '2021-09-20 09:14:01', NULL, '2021-09-30 05:37:10', 'IRFANDI', NULL, NULL),
(2, 2, 'PLN Pascabayar', NULL, 'IMAGE', 'image/payment/pln.jpg', 'pln-pascabayar', 'ACTIVE', '2021-09-20 09:14:58', NULL, NULL, NULL, NULL, NULL),
(3, 2, 'BPJS', NULL, 'IMAGE', 'image/payment/bpjs.png', 'bpjs', 'ACTIVE', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 'Pulsa Transfer', '', 'ICON', 'fa fa-exchange-alt', 'pulsa-transfer', 'ACTIVE', '2021-09-26 05:22:06', 'IRFANDI', '2021-09-30 04:44:20', 'IRFANDI', NULL, NULL),
(5, 1, 'Paket Data', '', 'ICON', 'fa fa-wifi', 'paket-data', 'ACTIVE', '2021-09-26 05:22:42', 'IRFANDI', '2021-09-30 04:45:08', 'IRFANDI', NULL, NULL),
(6, 1, 'Telepon & SMS', '', 'ICON', 'fa fa-sms', 'telepon-sms', 'ACTIVE', '2021-09-26 05:23:04', 'IRFANDI', NULL, NULL, NULL, NULL),
(7, 1, 'Token PLN', '', 'ICON', 'fa fa-bolt', 'pln-prabayar', 'ACTIVE', '2021-09-26 05:23:31', 'IRFANDI', NULL, NULL, NULL, NULL),
(8, 1, 'Voucher Internet', '', 'ICON', 'fa fa-server', 'voucher-internet', 'ACTIVE', '2021-09-26 05:23:47', 'IRFANDI', NULL, NULL, NULL, NULL),
(9, 2, 'PDAM', '', 'IMAGE', 'image/payment/pdam.png', 'pdam', 'ACTIVE', '2021-09-26 16:45:16', 'IRFANDI', NULL, NULL, NULL, NULL),
(10, 2, 'HALO TELKOMSEL', '', 'IMAGE', 'image/payment/telkomsel.png', 'halo-telkomsel', 'ACTIVE', '2021-09-26 16:45:34', 'IRFANDI', NULL, NULL, NULL, NULL),
(11, 3, 'OVO', '', 'IMAGE', 'image/payment/ovo.png', 'ovo', 'ACTIVE', '2021-09-26 16:46:12', 'IRFANDI', NULL, NULL, NULL, NULL),
(12, 3, 'GOPAY', '', 'IMAGE', 'image/payment/gopay.png', 'gopay', 'ACTIVE', '2021-09-26 16:46:27', 'IRFANDI', NULL, NULL, NULL, NULL),
(13, 3, 'DANA', '', 'IMAGE', 'image/payment/dana.png', 'dana', 'ACTIVE', '2021-09-26 16:46:47', 'IRFANDI', NULL, NULL, NULL, NULL),
(14, 3, 'LINK AJA', '', 'IMAGE', 'image/payment/linkaja.png', 'linkaja', 'ACTIVE', '2021-09-26 16:47:01', 'IRFANDI', NULL, NULL, NULL, NULL),
(15, 3, 'SHOPEEPAY', '', 'IMAGE', 'image/payment/shopeepay.jpg', 'shopeepay', 'ACTIVE', '2021-09-26 16:47:18', 'IRFANDI', NULL, NULL, NULL, NULL),
(16, 4, 'MOBILE LEGENDS', '', 'IMAGE', 'image/payment/mobilelegends.png', 'mobile-legends', 'ACTIVE', '2021-09-26 16:47:48', 'IRFANDI', NULL, NULL, NULL, NULL),
(17, 4, 'PUBG', '', 'IMAGE', 'image/payment/pubg.png', 'pubg', 'ACTIVE', '2021-09-26 16:48:01', 'IRFANDI', NULL, NULL, NULL, NULL),
(18, 4, 'FREE FIRE', '', 'IMAGE', 'image/payment/freefire.jpg', 'free-fire', 'ACTIVE', '2021-09-26 16:48:18', 'IRFANDI', NULL, NULL, NULL, NULL),
(19, 4, 'CALL OF DUTY', '', 'IMAGE', 'image/payment/cod.jpg', 'call-of-duty', 'ACTIVE', '2021-09-26 16:48:35', 'IRFANDI', NULL, NULL, NULL, NULL),
(20, 4, 'VALORANT', '', 'IMAGE', 'image/payment/valorant.png', 'valorant', 'ACTIVE', '2021-09-26 16:48:48', 'IRFANDI', NULL, NULL, NULL, NULL),
(21, 4, 'ARENA OF VALOR', '', 'IMAGE', 'image/payment/aov.jpg', 'arena-of-valor', 'ACTIVE', '2021-09-26 16:49:04', 'IRFANDI', NULL, NULL, NULL, NULL),
(22, 4, 'HIGGS DOMINO', '', 'IMAGE', 'image/payment/domino.png', 'higgs-domino', 'ACTIVE', '2021-09-26 16:49:23', 'IRFANDI', NULL, NULL, NULL, NULL),
(23, 4, 'SAUSAGE MAN', '', 'IMAGE', 'image/payment/sausageman.png', 'sausage-man', 'ACTIVE', '2021-09-26 16:49:39', 'IRFANDI', NULL, NULL, NULL, NULL),
(24, 4, 'GENSHIN IMPACT', '', 'IMAGE', 'image/payment/gensin.png', 'genshin-impact', 'ACTIVE', '2021-09-26 16:49:55', 'IRFANDI', NULL, NULL, NULL, NULL),
(25, 4, 'DRAGON RAJA', '', 'IMAGE', 'image/payment/dragonraja.jpg', 'dragon-raja', 'ACTIVE', '2021-09-26 16:50:09', 'IRFANDI', NULL, NULL, NULL, NULL),
(26, 4, 'RAGNAROK M', '', 'IMAGE', 'image/payment/ragnarok.png', 'ragnarok-m', 'ACTIVE', '2021-09-26 16:50:27', 'IRFANDI', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `MS_USERS`
--

CREATE TABLE `MS_USERS` (
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(250) NOT NULL,
  `NAME` varchar(250) NOT NULL,
  `NOHP` varchar(25) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `STATUS` enum('0','1','2','3') DEFAULT '1' COMMENT '0=NON AKTIF, 1=AKTIF, 2=DELETE, 3=BLOKIR SALAH PASSWORD',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `MS_USERS`
--

INSERT INTO `MS_USERS` (`USERNAME`, `PASSWORD`, `NAME`, `NOHP`, `EMAIL`, `STATUS`, `CREATED_DATE`, `CREATED_BY`, `UPDATED_DATE`, `UPDATED_BY`, `DELETED_DATE`, `DELETED_BY`) VALUES
('IRFANDI', '9b3d3dff45770bf3ccc155732e576d73', 'IRFANDI RICON', '0895320294566', 'irfandi.ricon@gmail.com', '1', '2021-09-18 05:46:12', 'irfandi', '2021-09-18 05:46:47', 'irfandi', NULL, NULL),
('VIRA', '9b3d3dff45770bf3ccc155732e576d73', 'VIRA ARVIANTI', '098239084923', 'vira@gmail.com', '2', '2021-09-18 05:47:53', 'irfandi', NULL, NULL, '2021-09-19 08:32:15', 'IRFANDI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `TRANSAKSI`
--

CREATE TABLE `TRANSAKSI` (
  `ID` int(11) NOT NULL,
  `ID_REFFERENCE` varchar(10) DEFAULT NULL,
  `ID_TRANSAKSI` varchar(11) DEFAULT NULL,
  `KODE_PRODUK` varchar(50) DEFAULT NULL,
  `NO_PELANGGAN` varchar(100) NOT NULL,
  `JUMLAH_BAYAR` decimal(18,2) DEFAULT 0.00,
  `STATUS_TRANSAKSI` varchar(1) DEFAULT '0',
  `PESAN` varchar(250) NOT NULL,
  `SN` varchar(100) NOT NULL,
  `BALANCE` decimal(18,2) NOT NULL DEFAULT 0.00,
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `TRANSAKSI`
--

INSERT INTO `TRANSAKSI` (`ID`, `ID_REFFERENCE`, `ID_TRANSAKSI`, `KODE_PRODUK`, `NO_PELANGGAN`, `JUMLAH_BAYAR`, `STATUS_TRANSAKSI`, `PESAN`, `SN`, `BALANCE`, `CREATED_DATE`, `CREATED_BY`, `UPDATED_DATE`, `UPDATED_BY`) VALUES
(1, '068B533ECD', '89559', 'hindosat5000', '08576456238982', 5990.00, '1', 'SUCCESS', '123456789', 99212040.00, '2021-10-10 06:33:08', 'SYSTEM', '2021-10-10 06:35:11', 'SYSTEM'),
(2, 'BF71734503', '89560', 'haxis10000', '0831823294561', 10800.00, '1', 'SUCCESS', '123456789', 99212040.00, '2021-10-10 06:33:21', 'SYSTEM', '2021-10-10 06:35:08', 'SYSTEM'),
(3, '1F49E2F2B6', '89561', 'haxis15000', '0831823294562', 15000.00, '2', 'INCORRECT DESTINATION NUMBER', '', 99212040.00, '2021-10-10 06:33:41', 'SYSTEM', '2021-10-10 06:35:02', 'SYSTEM'),
(4, '5391A99ED6', '89562', 'haxis25000', '0831823294563', 26000.00, '2', 'UNDEFINED ERROR', '', 99212040.00, '2021-10-10 06:33:55', 'SYSTEM', '2021-10-10 06:34:53', 'SYSTEM'),
(5, 'DFB64A5F4B', '89563', 'haxis50000', '0831823294564', 51000.00, '2', 'CUSTOMER NUMBER BLOCKED', '', 99212040.00, '2021-10-10 06:34:10', 'SYSTEM', '2021-10-10 06:34:47', 'SYSTEM'),
(6, '3CD6F696CC', '89564', 'haxis100000', '0831823294565', 100000.00, '1', 'SUCCESS', '123456789', 99212040.00, '2021-10-10 06:34:23', 'SYSTEM', '2021-10-10 06:34:42', 'SYSTEM'),
(7, '819D5467CC', '89570', 'haxis10000', '08311111111111', 10800.00, '1', 'SUCCESS', '123456789', 99201240.00, '2021-10-10 12:35:35', 'SYSTEM', '2021-10-10 12:37:20', 'SYSTEM');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `CONTACT`
--
ALTER TABLE `CONTACT`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `USERNAME_UQ` (`USERNAME`);

--
-- Indeks untuk tabel `LOG_TRANSAKSI`
--
ALTER TABLE `LOG_TRANSAKSI`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `MS_BANNER`
--
ALTER TABLE `MS_BANNER`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `MS_KATEGORI`
--
ALTER TABLE `MS_KATEGORI`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `MS_PRODUK_PULSA`
--
ALTER TABLE `MS_PRODUK_PULSA`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `PRODUK_CODE` (`CODE`),
  ADD KEY `UQ_SUB_KATEGORI_PRODUK` (`ID_PROVIDER`);

--
-- Indeks untuk tabel `MS_PROMO`
--
ALTER TABLE `MS_PROMO`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `MS_PROVIDER`
--
ALTER TABLE `MS_PROVIDER`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `MS_SUB_KATEGORI`
--
ALTER TABLE `MS_SUB_KATEGORI`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UQ_KATEGORI` (`ID_KATEGORI`);

--
-- Indeks untuk tabel `MS_USERS`
--
ALTER TABLE `MS_USERS`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indeks untuk tabel `TRANSAKSI`
--
ALTER TABLE `TRANSAKSI`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `CONTACT`
--
ALTER TABLE `CONTACT`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `LOG_TRANSAKSI`
--
ALTER TABLE `LOG_TRANSAKSI`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `MS_BANNER`
--
ALTER TABLE `MS_BANNER`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `MS_KATEGORI`
--
ALTER TABLE `MS_KATEGORI`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `MS_PRODUK_PULSA`
--
ALTER TABLE `MS_PRODUK_PULSA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `MS_PROMO`
--
ALTER TABLE `MS_PROMO`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `MS_PROVIDER`
--
ALTER TABLE `MS_PROVIDER`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `MS_SUB_KATEGORI`
--
ALTER TABLE `MS_SUB_KATEGORI`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `TRANSAKSI`
--
ALTER TABLE `TRANSAKSI`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `MS_SUB_KATEGORI`
--
ALTER TABLE `MS_SUB_KATEGORI`
  ADD CONSTRAINT `UQ_KATEGORI` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `MS_KATEGORI` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
