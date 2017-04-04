-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 04 Avril 2017 à 07:37
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dblogin`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_role` int(11) DEFAULT '0',
  `user_name_family` varchar(30) DEFAULT NULL,
  `user_date` date DEFAULT NULL,
  `user_description` varchar(250) DEFAULT NULL,
  `user_avatar` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_role`, `user_name_family`, `user_date`, `user_description`, `user_avatar`) VALUES
(35, 'Laurent', 'laurent@gmail.com', '$2y$10$2mnschIE2B7jcTuCQVRkkOdIHPgQEbHJFfAO11fpuoCoo/O2x2PUe', 5, NULL, NULL, NULL, NULL),
(36, 'david', 'droulier@gmail.com', '$2y$10$GZiGiQ4QvanlBdng6ye/hewegL0Xz0pvWIOLHELS82GPFBiH1DMXO', 3, NULL, NULL, NULL, NULL),
(37, 'lolo', 'lolo@gmail.com', '$2y$10$to.dSHakjkVPSZg2n1AQDef5WGSB1axnwubvsTQ47bKmOKYFnVt1e', 0, NULL, NULL, NULL, NULL),
(38, 'argetkill', 'flo.pouyer@hotmail.fr', '$2y$10$Qx82lLmgWnxJKUwHj9WKfeX23Vs.oYOXv.QWV8k002oFXwFiqxUs2', 5, 'pouyer', '1994-05-29', '', NULL),
(39, '', '', '', 1, NULL, NULL, NULL, NULL),
(40, 'flo', 'flo@hotmail.fr', '$2y$10$kZq96ttA5j1Q2zFC/GzJ7uyXEX2xTrZ1j0i.o.VjpHbsvJMTgQWBC', 0, NULL, NULL, NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
