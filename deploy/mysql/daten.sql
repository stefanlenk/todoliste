/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE TABLE IF NOT EXISTS `todo` (
  `todo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inhalt` text NOT NULL,
  `ist_erledigt` tinyint(3) unsigned NOT NULL,
  `erstellt_um` datetime NOT NULL,
  `aktualisiert_um` datetime NOT NULL,
  PRIMARY KEY (`todo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `todo` DISABLE KEYS */;
INSERT INTO `todo` (`todo_id`, `inhalt`, `ist_erledigt`, `erstellt_um`, `aktualisiert_um`) VALUES
	(1, 'ToDo erstellen', 1, '2020-02-17 11:11:17', '2020-02-17 11:11:17'),
	(2, 'ToDo erstellt', 0, '2020-02-17 11:24:37', '2020-02-17 11:24:37'),
	(3, 'Datenbank beschreiben', 0, NOW(), NOW());
/*!40000 ALTER TABLE `todo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;