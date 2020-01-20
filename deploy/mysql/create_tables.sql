-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server Version:               10.3.15-MariaDB - mariadb.org binary distribution
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

-- Exportiere Struktur von Tabelle todoliste.todo
CREATE TABLE IF NOT EXISTS `todo` (
  `todo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inhalt` text NOT NULL,
  `ist_erledigt` tinyint(3) unsigned NOT NULL,
  `erstellt_um` datetime NOT NULL,
  `aktualisiert_um` datetime NOT NULL,
  PRIMARY KEY (`todo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Daten Export vom Benutzer nicht ausgewählt
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
