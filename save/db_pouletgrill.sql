-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 10 Décembre 2015 à 21:27
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db_pouletgrill`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `IdCommentaire` bigint(20) NOT NULL AUTO_INCREMENT,
  `User` varchar(50) NOT NULL,
  `Date` datetime NOT NULL,
  `commentaire` varchar(150) NOT NULL,
  `IDImage` varchar(50) NOT NULL,
  PRIMARY KEY (`IdCommentaire`),
  KEY `User` (`User`),
  KEY `IDImage` (`IDImage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `IdImage` varchar(100) NOT NULL,
  `User` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`IdImage`),
  KEY `User` (`User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `usager`
--

CREATE TABLE IF NOT EXISTS `usager` (
  `User` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `Ipadress` varchar(20) NOT NULL,
  `timeconnexion` datetime NOT NULL,
  PRIMARY KEY (`User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `usager`
--

INSERT INTO `usager` (`User`, `password`, `fullname`, `Ipadress`, `timeconnexion`) VALUES
('aa', 'aa', 'aa', '::1', '2000-12-12 23:23:23'),
('admin', 'admin', 'Le Dieu Du Vinaigre', '::1', '2015-12-10 21:26:34'),
('Chakrar', 'asdf', 'Charkrar', '::1', '2015-12-10 21:23:01'),
('Charle', 'charlie', 'Charlie Laploante', '::1', '2015-12-10 21:19:52'),
('df', 'df', 'df', '::1', '2015-12-10 21:23:53'),
('ge', 'ge', 'ge', '::1', '2015-12-10 21:23:59'),
('pouletgrill', 'qwerty123', 'Xavier Brosseau', '::1', '2015-12-10 21:21:44'),
('q', 'q', 'q', '::1', '2015-12-10 21:26:17'),
('qwerty', 'qwerty', 'qwerty', '::1', '2015-12-10 21:19:32'),
('singe', 'maqake', 'filamon', '::1', '2015-12-10 21:19:06'),
('t', 't', 't', '::1', '2015-12-10 21:14:58'),
('Vazelyne', 'chien', 'Vazelyne', '::1', '2015-12-10 21:15:14'),
('YOUPI', 'singe', 'youpi', '::1', '2015-12-10 21:19:20');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `IdImageFK` FOREIGN KEY (`IDImage`) REFERENCES `image` (`IdImage`) ON DELETE CASCADE,
  ADD CONSTRAINT `UserIdCommentaireFK` FOREIGN KEY (`User`) REFERENCES `usager` (`User`) ON DELETE CASCADE;

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `UserIdImageFK` FOREIGN KEY (`User`) REFERENCES `usager` (`User`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
