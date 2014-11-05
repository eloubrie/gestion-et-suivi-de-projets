-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 05 Novembre 2014 à 14:55
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cdp`
--

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
(1, 'https://github.com/eloubrie/gestion-et-suivi-de-projets/');

-- --------------------------------------------------------

--
-- Structure de la table `sprints`
--

CREATE TABLE IF NOT EXISTS `sprints` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Numero_du_Sprint` int(11) NOT NULL,
  `Cout` int(11) NOT NULL,
  `Date_de_creation` date NOT NULL,
  `Date_de_debut` date NOT NULL,
  `Duree` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Date_de_fin` date NOT NULL,
  `Titre` text COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Cout_valide` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `sprints`
--

INSERT INTO `sprints` (`ID`, `Numero_du_Sprint`, `Cout`, `Date_de_creation`, `Date_de_debut`, `Duree`, `Date_de_fin`, `Titre`, `Description`, `Cout_valide`) VALUES
(1, 0, 16, '2014-11-04', '2014-11-05', '3 mois', '2014-11-06', 'toto', 'totottotottoottoto', 10);

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
  `titre` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `projet` int(11) NOT NULL,
  `ID_sprint` int(11) NOT NULL,
  `cout` int(11) NOT NULL,
  `dependances` text COLLATE utf8_unicode_ci NOT NULL,
  `statut` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `date_test` date NOT NULL,
  `ID_test` int(11) NOT NULL,
  `description_test` text COLLATE utf8_unicode_ci NOT NULL,
  `ID_git` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_sprint` (`ID_sprint`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `us`
--

INSERT INTO `us` (`ID`, `titre`, `description`, `projet`, `ID_sprint`, `cout`, `dependances`, `statut`, `date_debut`, `date_fin`, `date_test`, `ID_test`, `description_test`, `ID_git`) VALUES
(1, 'titre 1', 'Us numéro 1', 0, 1, 2, '0', 0, '2014-10-22', '2014-10-25', '0000-00-00', 5, 'Description du test 1', 0),
(2, 'titre 2', 'US numéro 2', 0, 2, 5, '1', 2, '2014-10-30', '2014-10-31', '0000-00-00', 2, 'Description test numéro 2', 0),
(5, 'ddqd', 'dsqdsq', 8, 7, 6, 'ddsqdsqdsqd', 2, '2014-10-01', '2014-10-16', '2014-10-07', 7, 'zqdzqdqz', 2),
(6, '', '', 0, 0, 0, '', 0, '0000-00-00', '0000-00-00', '0000-00-00', 0, '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
