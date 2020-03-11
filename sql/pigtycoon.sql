-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 11 mars 2020 à 20:51
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pigtycoon`
--

-- --------------------------------------------------------

--
-- Structure de la table `link_photo_pig`
--

DROP TABLE IF EXISTS `link_photo_pig`;
CREATE TABLE IF NOT EXISTS `link_photo_pig` (
  `id_pig` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL,
  PRIMARY KEY (`id_pig`,`id_photo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `name_photo` varchar(30) NOT NULL,
  `whichpig_photo` int(11) NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id_photo`, `name_photo`, `whichpig_photo`) VALUES
(1, '1.jpg', 1),
(2, '2.jpg', 2),
(3, '3.jpg', 3),
(4, '4.jpg', 4),
(5, '5.jpg', 5),
(6, '6.jpg', 6),
(7, '7.jpg', 7),
(8, '8.jpg', 8),
(9, '9.jpg', 9),
(10, '10.jpg', 10),
(11, '11.jpg', 11),
(12, '12.jpg', 12),
(13, '13.jpg', 13),
(14, '14.jpg', 14),
(15, '15.jpg', 15),
(16, '16.jpg', 16),
(17, '17.jpg', 17),
(18, '18.jpg', 18);

-- --------------------------------------------------------

--
-- Structure de la table `pig`
--

DROP TABLE IF EXISTS `pig`;
CREATE TABLE IF NOT EXISTS `pig` (
  `id_pig` int(11) NOT NULL AUTO_INCREMENT,
  `name_pig` varchar(100) NOT NULL,
  `sex_pig` tinyint(4) NOT NULL,
  `weight_pig` decimal(7,3) NOT NULL,
  `mother_pig` int(11) DEFAULT NULL,
  `father_pig` int(11) DEFAULT NULL,
  `birthdate_pig` datetime DEFAULT NULL,
  `deathdate_pig` datetime DEFAULT NULL,
  `state_pig` tinyint(4) NOT NULL DEFAULT '1',
  `thumbnail_pig` int(11) NOT NULL,
  `updated_at_pig` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pig`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pig`
--

INSERT INTO `pig` (`id_pig`, `name_pig`, `sex_pig`, `weight_pig`, `mother_pig`, `father_pig`, `birthdate_pig`, `deathdate_pig`, `state_pig`, `thumbnail_pig`, `updated_at_pig`) VALUES
(1, 'Cochonou', 1, '11.474', NULL, NULL, '2020-02-02 11:39:25', '2020-02-19 11:40:31', 1, 1, NULL),
(2, 'Fifou', 0, '12.633', NULL, NULL, '2019-06-06 09:36:38', '2023-04-30 09:36:38', 1, 2, NULL),
(3, 'Palouch', 1, '1.740', NULL, NULL, '2019-09-28 09:35:12', '2020-03-26 09:35:12', 1, 3, NULL),
(4, 'Splash', 1, '16.248', NULL, NULL, '2019-08-20 21:13:59', '2021-08-08 21:13:59', 1, 4, NULL),
(5, 'Vivi', 0, '15.455', NULL, NULL, '2019-11-17 21:13:59', '2025-07-21 21:13:59', 1, 5, NULL),
(6, 'Babe', 1, '21.883', NULL, NULL, '2019-06-19 21:13:59', '2021-12-30 21:13:59', 1, 6, NULL),
(7, 'Knack', 1, '10.944', NULL, NULL, '2020-02-02 21:13:59', '2022-11-20 21:13:59', 1, 7, NULL),
(8, 'Titoulatouich', 0, '18.168', NULL, NULL, '2020-01-07 21:13:59', '2022-07-06 21:13:59', 1, 8, NULL),
(9, 'Kuti', 0, '20.778', NULL, NULL, '2020-01-31 21:29:44', '2024-11-02 21:29:44', 1, 9, NULL),
(10, 'Blob', 0, '16.875', NULL, NULL, '2019-05-16 21:30:29', '2024-06-05 21:30:29', 1, 10, NULL),
(11, 'Schnouch', 0, '6.916', NULL, NULL, '2020-01-24 21:31:40', '2020-06-11 21:31:40', 1, 11, NULL),
(12, 'Coco', 1, '15.779', NULL, NULL, '2019-08-12 21:33:44', '2022-10-01 21:33:44', 1, 12, NULL),
(13, 'Blartzek', 0, '15.578', NULL, NULL, '2019-06-16 21:34:01', '2022-09-13 21:34:01', 1, 13, NULL),
(14, 'Nourtaf', 1, '22.803', NULL, NULL, '2019-12-02 21:38:58', '2023-03-01 21:38:58', 1, 14, NULL);

--
-- Déclencheurs `pig`
--
DROP TRIGGER IF EXISTS `duree_de_vie`;
DELIMITER $$
CREATE TRIGGER `duree_de_vie` BEFORE INSERT ON `pig` FOR EACH ROW SET
NEW.birthdate_pig = (SELECT NOW() - INTERVAL FLOOR(RAND() * 300) DAY),
NEW.deathdate_pig = (SELECT NOW() + INTERVAL FLOOR(RAND() * 2000) DAY)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `sex`
--

DROP TABLE IF EXISTS `sex`;
CREATE TABLE IF NOT EXISTS `sex` (
  `id_sex` int(11) NOT NULL,
  `type_sex` varchar(100) NOT NULL,
  PRIMARY KEY (`id_sex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sex`
--

INSERT INTO `sex` (`id_sex`, `type_sex`) VALUES
(0, 'femelle'),
(1, 'mâle');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
