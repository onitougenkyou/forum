-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 23 Mars 2017 à 11:41
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
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_modification` datetime DEFAULT NULL,
  `auteur` int(11) DEFAULT NULL,
  `acl` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `titre` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `texte` text COLLATE utf8_bin,
  `sujet_id` int(11) DEFAULT NULL,
  `affichage` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `date_creation`, `date_modification`, `auteur`, `acl`, `titre`, `texte`, `sujet_id`, `affichage`) VALUES
(1, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.', 1, 1),
(2, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 4521', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(3, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 45210', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(4, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 4621', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(5, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 43201', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(6, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 92501', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(7, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 82501', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(8, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 85420', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(9, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 87451', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(10, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 965420', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(11, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 05461', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(12, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 9541', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 2, 1),
(13, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 4512', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 2, 1),
(14, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 4512', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 2, 1),
(15, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 97854', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 2, 1),
(16, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 924', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(17, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 74136', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(18, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 4521', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 0),
(19, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 746', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 0),
(20, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 98254', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 0),
(21, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 7141', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(22, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 6955', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(23, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 46412', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(24, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 754', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(25, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 4252', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(26, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 456', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1),
(27, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Message 546', '\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.\r\n	', 1, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
