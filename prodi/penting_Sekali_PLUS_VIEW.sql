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

-- Dumping database structure for siakad_adhiguna_1
CREATE DATABASE IF NOT EXISTS `siakad_adhiguna_1` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `siakad_adhiguna_1`;


-- Dumping structure for table siakad_adhiguna_1.agama
CREATE TABLE IF NOT EXISTS `agama` (
  `id_agama` int(11) NOT NULL COMMENT 'admin',
  `agama` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='priv. admin';

-- Dumping data for table siakad_adhiguna_1.agama: ~8 rows (approximately)
/*!40000 ALTER TABLE `agama` DISABLE KEYS */;
REPLACE INTO `agama` (`id_agama`, `agama`) VALUES
	(1, 'Islam'),
	(2, 'Kristen'),
	(3, 'Katolik'),
	(4, 'Hindu'),
	(5, 'Budha'),
	(6, 'Konghuchu'),
	(98, 'Unknown'),
	(99, 'Lainnya');
/*!40000 ALTER TABLE `agama` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.login_mhs
CREATE TABLE IF NOT EXISTS `login_mhs` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_mhs` varchar(50) NOT NULL,
  `level` enum('mhs') NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_mhs` (`id_mhs`),
  CONSTRAINT `FK_login_mhs_tb_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `tb_mhs` (`nim`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.login_mhs: ~31 rows (approximately)
/*!40000 ALTER TABLE `login_mhs` DISABLE KEYS */;
REPLACE INTO `login_mhs` (`id_user`, `username`, `password`, `id_mhs`, `level`, `status`) VALUES
	(4, 'reka', 'reka', '5520115001', 'mhs', 'Y'),
	(5, 'fadli', 'fadli', '5520114070', 'mhs', 'Y'),
	(6, 'testing', '5520116001', '5520116001', 'mhs', 'N'),
	(7, 'fadelsuharyanto', '5520115062', '5520115062', 'mhs', 'N'),
	(8, 'moh.riandi', '5520115108', '5520115108', 'mhs', 'N'),
	(9, 'moh.ragil', '5520115129', '5520115129', 'mhs', 'N'),
	(10, 'mohammadridwan', '750307857', '750307857', 'mhs', 'N'),
	(11, 'muh.rahman', '5520115060', '5520115060', 'mhs', 'N'),
	(12, 'mohammadridwan', '5520115117', '5520115117', 'mhs', 'N'),
	(13, 'igedeadiadnyana', '5520115063', '5520115063', 'mhs', 'N'),
	(14, 'eliernawati', '5520115061', '5520115061', 'mhs', 'N'),
	(15, 'muhammadanugrahputra', '5520115072', '5520115072', 'mhs', 'N'),
	(16, 'srihartina', '5520115076', '5520115076', 'mhs', 'N'),
	(17, 'ryanbastian', '5520115078', '5520115078', 'mhs', 'N'),
	(18, 'ihyanfitri', '5720111032', '5720111032', 'mhs', 'N'),
	(19, 'fadilamuil', '5520115073', '5520115073', 'mhs', 'N'),
	(20, 'denisalbertuslameanda', '5520115075', '5520115075', 'mhs', 'N'),
	(21, 'rahmawati', '5720109298', '5720109298', 'mhs', 'N'),
	(22, 'asrulevendy', '750405519', '750405519', 'mhs', 'N'),
	(23, 'ahmadgedeakhwali', '5520115106', '5520115106', 'mhs', 'N'),
	(24, 'gagusyudito', '5520115074', '5520115074', 'mhs', 'N'),
	(25, 'syahrulakbarlapaola', '5520115085', '5520115085', 'mhs', 'N'),
	(26, 'jefritaua', '5520115071', '5520115071', 'mhs', 'N'),
	(27, 'muhammadfebriansyah', '5520115095', '5520115095', 'mhs', 'N'),
	(28, 'henrywillystrizonmakagiantang', '5520115105', '5520115105', 'mhs', 'N'),
	(29, 'gededwikrisnawan', '5520115007', '5520115007', 'mhs', 'N'),
	(30, 'muh.ismail', '5520115005', '5520115005', 'mhs', 'N'),
	(31, 'zulhisyam', '5520112173', '5520112173', 'mhs', 'N'),
	(32, 'afdi', '5520115081', '5520115081', 'mhs', 'N'),
	(33, 'rahmatnur', '5520115009', '5520115009', 'mhs', 'Y'),
	(34, 'tias', 'tias', '5520111008', 'mhs', 'N');
/*!40000 ALTER TABLE `login_mhs` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.login_peg
CREATE TABLE IF NOT EXISTS `login_peg` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('mhs','baak','dsn','prodi') NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.login_peg: ~2 rows (approximately)
/*!40000 ALTER TABLE `login_peg` DISABLE KEYS */;
REPLACE INTO `login_peg` (`uid`, `username`, `password`, `level`) VALUES
	(1, 'baak', 'baak', 'baak'),
	(2, 'prodi_si', 'prodi_si', 'prodi');
/*!40000 ALTER TABLE `login_peg` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_dosen
CREATE TABLE IF NOT EXISTS `tb_dosen` (
  `nidn` int(11) NOT NULL,
  `nm_dosen` text NOT NULL,
  `program_studi` int(11) NOT NULL,
  PRIMARY KEY (`nidn`),
  KEY `FK__tb_prodi` (`program_studi`),
  CONSTRAINT `FK__tb_prodi` FOREIGN KEY (`program_studi`) REFERENCES `tb_prodi` (`id_prodi`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_dosen: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_dosen` DISABLE KEYS */;
REPLACE INTO `tb_dosen` (`nidn`, `nm_dosen`, `program_studi`) VALUES
	(12345, 'iank', 55201);
/*!40000 ALTER TABLE `tb_dosen` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_jenis_keluar
CREATE TABLE IF NOT EXISTS `tb_jenis_keluar` (
  `id_jenis_keluar` int(10) NOT NULL,
  `nm_jenis_keluar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenis_keluar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_jenis_keluar: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_jenis_keluar` DISABLE KEYS */;
REPLACE INTO `tb_jenis_keluar` (`id_jenis_keluar`, `nm_jenis_keluar`) VALUES
	(1, 'Lulus'),
	(2, 'Mutasi');
/*!40000 ALTER TABLE `tb_jenis_keluar` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_kariawan
CREATE TABLE IF NOT EXISTS `tb_kariawan` (
  `nik` varchar(20) NOT NULL DEFAULT '',
  `nama` varchar(50) NOT NULL,
  `jen_kel` enum('L','P') NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` int(11) NOT NULL,
  `jabatan` varchar(250) DEFAULT NULL,
  `alamat` text,
  `no_hp` text,
  `email` text,
  `s1_nm_sklh` varchar(100) DEFAULT NULL,
  `s1_jur` varchar(50) DEFAULT NULL,
  `s1_thn_lulus` varchar(4) DEFAULT NULL,
  `s1_kota` varchar(50) DEFAULT NULL,
  `s2_nm_sklh` text,
  `s2_jur` varchar(50) DEFAULT NULL,
  `s2_thn_lulus` varchar(4) DEFAULT NULL,
  `s2_kota` varchar(50) DEFAULT NULL,
  `s3_nm_sklh` text,
  `s3_jur` varchar(50) DEFAULT NULL,
  `s3_thn_lulus` varchar(4) DEFAULT NULL,
  `s3_kota` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`),
  KEY `FK_tb_kariawan_agama` (`agama`),
  CONSTRAINT `FK_tb_kariawan_agama` FOREIGN KEY (`agama`) REFERENCES `agama` (`id_agama`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_kariawan: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_kariawan` DISABLE KEYS */;
REPLACE INTO `tb_kariawan` (`nik`, `nama`, `jen_kel`, `tmp_lahir`, `tgl_lahir`, `agama`, `jabatan`, `alamat`, `no_hp`, `email`, `s1_nm_sklh`, `s1_jur`, `s1_thn_lulus`, `s1_kota`, `s2_nm_sklh`, `s2_jur`, `s2_thn_lulus`, `s2_kota`, `s3_nm_sklh`, `s3_jur`, `s3_thn_lulus`, `s3_kota`) VALUES
	('140201001', 'Sukardi, S.Kom, M.Kom', 'L', 'Lamongan', '2016-04-20', 1, 'Wakil Ketua 1 Bid. Akademik', 'Jl. Cendrawasih', '08', 'sukarvi@gmail.com', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
	('140201023', 'Mus Aidah, S.Pd, MM', 'P', 'Palu', '2016-04-20', 1, 'Ketua', 'Jl. Slamet Riyadi', '09', 'mus@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tb_kariawan` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_kelas_dosen
CREATE TABLE IF NOT EXISTS `tb_kelas_dosen` (
  `id_kelas_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `id_data_krs` int(11) NOT NULL DEFAULT '0',
  `id_dosen` int(11) NOT NULL DEFAULT '0',
  `r_t_muka` int(11) NOT NULL,
  `t_muka` int(11) NOT NULL,
  PRIMARY KEY (`id_kelas_dosen`),
  KEY `FK__tb_mhs_data_krs` (`id_data_krs`),
  KEY `FK_tb_kelas_dosen_tb_dosen` (`id_dosen`),
  CONSTRAINT `FK__tb_mhs_data_krs` FOREIGN KEY (`id_data_krs`) REFERENCES `tb_mhs_data_krs` (`id_data_krs`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_kelas_dosen_tb_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `tb_dosen` (`nidn`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='get data dari tb_mhs_data_krs berdasarkan kurikulum yang diambil dari field id_kelas kemudian isi tabel ini';

-- Dumping data for table siakad_adhiguna_1.tb_kelas_dosen: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_kelas_dosen` DISABLE KEYS */;
REPLACE INTO `tb_kelas_dosen` (`id_kelas_dosen`, `id_data_krs`, `id_dosen`, `r_t_muka`, `t_muka`) VALUES
	(5, 7, 12345, 16, 16);
/*!40000 ALTER TABLE `tb_kelas_dosen` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_kelas_kul
CREATE TABLE IF NOT EXISTS `tb_kelas_kul` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kelas` varchar(50) NOT NULL DEFAULT '0',
  `id_matkul` varchar(50) NOT NULL DEFAULT '0',
  `id_kurikulum` int(11) NOT NULL DEFAULT '0',
  `id_prodi` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kelas`),
  KEY `FK_tb_kelas_kul_tb_matkul` (`id_matkul`),
  KEY `FK_tb_kelas_kul_tb_kurikulum` (`id_kurikulum`),
  KEY `FK_tb_kelas_kul_tb_prodi` (`id_prodi`),
  CONSTRAINT `FK_tb_kelas_kul_tb_kurikulum` FOREIGN KEY (`id_kurikulum`) REFERENCES `tb_kurikulum` (`id_kurikulum`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_kelas_kul_tb_matkul` FOREIGN KEY (`id_matkul`) REFERENCES `tb_matkul` (`kode_mk`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_kelas_kul_tb_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='get prodi dan get mata kuliah berdasarkan kurikulum sebelum memasukan data, ';

-- Dumping data for table siakad_adhiguna_1.tb_kelas_kul: ~6 rows (approximately)
/*!40000 ALTER TABLE `tb_kelas_kul` DISABLE KEYS */;
REPLACE INTO `tb_kelas_kul` (`id_kelas`, `nm_kelas`, `id_matkul`, `id_kurikulum`, `id_prodi`) VALUES
	(1, '1', 'ST 111 IN2', 2, 55201),
	(3, '2', 'ST 111 IN2', 2, 55201),
	(4, '3', 'ST 111 IN2', 2, 55201),
	(7, '1', 'ST 108 IN3', 2, 55201),
	(8, '2', 'ST 108 IN3', 2, 55201),
	(10, '3', 'ST 108 IN3', 2, 55201);
/*!40000 ALTER TABLE `tb_kelas_kul` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_kurikulum
CREATE TABLE IF NOT EXISTS `tb_kurikulum` (
  `id_kurikulum` int(10) NOT NULL AUTO_INCREMENT,
  `nm_kurikulum` varchar(50) NOT NULL DEFAULT '0',
  `ta` varchar(50) NOT NULL DEFAULT '0',
  `kd_prodi` int(11) NOT NULL DEFAULT '0',
  `status` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kurikulum`),
  KEY `FK_tb_kurikulum_tb_prodi` (`kd_prodi`),
  CONSTRAINT `FK_tb_kurikulum_tb_prodi` FOREIGN KEY (`kd_prodi`) REFERENCES `tb_prodi` (`id_prodi`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_kurikulum: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_kurikulum` DISABLE KEYS */;
REPLACE INTO `tb_kurikulum` (`id_kurikulum`, `nm_kurikulum`, `ta`, `kd_prodi`, `status`) VALUES
	(1, 'STMIK Adhi Guna TI-20151', '20151', 55201, '0'),
	(2, 'STMIK Adhi Guna TI-20152', '20152', 55201, '1'),
	(3, 'STMIK Adhi Guna SI-20152', '20152', 57201, '1'),
	(4, 'STMIK Adhi Guna SI-20151', '20151', 57201, '0');
/*!40000 ALTER TABLE `tb_kurikulum` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_matkul
CREATE TABLE IF NOT EXISTS `tb_matkul` (
  `kode_mk` varchar(50) NOT NULL,
  `nm_mk` varchar(50) NOT NULL,
  `id_kurikulum` int(11) NOT NULL,
  `semester` int(10) NOT NULL,
  `sks` int(10) NOT NULL,
  PRIMARY KEY (`kode_mk`),
  KEY `FK_tb_matkul_tb_kurikulum` (`id_kurikulum`),
  CONSTRAINT `FK_tb_matkul_tb_kurikulum` FOREIGN KEY (`id_kurikulum`) REFERENCES `tb_kurikulum` (`id_kurikulum`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_matkul: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_matkul` DISABLE KEYS */;
REPLACE INTO `tb_matkul` (`kode_mk`, `nm_mk`, `id_kurikulum`, `semester`, `sks`) VALUES
	('ST 108 IN3', 'STATISTIK LANJUT', 4, 2, 3),
	('ST 111 IN2', 'BAHASA INGGRIS 2', 4, 2, 2),
	('ST105IN3', 'PANCASILA DAN KEWARGANEGARAAN', 1, 1, 3),
	('ST110IN2', 'BAHASA INGGRIS I', 1, 1, 2);
/*!40000 ALTER TABLE `tb_matkul` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_mhs
CREATE TABLE IF NOT EXISTS `tb_mhs` (
  `nim` varchar(50) NOT NULL,
  `nm_mhs` varchar(50) NOT NULL,
  `tpt_lhr` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `agama` int(5) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `wilayah` varchar(50) NOT NULL,
  `nm_ibu` varchar(50) NOT NULL,
  `kd_prodi` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `smt_masuk` varchar(10) NOT NULL,
  `status_mhs` int(4) NOT NULL,
  `status_awal` enum('1','2') NOT NULL,
  `email` text,
  PRIMARY KEY (`nim`),
  KEY `FK_tb_mhs_agama` (`agama`),
  KEY `FK_tb_mhs_tb_prodi` (`kd_prodi`),
  KEY `FK_tb_mhs_tb_status_mhs` (`status_mhs`),
  CONSTRAINT `FK_tb_mhs_agama` FOREIGN KEY (`agama`) REFERENCES `agama` (`id_agama`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_mhs_tb_prodi` FOREIGN KEY (`kd_prodi`) REFERENCES `tb_prodi` (`id_prodi`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_mhs_tb_status_mhs` FOREIGN KEY (`status_mhs`) REFERENCES `tb_status_mhs` (`id_status`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_mhs: ~33 rows (approximately)
/*!40000 ALTER TABLE `tb_mhs` DISABLE KEYS */;
REPLACE INTO `tb_mhs` (`nim`, `nm_mhs`, `tpt_lhr`, `tgl_lahir`, `jenkel`, `agama`, `kelurahan`, `wilayah`, `nm_ibu`, `kd_prodi`, `tgl_masuk`, `smt_masuk`, `status_mhs`, `status_awal`, `email`) VALUES
	('5520111008', 'TIAS PRIAWAN OPI ', 'TOBAMAWU ', '1992-04-17', 'L', 1, '-', '999999  ', '-', 55201, '2011-09-12', '20111', 3, '1', NULL),
	('5520111189', 'SOFYAN SAPUTRA ', 'POLINGGONA ', '1992-08-01', 'L', 98, '-', '999999  ', '-', 55201, '2011-09-12', '20111', 3, '1', NULL),
	('5520112173', 'Zul Hisyam ', 'Palu ', '1995-05-03', 'L', 98, '-', '999999  ', '-', 55201, '2012-09-12', '20121', 1, '1', NULL),
	('5520114070', 'MOHAMMAD FADLI', 'Palu', '2016-05-24', 'L', 1, 'Anoa', '186000', '-', 55201, '2016-05-24', '20141', 1, '1', ''),
	('5520115001', 'REKA ANGRAENI. M', 'Palu', '2016-05-23', 'P', 1, 'Hangtuah', '186000', '-', 55201, '2016-05-23', '20151', 1, '1', ''),
	('5520115005', 'MUH. ISMAIL', 'PENGKI', '1997-01-07', 'L', 1, '-', '186003  ', '-', 55201, '2015-11-02', '20151', 1, '1', NULL),
	('5520115007', 'GEDE DWI KRISNAWAN', 'SRITABANG', '1997-10-06', 'L', 4, '-', '186002  ', '-', 55201, '2015-08-01', '20151', 1, '1', NULL),
	('5520115009', 'RAHMAT NUR', 'dongala', '1998-04-22', 'L', 1, '-', '253205  ', '-', 55201, '2015-08-15', '20151', 1, '1', NULL),
	('5520115058', 'MAICKEL WATT SAMBARA SANGO', 'Palu', '0000-00-00', 'L', 1, '', '', 'Ibu', 55201, '0000-00-00', '20151', 1, '1', ''),
	('5520115060', 'MUH. RAHMAN', 'malaysia', '1994-11-25', 'L', 1, '-', '186001  ', '-', 55201, '2015-08-01', '20151', 1, '1', NULL),
	('5520115061', 'ELI ERNAWATI', 'benjala', '1993-07-15', 'P', 1, '-', '186001  ', '-', 55201, '2015-08-01', '20151', 1, '2', NULL),
	('5520115062', 'FADEL SUHARYANTO', 'poso', '1996-01-29', 'L', 1, '-', '186002  ', '-', 55201, '2015-08-01', '20151', 1, '2', NULL),
	('5520115063', 'I GEDE ADIADNYANA', 'suhi', '1997-04-27', 'L', 4, '-', '186003  ', '-', 55201, '2015-08-01', '20151', 1, '1', NULL),
	('5520115071', 'JEFRI TAUA', 'PALU', '1996-03-16', 'L', 2, '-', '186002  ', '-', 55201, '2015-05-09', '20151', 1, '1', NULL),
	('5520115072', 'MUHAMMAD ANUGRAH PUTRA', 'PALU', '1995-03-16', 'L', 1, '-', '186003  ', '-', 55201, '2015-08-01', '20151', 1, '1', NULL),
	('5520115073', 'FADIL AMUIL', 'KOLA-KOLA', '1997-01-04', 'L', 1, '-', '180233  ', '-', 55201, '2015-08-01', '20151', 1, '1', NULL),
	('5520115074', 'GAGUS YUDITO', 'TINOMBALA', '1997-12-21', 'L', 1, '-', '186001  ', '-', 55201, '2015-08-01', '20151', 1, '1', NULL),
	('5520115075', 'DENIS ALBERTUS LAMEANDA', 'PETUMBEA', '1997-08-30', 'L', 2, '-', '186002  ', '-', 55201, '2015-05-15', '20151', 1, '1', NULL),
	('5520115076', 'SRI HARTINA', 'MAJENE', '1995-02-09', 'P', 1, '-', '186001  ', '-', 55201, '2015-08-01', '20151', 1, '1', NULL),
	('5520115078', 'RYAN BASTIAN', 'TOLAI', '1995-03-02', 'L', 1, '-', '186003  ', '-', 55201, '2015-08-01', '20151', 1, '1', NULL),
	('5520115081', 'AFDI', 'PALU', '1995-12-31', 'L', 1, '-', '186001  ', '-', 55201, '2015-08-01', '20151', 1, '1', NULL),
	('5520115085', 'SYAHRUL AKBAR LAPAOLA', 'marowo', '1998-01-09', 'L', 1, '-', '186002  ', '-', 55201, '2015-08-01', '20151', 1, '1', NULL),
	('5520115095', 'MUHAMMAD FEBRIANSYAH', 'parigi', '1997-02-28', 'L', 1, '-', '186002  ', '-', 55201, '2015-08-15', '20151', 1, '1', NULL),
	('5520115105', 'HENRY WILLYSTRIZON MAKAGIANTANG', 'PALU', '1996-01-26', 'L', 1, '-', '186002  ', '-', 55201, '2015-08-01', '20151', 1, '1', NULL),
	('5520115106', 'AHMAD GEDE AKHWALI', 'TAMBARANA', '1996-04-26', 'L', 1, '-', '186002  ', '-', 55201, '2015-08-01', '20151', 1, '1', NULL),
	('5520115108', 'MOH. RIANDI', 'PALU', '1996-06-15', 'L', 1, '-', '186001  ', '-', 55201, '2015-08-01', '20151', 1, '1', NULL),
	('5520115117', 'MOHAMMAD RIDWAN ', 'TOLITOLI ', '1989-08-13', 'L', 98, '-', '999999  ', '-', 55201, '2007-09-24', '20071', 1, '1', NULL),
	('5520115129', 'MOH. RAGIL', 'DONGGALA', '1994-02-19', 'L', 1, '-', '186002  ', '-', 55201, '2015-08-01', '20151', 1, '1', NULL),
	('5520116001', 'TESTING', 'Palu', '1992-08-01', 'L', 1, 'Lasoani', '180800  ', 'Nama Ibu', 55201, '2016-01-01', '20161', 1, '1', NULL),
	('5720109298', 'RAHMAWATI ', 'PALU ', '1988-07-12', 'P', 98, '-', '999999  ', '-', 57201, '2009-09-07', '20091', 1, '1', NULL),
	('5720111032', 'IHYAN FITRI ', 'DOLO ', '1994-01-19', 'P', 98, '-', '999999  ', '-', 57201, '2011-09-12', '20111', 1, '1', NULL),
	('750307857', 'MOHAMMAD RIDWAN ', 'TOLITOLI ', '1989-08-13', 'L', 98, '-', '999999  ', '-', 55201, '2007-09-24', '20071', 1, '1', NULL),
	('750405519', 'ASRUL EVENDY', 'tanjung aru', '1997-07-21', 'L', 1, '-', '186001  ', '-', 57201, '2005-09-12', '20051', 1, '1', NULL);
/*!40000 ALTER TABLE `tb_mhs` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_mhs_data_krs
CREATE TABLE IF NOT EXISTS `tb_mhs_data_krs` (
  `id_data_krs` int(50) NOT NULL AUTO_INCREMENT,
  `id_krs` int(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  PRIMARY KEY (`id_data_krs`),
  KEY `FK_tb_mhs_data_krs_tb_mhs_krs` (`id_krs`),
  KEY `FK_tb_mhs_data_krs_tb_kelas_kul` (`id_kelas`),
  CONSTRAINT `FK_tb_mhs_data_krs_tb_kelas_kul` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas_kul` (`id_kelas`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_mhs_data_krs_tb_mhs_krs` FOREIGN KEY (`id_krs`) REFERENCES `tb_mhs_krs` (`id_krs`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='get id krs dari tb_mhs_krs kemudian get kelas berdasarkan kurikulum dari tb_mhs_krs ';

-- Dumping data for table siakad_adhiguna_1.tb_mhs_data_krs: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_mhs_data_krs` DISABLE KEYS */;
REPLACE INTO `tb_mhs_data_krs` (`id_data_krs`, `id_krs`, `id_kelas`) VALUES
	(7, 1, 1);
/*!40000 ALTER TABLE `tb_mhs_data_krs` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_mhs_krs
CREATE TABLE IF NOT EXISTS `tb_mhs_krs` (
  `id_krs` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` varchar(50) NOT NULL,
  `kode_pembayaran` varchar(50) NOT NULL,
  `id_kurikulum` int(11) NOT NULL,
  `status_ambil` enum('Y','T') NOT NULL DEFAULT 'T',
  `status_cek` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_krs`),
  UNIQUE KEY `kode_pembayaran` (`kode_pembayaran`),
  KEY `FK__tb_mhs` (`id_mhs`),
  KEY `FK_tb_mhs_krs_tb_kurikulum` (`id_kurikulum`),
  CONSTRAINT `FK__tb_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `tb_mhs` (`nim`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_mhs_krs_tb_kurikulum` FOREIGN KEY (`id_kurikulum`) REFERENCES `tb_kurikulum` (`id_kurikulum`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_mhs_krs: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_mhs_krs` DISABLE KEYS */;
REPLACE INTO `tb_mhs_krs` (`id_krs`, `id_mhs`, `kode_pembayaran`, `id_kurikulum`, `status_ambil`, `status_cek`) VALUES
	(1, '5520111008', '897103d1e884257bff412c565ada8a5f', 1, 'T', 'Y'),
	(2, '5520111008', '583e87200a9ffc28c6a9f78344bdfeeb', 2, 'T', 'Y'),
	(3, '5520115001', '81d8d07d58901fd0101641b6333c7630', 1, 'T', 'Y');
/*!40000 ALTER TABLE `tb_mhs_krs` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_mhs_lulus
CREATE TABLE IF NOT EXISTS `tb_mhs_lulus` (
  `id_mhs` varchar(50) NOT NULL,
  `id_jns_keluar` int(10) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `jalur_skripsi` enum('1','0') DEFAULT NULL,
  `judul_skripsi` text,
  `bln_awal_bim` date DEFAULT NULL,
  `bln_akhir_bim` date DEFAULT NULL,
  `sk_yudisium` varchar(50) DEFAULT NULL,
  `tgl_yudisium` date DEFAULT NULL,
  `IPK` varchar(50) DEFAULT NULL,
  `no_ijazah` varchar(50) DEFAULT NULL,
  `ket` text,
  PRIMARY KEY (`id_mhs`),
  KEY `FK_tb_mhs_lulus_tb_jenis_keluar` (`id_jns_keluar`),
  CONSTRAINT `FK_tb_mhs_lulus_tb_jenis_keluar` FOREIGN KEY (`id_jns_keluar`) REFERENCES `tb_jenis_keluar` (`id_jenis_keluar`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_mhs_lulus_tb_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `tb_mhs` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_mhs_lulus: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_mhs_lulus` DISABLE KEYS */;
REPLACE INTO `tb_mhs_lulus` (`id_mhs`, `id_jns_keluar`, `tgl_keluar`, `jalur_skripsi`, `judul_skripsi`, `bln_awal_bim`, `bln_akhir_bim`, `sk_yudisium`, `tgl_yudisium`, `IPK`, `no_ijazah`, `ket`) VALUES
	('5520111008', 1, '2015-10-30', '1', 'IMPLEMENTASI RANDOM SERVIS UNTUK MESIN ANTRIAN BERBASIS RASPBERRY PI PADA WARKOP RICKY', NULL, NULL, NULL, NULL, '3.05', NULL, NULL),
	('5520111189', 1, '2015-10-02', '1', 'PENERAPAN LOGIKA FUZZY MENGGUNAKAN METODE TSUKAMOTO UNTUK RANCANG BANGUN ROBOT PENJEJAK DINDING KORIDOR', NULL, NULL, NULL, NULL, '3.35', NULL, NULL);
/*!40000 ALTER TABLE `tb_mhs_lulus` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_mhs_transfer
CREATE TABLE IF NOT EXISTS `tb_mhs_transfer` (
  `id_trans` int(10) NOT NULL AUTO_INCREMENT,
  `id_mhs` varchar(50) NOT NULL DEFAULT '0',
  `sks_diakui` int(10) NOT NULL DEFAULT '0',
  `pt_asal` varchar(50) NOT NULL DEFAULT '0',
  `prodi_asal` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_trans`),
  UNIQUE KEY `id_mhs` (`id_mhs`),
  CONSTRAINT `FK_tb_mhs_transfer_tb_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `tb_mhs` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_mhs_transfer: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_mhs_transfer` DISABLE KEYS */;
REPLACE INTO `tb_mhs_transfer` (`id_trans`, `id_mhs`, `sks_diakui`, `pt_asal`, `prodi_asal`) VALUES
	(1, '5520115062', 23, 'universitas Sintuwu Maroso', 'Teknik Sipil'),
	(2, '5520115061', 89, 'AMIK TRI DHARMA', 'Teknik Informatika');
/*!40000 ALTER TABLE `tb_mhs_transfer` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_nilai
CREATE TABLE IF NOT EXISTS `tb_nilai` (
  `id_nilai` int(10) NOT NULL AUTO_INCREMENT,
  `id_krs` int(10) NOT NULL DEFAULT '0',
  `nilai_angka` int(5) NOT NULL DEFAULT '0',
  `nilai_index` enum('A','B','C','D','E') NOT NULL,
  `nilai_huruf` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_nilai`),
  KEY `FK_tb_nilai_tb_mhs_data_krs` (`id_krs`),
  CONSTRAINT `FK_tb_nilai_tb_mhs_data_krs` FOREIGN KEY (`id_krs`) REFERENCES `tb_mhs_data_krs` (`id_data_krs`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_nilai: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_nilai` DISABLE KEYS */;
REPLACE INTO `tb_nilai` (`id_nilai`, `id_krs`, `nilai_angka`, `nilai_index`, `nilai_huruf`) VALUES
	(3, 7, 0, 'A', '0');
/*!40000 ALTER TABLE `tb_nilai` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_nilai_transfer
CREATE TABLE IF NOT EXISTS `tb_nilai_transfer` (
  `id_nilai_trans` int(10) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) NOT NULL DEFAULT '0',
  `kd_mk_asal` varchar(50) NOT NULL DEFAULT '0',
  `nm_mk` varchar(50) NOT NULL DEFAULT '0',
  `jml_sks_asal` int(11) NOT NULL DEFAULT '0',
  `nilai_huruf` enum('A','B','C','D','E') NOT NULL,
  `id_mk` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_nilai_trans`),
  KEY `FK__tb_mhs_transfer` (`id_mhs`),
  CONSTRAINT `FK__tb_mhs_transfer` FOREIGN KEY (`id_mhs`) REFERENCES `tb_mhs_transfer` (`id_trans`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_nilai_transfer: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_nilai_transfer` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_nilai_transfer` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_prodi
CREATE TABLE IF NOT EXISTS `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `nm_prodi` text NOT NULL,
  `nm_ketua` text,
  PRIMARY KEY (`id_prodi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_prodi: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_prodi` DISABLE KEYS */;
REPLACE INTO `tb_prodi` (`id_prodi`, `nm_prodi`, `nm_ketua`) VALUES
	(55201, 'Tehnik Informatika', 'Budi Mulyono, S.Kom,. M.Kom'),
	(57201, 'Sistem Informasi', 'Moh. Risaldi, S.Kom,. M.Kom');
/*!40000 ALTER TABLE `tb_prodi` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_setting
CREATE TABLE IF NOT EXISTS `tb_setting` (
  `id_sett` int(2) NOT NULL AUTO_INCREMENT,
  `kode_feed` varchar(50) NOT NULL DEFAULT '0',
  `pass_feed` varchar(50) NOT NULL DEFAULT '0',
  `role` enum('M','P') NOT NULL DEFAULT 'P',
  `url_ws` enum('L','P') NOT NULL DEFAULT 'L',
  `mode` enum('LIVE','SANDBOX') NOT NULL,
  `link` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sett`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_setting: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_setting` DISABLE KEYS */;
REPLACE INTO `tb_setting` (`id_sett`, `kode_feed`, `pass_feed`, `role`, `url_ws`, `mode`, `link`) VALUES
	(1, '093111', 'stm1k788688ADH1gvn@', 'P', 'L', 'SANDBOX', 'http://10.10.10.4:8082/ws/'),
	(2, '093111', 'stm1k788688ADH1gvn@', 'M', 'L', 'LIVE', 'http://10.10.10.4:8082/ws/');
/*!40000 ALTER TABLE `tb_setting` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_status_mhs
CREATE TABLE IF NOT EXISTS `tb_status_mhs` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nm_status` char(2) NOT NULL,
  `ket` text,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_status_mhs: ~7 rows (approximately)
/*!40000 ALTER TABLE `tb_status_mhs` DISABLE KEYS */;
REPLACE INTO `tb_status_mhs` (`id_status`, `nm_status`, `ket`) VALUES
	(1, 'A', 'Aktif'),
	(2, 'C', 'Cuti'),
	(3, 'L', 'Lulus'),
	(4, 'D', 'Drop Out'),
	(5, 'K', 'Keluar'),
	(6, 'N', 'Non Aktif'),
	(7, 'X', 'Unknown');
/*!40000 ALTER TABLE `tb_status_mhs` ENABLE KEYS */;


-- Dumping structure for view siakad_adhiguna_1.v_akm_dosen
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_akm_dosen` (
	`nidn` INT(11) NOT NULL,
	`nm_dosen` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`kode_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_kelas` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`rencana_tatap_muka` INT(11) NOT NULL,
	`tatap_muka` INT(11) NOT NULL,
	`ta` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_prodi` INT(11) NOT NULL,
	`nm_prodi` TEXT NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_bayar_smt
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_bayar_smt` (
	`nim` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	`kode_bayar` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`statusbayar` VARCHAR(22) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nama_jns_bayar` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
	`keterangan` TEXT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_kelas_kul
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_kelas_kul` (
	`kode_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ta` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_kelas` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_prodi` INT(11) NOT NULL,
	`nm_prodi` TEXT NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_mata_kuliah
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_mata_kuliah` (
	`kode_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`semester` INT(10) NOT NULL,
	`sks` INT(10) NOT NULL,
	`nm_kurikulum` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_mhs_aktif
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_mhs_aktif` (
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mhs` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tpt_lhr` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_lahir` DATE NOT NULL,
	`jenkel` ENUM('L','P') NOT NULL COLLATE 'latin1_swedish_ci',
	`agama` VARCHAR(255) NOT NULL COLLATE 'utf8_bin',
	`alamat` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`wilayah` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_prodi` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_masuk` DATE NOT NULL,
	`smt_masuk` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_status` CHAR(2) NOT NULL COLLATE 'latin1_swedish_ci',
	`keterangan` TEXT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_mhs_data_krs
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_mhs_data_krs` (
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mhs` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`kode_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_kelas` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ta` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_prodi` INT(11) NOT NULL,
	`nm_prodi` TEXT NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_mhs_krs
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_mhs_krs` (
	`id_krs` INT(11) NOT NULL,
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`kode_pembayaran` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_kurikulum` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ta` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`status_ambil` ENUM('Y','T') NOT NULL COLLATE 'latin1_swedish_ci',
	`status_cek` ENUM('Y','N') NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_mhs_lulus
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_mhs_lulus` (
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mhs` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tpt_lhr` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_lahir` DATE NOT NULL,
	`jenkel` ENUM('L','P') NOT NULL COLLATE 'latin1_swedish_ci',
	`alamat` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`wilayah` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_masuk` DATE NOT NULL,
	`smt_masuk` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_jenis_keluar` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_keluar` DATE NULL,
	`jalur_skripsi` ENUM('1','0') NULL COLLATE 'latin1_swedish_ci',
	`judul_skripsi` TEXT NULL COLLATE 'latin1_swedish_ci',
	`bln_awal_bim` DATE NULL,
	`bln_akhir_bim` DATE NULL,
	`sk_yudisium` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`IPK` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`no_ijazah` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ket` TEXT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_mhs_transfer
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_mhs_transfer` (
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`prodi_asal` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`pt_asal` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`sks_diakui` INT(10) NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_nilai
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_nilai` (
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mhs` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`kode_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_kelas` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nilai_angka` INT(5) NOT NULL,
	`nilai_huruf` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	`nilai_index` ENUM('A','B','C','D','E') NOT NULL COLLATE 'latin1_swedish_ci',
	`id_prodi` INT(11) NOT NULL,
	`nm_prodi` TEXT NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_akm_dosen
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_akm_dosen`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `v_akm_dosen` AS SELECT
m6.nidn,
m6.nm_dosen,
m7.kode_mk,
m7.nm_mk,
m3.nm_kelas,
m1.r_t_muka AS rencana_tatap_muka,
m1.t_muka AS tatap_muka,
m4.ta,
m5.id_prodi,
m5.nm_prodi
FROM tb_kelas_dosen m1
JOIN tb_mhs_data_krs m2 ON m1.id_data_krs
JOIN tb_kelas_kul m3 ON m2.id_kelas=m3.id_kelas
JOIN tb_kurikulum m4 ON m3.id_kurikulum=m4.id_kurikulum
JOIN tb_prodi m5 ON m4.kd_prodi=m5.id_prodi
JOIN tb_dosen m6 ON m1.id_dosen=m6.nidn
JOIN tb_matkul m7 ON m3.id_matkul=m7.kode_mk ;


-- Dumping structure for view siakad_adhiguna_1.v_bayar_smt
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_bayar_smt`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `v_bayar_smt` AS select `view_pembayaran`.`nim` AS `nim`,`view_pembayaran`.`kode_bayar` AS `kode_bayar`,`view_pembayaran`.`statusbayar` AS `statusbayar`,`view_pembayaran`.`nama_jns_bayar` AS `nama_jns_bayar`,`view_pembayaran`.`keterangan` AS `keterangan` from `siami`.`view_pembayaran` where ((`view_pembayaran`.`nama_jns_bayar` = 'Semester') and (`view_pembayaran`.`statusbayar` = 'Lunas')) ;


-- Dumping structure for view siakad_adhiguna_1.v_kelas_kul
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_kelas_kul`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `v_kelas_kul` AS SELECT 
m2.kode_mk,
m2.nm_mk,
m3.ta,
m1.nm_kelas,
m4.id_prodi,
m4.nm_prodi
FROM tb_kelas_kul m1
JOIN tb_matkul m2 ON m1.id_matkul=m2.kode_mk
JOIN tb_kurikulum m3 ON m1.id_kurikulum=m3.id_kurikulum
JOIN tb_prodi m4 ON m1.id_prodi=m4.id_prodi ;


-- Dumping structure for view siakad_adhiguna_1.v_mata_kuliah
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_mata_kuliah`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `v_mata_kuliah` AS select `m1`.`kode_mk` AS `kode_mk`,`m1`.`nm_mk` AS `nm_mk`,`m1`.`semester` AS `semester`,`m1`.`sks` AS `sks`,`m2`.`nm_kurikulum` AS `nm_kurikulum` from (`tb_matkul` `m1` join `tb_kurikulum` `m2` on((`m1`.`id_kurikulum` = `m2`.`id_kurikulum`))) ;


-- Dumping structure for view siakad_adhiguna_1.v_mhs_aktif
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_mhs_aktif`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mhs_aktif` AS select `m1`.`nim` AS `nim`,`m1`.`nm_mhs` AS `nm_mhs`,`m1`.`tpt_lhr` AS `tpt_lhr`,`m1`.`tgl_lahir` AS `tgl_lahir`,`m1`.`jenkel` AS `jenkel`,`m2`.`agama` AS `agama`,`m1`.`kelurahan` AS `alamat`,`m1`.`wilayah` AS `wilayah`,`m3`.`nm_prodi` AS `nm_prodi`,`m1`.`tgl_masuk` AS `tgl_masuk`,`m1`.`smt_masuk` AS `smt_masuk`,`m4`.`nm_status` AS `nm_status`,`m4`.`ket` AS `keterangan` from (((`tb_mhs` `m1` join `agama` `m2` on((`m1`.`agama` = `m2`.`id_agama`))) join `tb_prodi` `m3` on((`m1`.`kd_prodi` = `m3`.`id_prodi`))) join `tb_status_mhs` `m4` on((`m1`.`status_mhs` = `m4`.`id_status`))) where (`m4`.`nm_status` = 'A');


-- Dumping structure for view siakad_adhiguna_1.v_mhs_data_krs
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_mhs_data_krs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `v_mhs_data_krs` AS SELECT 
m7.nim,
m7.nm_mhs,
m3.kode_mk,
m3.nm_mk,
m2.nm_kelas,
m5.ta,
m4.id_prodi,
m4.nm_prodi
FROM tb_mhs_data_krs m1
JOIN tb_kelas_kul m2 ON m1.id_kelas=m2.id_kelas
JOIN tb_matkul m3 ON m2.id_matkul=m3.kode_mk
JOIN tb_prodi m4 ON m2.id_prodi=m4.id_prodi
JOIN tb_kurikulum m5 ON m2.id_kurikulum=m5.id_kurikulum 
JOIN tb_mhs_krs m6 ON m1.id_krs=m6.id_krs
JOIN tb_mhs m7 ON m6.id_mhs=m7.nim ;


-- Dumping structure for view siakad_adhiguna_1.v_mhs_krs
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_mhs_krs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `v_mhs_krs` AS select `m1`.`id_krs` AS `id_krs`,`m1`.`id_mhs` AS `nim`,`m2`.`nm_mhs` AS `nama`,`m1`.`kode_pembayaran` AS `kode_pembayaran`,`m3`.`nm_kurikulum` AS `nm_kurikulum`,`m3`.`ta` AS `ta`,`m1`.`status_ambil` AS `status_ambil`,`m1`.`status_cek` AS `status_cek` from ((`tb_mhs_krs` `m1` join `tb_mhs` `m2` on((`m1`.`id_mhs` = `m2`.`nim`))) join `tb_kurikulum` `m3` on((`m1`.`id_kurikulum` = `m3`.`id_kurikulum`))) ;


-- Dumping structure for view siakad_adhiguna_1.v_mhs_lulus
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_mhs_lulus`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mhs_lulus` AS select `m2`.`nim` AS `nim`,`m2`.`nm_mhs` AS `nm_mhs`,`m2`.`tpt_lhr` AS `tpt_lhr`,`m2`.`tgl_lahir` AS `tgl_lahir`,`m2`.`jenkel` AS `jenkel`,`m2`.`kelurahan` AS `alamat`,`m2`.`wilayah` AS `wilayah`,`m2`.`tgl_masuk` AS `tgl_masuk`,`m2`.`smt_masuk` AS `smt_masuk`,`m3`.`nm_jenis_keluar` AS `nm_jenis_keluar`,`m1`.`tgl_keluar` AS `tgl_keluar`,`m1`.`jalur_skripsi` AS `jalur_skripsi`,`m1`.`judul_skripsi` AS `judul_skripsi`,`m1`.`bln_awal_bim` AS `bln_awal_bim`,`m1`.`bln_akhir_bim` AS `bln_akhir_bim`,`m1`.`sk_yudisium` AS `sk_yudisium`,`m1`.`IPK` AS `IPK`,`m1`.`no_ijazah` AS `no_ijazah`,`m1`.`ket` AS `ket` from ((`tb_mhs_lulus` `m1` join `tb_mhs` `m2` on((`m1`.`id_mhs` = `m2`.`nim`))) join `tb_jenis_keluar` `m3` on((`m1`.`id_jns_keluar` = `m3`.`id_jenis_keluar`)));


-- Dumping structure for view siakad_adhiguna_1.v_mhs_transfer
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_mhs_transfer`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mhs_transfer` AS select `m1`.`id_mhs` AS `nim`,`m2`.`nm_mhs` AS `nama`,`m1`.`prodi_asal` AS `prodi_asal`,`m1`.`pt_asal` AS `pt_asal`,`m1`.`sks_diakui` AS `sks_diakui` from (`tb_mhs_transfer` `m1` join `tb_mhs` `m2` on((`m1`.`id_mhs` = `m2`.`nim`)));


-- Dumping structure for view siakad_adhiguna_1.v_nilai
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_nilai`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `v_nilai` AS SELECT 
m5.nim,
m5.nm_mhs,
m6.kode_mk,
m6.nm_mk,
m3.nm_kelas,
m1.nilai_angka,
m1.nilai_huruf,
m1.nilai_index,
m7.id_prodi,
m7.nm_prodi
FROM tb_nilai m1
JOIN tb_mhs_data_krs m2 ON m1.id_krs=m2.id_data_krs
JOIN tb_kelas_kul m3 ON m2.id_kelas=m3.id_kelas
JOIN tb_mhs_krs m4 ON m2.id_krs=m4.id_krs
JOIN tb_mhs m5 ON m4.id_mhs=m5.nim
JOIN tb_matkul m6 ON m3.id_matkul=m6.kode_mk
JOIN tb_prodi m7 ON m3.id_prodi=m7.id_prodi ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
