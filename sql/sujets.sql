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
-- Structure de la table `sujets`
--

DROP TABLE IF EXISTS `sujets`;
CREATE TABLE IF NOT EXISTS `sujets` (
  `id` int(11) NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_modification` datetime DEFAULT NULL,
  `auteur` int(11) DEFAULT NULL,
  `acl` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `titre` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `texte` text COLLATE utf8_bin,
  `affichage` tinyint(4) DEFAULT '1',
  `forum_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `sujets`
--

INSERT INTO `sujets` (`id`, `date_creation`, `date_modification`, `auteur`, `acl`, `titre`, `texte`, `affichage`, `forum_id`) VALUES
(1, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet01', 'Description01', 1, 1),
(2, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet02', 'Description02', 1, 1),
(3, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet03', 'Description03', 1, 1),
(4, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet04', 'Description04', 0, 1),
(5, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet05', 'Description05', 1, 1),
(11, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet11', 'Description06', 1, 2),
(12, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet12', 'Description07', 1, 2),
(13, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet13', 'Description08', 1, 2),
(14, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet14', 'Description09', 0, 2),
(15, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet15', 'Description10', 1, 2),
(21, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet16', 'Description11', 1, 3),
(22, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet17', 'Description12', 1, 3),
(23, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet18', 'Description13', 1, 3),
(24, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet19', 'Description14', 0, 3),
(25, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet20', 'Description15', 1, 3),
(31, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet21', 'Description16', 1, 4),
(32, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet22', 'Description17', 1, 4),
(33, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet23', 'Description18', 1, 4),
(34, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet24', 'Description19', 0, 4),
(35, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet25', 'Description20', 1, 4),
(36, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet26', 'Description21', 1, 5),
(37, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet27', 'Description22', 1, 5),
(38, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet28', 'Description23', 1, 5),
(39, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet29', 'Description24', 0, 5),
(40, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet30', 'Description25', 1, 5);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `sujets`
--
ALTER TABLE `sujets`
 ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
