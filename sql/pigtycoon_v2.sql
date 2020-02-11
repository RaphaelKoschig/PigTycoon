-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 11 fév. 2020 à 16:13
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.19

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
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id_photo` int(11) NOT NULL,
  `name_photo` varchar(30) NOT NULL,
  `whichpig_photo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE `pig` (
  `id_pig` int(11) NOT NULL,
  `name_pig` varchar(100) NOT NULL,
  `sex_pig` tinyint(4) NOT NULL,
  `weight_pig` decimal(7,3) NOT NULL,
  `mother_pig` int(11) DEFAULT NULL,
  `father_pig` int(11) DEFAULT NULL,
  `birthdate_pig` datetime DEFAULT NULL,
  `deathdate_pig` datetime DEFAULT NULL,
  `state_pig` tinyint(4) NOT NULL DEFAULT '1',
  `thumbnail_pig` int(11) NOT NULL,
  `updated_at_pig` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pig`
--

INSERT INTO `pig` (`id_pig`, `name_pig`, `sex_pig`, `weight_pig`, `mother_pig`, `father_pig`, `birthdate_pig`, `deathdate_pig`, `state_pig`, `thumbnail_pig`, `updated_at_pig`) VALUES
(1, 'Cochonou', 1, '11.474', NULL, NULL, '2020-02-02 11:39:25', '2020-02-19 11:40:31', 1, 1, NULL),
(2, 'Fifou', 0, '12.633', NULL, NULL, '2019-06-06 09:36:38', '2023-04-30 09:36:38', 1, 2, NULL),
(3, 'Palouch', 1, '1.740', NULL, NULL, '2019-09-28 09:35:12', '2020-03-26 09:35:12', 1, 3, NULL);

--
-- Déclencheurs `pig`
--
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

CREATE TABLE `sex` (
  `id_sex` int(11) NOT NULL,
  `type_sex` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sex`
--

INSERT INTO `sex` (`id_sex`, `type_sex`) VALUES
(0, 'femelle'),
(1, 'mâle');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`);

--
-- Index pour la table `pig`
--
ALTER TABLE `pig`
  ADD PRIMARY KEY (`id_pig`);

--
-- Index pour la table `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`id_sex`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `pig`
--
ALTER TABLE `pig`
  MODIFY `id_pig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
