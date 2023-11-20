# ************************************************************
# Sequel Ace SQL dump
# Version 20062
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.1.2-MariaDB-1:11.1.2+maria~ubu2204)
# Database: project
# Generation Time: 2023-11-20 11:10:02 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table platforms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `platforms`;

CREATE TABLE `platforms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `platforms` WRITE;
/*!40000 ALTER TABLE `platforms` DISABLE KEYS */;

INSERT INTO `platforms` (`id`, `name`)
VALUES
	(1,'PC'),
	(2,'PS3'),
	(3,'PS4'),
	(4,'Nintendo DS'),
	(5,'Nintendo Wii'),
	(6,'Game Boy Advance');

/*!40000 ALTER TABLE `platforms` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table videogames
# ------------------------------------------------------------

DROP TABLE IF EXISTS `videogames`;

CREATE TABLE `videogames` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `platform_id` int(3) DEFAULT NULL,
  `release_year` int(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `videogames` WRITE;
/*!40000 ALTER TABLE `videogames` DISABLE KEYS */;

INSERT INTO `videogames` (`id`, `platform_id`, `release_year`, `name`)
VALUES
	(1,1,2015,'The Witcher 3'),
	(3,4,2006,'Pokémon Diamond'),
	(4,1,2011,'The Elder Scrolls V: Skyrim'),
	(5,6,2004,'Pokémon Emerald'),
	(6,6,2004,'Pokémon FireRed'),
	(7,3,2014,'Destiny'),
	(8,2,2006,'Call of Duty: Modern Warfare 2'),
	(9,2,2012,'Call of Duty: Black Ops 2'),
	(10,5,2008,'Mario Kart Wii');

/*!40000 ALTER TABLE `videogames` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
