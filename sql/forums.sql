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
(1, '2017-03-22 00:00:00', '2017-03-22 00:00:00', 1, NULL, 'North Korea missile launch ''fails''', 'A North Korean missile launch has failed, South Korean defence officials say, but it is unclear how many were fired or what exactly was being tested.\r\n\r\nThe US military said it detected a missile which appeared to explode within seconds of being launched.\r\n\r\nNorth Korea is banned from any missile or nuclear tests by the United Nations.\r\n\r\nHowever, it has conducted such tests with increasing frequency and experts say this could lead to advances in its missile technology.\r\n\r\nEarlier this month, the North fired four missiles that flew about 1,000km (620 miles), landing in Japanese waters.', 1, NULL, NULL, 0, NULL),
(2, '2017-03-22 00:00:00', '2017-03-22 00:00:00', 1, NULL, 'Scientists Sound the Alarm: CO2 Levels Race Past Point of No Return', 'The National Oceanic and Atmospheric Administration (NOAA) reported that carbon dioxide levels in 2016 broke records for the second year in a row with an increase of 3 parts per million (ppm).', 1, 1, NULL, 0, NULL),
(4, '2017-03-22 00:00:00', '2017-03-22 00:00:00', 1, NULL, 'No African citizens granted visas for African trade summit in California ', 'An annual African trade summit in California had no African attendees this year after at least 60 people were denied visas, according to event leaders.', 1, NULL, NULL, 0, NULL),
(5, '2017-03-22 00:00:00', '2017-03-22 00:00:00', 1, NULL, 'Pearson Posts a $3.3 Billion Loss as It Faces Down a Collapse in Its Biggest Market', 'Pearson, the global education company battling a collapse in its biggest market, said it would take further costs out of the business and look to sell some assets after posting a $3.3 billion pretax loss and a sharp rise in debt.', 0, NULL, NULL, 0, NULL),
(6, '2017-03-22 00:00:00', '2017-03-22 00:00:00', 1, NULL, 'Saudi Arabia ‘expects Donald Trump to scrap 9/11 victims law’ as first cases brought against kingdom', 'Saudi Arabia is expecting President Donald Trump to reverse a US law allowing families of the victims of the 9/11 attacks to sue the kingdom, as the first law suit related to the attacks is filed in New York, it has been reported. ', 0, NULL, 2, 0, NULL),
(7, '2017-03-22 00:00:00', '2017-03-22 00:00:00', 1, NULL, 'Goldman Sachs confirms London jobs will move to Europe in first stage of Brexit reshuffle', 'Goldman Sachs will shift jobs away from London while bulking up its European presence by "hundreds of people" as it executes on Brexit contingency plans, the chief executive officer of Goldman Sachs International told CNBC on Tuesday.Test ÅÄÖ Tåän', 1, NULL, 1, 0, NULL);

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
