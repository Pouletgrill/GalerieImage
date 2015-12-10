-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 10 Décembre 2015 à 05:00
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
  `Date` varchar(50) NOT NULL,
  `commentaire` varchar(150) NOT NULL,
  `IDImage` varchar(50) NOT NULL,
  PRIMARY KEY (`IdCommentaire`),
  KEY `User` (`User`),
  KEY `IDImage` (`IDImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`IdCommentaire`, `User`, `Date`, `commentaire`, `IDImage`) VALUES
(13, 't', '2015-12-10 04:14:27', 'gg', 'img_5668edc37aa3d'),
(14, 't', '2015-12-10 04:14:33', 'dsgsdgds', 'img_5668edcc9fb71'),
(15, 't', '2015-12-10 04:14:54', 'such beau', 'img_5668ee26e5ab6');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `IdImage` varchar(100) NOT NULL,
  `User` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`IdImage`),
  KEY `User` (`User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`IdImage`, `User`, `date`) VALUES
('img_5668edc37aa3d', 'kilo', '2015-12-10 04:13:07'),
('img_5668edcc9fb71', 'kilo', '2015-12-10 04:13:16'),
('img_5668ee26e5ab6', 't', '2015-12-10 04:14:46');

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
('admin', 'admin', 'admin', '::1', '2015-12-09 02:14:16'),
('kilo', 'octet', 'kilo', '::1', '2015-12-10 04:12:49'),
('pouletgrill', 'chien', 'pouletgrill', '::1', '2015-12-09 04:05:42'),
('q', 'q', 'q', '::1', '2015-12-10 04:41:56'),
('t', 't', 't', '::1', '2015-12-10 04:14:19');

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
