-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 09 Décembre 2015 à 23:58
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`IdCommentaire`, `User`, `Date`, `commentaire`, `IDImage`) VALUES
(2, 'admin', '2015-12-09 22:34:24', 'non rien de rien', 'img_566887c2ce0dc'),
(6, 'pouletgrill', '2015-12-09 23:47:03', 'Gang de Nulos! c''est moi le vrai poula', 'img_566887c2ce0dc'),
(7, 'admin', '2015-12-09 23:50:52', 'Lol Phil est fatiguer pour vrai!', 'img_566887ca43de8');

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
('img_566882636f302', 'q', '2015-12-09 20:34:59'),
('img_566882e75ea1c', 'q', '2015-12-09 20:37:11'),
('img_566887c2ce0dc', 'pouletgrill', '2015-12-09 20:57:54'),
('img_566887ca43de8', 'pouletgrill', '2015-12-09 20:58:02'),
('img_566887d056714', 'pouletgrill', '2015-12-09 20:58:08'),
('img_5668886ac9a11', 'admin', '2015-12-09 21:00:42'),
('img_56688872e2e29', 'admin', '2015-12-09 21:00:50'),
('img_5668887eb53da', 'admin', '2015-12-09 21:01:02'),
('img_5668b07d7203b', 'lenouvo', '2015-12-09 23:51:41');

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
('Lenouvo', 'yolo', 'Le new', '::1', '2015-12-09 23:51:20'),
('pouletgrill', 'chien', 'pouletgrill', '::1', '2015-12-09 04:05:42'),
('q', 'q', 'q', '::1', '2015-12-09 19:36:53');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `IdImageFK` FOREIGN KEY (`IDImage`) REFERENCES `image` (`IdImage`),
  ADD CONSTRAINT `UserIdCommentaireFK` FOREIGN KEY (`User`) REFERENCES `usager` (`User`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `UserIdImageFK` FOREIGN KEY (`User`) REFERENCES `usager` (`User`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
