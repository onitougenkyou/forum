-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 27 Mars 2017 à 08:07
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

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_role` text,
  `user_name_family` varchar(30) DEFAULT NULL,
  `user_date` date DEFAULT NULL,
  `user_description` varchar(250) DEFAULT NULL,
  `user_avatar` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_role`, `user_name_family`, `user_date`, `user_description`, `user_avatar`) VALUES
(35, 'Laurent', 'laurent@gmail.com', '$2y$10$2mnschIE2B7jcTuCQVRkkOdIHPgQEbHJFfAO11fpuoCoo/O2x2PUe', 'super-admin', NULL, NULL, NULL, NULL),
(36, 'david', 'droulier@gmail.com', '$2y$10$GZiGiQ4QvanlBdng6ye/hewegL0Xz0pvWIOLHELS82GPFBiH1DMXO', NULL, NULL, NULL, NULL, NULL),
(37, 'lolo', 'lolo@gmail.com', '$2y$10$to.dSHakjkVPSZg2n1AQDef5WGSB1axnwubvsTQ47bKmOKYFnVt1e', NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
