-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server Version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server Betriebssystem:        Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Exportiere Datenbank Struktur für todoliste
CREATE DATABASE IF NOT EXISTS `todoliste` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `todoliste`;

-- Exportiere Struktur von Tabelle todoliste.liste
CREATE TABLE IF NOT EXISTS `liste` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nummer` int(11) DEFAULT 0,
  `inhalt` text DEFAULT '0',
  `datum` date DEFAULT NULL,
  `status` int(1) DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle todoliste.liste: ~0 rows (ungefähr)
/*!40000 ALTER TABLE `liste` DISABLE KEYS */;
INSERT INTO `liste` (`ID`, `nummer`, `inhalt`, `datum`, `status`) VALUES
	(1, 1, 'ToDo Liste erstellen', '2020-01-07', 0);
/*!40000 ALTER TABLE `liste` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
