-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2021 at 03:36 PM
-- Server version: 10.3.31-MariaDB-cll-lve
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngaq6578_smbkpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `ID_BANK` bigint(20) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `TANGGAL` datetime DEFAULT NULL,
  `JENIS` varchar(100) DEFAULT NULL,
  `NOMINAL` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`ID_BANK`, `ID_USER`, `TANGGAL`, `JENIS`, `NOMINAL`, `KETERANGAN`) VALUES
(10, 1, '2020-06-17 14:45:15', 'Pemasukan', 30000, 'Mutasi Dari Kas');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID_BARANG` int(11) NOT NULL,
  `KODE_BARANG` varchar(20) DEFAULT NULL,
  `BARCODE` varchar(20) DEFAULT NULL,
  `NAMA_BARANG` varchar(50) DEFAULT NULL,
  `ID_KATEGORI` int(11) DEFAULT NULL,
  `ID_SATUAN` int(11) DEFAULT NULL,
  `ID_SUPPLIER` int(11) DEFAULT NULL,
  `STOK_MINIMAL` int(11) DEFAULT NULL,
  `HARGA_BELI` varchar(30) DEFAULT NULL,
  `HARGA_JUAL` varchar(30) DEFAULT NULL,
  `STOK` int(11) DEFAULT NULL,
  `IS_ACTIVE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `KODE_BARANG`, `BARCODE`, `NAMA_BARANG`, `ID_KATEGORI`, `ID_SATUAN`, `ID_SUPPLIER`, `STOK_MINIMAL`, `HARGA_BELI`, `HARGA_JUAL`, `STOK`, `IS_ACTIVE`) VALUES
(7, 'BRG-00001', '-', 'Delmonte Ketchup Saus Tomat 5,7 Kg', 4, 1, 3, 0, '71500', '80000', 14, 1),
(8, 'BRG-00002', '8997011700062 ', 'Bihun Jagung Padamu 175 gram ', 4, 5, 5, 0, '3100', '4000', 20, 1),
(9, 'BRG-00003', '8998888710536', 'Delmonte Ekstra Pedas 5,5 Kg', 4, 1, 4, 0, '91500', '103000', 20, 1),
(10, 'BRG-00004', '-', 'Telur 1 Kg', 4, 4, 4, 0, '16800', '18000', 20, 1),
(11, 'BRG-00005', '-', 'Tepung Kentang 1 Kg', 4, 4, 3, 0, '73000', '82000', 20, 1),
(12, 'BRG-00006', '711844110519', 'ABC Kecap Manis 6 Kg', 4, 1, 5, 0, '107500', '120000', 20, 1),
(13, 'BRG-00007', '8850213602001', 'Finna King Lobster 200 ml', 4, 1, 5, 0, '11700', '13000', 20, 1),
(14, 'BRG-00008', '8992770096142', 'Saori Saus Tiram 1000 ml', 4, 1, 5, 0, '39000', '42500', 20, 1),
(15, 'BRG-00009', '8993296101112', 'Tepung Cakra Kembar Premium 1Kg', 4, 1, 5, 0, '10000', '10500', 20, 1),
(16, 'BRG-00010', '3178990433195', 'Maizena Royal Holland 160 gram', 4, 1, 4, 0, '2250', '3000', 20, 1),
(17, 'BRG-00011', '711844120617', 'ABC Sambal Asli 5,7 Kg', 4, 1, 3, 0, '115500', '129000', 20, 1),
(18, 'BRG-00012', '089686400526', 'Indofood SamBal Pedas Manis 135 ml', 4, 1, 5, 0, '11700', '13000', 20, 1),
(23, 'BRG-00013', '711844154506', 'Sirup ABC Coco Pandan 485 ml', 1, 6, 4, 0, '18000', '20000', 20, 1),
(24, 'BRG-00014', '-', 'Abon Sapi Super 1 Kg', 3, 4, 5, 0, '110000', '140000', 13, 1),
(29, 'BRG-00015', '8992717900310', 'Kara Santan Bubuk 20 gram', 4, 1, 4, 0, '1300', '1500', 20, 1),
(30, 'BRG-00016', '8992696426528', 'Susu Nestle Carnation 495 gram', 1, 5, 5, 0, '10800', '12500', 20, 1),
(31, 'BRG-00016', '711844110113', 'ABC Kecap Manis 135 ml', 4, 1, 4, 0, '5800', '6500', 20, 1),
(32, 'BRG-00017', '711844110762', 'ABC Kecap Ekstra Pedas 135 ml', 4, 1, 3, 0, '7300', '8000', 20, 1),
(33, 'BRG-00018', '711844115057', 'ABC Kecap Asin 133 ml', 4, 1, 3, 0, '3300', '4000', 20, 1),
(34, 'BRG-00019', '711844120082', 'ABC SamBal Exstra Pedas 135 ml', 4, 1, 3, 0, '5850', '6500', 20, 1),
(35, 'BRG-00020', '711844120037', 'ABC SamBal Asli 135 ml', 4, 1, 3, 0, '5850', '6500', 20, 1),
(36, 'BRG-00021', '711844130111', 'ABC Saus Tomat 135 ml', 4, 1, 3, 0, '4950', '5500', 20, 1),
(37, 'BRG-00022', '711844120105', 'ABC SamBal Manis Pedas 135 ml', 4, 1, 3, 0, '4950', '5500', 20, 1),
(38, 'BRG-00023', '8995102707112', 'MamaSuka Hot Lava 135 ml', 4, 1, 3, 0, '6750', '7500', 20, 1),
(39, 'BRG-00024', '8995102707129', 'MamaSuka Hot lava 260 ml', 4, 1, 3, 0, '11700', '13000', 20, 1),
(40, 'BRG-00025', '711844110052', 'ABC Kecap Manis 620 ml', 4, 1, 3, 0, '24300', '27000', 20, 1),
(41, 'BRG-00026', '711844115033', 'ABC Kecap Asin 620 ml', 4, 1, 3, 0, '10800', '12000', 20, 1),
(42, 'BRG-00027', '8997024460373', 'Mc Lewis Sweet Mayonnaise 1Kg', 4, 1, 3, 0, '26100', '29000', 20, 1),
(53, 'BRG-00038', '089686405163', 'Indofood Fried Chicken Saset', 4, 1, 3, 0, '4350', '4500', 20, 1),
(57, 'BRG-00042', '8997024460021', 'Mc Lewis Chili Saus Saset 225 gram', 4, 1, 4, 0, '4950', '5500', 20, 1),
(58, 'BRG-00043', '8997024460595', 'Mc Lewis Tomat Saus 500 gram', 4, 1, 4, 0, '5850', '6500', 20, 1),
(59, 'BRG-00044', '8997024460588', 'Mc Lewis Chili Saus 500 gram', 4, 1, 4, 0, '6300', '7000', 20, 1),
(64, 'BRG-00049', '711844130050', 'ABC Saus Tomat 1Kg', 4, 1, 4, 0, '14400', '16000', 20, 1),
(65, 'BRG-00050', '711844120358', 'ABC SamBal Asli 1Kg', 4, 1, 4, 0, '18900', '21000', 20, 1),
(66, 'BRG-00051', '8997005571531', 'Mazzoni Saus Teriyaki 250 gram ', 4, 1, 4, 0, '9000', '10000', 20, 1),
(67, 'BRG-00052', '8997005571517', 'Mazzoni Saus Lada Hitam 250 gram', 4, 1, 4, 0, '9000', '10000', 20, 1),
(68, 'BRG-00053', '8888900700037', 'Lafonte Saus Bolognese 290 gram', 4, 1, 5, 0, '16200', '18000', 20, 1),
(69, 'BRG-00054', '8888900700006', 'Lafonte Saus Bolognese 315 gram', 4, 1, 5, 0, '16650', '18500', 20, 1),
(70, 'BRG-00055', '8888900700020', 'Lafonte Saus Hotuna 270 gram', 4, 1, 5, 0, '18900', '21000', 20, 1),
(71, 'BRG-00056', '8992628010139', 'Minyak Goreng Bimoli 5 Liter', 4, 1, 5, 0, '64000', '65000', 20, 1),
(72, 'BRG-00057', '8992826111065', 'Minyak Goreng Filma 5 Liter', 4, 1, 5, 0, '63000', '64000', 20, 1),
(73, 'BRG-00058', '8997002290633', 'Minyak Goreng Lavenia 5 Liter', 4, 1, 5, 0, '49500', '51000', 20, 1),
(74, 'BRG-00059', '8997002290671', 'Minyak Goreng Lavenia 600 ml Btl', 4, 1, 5, 0, '8000', '9000', 20, 1),
(75, 'BRG-00060', '8997002290749', 'Minyak Goreng Lasani 800 ml', 4, 1, 5, 0, '8584', '9500', 20, 1),
(76, 'BRG-00061', '8997002290312', 'Minyak Goreng Lavenia 900 ml', 4, 1, 5, 0, '9000', '10000', 20, 1),
(77, 'BRG-00062', '8993496106504', 'Minyak Goreng Fortune 1 Liter', 4, 1, 5, 0, '10000', '11000', 20, 1),
(78, 'BRG-00063', '8992753720507', 'Susu Frisisan Flag Coco Pandan 370 gram', 1, 1, 5, 0, '11500', '12500', 20, 1),
(79, 'BRG-00064', '8992702000018', 'Susu Indomilk Putih 370 gram', 1, 1, 5, 0, '8700', '9500', 20, 1),
(80, 'BRG-00065', '8992702000063', 'Susu Indomilk Coklat 370 gram', 1, 1, 5, 0, '8300', '9000', 20, 1),
(81, 'BRG-00066', '8993007002936', 'Susu Indofood Kremer 500 gram', 1, 1, 5, 0, '9000', '10000', 20, 1),
(82, 'BRG-00067', '8994094000027', 'Susu Dairy Champ 500 gram', 1, 1, 5, 0, '9300', '10500', 20, 1),
(83, 'BRG-00068', '8993007002967', 'Susu Indofood Tiga Sapi 500 gram', 1, 1, 5, 0, '9300', '10500', 20, 1),
(84, 'BRG-00069', '8993007000086', 'UHT Susu Indomilk Coklat 1000 ml', 1, 1, 5, 0, '14500', '16000', 20, 1),
(85, 'BRG-00070', '8993007000680', 'UHT Susu Indomilk Cream 1000 ml', 1, 1, 5, 0, '15000', '16500', 20, 1),
(86, 'BRG-00071', '8999898962533', 'UHT Susu Diamond Milk Cream', 1, 1, 5, 0, '13000', '15000', 20, 1),
(90, 'BRG-00075', '089686017755', 'Sarimi 2  Soto Koya Jeruk Nipis', 3, 1, 3, 0, '3800', '4500', 20, 1),
(92, 'BRG-00077', '089686010947', 'Indomie Mie Goreng', 3, 1, 3, 0, '2300', '3000', 20, 1),
(93, 'BRG-00078', '089686043433', 'Indomie Mie Goreng Ayam Geprek', 3, 1, 33, 0, '2300', '3000', 20, 1),
(146, 'BRG-00080', '1578009093', 'Aqua 250ml', 1, 6, 33, 0, '1500', '2500', 20, 1),
(340, 'BRG-00081', '-', 'OPP 13x27 10 Pax', 7, 7, 3, 0, '67500', '70500', 20, 1),
(341, 'BRG-00082', '-', 'OPP Tanpa Lem 10x10 1 Pax', 7, 7, 3, 0, '4500', '6000', 20, 1),
(342, 'BRG-00083', '-', 'Mika KD 1 ', 7, 1, 3, 0, '250', '300', 20, 1),
(343, 'BRG-00084', '-', 'Ornamen Payung 1pcs', 8, 1, 4, 0, '820', '1000', 20, 1),
(344, 'BRG-00085', '-', 'Alas Tar Bulat 20/10pcs', 9, 15, 33, 0, '18500', '20000', 20, 1),
(357, 'BRG-00086', '-', 'Kresek Plastik', 7, 1, 3, 0, '200', '1000', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang_operasional`
--

CREATE TABLE `barang_operasional` (
  `id_brg_operasional` bigint(20) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `ID_BULAN` int(11) NOT NULL,
  `BULAN` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`ID_BULAN`, `BULAN`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID_CS` int(11) NOT NULL,
  `KODE_CS` varchar(20) DEFAULT NULL,
  `NAMA_CS` varchar(100) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(20) DEFAULT NULL,
  `TELP` varchar(15) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(200) DEFAULT NULL,
  `JENIS_CS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID_CS`, `KODE_CS`, `NAMA_CS`, `JENIS_KELAMIN`, `TELP`, `EMAIL`, `ALAMAT`, `JENIS_CS`) VALUES
(1, 'CS-000001', 'Umum', 'Umum', 'Umum', 'Umum', 'Umum', 'Umum'),
(2, 'CS-000002', 'Bambang', 'Laki-Laki', '08109257094', 'bambang@gmail.com', 'Bangorejo', 'Toko'),
(6, 'CS-000002', 'Untung', 'Laki-Laki', '087367123654', 'untung12@gmail.com', 'Banyuwangi', 'Toko'),
(7, 'CS-000003', 'Bu Susiati', 'Perempuan', '082781673645', 'susiati@gmail.com', 'Rogojampi', 'Toko');

-- --------------------------------------------------------

--
-- Table structure for table `detil_hutang`
--

CREATE TABLE `detil_hutang` (
  `ID_DETIL_HUTANG` bigint(20) NOT NULL,
  `TGL_BAYAR` datetime DEFAULT NULL,
  `NOMINAL` int(11) DEFAULT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `ID_HUTANG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_pembelian`
--

CREATE TABLE `detil_pembelian` (
  `ID_DETIL_BELI` bigint(20) NOT NULL,
  `ID_BELI` int(11) DEFAULT NULL,
  `ID_BARANG` int(11) DEFAULT NULL,
  `KODE_DETIL_BELI` varchar(20) DEFAULT NULL,
  `HRG_BELI` int(11) DEFAULT NULL,
  `HRG_JUAL` int(11) DEFAULT NULL,
  `QTY_BELI` int(11) DEFAULT NULL,
  `SUBTOTAL` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_pembelian`
--

INSERT INTO `detil_pembelian` (`ID_DETIL_BELI`, `ID_BELI`, `ID_BARANG`, `KODE_DETIL_BELI`, `HRG_BELI`, `HRG_JUAL`, `QTY_BELI`, `SUBTOTAL`) VALUES
(14, 29, 14, 'DB-0000005', 39000, 42500, 4, '156000'),
(15, 29, 80, 'DB-0000006', 8300, 9000, 5, '41500'),
(19, 31, 343, 'DB-0000010', 820, 1000, 30, '24600'),
(20, 31, 66, 'DB-0000011', 9000, 10000, 12, '108000');

-- --------------------------------------------------------

--
-- Table structure for table `detil_penjualan`
--

CREATE TABLE `detil_penjualan` (
  `ID_DETIL_JUAL` bigint(20) NOT NULL,
  `ID_JUAL` int(11) DEFAULT NULL,
  `ID_BARANG` int(11) DEFAULT NULL,
  `KODE_DETIL_JUAL` varchar(20) DEFAULT NULL,
  `DISKON` int(11) DEFAULT NULL,
  `HARGA_ITEM` int(11) DEFAULT NULL,
  `QTY_JUAL` int(11) DEFAULT NULL,
  `SUBTOTAL` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_penjualan`
--

INSERT INTO `detil_penjualan` (`ID_DETIL_JUAL`, `ID_JUAL`, `ID_BARANG`, `KODE_DETIL_JUAL`, `DISKON`, `HARGA_ITEM`, `QTY_JUAL`, `SUBTOTAL`) VALUES
(19, 87, 70, 'DJ-0000001', 0, 21000, 2, '42000'),
(20, 87, 10, 'DJ-0000002', 0, 18000, 1, '18000'),
(21, 87, 357, 'DJ-0000003', 0, 1000, 5, '5000'),
(22, 88, 11, 'DJ-0000004', 0, 82000, 2, '164000'),
(23, 89, 83, 'DJ-0000005', 0, 10500, 2, '21000'),
(24, 89, 8, 'DJ-0000006', 0, 4000, 4, '16000'),
(25, 89, 86, 'DJ-0000007', 0, 15000, 1, '15000'),
(26, 90, 81, 'DJ-0000008', 0, 10000, 1, '10000'),
(27, 90, 341, 'DJ-0000009', 0, 6000, 2, '12000'),
(28, 90, 75, 'DJ-0000010', 0, 9500, 1, '9500'),
(29, 91, 24, 'DJ-0000011', 0, 140000, 1, '140000'),
(30, 92, 7, 'DJ-0000012', 0, 75000, 2, '150000'),
(31, 93, 24, 'DJ-0000013', 0, 130000, 2, '260000'),
(34, 94, 7, 'DJ-0000016', 0, 80000, 1, '80000'),
(35, 95, 24, 'DJ-0000017', 0, 140000, 2, '280000'),
(36, 95, 24, 'DJ-0000018', 0, 140000, 3, '420000'),
(40, 96, 7, 'DJ-0000019', 0, 80000, 1, '80000'),
(41, 97, 7, 'DJ-0000020', 0, 80000, 1, '80000'),
(42, 98, 7, 'DJ-0000021', 0, 80000, 1, '80000');

-- --------------------------------------------------------

--
-- Table structure for table `detil_piutang`
--

CREATE TABLE `detil_piutang` (
  `ID_DETIL_PIUTANG` bigint(20) NOT NULL,
  `TGL_BAYAR` datetime DEFAULT NULL,
  `NOMINAL` int(11) DEFAULT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `ID_PIUTANG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `ID_HUTANG` bigint(20) NOT NULL,
  `ID_BELI` int(11) DEFAULT NULL,
  `TGL_HUTANG` datetime DEFAULT NULL,
  `JML_HUTANG` int(11) DEFAULT NULL,
  `BAYAR` int(11) DEFAULT NULL,
  `SISA` int(11) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `ID_KARYAWAN` int(11) NOT NULL,
  `KODE_KARYAWAN` varchar(20) DEFAULT NULL,
  `NAMA_KARYAWAN` varchar(100) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(20) DEFAULT NULL,
  `TELP_KARYAWAN` varchar(15) DEFAULT NULL,
  `EMAIL_KARYAWAN` varchar(50) DEFAULT NULL,
  `STATUS_KARYAWAN` varchar(20) DEFAULT NULL,
  `TMPT_LAHIR` varchar(50) DEFAULT NULL,
  `TGL_LAHIR` varchar(20) DEFAULT NULL,
  `TGL_MASUK` varchar(20) DEFAULT NULL,
  `ALAMAT` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`ID_KARYAWAN`, `KODE_KARYAWAN`, `NAMA_KARYAWAN`, `JENIS_KELAMIN`, `TELP_KARYAWAN`, `EMAIL_KARYAWAN`, `STATUS_KARYAWAN`, `TMPT_LAHIR`, `TGL_LAHIR`, `TGL_MASUK`, `ALAMAT`) VALUES
(3, 'K-00002', 'Ciko Ciki Tita', 'Laki-Laki', '082236578566', 'cikocik@gmail.com', 'Tetap', 'Banyuwangi', '04 Oktober 1998', '11/10/2019', 'Songgon'),
(16, 'K-00003', 'Dafid Prasetyo', 'Laki-Laki', '081092570948', 'dafidprasetyo@gmail.com', 'Tetap', 'Banyuwangi', '03 Maret 1998', '18/01/2020', 'Banyuwangi');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `ID_KAS` bigint(20) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `KODE_KAS` varchar(20) DEFAULT NULL,
  `TANGGAL` datetime DEFAULT NULL,
  `JENIS` varchar(20) DEFAULT NULL,
  `NOMINAL` varchar(50) DEFAULT NULL,
  `KETERANGAN` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`ID_KAS`, `ID_USER`, `KODE_KAS`, `TANGGAL`, `JENIS`, `NOMINAL`, `KETERANGAN`) VALUES
(24, 1, 'KS-0000001', '2020-06-17 19:35:58', 'Pemasukan', '65000', 'Penjualan'),
(25, 1, 'KS-0000002', '2020-06-17 19:36:36', 'Pemasukan', '180400', 'Penjualan'),
(26, 1, 'KS-0000003', '2020-06-17 19:37:05', 'Pemasukan', '52000', 'Penjualan'),
(27, 1, 'KS-0000004', '2020-06-17 19:38:05', 'Pemasukan', '31500', 'Penjualan'),
(29, 1, 'KS-0000006', '2020-06-17 14:40:32', 'Pengeluaran', '197500', 'Pembelian'),
(31, 1, 'KS-0000008', '2020-06-17 14:41:39', 'Pengeluaran', '132600', 'Pembelian'),
(32, 1, 'KS-0000009', '2020-06-17 19:44:36', 'Pemasukan', '140000', 'Penjualan'),
(33, 1, 'KS-0000010', '2020-06-17 14:45:15', 'Mutasi Ke Bank', '30000', 'Mutasi Ke Kas Saya'),
(34, 1, 'KS-0000011', '2021-10-06 20:11:31', 'Pemasukan', '0', 'Penjualan'),
(35, 1, 'KS-0000012', '2021-10-06 20:13:13', 'Pemasukan', '260000', 'Penjualan'),
(36, 1, 'KS-0000013', '2021-10-08 20:18:21', 'Pemasukan', '70000', 'Penjualan'),
(37, 1, 'KS-0000014', '2021-10-08 20:19:14', 'Pemasukan', '700000', 'Penjualan'),
(38, 3, 'KS-0000015', '2021-10-15 06:38:39', 'Pemasukan', '0', 'Penjualan'),
(39, 1, 'KS-0000016', '2021-10-15 07:13:13', 'Pemasukan', '0', 'Penjualan'),
(40, 1, 'KS-0000017', '2021-10-15 07:13:34', 'Pemasukan', '80000', 'Penjualan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID_KATEGORI` int(11) NOT NULL,
  `KATEGORI` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `KATEGORI`) VALUES
(1, 'Minuman'),
(3, 'Makanan'),
(4, 'Bahan Produksi'),
(7, 'Plastik'),
(8, 'Mainan'),
(9, 'Perabot');

-- --------------------------------------------------------

--
-- Table structure for table `pajak_ppn`
--

CREATE TABLE `pajak_ppn` (
  `ID_PAJAK` bigint(20) NOT NULL,
  `KODE_PAJAK` varchar(20) DEFAULT NULL,
  `JENIS` varchar(70) DEFAULT NULL,
  `NOMINAL` int(11) DEFAULT NULL,
  `TANGGAL` datetime DEFAULT NULL,
  `KETERANGAN` text DEFAULT NULL,
  `ID_USER` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pajak_ppn`
--

INSERT INTO `pajak_ppn` (`ID_PAJAK`, `KODE_PAJAK`, `JENIS`, `NOMINAL`, `TANGGAL`, `KETERANGAN`, `ID_USER`) VALUES
(8, 'PPN-0000001', 'PPN Keluaran', 0, '2020-06-17 19:35:58', 'Penjualan', 1),
(9, 'PPN-0000002', 'PPN Keluaran', 16400, '2020-06-17 19:36:37', 'Penjualan', 1),
(10, 'PPN-0000003', 'PPN Keluaran', 0, '2020-06-17 19:37:05', 'Penjualan', 1),
(11, 'PPN-0000004', 'PPN Keluaran', 0, '2020-06-17 19:38:05', 'Penjualan', 1),
(12, 'PPN-0000005', 'PPN Keluaran', 0, '2020-06-17 19:44:36', 'Penjualan', 1),
(13, 'PPN-0000006', 'PPN Keluaran', 0, '2021-10-06 20:11:31', 'Penjualan', 1),
(14, 'PPN-0000007', 'PPN Keluaran', 0, '2021-10-06 20:13:13', 'Penjualan', 1),
(15, 'PPN-0000008', 'PPN Keluaran', 1600, '2021-10-08 20:18:21', 'Penjualan', 1),
(16, 'PPN-0000009', 'PPN Keluaran', 0, '2021-10-08 20:19:14', 'Penjualan', 1),
(17, 'PPN-0000010', 'PPN Disetorkan', 18000, '2021-10-09 15:06:16', 'Bayar', 1),
(18, 'PPN-0000011', 'PPN Keluaran', 0, '2021-10-15 06:38:39', 'Penjualan', 3),
(19, 'PPN-0000012', 'PPN Keluaran', 0, '2021-10-15 07:13:13', 'Penjualan', 1),
(20, 'PPN-0000013', 'PPN Keluaran', 0, '2021-10-15 07:13:34', 'Penjualan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `ID_BELI` int(11) NOT NULL,
  `ID_SUPPLIER` int(11) DEFAULT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `KODE_BELI` varchar(20) DEFAULT NULL,
  `TGL_FAKTUR` varchar(20) DEFAULT NULL,
  `FAKTUR_BELI` varchar(20) DEFAULT NULL,
  `DISKON` int(11) DEFAULT NULL,
  `TOTAL` varchar(30) DEFAULT NULL,
  `BAYAR` int(11) DEFAULT NULL,
  `KEMBALI` int(11) DEFAULT NULL,
  `TGL` datetime NOT NULL,
  `IS_ACTIVE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`ID_BELI`, `ID_SUPPLIER`, `ID_USER`, `KODE_BELI`, `TGL_FAKTUR`, `FAKTUR_BELI`, `DISKON`, `TOTAL`, `BAYAR`, `KEMBALI`, `TGL`, `IS_ACTIVE`) VALUES
(29, 33, 1, 'PB-0000002', '2020-06-15', 'F-000002', 0, '197500', 200000, 2500, '2020-06-15 14:40:32', 1),
(31, 5, 1, 'PB-0000004', '2020-06-17', 'F-000004', 0, '132600', 200000, 67400, '2020-06-17 14:41:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `ID_JUAL` int(11) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `ID_CS` int(11) DEFAULT NULL,
  `ID_KARYAWAN` int(11) DEFAULT NULL,
  `KODE_JUAL` varchar(20) DEFAULT NULL,
  `INVOICE` varchar(50) DEFAULT NULL,
  `BAYAR` int(11) DEFAULT NULL,
  `KEMBALI` int(11) DEFAULT NULL,
  `PPN` int(11) DEFAULT NULL,
  `TGL` datetime DEFAULT NULL,
  `ID_BULAN` int(11) DEFAULT NULL,
  `TAHUN` varchar(4) DEFAULT NULL,
  `IS_ACTIVE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`ID_JUAL`, `ID_USER`, `ID_CS`, `ID_KARYAWAN`, `KODE_JUAL`, `INVOICE`, `BAYAR`, `KEMBALI`, `PPN`, `TGL`, `ID_BULAN`, `TAHUN`, `IS_ACTIVE`) VALUES
(87, 1, 2, 0, 'KJ-0000001', 'POS20200617193558', 65000, 0, 0, '2020-06-14 19:35:58', 6, '2020', 1),
(88, 1, 6, 0, 'KJ-0000002', 'POS20200617193636', 200000, 19600, 16400, '2020-06-15 19:36:36', 6, '2020', 1),
(89, 1, 7, 0, 'KJ-0000003', 'POS20200617193704', 52000, 0, 0, '2020-06-16 19:37:04', 6, '2020', 1),
(90, 1, 7, 0, 'KJ-0000004', 'POS20200617193805', 50000, 18500, 0, '2020-06-17 19:38:05', 6, '2020', 1),
(91, 1, 1, 0, 'KJ-0000005', 'POS20200617194436', 200000, 60000, 0, '2020-06-17 19:44:36', 6, '2020', 1),
(92, 1, 1, 0, 'KJ-0000006', 'POS20211006201131', 0, 0, 0, '2021-10-06 20:11:31', 10, '2021', 1),
(93, 1, 1, 0, 'KJ-0000007', 'POS20211006201313', 260000, 0, 0, '2021-10-06 20:13:13', 10, '2021', 1),
(94, 1, 1, 0, 'KJ-0000008', 'POS20211008201821', 70000, 0, 1600, '2021-10-08 20:18:21', 10, '2021', 1),
(95, 1, 1, 0, 'KJ-0000009', 'POS20211008201914', 700000, 0, 0, '2021-10-08 20:19:14', 10, '2021', 1),
(96, 3, 1, 0, 'KJ-0000010', 'POS20211015063839', 0, 0, 0, '2021-10-15 06:38:39', 10, '2021', 1),
(97, 1, 1, 0, 'KJ-0000011', 'POS20211015071313', 0, 0, 0, '2021-10-15 07:13:13', 10, '2021', 1),
(98, 1, 1, 0, 'KJ-0000012', 'POS20211015071334', 80000, 0, 0, '2021-10-15 07:13:34', 10, '2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `ID_PIUTANG` bigint(20) NOT NULL,
  `ID_JUAL` int(11) DEFAULT NULL,
  `TGL_PIUTANG` datetime DEFAULT NULL,
  `JML_PIUTANG` int(11) DEFAULT NULL,
  `BAYAR` int(11) DEFAULT NULL,
  `SISA` int(11) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `piutang`
--

INSERT INTO `piutang` (`ID_PIUTANG`, `ID_JUAL`, `TGL_PIUTANG`, `JML_PIUTANG`, `BAYAR`, `SISA`, `STATUS`) VALUES
(6, 94, '2021-10-08 20:18:21', 10000, 0, 10000, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `profil_perusahaan`
--

CREATE TABLE `profil_perusahaan` (
  `ID_PERUSAHAAN` int(11) NOT NULL,
  `NAMA_PERUSAHAAN` varchar(100) DEFAULT NULL,
  `ALAMAT_PERUSAHAAN` varchar(100) DEFAULT NULL,
  `TELP_PERUSAHAAN` varchar(15) DEFAULT NULL,
  `FAX_PERUSAHAAN` varchar(15) DEFAULT NULL,
  `EMAIL_PERUSAHAAN` varchar(50) DEFAULT NULL,
  `WEBSITE_PERUSAHAAN` varchar(50) DEFAULT NULL,
  `LOGO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_perusahaan`
--

INSERT INTO `profil_perusahaan` (`ID_PERUSAHAAN`, `NAMA_PERUSAHAAN`, `ALAMAT_PERUSAHAAN`, `TELP_PERUSAHAAN`, `FAX_PERUSAHAAN`, `EMAIL_PERUSAHAAN`, `WEBSITE_PERUSAHAAN`, `LOGO`) VALUES
(1, 'Toko Barokah', 'Jln. Piere Tendean, Banyuwangi', '085674893092', '(0333) 094837', 'barokah@gmail.com', 'www.barokah.com', 'cart.png');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `ID_SATUAN` int(11) NOT NULL,
  `SATUAN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`ID_SATUAN`, `SATUAN`) VALUES
(1, 'PCS'),
(4, 'Kg'),
(5, 'Gr'),
(6, 'BTL'),
(7, 'SLP'),
(9, 'Liter'),
(15, 'Pax'),
(18, 'Lusin');

-- --------------------------------------------------------

--
-- Table structure for table `stok_opname`
--

CREATE TABLE `stok_opname` (
  `ID_STOK_OPNAME` bigint(20) NOT NULL,
  `ID_BARANG` int(11) DEFAULT NULL,
  `STOK` varchar(10) DEFAULT NULL,
  `STOK_NYATA` varchar(10) DEFAULT NULL,
  `SELISIH` varchar(10) DEFAULT NULL,
  `NILAI` varchar(50) DEFAULT NULL,
  `KETERANGAN` varchar(250) DEFAULT NULL,
  `TANGGAL` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `ID_SUPPLIER` int(11) NOT NULL,
  `KODE_SUPPLIER` varchar(20) DEFAULT NULL,
  `NAMA_SUPPLIER` varchar(100) DEFAULT NULL,
  `ALAMAT_SUPPLIER` varchar(100) DEFAULT NULL,
  `TELP_SUPPLIER` varchar(15) DEFAULT NULL,
  `FAX_SUPPLIER` varchar(15) DEFAULT NULL,
  `EMAIL_SUPPLIER` char(50) DEFAULT NULL,
  `BANK` varchar(50) DEFAULT NULL,
  `REKENING` varchar(30) DEFAULT NULL,
  `ATAS_NAMA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`ID_SUPPLIER`, `KODE_SUPPLIER`, `NAMA_SUPPLIER`, `ALAMAT_SUPPLIER`, `TELP_SUPPLIER`, `FAX_SUPPLIER`, `EMAIL_SUPPLIER`, `BANK`, `REKENING`, `ATAS_NAMA`) VALUES
(3, 'SP-00001', 'CV. Nusantara Packindo', 'Banyuwangi', '-', '-', 'nusantara@gmail.com', 'BRI', '-', 'Yuda'),
(4, 'SP-00002', 'CV. Indo Visitama', 'Rogojampi', '-', '-', 'visitama@gmail.com', 'BCA', '12092389201', 'Riyan'),
(5, 'SP-00003', 'CV. Karunia Jaya Perkasa', 'Banyuwangi', '-', '-', 'kperkasa@gmail.com', 'BCA', '1209889201', 'Sinta'),
(33, 'SP-00004', 'CV. Jaya Makmur', 'Bangorejo', '082716273821', '-', 'jayamakmur@gmail.com', 'BNI', '8938203842', 'Ridwan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `USERNAME` varchar(30) DEFAULT NULL,
  `NAMA_LENGKAP` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(225) DEFAULT NULL,
  `TIPE` varchar(30) DEFAULT NULL,
  `ALAMAT_USER` varchar(100) DEFAULT NULL,
  `TELP_USER` varchar(15) DEFAULT NULL,
  `EMAIL_USER` varchar(50) DEFAULT NULL,
  `IS_ACTIVE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `USERNAME`, `NAMA_LENGKAP`, `PASSWORD`, `TIPE`, `ALAMAT_USER`, `TELP_USER`, `EMAIL_USER`, `IS_ACTIVE`) VALUES
(1, 'admin', 'Administrator', '$2y$10$oagi0l6Q3v.bwPCCVgOQXOnWX1FPLAvIiIfMJwIrJjk4212ACLN7.', 'Administrator', 'Banyuwagi', '085647382748', 'admin@gmail.com', 1),
(3, 'kasir', 'Kasir', '$2y$10$nWBEdyFeReNQtbr4lGUWmuN9SXKRtpqdog2CtXPFcmqCzb6p5Bmp6', 'Kasir', 'Banyuwangi', '082236578566', 'kasir@gmail.com', 1),
(12, 'aaa', 'aaa', '$2y$10$cojJm7lPQq9SMmBxOFySt.ZwZR2HEwA6jlaJWNE9BI9b.sAjEcip2', 'Kasir', 'aaa', '213213', 'aa@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `ID_LOG` bigint(20) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `WAKTU` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`ID_LOG`, `ID_USER`, `WAKTU`) VALUES
(1, 1, '03/06/2020 11:45:35'),
(2, 1, '14/06/2020 14:41:22'),
(3, 1, '17/06/2020 13:48:42'),
(4, 1, '17/06/2020 18:40:42'),
(5, 1, '06/10/2021 20:09:56'),
(6, 1, '07/10/2021 06:04:56'),
(7, 1, '08/10/2021 20:00:35'),
(8, 1, '08/10/2021 20:03:32'),
(9, 12, '08/10/2021 20:13:19'),
(10, 1, '08/10/2021 20:15:08'),
(11, 3, '08/10/2021 20:41:38'),
(12, 1, '09/10/2021 00:13:26'),
(13, 1, '09/10/2021 00:52:49'),
(14, 1, '09/10/2021 05:33:36'),
(15, 1, '09/10/2021 15:02:26'),
(16, 1, '09/10/2021 21:02:58'),
(17, 1, '10/10/2021 05:17:25'),
(18, 1, '10/10/2021 10:13:28'),
(19, 1, '10/10/2021 13:55:58'),
(20, 1, '10/10/2021 21:25:18'),
(21, 1, '11/10/2021 01:46:26'),
(22, 1, '11/10/2021 04:23:45'),
(23, 1, '11/10/2021 16:39:01'),
(24, 1, '12/10/2021 02:04:56'),
(25, 1, '12/10/2021 11:02:41'),
(26, 1, '13/10/2021 03:26:09'),
(27, 1, '14/10/2021 15:23:45'),
(28, 1, '14/10/2021 15:25:47'),
(29, 1, '14/10/2021 21:24:50'),
(30, 1, '15/10/2021 02:50:19'),
(31, 1, '15/10/2021 03:35:56'),
(32, 3, '15/10/2021 06:38:07'),
(33, 1, '15/10/2021 06:57:08'),
(34, 1, '15/10/2021 07:12:50'),
(35, 1, '15/10/2021 08:32:30'),
(36, 1, '15/10/2021 09:32:23'),
(37, 1, '15/10/2021 10:06:23'),
(38, 1, '15/10/2021 10:07:14'),
(39, 1, '15/10/2021 17:29:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`ID_BANK`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_BARANG`),
  ADD KEY `ID_KATEGORI` (`ID_KATEGORI`),
  ADD KEY `ID_SATUAN` (`ID_SATUAN`),
  ADD KEY `ID_SUPPLIER` (`ID_SUPPLIER`);

--
-- Indexes for table `barang_operasional`
--
ALTER TABLE `barang_operasional`
  ADD PRIMARY KEY (`id_brg_operasional`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`ID_BULAN`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_CS`);

--
-- Indexes for table `detil_hutang`
--
ALTER TABLE `detil_hutang`
  ADD PRIMARY KEY (`ID_DETIL_HUTANG`);

--
-- Indexes for table `detil_pembelian`
--
ALTER TABLE `detil_pembelian`
  ADD PRIMARY KEY (`ID_DETIL_BELI`),
  ADD KEY `FK_BARANG_DETIL_PEMBELIAN` (`ID_BARANG`),
  ADD KEY `FK_PEMBELIAN_DETIL` (`ID_BELI`);

--
-- Indexes for table `detil_penjualan`
--
ALTER TABLE `detil_penjualan`
  ADD PRIMARY KEY (`ID_DETIL_JUAL`),
  ADD KEY `FK_BARANG_PENJUALAN_DETIL` (`ID_BARANG`),
  ADD KEY `FK_PENJUALAN_DETIL` (`ID_JUAL`);

--
-- Indexes for table `detil_piutang`
--
ALTER TABLE `detil_piutang`
  ADD PRIMARY KEY (`ID_DETIL_PIUTANG`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`ID_HUTANG`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`ID_KARYAWAN`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`ID_KAS`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `pajak_ppn`
--
ALTER TABLE `pajak_ppn`
  ADD PRIMARY KEY (`ID_PAJAK`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`ID_BELI`),
  ADD KEY `FK_MENCATAT_PEMBELIAN` (`ID_USER`),
  ADD KEY `FK_TRANSAKSI_PEMBELIAN` (`ID_SUPPLIER`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`ID_JUAL`),
  ADD KEY `FK_MELAYANI` (`ID_USER`),
  ADD KEY `FK_TRANSAKSI` (`ID_CS`),
  ADD KEY `ID_BULAN` (`ID_BULAN`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`ID_PIUTANG`);

--
-- Indexes for table `profil_perusahaan`
--
ALTER TABLE `profil_perusahaan`
  ADD PRIMARY KEY (`ID_PERUSAHAAN`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`ID_SATUAN`);

--
-- Indexes for table `stok_opname`
--
ALTER TABLE `stok_opname`
  ADD PRIMARY KEY (`ID_STOK_OPNAME`),
  ADD KEY `ID_BARANG` (`ID_BARANG`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ID_SUPPLIER`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`ID_LOG`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `ID_BANK` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT for table `barang_operasional`
--
ALTER TABLE `barang_operasional`
  MODIFY `id_brg_operasional` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `ID_BULAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID_CS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `detil_hutang`
--
ALTER TABLE `detil_hutang`
  MODIFY `ID_DETIL_HUTANG` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detil_pembelian`
--
ALTER TABLE `detil_pembelian`
  MODIFY `ID_DETIL_BELI` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `detil_penjualan`
--
ALTER TABLE `detil_penjualan`
  MODIFY `ID_DETIL_JUAL` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `detil_piutang`
--
ALTER TABLE `detil_piutang`
  MODIFY `ID_DETIL_PIUTANG` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `ID_HUTANG` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `ID_KARYAWAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `ID_KAS` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pajak_ppn`
--
ALTER TABLE `pajak_ppn`
  MODIFY `ID_PAJAK` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `ID_BELI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `ID_JUAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `ID_PIUTANG` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profil_perusahaan`
--
ALTER TABLE `profil_perusahaan`
  MODIFY `ID_PERUSAHAAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `ID_SATUAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stok_opname`
--
ALTER TABLE `stok_opname`
  MODIFY `ID_STOK_OPNAME` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `ID_SUPPLIER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `ID_LOG` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `ITEM_SUPPLIER` FOREIGN KEY (`ID_SUPPLIER`) REFERENCES `supplier` (`ID_SUPPLIER`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `KATEGORI_BARANG` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `SATUAN_BARANG` FOREIGN KEY (`ID_SATUAN`) REFERENCES `satuan` (`ID_SATUAN`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `barang_operasional`
--
ALTER TABLE `barang_operasional`
  ADD CONSTRAINT `barang_operasional_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`ID_BARANG`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `detil_pembelian`
--
ALTER TABLE `detil_pembelian`
  ADD CONSTRAINT `FK_BARANG_DETIL_PEMBELIAN` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`),
  ADD CONSTRAINT `FK_PEMBELIAN_DETIL` FOREIGN KEY (`ID_BELI`) REFERENCES `pembelian` (`ID_BELI`);

--
-- Constraints for table `detil_penjualan`
--
ALTER TABLE `detil_penjualan`
  ADD CONSTRAINT `FK_BARANG_PENJUALAN_DETIL` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`),
  ADD CONSTRAINT `FK_PENJUALAN_DETIL` FOREIGN KEY (`ID_JUAL`) REFERENCES `penjualan` (`ID_JUAL`);

--
-- Constraints for table `kas`
--
ALTER TABLE `kas`
  ADD CONSTRAINT `INPUT_KAS` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pajak_ppn`
--
ALTER TABLE `pajak_ppn`
  ADD CONSTRAINT `pajak_ppn_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `FK_MENCATAT_PEMBELIAN` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `FK_TRANSAKSI_PEMBELIAN` FOREIGN KEY (`ID_SUPPLIER`) REFERENCES `supplier` (`ID_SUPPLIER`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `BULAN_PENJUALAN` FOREIGN KEY (`ID_BULAN`) REFERENCES `bulan` (`ID_BULAN`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MELAYANI` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `FK_TRANSAKSI` FOREIGN KEY (`ID_CS`) REFERENCES `customer` (`ID_CS`);

--
-- Constraints for table `stok_opname`
--
ALTER TABLE `stok_opname`
  ADD CONSTRAINT `STOK_OPNAME_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user_log`
--
ALTER TABLE `user_log`
  ADD CONSTRAINT `user_log` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
