-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 10 fév. 2020 à 22:25
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

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

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `name_photo` varchar(30) NOT NULL,
  `whichpig_photo` int(11) NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pig`
--

INSERT INTO `pig` (`id_pig`, `name_pig`, `sex_pig`, `weight_pig`, `mother_pig`, `father_pig`, `birthdate_pig`, `deathdate_pig`, `state_pig`, `thumbnail_pig`, `updated_at_pig`) VALUES
(1, 'Cochonou', 1, '11.474', NULL, NULL, '2020-02-02 11:39:25', '2020-02-19 11:40:31', 1, 0, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
