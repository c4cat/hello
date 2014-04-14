# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.16)
# Database: content
# Generation Time: 2014-04-13 17:46:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table current
# ------------------------------------------------------------

DROP TABLE IF EXISTS `current`;

CREATE TABLE `current` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `current` int(11) NOT NULL,
  `tmp` int(11) NOT NULL,
  `light` int(11) NOT NULL,
  `open` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `current` WRITE;
/*!40000 ALTER TABLE `current` DISABLE KEYS */;

INSERT INTO `current` (`id`, `name`, `current`, `tmp`, `light`, `open`, `date`)
VALUES
	(1,'hello',5,12,3,1,'2014-04-13');

/*!40000 ALTER TABLE `current` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table demo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `demo`;

CREATE TABLE `demo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `tmp` int(11) NOT NULL DEFAULT '0',
  `light` int(11) NOT NULL DEFAULT '0',
  `open` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `demo` WRITE;
/*!40000 ALTER TABLE `demo` DISABLE KEYS */;

INSERT INTO `demo` (`id`, `name`, `tmp`, `light`, `open`, `date`)
VALUES
	(10,'hello',12,3,1,'2014-04-13'),
	(8,'998',0,0,0,'2014-04-10');

/*!40000 ALTER TABLE `demo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table usr
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usr`;

CREATE TABLE `usr` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `usr` WRITE;
/*!40000 ALTER TABLE `usr` DISABLE KEYS */;

INSERT INTO `usr` (`id`, `name`, `password`)
VALUES
	(1,'admin','21232f297a57a5a743894a0e4a801fc3');

/*!40000 ALTER TABLE `usr` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
