-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 27 Mars 2017 à 16:20
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
(1, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'At least 30 dead after US air strike hits Syrian school where civilians had taken shelter', 'At least 30 Syrian civilians were killed in an air strike by the US-led coalition fighting Islamic State militants in a rural area of Raqqa province early on Tuesday, according to residents, activists and state television.\r\n\r\nThe US-led coalition said it had no indications an air strike had hit civilians, but in its daily report on coalition strikes, the US military acknowledged that strikes were carried out in the area. It said that on Tuesday, coalition warplanes carried out 19 air strikes – an unusually high number for a single day – on a range of Islamic State facilities near the city of Raqqa.\r\n\r\nThe attack, which hit a school in the town of Mansoura, where civilians had taken shelter on Tuesday night, was the second time in a week that Syrians had accused the United States of involvement in a strike that killed dozens of noncombatants.\r\n\r\nForty-nine people died last week when US warplanes fired on a target in Al Jinah, a village in western Aleppo province. US officials said the attack had hit a building where al-Qaeda operatives were meeting, but residents said the warplanes had struck a mosque where hundreds of people had gathered for a weekly religious meeting.', 1, 1),
(2, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'North Korea blasts Trump for being too much like Obama', 'TOKYO — North Korea has a criticism of U.S. President Donald Trump he probably wasn’t expecting: He’s too much like Barack Obama.\r\n\r\nNorth Korea’s state media, which regularly vilified Obama in the strongest terms, had been slow to do the same with the Trump administration, possibly so that officials in Pyongyang could figure out what direction Trump will likely take and what new policies he may pursue.\r\n\r\nBut his top diplomat’s recent trip to Asia, which featured some pretty tough talk, appears to have loosened their lips.\r\n\r\nIn North Korea’s first official comments since new Secretary of State Rex Tillerson’s swing through the region, a Foreign Ministry spokesman seized on the former oil executive’s blunt assessment that Obama’s strategy needs to be replaced and U.S. efforts to get North Korea to denuclearize over the past 20 years have been a failure.\r\n\r\nThe spokesman then slammed Trump for adopting the same policies, particularly regarding tougher economic sanctions, nevertheless.\r\n', 1, 1),
(3, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet4521', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 1),
(4, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet421', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 1),
(5, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet1234', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 1),
(6, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet15314', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 1),
(7, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet12312', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 1),
(8, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet4321', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 1),
(9, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet5445', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 1),
(10, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet0861454', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 1),
(11, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet43512', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 1),
(12, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet43512', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 0, 6),
(13, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet4521', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 2),
(14, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet421', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 6),
(15, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet1234', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 5),
(16, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet15314', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 5),
(17, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet12312', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 5),
(18, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet4321', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 3),
(19, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet5445', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 2),
(20, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet0861454', '\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie. In commodo augue eget ipsum facilisis, sagittis ornare mauris mattis. Vivamus bibendum efficitur lacus eu cursus. Donec placerat malesuada sagittis. In fermentum mauris non eros consequat pulvinar nec nec ex. Sed commodo blandit lacinia. Praesent consectetur maximus quam eu gravida. Nam nunc lacus, tincidunt et orci quis, porta pulvinar nisi. \r\n		', 1, 2);

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
