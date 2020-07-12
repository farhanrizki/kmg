-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for kmg
CREATE DATABASE IF NOT EXISTS `kmg` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `kmg`;

-- Dumping structure for table kmg.bagian
CREATE TABLE IF NOT EXISTS `bagian` (
  `id_bagian` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bagian` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id_bagian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kmg.bagian: ~0 rows (approximately)
DELETE FROM `bagian`;
/*!40000 ALTER TABLE `bagian` DISABLE KEYS */;
/*!40000 ALTER TABLE `bagian` ENABLE KEYS */;

-- Dumping structure for table kmg.bidang
CREATE TABLE IF NOT EXISTS `bidang` (
  `id_bidang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bidang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_bidang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kmg.bidang: ~0 rows (approximately)
DELETE FROM `bidang`;
/*!40000 ALTER TABLE `bidang` DISABLE KEYS */;
/*!40000 ALTER TABLE `bidang` ENABLE KEYS */;

-- Dumping structure for table kmg.nilai_self_learning
CREATE TABLE IF NOT EXISTS `nilai_self_learning` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `pn` int(11) DEFAULT NULL,
  `id_selflearning` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `fkpn` (`pn`),
  KEY `fklearning` (`id_selflearning`),
  CONSTRAINT `fklearning` FOREIGN KEY (`id_selflearning`) REFERENCES `self_learning` (`id_selflearning`),
  CONSTRAINT `fkpn` FOREIGN KEY (`pn`) REFERENCES `staff_app` (`pn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kmg.nilai_self_learning: ~0 rows (approximately)
DELETE FROM `nilai_self_learning`;
/*!40000 ALTER TABLE `nilai_self_learning` DISABLE KEYS */;
/*!40000 ALTER TABLE `nilai_self_learning` ENABLE KEYS */;

-- Dumping structure for table kmg.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `id_role` int(11) NOT NULL,
  `keterangan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kmg.role_user: ~5 rows (approximately)
DELETE FROM `role_user`;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`id_role`, `keterangan`) VALUES
	(1, 'superadmin'),
	(2, 'kabag'),
	(3, 'staff1'),
	(4, 'staff2'),
	(5, 'guest');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Dumping structure for table kmg.self_learning
CREATE TABLE IF NOT EXISTS `self_learning` (
  `id_selflearning` int(11) NOT NULL AUTO_INCREMENT,
  `nama_selflearning` varchar(255) DEFAULT NULL,
  `nota_dinas` varchar(255) DEFAULT NULL,
  `materi` text,
  PRIMARY KEY (`id_selflearning`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kmg.self_learning: ~0 rows (approximately)
DELETE FROM `self_learning`;
/*!40000 ALTER TABLE `self_learning` DISABLE KEYS */;
/*!40000 ALTER TABLE `self_learning` ENABLE KEYS */;

-- Dumping structure for table kmg.staff_app
CREATE TABLE IF NOT EXISTS `staff_app` (
  `pn` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `bidang` int(11) DEFAULT NULL,
  `bagian` int(11) DEFAULT NULL,
  PRIMARY KEY (`pn`),
  KEY `fkbagian` (`bagian`),
  KEY `fkbidang` (`bidang`),
  CONSTRAINT `fkbagian` FOREIGN KEY (`bagian`) REFERENCES `bagian` (`id_bagian`),
  CONSTRAINT `fkbidang` FOREIGN KEY (`bidang`) REFERENCES `bidang` (`id_bidang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kmg.staff_app: ~0 rows (approximately)
DELETE FROM `staff_app`;
/*!40000 ALTER TABLE `staff_app` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff_app` ENABLE KEYS */;

-- Dumping structure for table kmg.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_role` (`id_role`),
  CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `role_user` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kmg.tb_user: ~0 rows (approximately)
DELETE FROM `tb_user`;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
