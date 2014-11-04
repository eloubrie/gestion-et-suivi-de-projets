-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 04 Novembre 2014 à 20:00
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
  `pseudo` text NOT NULL,
  `pass` text NOT NULL,
  `droits` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `git`
--

CREATE TABLE IF NOT EXISTS `git` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `lien` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `git`
--

INSERT INTO `git` (`ID`, `lien`) VALUES
(1, 'https://github.com/eloubrie/gestion-et-suivi-de-projets');

-- --------------------------------------------------------

--
-- Structure de la table `sprints`
--

CREATE TABLE IF NOT EXISTS `sprints` (
  `ID` int(11) NOT NULL,
  `Coût` int(11) NOT NULL,
  `Date de création` date NOT NULL,
  `Date de début` date NOT NULL,
  `Durée` varchar(255) NOT NULL,
  `Date de fin` date NOT NULL,
  `US associés` int(11) NOT NULL,
  `Titre` text NOT NULL,
  `Numéro du Sprint` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Coût Validé` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sprints`
--

INSERT INTO `sprints` (`ID`, `Coût`, `Date de création`, `Date de début`, `Durée`, `Date de fin`, `US associés`, `Titre`, `Numéro du Sprint`, `Description`, `Coût Validé`) VALUES
(1, 16, '2014-11-04', '2014-11-05', '3 mois', '2014-11-06', 1, 'toto', 0, 'totottotottoottoto', 10);

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

CREATE TABLE IF NOT EXISTS `taches` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `us` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `cout` int(11) NOT NULL,
  `dependances` text NOT NULL,
  `developpeur` int(11) NOT NULL,
  `statut` int(11) NOT NULL,
  `date_realisation` date NOT NULL,
  `date_test` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `taches`
--

INSERT INTO `taches` (`ID`, `titre`, `description`, `us`, `type`, `cout`, `dependances`, `developpeur`, `statut`, `date_realisation`, `date_test`) VALUES
(1, 'Tache 1', 'Description T1', 1, 2, 3, '4', 5, 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `us`
--

CREATE TABLE IF NOT EXISTS `us` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `projet` int(11) NOT NULL,
  `sprint` int(11) NOT NULL,
  `cout` int(11) NOT NULL,
  `dependances` text NOT NULL,
  `statut` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `date_test` date NOT NULL,
  `code_test` text NOT NULL,
  `description_test` text NOT NULL,
  `lien_git` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Contenu de la table `us`
--

INSERT INTO `us` (`ID`, `titre`, `description`, `projet`, `sprint`, `cout`, `dependances`, `statut`, `date_debut`, `date_fin`, `date_test`, `code_test`, `description_test`, `lien_git`) VALUES
(1, 'titre 1', 'Us numéro 1', 0, 1, 2, '0', 0, '2014-10-22', '2014-10-25', '0000-00-00', '', 'Description du test 1', '0'),
(2, 'titre 2', 'US numéro 2', 0, 2, 5, '1', 2, '2014-10-30', '2014-10-31', '0000-00-00', '', 'Description test numéro 2', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
