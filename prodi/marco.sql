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

-- Dumping database structure for marco
CREATE DATABASE IF NOT EXISTS `marco` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `marco`;


-- Dumping structure for table marco.tb_barang
CREATE TABLE IF NOT EXISTS `tb_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `awb` int(11) NOT NULL DEFAULT '0',
  `id_expedisi` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `jenis` enum('Doc','Paket') NOT NULL,
  `Berat` int(11) NOT NULL,
  `colly` int(11) NOT NULL,
  `tgl_kirim` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deskripsi` text,
  `harga` varchar(50) NOT NULL,
  PRIMARY KEY (`id_barang`),
  UNIQUE KEY `awb` (`awb`),
  KEY `FK_tb_barang_tb_expedisi` (`id_expedisi`),
  KEY `FK_tb_barang_tb_cab` (`tujuan`),
  CONSTRAINT `FK_tb_barang_tb_cab` FOREIGN KEY (`tujuan`) REFERENCES `tb_cab` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_barang_tb_expedisi` FOREIGN KEY (`id_expedisi`) REFERENCES `tb_expedisi` (`id_expedisi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_barang: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_barang` DISABLE KEYS */;
REPLACE INTO `tb_barang` (`id_barang`, `awb`, `id_expedisi`, `nama_barang`, `pengirim`, `tujuan`, `penerima`, `alamat_penerima`, `jenis`, `Berat`, `colly`, `tgl_kirim`, `deskripsi`, `harga`) VALUES
	(2, 12345, 1, 'xckjvh', 'marco', 113, 'dfsv', 'kjsdfv', 'Doc', 15, 1, '2015-10-12 15:15:07', 'dfvbhdf', '10000'),
	(3, 32657, 1, 'Kue', 'Marco', 113, 'Angki', 'Jl. Una-Una Ampana Kota', 'Paket', 5, 0, '2016-03-29 00:29:56', 'Urgent', '25000'),
	(4, 325978, 1, 'Vaksin', 'PT. Enseval Putra Megatrading', 1, 'Ap. Mitra F Poso', 'Jl. Wolter Monginsidi No. 39', 'Paket', 10, 0, '2016-08-01 20:33:48', 'Urgent', 'Undifined Harga');
/*!40000 ALTER TABLE `tb_barang` ENABLE KEYS */;


-- Dumping structure for table marco.tb_cab
CREATE TABLE IF NOT EXISTS `tb_cab` (
  `id_cabang` int(5) NOT NULL,
  `kota` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_cab: ~9 rows (approximately)
/*!40000 ALTER TABLE `tb_cab` DISABLE KEYS */;
REPLACE INTO `tb_cab` (`id_cabang`, `kota`) VALUES
	(1, 'Poso'),
	(111, 'palu'),
	(112, 'poso'),
	(113, 'ampana'),
	(114, 'luwuk'),
	(115, 'tentena'),
	(116, 'toli-toli'),
	(117, 'buol'),
	(118, 'morowali');
/*!40000 ALTER TABLE `tb_cab` ENABLE KEYS */;


-- Dumping structure for table marco.tb_exp
CREATE TABLE IF NOT EXISTS `tb_exp` (
  `id_antar` int(11) NOT NULL AUTO_INCREMENT,
  `asal` int(5) NOT NULL,
  `tujuan` int(5) NOT NULL,
  `kode_expedisi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_antar`),
  KEY `FK_tb_antar_tb_cab` (`asal`),
  KEY `FK_tb_antar_tb_cab_2` (`tujuan`),
  KEY `kode_expedisi` (`kode_expedisi`),
  CONSTRAINT `FK_tb_antar_tb_cab` FOREIGN KEY (`asal`) REFERENCES `tb_cab` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_antar_tb_cab_2` FOREIGN KEY (`tujuan`) REFERENCES `tb_cab` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_exp: ~12 rows (approximately)
/*!40000 ALTER TABLE `tb_exp` DISABLE KEYS */;
REPLACE INTO `tb_exp` (`id_antar`, `asal`, `tujuan`, `kode_expedisi`) VALUES
	(1, 111, 112, 'a111'),
	(2, 111, 113, 'a111'),
	(3, 111, 114, 'a111'),
	(4, 111, 116, 'b111'),
	(5, 111, 117, 'b111'),
	(6, 111, 112, 'c111'),
	(8, 111, 115, 'c111'),
	(9, 111, 118, 'c111'),
	(10, 111, 1, '1'),
	(11, 111, 112, 'c111'),
	(12, 111, 1, 'c111'),
	(13, 111, 1, 'c111');
/*!40000 ALTER TABLE `tb_exp` ENABLE KEYS */;


-- Dumping structure for table marco.tb_expedisi
CREATE TABLE IF NOT EXISTS `tb_expedisi` (
  `id_expedisi` int(11) NOT NULL AUTO_INCREMENT,
  `id_exp` varchar(50) NOT NULL DEFAULT '0',
  `id_mobil` varchar(50) NOT NULL DEFAULT '0',
  `tgl_berangkat` date NOT NULL,
  PRIMARY KEY (`id_expedisi`),
  KEY `FK_tb_expedisi_tb_exp` (`id_exp`),
  KEY `FK_tb_expedisi_tb_mobil` (`id_mobil`),
  CONSTRAINT `FK_tb_expedisi_tb_exp` FOREIGN KEY (`id_exp`) REFERENCES `tb_exp` (`kode_expedisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_expedisi_tb_mobil` FOREIGN KEY (`id_mobil`) REFERENCES `tb_mobil` (`id_nopol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_expedisi: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_expedisi` DISABLE KEYS */;
REPLACE INTO `tb_expedisi` (`id_expedisi`, `id_exp`, `id_mobil`, `tgl_berangkat`) VALUES
	(1, 'a111', 'DN 8847 AQ', '2015-10-12'),
	(2, '1', 'DN 8683 VE', '0000-00-00'),
	(3, 'c111', 'DN 8386 AQ', '0000-00-00'),
	(4, 'c111', 'DN 8683 VE', '0000-00-00');
/*!40000 ALTER TABLE `tb_expedisi` ENABLE KEYS */;


-- Dumping structure for table marco.tb_harga
CREATE TABLE IF NOT EXISTS `tb_harga` (
  `id_harga` int(11) NOT NULL AUTO_INCREMENT,
  `id_tujuan` int(11) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `paket` enum('paket','dokumen','colly') NOT NULL,
  `estimasi` text,
  PRIMARY KEY (`id_harga`),
  KEY `FK_tb_harga_tb_cab` (`id_tujuan`),
  CONSTRAINT `FK_tb_harga_tb_cab` FOREIGN KEY (`id_tujuan`) REFERENCES `tb_cab` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_harga: ~13 rows (approximately)
/*!40000 ALTER TABLE `tb_harga` DISABLE KEYS */;
REPLACE INTO `tb_harga` (`id_harga`, `id_tujuan`, `harga`, `paket`, `estimasi`) VALUES
	(1, 113, '10000', 'dokumen', '3 Hari'),
	(2, 113, '5000', 'paket', NULL),
	(3, 113, '20000', 'colly', NULL),
	(4, 116, '10000', 'dokumen', NULL),
	(5, 116, '5000', 'paket', NULL),
	(6, 116, '20000', 'colly', NULL),
	(7, 114, '10000', 'dokumen', NULL),
	(8, 114, '5000', 'paket', NULL),
	(9, 114, '20000', 'colly', NULL),
	(10, 117, '15000', 'dokumen', NULL),
	(11, 117, '9000', 'paket', NULL),
	(12, 117, '30000', 'colly', NULL),
	(13, 112, '10000', 'dokumen', NULL);
/*!40000 ALTER TABLE `tb_harga` ENABLE KEYS */;


-- Dumping structure for table marco.tb_kariawan
CREATE TABLE IF NOT EXISTS `tb_kariawan` (
  `id_kariawan` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kariawan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_kariawan: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_kariawan` DISABLE KEYS */;
REPLACE INTO `tb_kariawan` (`id_kariawan`, `nama`, `jabatan`) VALUES
	(1, 'Marco Mario Lameanda', 'Admin'),
	(2, 'Marco', 'Admin Keuangan');
/*!40000 ALTER TABLE `tb_kariawan` ENABLE KEYS */;


-- Dumping structure for table marco.tb_mobil
CREATE TABLE IF NOT EXISTS `tb_mobil` (
  `id_nopol` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `jenis` text,
  PRIMARY KEY (`id_nopol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_mobil: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_mobil` DISABLE KEYS */;
REPLACE INTO `tb_mobil` (`id_nopol`, `nama`, `alamat`, `jenis`) VALUES
	('DN 8386 AQ', 'Frangky', 'Jl. Dewi Sartika 3', 'Grand Max Box'),
	('DN 8683 VE', 'Siapa', 'Dimana', 'Truk'),
	('DN 8847 AQ', 'Marco', 'Dimana', 'Truk Box');
/*!40000 ALTER TABLE `tb_mobil` ENABLE KEYS */;


-- Dumping structure for table marco.tb_tracking
CREATE TABLE IF NOT EXISTS `tb_tracking` (
  `id_tracking` int(11) NOT NULL AUTO_INCREMENT,
  `id_exp` int(11) NOT NULL DEFAULT '0',
  `id_barang` int(11) NOT NULL DEFAULT '0',
  `status` enum('Sampai','Transit','Manifested') NOT NULL,
  PRIMARY KEY (`id_tracking`),
  KEY `FK_tb_tracking_tb_barang` (`id_barang`),
  KEY `FK_tb_tracking_tb_exp` (`id_exp`),
  CONSTRAINT `FK_tb_tracking_tb_barang` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`awb`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_tracking_tb_exp` FOREIGN KEY (`id_exp`) REFERENCES `tb_exp` (`id_antar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_tracking: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_tracking` DISABLE KEYS */;
REPLACE INTO `tb_tracking` (`id_tracking`, `id_exp`, `id_barang`, `status`) VALUES
	(2, 1, 12345, 'Transit');
/*!40000 ALTER TABLE `tb_tracking` ENABLE KEYS */;


-- Dumping structure for table marco.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
REPLACE INTO `tb_user` (`id_user`, `username`, `password`) VALUES
	(1, 'admin', '12345');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;


-- Dumping structure for view marco.track_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `track_view` (
	`awb` INT(11) NOT NULL,
	`nama_barang` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`pengirim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`penerima` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`alamat_penerima` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`jenis` ENUM('Doc','Paket') NOT NULL COLLATE 'latin1_swedish_ci',
	`status` ENUM('Sampai','Transit','Manifested') NOT NULL COLLATE 'latin1_swedish_ci',
	`kota` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view marco.view_detail
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_detail` (
	`awb` INT(11) NOT NULL,
	`id_nopol` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_berangkat` DATE NOT NULL,
	`nama_barang` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`pengirim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`penerima` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`alamat_penerima` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`jenis` ENUM('Doc','Paket') NOT NULL COLLATE 'latin1_swedish_ci',
	`Berat` INT(11) NOT NULL,
	`tgl_kirim` DATETIME NOT NULL,
	`deskripsi` TEXT NULL COLLATE 'latin1_swedish_ci',
	`kota` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view marco.view_harga
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_harga` (
	`kota` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`harga` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`paket` ENUM('paket','dokumen','colly') NOT NULL COLLATE 'latin1_swedish_ci',
	`estimasi` TEXT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view marco.track_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `track_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `marco`.`track_view` AS select `m3`.`awb` AS `awb`,`m3`.`nama_barang` AS `nama_barang`,`m3`.`pengirim` AS `pengirim`,`m3`.`penerima` AS `penerima`,`m3`.`alamat_penerima` AS `alamat_penerima`,`m3`.`jenis` AS `jenis`,`m1`.`status` AS `status`,`m4`.`kota` AS `kota` from (((`marco`.`tb_tracking` `m1` join `marco`.`tb_exp` `m2` on((`m1`.`id_exp` = `m2`.`id_antar`))) join `marco`.`tb_barang` `m3` on((`m1`.`id_barang` = `m3`.`awb`))) join `marco`.`tb_cab` `m4` on((`m3`.`tujuan` = `m4`.`id_cabang`)));


-- Dumping structure for view marco.view_detail
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_detail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `marco`.`view_detail` AS select `m1`.`awb` AS `awb`,`m4`.`id_nopol` AS `id_nopol`,`m3`.`tgl_berangkat` AS `tgl_berangkat`,`m1`.`nama_barang` AS `nama_barang`,`m1`.`pengirim` AS `pengirim`,`m1`.`penerima` AS `penerima`,`m1`.`alamat_penerima` AS `alamat_penerima`,`m1`.`jenis` AS `jenis`,`m1`.`Berat` AS `Berat`,`m1`.`tgl_kirim` AS `tgl_kirim`,`m1`.`deskripsi` AS `deskripsi`,`m2`.`kota` AS `kota` from (((`marco`.`tb_barang` `m1` join `marco`.`tb_cab` `m2` on((`m1`.`tujuan` = `m2`.`id_cabang`))) join `marco`.`tb_expedisi` `m3` on((`m1`.`id_expedisi` = `m3`.`id_expedisi`))) join `marco`.`tb_mobil` `m4` on((`m3`.`id_mobil` = `m4`.`id_nopol`)));


-- Dumping structure for view marco.view_harga
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_harga`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `marco`.`view_harga` AS select `m2`.`kota` AS `kota`,`m1`.`harga` AS `harga`,`m1`.`paket` AS `paket`,`m1`.`estimasi` AS `estimasi` from (`marco`.`tb_harga` `m1` join `marco`.`tb_cab` `m2` on((`m1`.`id_tujuan` = `m2`.`id_cabang`)));


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
