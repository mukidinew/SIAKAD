-- --------------------------------------------------------
-- Host:                         10.10.10.4
-- Server version:               5.6.25 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for siami
CREATE DATABASE IF NOT EXISTS `siami` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `siami`;


-- Dumping structure for table siami.administrator
CREATE TABLE IF NOT EXISTS `administrator` (
  `nik` varchar(10) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siami.administrator: ~0 rows (approximately)
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;


-- Dumping structure for table siami.angkatan
CREATE TABLE IF NOT EXISTS `angkatan` (
  `id_angkatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_angkatan` varchar(4) NOT NULL,
  PRIMARY KEY (`id_angkatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siami.angkatan: ~0 rows (approximately)
/*!40000 ALTER TABLE `angkatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `angkatan` ENABLE KEYS */;


-- Dumping structure for table siami.biaya
CREATE TABLE IF NOT EXISTS `biaya` (
  `kode_biaya` varchar(6) NOT NULL,
  `kode_jns_bayar` varchar(5) NOT NULL,
  `jml_biaya` int(11) NOT NULL,
  `angkatan` year(4) DEFAULT NULL,
  `tgl_aktif` date DEFAULT NULL,
  PRIMARY KEY (`kode_biaya`),
  KEY `FK_biaya_jenis_bayar` (`kode_jns_bayar`),
  CONSTRAINT `FK_biaya_jenis_bayar` FOREIGN KEY (`kode_jns_bayar`) REFERENCES `jenis_bayar` (`kode_jns_bayar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siami.biaya: ~8 rows (approximately)
/*!40000 ALTER TABLE `biaya` DISABLE KEYS */;
REPLACE INTO `biaya` (`kode_biaya`, `kode_jns_bayar`, `jml_biaya`, `angkatan`, `tgl_aktif`) VALUES
	('BY001', 'JB001', 2000000, '2011', '0000-00-00'),
	('BY002', 'JB002', 2000000, '2011', '0000-00-00'),
	('BY003', 'JB003', 300000, '0000', '2016-07-30'),
	('BY014', 'JB004', 4250000, '0000', '2016-06-20'),
	('BY015', 'JB011', 3750000, '0000', '2016-06-20'),
	('BY016', 'JB005', 1500000, '0000', '2015-09-01'),
	('BY017', 'JB006', 2500000, '0000', '2015-09-01'),
	('BY018', 'JB003', 400000, '0000', '2015-09-01');
/*!40000 ALTER TABLE `biaya` ENABLE KEYS */;


-- Dumping structure for table siami.jenis_bayar
CREATE TABLE IF NOT EXISTS `jenis_bayar` (
  `kode_jns_bayar` varchar(5) NOT NULL,
  `nama_jns_bayar` varchar(255) NOT NULL,
  `status` enum('A','P') NOT NULL,
  PRIMARY KEY (`kode_jns_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siami.jenis_bayar: ~12 rows (approximately)
/*!40000 ALTER TABLE `jenis_bayar` DISABLE KEYS */;
REPLACE INTO `jenis_bayar` (`kode_jns_bayar`, `nama_jns_bayar`, `status`) VALUES
	('JB001', 'Uang Pembangunan', 'A'),
	('JB002', 'Semester', 'A'),
	('JB003', 'SP 2 SKS', 'P'),
	('JB004', 'KKLP Kota', 'P'),
	('JB005', 'Proposal', 'P'),
	('JB006', 'Skripsi', 'P'),
	('JB007', 'Wisuda', 'P'),
	('JB008', 'Ket Pindah', 'P'),
	('JB009', 'Konversi', 'P'),
	('JB010', 'Cuti', 'P'),
	('JB011', 'KKLP Luar Kota', 'P'),
	('JB012', 'SP 3 SKS', 'P');
/*!40000 ALTER TABLE `jenis_bayar` ENABLE KEYS */;


-- Dumping structure for table siami.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `angkatan` year(4) DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siami.mahasiswa: ~0 rows (approximately)
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;


-- Dumping structure for table siami.pembayaran
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `kode_bayar` varchar(50) NOT NULL,
  `kode_biaya` varchar(6) NOT NULL DEFAULT '0',
  `nim` varchar(10) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `tgl_byr` date NOT NULL,
  `keterangan` text,
  `no_referensi` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siami.pembayaran: ~4 rows (approximately)
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
REPLACE INTO `pembayaran` (`kode_bayar`, `kode_biaya`, `nim`, `nik`, `jumlah_bayar`, `tgl_byr`, `keterangan`, `no_referensi`) VALUES
	('36199911843f487ea0c36b719ea5802e', 'BY002', '5520111189', '140201025', 1800000, '2016-07-29', 'Pembayaran Semester 1', 'b1110'),
	('451b17588473d215ae856b00a47b6566', 'BY002', '5520111189', '140201025', 2000000, '2016-07-29', 'Pembayaran Semester 6', '123123123123'),
	('5c58ce84e9520ff7e56b3a064829a517', 'BY001', '5520111189', '140201025', 1500000, '2016-07-29', '-', '123123123'),
	('cb54842f496f4c28cadbbf3b6f76ee5a', 'BY014', '5520111189', '140201025', 4250000, '2016-07-29', '-', '-');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;


-- Dumping structure for view siami.view_biaya
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_biaya` (
	`kode_biaya` VARCHAR(6) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama_jns_bayar` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_aktif` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`angkatan` YEAR NULL,
	`jml_biaya` INT(11) NOT NULL,
	`status` ENUM('A','P') NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siami.view_lap_biaya
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_lap_biaya` (
	`kode_jns_bayar` VARCHAR(5) NOT NULL COLLATE 'latin1_swedish_ci',
	`kode_biaya` VARCHAR(6) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama_jns_bayar` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`angkatan` YEAR NULL,
	`jml_biaya` INT(11) NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view siami.view_mahasiswa
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_mahasiswa` (
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`angkatan` VARCHAR(4) NOT NULL COLLATE 'latin1_swedish_ci',
	`jenis_kelamin` ENUM('L','P') NOT NULL COLLATE 'latin1_swedish_ci',
	`email` CHAR(0) NOT NULL COLLATE 'utf8mb4_general_ci',
	`alamat` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`no_telp` CHAR(0) NOT NULL COLLATE 'utf8mb4_general_ci',
	`tgl_lahir` DATE NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view siami.view_pembayaran
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_pembayaran` (
	`kode_jns_bayar` VARCHAR(5) NOT NULL COLLATE 'latin1_swedish_ci',
	`kode_biaya` VARCHAR(6) NOT NULL COLLATE 'latin1_swedish_ci',
	`kode_bayar` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nim` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	`nik` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	`jumlah_bayar` INT(11) NOT NULL,
	`tgl_byr` DATE NOT NULL,
	`keterangan` TEXT NULL COLLATE 'latin1_swedish_ci',
	`no_referensi` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`jml_biaya` INT(11) NOT NULL,
	`angkatan` YEAR NULL,
	`tgl_aktif` DATE NULL,
	`nama_jns_bayar` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
	`status` ENUM('A','P') NOT NULL COLLATE 'latin1_swedish_ci',
	`tglbyr` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`statusbayar` VARCHAR(22) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siami.view_biaya
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_biaya`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_biaya` AS select kode_biaya, nama_jns_bayar, date_format(tgl_aktif, '%d-%m-%Y') as tgl_aktif, angkatan, jml_biaya, status from biaya natural join jenis_bayar ;


-- Dumping structure for view siami.view_lap_biaya
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_lap_biaya`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_lap_biaya` AS select kode_jns_bayar, kode_biaya, nama_jns_bayar, date_format(tgl_aktif, '%d-%m-%Y') as tgl, angkatan, jml_biaya from biaya natural join jenis_bayar order by status, angkatan, kode_jns_bayar ;


-- Dumping structure for view siami.view_mahasiswa
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_mahasiswa`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` VIEW `view_mahasiswa` AS SELECT nim, nm_mhs as nama, substr(smt_masuk,1,4) as angkatan, jenkel as jenis_kelamin, '' as email, kelurahan as alamat, '' as no_telp, tgl_lahir FROM siakad_adhiguna.tb_mhs ;


-- Dumping structure for view siami.view_pembayaran
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_pembayaran`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_pembayaran` AS select *, date_format(tgl_byr, "%d-%m-%Y") as tglbyr, if(jml_biaya-jumlah_bayar > 0,"Belum Lunas (Angsuran)", "Lunas") as statusbayar from pembayaran natural join biaya natural join jenis_bayar ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
