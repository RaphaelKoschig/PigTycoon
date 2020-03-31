-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 29 mars 2020 à 13:26
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
  PRIMARY KEY (`id_pig`,`id_photo`),
  KEY `fk_link_photo` (`id_photo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `link_photo_pig`
--

INSERT INTO `link_photo_pig` (`id_pig`, `id_photo`) VALUES
(7, 1),
(14, 1),
(16, 1),
(20, 1),
(28, 1),
(31, 1),
(36, 1),
(42, 1),
(49, 1),
(4, 2),
(5, 2),
(10, 2),
(17, 2),
(23, 2),
(28, 2),
(29, 2),
(33, 2),
(37, 2),
(40, 2),
(10, 3),
(28, 3),
(34, 3),
(47, 3),
(7, 4),
(8, 4),
(9, 4),
(17, 4),
(21, 4),
(22, 4),
(30, 4),
(40, 4),
(41, 4),
(48, 4),
(3, 5),
(7, 5),
(12, 5),
(15, 5),
(23, 5),
(41, 5),
(42, 5),
(43, 5),
(45, 5),
(6, 6),
(11, 6),
(13, 6),
(15, 6),
(17, 6),
(27, 6),
(35, 6),
(38, 6),
(45, 6),
(46, 6),
(5, 7),
(25, 7),
(26, 7),
(36, 7),
(38, 7),
(44, 7),
(10, 8),
(21, 8),
(22, 8),
(26, 8),
(32, 8),
(37, 8),
(1, 9),
(6, 9),
(8, 9),
(9, 9),
(11, 9),
(13, 9),
(19, 9),
(20, 9),
(24, 9),
(31, 9),
(35, 9),
(36, 9),
(37, 9),
(43, 9),
(47, 9),
(6, 10),
(14, 10),
(18, 10),
(20, 10),
(24, 10),
(26, 10),
(27, 10),
(31, 10),
(33, 10),
(39, 10),
(40, 10),
(12, 11),
(13, 11),
(18, 11),
(22, 11),
(25, 11),
(34, 11),
(35, 11),
(45, 11),
(46, 11),
(48, 11),
(12, 12),
(14, 12),
(24, 12),
(27, 12),
(32, 12),
(39, 12),
(2, 13),
(4, 13),
(11, 13),
(18, 13),
(21, 13),
(32, 13),
(47, 13),
(3, 14),
(8, 14),
(9, 14),
(15, 14),
(19, 14),
(29, 14),
(30, 14),
(42, 14),
(44, 14),
(1, 15),
(4, 15),
(16, 15),
(19, 15),
(38, 15),
(43, 15),
(44, 15),
(48, 15),
(49, 15),
(49, 16),
(1, 17),
(2, 17),
(3, 17),
(23, 17),
(25, 17),
(30, 17),
(34, 17),
(39, 17),
(41, 17),
(2, 18),
(5, 18),
(16, 18),
(29, 18),
(33, 18),
(46, 18);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `name_photo` varchar(30) NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id_photo`, `name_photo`) VALUES
(1, '1.jpg'),
(2, '2.jpg'),
(3, '3.jpg'),
(4, '4.jpg'),
(5, '5.jpg'),
(6, '6.jpg'),
(7, '7.jpg'),
(8, '8.jpg'),
(9, '9.jpg'),
(10, '10.jpg'),
(11, '11.jpg'),
(12, '12.jpg'),
(13, '13.jpg'),
(14, '14.jpg'),
(15, '15.jpg'),
(16, '16.jpg'),
(17, '17.jpg'),
(18, '18.jpg');

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
  PRIMARY KEY (`id_pig`),
  KEY `fk_pig_thumbnail` (`thumbnail_pig`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pig`
--

INSERT INTO `pig` (`id_pig`, `name_pig`, `sex_pig`, `weight_pig`, `mother_pig`, `father_pig`, `birthdate_pig`, `deathdate_pig`, `state_pig`, `thumbnail_pig`, `updated_at_pig`) VALUES
(1, 'Zodiac', 1, '5.666', NULL, NULL, '2019-06-11 14:50:27', '2021-03-16 14:50:27', 1, 18, NULL),
(2, 'Fred', 0, '8.807', NULL, NULL, '2020-01-31 14:50:27', '2024-09-05 14:50:27', 1, 9, NULL),
(3, 'Saucisson', 1, '1.937', 1, 2, '2019-10-10 14:50:27', '2024-02-28 14:50:27', 1, 17, NULL),
(4, 'Bagels', 0, '6.759', 1, 2, '2019-06-30 14:50:27', '2024-01-05 14:50:27', 1, 14, NULL),
(5, 'Pluton', 0, '7.615', 1, 2, '2020-02-06 14:50:27', '2025-01-17 14:50:27', 1, 17, NULL),
(6, 'Felin', 1, '19.256', 1, 2, '2019-11-14 14:50:27', '2023-03-07 14:50:27', 1, 7, NULL),
(7, 'Iron Man', 1, '20.340', 1, 2, '2019-07-09 14:50:27', '2022-12-26 14:50:27', 1, 17, NULL),
(8, 'Pet', 1, '11.140', 6, 4, '2020-03-07 14:50:27', '2024-11-22 14:50:27', 1, 1, NULL),
(9, 'Bouftou', 1, '17.385', 6, 4, '2019-12-13 14:50:27', '2022-01-28 14:50:27', 1, 12, NULL),
(10, 'Chichou', 1, '4.305', 6, 4, '2019-07-19 14:50:27', '2024-04-24 14:50:27', 1, 4, NULL),
(11, 'Porco', 1, '9.383', 1, 2, '2020-03-29 14:53:15', '2023-07-06 14:53:15', 1, 14, NULL),
(12, 'Fritch', 1, '2.032', 1, 2, '2020-03-29 14:53:15', '2024-03-02 14:53:15', 1, 9, NULL),
(13, 'Manako', 0, '15.941', 1, 2, '2020-03-29 14:53:15', '2024-02-15 14:53:15', 1, 6, NULL),
(14, 'Ditolo', 0, '2.305', 1, 2, '2020-03-29 14:53:15', '2020-12-31 14:53:15', 1, 10, NULL),
(15, 'Fred', 0, '18.428', 1, 2, '2020-03-29 14:53:15', '2020-12-30 14:53:15', 1, 2, NULL),
(16, 'Marteau', 1, '13.043', 1, 2, '2020-03-29 14:53:15', '2020-11-09 14:53:15', 1, 15, NULL),
(17, 'Neptune', 0, '20.139', 1, 2, '2020-03-29 14:53:15', '2022-09-12 14:53:15', 1, 8, NULL),
(18, 'Falafel', 1, '10.338', 1, 2, '2020-03-29 14:53:15', '2024-07-13 14:53:15', 1, 10, NULL),
(19, 'Chorizo', 0, '6.200', 8, 4, '2020-03-29 14:53:24', '2022-12-27 14:53:24', 1, 14, NULL),
(20, 'Gradubide', 0, '11.208', 8, 4, '2020-03-29 14:53:24', '2020-12-21 14:53:24', 1, 3, NULL),
(21, 'Cochonou', 0, '20.983', 8, 4, '2020-03-29 14:53:24', '2021-01-24 14:53:24', 1, 15, NULL),
(22, 'Soleil', 0, '8.244', 8, 4, '2020-03-29 14:53:24', '2024-10-21 14:53:24', 1, 2, NULL),
(23, 'Fratz', 0, '16.446', 11, 17, '2020-03-29 14:53:30', '2022-06-22 14:53:30', 1, 14, NULL),
(24, 'Mars', 0, '15.823', 11, 17, '2020-03-29 14:53:30', '2023-04-30 14:53:30', 1, 12, NULL),
(25, 'Tony Stark', 0, '14.134', 11, 17, '2020-03-29 14:53:30', '2022-07-10 14:53:30', 1, 3, NULL),
(26, 'Ditolo', 0, '5.477', 11, 17, '2020-03-29 14:53:30', '2021-03-29 14:53:30', 1, 5, NULL),
(27, 'Gras', 1, '12.715', 11, 17, '2020-03-29 14:53:30', '2025-05-24 14:53:30', 1, 18, NULL),
(28, 'Brouette', 1, '16.476', 11, 17, '2020-03-29 14:53:30', '2020-10-05 14:53:30', 1, 4, NULL),
(29, 'Jarpol', 0, '20.418', 11, 17, '2020-03-29 14:53:30', '2022-05-25 14:53:30', 1, 2, NULL),
(30, 'Blepops', 0, '2.051', 18, 25, '2020-03-29 14:53:50', '2022-08-15 14:53:50', 1, 1, NULL),
(31, 'Goret', 0, '16.851', 28, 30, '2020-03-29 14:55:02', '2021-01-06 14:55:02', 1, 7, NULL),
(32, 'Leon', 1, '15.811', 28, 30, '2020-03-29 14:55:31', '2022-01-17 14:55:31', 1, 9, NULL),
(33, 'Gras', 0, '10.425', 28, 30, '2020-03-29 14:55:31', '2025-03-08 14:55:31', 1, 3, NULL),
(34, 'Frouak', 1, '13.939', 28, 30, '2020-03-29 14:55:31', '2024-12-28 14:55:31', 1, 8, NULL),
(35, 'Jarpol', 0, '15.725', 28, 30, '2020-03-29 14:55:31', '2023-02-08 14:55:31', 1, 8, NULL),
(36, 'Gras', 1, '1.577', 12, 22, '2020-03-29 14:58:06', '2021-09-27 14:58:06', 1, 6, NULL),
(37, 'Jojo', 1, '3.421', 12, 22, '2020-03-29 14:58:06', '2024-09-29 14:58:06', 1, 15, NULL),
(38, 'Chapi', 0, '4.565', 12, 22, '2020-03-29 14:58:06', '2020-06-02 14:58:06', 1, 12, NULL),
(39, 'Burger', 0, '19.882', 12, 23, '2020-03-29 14:58:12', '2023-08-12 14:58:12', 1, 5, NULL),
(40, 'Bagels', 0, '4.787', 12, 23, '2020-03-29 14:58:12', '2024-07-24 14:58:12', 1, 8, NULL),
(41, 'Nikita', 1, '10.500', 12, 23, '2020-03-29 14:58:12', '2024-09-03 14:58:12', 1, 12, NULL),
(42, 'Arielle', 1, '12.645', 12, 23, '2020-03-29 14:58:12', '2024-10-31 14:58:12', 1, 9, NULL),
(43, 'Steak', 1, '5.719', 12, 23, '2020-03-29 14:58:12', '2020-06-07 14:58:12', 1, 9, NULL),
(44, 'Fravbi', 1, '1.729', 32, 20, '2020-03-29 14:58:18', '2021-08-06 14:58:18', 1, 3, NULL),
(45, 'Sander', 1, '3.533', 32, 20, '2020-03-29 14:58:18', '2025-04-21 14:58:18', 1, 5, NULL),
(46, 'Grespolti', 0, '10.888', 32, 20, '2020-03-29 14:58:18', '2020-12-26 14:58:18', 1, 5, NULL),
(47, 'Manako', 1, '7.473', 32, 20, '2020-03-29 14:58:18', '2024-12-26 14:58:18', 1, 8, NULL),
(48, 'Fratz', 0, '20.380', 32, 20, '2020-03-29 14:58:18', '2021-05-26 14:58:18', 1, 4, NULL),
(49, 'Blork', 0, '3.949', 32, 20, '2020-03-29 14:58:18', '2022-04-21 14:58:18', 1, 9, NULL);

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

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `link_photo_pig`
--
ALTER TABLE `link_photo_pig`
  ADD CONSTRAINT `fk_link_photo` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_link_pig` FOREIGN KEY (`id_pig`) REFERENCES `pig` (`id_pig`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pig`
--
ALTER TABLE `pig`
  ADD CONSTRAINT `fk_pig_thumbnail` FOREIGN KEY (`thumbnail_pig`) REFERENCES `photo` (`id_photo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
