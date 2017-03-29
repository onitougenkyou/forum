-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 29 Mars 2017 à 09:10
-- Version du serveur :  5.5.54-0+deb8u1
-- Version de PHP :  5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `IMIEforum`
--

-- --------------------------------------------------------

--
-- Structure de la table `forums`
--

DROP TABLE IF EXISTS `forums`;
CREATE TABLE IF NOT EXISTS `forums` (
  `id` int(11) NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_modification` datetime DEFAULT NULL,
  `auteur` int(11) DEFAULT NULL,
  `acl` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `titre` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin,
  `affichage` tinyint(4) DEFAULT '1' COMMENT 'Boolean\n\n0 : Masqué\n1 : Affiché',
  `image_id` int(11) DEFAULT NULL COMMENT '\n',
  `parent_id` int(11) DEFAULT NULL,
  `nb_sujet` int(11) DEFAULT '0',
  `dernier_message_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `forums`
--

INSERT INTO `forums` (`id`, `date_creation`, `date_modification`, `auteur`, `acl`, `titre`, `description`, `affichage`, `image_id`, `parent_id`, `nb_sujet`, `dernier_message_id`) VALUES
(1, '2017-03-22 00:00:00', '2017-03-22 00:00:00', 1, NULL, 'Forum01', 'Description01', 1, NULL, NULL, 5, 1),
(2, '2017-03-22 00:00:00', '2017-03-22 00:00:00', 1, NULL, 'Forum02', 'Description02', 1, NULL, NULL, 5, 2),
(3, '2017-03-22 00:00:00', '2017-03-22 00:00:00', 1, NULL, 'Forum03', 'Description03', 1, 1, NULL, 5, 3),
(4, '2017-03-22 00:00:00', '2017-03-22 00:00:00', 1, NULL, 'Forum04', 'Description04', 1, NULL, 1, 5, 4),
(5, '2017-03-22 00:00:00', '2017-03-22 00:00:00', 1, NULL, 'Forum05', 'Description05', 0, NULL, NULL, 5, 5);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `forums`
--
ALTER TABLE `forums`
 ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
