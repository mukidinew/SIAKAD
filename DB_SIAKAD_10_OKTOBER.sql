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
  `agama` varchar(255) NOT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='priv. admin';

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


-- Dumping structure for table siakad_adhiguna_1.login_alumni
CREATE TABLE IF NOT EXISTS `login_alumni` (
  `id_alumni` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('alm') NOT NULL,
  PRIMARY KEY (`id_alumni`),
  CONSTRAINT `FK__tb_mhs_lulus` FOREIGN KEY (`id_alumni`) REFERENCES `tb_alumni` (`nim`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.login_alumni: ~0 rows (approximately)
/*!40000 ALTER TABLE `login_alumni` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_alumni` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.login_dosen
CREATE TABLE IF NOT EXISTS `login_dosen` (
  `id_login_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas_dosen` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('dosen','pengampu') NOT NULL DEFAULT 'dosen',
  PRIMARY KEY (`id_login_dosen`),
  KEY `FK_login_dosen_tb_kelas_dosen` (`id_kelas_dosen`),
  CONSTRAINT `FK_login_dosen_tb_kelas_dosen` FOREIGN KEY (`id_kelas_dosen`) REFERENCES `tb_kelas_dosen` (`id_kelas_dosen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.login_dosen: ~0 rows (approximately)
/*!40000 ALTER TABLE `login_dosen` DISABLE KEYS */;
REPLACE INTO `login_dosen` (`id_login_dosen`, `id_kelas_dosen`, `username`, `password`, `level`) VALUES
	(1, 23, 'aifan', 'aifan', 'dosen');
/*!40000 ALTER TABLE `login_dosen` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.login_mhs
CREATE TABLE IF NOT EXISTS `login_mhs` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `id_krs` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('mhs') NOT NULL,
  `val_periode` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_user`),
  KEY `FK_login_mhs_tb_mhs_krs` (`id_krs`),
  CONSTRAINT `FK_login_mhs_tb_mhs_krs` FOREIGN KEY (`id_krs`) REFERENCES `tb_mhs_krs` (`id_krs`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.login_mhs: ~0 rows (approximately)
/*!40000 ALTER TABLE `login_mhs` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_mhs` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.login_peg
CREATE TABLE IF NOT EXISTS `login_peg` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('mhs','baak','dosen','prodi') NOT NULL,
  `level_prodi` enum('55201','57201','0') DEFAULT '0',
  `id_setting` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `FK_login_peg_tb_setting` (`id_setting`),
  CONSTRAINT `FK_login_peg_tb_setting` FOREIGN KEY (`id_setting`) REFERENCES `tb_setting` (`id_sett`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table siakad_adhiguna_1.login_peg: ~8 rows (approximately)
/*!40000 ALTER TABLE `login_peg` DISABLE KEYS */;
REPLACE INTO `login_peg` (`uid`, `username`, `password`, `level`, `level_prodi`, `id_setting`, `nama`) VALUES
	(1, 'reni', 'stmik@093111', 'baak', '55201', 3, 'RENI NURDIN, S.Sos'),
	(2, 'prodi_si', 'prodi@57201', 'prodi', '57201', 1, 'Moh. Risaldi, S.Kom, M.Kom'),
	(3, 'nanang', 'stmik@093111', 'baak', '57201', 3, 'NANANG YULIANI, S.Kom'),
	(4, 'prodi_ti', 'prodi@55201', 'prodi', '55201', 1, 'Budi Mulyono, S.Kom, M.Kom'),
	(5, 'dosen', 'dosen', 'dosen', '0', 2, 'Si Dosen'),
	(6, 'andika', '080688', 'baak', '0', 3, 'Moh. Andika., S.Sos'),
	(7, 'sek_pro_si', 'sek_pro_si@57201', 'prodi', '57201', 1, 'Moh. Rivai., S.Kom,. M.Kom'),
	(8, 'sek_pro_ti', 'sek_pro_ti@55201', 'prodi', '55201', 1, 'Syaiful Hendra., S.Kom,. M.Kom');
/*!40000 ALTER TABLE `login_peg` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_alumni
CREATE TABLE IF NOT EXISTS `tb_alumni` (
  `nim` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` text NOT NULL,
  `pekerjaan` text NOT NULL,
  PRIMARY KEY (`nim`),
  CONSTRAINT `FK_tb_alumni_tb_mhs_lulus` FOREIGN KEY (`nim`) REFERENCES `tb_mhs_lulus` (`id_mhs`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_alumni: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_alumni` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_alumni` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_bap
CREATE TABLE IF NOT EXISTS `tb_bap` (
  `id_bap` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bap` varchar(50) NOT NULL,
  `perihal` mediumtext NOT NULL,
  `deskripsi` mediumtext,
  `pengirim` int(11) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `status` enum('Y','N','P') NOT NULL DEFAULT 'P',
  PRIMARY KEY (`id_bap`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table siakad_adhiguna_1.tb_bap: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_bap` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_bap` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_cd_khs
CREATE TABLE IF NOT EXISTS `tb_cd_khs` (
  `id_cd_khs` int(11) NOT NULL AUTO_INCREMENT,
  `waktu_buka` datetime NOT NULL,
  `waktu_tutup` datetime NOT NULL,
  `id_kurikulum` int(11) NOT NULL,
  PRIMARY KEY (`id_cd_khs`),
  KEY `FK_tb_cd_khs_tb_kurikulum` (`id_kurikulum`),
  CONSTRAINT `FK_tb_cd_khs_tb_kurikulum` FOREIGN KEY (`id_kurikulum`) REFERENCES `tb_kurikulum` (`id_kurikulum`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_cd_khs: ~5 rows (approximately)
/*!40000 ALTER TABLE `tb_cd_khs` DISABLE KEYS */;
REPLACE INTO `tb_cd_khs` (`id_cd_khs`, `waktu_buka`, `waktu_tutup`, `id_kurikulum`) VALUES
	(1, '2016-08-26 23:32:40', '2016-12-26 23:32:42', 10),
	(2, '2016-08-26 23:32:40', '2016-12-27 23:32:42', 9),
	(3, '2015-09-14 12:32:07', '2015-12-14 12:32:12', 7),
	(4, '2016-08-26 23:32:40', '2016-12-27 23:32:42', 10),
	(5, '2016-08-26 23:32:40', '2016-12-27 23:32:42', 9);
/*!40000 ALTER TABLE `tb_cd_khs` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_cd_krs
CREATE TABLE IF NOT EXISTS `tb_cd_krs` (
  `id_cd_krs` int(11) NOT NULL AUTO_INCREMENT,
  `waktu_buka` datetime NOT NULL,
  `waktu_tutup` datetime NOT NULL,
  `id_kurikulum` int(11) NOT NULL,
  PRIMARY KEY (`id_cd_krs`),
  KEY `FK_tb_cd_krs_tb_kurikulum` (`id_kurikulum`),
  CONSTRAINT `FK_tb_cd_krs_tb_kurikulum` FOREIGN KEY (`id_kurikulum`) REFERENCES `tb_kurikulum` (`id_kurikulum`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_cd_krs: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_cd_krs` DISABLE KEYS */;
REPLACE INTO `tb_cd_krs` (`id_cd_krs`, `waktu_buka`, `waktu_tutup`, `id_kurikulum`) VALUES
	(6, '2016-08-26 23:31:32', '2016-12-27 23:31:33', 10),
	(8, '2016-08-26 23:31:32', '2016-12-27 23:31:33', 9),
	(9, '2015-09-14 12:30:57', '2015-12-14 12:31:04', 7),
	(10, '2015-09-14 12:33:17', '2015-12-01 00:00:00', 8);
/*!40000 ALTER TABLE `tb_cd_krs` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_dosen
CREATE TABLE IF NOT EXISTS `tb_dosen` (
  `nidn` varchar(50) NOT NULL,
  `nm_dosen` text NOT NULL,
  `program_studi` int(11) NOT NULL,
  PRIMARY KEY (`nidn`),
  KEY `FK__tb_prodi` (`program_studi`),
  CONSTRAINT `FK__tb_prodi` FOREIGN KEY (`program_studi`) REFERENCES `tb_prodi` (`id_prodi`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_dosen: ~33 rows (approximately)
/*!40000 ALTER TABLE `tb_dosen` DISABLE KEYS */;
REPLACE INTO `tb_dosen` (`nidn`, `nm_dosen`, `program_studi`) VALUES
	('0901037902', 'AIFAN', 57201),
	('0904068602', 'MOH. RISALDI', 57201),
	('0905056903', 'AHMAD DAENG MASUANG', 57201),
	('0906028402', 'MASRINI', 55201),
	('0906118501', 'ADRIN T', 55201),
	('0907108001', 'HARIYANTO', 55201),
	('0908076802', 'NURYANTO S BOEAMEN', 57201),
	('0909066903', 'MOHAMMAD MUNIR', 55201),
	('0912058002', 'ANWAR S. PANYILI', 55201),
	('0912127804', 'SUPARDI NGARENG', 55201),
	('0913107503', 'BUDI MULYONO', 55201),
	('0915057201', 'RAHMIWATI HABIBU', 57201),
	('0915067201', 'ISDAR A DJUFRI', 57201),
	('0916088502', 'GUSNIWATI', 57201),
	('0918067301', 'SUKARDI', 57201),
	('0918067901', 'SITI MUNIFAH', 57201),
	('0918127802', 'MUS AIDAH', 57201),
	('0921017501', 'ICHSAN', 57201),
	('0923087801', 'AGUS ROMADHONA', 55201),
	('0924047601', 'AFANDI', 55201),
	('0925078403', 'ULFIAH', 55201),
	('0928087601', 'AHMAD RIZAL', 55201),
	('0928118601', 'ISMAIL DG NURUNG', 55201),
	('0929097701', 'WAWAN ERMAWAN', 55201),
	('0929127801', 'SULUH SRI WAHYUNINGSIH', 55201),
	('0931128503', 'MUHAMAD RIFAI', 57201),
	('905048602', 'SYAHRULLAH', 57201),
	('908076802', 'NURYANTO S BOEAMEN', 57201),
	('912058002', 'ANWAR S. PANYILI', 55201),
	('913107503', 'BUDI MULYONO', 55201),
	('914058701', 'SYAIFUL HENDRA', 55201),
	('9909003153', 'SITI MAEMUNAH', 55201),
	('9909925380', 'SUDDIN SUPU', 55201);
/*!40000 ALTER TABLE `tb_dosen` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_dosen_absensi
CREATE TABLE IF NOT EXISTS `tb_dosen_absensi` (
  `id_absensi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas_dosen` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `status_kehadiran` enum('Y','N') NOT NULL,
  `pembahasan` mediumtext NOT NULL,
  PRIMARY KEY (`id_absensi`),
  KEY `FK_tb_dosen_absensi_tb_kelas_dosen` (`id_kelas_dosen`),
  CONSTRAINT `FK_tb_dosen_absensi_tb_kelas_dosen` FOREIGN KEY (`id_kelas_dosen`) REFERENCES `tb_kelas_dosen` (`id_kelas_dosen`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Belum Dikorek';

-- Dumping data for table siakad_adhiguna_1.tb_dosen_absensi: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_dosen_absensi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_dosen_absensi` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_dosen_pembimbing
CREATE TABLE IF NOT EXISTS `tb_dosen_pembimbing` (
  `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT,
  `id_dosen` varchar(50) NOT NULL DEFAULT '0',
  `status` enum('1','2') NOT NULL,
  PRIMARY KEY (`id_pembimbing`),
  KEY `FK__tb_dosen` (`id_dosen`),
  CONSTRAINT `FK__tb_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `tb_dosen` (`nidn`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_dosen_pembimbing: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_dosen_pembimbing` DISABLE KEYS */;
REPLACE INTO `tb_dosen_pembimbing` (`id_pembimbing`, `id_dosen`, `status`) VALUES
	(1, '0923087801', '1'),
	(2, '0912127804', '2'),
	(3, '0918067301', '1'),
	(4, '0901037902', '2');
/*!40000 ALTER TABLE `tb_dosen_pembimbing` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_dosen_penguji
CREATE TABLE IF NOT EXISTS `tb_dosen_penguji` (
  `id_dosen_penguji` int(11) NOT NULL AUTO_INCREMENT,
  `id_proposal_maju` int(11) NOT NULL DEFAULT '0',
  `id_dosen` varchar(50) NOT NULL,
  `jabatan_penguji` enum('1','2','3','4','5') NOT NULL,
  PRIMARY KEY (`id_dosen_penguji`),
  KEY `FK_tb_dosen_penguji_tb_proposal_maju` (`id_proposal_maju`),
  KEY `id_dosen` (`id_dosen`),
  CONSTRAINT `FK_tb_dosen_penguji_tb_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `tb_dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_dosen_penguji_tb_proposal_maju` FOREIGN KEY (`id_proposal_maju`) REFERENCES `tb_proposal_maju` (`id_proposal_maju`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_dosen_penguji: ~10 rows (approximately)
/*!40000 ALTER TABLE `tb_dosen_penguji` DISABLE KEYS */;
REPLACE INTO `tb_dosen_penguji` (`id_dosen_penguji`, `id_proposal_maju`, `id_dosen`, `jabatan_penguji`) VALUES
	(5, 1, '0918067301', '1'),
	(6, 1, '0913107503', '2'),
	(7, 1, '0923087801', '3'),
	(8, 1, '0912127804', '4'),
	(9, 1, '0912058002', '5'),
	(15, 3, '0929127801', '1'),
	(16, 3, '0913107503', '2'),
	(17, 3, '0923087801', '3'),
	(18, 3, '0912127804', '4'),
	(19, 3, '0904068602', '5');
/*!40000 ALTER TABLE `tb_dosen_penguji` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_jenis_keluar
CREATE TABLE IF NOT EXISTS `tb_jenis_keluar` (
  `id_jenis_keluar` int(10) NOT NULL,
  `nm_jenis_keluar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenis_keluar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table siakad_adhiguna_1.tb_jenis_keluar: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_jenis_keluar` DISABLE KEYS */;
REPLACE INTO `tb_jenis_keluar` (`id_jenis_keluar`, `nm_jenis_keluar`) VALUES
	(0, 'Lainnya'),
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
  `alamat` mediumtext,
  `no_hp` mediumtext,
  `email` mediumtext,
  `s1_nm_sklh` varchar(100) DEFAULT NULL,
  `s1_jur` varchar(50) DEFAULT NULL,
  `s1_thn_lulus` varchar(4) DEFAULT NULL,
  `s1_kota` varchar(50) DEFAULT NULL,
  `s2_nm_sklh` mediumtext,
  `s2_jur` varchar(50) DEFAULT NULL,
  `s2_thn_lulus` varchar(4) DEFAULT NULL,
  `s2_kota` varchar(50) DEFAULT NULL,
  `s3_nm_sklh` mediumtext,
  `s3_jur` varchar(50) DEFAULT NULL,
  `s3_thn_lulus` varchar(4) DEFAULT NULL,
  `s3_kota` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`),
  KEY `FK_tb_kariawan_agama` (`agama`),
  CONSTRAINT `FK_tb_kariawan_agama` FOREIGN KEY (`agama`) REFERENCES `agama` (`id_agama`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table siakad_adhiguna_1.tb_kariawan: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_kariawan` DISABLE KEYS */;
REPLACE INTO `tb_kariawan` (`nik`, `nama`, `jen_kel`, `tmp_lahir`, `tgl_lahir`, `agama`, `jabatan`, `alamat`, `no_hp`, `email`, `s1_nm_sklh`, `s1_jur`, `s1_thn_lulus`, `s1_kota`, `s2_nm_sklh`, `s2_jur`, `s2_thn_lulus`, `s2_kota`, `s3_nm_sklh`, `s3_jur`, `s3_thn_lulus`, `s3_kota`) VALUES
	('140201001', 'Sukardi, S.Kom, M.Kom', 'L', 'Lamongan', '2016-04-20', 1, 'Wakil Ketua 1 Bid. Akademik', 'Jl. Cendrawasih', '08', 'sukarvi@gmail.com', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
	('140201023', 'Mus Aidah, S.Pd, MM', 'P', 'Palu', '2016-04-20', 1, 'Ketua', 'Jl. Slamet Riyadi', '09', 'mus@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tb_kariawan` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_kelas_dosen
CREATE TABLE IF NOT EXISTS `tb_kelas_dosen` (
  `id_kelas_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas_kuliah` int(11) NOT NULL DEFAULT '0',
  `id_dosen` varchar(50) NOT NULL DEFAULT '0',
  `r_t_muka` int(11) NOT NULL,
  `t_muka` int(11) NOT NULL,
  `status_upload` enum('Y','N') NOT NULL DEFAULT 'N',
  `validasi_baak` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_kelas_dosen`),
  KEY `FK__tb_mhs_data_krs` (`id_kelas_kuliah`),
  KEY `FK_tb_kelas_dosen_tb_dosen` (`id_dosen`),
  CONSTRAINT `FK_tb_kelas_dosen_tb_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `tb_dosen` (`nidn`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_kelas_dosen_tb_kelas_kul` FOREIGN KEY (`id_kelas_kuliah`) REFERENCES `tb_kelas_kul` (`id_kelas`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1 COMMENT='get data dari tb_mhs_data_krs berdasarkan kurikulum yang diambil dari field id_kelas kemudian isi tabel ini';

-- Dumping data for table siakad_adhiguna_1.tb_kelas_dosen: ~60 rows (approximately)
/*!40000 ALTER TABLE `tb_kelas_dosen` DISABLE KEYS */;
REPLACE INTO `tb_kelas_dosen` (`id_kelas_dosen`, `id_kelas_kuliah`, `id_dosen`, `r_t_muka`, `t_muka`, `status_upload`, `validasi_baak`) VALUES
	(1, 1403, '0904068602', 16, 0, 'N', 'Y'),
	(2, 1404, '0904068602', 16, 0, 'N', 'Y'),
	(3, 1406, '0915057201', 16, 0, 'N', 'Y'),
	(4, 1407, '0915057201', 16, 0, 'N', 'Y'),
	(5, 1409, '0901037902', 16, 0, 'N', 'Y'),
	(6, 1410, '0901037902', 16, 0, 'N', 'Y'),
	(7, 1412, '0918127802', 16, 0, 'N', 'Y'),
	(8, 1413, '0918127802', 16, 0, 'N', 'Y'),
	(9, 1415, '0925078403', 16, 0, 'N', 'Y'),
	(10, 1416, '0925078403', 16, 0, 'N', 'Y'),
	(11, 1418, '0904068602', 16, 0, 'N', 'Y'),
	(12, 1419, '0904068602', 16, 0, 'N', 'Y'),
	(13, 1421, '0918067301', 16, 0, 'N', 'Y'),
	(14, 1422, '0918067301', 16, 0, 'N', 'Y'),
	(15, 1424, '0918067301', 16, 0, 'N', 'Y'),
	(16, 1425, '0918067301', 16, 0, 'N', 'Y'),
	(17, 1427, '0912058002', 16, 0, 'N', 'Y'),
	(18, 1430, '912058002', 16, 0, 'N', 'Y'),
	(19, 1428, '0912058002', 16, 0, 'N', 'Y'),
	(20, 1431, '0912058002', 16, 0, 'N', 'Y'),
	(21, 1405, '0904068602', 16, 0, 'N', 'N'),
	(22, 1408, '0915057201', 16, 0, 'N', 'N'),
	(23, 1411, '0901037902', 16, 0, 'N', 'N'),
	(24, 1414, '0918127802', 16, 0, 'N', 'N'),
	(25, 1417, '0925078403', 16, 0, 'N', 'N'),
	(26, 1420, '0904068602', 16, 0, 'N', 'N'),
	(27, 1423, '0918067301', 16, 0, 'N', 'N'),
	(28, 1426, '0918067301', 16, 0, 'N', 'N'),
	(29, 1429, '0912058002', 16, 0, 'N', 'N'),
	(30, 1432, '912058002', 16, 0, 'N', 'N'),
	(31, 1515, '0913107503', 16, 0, 'N', 'Y'),
	(32, 1516, '0913107503', 16, 0, 'N', 'Y'),
	(33, 1517, '0913107503', 16, 0, 'N', 'Y'),
	(34, 1519, '0915057201', 16, 0, 'N', 'Y'),
	(35, 1520, '0915057201', 16, 0, 'N', 'Y'),
	(36, 1521, '0915057201', 16, 0, 'N', 'Y'),
	(37, 1523, '0901037902', 16, 0, 'N', 'Y'),
	(38, 1524, '0901037902', 16, 0, 'N', 'Y'),
	(40, 1527, '0918127802', 16, 0, 'N', 'Y'),
	(41, 1528, '0918127802', 16, 0, 'N', 'Y'),
	(42, 1529, '0918127802', 16, 0, 'N', 'Y'),
	(43, 1531, '0925078403', 16, 0, 'N', 'Y'),
	(44, 1532, '0925078403', 16, 0, 'N', 'Y'),
	(45, 1533, '0925078403', 16, 0, 'N', 'Y'),
	(46, 1535, '0904068602', 16, 0, 'N', 'Y'),
	(47, 1536, '0904068602', 16, 0, 'N', 'Y'),
	(48, 1537, '0904068602', 16, 0, 'N', 'Y'),
	(49, 1539, '0918067301', 16, 0, 'N', 'Y'),
	(50, 1545, '0918067301', 16, 0, 'N', 'Y'),
	(51, 1540, '0918067301', 16, 0, 'N', 'Y'),
	(52, 1546, '0918067301', 16, 0, 'N', 'Y'),
	(54, 1547, '0918067301', 16, 0, 'N', 'Y'),
	(55, 1550, '0912058002', 16, 0, 'N', 'Y'),
	(56, 1555, '0912058002', 16, 0, 'N', 'Y'),
	(57, 1551, '0912058002', 16, 0, 'N', 'Y'),
	(58, 1553, '0912058002', 16, 0, 'N', 'Y'),
	(60, 1557, '0912058002', 16, 0, 'N', 'Y'),
	(61, 1556, '0912058002', 16, 0, 'N', 'Y'),
	(62, 1525, '0901037902', 16, 0, 'N', 'Y'),
	(63, 1541, '0918067301', 16, 0, 'N', 'Y');
/*!40000 ALTER TABLE `tb_kelas_dosen` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_kelas_kul
CREATE TABLE IF NOT EXISTS `tb_kelas_kul` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kelas` varchar(50) NOT NULL DEFAULT '0',
  `id_matkul` varchar(50) NOT NULL DEFAULT '0',
  `id_kurikulum` int(11) NOT NULL DEFAULT '0',
  `id_prodi` int(11) DEFAULT '0',
  `status_upload` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_kelas`),
  KEY `FK_tb_kelas_kul_tb_matkul` (`id_matkul`),
  KEY `FK_tb_kelas_kul_tb_kurikulum` (`id_kurikulum`),
  KEY `FK_tb_kelas_kul_tb_prodi` (`id_prodi`),
  CONSTRAINT `FK_tb_kelas_kul_tb_kurikulum` FOREIGN KEY (`id_kurikulum`) REFERENCES `tb_kurikulum` (`id_kurikulum`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_kelas_kul_tb_mk_kurikulum` FOREIGN KEY (`id_matkul`) REFERENCES `tb_mk_kurikulum` (`kode_mk`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_kelas_kul_tb_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1626 DEFAULT CHARSET=latin1 COMMENT='get prodi dan get mata kuliah berdasarkan kurikulum sebelum memasukan data, || seharusnya bukan id_mk_kur bukan id_matkul di tabel mk_kurikulum';

-- Dumping data for table siakad_adhiguna_1.tb_kelas_kul: ~208 rows (approximately)
/*!40000 ALTER TABLE `tb_kelas_kul` DISABLE KEYS */;
REPLACE INTO `tb_kelas_kul` (`id_kelas`, `nm_kelas`, `id_matkul`, `id_kurikulum`, `id_prodi`, `status_upload`) VALUES
	(1397, 'TI.1.1', 'ST105IN3', 10, 55201, 'N'),
	(1398, 'TI.1.2', 'ST105IN3', 10, 55201, 'N'),
	(1399, 'TI.1.3', 'ST105IN3', 10, 55201, 'N'),
	(1400, 'SI.1.1', 'ST105IN3', 9, 57201, 'N'),
	(1401, 'SI.1.2', 'ST105IN3', 9, 57201, 'N'),
	(1402, 'TI.1.1', 'ST121UT3', 10, 55201, 'N'),
	(1403, 'SI.I.1', 'ST101PK2', 9, 57201, 'N'),
	(1404, 'SI.I.2', 'ST101PK2', 9, 57201, 'N'),
	(1405, 'SI.I.3', 'ST101PK2', 9, 57201, 'N'),
	(1406, 'SI.I.1', 'ST107IN3', 9, 57201, 'N'),
	(1407, 'SI.I.2', 'ST107IN3', 9, 57201, 'N'),
	(1408, 'SI.I.3', 'ST107IN3', 9, 57201, 'N'),
	(1409, 'SI.I.1', 'ST105IN3', 9, 57201, 'N'),
	(1410, 'SI.I.2', 'ST105IN3', 9, 57201, 'N'),
	(1411, 'SI.I.3', 'ST105IN3', 9, 57201, 'N'),
	(1412, 'SI.I.1', 'ST110IN2', 9, 57201, 'N'),
	(1413, 'SI.I.2', 'ST110IN2', 9, 57201, 'N'),
	(1414, 'SI.I.3', 'ST110IN2', 9, 57201, 'N'),
	(1415, 'SI.I.1', 'ST121UT3', 9, 57201, 'N'),
	(1416, 'SI.I.2', 'ST121UT3', 9, 57201, 'N'),
	(1417, 'SI.I.3', 'ST121UT3', 9, 57201, 'N'),
	(1418, 'SI.I.1', 'ST125UT3', 9, 57201, 'N'),
	(1419, 'SI.I.2', 'ST125UT3', 9, 57201, 'N'),
	(1420, 'SI.I.3', 'ST125UT3', 9, 57201, 'N'),
	(1421, 'SI.I.1', 'ST118UT2', 9, 57201, 'N'),
	(1422, 'SI.I.2', 'ST118UT2', 9, 57201, 'N'),
	(1423, 'SI.I.3', 'ST118UT2', 9, 57201, 'N'),
	(1424, 'SI.I.1', 'ST164UT1', 9, 57201, 'N'),
	(1425, 'SI.I.2', 'ST164UT1', 9, 57201, 'N'),
	(1426, 'SI.I.3', 'ST164UT1', 9, 57201, 'N'),
	(1427, 'SI.I.1', 'ST120UT2', 9, 57201, 'N'),
	(1428, 'SI.I.2', 'ST120UT2', 9, 57201, 'N'),
	(1429, 'SI.I.3', 'ST120UT2', 9, 57201, 'N'),
	(1430, 'SI.I.1', 'ST165UT1', 9, 57201, 'N'),
	(1431, 'SI.I.2', 'ST165UT1', 9, 57201, 'N'),
	(1432, 'SI.I.3', 'ST165UT1', 9, 57201, 'N'),
	(1433, 'SI.III.1', 'S133UT3', 9, 57201, 'N'),
	(1434, 'SI.III.2', 'S133UT3', 9, 57201, 'N'),
	(1435, 'SI.III.3', 'S133UT3', 9, 57201, 'N'),
	(1436, 'SI.III.1', 'S123UT3', 9, 57201, 'N'),
	(1437, 'SI.III.2', 'S123UT3', 9, 57201, 'N'),
	(1438, 'SI.III.3', 'S123UT3', 9, 57201, 'N'),
	(1439, 'SI.III.1', 'S124UT3', 9, 57201, 'N'),
	(1440, 'SI.III.2', 'S124UT3', 9, 57201, 'N'),
	(1441, 'SI.III.3', 'S124UT3', 9, 57201, 'N'),
	(1442, 'SI.III.1', 'S163ML2', 9, 57201, 'N'),
	(1443, 'SI.III.2', 'S163ML2', 9, 57201, 'N'),
	(1444, 'SI.III.3', 'S163ML2', 9, 57201, 'N'),
	(1445, 'SI.III.1', 'ST142UT2', 9, 57201, 'N'),
	(1446, 'SI.III.2', 'ST142UT2', 9, 57201, 'N'),
	(1447, 'SI.III.3', 'ST142UT2', 9, 57201, 'N'),
	(1448, 'SI.III.1', 'ST174UT1', 9, 57201, 'N'),
	(1449, 'SI.III.2', 'ST174UT1', 9, 57201, 'N'),
	(1450, 'SI.III.3', 'ST174UT1', 9, 57201, 'N'),
	(1451, 'SI.III.1', 'ST113IN3', 9, 57201, 'N'),
	(1452, 'SI.III.2', 'ST113IN3', 9, 57201, 'N'),
	(1453, 'SI.III.3', 'ST113IN3', 9, 57201, 'N'),
	(1454, 'SI.III.1', 'ST126UT2', 9, 57201, 'N'),
	(1455, 'SI.III.2', 'ST126UT2', 9, 57201, 'N'),
	(1456, 'SI.III.3', 'ST126UT2', 9, 57201, 'N'),
	(1457, 'SI.III.1', 'ST166UT1', 9, 57201, 'N'),
	(1458, 'SI.III.2', 'ST166UT1', 9, 57201, 'N'),
	(1459, 'SI.III.3', 'ST166UT1', 9, 57201, 'N'),
	(1460, 'SI.III.1', 'ST151UT2', 9, 57201, 'N'),
	(1461, 'SI.III.2', 'ST151UT2', 9, 57201, 'N'),
	(1462, 'SI.III.3', 'ST151UT2', 9, 57201, 'N'),
	(1463, 'SI.III.1', 'ST181UT1', 9, 57201, 'N'),
	(1464, 'SI.III.2', 'ST181UT1', 9, 57201, 'N'),
	(1465, 'SI.III.3', 'ST181UT1', 9, 57201, 'N'),
	(1466, 'SI.V.1', 'S132UT2', 9, 57201, 'N'),
	(1468, 'SI.V.2', 'S132UT2', 9, 57201, 'N'),
	(1469, 'SI.V.3', 'S132UT2', 9, 57201, 'N'),
	(1471, 'SI.V.1', 'S166UT1', 9, 57201, 'N'),
	(1472, 'SI.V.2', 'S166UT1', 9, 57201, 'N'),
	(1473, 'SI.V.3', 'S166UT1', 9, 57201, 'N'),
	(1474, 'SI.V.1', 'S134UT2', 9, 57201, 'N'),
	(1475, 'SI.V.2', 'S134UT2', 9, 57201, 'N'),
	(1476, 'SI.V.3', 'S134UT2', 9, 57201, 'N'),
	(1477, 'SI.V.1', 'S172UT1', 9, 57201, 'N'),
	(1478, 'SI.V.2', 'S172UT1', 9, 57201, 'N'),
	(1479, 'SI.V.3', 'S172UT1', 9, 57201, 'N'),
	(1480, 'SI.V.1', 'S149UT2', 9, 57201, 'N'),
	(1481, 'SI.V.2', 'S149UT2', 9, 57201, 'N'),
	(1482, 'SI.V.3', 'S149UT2', 9, 57201, 'N'),
	(1483, 'SI.V.1', 'S137UT2', 9, 57201, 'N'),
	(1484, 'SI.V.2', 'S137UT2', 9, 57201, 'N'),
	(1485, 'SI.V.3', 'S137UT2', 9, 57201, 'N'),
	(1486, 'SI.V.1', 'S168UT1', 9, 57201, 'N'),
	(1487, 'SI.V.2', 'S168UT1', 9, 57201, 'N'),
	(1488, 'SI.V.3', 'S168UT1', 9, 57201, 'N'),
	(1489, 'SI.V.1', 'S143UT2', 9, 57201, 'N'),
	(1490, 'SI.V.2', 'S143UT2', 9, 57201, 'N'),
	(1491, 'SI.V.3', 'S143UT2', 9, 57201, 'N'),
	(1492, 'SI.V.1', 'ST116IN2', 9, 57201, 'N'),
	(1493, 'SI.V.2', 'ST116IN2', 9, 57201, 'N'),
	(1494, 'SI.V.3', 'ST116IN2', 9, 57201, 'N'),
	(1495, 'SI.V.3', 'ST116IN2', 9, 57201, 'N'),
	(1496, 'SI.V.1', 'ST129UT2', 9, 57201, 'N'),
	(1497, 'SI.V.2', 'ST129UT2', 9, 57201, 'N'),
	(1498, 'SI.V.3', 'ST129UT2', 9, 57201, 'N'),
	(1499, 'SI.V.1', 'ST168UT1', 9, 57201, 'N'),
	(1501, 'SI.V.2', 'ST168UT1', 9, 57201, 'N'),
	(1502, 'SI.V.3', 'ST168UT1', 9, 57201, 'N'),
	(1503, 'SI.V.1', 'ST128UT3', 9, 57201, 'N'),
	(1504, 'SI.V.3', 'ST128UT3', 9, 57201, 'N'),
	(1505, 'SI.V.2', 'ST128UT3', 9, 57201, 'N'),
	(1506, 'SI.VII.1', 'S147UT2', 9, 57201, 'N'),
	(1507, 'SI.VII.1', 'S170UT1', 9, 57201, 'N'),
	(1508, 'SI.VII.2', 'S147UT2', 9, 57201, 'N'),
	(1509, 'SI.VII.2', 'S170UT1', 9, 57201, 'N'),
	(1510, 'SI.VII.1', 'S144UT3', 9, 57201, 'N'),
	(1511, 'SI.VII.2', 'S144UT3', 9, 57201, 'N'),
	(1512, 'SI.VII.1', 'ST161ML2', 9, 57201, 'N'),
	(1513, 'SI.VII.2', 'ST161ML2', 9, 57201, 'N'),
	(1515, 'TI.I.1', 'ST101IN2', 10, 55201, 'N'),
	(1516, 'TI.I.2', 'ST101IN2', 10, 55201, 'N'),
	(1517, 'TI.I.3', 'ST101IN2', 10, 55201, 'N'),
	(1519, 'TI.I.1', 'ST107IN3', 10, 55201, 'N'),
	(1520, 'TI.I.2', 'ST107IN3', 10, 55201, 'N'),
	(1521, 'TI.I.3', 'ST107IN3', 10, 55201, 'N'),
	(1523, 'TI.I.1', 'ST105IN3', 10, 55201, 'N'),
	(1524, 'TI.I.2', 'ST105IN3', 10, 55201, 'N'),
	(1525, 'TI.I.3', 'ST105IN3', 10, 55201, 'N'),
	(1527, 'TI.I.1', 'ST110IN2', 10, 55201, 'N'),
	(1528, 'TI.I.2', 'ST110IN2', 10, 55201, 'N'),
	(1529, 'TI.I.3', 'ST110IN2', 10, 55201, 'N'),
	(1531, 'TI.I.1', 'ST121UT3', 10, 55201, 'N'),
	(1532, 'TI.I.2', 'ST121UT3', 10, 55201, 'N'),
	(1533, 'TI.I.3', 'ST121UT3', 10, 55201, 'N'),
	(1535, 'TI.I.1', 'ST113PK3', 10, 55201, 'N'),
	(1536, 'TI.I.2', 'ST113PK3', 10, 55201, 'N'),
	(1537, 'TI.I.3', 'ST113PK3', 10, 55201, 'N'),
	(1539, 'TI.I.1', 'ST118UT2', 10, 55201, 'N'),
	(1540, 'TI.I.2', 'ST118UT2', 10, 55201, 'N'),
	(1541, 'TI.I.3', 'ST118UT2', 10, 55201, 'N'),
	(1545, 'TI.I.1', 'ST164UT1', 10, 55201, 'N'),
	(1546, 'TI.I.2', 'ST164UT1', 10, 55201, 'N'),
	(1547, 'TI.I.3', 'ST164UT1', 10, 55201, 'N'),
	(1550, 'TI.I.1', 'ST120UT2', 10, 55201, 'N'),
	(1551, 'TI.I.2', 'ST120UT2 ', 10, 55201, 'N'),
	(1553, 'TI.I.3', 'ST120UT2', 10, 55201, 'N'),
	(1555, 'TI.I.1', 'ST165UT1', 10, 55201, 'N'),
	(1556, 'TI.I.2', 'ST165UT1', 10, 55201, 'N'),
	(1557, 'TI.I.3', 'ST165UT1', 10, 55201, 'N'),
	(1558, 'TI.III.1', 'T124UT3', 10, 55201, 'N'),
	(1559, 'TI.III.2', 'T124UT3', 10, 55201, 'N'),
	(1560, 'TI.III.3', 'T124UT3', 10, 55201, 'N'),
	(1561, 'TI.III.1', 'ST327KK3', 10, 55201, 'N'),
	(1562, 'TI.III.2', 'ST327KK3', 10, 55201, 'N'),
	(1563, 'TI.III.3', 'ST327KK3', 10, 55201, 'N'),
	(1564, 'TI.III.1', 'T137UT2', 10, 55201, 'N'),
	(1565, 'TI.III.2', 'T137UT2', 10, 55201, 'N'),
	(1566, 'TI.III.3', 'T137UT2', 10, 55201, 'N'),
	(1567, 'TI.III.1', 'T147UT2', 10, 55201, 'N'),
	(1568, 'TI.III.2', 'T147UT2', 10, 55201, 'N'),
	(1569, 'TI.III.3', 'T147UT2', 10, 55201, 'N'),
	(1570, 'TI.III.1', 'T 171 UT1', 10, 55201, 'N'),
	(1572, 'TI.III.2', 'T 171 UT1', 10, 55201, 'N'),
	(1573, 'TI.III.3', 'T 171 UT1', 10, 55201, 'N'),
	(1574, 'TI.III.1', 'ST113IN3', 10, 55201, 'N'),
	(1575, 'TI.III.2', 'ST113IN3', 10, 55201, 'N'),
	(1576, 'TI.III.3', 'ST113IN3', 10, 55201, 'N'),
	(1578, 'TI.III.1', 'ST126UT2', 10, 55201, 'N'),
	(1579, 'TI.III.2', 'ST126UT2', 10, 55201, 'N'),
	(1580, 'TI.III.3', 'ST126UT2', 10, 55201, 'N'),
	(1581, 'TI.III.1', 'ST151UT2', 10, 55201, 'N'),
	(1582, 'TI.III.1', 'ST181UT1', 10, 55201, 'N'),
	(1583, 'TI.III.2', 'ST151UT2', 10, 55201, 'N'),
	(1584, 'TI.III.2', 'ST181UT1', 10, 55201, 'N'),
	(1586, 'TI.III.3', 'ST151UT2', 10, 55201, 'N'),
	(1587, 'TI.III.3', 'ST181UT1', 10, 55201, 'N'),
	(1589, 'TI.V.1', 'ST440KB2', 10, 55201, 'N'),
	(1590, 'TI.V.1', 'T153UT3', 10, 55201, 'N'),
	(1591, 'TI.V.1', 'T144UT2', 10, 55201, 'N'),
	(1592, 'TI.V.1', 'T180UT1', 10, 55201, 'N'),
	(1593, 'TI.V.1', 'T149UT2', 10, 55201, 'N'),
	(1594, 'TI.V.1', 'ST116IN2', 10, 55201, 'N'),
	(1595, 'TI.V.1', 'ST129UT2', 10, 55201, 'N'),
	(1596, 'TI.V.1', 'T134UT2', 10, 55201, 'N'),
	(1597, 'TI.V.1', 'T655KB3', 10, 55201, 'N'),
	(1598, 'TI.V.2', 'T134UT2', 10, 55201, 'N'),
	(1599, 'TI.V.2', 'ST440KB2', 10, 55201, 'N'),
	(1600, 'TI.V.2', 'T153UT3', 10, 55201, 'N'),
	(1601, 'TI.V.2', 'T144UT2', 10, 55201, 'N'),
	(1602, 'TI.V.2', 'T149UT2', 10, 55201, 'N'),
	(1603, 'TI.V.2', 'T180UT1', 10, 55201, 'N'),
	(1604, 'TI.V.2', 'ST116IN2', 10, 55201, 'N'),
	(1605, 'TI.V.2', 'ST129UT2', 10, 55201, 'N'),
	(1606, 'TI.V.2', 'T655KB3', 10, 55201, 'N'),
	(1607, 'TI.V.3', 'T134UT2', 10, 55201, 'N'),
	(1608, 'TI.V.3', 'ST440KB2', 10, 55201, 'N'),
	(1609, 'TI.V.3', 'T153UT3', 10, 55201, 'N'),
	(1610, 'TI.V.3', 'T144UT2', 10, 55201, 'N'),
	(1611, 'TI.V.3', 'T149UT2', 10, 55201, 'N'),
	(1612, 'TI.V.3', 'T180UT1', 10, 55201, 'N'),
	(1613, 'TI.V.3', 'ST129UT2', 10, 55201, 'N'),
	(1614, 'TI.V.3', 'T655KB3', 10, 55201, 'N'),
	(1615, 'TI.VII.1', 'T184ML1', 10, 55201, 'N'),
	(1616, 'TI.VII.1', 'ST161ML2', 10, 55201, 'N'),
	(1617, 'TI.VII.1', 'ST159UT3', 10, 55201, 'N'),
	(1618, 'TI.VII.2', 'T184ML1', 10, 55201, 'N'),
	(1619, 'TI.VII.2', 'ST161ML2', 10, 55201, 'N'),
	(1620, 'TI.VII.2', 'ST159UT3', 10, 55201, 'N'),
	(1621, 'TI.VII.3', 'T184ML1', 10, 55201, 'N'),
	(1622, 'TI.VII.3', 'ST161ML2', 10, 55201, 'N'),
	(1623, 'TI.VII.3', 'ST159UT3', 10, 55201, 'N'),
	(1624, 'SI.VII.1', 'ST159UT3', 9, 57201, 'N'),
	(1625, 'SI.VII.2', 'ST159UT3', 9, 57201, 'N');
/*!40000 ALTER TABLE `tb_kelas_kul` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_kurikulum
CREATE TABLE IF NOT EXISTS `tb_kurikulum` (
  `id_kurikulum` int(10) NOT NULL AUTO_INCREMENT,
  `nm_kurikulum` varchar(50) NOT NULL DEFAULT '0',
  `ta` varchar(50) NOT NULL DEFAULT '0',
  `kd_prodi` int(11) NOT NULL DEFAULT '0',
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `status_upload` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_kurikulum`),
  KEY `FK_tb_kurikulum_tb_prodi` (`kd_prodi`),
  CONSTRAINT `FK_tb_kurikulum_tb_prodi` FOREIGN KEY (`kd_prodi`) REFERENCES `tb_prodi` (`id_prodi`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table siakad_adhiguna_1.tb_kurikulum: ~6 rows (approximately)
/*!40000 ALTER TABLE `tb_kurikulum` DISABLE KEYS */;
REPLACE INTO `tb_kurikulum` (`id_kurikulum`, `nm_kurikulum`, `ta`, `kd_prodi`, `status`, `status_upload`) VALUES
	(5, 'STMIK Adhi Guna SI-20151', '20151', 57201, '0', 'Y'),
	(6, 'STMIK Adhi Guna TI-20151', '20151', 55201, '0', 'Y'),
	(7, 'STMIK Adhi Guna TI-20152', '20152', 55201, '0', 'Y'),
	(8, 'STMIK Adhi Guna SI-20152', '20152', 57201, '0', 'Y'),
	(9, 'STMIK Adhi Guna SI-20161', '20161', 57201, '1', 'N'),
	(10, 'STMIK Adhi Guna TI-20161', '20161', 55201, '1', 'N');
/*!40000 ALTER TABLE `tb_kurikulum` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_mata_kuliah
CREATE TABLE IF NOT EXISTS `tb_mata_kuliah` (
  `kode_mk` varchar(50) NOT NULL,
  `nm_mk` text NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) unsigned NOT NULL,
  `status_upload` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`kode_mk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Selesai Input';

-- Dumping data for table siakad_adhiguna_1.tb_mata_kuliah: ~222 rows (approximately)
/*!40000 ALTER TABLE `tb_mata_kuliah` DISABLE KEYS */;
REPLACE INTO `tb_mata_kuliah` (`kode_mk`, `nm_mk`, `sks`, `semester`, `status_upload`) VALUES
	('S 112 IN2', 'ACCOUNTING PROGRAMMING', 2, 4, 'Y'),
	('S 130 UT2', 'PEMROGRAMAN BERORIENTASI OBJEK LANJUT', 2, 0, 'Y'),
	('S 131 UT2', 'PEMROGRAMAN VISUAL', 2, 0, 'Y'),
	('S 135 UT2', 'PEMROGRAMAN WEB LANJUT', 2, 0, 'Y'),
	('S 138 UT2', 'PEMROGRAMAN JAVA LANJUT', 2, 0, 'Y'),
	('S 164 UT1', 'PRAK PEMROG BERORIENTASI OBJEK LANJUT', 1, 5, 'Y'),
	('S 165 UT1', 'PRAKTIKUM PEMROGRAMAN VISUAL', 1, 0, 'Y'),
	('S 167 UT1', 'PRAKTIKUM PEMROGRAMAN WEB LANJUT', 1, 0, 'Y'),
	('S 169 UT1', 'PRAKTIKUM PEMROGRAMAN JAVA LANJUT', 1, 0, 'Y'),
	('S 171 IN1', 'PRAKTIKUM ACCOUNTING PROGRAMMING', 1, 4, 'Y'),
	('S112IN2', 'ACCOUNTING PROGRAMMING', 2, 4, 'Y'),
	('S123UT3', 'DASAR AKUNTANSI', 3, 0, 'Y'),
	('S124UT3', 'MANAJEMEN PERBANKAN', 3, 0, 'Y'),
	('S130UT2', 'PEMROGRAMAN BERORIENTASI OBJEK LANJUT', 2, 0, 'Y'),
	('S131UT2', 'PEMROGRAMAN VISUAL', 2, 0, 'Y'),
	('S132UT2', 'PEMROGRAMAN VISUAL LANJUT', 3, 0, 'Y'),
	('S133UT3', 'PENGANTAR SISTEM INFORMASI', 3, 0, 'Y'),
	('S134UT2', 'PEMROGRAMAN WEB', 3, 0, 'Y'),
	('S135UT2', 'PEMROGRAMAN WEB LANJUT', 2, 0, 'Y'),
	('S137UT2', 'PEMROGRAMAN JAVA', 3, 0, 'Y'),
	('S138UT2', 'PEMROGRAMAN JAVA LANJUT', 2, 0, 'Y'),
	('S143UT2', 'ANALISIS DAN DESAIN SISTEM LANJUT', 3, 0, 'Y'),
	('S144UT3', 'E-COMMERCE', 3, 0, 'Y'),
	('S147UT2', 'KEAMANAN SISTEM INFORMASI', 2, 0, 'Y'),
	('S149UT2', 'SISTEM PENDUKUNG KEPUTUSAN', 2, 0, 'Y'),
	('S163ML2', 'TEORI ORGANISASI', 2, 0, 'Y'),
	('S164UT1', 'PRAK PEMROG BERORIENTASI OBJEK LANJUT', 1, 5, 'Y'),
	('S165UT1', 'PRAKTIKUM PEMROGRAMAN VISUAL', 1, 0, 'Y'),
	('S166UT1', 'PRAKTIKUM PEMROGRAMAN VISUAL LAJUT', 1, 0, 'Y'),
	('S167UT1', 'PRAKTIKUM PEMROGRAMAN WEB LANJUT', 1, 0, 'Y'),
	('S168UT1', 'PRAKTIKUM PEMROGRAMAN JAVA', 1, 0, 'Y'),
	('S169UT1', 'PRAKTIKUM PEMROGRAMAN JAVA LANJUT', 1, 0, 'Y'),
	('S170UT1', 'PRAKTIKUM KEAMANAN SISTEM INFORMASI', 1, 0, 'Y'),
	('S171IN1', 'PRAKTIKUM ACCOUNTING PROGRAMMING', 1, 4, 'Y'),
	('S172UT1', 'PRAKTIKUM PEMROGRAMAN WEB', 1, 0, 'Y'),
	('S224KB3', 'SISTEM BASIS DATA', 3, 0, 'Y'),
	('S224PB2', 'SISTEM BASIS DATA', 4, 0, 'Y'),
	('S328KB3', 'PERANCANGAN BASIS DATA', 3, 0, 'Y'),
	('S329KK3', 'SISTEM INFORMASI MANAJEMEN', 3, 0, 'Y'),
	('S330KK3', 'AKUNTANSI', 3, 0, 'Y'),
	('S331KK2', 'MANAJEMEN SUMBER DAYA MANUSIA', 2, 0, 'Y'),
	('S332PB2', 'TEORI ORGANISASI UMUM', 2, 0, 'Y'),
	('S433KK2', 'ANALISIS DAN PERANC. SISTEM INFORMASI', 2, 0, 'Y'),
	('S434PB2', 'KOMUNIKASI BISNIS', 2, 0, 'Y'),
	('S435KB3', 'PEMROGRAMAN VISUAL FOXPRO 1', 3, 0, 'Y'),
	('S475KB3', 'PEMROGRAMAN VISUAL FOXPRO 1', 3, 0, 'Y'),
	('S545PB2', 'KOMPUTER DAN MASYARAKAT', 2, 0, 'Y'),
	('S546KK2', 'PENGOLAHAN DATA TERDISTRIBUSI', 2, 0, 'Y'),
	('S547KB3', 'PEMROGRAMAN VISUAL FOXPRO 2', 3, 0, 'Y'),
	('S548KK3', 'MANAJEMEN PROYEK SISTEM INFORMASI', 3, 0, 'Y'),
	('S549KK3', 'ANALISIS DAN PERANCANGAN SISTEMINFORMASI', 3, 0, 'Y'),
	('S650IK3', 'PEMROGRAMAN XBASE LANJUT', 3, 0, 'Y'),
	('S653IK2', 'TEKNOLOGI INFORMASI', 2, 0, 'Y'),
	('S656KB3', 'PEMROGRAMAN VISUAL FOXPRO 3', 3, 0, 'Y'),
	('S657KB3', 'REKAYASA SISTEM INFORMASI', 3, 0, 'Y'),
	('S756IK2', 'SISTEM PENDUKUNG KEPUTUSAN', 2, 0, 'Y'),
	('S759KK2', 'SISTEM PENUNJANG KEPUTUSAN', 2, 0, 'Y'),
	('ST 111 IN2', 'BAHASA INGGRIS 2', 2, 0, 'Y'),
	('ST 117 IN2', 'ETIKA PROFESI', 2, 0, 'Y'),
	('ST 119 UT2', 'LOGIKA INFORMATIKA', 3, 0, 'Y'),
	('ST 122 UT3', 'MATEMATIKA LANJUT', 3, 0, 'Y'),
	('ST 127 UT2', 'BASISDATA TERDISTRIBUSI', 2, 0, 'Y'),
	('ST 139 UT2', 'STRUKTUR DATA', 2, 0, 'Y'),
	('ST 140 UT2', 'RISET OPERASIONAL', 2, 0, 'Y'),
	('ST 141 UT2', 'ANALISA DAN DESAIN SISTEM', 2, 0, 'Y'),
	('ST 145 UT3', 'SISTEM BERKAS', 3, 0, 'Y'),
	('ST 146 UT2', 'PENGELOLAAN PERANGKAT KERAS', 2, 0, 'Y'),
	('ST 150 UT2', 'SIMULASI DAN MODELLING', 2, 0, 'Y'),
	('ST 157 UT3', 'METODE PENELITIAN', 3, 0, 'Y'),
	('ST 158 UT3', 'INTERPERSONAL SKILL', 3, 0, 'Y'),
	('ST 160 UT6', 'SKRIPSI', 6, 0, 'Y'),
	('ST 167 UT1', 'PRAKTIKUM BASISDATA TERDISTRIBUSI', 1, 0, 'Y'),
	('ST 172 UT1', 'PRAKTIKUM STRUKTUR DATA', 1, 0, 'Y'),
	('ST 173 UT1', 'PRAKTIKUM ANALISA DAN DESAIN SISTEM', 1, 0, 'Y'),
	('ST 177 UT1', 'PRAKTIKUM PENGELOLAAN PERANGKAT KERAS', 1, 0, 'Y'),
	('ST 182 UT1', 'PRAKTIKUM RISET OPERASIONAL', 1, 0, 'Y'),
	('ST101IN2', 'PENDIDIKAN AGAMA', 2, 1, 'Y'),
	('ST101PK2', 'PENDIDIKAN AGAMA', 2, 0, 'Y'),
	('ST102PK2', 'PENDIDIKAN AGAMA KRISTEN', 2, 0, 'Y'),
	('ST103PK2', 'PENDIDIKAN AGAMA KRISTEN KATOLIK', 2, 0, 'Y'),
	('ST104PK2', 'PENDIDIKAN AGAMA HINDU', 2, 0, 'Y'),
	('ST105IN3', 'PANCASILA DAN KEWARGANEGARAAN', 3, 1, 'Y'),
	('ST105PK2', 'PENDIDIKAN AGAMA BUDHA', 2, 0, 'Y'),
	('ST106IN2', 'FILSAFAT ILMU', 2, 0, 'Y'),
	('ST106PK2', 'PENDIDIKAN PANCASILA', 2, 0, 'Y'),
	('ST107IN3', 'STATISTIK DASAR', 3, 1, 'Y'),
	('ST107PK2', 'FILSAFAT ILMU PENGETAHUAN', 2, 0, 'Y'),
	('ST108IN3', 'STATISTIK LANJUT', 3, 2, 'Y'),
	('ST108PK2', 'BAHASA INGGRIS 1', 2, 0, 'Y'),
	('ST1098PK2', 'BAHASA INDONESIA', 2, 0, 'Y'),
	('ST109IN3', 'SISTEM INFORMASI MANAJEMEN', 3, 0, 'Y'),
	('ST109PK2', 'BAHASA INDONESIA', 2, 0, 'Y'),
	('ST110IN2', 'BAHASA INGGRIS I', 2, 1, 'Y'),
	('ST110KK2', 'STATISTIKA 1', 2, 0, 'Y'),
	('ST111IN2', 'BAHASA INGGRIS 2', 2, 0, 'Y'),
	('ST111KK2', 'LOGIKA DAN ALGORITMA', 2, 0, 'Y'),
	('ST112KK3', 'PAKET PROGRAM NIAGA', 3, 0, 'Y'),
	('ST113IN3', 'KEWIRAUSAHAAN DAN MANAJEMEN BISNIS', 3, 0, 'Y'),
	('ST113KK3', 'PENGANTAR TEKNOLOGI INFORMASI', 3, 0, 'Y'),
	('ST113PK3', 'PENGANTAR TEKNOLOGI INFORMASI', 3, 0, 'Y'),
	('ST114IN2', 'MANAJEMEN PROYEK', 2, 0, 'Y'),
	('ST114KK3', 'MATEMATIKA 1', 3, 0, 'Y'),
	('ST115IN2', 'BAHASA INDONESIA TATA TULIS KARYA ILMIAH', 2, 0, 'Y'),
	('ST116IN2', 'HUKUM PERBURUHAN', 2, 0, 'Y'),
	('ST117IN2', 'ETIKA PROFESI', 2, 0, 'Y'),
	('ST118UT2', 'ALGORITMA PEMROGRAMAN', 2, 1, 'Y'),
	('ST119UT2', 'LOGIKA INFORMATIKA', 3, 0, 'Y'),
	('ST120UT2 ', 'PAKET PROGRAM NIAGA ', 2, 0, 'Y'),
	('ST121UT3', 'MATEMATIKA DASAR', 3, 1, 'Y'),
	('ST122UT3', 'MATEMATIKA LANJUT', 3, 0, 'Y'),
	('ST125UT3', 'PENGANTAR TEKNOLOGI INFORMASI', 3, 1, 'Y'),
	('ST126UT2 ', 'BASIS DATA ', 2, 0, 'Y'),
	('ST128UT3 ', 'REKAYASA PERANGKAT LUNAK ', 3, 0, 'Y'),
	('ST129UT2', 'PEMROGRAMAN BERORIENTASI OBJEK', 3, 0, 'Y'),
	('ST142UT2', 'PENGANTAR JARINGAN KOMPUTER', 3, 0, 'Y'),
	('ST151UT2', 'SISTEM OPERASI', 3, 0, 'Y'),
	('ST159UT3', 'KULIAH KERJA LAPANGAN PROFESI', 3, 0, 'Y'),
	('ST161ML2 ', 'CYBER LAW ', 2, 0, 'Y'),
	('ST164UT1', 'PRAKTIKUM ALGORITMA PEMROGRAMAN', 1, 1, 'Y'),
	('ST165UT1', 'PRAKTIKUM PAKET PROGRAM NIAGA', 1, 1, 'Y'),
	('ST166UT1', 'PRAKTIKUM BASIS DATA', 1, 0, 'Y'),
	('ST168UT1', 'PRAKTIKUM PEMROGRAMAN BERORIENTASI OBJEK', 1, 0, 'Y'),
	('ST169UT1 ', 'PRAKTIKUM PEMROGRAMAN INTERNET ', 1, 0, 'Y'),
	('ST174UT1 ', 'PRAKTIKUM PENGANTAR JARINGAN ', 1, 0, 'Y'),
	('ST181UT1', 'PRAKTIKUM SISTEM OPERASI', 1, 0, 'Y'),
	('ST215PK2', 'PENDIDIKAN KEWARGANEGARAAN', 2, 0, 'Y'),
	('ST216PK2', 'BAHASA INGGRIS 2', 2, 0, 'Y'),
	('ST217KK2', 'MANAJEMEN UMUM', 2, 0, 'Y'),
	('ST218KK2', 'PENGANTAR SISTEM INFORMASI', 2, 0, 'Y'),
	('ST219KK2', 'STATISTIKA 2', 2, 0, 'Y'),
	('ST220KK2', 'ALJABAR LINEAR DAN MATRIKS', 2, 0, 'Y'),
	('ST222KK3', 'MATEMATIKA 2', 3, 0, 'Y'),
	('ST223KK3', 'LOGIKA INFORMATIKA', 3, 0, 'Y'),
	('ST224PB2', 'KEWIRAUSAHAAN', 2, 0, 'Y'),
	('ST325PB2', 'ETIKA PROFESI', 2, 0, 'Y'),
	('ST326KK3', 'PEMROGRAMAN TERSTRUKTUR', 3, 0, 'Y'),
	('ST327KK3', 'METODE NUMERIK', 3, 0, 'Y'),
	('ST436KB3', 'TEKNIK RISET OPERASIONAL', 3, 0, 'Y'),
	('ST437KB3', 'SRTUKTUR DATA', 3, 0, 'Y'),
	('ST437KK3', 'STRUKTUR DATA', 3, 0, 'Y'),
	('ST438KB3', 'SISTEM BERKAS', 3, 0, 'Y'),
	('ST438KK3', 'SISTEM BERKAS', 3, 0, 'Y'),
	('ST439KB3', 'SISTEM OPERASI', 3, 0, 'Y'),
	('ST440KB2', 'ORGANISASI DAN ARSITEKTUR KOMPUTER 1', 2, 0, 'Y'),
	('ST440KB3', 'ORGANISASI DAN ARSITEKTUR KOMPUTER', 3, 0, 'Y'),
	('ST541PB2', 'HUKUM PERBURUHAN', 2, 0, 'Y'),
	('ST542KB3', 'PERANGKAT KERAS', 3, 0, 'Y'),
	('ST543KK3', 'TEORI BAHASA DAN AUTOMATA', 3, 0, 'Y'),
	('ST544KB3', 'PEMROGRAMAN WEB 1', 3, 0, 'Y'),
	('ST646KK2', 'METODE PENELITIAN ILMIAH', 2, 0, 'Y'),
	('ST647PK2', 'FILSAFAT ILMU PENGETAHUAN', 2, 0, 'Y'),
	('ST648KB3', 'SIMULASI DAN MODELLING', 3, 0, 'Y'),
	('ST649BB2', 'INTERPERSONAL SKILL', 2, 0, 'Y'),
	('ST649KK2', 'HUKUM PERJANJIAN PERBURUHAN', 2, 0, 'Y'),
	('ST650BB2', 'INTERPERSONAL SKIL', 2, 0, 'Y'),
	('ST650KB2', 'SIMULASI DAN MODELLING', 2, 0, 'Y'),
	('ST651IK3', 'REKAYASA PERANGKAT LUNAK', 3, 0, 'Y'),
	('ST651KB2', 'SIMULASI DAN MODELLING', 2, 0, 'Y'),
	('ST651KK3', 'INTERNET DAN E-COMMERCE', 3, 0, 'Y'),
	('ST652IK3', 'PEMROGRAMAN BERORIENTASI OBJECT', 3, 0, 'Y'),
	('ST652KB3', 'PEMROGRAMAN WEB 2', 3, 0, 'Y'),
	('ST652KK3', 'INTERNET DAN E-COMMERCE', 3, 0, 'Y'),
	('ST653KB3', 'PEMROGRAMAN WEB 2', 3, 0, 'Y'),
	('ST653PB3', 'METODE PENELITIAN ILMIAH', 3, 0, 'Y'),
	('ST654KB3', 'JARINGAN KOMPUTER', 3, 0, 'Y'),
	('ST654PB3', 'METODE PENELITIAN ILMIAH', 3, 0, 'Y'),
	('ST655KB3', 'JARINGAN KOMPUTER', 3, 0, 'Y'),
	('ST754IK2', 'INTERAKSI MANUSIA DAN KOMPUTER', 2, 0, 'Y'),
	('ST755IK3', 'KECERDASAN BUATAN', 3, 0, 'Y'),
	('ST757IK2', 'PKLP', 2, 0, 'Y'),
	('ST757KB3', 'INTERAKSI MANUSIA DAN KOMPUTER', 3, 0, 'Y'),
	('ST757KP2', 'PRAKTEK KERJA LAPANGAN PROFESIONAL', 2, 0, 'Y'),
	('ST758KB3', 'INTERAKSI MANUSIA DAN KOMPUTER', 3, 0, 'Y'),
	('ST760PB2', 'KEWIRAUSAHAAN', 2, 0, 'Y'),
	('ST761BB2', 'PRAKTEK KERJA LAPANGAN PROFESIONAL', 2, 0, 'Y'),
	('ST838TA6', 'PROPOSAL DAN SKRIPSI', 6, 0, 'Y'),
	('ST861PB6', 'PROPOSAL DAN SKRIPSI', 6, 0, 'Y'),
	('ST862PB6', 'PROPOSAL SKRIPSI', 6, 0, 'Y'),
	('T 138 UT2', 'JARINGAN KOMPUTER', 2, 0, 'Y'),
	('T 143 UT2', 'KEAMANAN JARINGAN KOMPUTER', 2, 0, 'Y'),
	('T 171 UT1', 'PRAKTIKUM JARINGAN KOMPUTER', 1, 0, 'Y'),
	('T 175 UT1', 'PRAKTIKUM KEAMANAN JARINGAN KOMPUTER', 1, 0, 'Y'),
	('T 179 UT1', 'PRAKTIKUM RANGKAIAN DIGITAL', 1, 0, 'Y'),
	('T 182 UT1', 'PRAKTIKUM ADM. SISTEM OPERASI', 1, 0, 'Y'),
	('T 183 UT1', 'PRAKTIKUM MIKROKONTROLLER', 1, 0, 'Y'),
	('T123UT2', 'METODE NUMERIK', 2, 3, 'Y'),
	('T124UT3', 'FISIKA DASAR', 3, 3, 'Y'),
	('T134UT2', 'PEMROGRAMAN INTERNET', 2, 5, 'Y'),
	('T137UT2', 'PEMROGRAMAN TERSTRUKTUR', 2, 3, 'Y'),
	('T144UT2', 'ADMINISTRASI JARINGAN KOMPUTER', 2, 5, 'Y'),
	('T147UT2', 'ELEKTRONIKA', 2, 3, 'Y'),
	('T148UT2', 'RANGKAIAN DIGITAL', 2, 4, 'Y'),
	('T149UT2', 'BAHASA RAKITAN', 2, 5, 'Y'),
	('T152UT2', 'ADM. SISTEM OPERASI', 2, 0, 'Y'),
	('T153UT3', 'TEORI BAHASA DAN AUTOMATA', 3, 5, 'Y'),
	('T154UT3', 'KECERDASAN BUATAN', 3, 7, 'Y'),
	('T155UT3', 'ORGANISASI DAN ARSITEKTUR KOMPUTER', 3, 0, 'Y'),
	('T156UT2', 'MIKROKONTROLLER', 2, 0, 'Y'),
	('T162UT2', 'JARINGAN NIRKABEL', 2, 7, 'Y'),
	('T163ML2', 'ROBOTIKA', 2, 7, 'Y'),
	('T169UT1 ', 'PRAKTIKUM PEMROGRAMAN INTERNET ', 1, 0, 'Y'),
	('T170UT1 ', 'PRAKTIKUM PEMROGRAMAN TERSTRUKTUR ', 1, 0, 'Y'),
	('T176UT1', 'PRAKTIKUM ADMINISTRASI JARINGAN KOMPUTER', 1, 5, 'Y'),
	('T178UT1 ', 'PRAKTIKUM ELEKTRONIKA ', 1, 0, 'Y'),
	('T180UT1 ', 'PRAKTIKUM BAHASA RAKITAN ', 1, 0, 'Y'),
	('T184ML1', 'PRAKTIKUM ROBOTIKA', 1, 7, 'Y'),
	('T328KK2', 'MATEMATIKA DISKRIT', 2, 0, 'Y'),
	('T329KB3', 'SISTEM BASIS DATA', 3, 0, 'Y'),
	('T330KB3', 'RANGKAIAN DIGITAL', 3, 0, 'Y'),
	('T331KB3', 'COMPUTER AIDED DESIGN', 3, 0, 'Y'),
	('T332KK3', 'FISIKA', 3, 0, 'Y'),
	('T433KK3', 'ANALISIS DAN DESAIN SISTEM', 3, 5, 'Y'),
	('T434KB3', 'ELEKTRONIKA', 3, 3, 'Y'),
	('T435KB3', 'PEMROGRAMAN ASSEMBLER', 3, 0, 'Y'),
	('T545PB2', 'PEMROGRAMAN DELPHI 1', 3, 0, 'Y'),
	('T546KB3', 'PENGOLAHAN CITRA DAN GIS', 3, 0, 'Y'),
	('T546KK2', 'PENGOLAHAN CITRA DAN GIS', 3, 0, 'Y'),
	('T547KB2', 'ORGANISASI DAN ARSITEKTUR KOMPUTER 2', 2, 0, 'Y'),
	('T548KK3', 'MICROPROCESSOR', 3, 0, 'Y'),
	('T655KB3', 'REKAYASA PERANGKAT LUNAK', 3, 5, 'Y'),
	('T656KB3', 'PEMROGRAMAN DELPHI 2', 3, 0, 'Y'),
	('T758KB3', 'WIRLESS AND MOBILE COMPUTING', 3, 7, 'Y');
/*!40000 ALTER TABLE `tb_mata_kuliah` ENABLE KEYS */;


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
  `status_upload` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`nim`),
  KEY `FK_tb_mhs_agama` (`agama`),
  KEY `FK_tb_mhs_tb_prodi` (`kd_prodi`),
  KEY `FK_tb_mhs_tb_status_mhs` (`status_mhs`),
  CONSTRAINT `FK_tb_mhs_agama` FOREIGN KEY (`agama`) REFERENCES `agama` (`id_agama`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_mhs_tb_prodi` FOREIGN KEY (`kd_prodi`) REFERENCES `tb_prodi` (`id_prodi`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_mhs_tb_status_mhs` FOREIGN KEY (`status_mhs`) REFERENCES `tb_status_mhs` (`id_status`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Selesai Input';

-- Dumping data for table siakad_adhiguna_1.tb_mhs: ~183 rows (approximately)
/*!40000 ALTER TABLE `tb_mhs` DISABLE KEYS */;
REPLACE INTO `tb_mhs` (`nim`, `nm_mhs`, `tpt_lhr`, `tgl_lahir`, `jenkel`, `agama`, `kelurahan`, `wilayah`, `nm_ibu`, `kd_prodi`, `tgl_masuk`, `smt_masuk`, `status_mhs`, `status_awal`, `email`, `status_upload`) VALUES
	('5520111189', 'Sofyan', 'Poloinggona', '2016-10-07', 'L', 1, '-', '999999', 's', 55201, '2016-10-07', '20161', 1, '1', NULL, 'Y'),
	('5520116001', 'Aaron Indrawan Arumpone', 'Wawopada', '1997-10-20', 'L', 2, 'JLN. Towua II No. 42 A', '99999', 'Yuksun Sirima', 55201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5520116002', 'Abd Rahman', 'Palu', '1994-04-18', 'L', 1, 'JL. Tanjung Karang No.32', '99999', 'Hj. Samiah', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116003', 'Abd Wahid', 'Pelawa', '1998-01-01', 'L', 1, 'Jl. TRANS SULAWESI DESA PELAWA KEC. PARIGI TENGAH', '99999', 'Warni', 55201, '2016-09-19', '20161', 1, '1', 'abdulwahidd048@gmail.com', 'Y'),
	('5520116004', 'Achsel Aldrian', 'baturube', '2016-08-30', 'L', 2, 'jln.morarena KM.4', '99999', 'EPINATS KAWALANGI', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116005', 'Agung Dwi Mulyadi', 'Palu', '1995-10-24', 'L', 1, 'BTN PUSKUD Blok H2/06', '99999', 'ASNIATY YUSUF', 55201, '2016-09-19', '20161', 1, '1', 'agungdwimulyadi24@gmail.com', 'Y'),
	('5520116006', 'Aldy Reinaldy', 'Wanagading', '1997-08-19', 'L', 1, 'JL. GARUDA 2', '99999', 'DWI WINARTI', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116007', 'Akbar', 'AMPANA', '1997-12-23', 'L', 1, 'JL, TG LAWAKA. KEL DONDO. KEC RATOLINDO', '99999', 'NINGSI N BALANGO', 55201, '2016-09-19', '20161', 1, '1', 'akbarmuzaki97@gmail.com', 'Y'),
	('5520116008', 'AlFitrah', 'Bambalamotu', '1997-08-10', 'P', 1, 'Bambalamotu', '99999', 'Rohana', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116009', 'Alfian Abdullah Tumu', 'Gorontalo', '1998-05-09', 'L', 1, 'JL. LAGARUTU BTN CPI IV BLOK K.12', '99999', 'Rohana Ntau', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116010', 'Ahmad Sufiani', 'Pandajaya', '1997-01-17', 'L', 1, 'jln. hadam malik no. 10', '999999', 'Idarsih', 55201, '2016-09-23', '20161', 1, '1', 'info@stmikadhiguna.ac.id', 'Y'),
	('5520116011', 'Alvialdi Ariokh', 'Tanah Harapan', '1995-08-24', 'P', 1, 'Jln. Adam malik Petobo', '99999', 'Dina', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116012', 'Andhyka Vergiawan', 'Palu', '1993-08-25', 'L', 1, 'Btn. Lasoani Bawah Blok K2 no 9 Palu', '99999', 'Neni Yalestina', 55201, '2016-09-19', '20161', 1, '1', 'andhyka_vergiawan@yahoo.co.id', 'Y'),
	('5520116013', 'Andika Fauzan', 'palu', '1998-08-26', 'L', 1, 'pantoloan,jl bahari', '99999', 'uswatun hasanah', 55201, '2016-09-19', '20161', 1, '1', 'andikapauzan@yahoo.com', 'Y'),
	('5520116014', 'Annisa Kurnia Sari', 'Palu', '1998-10-10', 'L', 1, 'Jl. Durian No. 28', '99999', 'Syamsiar D Puluengi', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116015', 'Ardiansyah', 'palu', '1998-07-17', 'L', 1, 'dr.wahidin', '99999', 'WATI', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116016', 'Arifudin', 'Salumbia', '1935-11-30', 'L', 1, 'desa pangkung , kecamatan dondo , kabupaten tolito', '99999', 'JASNAWATI', 55201, '2016-09-19', '20161', 1, '1', 'ARIF.HYDE98.REAL@GMAIL.COM', 'Y'),
	('5520116017', 'Asyrafil Zikri L', 'Tombiano', '1998-04-13', 'L', 1, 'Desa Tombiano Kec. Tojo Barat', '99999', 'Aiman', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116018', 'Ayu Hernita', 'Balinggi', '1998-06-30', 'P', 1, 'Dusun 1 Antosari, Desa Balinggi Jati, kec. Balingg', '99999', 'Putu Rai', 55201, '2016-09-19', '20161', 1, '1', 'ayunita355@gmail.com', 'Y'),
	('5520116019', 'Debby Amanda', 'Palu', '1998-08-16', 'P', 2, 'Desa Loli Saluran', '99999', 'Fatma', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116020', 'Dewa Komang Sudarsana', 'sritabaang', '1998-08-13', 'L', 4, 'jln.hayam wuruk.no.27', '99999', 'WAYAN SUANDI', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116021', 'Diga Taat Abrianto', 'PALU', '1998-10-05', 'L', 1, 'BTN GRAND KALUKUBULA ', '99999', 'Olga Rosita', 55201, '2016-09-19', '20161', 1, '1', 'abriandhiga79@gmail.com', 'Y'),
	('5520116022', 'Dwi Maharani Puspitasari', 'PALU', '1995-04-26', 'P', 1, 'JL. AGUSSALIM NO 34', '99999', 'SELLYAWATI S.SOS', 55201, '2016-09-19', '20161', 1, '1', 'dwimaharanipuspitasari@gmail.com', 'Y'),
	('5520116023', 'Evelin Franny Kapojos', 'Luwuk', '1998-08-07', 'P', 2, 'Jl. Tanjung 1', '99999', 'Lenny Lie', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116024', 'Fajar Andika', 'POSO', '1998-11-01', 'L', 1, 'Kelurahan Kasiguncu, Kab.Poso', '99999', 'VITALIA NURDIN', 55201, '2016-09-19', '20161', 1, '1', 'fajarandika110@gmail.com', 'Y'),
	('5520116025', 'Fatuh Rahman', 'Binangga', '1998-10-05', 'L', 1, 'Jl. Palu - bangga Lrg. bakung, Binangga, Marawola', '99999', 'Asnani', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116026', 'Felix Ranindaya Jardin Laepasa', 'Palu', '1998-02-26', 'L', 2, 'JL.MERPATI', '99999', 'DEMI ANUGERAH SANGKALABU', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116027', 'Fitria Nur', 'Palu', '1994-03-16', 'P', 1, 'BTN kelapa mas permai blok j4 no. 1', '99999', 'Aida fitriani', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116028', 'Hamdan', 'pulau maputi', '1995-08-21', 'L', 1, 'jln.kartini', '99999', 'mardia', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116029', 'Herlina', 'Ulatan', '1997-04-03', 'P', 1, 'Jln. Kimaja Lrg. Bakso', '99999', 'Rapia', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116030', 'I Nyoman Ferianto', 'martajaya', '1998-09-23', 'L', 4, 'jln.bulili 2', '99999', 'NI KETUT PORMI', 55201, '2016-09-19', '20161', 1, '1', '98feri@gmail.com', 'Y'),
	('5520116031', 'I Wayan Yogi Hendriana', 'SULI', '2016-05-12', 'L', 4, 'JL.MIANGAS 5', '99999', 'NI NYOMAN SUKAYANI', 55201, '2016-09-19', '20161', 1, '1', 'YOGIHENDRI.YH@GMAIL.COM', 'Y'),
	('5520116032', 'Jabal Rahman', 'donggala', '1998-03-27', 'L', 1, 'tangjung batu no.130', '99999', 'halwiah', 55201, '2016-09-19', '20161', 1, '1', 'jabalrahman007@gmail.com', 'Y'),
	('5520116033', 'Juliana', 'Tolitoli', '1998-07-20', 'P', 2, 'desa sandana,jln.moh saleh no 52', '99999', 'Marwa.L', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116034', 'Kadek Ayu Wahyuni', 'martajaya', '1999-01-02', 'P', 4, 'jl.talaga raya perum.nufara garden blok g no.8 pal', '99999', 'NI nyoman kristiani', 55201, '2016-09-19', '20161', 1, '1', 'ayhu_wahyuni99@yahoo.com', 'Y'),
	('5520116035', 'Kenesia Ivana', 'KEFAMENANU', '1998-09-10', 'P', 2, 'JL. DEWI SARTIKA', '99999', 'AFRIDA', 55201, '2016-09-19', '20161', 1, '1', 'oetmusukenesia@gmail.com', 'Y'),
	('5520116036', 'Kiki Reski R', 'Pekkabata', '1999-10-12', 'P', 1, 'Kecamatan Taopa Desa Palapi', '99999', 'HERLIANA', 55201, '2016-09-19', '20161', 1, '1', 'kikireskiparenta@gmail.com', 'Y'),
	('5520116037', 'Komang Setiawan', 'Tambarana', '1998-01-21', 'L', 4, 'Jln. Bulili 2', '99999', 'Niwayan Sudiasih', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116038', 'Lely Afrilyanti', 'palu', '1999-04-20', 'P', 1, 'Jl.purnawirawan II', '99999', 'ANASTASYA', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116039', 'Lutfi', 'paddumpu', '1998-01-01', 'L', 1, 'jln. mitra puenjidi', '99999', 'Sumiati', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116040', 'Marfuad Fajri Nurdani', 'Palu', '1998-08-28', 'L', 1, 'Btn Pengawu Permai Block C4/50', '99999', 'Ariyati', 55201, '2016-09-19', '20161', 1, '1', 'fajrimarfuad@gmail.com', 'Y'),
	('5520116041', 'Maria Danielle Gabriella', 'Manado', '1998-08-04', 'P', 2, 'Jl. Diponeggoro No.17/27', '99999', 'Maria Diana Grace Putong', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116042', 'Mastur', 'Sakita', '1997-09-04', 'L', 1, 'desa sakita', '99999', 'Murnia', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116043', 'Moh. Aqqbar', 'Tawaeli', '1995-10-27', 'L', 1, 'jl.banawa no.77 kel tanjung batu', '99999', 'Dei Nur', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116044', 'Moh Rizky Fadillah Kiki', 'Luwuk', '1997-01-27', 'L', 1, 'Jl. G. LATIMOJONG', '99999', 'Rosnawati Pou', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116045', 'Moh. Rizal Midi', 'Palu', '1992-10-19', 'L', 1, 'Jln.Ongka Malino', '99999', 'Risna. A . Tamaita', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116046', 'Mohamad Syahril', 'Lambunu', '1992-03-19', 'L', 1, 'Jl. Teluk Tolo', '99999', 'jamlan H.Andiolo', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116047', 'Muh Abd Ronald L', 'Luwuk', '1994-06-15', 'L', 1, 'jl. otto iskandar dinata', '99999', 'Rosada masulili', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116048', 'Muh Jumadi', 'Kampung Baru', '1994-10-19', 'L', 1, 'Jl. Dayo Dara Prum CPI IV Blok J No. 6', '99999', 'Rahuna', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116049', 'Muhammad Ashari', 'AMBON', '1935-11-30', 'L', 1, 'BTN.GRIYA PALUPI MAS BLOCK A NO.6', '99999', 'HALIMAHHALIMAH ALIAH', 55201, '2016-09-19', '20161', 1, '1', 'muhammadashari609@gmail.com', 'Y'),
	('5520116050', 'Muhammad Ilham Siri', 'Palu', '1998-08-31', 'L', 1, 'jalan gunung loli no. 16b ', '99999', 'Nur aini renden', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116051', 'Muhammad Iqbal', 'PALU', '1994-11-28', 'L', 1, 'Jln.KH.Dewantoro No.45', '99999', 'HJ.TINAMALINDA', 55201, '2016-09-19', '20161', 1, '1', 'gonthe.bejoo@gmail.com', 'Y'),
	('5520116052', 'Muhammad Kifli A Saso', 'Modo', '1998-10-02', 'L', 1, 'Dusun II Desa Tikopo kecamatan Bokat', '99999', 'Ernawati', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116053', 'Najamuddin Hapiz', 'Kuo', '1994-10-04', 'L', 1, 'Desa : Kuo; Kec : Pangale; Kab : Mamuju Tengah; Su', '99999', 'Bidayah', 55201, '2016-09-19', '20161', 1, '1', 'Baharuddin_hafizh@yahoo.co.id', 'Y'),
	('5520116054', 'Ni Gusti Ayu Eny Pratiwi', 'Kasimbar', '1998-05-02', 'P', 4, 'Jl. Vetran', '99999', 'Ni Wayan Kayuni', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116055', 'Puput Fadhilah', 'Palu', '1996-10-12', 'P', 1, 'Tinggede, Jl.Rendelemba No.21', '99999', 'Isnarti', 55201, '2016-09-19', '20161', 1, '1', 'Puput996@yahoo.com', 'Y'),
	('5520116056', 'Putri Rahayu Indah', 'Kalatiri', '1998-04-28', 'P', 1, 'jln. anggur 1 no 26 b', '99999', 'MIRA', 55201, '2016-09-19', '20161', 1, '1', 'putrirahayuindah123@gmail.com', 'Y'),
	('5520116057', 'Raldy Putra M Nur', 'Luwuk', '1999-06-25', 'L', 1, 'Jl. Pari No. 06 Luwuk', '99999', 'Rosyanti Ngareng, S.Pi., M.Si', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116058', 'Rinawati', 'Budi Mukti', '1993-08-18', 'P', 1, 'JL. SISINGAMANGARAJA', '99999', 'Hj. SRIYANI', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116059', 'Rizal Efendi', 'MANTAWA', '1997-10-24', 'L', 1, 'MEKAR JAYA, KEC. TOILI BARAT, KAB. BANGGAI', '99999', 'ILMAH', 55201, '2016-09-19', '20161', 1, '1', 'RIZALEFENDI826@GMAIL.COM', 'Y'),
	('5520116060', 'Rizaldi Kulap', 'Bella,Kab.banggai', '2016-03-11', 'L', 1, 'BTN LASOANI,BLOK F4 NO.16', '99999', 'Fatmawati Latare', 55201, '2016-09-19', '20161', 1, '1', 'Rizaldikulap11@gmail.com', 'Y'),
	('5520116061', 'Ronaldi Aprianto Agung', 'KULAWI', '1998-04-09', 'L', 2, 'DESA BOLADANGKO', '99999', 'NI MADE SRI WAKOLO', 55201, '2016-09-19', '20161', 1, '1', 'Ronaldi.aprianto@yahoo.com', 'Y'),
	('5520116062', 'Sarlin Tangkelayuk', 'Ba\'tan', '1997-06-10', 'L', 2, 'jalan sungai balantak', '99999', 'Mety', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116063', 'Sri Wulandari', 'Palu,', '1996-09-20', 'P', 1, 'Desa Marata', '99999', 'Hj. Nahera', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116064', 'Syukran Lamatoro', 'Ampana', '1997-04-13', 'L', 1, 'Jl. Bali No 303 Palu Sulawesi Tengah', '99999', 'DJUMAIDA LANDEANGI', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116065', 'Tegar Yudhi Santoso', 'palu ', '1996-05-19', 'L', 1, 'jl.yossudarso', '99999', 'NASTITIN', 55201, '2016-09-19', '20161', 1, '1', 'tegaryudhisantoso@gmail.com', 'Y'),
	('5520116066', 'Tommy Sumitro', 'Palu', '1999-04-13', 'L', 1, 'Jl. Parigi 1 No. 95 BTN Silae', '99999', 'Fitrianingsih, se', 55201, '2016-09-19', '20161', 1, '1', 'sumitrotommy@gmail.com', 'Y'),
	('5520116067', 'Tria Rahmadani', 'palu', '1998-01-24', 'P', 1, 'JL.Pramuka Biromaru', '99999', 'Idawati', 55201, '2016-09-19', '20161', 1, '1', 'Rhanyongk39@gmail.com', 'Y'),
	('5520116068', 'Ulfa', 'siwalempu', '1998-04-17', 'P', 1, 'baliase', '99999', 'hasna', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116069', 'Ulul Azmi', 'MAKASSAR', '1996-11-15', 'L', 1, 'BTN MINASA UPA BLOK A3 NO.12 RT.003 RW.003 KEL. KA', '99999', 'HIKMAWATI UB,S.Pd', 55201, '2016-09-19', '20161', 1, '1', 'ululazmisaid@gmail.com', 'Y'),
	('5520116070', 'Yunita Blessianeila', 'Palu', '1997-06-20', 'P', 2, 'Desa Uwemanje Kec. Kinovaro', '99999', 'Mayor Ny Yulia Tarigan', 55201, '2016-09-19', '20161', 1, '1', '', 'Y'),
	('5520116071', 'Yusril Mohammad', 'Palu', '2016-08-08', 'L', 1, 'Jln. Otista Lrg. Anutapura 2 No. 6A', '99999', 'Nur Rahmah', 55201, '2016-09-19', '20161', 1, '1', 'chillavprzoff@gmail.com', 'Y'),
	('5520116072', 'Zulfikar', 'Palu', '2016-07-29', 'L', 1, 'Jl. Malonda Kel. Buluri', '99999', 'Alus Paungan', 55201, '2016-09-19', '20161', 1, '1', 'zulfikarmalik6@gmail.com', 'Y'),
	('5520116073', 'Moh. Rizaldi', '-', '2016-09-20', 'L', 1, 'Palu', '99999', '-', 55201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5520116074', 'Maychel Loliwu', 'Palu', '1998-05-07', 'L', 2, 'Jln Anoa Lorong sehati No.143 G', '99999', 'Lely Arce Adoe', 55201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5520116075', 'Andri Syah Putra', 'pALU', '1997-01-21', 'L', 1, 'jln kelor lrg 5', '999999', 'Ramlayani', 55201, '2016-09-23', '20161', 1, '1', 'andri_juventini97@gmail.com', 'Y'),
	('5520116076', 'Fitri Lestari', 'Palu', '1998-01-29', 'P', 1, 'Jl. Jambu', '999999', 'Sunarti', 55201, '2016-09-23', '20161', 1, '1', 'fitrimervu@co.id', 'Y'),
	('5520116077', 'Roni Herdianto', 'Palu', '1998-07-12', 'L', 1, 'Jln. Munif Rahman No. 25 Palu RT 01 RW 02', '999999', 'Masni Karim', 55201, '2016-09-23', '20161', 1, '1', 'info@stmikadhiguna.ac.id', 'Y'),
	('5520116078', 'Ruly Pratama', 'Palu', '1997-01-18', 'L', 1, 'PETOBO JLN BILILI', '999999', 'BERTHA BARANI', 55201, '2016-09-23', '20161', 1, '1', 'rullyp551@gmail.com', 'Y'),
	('5520116079', 'Dandi Setiawan', 'Balantak', '1998-06-03', 'L', 1, 'Kayumalue', '999999', '-', 55201, '2016-09-23', '20161', 1, '1', 'info@stmikadhiguna.ac.id', 'Y'),
	('5520116080', 'Herman ES Wahyudi', 'NUNURANTAI', '1994-11-30', 'L', 1, 'jln. Lagarutu (Doyodara)', '99999', 'YAYUM', 55201, '2016-09-23', '20161', 1, '1', 'hermaneswahyudi@gmail.com', 'Y'),
	('5520116081', 'John Peter Tondowana', 'palu', '1998-05-31', 'L', 2, 'Jl. Watumapida (Asrama Kodim) No.', '99999', 'Sherlin Sakatih', 57201, '2016-09-23', '20161', 1, '1', 'jhnpttr@reborn.com', 'Y'),
	('5520116082', 'Komang Setiabudi', 'minti makmur', '1996-11-27', 'L', 4, 'tondo', '99999', 'Ni nyoman latri', 55201, '2016-09-23', '20161', 1, '1', 'info@stimikadhiguna.ac.id', 'Y'),
	('5520116083', 'Moh Fail Fadil', 'Luwuk', '1998-01-01', 'L', 1, 'Tondo', '99999', 'Mastia', 55201, '2016-09-23', '20161', 1, '1', 'failfadilmoh@yahoo.com', 'Y'),
	('5520116084', 'Moh Hasdi Prabakti', 'PALU', '1995-10-24', 'L', 1, 'BTN PALUPI PUSKUD BLOK A2 NO. 12', '99999', 'ESSE M. ZAING', 55201, '2016-09-23', '20161', 1, '1', 'hasdy.shady@gmail.com', 'Y'),
	('5520116085', 'Rifandi M. Naka', 'palu sulawesi tengah', '1998-09-18', 'L', 1, 'jl.tanggul selatan birobuli', '99999', 'Dra. NURDIANA TAHADJU', 55201, '2016-09-23', '20161', 1, '1', 'rifandynaka98@gmail.com', 'Y'),
	('5520116086', 'Syahrinaldi A. Adu', 'palu', '1993-05-21', 'L', 1, 'Jl. Lagarutu No. 29 A', '99999', 'Indo Cenie', 55201, '2016-09-23', '20161', 1, '1', 'info@stimikadhiguna.ac.id', 'Y'),
	('5520116087', 'Moh. Affandi', 'Palu', '1996-03-11', 'L', 1, 'Donggala Kodi, Jl, Cemara 5 No. 12', '999999', 'Nining Sukmawati', 55201, '2016-09-23', '20161', 1, '1', 'admin@stmikadhiguna.ac.id', 'Y'),
	('5520116088', 'Itrat Twahiratan', 'Talaga', '1996-06-16', 'L', 1, 'Jl. Merak No. Kelurahan Birobuli', '999999', 'Ifan', 55201, '2016-09-23', '20161', 1, '1', 'info@stmikadhiguna.ac.id', 'Y'),
	('5520116090', 'Christ N Waluko', 'Poso', '1995-11-24', 'L', 2, 'Jl. Garuda', '999999', 'Meike M Coloay', 55201, '2016-09-23', '20161', 1, '1', 'info@stmikadhiguna.ac.id', 'Y'),
	('5520116091', 'Wahyu', 'Donggala', '1996-04-01', 'L', 1, 'Jl. Diponegoro Kel. Kampung Lere', '999999', 'Sundu', 55201, '2016-09-23', '20161', 1, '1', 'Iwahyu339@gmail.com', 'Y'),
	('5520116092', 'Sahyul', 'Bobo', '1994-11-24', 'L', 1, 'Jl. Merpati Kel. Tanah Modindi', '999999', 'Susiwarni', 55201, '2016-09-23', '20161', 1, '1', 'sahyoel@yahoo.com', 'Y'),
	('5520116095', 'Pratomo Adi Saputra', 'Palu', '1998-10-15', 'L', 1, 'Palu Selatan, Jl. Abdul Rahman Saleh No. 33', '999999', 'Lolianti', 55201, '2016-09-23', '20161', 1, '1', 'pratamaadi75@rocketmail.com', 'N'),
	('5521160093', 'Ardi Risaldi', 'Kolonodale', '1997-05-28', 'L', 1, 'Jln. Dayo dara btn C.PI.5 Blok C2', '999999', 'Nurmin', 55201, '2016-09-23', '20161', 1, '1', 'info@stmikadhiguna.ac.id', 'Y'),
	('5720116001', 'A.Rezkiawan', 'Mare', '1998-11-27', 'L', 1, 'Jl. Dr. Wahidin No. 51 Palu', '99999', 'A. Sulaeman ( Almarhum)', 57201, '2016-09-19', '20161', 1, '1', 'andirezki168@gmail.com', 'Y'),
	('5720116002', 'Alfian Syaifulllah', 'Morowali', '1997-07-28', 'L', 1, 'Desa Marga Mulya, Kec. Bungku Barat', '99999', 'Murjani rahman', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116003', 'Ahmad Hendra Wardana', 'Palu', '1995-01-21', 'L', 1, 'BTN PALU PERMAI B5 no 2', '99999', 'Fransiska Ubas', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116004', 'Akbar Muzaki', 'AMPANA', '1997-12-23', 'L', 1, 'JL, TG LAWAKA. KEL DONDO. KEC . ratolindo', '99999', 'NINGSI N BALANGO', 57201, '2016-09-19', '20161', 1, '1', 'akbarmuzaki97@gmail.com', 'Y'),
	('5720116005', 'Andi Amril Aswira', 'Makassar', '1998-04-26', 'L', 1, 'JLN. OTISTA NO.33', '99999', 'SYAHRANI', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116006', 'Algi Ramadhan', 'PALU', '1995-06-02', 'L', 1, 'JL DURIAN NO 107', '999999', 'NURHAYATI. YR', 55201, '2016-09-23', '20161', 1, '1', 'info@stmikadhiguna.ac.id', 'Y'),
	('5720116007', 'Andrian Maulana', 'masamba', '1999-06-27', 'L', 2, 'Jalan Tran Sulawesi, Ratolene', '99999', 'Sumiati', 57201, '2016-09-19', '20161', 1, '1', 'divakhairil@gmail.com', 'Y'),
	('5720116008', 'Andya Faradilla Sary', 'PALU', '1997-05-03', 'P', 1, 'JL. DEWI SARTIKA', '99999', 'BESSE RHIKEN', 57201, '2016-09-19', '20161', 1, '1', 'saryolivia@ymail.com', 'Y'),
	('5720116009', 'Anita M Saira', 'Ampana', '1998-05-23', 'P', 1, 'Desa Saluaba', '99999', 'hasna', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116010', 'Bakti Pratama Putra', 'palu', '1995-06-09', 'L', 1, 'jalan gawalise', '99999', 'rosmiati', 57201, '2016-09-19', '20161', 1, '1', 'vanwilder96@yahoo.com', 'Y'),
	('5720116011', 'Cindy Aprilla', 'dolo', '1997-04-29', 'P', 2, 'desa kotarindau kec.dolo kab.sigi', '99999', 'Kalsum', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116012', 'Citra Nurul Ihwati', 'Sibayu', '1997-07-02', 'P', 1, 'Jl. Perintis, Desa Kampung baru Sibayu', '99999', 'Fitriani', 57201, '2016-09-19', '20161', 1, '1', 'cytra.cicha@yahoo.com', 'Y'),
	('5720116013', 'Destin Garanta', 'Bonoran', '1998-12-07', 'P', 2, 'Jln. Sungai Sa\'dan LR.II No.07', '99999', 'Naomi', 57201, '2016-09-19', '20161', 1, '1', 'Desthin.trj@gmail.com', 'Y'),
	('5720116014', 'Devita Sari', 'Kulawi', '1997-12-19', 'P', 1, 'Jl. Tg. Manimbaya', '99999', 'Mistia Tobenu', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116015', 'Ditha Christian Natalia N', 'Palu', '1997-12-27', 'P', 2, 'Jalan Miangas NO.38', '99999', 'Margaretha Lingkua (Almh)', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116016', 'Endi Apriadi Mbae', 'Korobonde', '1997-04-18', 'L', 1, 'Jln. Miangas No.38', '99999', 'Yun Bertin Pansonge', 57201, '2016-09-19', '20161', 1, '1', 'endimbae86@gmail.com', 'Y'),
	('5720116017', 'Erdiansyah', 'PALU', '1998-08-29', 'L', 1, 'JL.LABU / KEC.PALU BARAT', '99999', 'ERNA WATI', 57201, '2016-09-19', '20161', 1, '1', 'erdie98@yahoo.com', 'Y'),
	('5720116018', 'Fadila Rizki', 'palu', '1997-01-17', 'P', 1, 'JL.SAMRATULANGI NO.12 C', '99999', 'MINARTI', 57201, '2016-09-19', '20161', 1, '1', 'Fadhilarisky17@gmail.com', 'Y'),
	('5720116019', 'Fadjrianto', 'Palu', '2016-08-27', 'L', 1, 'Jl. Zebra II No 50', '99999', 'Warsita B.S', 57201, '2016-09-19', '20161', 1, '1', 'yansupertramp@gmail.com', 'Y'),
	('5720116020', 'Febrianto', 'Pinotu', '1990-07-22', 'L', 1, 'Jalan Hayamwuruk No. 51', '99999', 'Hadija Talebo', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116021', 'Ferawaty', 'palu', '1996-10-31', 'P', 1, 'jalan karajalemba', '99999', 'Fatimah', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116022', 'Fikar Topao', 'doda', '1998-02-17', 'L', 1, 'jl batubata indah', '99999', 'susna woiya', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116023', 'Fiki Wilantara', 'bungku', '1997-10-20', 'L', 1, 'jln. anoa lorong sehati 143 G', '99999', 'Siti Ramadan', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116024', 'Filda', 'Ombo', '1995-04-11', 'P', 1, 'Desa Sikara Kecamatan Sindue Tobata', '99999', 'Cemi', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116025', 'Firman', 'Palasa', '1998-08-07', 'L', 1, 'Dusun 6 Palasa', '99999', 'Nuraini', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116026', 'Fitri', 'Taipa', '1998-01-02', 'P', 1, 'Taipa Ginggiri', '99999', 'Nurtin', 57201, '2016-09-19', '20161', 1, '1', 'fitrilad01@gmail.com', 'Y'),
	('5720116027', 'Fadhlun Widyatami', 'Palu', '1998-09-18', 'P', 1, 'GRIYA SAKINAH BLOK A NO.7', '999999', 'Dra.LU\'LU', 57201, '2016-09-23', '20161', 1, '1', '085241047545@gmail.co.id', 'Y'),
	('5720116028', 'Hermin Sutriana Bualo', 'TOMUI KARYA', '1997-03-28', 'L', 1, 'jln. Basuki Rahmat no. 119 B', '99999', 'SILVIA LOMPIHA', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116029', 'I Komang Sugiarta', 'MERTAJATI', '1998-09-20', 'L', 4, 'JLN.TELUK RAYA BLOK C NO.20', '99999', 'NI KETUT RESKI', 57201, '2016-09-19', '20161', 1, '1', 'sugiarta3000.sa@gmail.com', 'Y'),
	('5720116030', 'I Komang Suyanta Dwipa', 'Balinggi', '1997-03-13', 'L', 4, 'BTN Lagarutu blok: N no:10', '99999', 'Ni Nengah Renawati', 57201, '2016-09-19', '20161', 1, '1', 'komangsuyanta97@gmail.com', 'Y'),
	('5720116031', 'Idrus', 'Pulu', '1994-09-07', 'L', 1, 'Jl.Palu-Bangga', '99999', 'Satria', 57201, '2016-09-19', '20161', 1, '1', 'latifidrus@gmail.com', 'Y'),
	('5720116032', 'Irfansyah', 'Palu', '1999-04-03', 'L', 1, 'Jln. BUAH PALA Lrg 1 No 2 Boyaoge', '99999', 'Belahan B. Lamarauna', 57201, '2016-09-19', '20161', 1, '1', 'ipankjr12@gmail.com', 'Y'),
	('5720116033', 'Jessica Eunike Gogali', 'DODA', '1999-07-28', 'P', 2, 'JL. TNJUNG SATU LRG. SATU NO. 6', '99999', 'EVI INDRABUDI MANTAKO', 57201, '2016-09-19', '20161', 1, '1', 'jessicagogali@yhoo.com', 'Y'),
	('5720116034', 'Mar\'atus Solikha', 'Minakarya', '1997-12-01', 'P', 1, 'Jl.Tg.Tururuka No.23', '99999', 'Subiyati Ningsih', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116035', 'Moh. Ismail', 'Tambu', '1998-04-07', 'L', 1, 'Perumahan Citra Pesona Indah V Lagarutu Blog G no ', '999999', 'Rahmatia', 57201, '2016-09-23', '20161', 1, '1', 'info@stmikadhiguna.ac.id', 'Y'),
	('5720116036', 'Meike Puspa Arin', 'Palu', '1998-05-11', 'P', 1, 'Jalan miangas nomor 10', '99999', 'Nurhayati', 57201, '2016-09-19', '20161', 1, '1', 'Puspaladys@yahoo.co.id', 'Y'),
	('5720116037', 'Metrin T Ismail', 'Palu', '1998-07-03', 'P', 2, 'Jln. Malontara 13 A', '99999', 'Tince nursin', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116038', 'Moh Afandi Dg Baso', 'KOLAMI', '1997-05-04', 'L', 1, 'JL TG LAWAKA, KEL DONDO. KEC RATOLINDO.', '99999', 'IRHANI DJANATU', 57201, '2016-09-19', '20161', 1, '1', 'classmildfandy@yahoo.co.id', 'Y'),
	('5720116039', 'Moh Andhi Fachril Usman', 'Tojo', '1998-03-20', 'L', 1, 'Jln. Protokol no 125 Marowo kab. tojo  una-una', '99999', 'ROSLIN LASOREH', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116040', 'Moh Reza Risaldi', 'Palu', '1998-03-03', 'L', 1, 'BTN Bumi Roviga', '99999', 'Nurmin Dolla', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116041', 'Moh Rusli', 'Palu', '1998-08-20', 'L', 1, 'Jl. Komodo No. 22', '99999', 'Nurhayati', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116042', 'Natasya Devanka', 'Palu', '1998-12-15', 'P', 2, 'Jl. Hj patilah no 69', '99999', 'Lily marlina', 57201, '2016-09-19', '20161', 1, '1', 'ndevanka12@gmail.com', 'Y'),
	('5720116043', 'Natasya Eka Putri', 'PALU', '1999-06-24', 'P', 1, 'LANGALESO', '99999', 'HJ.MURNI', 57201, '2016-09-19', '20161', 1, '1', 'natasyaekaputri41@gmail.com', 'Y'),
	('5720116044', 'Ni Ketut Aluh Ginanti', 'MARTASARI', '1997-04-13', 'P', 4, 'DESA MARTASARI KECAMATAN PEDONGGA KABUPATEN MAMUJU', '99999', 'NI MADE TRIMI', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116045', 'Ni Nyoman Lita Dewi', 'Martajaya', '1999-02-19', 'P', 4, 'Tanjumbulu', '99999', 'NI MADE JAGA', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116046', 'Ninda Tias Nugraheni', 'kotarindau', '1998-09-02', 'P', 1, 'Desa kotarindau', '99999', 'Nilawati', 57201, '2016-09-19', '20161', 1, '1', 'nindatiasnugraheni@yahoo.com', 'Y'),
	('5720116047', 'Niquansyah Zakarkasih', 'Pantoloan', '1998-07-29', 'L', 1, 'Pantoloan', '99999', 'Rosnani Lakele', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116048', 'Niswatun Solehah', 'Dusunan', '1997-05-13', 'P', 1, 'Desa Dusunan Barat', '99999', 'Mulyana', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116049', 'Nita Namoda', 'Lemusa', '1997-05-03', 'P', 2, 'BTN. Kawatuna', '99999', 'EUNIKE DASI', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116050', 'Nur Adnand Ramadhan', 'Palu', '1998-12-25', 'L', 1, 'Jl. Sis Al Jufri no. 121', '99999', 'Sagena', 57201, '2016-09-19', '20161', 1, '1', 'nuradnand@gmail.com', 'Y'),
	('5720116051', 'Nurintan', 'Lemo', '1997-08-10', 'P', 1, 'Lemo', '99999', 'Andimaca', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116052', 'Nurmin', 'PANGKAJENE', '1996-06-07', 'P', 1, 'JLN. MONGINSIDI NO. 14 B', '99999', 'RAMLAH', 57201, '2016-09-19', '20161', 1, '1', 'nurmin.amhie@gmail.com', 'Y'),
	('5720116053', 'Oktriani Cicilia', 'Tomua', '1998-10-16', 'P', 2, 'Jln. Tg. Manimbaya', '99999', 'Selfina Roouse', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116054', 'Rahmawati', 'Palu', '1989-04-03', 'P', 1, 'JL. MALEO NO. 94 RT.003 RW.001 LASOANI', '99999', 'Wati', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116055', 'Reven Linus Kawengian', 'PARIGI', '2016-04-26', 'L', 2, 'JL.TANJUNG MANIMBAYA', '99999', 'ELSYE KAWENGIAN', 57201, '2016-09-19', '20161', 1, '1', 'RHEVENKAWENGIAN@YAHOO.COM', 'Y'),
	('5720116056', 'Rinaldi', 'Palu', '1993-05-21', 'L', 1, 'Jl. Lagarutu No. 29 A', '99999', 'Ibu', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116057', 'Ririn Safitri', 'karawana', '1997-08-05', 'P', 1, 'karawana', '99999', 'NURYANI', 57201, '2016-09-19', '20161', 1, '1', 'ririnsafitri0597gmail.com', 'Y'),
	('5720116058', 'ridhatul jannah', 'Palu', '1997-01-09', 'P', 1, 'jln. jati nmr 55c', '999999', 'ernawati', 57201, '2016-09-23', '20161', 1, '1', 'ridhajannah97@gmail.com', 'Y'),
	('5720116059', 'Rosnani', 'Ongka', '1997-09-29', 'P', 1, 'Jl. Bakuku', '99999', 'nimainta', 57201, '2016-09-19', '20161', 1, '1', 'rosnani481@yahoo.com', 'Y'),
	('5720116060', 'Rosari Meisin Rumondor', 'palu', '1998-05-15', 'P', 2, 'Jln. Pulau Halmahera', '99999', 'jovita nely wowiling', 57201, '2016-09-23', '20161', 1, '1', 'rosarimeisin@gmail.com', 'Y'),
	('5720116061', 'Satriyani S Abdullah', 'Mawomba', '1997-06-01', 'P', 1, 'PERUMNAS TINGGEDE JL. MERANTI I', '99999', 'SITI RAHMATIA', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116062', 'Shintia Delviani Maitala', 'Palu', '1998-01-07', 'P', 2, 'JL.KARANA BTN ASABRI', '99999', 'Selvira Katanging', 57201, '2016-09-19', '20161', 1, '1', 'Shintiadelviani7@gmail.com', 'Y'),
	('5720116063', 'Sinthia Novani Doinga', 'Ampana', '1997-11-18', 'P', 2, 'Jln. R.A. Kartini', '99999', 'Ketty Yohanna Rumimpunu', 57201, '2016-09-19', '20161', 1, '1', 'sinthia_doinga@yahoo.com', 'Y'),
	('5720116064', 'Soleh Irsan', 'kotarindau', '1998-03-11', 'L', 1, 'karawana', '99999', 'Hikma', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116065', 'Sumardin', 'Panii', '1998-08-13', 'L', 1, 'Jl. Cemangi', '99999', 'Samiya', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116066', 'Suryani Risqika A', 'Palu', '1997-11-13', 'P', 1, 'Sibalaya Utara', '99999', 'Sri Wahyuni Ishak, S.Pd', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116067', 'Sutan Hamit Randakota', 'Toli-Toli', '1997-08-30', 'L', 1, 'BTN Baliase Blok R 3 No.09', '99999', '-', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116068', 'Triyunita Palenggo', 'lemboroma', '1997-01-03', 'P', 2, 'jln Towua Lrg. Satelit II', '99999', 'HW.Taungke', 57201, '2016-09-19', '20161', 1, '1', 'triyunitapalenggotaungke@yahoo.co.i', 'Y'),
	('5720116069', 'Try Annisah Septiani', 'Palu', '1998-09-24', 'P', 1, 'BTN Lasoani Bawah BLOK M1 No 12', '99999', 'Muliani Latief', 57201, '2016-09-19', '20161', 1, '1', 'septianitry@ymail.com', 'Y'),
	('5720116070', 'Unun', 'Kamarora', '1997-08-30', 'P', 1, 'Jalan kancil', '99999', 'Melci', 57201, '2016-09-19', '20161', 1, '1', 'unnun97@gmail.com', 'Y'),
	('5720116071', 'Vernando Nuary', 'PALU ( SULAWESI TENGAH )', '1996-01-09', 'L', 2, 'JLN TG.SANTIGI', '99999', 'NAIMA TOLABA', 57201, '2016-09-19', '20161', 1, '1', 'Vernandonuary@yahoo.com', 'Y'),
	('5720116072', 'Vina Wilastiani', 'Margapura', '1998-04-11', 'P', 1, 'jln. banteng BTN bumi Anggur blok AA no. 8', '99999', 'Sulastri', 57201, '2016-09-19', '20161', 1, '1', 'vina.wilastiani@gmail.com', 'Y'),
	('5720116073', 'Vincentius Rizal', 'Tolai', '1996-05-11', 'L', 2, 'jln.pattimura', '99999', 'cansia winarti', 57201, '2016-09-19', '20161', 1, '1', 'vincentiusrizal11@gmail.com', 'Y'),
	('5720116074', 'Wahyu Rahman Oktavian', 'Mataram', '1994-10-26', 'L', 1, 'Jl. Sapta Marga 2, No. 10 Kelurahan birobuli selat', '99999', 'Siti Rahma', 57201, '2016-09-19', '20161', 1, '1', 'wahyu.rahman30@yahoo.com', 'Y'),
	('5720116075', 'Yudi Indra Susanto', 'Jombang', '1997-10-15', 'L', 1, 'Jl.Gonogo Bayaoge', '99999', 'Isniati', 57201, '2016-09-19', '20161', 1, '1', 'indrasusanto145@gmail.com', 'Y'),
	('5720116076', 'Yulia Irmayati', 'Jakarta', '1997-01-01', 'P', 1, 'Jl. Tadulako II No. 6', '99999', 'Rita', 57201, '2016-09-19', '20161', 1, '1', NULL, 'Y'),
	('5720116077', 'Charla Clara Kohom', 'Pangolombian', '0000-00-00', 'P', 2, 'Jl.Lamutu no 43', '99999', 'Erni Kohom', 57201, '2016-09-20', '20161', 1, '1', NULL, 'Y'),
	('5720116078', 'Cristian Dwi Fecky Lagimpu', 'watutau', '1999-06-25', 'L', 2, 'jln. towua', '99999', 'Yakei Toridu', 57201, '2016-09-23', '20161', 1, '1', '250699fecky@gmail.com', 'Y'),
	('5720116079', 'Krisdayanti', 'Kangkuro', '1996-01-27', 'P', 1, 'Jln. GELATIK NO 19 A', '99999', 'Lismarni', 57201, '2016-09-23', '20161', 1, '1', 'info@stmikadhiguna.ac.id', 'Y'),
	('5720116080', 'Leonardo Latuheru', 'Manado', '1998-07-16', 'L', 2, 'Mamboro jl.karana BTN 2 Block C2', '99999', 'Jeane senewe', 57201, '2016-09-23', '20161', 1, '1', 'llatuheru28@gmail.com', 'Y'),
	('5720116081', 'Otniel Saktianto', 'maranatha', '1996-10-01', 'L', 2, 'desa maranatha', '99999', 'Deice', 57201, '2016-09-23', '20161', 1, '1', 'info@stimikadhiguna.ac.id', 'Y'),
	('5720116082', 'Rhagil Mubaraq', 'palu', '1998-08-06', 'L', 1, 'sungai lambangan', '99999', 'ERMA SUSANTI', 57201, '2016-09-23', '20161', 1, '1', 'info@stimikadhiguna.ac.id', 'Y'),
	('5720116083', 'Setio Budi', 'Poso', '1997-07-01', 'L', 1, 'Jl.trans Sulawesi Desa Membuke', '99999', 'Tumini', 57201, '2016-09-23', '20161', 1, '1', 'setiobudi0107@gmail.com', 'Y'),
	('5720116084', 'Wahyu Yudha Pratama', 'palu', '1997-11-07', 'L', 1, 'Desa Bora', '99999', 'Adriani', 57201, '2016-09-23', '20161', 1, '1', 'info@stimikadhiguna.ac.id', 'Y'),
	('5720116085', 'Zulfikar Lili', 'Tambu', '1997-04-23', 'L', 1, 'Perumahan Citra Pesona Indah V Lagarutu', '99999', 'Dra.Nadira', 57201, '2016-09-23', '20161', 1, '1', 'Zulfikar98@gmail.com', 'Y'),
	('5720116086', 'Windawati', 'Kalawara', '1990-01-30', 'P', 1, 'Jl.sisingamangaraja No 10 A', '999999', 'Saipah', 57201, '2016-09-23', '20161', 1, '1', 'kromoprawirowinda89@gmail.com', 'Y'),
	('5720116087', 'Tri Putra Anugrah', 'Palu', '1996-03-19', 'L', 1, 'Jl. Ahmad yani No.', '999999', 'Masdinah', 57201, '2016-09-23', '20161', 1, '1', 'info@stmikadhiguna.ac.id', 'Y'),
	('5720116088', 'Medriksen K. Tarou', 'Lonca', '1997-05-08', 'L', 2, 'Jl. Kancil', '999999', 'Dence', 57201, '2016-09-23', '20161', 1, '1', 'info@stmikadhiguna.ac.id', 'Y'),
	('5720116089', 'Afrial Suwanda', 'Ketong', '1996-01-13', 'L', 1, 'Jl. Yos Sudarso', '999999', 'Salmia', 57201, '2016-09-23', '20161', 1, '1', 'info@stmikadhiguna.ac.id', 'Y'),
	('5720116090', 'Achmad Kurniawan', 'Tulo', '1997-10-10', 'L', 1, 'Jl. Trans Palu Kulawi Tulo', '999999', 'Lina', 57201, '2016-09-23', '20161', 1, '1', 'info@stmikadhiguna.ac.id', 'Y'),
	('5720116092', 'Mohammad Rizky', 'Boneoge', '1997-01-01', 'L', 1, 'Jl. Bukit Tinggi, Kel. Kabonena', '999999', 'Herlina', 57201, '2016-09-23', '20161', 1, '1', '-', 'Y');
/*!40000 ALTER TABLE `tb_mhs` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_mhs_data_krs
CREATE TABLE IF NOT EXISTS `tb_mhs_data_krs` (
  `id_data_krs` int(50) NOT NULL AUTO_INCREMENT,
  `id_krs` int(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `status_upload` enum('Y','N') NOT NULL DEFAULT 'N',
  `status_nilai` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_data_krs`),
  KEY `FK_tb_mhs_data_krs_tb_mhs_krs` (`id_krs`),
  KEY `FK_tb_mhs_data_krs_tb_kelas_kul` (`id_kelas`),
  CONSTRAINT `FK_tb_mhs_data_krs_tb_kelas_kul` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas_kul` (`id_kelas`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_mhs_data_krs_tb_mhs_krs` FOREIGN KEY (`id_krs`) REFERENCES `tb_mhs_krs` (`id_krs`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='get id krs dari tb_mhs_krs kemudian get kelas berdasarkan kurikulum dari tb_mhs_krs ';

-- Dumping data for table siakad_adhiguna_1.tb_mhs_data_krs: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_mhs_data_krs` DISABLE KEYS */;
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
  CONSTRAINT `FK_tb_mhs_krs_tb_kurikulum` FOREIGN KEY (`id_kurikulum`) REFERENCES `tb_kurikulum` (`id_kurikulum`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_mhs_krs_tb_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `tb_mhs` (`nim`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_mhs_krs: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_mhs_krs` DISABLE KEYS */;
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
  `status_upload` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_mhs`),
  KEY `FK_tb_mhs_lulus_tb_jenis_keluar` (`id_jns_keluar`),
  CONSTRAINT `FK_tb_mhs_lulus_tb_jenis_keluar` FOREIGN KEY (`id_jns_keluar`) REFERENCES `tb_jenis_keluar` (`id_jenis_keluar`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_mhs_lulus_tb_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `tb_mhs` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Selesai Input';

-- Dumping data for table siakad_adhiguna_1.tb_mhs_lulus: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_mhs_lulus` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_mhs_lulus` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_mhs_transfer
CREATE TABLE IF NOT EXISTS `tb_mhs_transfer` (
  `id_trans` int(10) NOT NULL AUTO_INCREMENT,
  `id_mhs` varchar(50) NOT NULL DEFAULT '0',
  `sks_diakui` int(10) NOT NULL DEFAULT '0',
  `pt_asal` varchar(50) DEFAULT '0',
  `prodi_asal` varchar(50) DEFAULT '0',
  `status_upload` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_trans`),
  UNIQUE KEY `id_mhs` (`id_mhs`),
  CONSTRAINT `FK_tb_mhs_transfer_tb_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `tb_mhs` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Sdh Input';

-- Dumping data for table siakad_adhiguna_1.tb_mhs_transfer: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_mhs_transfer` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_mhs_transfer` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_mk_kurikulum
CREATE TABLE IF NOT EXISTS `tb_mk_kurikulum` (
  `id_kur_mk` int(11) NOT NULL AUTO_INCREMENT,
  `kode_mk` varchar(50) NOT NULL,
  `id_kurikulum` int(11) NOT NULL,
  `status_upload` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_kur_mk`),
  KEY `kode_mk` (`kode_mk`),
  KEY `FK_tb_mk_kurikulum_tb_kurikulum` (`id_kurikulum`),
  CONSTRAINT `FK_tb_mk_kurikulum_tb_kurikulum` FOREIGN KEY (`id_kurikulum`) REFERENCES `tb_kurikulum` (`id_kurikulum`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_mk_kurikulum_tb_mata_kuliah` FOREIGN KEY (`kode_mk`) REFERENCES `tb_mata_kuliah` (`kode_mk`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=477 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_mk_kurikulum: ~260 rows (approximately)
/*!40000 ALTER TABLE `tb_mk_kurikulum` DISABLE KEYS */;
REPLACE INTO `tb_mk_kurikulum` (`id_kur_mk`, `kode_mk`, `id_kurikulum`, `status_upload`) VALUES
	(21, 'ST105IN3', 6, 'Y'),
	(24, 'T152UT2', 7, 'Y'),
	(25, 'T 171 UT1', 6, 'Y'),
	(27, 'T 171 UT1', 7, 'Y'),
	(30, 'ST 140 UT2', 7, 'Y'),
	(31, 'T 183 UT1', 7, 'Y'),
	(34, 'T148UT2', 7, 'Y'),
	(36, 'T156UT2', 7, 'Y'),
	(38, 'ST 182 UT1', 7, 'Y'),
	(40, 'ST 173 UT1', 7, 'Y'),
	(42, 'T 179 UT1', 7, 'Y'),
	(44, 'ST111IN2', 7, 'Y'),
	(46, 'ST122UT3', 7, 'Y'),
	(48, 'ST 158 UT3', 7, 'Y'),
	(50, 'ST114IN2', 7, 'Y'),
	(52, 'ST109IN3', 7, 'Y'),
	(54, 'T 143 UT2', 7, 'Y'),
	(56, 'T 182 UT1', 7, 'Y'),
	(58, 'ST 146 UT2', 7, 'Y'),
	(60, 'ST 177 UT1', 7, 'Y'),
	(62, 'ST 139 UT2', 7, 'Y'),
	(63, 'ST108IN3', 8, 'Y'),
	(65, 'ST108IN3', 7, 'Y'),
	(66, 'T 175 UT1', 7, 'Y'),
	(69, 'ST106IN2', 7, 'Y'),
	(71, 'ST 157 UT3', 7, 'Y'),
	(73, 'ST115IN2', 7, 'Y'),
	(75, 'ST 172 UT1', 7, 'Y'),
	(77, 'ST 145 UT3', 7, 'Y'),
	(79, 'ST 150 UT2', 7, 'Y'),
	(81, 'ST 141 UT2', 7, 'Y'),
	(83, 'ST 127 UT2', 7, 'Y'),
	(85, 'ST 167 UT1', 7, 'Y'),
	(87, 'ST117IN2', 7, 'Y'),
	(88, 'ST 160 UT6', 7, 'Y'),
	(90, 'ST126UT2 ', 6, 'Y'),
	(91, 'ST161ML2 ', 6, 'Y'),
	(93, 'T137UT2', 6, 'Y'),
	(94, 'T144UT2', 6, 'Y'),
	(95, 'ST110IN2', 6, 'Y'),
	(96, 'T134UT2', 6, 'Y'),
	(98, 'ST116IN2', 6, 'Y'),
	(100, 'ST440KB2', 6, 'Y'),
	(102, 'ST654KB3', 7, 'Y'),
	(103, 'ST151UT2', 6, 'Y'),
	(104, 'ST121UT3', 6, 'Y'),
	(105, 'ST165UT1', 6, 'Y'),
	(106, 'ST118UT2', 6, 'Y'),
	(107, 'T655KB3', 6, 'Y'),
	(108, 'T184ML1', 6, 'Y'),
	(110, 'ST164UT1 ', 6, 'Y'),
	(112, 'ST327KK3', 6, 'Y'),
	(113, 'ST113PK3', 6, 'Y'),
	(114, 'T153UT3', 6, 'Y'),
	(115, 'ST151UT2', 5, 'Y'),
	(117, 'S132UT2', 5, 'Y'),
	(119, 'ST166UT1', 5, 'Y'),
	(121, 'S137UT2', 5, 'Y'),
	(123, 'ST116IN2 ', 5, 'Y'),
	(126, 'ST120UT2 ', 5, 'Y'),
	(128, 'ST174UT1', 5, 'Y'),
	(131, 'ST438KB3', 8, 'Y'),
	(132, 'ST128UT3 ', 5, 'Y'),
	(134, 'S168UT1', 5, 'Y'),
	(136, 'ST164UT1', 5, 'Y'),
	(138, 'ST181UT1 ', 5, 'Y'),
	(140, 'S172UT1', 5, 'Y'),
	(142, 'ST107IN3', 5, 'Y'),
	(144, 'ST113IN3', 5, 'Y'),
	(146, 'ST159UT3', 5, 'Y'),
	(148, 'S134UT2', 5, 'Y'),
	(149, 'ST165UT1', 5, 'Y'),
	(151, 'ST102PK2', 5, 'Y'),
	(152, 'ST105IN3', 5, 'Y'),
	(154, 'ST142UT2', 5, 'Y'),
	(156, 'ST168UT1 ', 5, 'Y'),
	(158, 'S124UT3 ', 5, 'Y'),
	(160, 'ST118UT2 ', 5, 'Y'),
	(163, 'ST647PK2', 8, 'Y'),
	(164, 'S143UT2 ', 5, 'Y'),
	(167, 'S331KK2', 8, 'Y'),
	(168, 'S123UT3 ', 5, 'Y'),
	(170, 'S133UT3', 5, 'Y'),
	(172, 'S144UT3', 5, 'Y'),
	(174, 'ST103PK2', 5, 'Y'),
	(175, 'S170UT1 ', 5, 'Y'),
	(177, 'ST101PK2', 5, 'Y'),
	(178, 'ST126UT2 ', 5, 'Y'),
	(181, 'ST651KB2', 8, 'Y'),
	(183, 'S329KK3', 8, 'Y'),
	(184, 'S163ML2 ', 5, 'Y'),
	(186, 'ST101IN2', 5, 'Y'),
	(189, 'ST216PK2', 8, 'Y'),
	(190, 'ST104PK2', 5, 'Y'),
	(191, 'ST105PK2', 5, 'Y'),
	(192, 'ST117IN2', 8, 'Y'),
	(195, 'ST114IN2', 8, 'Y'),
	(196, 'ST 182 UT1', 8, 'Y'),
	(199, 'S167UT1', 8, 'Y'),
	(200, 'ST 172 UT1', 8, 'Y'),
	(203, 'S130UT2', 8, 'Y'),
	(204, 'ST122UT3', 8, 'Y'),
	(206, 'ST 140 UT2', 8, 'Y'),
	(208, 'ST 158 UT3', 8, 'Y'),
	(211, 'S135UT2', 8, 'Y'),
	(212, 'ST 139 UT2', 8, 'Y'),
	(215, 'S138UT2', 8, 'Y'),
	(216, 'ST 160 UT6', 8, 'Y'),
	(219, 'S165UT1', 8, 'Y'),
	(221, 'S112IN2', 8, 'Y'),
	(222, 'ST119UT2', 8, 'Y'),
	(223, 'ST 146 UT2', 8, 'Y'),
	(226, 'S169UT1', 8, 'Y'),
	(227, 'ST 173 UT1', 8, 'Y'),
	(230, 'S131UT2', 8, 'Y'),
	(232, 'S171IN1', 8, 'Y'),
	(234, 'ST 127 UT2', 8, 'Y'),
	(235, 'ST 141 UT2', 8, 'Y'),
	(237, 'ST 157 UT3', 8, 'Y'),
	(240, 'ST115IN2', 8, 'Y'),
	(241, 'ST 177 UT1', 8, 'Y'),
	(243, 'ST 167 UT1', 8, 'Y'),
	(246, 'S164UT1', 8, 'Y'),
	(247, 'S149UT2 ', 5, 'Y'),
	(249, 'S147UT2', 5, 'Y'),
	(251, 'S166UT1 ', 5, 'Y'),
	(253, 'ST110IN2', 5, 'Y'),
	(255, 'ST125UT3', 5, 'Y'),
	(257, 'ST121UT3', 5, 'Y'),
	(258, 'ST161ML2', 5, 'Y'),
	(260, 'ST129UT2', 5, 'Y'),
	(262, 'ST129UT2', 6, 'Y'),
	(266, 'ST119UT2', 7, 'Y'),
	(267, 'ST181UT1', 6, 'Y'),
	(269, 'ST120UT2 ', 6, 'Y'),
	(271, 'ST101IN2', 6, 'Y'),
	(273, 'T124UT3', 6, 'Y'),
	(274, 'ST159UT3', 6, 'Y'),
	(276, 'T147UT2 ', 6, 'Y'),
	(277, 'T149UT2', 6, 'Y'),
	(279, 'T180UT1 ', 6, 'Y'),
	(281, 'ST113IN3', 6, 'Y'),
	(283, 'ST107IN3', 6, 'Y'),
	(360, 'ST105IN3', 10, 'N'),
	(361, 'T 171 UT1', 10, 'N'),
	(362, 'ST126UT2 ', 10, 'N'),
	(363, 'ST161ML2 ', 10, 'N'),
	(364, 'T137UT2', 10, 'N'),
	(365, 'T144UT2', 10, 'N'),
	(366, 'ST110IN2', 10, 'N'),
	(367, 'T134UT2', 10, 'N'),
	(368, 'ST116IN2', 10, 'N'),
	(369, 'ST440KB2', 10, 'N'),
	(370, 'ST151UT2', 10, 'N'),
	(371, 'ST121UT3', 10, 'N'),
	(372, 'ST165UT1', 10, 'N'),
	(373, 'ST118UT2', 10, 'N'),
	(374, 'T655KB3', 10, 'N'),
	(375, 'T184ML1', 10, 'N'),
	(376, 'ST164UT1 ', 10, 'N'),
	(377, 'ST327KK3', 10, 'N'),
	(378, 'ST113PK3', 10, 'N'),
	(379, 'T153UT3', 10, 'N'),
	(380, 'ST129UT2', 10, 'N'),
	(381, 'ST181UT1', 10, 'N'),
	(382, 'ST120UT2 ', 10, 'N'),
	(383, 'ST101IN2', 10, 'N'),
	(384, 'T124UT3', 10, 'N'),
	(385, 'ST159UT3', 10, 'N'),
	(386, 'T147UT2 ', 10, 'N'),
	(387, 'T149UT2', 10, 'N'),
	(388, 'T180UT1 ', 10, 'N'),
	(389, 'ST113IN3', 10, 'N'),
	(390, 'ST107IN3', 10, 'N'),
	(391, 'ST151UT2', 9, 'N'),
	(392, 'S132UT2', 9, 'N'),
	(393, 'ST166UT1', 9, 'N'),
	(394, 'S137UT2', 9, 'N'),
	(395, 'ST116IN2 ', 9, 'N'),
	(396, 'ST120UT2 ', 9, 'N'),
	(397, 'ST174UT1', 9, 'N'),
	(398, 'ST128UT3 ', 9, 'N'),
	(399, 'S168UT1', 9, 'N'),
	(400, 'ST164UT1', 9, 'N'),
	(401, 'ST181UT1 ', 9, 'N'),
	(402, 'S172UT1', 9, 'N'),
	(403, 'ST107IN3', 9, 'N'),
	(404, 'ST113IN3', 9, 'N'),
	(405, 'ST159UT3', 9, 'N'),
	(406, 'S134UT2', 9, 'N'),
	(407, 'ST165UT1', 9, 'N'),
	(408, 'ST102PK2', 9, 'N'),
	(409, 'ST105IN3', 9, 'N'),
	(410, 'ST142UT2', 9, 'N'),
	(411, 'ST168UT1 ', 9, 'N'),
	(412, 'S124UT3 ', 9, 'N'),
	(413, 'ST118UT2 ', 9, 'N'),
	(414, 'S143UT2 ', 9, 'N'),
	(415, 'S123UT3 ', 9, 'N'),
	(416, 'S133UT3', 9, 'N'),
	(417, 'S144UT3', 9, 'N'),
	(418, 'ST103PK2', 9, 'N'),
	(419, 'S170UT1 ', 9, 'N'),
	(420, 'ST101PK2', 9, 'N'),
	(421, 'ST126UT2 ', 9, 'N'),
	(422, 'S163ML2 ', 9, 'N'),
	(423, 'ST101IN2', 9, 'N'),
	(424, 'ST104PK2', 9, 'N'),
	(425, 'ST105PK2', 9, 'N'),
	(426, 'S149UT2 ', 9, 'N'),
	(427, 'S147UT2', 9, 'N'),
	(428, 'S166UT1 ', 9, 'N'),
	(429, 'ST110IN2', 9, 'N'),
	(430, 'ST125UT3', 9, 'N'),
	(431, 'ST121UT3', 9, 'N'),
	(432, 'ST161ML2', 9, 'N'),
	(433, 'ST129UT2', 9, 'N'),
	(434, 'T170UT1', 10, 'N'),
	(435, 'S132UT2', 9, 'N'),
	(436, 'ST166UT1', 9, 'N'),
	(437, 'S137UT2', 9, 'N'),
	(438, 'ST142UT2', 10, 'N'),
	(439, 'ST120UT2 ', 9, 'N'),
	(440, 'ST166UT1', 10, 'N'),
	(441, 'ST128UT3 ', 9, 'N'),
	(442, 'T169UT1 ', 10, 'N'),
	(443, 'ST168UT1', 10, 'N'),
	(444, 'T176UT1', 10, 'N'),
	(445, 'S172UT1', 9, 'N'),
	(446, 'ST107IN3', 9, 'N'),
	(447, 'ST113IN3', 9, 'N'),
	(448, 'ST159UT3', 9, 'N'),
	(449, 'S134UT2', 9, 'N'),
	(450, 'ST165UT1', 9, 'N'),
	(451, 'ST102PK2', 9, 'N'),
	(452, 'ST105IN3', 9, 'N'),
	(453, 'ST142UT2', 9, 'N'),
	(454, 'ST168UT1 ', 9, 'N'),
	(455, 'S124UT3 ', 9, 'N'),
	(456, 'ST118UT2 ', 9, 'N'),
	(457, 'S143UT2 ', 9, 'N'),
	(458, 'S123UT3 ', 9, 'N'),
	(459, 'S133UT3', 9, 'N'),
	(460, 'S144UT3', 9, 'N'),
	(461, 'ST103PK2', 9, 'N'),
	(462, 'S170UT1 ', 9, 'N'),
	(463, 'ST101PK2', 9, 'N'),
	(464, 'ST126UT2 ', 9, 'N'),
	(465, 'S163ML2 ', 9, 'N'),
	(466, 'ST101IN2', 9, 'N'),
	(467, 'ST104PK2', 9, 'N'),
	(468, 'ST105PK2', 9, 'N'),
	(469, 'S149UT2 ', 9, 'N'),
	(470, 'S147UT2', 9, 'N'),
	(471, 'S166UT1 ', 9, 'N'),
	(472, 'ST110IN2', 9, 'N'),
	(473, 'ST125UT3', 9, 'N'),
	(474, 'ST121UT3', 9, 'N'),
	(475, 'ST161ML2', 9, 'N'),
	(476, 'ST129UT2', 9, 'N');
/*!40000 ALTER TABLE `tb_mk_kurikulum` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_nilai
CREATE TABLE IF NOT EXISTS `tb_nilai` (
  `id_nilai` int(10) NOT NULL AUTO_INCREMENT,
  `id_krs` int(10) NOT NULL DEFAULT '0',
  `nilai_angka` int(5) NOT NULL DEFAULT '0',
  `nilai_index` enum('4','3','2','1','0') NOT NULL,
  `nilai_huruf` varchar(10) NOT NULL DEFAULT '0',
  `status_upload` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_nilai`),
  KEY `FK_tb_nilai_tb_mhs_data_krs` (`id_krs`),
  CONSTRAINT `FK_tb_nilai_tb_mhs_data_krs` FOREIGN KEY (`id_krs`) REFERENCES `tb_mhs_data_krs` (`id_data_krs`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table siakad_adhiguna_1.tb_nilai: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_nilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_nilai` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_nilai_transfer
CREATE TABLE IF NOT EXISTS `tb_nilai_transfer` (
  `id_nilai_trans` int(10) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) NOT NULL DEFAULT '0',
  `kd_mk_asal` varchar(50) NOT NULL DEFAULT '0',
  `nm_mk` varchar(50) NOT NULL DEFAULT '0',
  `sks` int(11) NOT NULL DEFAULT '0',
  `nilai_huruf` enum('A','B','C','D','E') NOT NULL,
  `id_mk` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_nilai_trans`),
  KEY `FK__tb_mhs_transfer` (`id_mhs`),
  CONSTRAINT `FK__tb_mhs_transfer` FOREIGN KEY (`id_mhs`) REFERENCES `tb_mhs_transfer` (`id_trans`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table siakad_adhiguna_1.tb_nilai_transfer: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_nilai_transfer` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_nilai_transfer` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_pengumuman
CREATE TABLE IF NOT EXISTS `tb_pengumuman` (
  `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `tentang` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_pengumuman: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_pengumuman` DISABLE KEYS */;
REPLACE INTO `tb_pengumuman` (`id_pengumuman`, `judul`, `tentang`, `tanggal`, `status`) VALUES
	(1, 'Belanja Mata Kuliah', 'WAKTU PENGISIAN KARTU RENCANA STUDI MAHASISWA ANGK. 2016 TA 2016/2017 DIMULAI PADA HARI KAMIS TANGGAL 23 SEPTEMBER 2016\r\n<br>SILAHKAN MENGUNJUNGI\r\n<ul>\r\n	<li>http://siakad.stmikadhiguna.ac.id/siakad/sihas untuk akses public</li>\r\n	<li>http://10.10.10.4/siakad/sihas untuk akses lokal kampus</li>\r\n</ul>\r\n\r\n<br> UNTUK MENDAPATKAN AKUN SILAHKAN MEMVALIDASI NIM DI BAAK DENGAN MEMBAWA SLIP PEMBAYARAN DARI KEUANGAN\r\n\r\n<br>Distribusi AKUN dapat dilihat pada tanggal 23 September 2016', '2016-09-19 00:00:00', 'Y'),
	(2, 'Nomor Induk Mahasiswa Ang. 2016 Terbit', 'Berhubung Nomor Induk Mahasiswa Angkatan 2016 Telah Terbit Maka Untuk Proses Kelancaran Belanja Mata Kuliah Khususnya Pada Mahasiswa Semester 1 Tahun 20161 Semester Ganjil (periode 20161) Maka Kami Menyampaikan : \r\nAgar melakukan registrasi kembali kepihak keuangan dan melakukan validasi kepihak BAAK agar mendapatkan hak akses dengan membawa tanda bukti sah dari pihak keuangan.', '2016-09-19 23:20:55', 'N'),
	(3, 'Kendala Pengisian Belanja Mata di SIHAS', 'Jika Mempunya Kendala Pengisian KRS Silahkan Menghubungi ADMIN SIHAS (Sofyan Saputra) || 081244224077', '2016-09-20 00:00:00', 'Y'),
	(4, 'PANDUAN PENGISIAN KRS', 'CARA MENGISI KARTU RENCANA STUDI (KRS)\r\nSETELAH MELAKUKAN VALIDASI \r\nKUNJUNGI http://siakad.stmikadhiguna.ac.id/siakad/sihas jika akses diluar kampus\r\nKunjungi 10.10.10.4/siakad/sihas jika akses didalam kampus\r\n<ul>\r\n	<li>KEMUDIAN MASUKAN NIM PADA KOLOM USERNAME DAN NIM PADA KOLOM PASSWORD</li>\r\n	<li>SETELAH BERANDA MUNCUL SOROT MOUSE KE AKTIFITAS MATA KULIAH->KRS</li>\r\n	<li>KEMUDIAN LIHAT LIST KRS  nim 5720116001 MASIH MEMPUNYAI 1 DAFTAR KRS PERHATIKAN PERIODE JIKA HIJAU BERARTI KRS BERADA DI PERIODE AKTIF</li>\r\n	<li>KEMUDIAN KLIK ACTION</li>\r\n	<li>KEMUDIAN SOROT MOUSE KE BAGIAN KURIKULUM : PILIH KURIKULUM AKTIF CONTOH SAAT INI KURIKULUM ADALAH KURIKULUM 20161 -> KLIK SET KURIKULUM</li>\r\n	<li>KEMUDIAN PILIH KELAS YANG SESUAI DENGAN KELAS ANDA BESERTA MATA KULIAH HANYA SEMESTER SATU HAL INI DITANDAI DENGAN : PENDIDIKAN AGAMA ISLAM | <b><i>SI.I.1</i></b> | 20161 <br>SI/TI : Menandakan JURUSAN<br>I : Menandakan SEMESTER<br>1 : Menandakan KELAS</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>SESUAIKAN BELANJA MATA KULIAH ANDA CEK KEMBALI JIKA TERDAPAT MATA KULIAH DAN KELAS YANG SAMA</li>\r\n	<li>JIKA PENGISIAN SELESAI SILAHKAN LOGOUT</li>\r\n</ul>\r\n\r\n\r\n\r\n\r\n\r\n', '2016-09-20 00:00:00', 'Y');
/*!40000 ALTER TABLE `tb_pengumuman` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_prodi
CREATE TABLE IF NOT EXISTS `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `nm_prodi` mediumtext NOT NULL,
  `nm_ketua` mediumtext,
  PRIMARY KEY (`id_prodi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table siakad_adhiguna_1.tb_prodi: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_prodi` DISABLE KEYS */;
REPLACE INTO `tb_prodi` (`id_prodi`, `nm_prodi`, `nm_ketua`) VALUES
	(55201, 'TEKNIK INFORMATIKA', 'Budi Mulyono, S.Kom,. M.Kom'),
	(57201, 'SISTEM INFORMASI', 'Moh. Risaldi, S.Kom,. M.Kom');
/*!40000 ALTER TABLE `tb_prodi` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_proposal
CREATE TABLE IF NOT EXISTS `tb_proposal` (
  `id_mhs_proposal` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` varchar(50) NOT NULL DEFAULT '0',
  `judul` text NOT NULL,
  `id_pembimbing_1` int(11) NOT NULL,
  `id_pembimbing_2` int(11) NOT NULL,
  `tgl_daftar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl_kadaluarsa` datetime NOT NULL,
  `status_daftar` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id_mhs_proposal`),
  KEY `FK_tb_mhs_proposal_tb_mhs` (`id_mhs`),
  KEY `FK_tb_proposal_tb_dosen_pembimbing` (`id_pembimbing_1`),
  KEY `FK_tb_proposal_tb_dosen_pembimbing_2` (`id_pembimbing_2`),
  CONSTRAINT `FK_tb_mhs_proposal_tb_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `tb_mhs` (`nim`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_proposal_tb_dosen_pembimbing` FOREIGN KEY (`id_pembimbing_1`) REFERENCES `tb_dosen_pembimbing` (`id_pembimbing`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_proposal_tb_dosen_pembimbing_2` FOREIGN KEY (`id_pembimbing_2`) REFERENCES `tb_dosen_pembimbing` (`id_pembimbing`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_proposal: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_proposal` DISABLE KEYS */;
REPLACE INTO `tb_proposal` (`id_mhs_proposal`, `id_mhs`, `judul`, `id_pembimbing_1`, `id_pembimbing_2`, `tgl_daftar`, `tgl_kadaluarsa`, `status_daftar`) VALUES
	(3, '5520111189', 'ncvvcnbmnb', 1, 2, '2016-10-10 11:41:06', '2016-12-22 21:06:34', 'Y'),
	(5, '5520116046', 'hgyv', 1, 2, '2016-03-03 00:00:00', '2016-12-03 00:00:00', 'N');
/*!40000 ALTER TABLE `tb_proposal` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_proposal_maju
CREATE TABLE IF NOT EXISTS `tb_proposal_maju` (
  `id_proposal_maju` int(11) NOT NULL AUTO_INCREMENT,
  `id_proposal` int(11) NOT NULL,
  `kode_bayar` varchar(50) NOT NULL,
  `bebas_pustaka` enum('Y','N') NOT NULL DEFAULT 'N',
  `bebas_smt` enum('Y','N') NOT NULL DEFAULT 'N',
  `tgl_daftar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_proposal_maju`),
  UNIQUE KEY `kode_bayar` (`kode_bayar`),
  KEY `FK_tb_proposal_maju_tb_proposal` (`id_proposal`),
  CONSTRAINT `FK_tb_proposal_maju_tb_proposal` FOREIGN KEY (`id_proposal`) REFERENCES `tb_proposal` (`id_mhs_proposal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_proposal_maju: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_proposal_maju` DISABLE KEYS */;
REPLACE INTO `tb_proposal_maju` (`id_proposal_maju`, `id_proposal`, `kode_bayar`, `bebas_pustaka`, `bebas_smt`, `tgl_daftar`) VALUES
	(1, 3, '12345', 'Y', 'Y', '2016-09-22 00:00:00'),
	(3, 5, '1234err', 'Y', 'Y', '2016-10-10 00:00:00');
/*!40000 ALTER TABLE `tb_proposal_maju` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_setting
CREATE TABLE IF NOT EXISTS `tb_setting` (
  `id_sett` int(2) NOT NULL AUTO_INCREMENT,
  `kode_feed` varchar(50) NOT NULL DEFAULT '0',
  `pass_feed` varchar(50) NOT NULL DEFAULT '0',
  `role` enum('M','P','A') NOT NULL DEFAULT 'P',
  `url_ws` enum('L','P') NOT NULL DEFAULT 'L',
  `mode` enum('LIVE','SANDBOX') NOT NULL,
  `link` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sett`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table siakad_adhiguna_1.tb_setting: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_setting` DISABLE KEYS */;
REPLACE INTO `tb_setting` (`id_sett`, `kode_feed`, `pass_feed`, `role`, `url_ws`, `mode`, `link`) VALUES
	(1, 'MDkzMTEx', 'c3RtMWs3ODg2ODhBREgxZ3ZuQA==', 'M', 'L', 'SANDBOX', 'http://10.10.10.4:8082/ws/'),
	(2, 'MDkzMTEx', 'c3RtMWs3ODg2ODhBREgxZ3ZuQA==', 'A', 'L', 'SANDBOX', 'http://10.10.10.4:8082/ws/'),
	(3, 'MDkzMTEx', 'c3RtMWs3ODg2ODhBREgxZ3ZuQA==', 'P', 'L', 'SANDBOX', 'http://10.10.10.4:8082/ws/');
/*!40000 ALTER TABLE `tb_setting` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_skripsi
CREATE TABLE IF NOT EXISTS `tb_skripsi` (
  `id_skripsi` int(11) NOT NULL AUTO_INCREMENT,
  `id_proposal_maju` int(11) NOT NULL,
  `bebas_pustaka` enum('Y','N') NOT NULL DEFAULT 'N',
  `bebas_smt` enum('Y','N') NOT NULL DEFAULT 'N',
  `bebas_proposal` enum('Y','N') NOT NULL DEFAULT 'N',
  `tgl_daftar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_skripsi`),
  KEY `FK__tb_proposal_maju` (`id_proposal_maju`),
  CONSTRAINT `FK__tb_proposal_maju` FOREIGN KEY (`id_proposal_maju`) REFERENCES `tb_proposal_maju` (`id_proposal_maju`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table siakad_adhiguna_1.tb_skripsi: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_skripsi` DISABLE KEYS */;
REPLACE INTO `tb_skripsi` (`id_skripsi`, `id_proposal_maju`, `bebas_pustaka`, `bebas_smt`, `bebas_proposal`, `tgl_daftar`) VALUES
	(2, 1, 'N', 'N', 'N', '2016-10-07 10:24:23');
/*!40000 ALTER TABLE `tb_skripsi` ENABLE KEYS */;


-- Dumping structure for table siakad_adhiguna_1.tb_status_mhs
CREATE TABLE IF NOT EXISTS `tb_status_mhs` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nm_status` char(2) NOT NULL,
  `ket` mediumtext,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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


-- Dumping structure for view siakad_adhiguna_1.v_bayar_lain
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_bayar_lain` (
	`nim` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`kode_bayar` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`statusbayar` VARCHAR(22) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nama_jns_bayar` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
	`keterangan` MEDIUMTEXT NULL COLLATE 'utf8_general_ci',
	`awb` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_bayar_smt
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_bayar_smt` (
	`nim` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`awb` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`kode_bayar` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`statusbayar` VARCHAR(22) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nama_jns_bayar` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
	`keterangan` MEDIUMTEXT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_count_down
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_count_down` (
	`id_cd_krs` INT(11) NOT NULL,
	`waktu_buka` DATETIME NOT NULL,
	`waktu_tutup` DATETIME NOT NULL,
	`ta` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`kd_prodi` INT(11) NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_count_down_khs
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_count_down_khs` (
	`id_cd_khs` INT(11) NOT NULL,
	`waktu_buka` DATETIME NOT NULL,
	`waktu_tutup` DATETIME NOT NULL,
	`ta` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`kd_prodi` INT(11) NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_data_krs
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_data_krs` (
	`id_data_krs` INT(50) NOT NULL,
	`status_nilai` ENUM('Y','N') NOT NULL COLLATE 'utf8_general_ci',
	`id_kelas` INT(11) NOT NULL,
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mhs` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_matkul` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mk` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`sks` INT(11) NOT NULL,
	`nm_kelas` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ta` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`id_prodi` INT(11) NOT NULL,
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci',
	`id_krs` INT(11) NOT NULL,
	`nm_dosen` TEXT NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_dosen_pembimbing
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_dosen_pembimbing` (
	`id_pembimbing` INT(11) NOT NULL,
	`id_dosen` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_dosen` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`status` ENUM('1','2') NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_dosen_penguji
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_dosen_penguji` (
	`id_dosen_penguji` INT(11) NOT NULL,
	`id_proposal_maju` INT(11) NOT NULL,
	`id_dosen` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`penguji` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`jabatan_penguji` ENUM('1','2','3','4','5') NOT NULL COLLATE 'latin1_swedish_ci',
	`id_proposal` INT(11) NOT NULL,
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci',
	`judul` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`id_pembimbing_1` INT(11) NOT NULL,
	`pembimbing_1` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`id_pembimbing_2` INT(11) NOT NULL,
	`pembimbing_2` TEXT NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_kelas_dosen
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_kelas_dosen` (
	`id_kelas_dosen` INT(11) NOT NULL,
	`validasi_baak` ENUM('Y','N') NOT NULL COLLATE 'latin1_swedish_ci',
	`id_kurikulum` INT(10) NOT NULL,
	`id_kelas_kuliah` INT(11) NOT NULL,
	`nidn` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_dosen` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`kode_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mk` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_kelas` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`r_t_muka` INT(11) NOT NULL,
	`t_muka` INT(11) NOT NULL,
	`ta` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`id_prodi` INT(11) NOT NULL,
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_kelas_kuliah
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_kelas_kuliah` (
	`id_kelas` INT(11) NOT NULL,
	`id_kurikulum` INT(11) NOT NULL,
	`kode_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mk` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`ta` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`nm_kelas` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_prodi` INT(11) NOT NULL,
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_list_proposal
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_list_proposal` (
	`id_mhs_proposal` INT(11) NOT NULL,
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mhs` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_pembimbing_1` INT(11) NOT NULL,
	`pembimbing_1` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`id_pembimbing_2` INT(11) NOT NULL,
	`pembimbing_2` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`id_prodi` INT(11) NOT NULL,
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci',
	`judul` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`setor_judul` DATETIME NOT NULL,
	`tgl_kadaluarsa` DATETIME NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_login_dosen
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_login_dosen` (
	`id_login_dosen` INT(11) NOT NULL,
	`id_kelas_dosen` INT(11) NOT NULL,
	`username` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`password` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`level` ENUM('dosen','pengampu') NOT NULL COLLATE 'latin1_swedish_ci',
	`id_kelas` INT(11) NOT NULL,
	`nm_kelas` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_matkul` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mk` TEXT NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_mhs_aktif
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_mhs_aktif` (
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mhs` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tpt_lhr` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_lahir` DATE NOT NULL,
	`jenkel` ENUM('L','P') NOT NULL COLLATE 'latin1_swedish_ci',
	`agama` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`alamat` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`wilayah` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci',
	`tgl_masuk` DATE NOT NULL,
	`smt_masuk` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_status` CHAR(2) NOT NULL COLLATE 'utf8_general_ci',
	`keterangan` MEDIUMTEXT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_mhs_krs
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_mhs_krs` (
	`id_krs` INT(11) NOT NULL,
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`kode_pembayaran` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_kurikulum` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`ta` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`status_ambil` ENUM('Y','T') NOT NULL COLLATE 'latin1_swedish_ci',
	`status_cek` ENUM('Y','N') NOT NULL COLLATE 'latin1_swedish_ci',
	`kd_prodi` INT(11) NOT NULL,
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci'
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
	`nm_jenis_keluar` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
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
	`id_trans` INT(10) NOT NULL,
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`prodi_asal` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`pt_asal` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`sks_diakui` INT(10) NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_mk_kurikulum
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_mk_kurikulum` (
	`id_kur_mk` INT(11) NOT NULL,
	`kode_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mk` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`sks` INT(11) NOT NULL,
	`semester` INT(11) UNSIGNED NOT NULL,
	`id_kurikulum` INT(11) NOT NULL,
	`nm_kurikulum` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`ta` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`kd_prodi` INT(11) NOT NULL,
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_nilai
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_nilai` (
	`id_nilai` INT(10) NOT NULL,
	`id_krs` INT(50) NOT NULL,
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mhs` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`kode_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mk` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`sks` INT(11) NOT NULL,
	`ta` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`nm_kelas` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nilai_angka` INT(5) NOT NULL,
	`nilai_index` ENUM('4','3','2','1','0') NOT NULL COLLATE 'utf8_general_ci',
	`nilai_huruf` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`id_prodi` INT(11) NOT NULL,
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_proposal
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_proposal` (
	`id_mhs_proposal` INT(11) NOT NULL,
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mhs` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_pembimbing_1` INT(11) NOT NULL,
	`pembimbing_1` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`id_pembimbing_2` INT(11) NOT NULL,
	`pembimbing_2` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`id_prodi` INT(11) NOT NULL,
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci',
	`judul` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`setor_judul` DATETIME NOT NULL,
	`tgl_kadaluarsa` DATETIME NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_proposal_maju
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_proposal_maju` (
	`id_proposal_maju` INT(11) NOT NULL,
	`id_mhs_proposal` INT(11) NOT NULL,
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mhs` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_pembimbing_1` INT(11) NOT NULL,
	`pembimbing_1` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`nidn_pembimbing_1` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_pembimbing_2` INT(11) NOT NULL,
	`nidn_pembimbing_2` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`pembimbing_2` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`id_prodi` INT(11) NOT NULL,
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci',
	`judul` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`bebas_pustaka` ENUM('Y','N') NOT NULL COLLATE 'latin1_swedish_ci',
	`bebas_smt` ENUM('Y','N') NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_daftar` DATETIME NOT NULL,
	`kode_bayar` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_skripsi
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_skripsi` (
	`id_skripsi` INT(11) NOT NULL,
	`bebas_pustaka` ENUM('Y','N') NOT NULL COLLATE 'latin1_swedish_ci',
	`bebas_smt` ENUM('Y','N') NOT NULL COLLATE 'latin1_swedish_ci',
	`bebas_proposal` ENUM('Y','N') NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_daftar` DATETIME NOT NULL,
	`id_proposal_maju` INT(11) NOT NULL,
	`id_pembimbing_1` INT(11) NOT NULL,
	`pembimbing_1` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`id_pembimbing_2` INT(11) NOT NULL,
	`pembimbing_2` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mhs` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci',
	`judul` TEXT NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_sync_data_krs
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_sync_data_krs` (
	`id_data_krs` INT(50) NOT NULL,
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mhs` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_matkul` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mk` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_kelas` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ta` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`id_prodi` INT(11) NOT NULL,
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci',
	`status_upload` ENUM('Y','N') NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_sync_kelas_dosen
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_sync_kelas_dosen` (
	`nidn` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_dosen` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`kode_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mk` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_kelas` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`r_t_muka` INT(11) NOT NULL,
	`t_muka` INT(11) NOT NULL,
	`ta` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`id_prodi` INT(11) NOT NULL,
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_sync_kelas_kuliah
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_sync_kelas_kuliah` (
	`id_kelas` INT(11) NOT NULL,
	`kode_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mk` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`ta` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`nm_kelas` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_prodi` INT(11) NOT NULL,
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci',
	`status_upload` ENUM('Y','N') NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_sync_mhs
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_sync_mhs` (
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mhs` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tpt_lhr` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_lahir` DATE NOT NULL,
	`jenkel` ENUM('L','P') NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_ibu` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`agama` INT(11) NOT NULL COMMENT 'admin',
	`alamat` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`wilayah` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci',
	`tgl_masuk` DATE NOT NULL,
	`smt_masuk` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_status` CHAR(2) NOT NULL COLLATE 'utf8_general_ci',
	`keterangan` MEDIUMTEXT NULL COLLATE 'utf8_general_ci',
	`status_upload` ENUM('Y','N') NULL COLLATE 'latin1_swedish_ci',
	`id_prodi` INT(11) NOT NULL,
	`status_awal` ENUM('1','2') NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_sync_mhs_lulus
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_sync_mhs_lulus` (
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mhs` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tpt_lhr` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_lahir` DATE NOT NULL,
	`jenkel` ENUM('L','P') NOT NULL COLLATE 'latin1_swedish_ci',
	`alamat` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`wilayah` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_masuk` DATE NOT NULL,
	`smt_masuk` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_jenis_keluar` INT(10) NOT NULL,
	`tgl_keluar` DATE NULL,
	`jalur_skripsi` ENUM('1','0') NULL COLLATE 'latin1_swedish_ci',
	`judul_skripsi` TEXT NULL COLLATE 'latin1_swedish_ci',
	`bln_awal_bim` DATE NULL,
	`bln_akhir_bim` DATE NULL,
	`sk_yudisium` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`IPK` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`no_ijazah` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ket` TEXT NULL COLLATE 'latin1_swedish_ci',
	`status_upload` ENUM('Y','N') NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_sync_mk_kurikulum
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_sync_mk_kurikulum` (
	`id_kur_mk` INT(11) NOT NULL,
	`kode_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mk` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`sks` INT(11) NOT NULL,
	`semester` INT(11) UNSIGNED NOT NULL,
	`id_kurikulum` INT(11) NOT NULL,
	`nm_kurikulum` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`ta` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`kd_prodi` INT(11) NOT NULL,
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_sync_nilai
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_sync_nilai` (
	`id_nilai` INT(10) NOT NULL,
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mhs` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`kode_mk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mk` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`ta` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`nm_kelas` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nilai_angka` INT(5) NOT NULL,
	`nilai_index` ENUM('4','3','2','1','0') NOT NULL COLLATE 'utf8_general_ci',
	`nilai_huruf` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`id_prodi` INT(11) NOT NULL,
	`nm_prodi` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci',
	`status_upload` ENUM('Y','N') NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.z_login_mhs
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `z_login_mhs` (
	`id_user` INT(10) NOT NULL,
	`kode_bayar` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`username` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`password` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`level` ENUM('mhs') NOT NULL COLLATE 'latin1_swedish_ci',
	`val_periode` ENUM('Y','N') NOT NULL COLLATE 'latin1_swedish_ci',
	`status_cek` ENUM('Y','N') NOT NULL COLLATE 'latin1_swedish_ci',
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_mhs` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`status_mhs` INT(4) NOT NULL,
	`ta` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`id_prodi` INT(11) NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.z_mhs_krs
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `z_mhs_krs` (
	`id_krs` INT(11) NOT NULL,
	`nim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`kode_pembayaran` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_kurikulum` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`ta` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`status_ambil` ENUM('Y','T') NOT NULL COLLATE 'latin1_swedish_ci',
	`status_cek` ENUM('Y','N') NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.z_mhs_pembayaran
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `z_mhs_pembayaran` (
	`nim` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`nama_jns_bayar` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
	`jml_biaya` INT(11) NOT NULL,
	`jumlah_bayar` INT(11) NOT NULL,
	`statusbayar` VARCHAR(22) NOT NULL COLLATE 'utf8mb4_general_ci',
	`keterangan` MEDIUMTEXT NULL COLLATE 'utf8_general_ci',
	`status` ENUM('A','P') NOT NULL COLLATE 'latin1_swedish_ci',
	`kode_bayar` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siakad_adhiguna_1.v_bayar_lain
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_bayar_lain`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_bayar_lain` AS select `view_pembayaran`.`nim` AS `nim`,`view_pembayaran`.`kode_bayar` AS `kode_bayar`,`view_pembayaran`.`statusbayar` AS `statusbayar`,`view_pembayaran`.`nama_jns_bayar` AS `nama_jns_bayar`,`view_pembayaran`.`keterangan` AS `keterangan`,`view_pembayaran`.`no_referensi` AS `awb` from `siami`.`view_pembayaran` where ((not((`view_pembayaran`.`nama_jns_bayar` like '%Semester%'))) and (`view_pembayaran`.`statusbayar` = 'Lunas'));


-- Dumping structure for view siakad_adhiguna_1.v_bayar_smt
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_bayar_smt`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_bayar_smt` AS select `view_pembayaran`.`nim` AS `nim`,`view_pembayaran`.`no_referensi` AS `awb`,`view_pembayaran`.`kode_bayar` AS `kode_bayar`,`view_pembayaran`.`statusbayar` AS `statusbayar`,`view_pembayaran`.`nama_jns_bayar` AS `nama_jns_bayar`,`view_pembayaran`.`keterangan` AS `keterangan` from `siami`.`view_pembayaran` where ((`view_pembayaran`.`nama_jns_bayar` = 'Semester') and (`view_pembayaran`.`statusbayar` = 'Lunas'));


-- Dumping structure for view siakad_adhiguna_1.v_count_down
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_count_down`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_count_down` AS select `m1`.`id_cd_krs` AS `id_cd_krs`,`m1`.`waktu_buka` AS `waktu_buka`,`m1`.`waktu_tutup` AS `waktu_tutup`,`m2`.`ta` AS `ta`,`m2`.`kd_prodi` AS `kd_prodi` from (`tb_cd_krs` `m1` join `tb_kurikulum` `m2` on((`m1`.`id_kurikulum` = `m2`.`id_kurikulum`)));


-- Dumping structure for view siakad_adhiguna_1.v_count_down_khs
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_count_down_khs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_count_down_khs` AS select `m1`.`id_cd_khs` AS `id_cd_khs`,`m1`.`waktu_buka` AS `waktu_buka`,`m1`.`waktu_tutup` AS `waktu_tutup`,`m2`.`ta` AS `ta`,`m2`.`kd_prodi` AS `kd_prodi` from (`tb_cd_khs` `m1` join `tb_kurikulum` `m2` on((`m1`.`id_kurikulum` = `m2`.`id_kurikulum`)));


-- Dumping structure for view siakad_adhiguna_1.v_data_krs
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_data_krs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_data_krs` AS select `m1`.`id_data_krs` AS `id_data_krs`,`m1`.`status_nilai` AS `status_nilai`,`m1`.`id_kelas` AS `id_kelas`,`m3`.`nim` AS `nim`,`m3`.`nm_mhs` AS `nm_mhs`,`m4`.`id_matkul` AS `id_matkul`,`m5`.`nm_mk` AS `nm_mk`,`m5`.`sks` AS `sks`,`m4`.`nm_kelas` AS `nm_kelas`,`m7`.`ta` AS `ta`,`m6`.`id_prodi` AS `id_prodi`,`m6`.`nm_prodi` AS `nm_prodi`,`m2`.`id_krs` AS `id_krs`,`m9`.`nm_dosen` AS `nm_dosen` from ((((((((`tb_mhs_data_krs` `m1` join `tb_mhs_krs` `m2` on((`m1`.`id_krs` = `m2`.`id_krs`))) join `tb_mhs` `m3` on((`m2`.`id_mhs` = `m3`.`nim`))) join `tb_kelas_kul` `m4` on((`m1`.`id_kelas` = `m4`.`id_kelas`))) join `tb_mata_kuliah` `m5` on((`m4`.`id_matkul` = `m5`.`kode_mk`))) join `tb_prodi` `m6` on((`m4`.`id_prodi` = `m6`.`id_prodi`))) join `tb_kurikulum` `m7` on((`m4`.`id_kurikulum` = `m7`.`id_kurikulum`))) join `tb_kelas_dosen` `m8` on((`m4`.`id_kelas` = `m8`.`id_kelas_kuliah`))) join `tb_dosen` `m9` on((`m8`.`id_dosen` = `m9`.`nidn`)));


-- Dumping structure for view siakad_adhiguna_1.v_dosen_pembimbing
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_dosen_pembimbing`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_dosen_pembimbing` AS select `m1`.`id_pembimbing` AS `id_pembimbing`,`m1`.`id_dosen` AS `id_dosen`,`m2`.`nm_dosen` AS `nm_dosen`,`m1`.`status` AS `status` from (`tb_dosen_pembimbing` `m1` join `tb_dosen` `m2` on((`m1`.`id_dosen` = `m2`.`nidn`)));


-- Dumping structure for view siakad_adhiguna_1.v_dosen_penguji
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_dosen_penguji`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_dosen_penguji` AS select `m9`.`id_dosen_penguji` AS `id_dosen_penguji`,`m9`.`id_proposal_maju` AS `id_proposal_maju`,`m9`.`id_dosen` AS `id_dosen`,`m10`.`nm_dosen` AS `penguji`,`m9`.`jabatan_penguji` AS `jabatan_penguji`,`m8`.`id_proposal` AS `id_proposal`,`m7`.`nm_prodi` AS `nm_prodi`,`m1`.`judul` AS `judul`,`m2`.`id_pembimbing` AS `id_pembimbing_1`,`m3`.`nm_dosen` AS `pembimbing_1`,`m4`.`id_pembimbing` AS `id_pembimbing_2`,`m5`.`nm_dosen` AS `pembimbing_2` from (((((((((`tb_dosen_penguji` `m9` join `tb_proposal_maju` `m8` on((`m9`.`id_proposal_maju` = `m8`.`id_proposal_maju`))) join `tb_proposal` `m1` on((`m8`.`id_proposal` = `m1`.`id_mhs_proposal`))) join `tb_dosen_pembimbing` `m2` on((`m1`.`id_pembimbing_1` = `m2`.`id_pembimbing`))) join `tb_dosen` `m3` on((`m2`.`id_dosen` = `m3`.`nidn`))) join `tb_dosen_pembimbing` `m4` on((`m1`.`id_pembimbing_2` = `m4`.`id_pembimbing`))) join `tb_dosen` `m5` on((`m4`.`id_dosen` = `m5`.`nidn`))) join `tb_mhs` `m6` on((`m1`.`id_mhs` = `m6`.`nim`))) join `tb_prodi` `m7` on((`m6`.`kd_prodi` = `m7`.`id_prodi`))) join `tb_dosen` `m10` on((`m9`.`id_dosen` = `m10`.`nidn`)));


-- Dumping structure for view siakad_adhiguna_1.v_kelas_dosen
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_kelas_dosen`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kelas_dosen` AS select `m1`.`id_kelas_dosen` AS `id_kelas_dosen`,`m1`.`validasi_baak` AS `validasi_baak`,`m5`.`id_kurikulum` AS `id_kurikulum`,`m1`.`id_kelas_kuliah` AS `id_kelas_kuliah`,`m3`.`nidn` AS `nidn`,`m3`.`nm_dosen` AS `nm_dosen`,`m4`.`kode_mk` AS `kode_mk`,`m4`.`nm_mk` AS `nm_mk`,`m2`.`nm_kelas` AS `nm_kelas`,`m1`.`r_t_muka` AS `r_t_muka`,`m1`.`t_muka` AS `t_muka`,`m5`.`ta` AS `ta`,`m6`.`id_prodi` AS `id_prodi`,`m6`.`nm_prodi` AS `nm_prodi` from (((((`tb_kelas_dosen` `m1` join `tb_kelas_kul` `m2` on((`m1`.`id_kelas_kuliah` = `m2`.`id_kelas`))) join `tb_dosen` `m3` on((`m1`.`id_dosen` = `m3`.`nidn`))) join `tb_mata_kuliah` `m4` on((`m2`.`id_matkul` = `m4`.`kode_mk`))) join `tb_kurikulum` `m5` on((`m2`.`id_kurikulum` = `m5`.`id_kurikulum`))) join `tb_prodi` `m6` on((`m2`.`id_prodi` = `m6`.`id_prodi`)));


-- Dumping structure for view siakad_adhiguna_1.v_kelas_kuliah
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_kelas_kuliah`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kelas_kuliah` AS select `m1`.`id_kelas` AS `id_kelas`,`m1`.`id_kurikulum` AS `id_kurikulum`,`m2`.`kode_mk` AS `kode_mk`,`m2`.`nm_mk` AS `nm_mk`,`m3`.`ta` AS `ta`,`m1`.`nm_kelas` AS `nm_kelas`,`m4`.`id_prodi` AS `id_prodi`,`m4`.`nm_prodi` AS `nm_prodi` from (((`tb_kelas_kul` `m1` join `tb_mata_kuliah` `m2` on((`m1`.`id_matkul` = `m2`.`kode_mk`))) join `tb_kurikulum` `m3` on((`m1`.`id_kurikulum` = `m3`.`id_kurikulum`))) join `tb_prodi` `m4` on((`m1`.`id_prodi` = `m4`.`id_prodi`)));


-- Dumping structure for view siakad_adhiguna_1.v_list_proposal
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_list_proposal`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_list_proposal` AS select `m1`.`id_mhs_proposal` AS `id_mhs_proposal`,`m6`.`nim` AS `nim`,`m6`.`nm_mhs` AS `nm_mhs`,`m1`.`id_pembimbing_1` AS `id_pembimbing_1`,`m3`.`nm_dosen` AS `pembimbing_1`,`m1`.`id_pembimbing_2` AS `id_pembimbing_2`,`m5`.`nm_dosen` AS `pembimbing_2`,`m7`.`id_prodi` AS `id_prodi`,`m7`.`nm_prodi` AS `nm_prodi`,`m1`.`judul` AS `judul`,`m1`.`tgl_daftar` AS `setor_judul`,`m1`.`tgl_kadaluarsa` AS `tgl_kadaluarsa` from ((((((`tb_proposal` `m1` join `tb_dosen_pembimbing` `m2` on((`m1`.`id_pembimbing_1` = `m2`.`id_pembimbing`))) join `tb_dosen` `m3` on((`m2`.`id_dosen` = `m3`.`nidn`))) join `tb_dosen_pembimbing` `m4` on((`m1`.`id_pembimbing_2` = `m4`.`id_pembimbing`))) join `tb_dosen` `m5` on((`m4`.`id_dosen` = `m5`.`nidn`))) join `tb_mhs` `m6` on((`m1`.`id_mhs` = `m6`.`nim`))) join `tb_prodi` `m7` on((`m6`.`kd_prodi` = `m7`.`id_prodi`))) where (`m1`.`status_daftar` = 'N');


-- Dumping structure for view siakad_adhiguna_1.v_login_dosen
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_login_dosen`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_login_dosen` AS select `m1`.`id_login_dosen` AS `id_login_dosen`,`m1`.`id_kelas_dosen` AS `id_kelas_dosen`,`m1`.`username` AS `username`,`m1`.`password` AS `password`,`m1`.`level` AS `level`,`m3`.`id_kelas` AS `id_kelas`,`m3`.`nm_kelas` AS `nm_kelas`,`m3`.`id_matkul` AS `id_matkul`,`m5`.`nm_mk` AS `nm_mk` from ((((`login_dosen` `m1` join `tb_kelas_dosen` `m2` on((`m1`.`id_kelas_dosen` = `m2`.`id_kelas_dosen`))) join `tb_kelas_kul` `m3` on((`m2`.`id_kelas_kuliah` = `m3`.`id_kelas`))) join `tb_dosen` `m4` on((`m2`.`id_dosen` = `m4`.`nidn`))) join `tb_mata_kuliah` `m5` on((`m3`.`id_matkul` = `m5`.`kode_mk`)));


-- Dumping structure for view siakad_adhiguna_1.v_mhs_aktif
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_mhs_aktif`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mhs_aktif` AS select `m1`.`nim` AS `nim`,`m1`.`nm_mhs` AS `nm_mhs`,`m1`.`tpt_lhr` AS `tpt_lhr`,`m1`.`tgl_lahir` AS `tgl_lahir`,`m1`.`jenkel` AS `jenkel`,`m2`.`agama` AS `agama`,`m1`.`kelurahan` AS `alamat`,`m1`.`wilayah` AS `wilayah`,`m3`.`nm_prodi` AS `nm_prodi`,`m1`.`tgl_masuk` AS `tgl_masuk`,`m1`.`smt_masuk` AS `smt_masuk`,`m4`.`nm_status` AS `nm_status`,`m4`.`ket` AS `keterangan` from (((`tb_mhs` `m1` join `agama` `m2` on((`m1`.`agama` = `m2`.`id_agama`))) join `tb_prodi` `m3` on((`m1`.`kd_prodi` = `m3`.`id_prodi`))) join `tb_status_mhs` `m4` on((`m1`.`status_mhs` = `m4`.`id_status`))) where (`m4`.`nm_status` = 'A') order by `m1`.`smt_masuk` desc;


-- Dumping structure for view siakad_adhiguna_1.v_mhs_krs
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_mhs_krs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mhs_krs` AS select `m1`.`id_krs` AS `id_krs`,`m1`.`id_mhs` AS `nim`,`m2`.`nm_mhs` AS `nama`,`m1`.`kode_pembayaran` AS `kode_pembayaran`,`m3`.`nm_kurikulum` AS `nm_kurikulum`,`m3`.`ta` AS `ta`,`m1`.`status_ambil` AS `status_ambil`,`m1`.`status_cek` AS `status_cek`,`m3`.`kd_prodi` AS `kd_prodi`,`m4`.`nm_prodi` AS `nm_prodi` from (((`tb_mhs_krs` `m1` join `tb_mhs` `m2` on((`m1`.`id_mhs` = `m2`.`nim`))) join `tb_kurikulum` `m3` on((`m1`.`id_kurikulum` = `m3`.`id_kurikulum`))) join `tb_prodi` `m4` on((`m3`.`kd_prodi` = `m4`.`id_prodi`)));


-- Dumping structure for view siakad_adhiguna_1.v_mhs_lulus
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_mhs_lulus`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mhs_lulus` AS select `m2`.`nim` AS `nim`,`m2`.`nm_mhs` AS `nm_mhs`,`m2`.`tpt_lhr` AS `tpt_lhr`,`m2`.`tgl_lahir` AS `tgl_lahir`,`m2`.`jenkel` AS `jenkel`,`m2`.`kelurahan` AS `alamat`,`m2`.`wilayah` AS `wilayah`,`m2`.`tgl_masuk` AS `tgl_masuk`,`m2`.`smt_masuk` AS `smt_masuk`,`m3`.`nm_jenis_keluar` AS `nm_jenis_keluar`,`m1`.`tgl_keluar` AS `tgl_keluar`,`m1`.`jalur_skripsi` AS `jalur_skripsi`,`m1`.`judul_skripsi` AS `judul_skripsi`,`m1`.`bln_awal_bim` AS `bln_awal_bim`,`m1`.`bln_akhir_bim` AS `bln_akhir_bim`,`m1`.`sk_yudisium` AS `sk_yudisium`,`m1`.`IPK` AS `IPK`,`m1`.`no_ijazah` AS `no_ijazah`,`m1`.`ket` AS `ket` from ((`tb_mhs_lulus` `m1` join `tb_mhs` `m2` on((`m1`.`id_mhs` = `m2`.`nim`))) join `tb_jenis_keluar` `m3` on((`m1`.`id_jns_keluar` = `m3`.`id_jenis_keluar`))) order by `m2`.`smt_masuk` desc;


-- Dumping structure for view siakad_adhiguna_1.v_mhs_transfer
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_mhs_transfer`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mhs_transfer` AS select `m1`.`id_trans` AS `id_trans`,`m1`.`id_mhs` AS `nim`,`m2`.`nm_mhs` AS `nama`,`m1`.`prodi_asal` AS `prodi_asal`,`m1`.`pt_asal` AS `pt_asal`,`m1`.`sks_diakui` AS `sks_diakui` from (`tb_mhs_transfer` `m1` join `tb_mhs` `m2` on((`m1`.`id_mhs` = `m2`.`nim`)));


-- Dumping structure for view siakad_adhiguna_1.v_mk_kurikulum
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_mk_kurikulum`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mk_kurikulum` AS select `m1`.`id_kur_mk` AS `id_kur_mk`,`m1`.`kode_mk` AS `kode_mk`,`m2`.`nm_mk` AS `nm_mk`,`m2`.`sks` AS `sks`,`m2`.`semester` AS `semester`,`m1`.`id_kurikulum` AS `id_kurikulum`,`m3`.`nm_kurikulum` AS `nm_kurikulum`,`m3`.`ta` AS `ta`,`m3`.`kd_prodi` AS `kd_prodi`,`m4`.`nm_prodi` AS `nm_prodi` from (((`tb_mk_kurikulum` `m1` join `tb_mata_kuliah` `m2` on((`m1`.`kode_mk` = `m2`.`kode_mk`))) join `tb_kurikulum` `m3` on((`m1`.`id_kurikulum` = `m3`.`id_kurikulum`))) join `tb_prodi` `m4` on((`m3`.`kd_prodi` = `m4`.`id_prodi`)));


-- Dumping structure for view siakad_adhiguna_1.v_nilai
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_nilai`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_nilai` AS select `m1`.`id_nilai` AS `id_nilai`,`m2`.`id_krs` AS `id_krs`,`m5`.`nim` AS `nim`,`m5`.`nm_mhs` AS `nm_mhs`,`m6`.`kode_mk` AS `kode_mk`,`m6`.`nm_mk` AS `nm_mk`,`m6`.`sks` AS `sks`,`m7`.`ta` AS `ta`,`m3`.`nm_kelas` AS `nm_kelas`,`m1`.`nilai_angka` AS `nilai_angka`,`m1`.`nilai_index` AS `nilai_index`,`m1`.`nilai_huruf` AS `nilai_huruf`,`m8`.`id_prodi` AS `id_prodi`,`m8`.`nm_prodi` AS `nm_prodi` from (((((((`tb_nilai` `m1` join `tb_mhs_data_krs` `m2` on((`m1`.`id_krs` = `m2`.`id_data_krs`))) join `tb_kelas_kul` `m3` on((`m2`.`id_kelas` = `m3`.`id_kelas`))) join `tb_mhs_krs` `m4` on((`m2`.`id_krs` = `m4`.`id_krs`))) join `tb_mhs` `m5` on((`m4`.`id_mhs` = `m5`.`nim`))) join `tb_mata_kuliah` `m6` on((`m3`.`id_matkul` = `m6`.`kode_mk`))) join `tb_kurikulum` `m7` on((`m3`.`id_kurikulum` = `m7`.`id_kurikulum`))) join `tb_prodi` `m8` on((`m3`.`id_prodi` = `m8`.`id_prodi`)));


-- Dumping structure for view siakad_adhiguna_1.v_proposal
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_proposal`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_proposal` AS select `m1`.`id_mhs_proposal` AS `id_mhs_proposal`,`m6`.`nim` AS `nim`,`m6`.`nm_mhs` AS `nm_mhs`,`m1`.`id_pembimbing_1` AS `id_pembimbing_1`,`m3`.`nm_dosen` AS `pembimbing_1`,`m1`.`id_pembimbing_2` AS `id_pembimbing_2`,`m5`.`nm_dosen` AS `pembimbing_2`,`m7`.`id_prodi` AS `id_prodi`,`m7`.`nm_prodi` AS `nm_prodi`,`m1`.`judul` AS `judul`,`m1`.`tgl_daftar` AS `setor_judul`,`m1`.`tgl_kadaluarsa` AS `tgl_kadaluarsa` from ((((((`tb_proposal` `m1` join `tb_dosen_pembimbing` `m2` on((`m1`.`id_pembimbing_1` = `m2`.`id_pembimbing`))) join `tb_dosen` `m3` on((`m2`.`id_dosen` = `m3`.`nidn`))) join `tb_dosen_pembimbing` `m4` on((`m1`.`id_pembimbing_2` = `m4`.`id_pembimbing`))) join `tb_dosen` `m5` on((`m4`.`id_dosen` = `m5`.`nidn`))) join `tb_mhs` `m6` on((`m1`.`id_mhs` = `m6`.`nim`))) join `tb_prodi` `m7` on((`m6`.`kd_prodi` = `m7`.`id_prodi`)));


-- Dumping structure for view siakad_adhiguna_1.v_proposal_maju
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_proposal_maju`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_proposal_maju` AS select `m8`.`id_proposal_maju` AS `id_proposal_maju`,`m1`.`id_mhs_proposal` AS `id_mhs_proposal`,`m6`.`nim` AS `nim`,`m6`.`nm_mhs` AS `nm_mhs`,`m1`.`id_pembimbing_1` AS `id_pembimbing_1`,`m3`.`nm_dosen` AS `pembimbing_1`,`m3`.`nidn` AS `nidn_pembimbing_1`,`m1`.`id_pembimbing_2` AS `id_pembimbing_2`,`m5`.`nidn` AS `nidn_pembimbing_2`,`m5`.`nm_dosen` AS `pembimbing_2`,`m7`.`id_prodi` AS `id_prodi`,`m7`.`nm_prodi` AS `nm_prodi`,`m1`.`judul` AS `judul`,`m8`.`bebas_pustaka` AS `bebas_pustaka`,`m8`.`bebas_smt` AS `bebas_smt`,`m8`.`tgl_daftar` AS `tgl_daftar`,`m8`.`kode_bayar` AS `kode_bayar` from (((((((`tb_proposal_maju` `m8` join `tb_proposal` `m1` on((`m8`.`id_proposal` = `m1`.`id_mhs_proposal`))) join `tb_dosen_pembimbing` `m2` on((`m1`.`id_pembimbing_1` = `m2`.`id_pembimbing`))) join `tb_dosen` `m3` on((`m2`.`id_dosen` = `m3`.`nidn`))) join `tb_dosen_pembimbing` `m4` on((`m1`.`id_pembimbing_2` = `m4`.`id_pembimbing`))) join `tb_dosen` `m5` on((`m4`.`id_dosen` = `m5`.`nidn`))) join `tb_mhs` `m6` on((`m1`.`id_mhs` = `m6`.`nim`))) join `tb_prodi` `m7` on((`m6`.`kd_prodi` = `m7`.`id_prodi`)));


-- Dumping structure for view siakad_adhiguna_1.v_skripsi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_skripsi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_skripsi` AS select `m9`.`id_skripsi` AS `id_skripsi`,`m9`.`bebas_pustaka` AS `bebas_pustaka`,`m9`.`bebas_smt` AS `bebas_smt`,`m9`.`bebas_proposal` AS `bebas_proposal`,`m9`.`tgl_daftar` AS `tgl_daftar`,`m8`.`id_proposal_maju` AS `id_proposal_maju`,`m1`.`id_pembimbing_1` AS `id_pembimbing_1`,`m3`.`nm_dosen` AS `pembimbing_1`,`m1`.`id_pembimbing_2` AS `id_pembimbing_2`,`m5`.`nm_dosen` AS `pembimbing_2`,`m6`.`nim` AS `nim`,`m6`.`nm_mhs` AS `nm_mhs`,`m7`.`nm_prodi` AS `nm_prodi`,`m1`.`judul` AS `judul` from ((((((((`tb_skripsi` `m9` join `tb_proposal_maju` `m8` on((`m9`.`id_proposal_maju` = `m8`.`id_proposal_maju`))) join `tb_proposal` `m1` on((`m8`.`id_proposal` = `m1`.`id_mhs_proposal`))) join `tb_dosen_pembimbing` `m2` on((`m1`.`id_pembimbing_1` = `m2`.`id_pembimbing`))) join `tb_dosen` `m3` on((`m2`.`id_dosen` = `m3`.`nidn`))) join `tb_dosen_pembimbing` `m4` on((`m1`.`id_pembimbing_2` = `m4`.`id_pembimbing`))) join `tb_dosen` `m5` on((`m4`.`id_dosen` = `m5`.`nidn`))) join `tb_mhs` `m6` on((`m1`.`id_mhs` = `m6`.`nim`))) join `tb_prodi` `m7` on((`m6`.`kd_prodi` = `m7`.`id_prodi`)));


-- Dumping structure for view siakad_adhiguna_1.v_sync_data_krs
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sync_data_krs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sync_data_krs` AS select `m1`.`id_data_krs` AS `id_data_krs`,`m3`.`nim` AS `nim`,`m3`.`nm_mhs` AS `nm_mhs`,`m4`.`id_matkul` AS `id_matkul`,`m5`.`nm_mk` AS `nm_mk`,`m4`.`nm_kelas` AS `nm_kelas`,`m7`.`ta` AS `ta`,`m6`.`id_prodi` AS `id_prodi`,`m6`.`nm_prodi` AS `nm_prodi`,`m1`.`status_upload` AS `status_upload` from ((((((`tb_mhs_data_krs` `m1` join `tb_mhs_krs` `m2` on((`m1`.`id_krs` = `m2`.`id_krs`))) join `tb_mhs` `m3` on((`m2`.`id_mhs` = `m3`.`nim`))) join `tb_kelas_kul` `m4` on((`m1`.`id_kelas` = `m4`.`id_kelas`))) join `tb_mata_kuliah` `m5` on((`m4`.`id_matkul` = `m5`.`kode_mk`))) join `tb_prodi` `m6` on((`m4`.`id_prodi` = `m6`.`id_prodi`))) join `tb_kurikulum` `m7` on((`m4`.`id_kurikulum` = `m7`.`id_kurikulum`))) where (`m1`.`status_upload` = 'N');


-- Dumping structure for view siakad_adhiguna_1.v_sync_kelas_dosen
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sync_kelas_dosen`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sync_kelas_dosen` AS select `m3`.`nidn` AS `nidn`,`m3`.`nm_dosen` AS `nm_dosen`,`m4`.`kode_mk` AS `kode_mk`,`m4`.`nm_mk` AS `nm_mk`,`m2`.`nm_kelas` AS `nm_kelas`,`m1`.`r_t_muka` AS `r_t_muka`,`m1`.`t_muka` AS `t_muka`,`m5`.`ta` AS `ta`,`m6`.`id_prodi` AS `id_prodi`,`m6`.`nm_prodi` AS `nm_prodi` from (((((`tb_kelas_dosen` `m1` join `tb_kelas_kul` `m2` on((`m1`.`id_kelas_kuliah` = `m2`.`id_kelas`))) join `tb_dosen` `m3` on((`m1`.`id_dosen` = `m3`.`nidn`))) join `tb_mata_kuliah` `m4` on((`m2`.`id_matkul` = `m4`.`kode_mk`))) join `tb_kurikulum` `m5` on((`m2`.`id_kurikulum` = `m5`.`id_kurikulum`))) join `tb_prodi` `m6` on((`m2`.`id_prodi` = `m6`.`id_prodi`))) where ((`m1`.`status_upload` = 'N') and (`m1`.`validasi_baak` = 'Y'));


-- Dumping structure for view siakad_adhiguna_1.v_sync_kelas_kuliah
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sync_kelas_kuliah`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sync_kelas_kuliah` AS select `m1`.`id_kelas` AS `id_kelas`,`m2`.`kode_mk` AS `kode_mk`,`m2`.`nm_mk` AS `nm_mk`,`m3`.`ta` AS `ta`,`m1`.`nm_kelas` AS `nm_kelas`,`m4`.`id_prodi` AS `id_prodi`,`m4`.`nm_prodi` AS `nm_prodi`,`m1`.`status_upload` AS `status_upload` from (((`tb_kelas_kul` `m1` join `tb_mata_kuliah` `m2` on((`m1`.`id_matkul` = `m2`.`kode_mk`))) join `tb_kurikulum` `m3` on((`m1`.`id_kurikulum` = `m3`.`id_kurikulum`))) join `tb_prodi` `m4` on((`m1`.`id_prodi` = `m4`.`id_prodi`))) where (`m1`.`status_upload` = 'N');


-- Dumping structure for view siakad_adhiguna_1.v_sync_mhs
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sync_mhs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sync_mhs` AS select `m1`.`nim` AS `nim`,`m1`.`nm_mhs` AS `nm_mhs`,`m1`.`tpt_lhr` AS `tpt_lhr`,`m1`.`tgl_lahir` AS `tgl_lahir`,`m1`.`jenkel` AS `jenkel`,`m1`.`nm_ibu` AS `nm_ibu`,`m2`.`id_agama` AS `agama`,`m1`.`kelurahan` AS `alamat`,`m1`.`wilayah` AS `wilayah`,`m3`.`nm_prodi` AS `nm_prodi`,`m1`.`tgl_masuk` AS `tgl_masuk`,`m1`.`smt_masuk` AS `smt_masuk`,`m4`.`nm_status` AS `nm_status`,`m4`.`ket` AS `keterangan`,`m1`.`status_upload` AS `status_upload`,`m3`.`id_prodi` AS `id_prodi`,`m1`.`status_awal` AS `status_awal` from (((`tb_mhs` `m1` join `agama` `m2` on((`m1`.`agama` = `m2`.`id_agama`))) join `tb_prodi` `m3` on((`m1`.`kd_prodi` = `m3`.`id_prodi`))) join `tb_status_mhs` `m4` on((`m1`.`status_mhs` = `m4`.`id_status`))) where (`m1`.`status_upload` = 'N');


-- Dumping structure for view siakad_adhiguna_1.v_sync_mhs_lulus
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sync_mhs_lulus`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sync_mhs_lulus` AS select `m2`.`nim` AS `nim`,`m2`.`nm_mhs` AS `nm_mhs`,`m2`.`tpt_lhr` AS `tpt_lhr`,`m2`.`tgl_lahir` AS `tgl_lahir`,`m2`.`jenkel` AS `jenkel`,`m2`.`kelurahan` AS `alamat`,`m2`.`wilayah` AS `wilayah`,`m2`.`tgl_masuk` AS `tgl_masuk`,`m2`.`smt_masuk` AS `smt_masuk`,`m3`.`id_jenis_keluar` AS `id_jenis_keluar`,`m1`.`tgl_keluar` AS `tgl_keluar`,`m1`.`jalur_skripsi` AS `jalur_skripsi`,`m1`.`judul_skripsi` AS `judul_skripsi`,`m1`.`bln_awal_bim` AS `bln_awal_bim`,`m1`.`bln_akhir_bim` AS `bln_akhir_bim`,`m1`.`sk_yudisium` AS `sk_yudisium`,`m1`.`IPK` AS `IPK`,`m1`.`no_ijazah` AS `no_ijazah`,`m1`.`ket` AS `ket`,`m1`.`status_upload` AS `status_upload` from ((`tb_mhs_lulus` `m1` join `tb_mhs` `m2` on((`m1`.`id_mhs` = `m2`.`nim`))) join `tb_jenis_keluar` `m3` on((`m1`.`id_jns_keluar` = `m3`.`id_jenis_keluar`))) where (`m1`.`status_upload` = 'N');


-- Dumping structure for view siakad_adhiguna_1.v_sync_mk_kurikulum
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sync_mk_kurikulum`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sync_mk_kurikulum` AS select `m1`.`id_kur_mk` AS `id_kur_mk`,`m1`.`kode_mk` AS `kode_mk`,`m2`.`nm_mk` AS `nm_mk`,`m2`.`sks` AS `sks`,`m2`.`semester` AS `semester`,`m1`.`id_kurikulum` AS `id_kurikulum`,`m3`.`nm_kurikulum` AS `nm_kurikulum`,`m3`.`ta` AS `ta`,`m3`.`kd_prodi` AS `kd_prodi`,`m4`.`nm_prodi` AS `nm_prodi` from (((`tb_mk_kurikulum` `m1` join `tb_mata_kuliah` `m2` on((`m1`.`kode_mk` = `m2`.`kode_mk`))) join `tb_kurikulum` `m3` on((`m1`.`id_kurikulum` = `m3`.`id_kurikulum`))) join `tb_prodi` `m4` on((`m3`.`kd_prodi` = `m4`.`id_prodi`))) where (`m1`.`status_upload` = 'N');


-- Dumping structure for view siakad_adhiguna_1.v_sync_nilai
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sync_nilai`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sync_nilai` AS select `m1`.`id_nilai` AS `id_nilai`,`m5`.`nim` AS `nim`,`m5`.`nm_mhs` AS `nm_mhs`,`m6`.`kode_mk` AS `kode_mk`,`m6`.`nm_mk` AS `nm_mk`,`m7`.`ta` AS `ta`,`m3`.`nm_kelas` AS `nm_kelas`,`m1`.`nilai_angka` AS `nilai_angka`,`m1`.`nilai_index` AS `nilai_index`,`m1`.`nilai_huruf` AS `nilai_huruf`,`m8`.`id_prodi` AS `id_prodi`,`m8`.`nm_prodi` AS `nm_prodi`,`m1`.`status_upload` AS `status_upload` from (((((((`tb_nilai` `m1` join `tb_mhs_data_krs` `m2` on((`m1`.`id_krs` = `m2`.`id_data_krs`))) join `tb_kelas_kul` `m3` on((`m2`.`id_kelas` = `m3`.`id_kelas`))) join `tb_mhs_krs` `m4` on((`m2`.`id_krs` = `m4`.`id_krs`))) join `tb_mhs` `m5` on((`m4`.`id_mhs` = `m5`.`nim`))) join `tb_mata_kuliah` `m6` on((`m3`.`id_matkul` = `m6`.`kode_mk`))) join `tb_kurikulum` `m7` on((`m3`.`id_kurikulum` = `m7`.`id_kurikulum`))) join `tb_prodi` `m8` on((`m3`.`id_prodi` = `m8`.`id_prodi`))) where (`m1`.`status_upload` = 'N');


-- Dumping structure for view siakad_adhiguna_1.z_login_mhs
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `z_login_mhs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `z_login_mhs` AS select `m1`.`id_user` AS `id_user`,`m2`.`kode_pembayaran` AS `kode_bayar`,`m1`.`username` AS `username`,`m1`.`password` AS `password`,`m1`.`level` AS `level`,`m1`.`val_periode` AS `val_periode`,`m2`.`status_cek` AS `status_cek`,`m3`.`nim` AS `nim`,`m3`.`nm_mhs` AS `nm_mhs`,`m3`.`status_mhs` AS `status_mhs`,`m4`.`ta` AS `ta`,`m5`.`id_prodi` AS `id_prodi` from ((((`login_mhs` `m1` join `tb_mhs_krs` `m2` on((`m1`.`id_krs` = `m2`.`id_krs`))) join `tb_mhs` `m3` on((`m2`.`id_mhs` = `m3`.`nim`))) join `tb_kurikulum` `m4` on((`m2`.`id_kurikulum` = `m4`.`id_kurikulum`))) join `tb_prodi` `m5` on((`m4`.`kd_prodi` = `m5`.`id_prodi`)));


-- Dumping structure for view siakad_adhiguna_1.z_mhs_krs
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `z_mhs_krs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `z_mhs_krs` AS select `m1`.`id_krs` AS `id_krs`,`m1`.`id_mhs` AS `nim`,`m2`.`nm_mhs` AS `nama`,`m1`.`kode_pembayaran` AS `kode_pembayaran`,`m3`.`nm_kurikulum` AS `nm_kurikulum`,`m3`.`ta` AS `ta`,`m1`.`status_ambil` AS `status_ambil`,`m1`.`status_cek` AS `status_cek` from ((`tb_mhs_krs` `m1` join `tb_mhs` `m2` on((`m1`.`id_mhs` = `m2`.`nim`))) join `tb_kurikulum` `m3` on((`m1`.`id_kurikulum` = `m3`.`id_kurikulum`)));


-- Dumping structure for view siakad_adhiguna_1.z_mhs_pembayaran
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `z_mhs_pembayaran`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `z_mhs_pembayaran` AS select `m1`.`nim` AS `nim`,`m1`.`nama_jns_bayar` AS `nama_jns_bayar`,`m1`.`jml_biaya` AS `jml_biaya`,`m1`.`jumlah_bayar` AS `jumlah_bayar`,`m1`.`statusbayar` AS `statusbayar`,`m1`.`keterangan` AS `keterangan`,`m1`.`status` AS `status`,`m1`.`kode_bayar` AS `kode_bayar` from `siami`.`view_pembayaran` `m1`;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table siami.administrator: ~0 rows (approximately)
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;


-- Dumping structure for table siami.angkatan
CREATE TABLE IF NOT EXISTS `angkatan` (
  `id_angkatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_angkatan` varchar(4) NOT NULL,
  PRIMARY KEY (`id_angkatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- Dumping data for table siami.biaya: ~5 rows (approximately)
/*!40000 ALTER TABLE `biaya` DISABLE KEYS */;
REPLACE INTO `biaya` (`kode_biaya`, `kode_jns_bayar`, `jml_biaya`, `angkatan`, `tgl_aktif`) VALUES
	('BY001', 'JB001', 2000000, '2011', '0000-00-00'),
	('BY002', 'JB002', 2000000, '2011', '0000-00-00'),
	('BY003', 'JB002', 2250000, '2015', '0000-00-00'),
	('BY004', 'JB002', 2350000, '2014', '0000-00-00'),
	('BY005', 'JB001', 2350000, '2014', '0000-00-00'),
	('BY014', 'JB002', 2500000, '2016', '0000-00-00');
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
	('JB012', 'SP 3 SKS', 'P'),
	('JB013', 'Buku', 'P');
/*!40000 ALTER TABLE `jenis_bayar` ENABLE KEYS */;


-- Dumping structure for table siami.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` mediumtext NOT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `angkatan` year(4) DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `keterangan` mediumtext,
  `no_referensi` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table siami.pembayaran: ~5 rows (approximately)
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
REPLACE INTO `pembayaran` (`kode_bayar`, `kode_biaya`, `nim`, `nik`, `jumlah_bayar`, `tgl_byr`, `keterangan`, `no_referensi`) VALUES
	('174f11e422f3e1234f95c6114d0d978a', 'BY014', '5520116005', '140201025', 2500000, '2016-09-19', 'Pembayaran Semester 1', 'smt0120161_ti'),
	('276863ac91097da9b080b22f7e14425a', 'BY014', '5520116001', '140201025', 2500000, '2016-09-19', 'Pembayaran Semester 1', 'qwerty'),
	('58a1ca45081078f1b0ee1c1e619bb8c5', 'BY014', '5520116004', '140201025', 2500000, '2016-09-19', 'Pembayaran Semester 1', 'smt0120161_ti_'),
	('677495b715279b2226cbc3405e9f64f3', 'BY014', '5520116002', '140201025', 2500000, '2016-09-19', 'Pembayaran Semester 1', 'smt0120161'),
	('722b7bb17889d32dcc3d7ec1cbbfb5cd', 'BY004', '5520114100', '140201025', 2350000, '2016-09-21', 'Pembayaran Semester 1', 'sdfds'),
	('8167c868abf2c5529ae0c25fd1057b6f', 'BY014', '5520116003', '140201025', 2500000, '2016-09-19', 'Pembayaran Semester 1', 'smt0120161_ti');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;


-- Dumping structure for view siami.tb_kurikulum
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `tb_kurikulum` (
	`id_kurikulum` INT(10) NOT NULL,
	`nm_kurikulum` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`ta` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`kd_prodi` INT(11) NOT NULL,
	`status` ENUM('1','0') NOT NULL COLLATE 'utf8_general_ci'
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
	`kode_biaya` VARCHAR(6) NOT NULL COLLATE 'utf8_general_ci',
	`kode_bayar` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`nim` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`nik` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`jumlah_bayar` INT(11) NOT NULL,
	`tgl_byr` DATE NOT NULL,
	`keterangan` MEDIUMTEXT NULL COLLATE 'utf8_general_ci',
	`no_referensi` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`jml_biaya` INT(11) NOT NULL,
	`angkatan` YEAR NULL,
	`tgl_aktif` DATE NULL,
	`nama_jns_bayar` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
	`status` ENUM('A','P') NOT NULL COLLATE 'latin1_swedish_ci',
	`tglbyr` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`statusbayar` VARCHAR(22) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view siami.tb_kurikulum
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `tb_kurikulum`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `siami`.`tb_kurikulum` AS select `siakad_adhiguna_1`.`tb_kurikulum`.`id_kurikulum` AS `id_kurikulum`,`siakad_adhiguna_1`.`tb_kurikulum`.`nm_kurikulum` AS `nm_kurikulum`,`siakad_adhiguna_1`.`tb_kurikulum`.`ta` AS `ta`,`siakad_adhiguna_1`.`tb_kurikulum`.`kd_prodi` AS `kd_prodi`,`siakad_adhiguna_1`.`tb_kurikulum`.`status` AS `status` from `siakad_adhiguna_1`.`tb_kurikulum`;


-- Dumping structure for view siami.view_biaya
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_biaya`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `siami`.`view_biaya` AS select `siami`.`biaya`.`kode_biaya` AS `kode_biaya`,`siami`.`jenis_bayar`.`nama_jns_bayar` AS `nama_jns_bayar`,date_format(`siami`.`biaya`.`tgl_aktif`,'%d-%m-%Y') AS `tgl_aktif`,`siami`.`biaya`.`angkatan` AS `angkatan`,`siami`.`biaya`.`jml_biaya` AS `jml_biaya`,`siami`.`jenis_bayar`.`status` AS `status` from (`siami`.`biaya` join `siami`.`jenis_bayar` on((`siami`.`biaya`.`kode_jns_bayar` = `siami`.`jenis_bayar`.`kode_jns_bayar`)));


-- Dumping structure for view siami.view_lap_biaya
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_lap_biaya`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `siami`.`view_lap_biaya` AS select `siami`.`biaya`.`kode_jns_bayar` AS `kode_jns_bayar`,`siami`.`biaya`.`kode_biaya` AS `kode_biaya`,`siami`.`jenis_bayar`.`nama_jns_bayar` AS `nama_jns_bayar`,date_format(`siami`.`biaya`.`tgl_aktif`,'%d-%m-%Y') AS `tgl`,`siami`.`biaya`.`angkatan` AS `angkatan`,`siami`.`biaya`.`jml_biaya` AS `jml_biaya` from (`siami`.`biaya` join `siami`.`jenis_bayar` on((`siami`.`biaya`.`kode_jns_bayar` = `siami`.`jenis_bayar`.`kode_jns_bayar`))) order by `siami`.`jenis_bayar`.`status`,`siami`.`biaya`.`angkatan`,`siami`.`biaya`.`kode_jns_bayar`;


-- Dumping structure for view siami.view_mahasiswa
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_mahasiswa`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `siami`.`view_mahasiswa` AS select `siakad_adhiguna_1`.`tb_mhs`.`nim` AS `nim`,`siakad_adhiguna_1`.`tb_mhs`.`nm_mhs` AS `nama`,substr(`siakad_adhiguna_1`.`tb_mhs`.`smt_masuk`,1,4) AS `angkatan`,`siakad_adhiguna_1`.`tb_mhs`.`jenkel` AS `jenis_kelamin`,'' AS `email`,`siakad_adhiguna_1`.`tb_mhs`.`kelurahan` AS `alamat`,'' AS `no_telp`,`siakad_adhiguna_1`.`tb_mhs`.`tgl_lahir` AS `tgl_lahir` from `siakad_adhiguna_1`.`tb_mhs`;


-- Dumping structure for view siami.view_pembayaran
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_pembayaran`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `siami`.`view_pembayaran` AS select `siami`.`biaya`.`kode_jns_bayar` AS `kode_jns_bayar`,`siami`.`pembayaran`.`kode_biaya` AS `kode_biaya`,`siami`.`pembayaran`.`kode_bayar` AS `kode_bayar`,`siami`.`pembayaran`.`nim` AS `nim`,`siami`.`pembayaran`.`nik` AS `nik`,`siami`.`pembayaran`.`jumlah_bayar` AS `jumlah_bayar`,`siami`.`pembayaran`.`tgl_byr` AS `tgl_byr`,`siami`.`pembayaran`.`keterangan` AS `keterangan`,`siami`.`pembayaran`.`no_referensi` AS `no_referensi`,`siami`.`biaya`.`jml_biaya` AS `jml_biaya`,`siami`.`biaya`.`angkatan` AS `angkatan`,`siami`.`biaya`.`tgl_aktif` AS `tgl_aktif`,`siami`.`jenis_bayar`.`nama_jns_bayar` AS `nama_jns_bayar`,`siami`.`jenis_bayar`.`status` AS `status`,date_format(`siami`.`pembayaran`.`tgl_byr`,'%d-%m-%Y') AS `tglbyr`,if(((`siami`.`biaya`.`jml_biaya` - `siami`.`pembayaran`.`jumlah_bayar`) > 0),'Belum Lunas (Angsuran)','Lunas') AS `statusbayar` from ((`siami`.`pembayaran` join `siami`.`biaya` on((`siami`.`pembayaran`.`kode_biaya` = convert(`siami`.`biaya`.`kode_biaya` using utf8)))) join `siami`.`jenis_bayar` on((`siami`.`biaya`.`kode_jns_bayar` = `siami`.`jenis_bayar`.`kode_jns_bayar`)));


-- Dumping database structure for db_portal
CREATE DATABASE IF NOT EXISTS `db_portal` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_portal`;


-- Dumping structure for table db_portal.tb_foto
CREATE TABLE IF NOT EXISTS `tb_foto` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `fungsi` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_portal.tb_foto: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_foto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_foto` ENABLE KEYS */;


-- Dumping structure for table db_portal.tb_kata
CREATE TABLE IF NOT EXISTS `tb_kata` (
  `id_kata` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `isi` text,
  PRIMARY KEY (`id_kata`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_portal.tb_kata: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_kata` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_kata` ENABLE KEYS */;


-- Dumping database structure for db_perpus
CREATE DATABASE IF NOT EXISTS `db_perpus` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_perpus`;


-- Dumping structure for table db_perpus.tb_buku
CREATE TABLE IF NOT EXISTS `tb_buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `id_rak` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `nm_buku` varchar(50) NOT NULL,
  `thn_terbit` date NOT NULL,
  `nm_penulis` varchar(50) NOT NULL,
  PRIMARY KEY (`id_buku`),
  KEY `FK_tb_buku_tb_rak` (`id_rak`),
  KEY `FK_tb_buku_tb_penerbit` (`id_penerbit`),
  CONSTRAINT `FK_tb_buku_tb_penerbit` FOREIGN KEY (`id_penerbit`) REFERENCES `tb_penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_buku_tb_rak` FOREIGN KEY (`id_rak`) REFERENCES `tb_rak` (`id_rak`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table db_perpus.tb_buku: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_buku` DISABLE KEYS */;
REPLACE INTO `tb_buku` (`id_buku`, `id_rak`, `id_penerbit`, `nm_buku`, `thn_terbit`, `nm_penulis`) VALUES
	(1, 1, 1, 'IMPLEMENTASI FUZZY LOGIC METODE TSUKAMOTO', '2016-09-15', 'Sofyan Saputra');
/*!40000 ALTER TABLE `tb_buku` ENABLE KEYS */;


-- Dumping structure for table db_perpus.tb_kategori
CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kategori` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table db_perpus.tb_kategori: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_kategori` DISABLE KEYS */;
REPLACE INTO `tb_kategori` (`id_kategori`, `nm_kategori`) VALUES
	(1, 'SKRIPSI'),
	(2, 'Praktikum');
/*!40000 ALTER TABLE `tb_kategori` ENABLE KEYS */;


-- Dumping structure for table db_perpus.tb_penerbit
CREATE TABLE IF NOT EXISTS `tb_penerbit` (
  `id_penerbit` int(11) NOT NULL AUTO_INCREMENT,
  `nm_penerbit` varchar(50) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id_penerbit`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table db_perpus.tb_penerbit: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_penerbit` DISABLE KEYS */;
REPLACE INTO `tb_penerbit` (`id_penerbit`, `nm_penerbit`, `alamat`) VALUES
	(1, 'ADHI GUNA', 'Jl. Undata Palu');
/*!40000 ALTER TABLE `tb_penerbit` ENABLE KEYS */;


-- Dumping structure for table db_perpus.tb_pinjam
CREATE TABLE IF NOT EXISTS `tb_pinjam` (
  `id_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) NOT NULL,
  `tgl_pjm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lama_pjm` int(11) NOT NULL,
  `tgl_kembali` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_mhs` varchar(50) NOT NULL,
  `status_pjm` enum('P','Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_pinjam`),
  KEY `FK_tb_pinjam_tb_buku` (`id_buku`),
  CONSTRAINT `FK_tb_pinjam_tb_buku` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_perpus.tb_pinjam: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_pinjam` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_pinjam` ENABLE KEYS */;


-- Dumping structure for table db_perpus.tb_rak
CREATE TABLE IF NOT EXISTS `tb_rak` (
  `id_rak` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `nm_rak` varchar(50) NOT NULL,
  PRIMARY KEY (`id_rak`),
  KEY `FK_tb_rak_tb_kategori` (`id_kategori`),
  CONSTRAINT `FK_tb_rak_tb_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table db_perpus.tb_rak: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_rak` DISABLE KEYS */;
REPLACE INTO `tb_rak` (`id_rak`, `id_kategori`, `nm_rak`) VALUES
	(1, 1, 'Rak 1'),
	(2, 1, 'Rak 2');
/*!40000 ALTER TABLE `tb_rak` ENABLE KEYS */;


-- Dumping structure for view db_perpus.v_buku
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_buku` (
	`id_buku` INT(11) NOT NULL,
	`id_rak` INT(11) NOT NULL,
	`id_kategori` INT(11) NOT NULL,
	`id_penerbit` INT(11) NOT NULL,
	`nm_buku` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`thn_terbit` DATE NOT NULL,
	`nm_penulis` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`nm_rak` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`nm_kategori` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`nm_penerbit` VARCHAR(50) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view db_perpus.v_buku
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_buku`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_perpus`.`v_buku` AS select `m1`.`id_buku` AS `id_buku`,`m2`.`id_rak` AS `id_rak`,`m3`.`id_kategori` AS `id_kategori`,`m4`.`id_penerbit` AS `id_penerbit`,`m1`.`nm_buku` AS `nm_buku`,`m1`.`thn_terbit` AS `thn_terbit`,`m1`.`nm_penulis` AS `nm_penulis`,`m2`.`nm_rak` AS `nm_rak`,`m3`.`nm_kategori` AS `nm_kategori`,`m4`.`nm_penerbit` AS `nm_penerbit` from (((`db_perpus`.`tb_buku` `m1` join `db_perpus`.`tb_rak` `m2` on((`m1`.`id_rak` = `m2`.`id_rak`))) join `db_perpus`.`tb_kategori` `m3` on((`m2`.`id_kategori` = `m3`.`id_kategori`))) join `db_perpus`.`tb_penerbit` `m4` on((`m1`.`id_penerbit` = `m4`.`id_penerbit`)));
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
