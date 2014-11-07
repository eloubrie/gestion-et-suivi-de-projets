-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 07 Novembre 2014 à 18:09
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cdp`
--
CREATE DATABASE IF NOT EXISTS `cdp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cdp`;

-- --------------------------------------------------------

--
-- Structure de la table `developpeurs`
--

CREATE TABLE IF NOT EXISTS `developpeurs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` text COLLATE utf8_unicode_ci NOT NULL,
  `pass` text COLLATE utf8_unicode_ci NOT NULL,
  `droits` int(11) NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `developpeurs`
--

INSERT INTO `developpeurs` (`ID`, `pseudo`, `pass`, `droits`, `email`) VALUES
(1, 'loubrie', 'loubriePass', 0, 'elian.loubrie@gmail.com'),
(2, 'cheminade', 'cheminadePass', 0, 'cheminadedavid@gmail.com'),
(3, 'lamoureux', 'lamoureuxPass', 0, 'virgil1534@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `git`
--

CREATE TABLE IF NOT EXISTS `git` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `lien` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `git`
--

INSERT INTO `git` (`ID`, `lien`) VALUES
(1, 'https://github.com/eloubrie/gestion-et-suivi-de-projets/');

-- --------------------------------------------------------

--
-- Structure de la table `sprints`
--

CREATE TABLE IF NOT EXISTS `sprints` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `numero_du_sprint` int(11) NOT NULL,
  `cout` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_debut` date NOT NULL,
  `duree` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_fin` date NOT NULL,
  `titre` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `cout_valide` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `sprints`
--

INSERT INTO `sprints` (`ID`, `numero_du_sprint`, `cout`, `date_creation`, `date_debut`, `duree`, `date_fin`, `titre`, `description`, `cout_valide`) VALUES
(2, 1, 15, '2014-10-01', '0000-00-00', '15', '0000-00-00', 'sprint1', 'desc', 0),
(3, 2, 14, '2014-10-14', '2014-10-15', '14', '2014-10-29', 'sprint2', 'desc', 14);

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

CREATE TABLE IF NOT EXISTS `taches` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_US` int(11) DEFAULT NULL,
  `titre` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `type` int(11) NOT NULL,
  `cout` int(11) NOT NULL,
  `dependances` text COLLATE utf8_unicode_ci NOT NULL,
  `developpeur` int(11) DEFAULT NULL,
  `statut` int(11) NOT NULL,
  `date_realisation` date DEFAULT NULL,
  `date_test` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_US` (`ID_US`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Contenu de la table `taches`
--

INSERT INTO `taches` (`ID`, `ID_US`, `titre`, `description`, `type`, `cout`, `dependances`, `developpeur`, `statut`, `date_realisation`, `date_test`) VALUES
(1, 11, 'Tache 1', 'Description T1', 2, 3, '4', 1, 1, '0000-00-00', '0000-00-00'),
(3, 10, 'creation BDD', 'Création de la Base de Donnée', 3, 2, '5', 1, 0, '0000-00-00', '0000-00-00'),
(11, 11, 'mon Titre', 'jdkldkz', 1, 1, '2', 3, 0, '0000-00-00', '0000-00-00'),
(13, 11, 'myTasce', 'my desce', 4, 987, '1', 2, 2, '2014-11-06', '1111-11-11');

-- --------------------------------------------------------

--
-- Structure de la table `us`
--

CREATE TABLE IF NOT EXISTS `us` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `ID_sprint` int(11) DEFAULT NULL,
  `cout` int(11) NOT NULL,
  `statut` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `date_test` date DEFAULT NULL,
  `code_test` text COLLATE utf8_unicode_ci,
  `description_test` text COLLATE utf8_unicode_ci,
  `lien_git` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ID`),
  KEY `ID_sprint` (`ID_sprint`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Contenu de la table `us`
--

INSERT INTO `us` (`ID`, `titre`, `description`, `ID_sprint`, `cout`, `statut`, `date_debut`, `date_fin`, `date_test`, `code_test`, `description_test`, `lien_git`) VALUES
(10, 'Test', 'qsdqsd', 3, 610, 2, '1225-02-25', '1992-11-02', '0000-00-00', 'sfd', 'sdfsdf', 'lien'),
(11, 'Test2', 'desc2', 3, 55, 2, '1992-11-02', '1311-11-11', '0000-00-00', 'code', 'desc', 'lien'),
(13, 'Test de us4', 'desc4', 2, 987, 2, '4222-11-11', '4222-11-11', '0000-00-00', 'code4', 'desc4', 'lien4');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `taches`
--
ALTER TABLE `taches`
  ADD CONSTRAINT `us` FOREIGN KEY (`ID_US`) REFERENCES `us` (`ID`);

--
-- Contraintes pour la table `us`
--
ALTER TABLE `us`
  ADD CONSTRAINT `sprint` FOREIGN KEY (`ID_sprint`) REFERENCES `sprints` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
