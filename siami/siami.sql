-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - Source distribution
-- Server OS:                    Linux
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

-- Dumping data for table siami.biaya: ~3 rows (approximately)
/*!40000 ALTER TABLE `biaya` DISABLE KEYS */;
REPLACE INTO `biaya` (`kode_biaya`, `kode_jns_bayar`, `jml_biaya`, `angkatan`, `tgl_aktif`) VALUES
	('BY001', 'JB001', 2000000, '2011', '0000-00-00'),
	('BY002', 'JB002', 2000000, '2011', '0000-00-00'),
	('BY003', 'JB002', 2250000, '2015', '0000-00-00');
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
	('583e87200a9ffc28c6a9f78344bdfeeb', 'BY002', '5520111008', '140201025', 2000000, '2016-08-08', 'Pembayaran Semester 1', 'awb'),
	('7904d79387d44685e67413a9c9f86c1c', 'BY003', '5520115001', '140201025', -1, '2016-08-09', 'Pembayaran Semester 2', 'awb1123'),
	('81d8d07d58901fd0101641b6333c7630', 'BY003', '5520115001', '140201025', 2250000, '2016-08-09', 'Pembayaran Semester 1', 'awb1111'),
	('897103d1e884257bff412c565ada8a5f', 'BY002', '5520111008', '140201025', 2000000, '2016-08-08', 'Pembayaran Semester 2', 'awb111');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;


-- Dumping structure for view siami.tb_kurikulum
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `tb_kurikulum` (
	`id_kurikulum` INT(10) NOT NULL,
	`nm_kurikulum` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ta` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`kd_prodi` INT(11) NOT NULL,
	`status` ENUM('1','0') NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


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


-- Dumping structure for view siami.v_bayar_smt
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_bayar_smt` (
	`nim` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	`kode_bayar` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`statusbayar` VARCHAR(22) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nama_jns_bayar` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
	`keterangan` TEXT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siami.tb_kurikulum
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `tb_kurikulum`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `tb_kurikulum` AS select `siakad_adhiguna`.`tb_kurikulum`.`id_kurikulum` AS `id_kurikulum`,`siakad_adhiguna`.`tb_kurikulum`.`nm_kurikulum` AS `nm_kurikulum`,`siakad_adhiguna`.`tb_kurikulum`.`ta` AS `ta`,`siakad_adhiguna`.`tb_kurikulum`.`kd_prodi` AS `kd_prodi`,`siakad_adhiguna`.`tb_kurikulum`.`status` AS `status` from `siakad_adhiguna`.`tb_kurikulum` ;


-- Dumping structure for view siami.view_biaya
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_biaya`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_biaya` AS select `siami`.`biaya`.`kode_biaya` AS `kode_biaya`,`siami`.`jenis_bayar`.`nama_jns_bayar` AS `nama_jns_bayar`,date_format(`siami`.`biaya`.`tgl_aktif`,'%d-%m-%Y') AS `tgl_aktif`,`siami`.`biaya`.`angkatan` AS `angkatan`,`siami`.`biaya`.`jml_biaya` AS `jml_biaya`,`siami`.`jenis_bayar`.`status` AS `status` from (`siami`.`biaya` join `siami`.`jenis_bayar` on((`siami`.`biaya`.`kode_jns_bayar` = `siami`.`jenis_bayar`.`kode_jns_bayar`))) ;


-- Dumping structure for view siami.view_lap_biaya
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_lap_biaya`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_lap_biaya` AS select `siami`.`biaya`.`kode_jns_bayar` AS `kode_jns_bayar`,`siami`.`biaya`.`kode_biaya` AS `kode_biaya`,`siami`.`jenis_bayar`.`nama_jns_bayar` AS `nama_jns_bayar`,date_format(`siami`.`biaya`.`tgl_aktif`,'%d-%m-%Y') AS `tgl`,`siami`.`biaya`.`angkatan` AS `angkatan`,`siami`.`biaya`.`jml_biaya` AS `jml_biaya` from (`siami`.`biaya` join `siami`.`jenis_bayar` on((`siami`.`biaya`.`kode_jns_bayar` = `siami`.`jenis_bayar`.`kode_jns_bayar`))) order by `siami`.`jenis_bayar`.`status`,`siami`.`biaya`.`angkatan`,`siami`.`biaya`.`kode_jns_bayar` ;


-- Dumping structure for view siami.view_mahasiswa
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_mahasiswa`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_mahasiswa` AS select `siakad_adhiguna`.`tb_mhs`.`nim` AS `nim`,`siakad_adhiguna`.`tb_mhs`.`nm_mhs` AS `nama`,substr(`siakad_adhiguna`.`tb_mhs`.`smt_masuk`,1,4) AS `angkatan`,`siakad_adhiguna`.`tb_mhs`.`jenkel` AS `jenis_kelamin`,'' AS `email`,`siakad_adhiguna`.`tb_mhs`.`kelurahan` AS `alamat`,'' AS `no_telp`,`siakad_adhiguna`.`tb_mhs`.`tgl_lahir` AS `tgl_lahir` from `siakad_adhiguna`.`tb_mhs` ;


-- Dumping structure for view siami.view_pembayaran
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_pembayaran`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_pembayaran` AS select `siami`.`biaya`.`kode_jns_bayar` AS `kode_jns_bayar`,`siami`.`pembayaran`.`kode_biaya` AS `kode_biaya`,`siami`.`pembayaran`.`kode_bayar` AS `kode_bayar`,`siami`.`pembayaran`.`nim` AS `nim`,`siami`.`pembayaran`.`nik` AS `nik`,`siami`.`pembayaran`.`jumlah_bayar` AS `jumlah_bayar`,`siami`.`pembayaran`.`tgl_byr` AS `tgl_byr`,`siami`.`pembayaran`.`keterangan` AS `keterangan`,`siami`.`pembayaran`.`no_referensi` AS `no_referensi`,`siami`.`biaya`.`jml_biaya` AS `jml_biaya`,`siami`.`biaya`.`angkatan` AS `angkatan`,`siami`.`biaya`.`tgl_aktif` AS `tgl_aktif`,`siami`.`jenis_bayar`.`nama_jns_bayar` AS `nama_jns_bayar`,`siami`.`jenis_bayar`.`status` AS `status`,date_format(`siami`.`pembayaran`.`tgl_byr`,'%d-%m-%Y') AS `tglbyr`,if(((`siami`.`biaya`.`jml_biaya` - `siami`.`pembayaran`.`jumlah_bayar`) > 0),'Belum Lunas (Angsuran)','Lunas') AS `statusbayar` from ((`siami`.`pembayaran` join `siami`.`biaya` on((`siami`.`pembayaran`.`kode_biaya` = `siami`.`biaya`.`kode_biaya`))) join `siami`.`jenis_bayar` on((`siami`.`biaya`.`kode_jns_bayar` = `siami`.`jenis_bayar`.`kode_jns_bayar`))) ;


-- Dumping structure for view siami.v_bayar_smt
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_bayar_smt`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `v_bayar_smt` AS select `view_pembayaran`.`nim` AS `nim`,`view_pembayaran`.`kode_bayar` AS `kode_bayar`,`view_pembayaran`.`statusbayar` AS `statusbayar`,`view_pembayaran`.`nama_jns_bayar` AS `nama_jns_bayar`,`view_pembayaran`.`keterangan` AS `keterangan` from `siami`.`view_pembayaran` where ((`view_pembayaran`.`nama_jns_bayar` = 'Semester') and (`view_pembayaran`.`statusbayar` = 'Lunas')) ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
