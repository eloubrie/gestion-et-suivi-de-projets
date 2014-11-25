-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 25 Novembre 2014 à 20:19
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
-- Structure de la table `gantt`
--

CREATE TABLE IF NOT EXISTS `gantt` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_developpeur` int(11) DEFAULT NULL,
  `Jour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID_tache` int(11) DEFAULT NULL,
  `ID_sprint` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_developpeur` (`ID_developpeur`),
  KEY `ID_tache` (`ID_tache`),
  KEY `ID_sprint` (`ID_sprint`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `lien_git` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `sprints`
--

INSERT INTO `sprints` (`ID`, `numero_du_sprint`, `cout`, `date_creation`, `date_debut`, `duree`, `date_fin`, `titre`, `description`, `cout_valide`, `lien_git`) VALUES
(1, 1, 20, '2014-11-11', '2014-11-11', '10', '2014-11-21', 'Sprint 1', 'Description du sprint 1', 5, NULL),
(2, 2, 18, '2014-11-11', '2014-11-21', '10', '2014-12-01', 'Sprint 2', 'Description du sprint 2', 0, NULL),
(6, 3, 18, '2014-11-11', '2014-12-01', '5', '2014-12-06', 'Sprint 3', 'Description du sprint 3', 1, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

--
-- Contenu de la table `taches`
--

INSERT INTO `taches` (`ID`, `ID_US`, `titre`, `description`, `type`, `cout`, `dependances`, `developpeur`, `statut`, `date_realisation`, `date_test`) VALUES
(14, 66, 'Tache 1', 'Desc1', 1, 3, '', 1, 0, '0000-00-00', '0000-00-00'),
(15, 66, 'Tache 2', 'Desc2', 2, 1, '', 2, 2, '2014-11-26', '2014-11-27'),
(16, 67, 'Tache 3', 'Desc3', 2, 3, '1, 2', 3, 0, '0000-00-00', '0000-00-00'),
(17, 67, 'Tache 4', 'Desc4', 2, 6, '', 1, 0, '0000-00-00', '0000-00-00'),
(18, 67, 'Tache 5', 'Desc5', 4, 3, '1, 2', 2, 0, '0000-00-00', '0000-00-00'),
(19, 68, 'Tache 6', 'Desc6', 3, 2, '3', 1, 1, '0000-00-00', '0000-00-00'),
(20, 68, 'Tache 7', 'Desc7', 3, 1, '4', 3, 1, '0000-00-00', '0000-00-00'),
(21, 69, 'Tache 8', 'Desc8', 2, 7, '', 1, 0, '0000-00-00', '0000-00-00'),
(22, 69, 'Tache 9', 'Desc9', 4, 2, '', 2, 2, '2014-11-26', '2014-11-28'),
(23, 69, 'Tache 10', 'Desc10', 1, 9, '1, 5, 6', 3, 0, '0000-00-00', '0000-00-00'),
(24, 70, 'Tache 11', 'Desc11', 2, 3, '', 3, 1, '0000-00-00', '0000-00-00'),
(25, 70, 'Tache 12', 'Desc12', 4, 4, '5, 7', 1, 2, '2014-11-25', '2014-11-26'),
(26, 70, 'Tache 13', 'Desc13', 1, 6, '', 3, 0, '0000-00-00', '0000-00-00'),
(27, 70, 'Tache 14', 'Desc14', 1, 4, '', 2, 1, '0000-00-00', '0000-00-00'),
(28, 71, 'Tache 15', 'Desc15', 2, 3, '1, 9', 1, 2, '2014-11-27', '0000-00-00'),
(29, 71, 'Tache 16', 'Desc 16', 3, 2, '5, 12', 3, 1, '0000-00-00', '0000-00-00'),
(30, 72, 'Tache 17', 'Desc 17', 1, 3, '', 2, 1, '0000-00-00', '0000-00-00'),
(31, 72, 'Tache 18', 'Desc18', 2, 6, '8, 12', 3, 1, '0000-00-00', '0000-00-00'),
(32, 72, 'Tache 19', 'Desc 19', 1, 4, '', 3, 0, '0000-00-00', '0000-00-00'),
(33, 73, 'Tache 20', 'Desc 20', 4, 2, '', 2, 0, '0000-00-00', '0000-00-00'),
(34, 73, 'Tache 21', 'Desc 21', 4, 7, '15', 1, 2, '2014-11-27', '0000-00-00'),
(35, 73, 'Tache 22', 'Desc22', 1, 2, '', 1, 1, '0000-00-00', '0000-00-00'),
(36, 73, 'Tache 23', 'Desc23', 2, 2, '', 2, 1, '0000-00-00', '0000-00-00'),
(37, 74, 'Tache 24', 'Desc24', 1, 3, '20, 21', 2, 2, '2014-11-26', '2014-11-29'),
(38, 74, 'Tache 25', 'Desc25', 3, 6, '8', 1, 1, '0000-00-00', '0000-00-00'),
(39, 74, 'Tache 26', 'Desc26', 4, 1, '', 3, 0, '0000-00-00', '0000-00-00'),
(40, 74, 'Tache 27', 'Desc27', 3, 1, '', 2, 1, '0000-00-00', '0000-00-00'),
(41, 74, 'Tache 28', 'Desc 28', 2, 6, '14', 3, 2, '2014-11-19', '0000-00-00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=78 ;

--
-- Contenu de la table `us`
--

INSERT INTO `us` (`ID`, `titre`, `description`, `ID_sprint`, `cout`, `statut`, `date_debut`, `date_fin`, `date_test`, `code_test`, `description_test`, `lien_git`) VALUES
(66, 'Titre US1', 'Description US1', 1, 5, 1, '2014-11-11', '2014-11-13', '2014-11-13', 'Code US1', 'Desc Test US1', 'Lien git US1'),
(67, 'Titre US2', 'Description US2', 1, 7, 0, '2014-11-15', '2014-11-17', '0000-00-00', 'Code US2', 'Desc Test US2', 'Lien US2'),
(68, 'Titre US3', 'Description US3', 2, 7, 0, '2014-11-20', '2014-11-21', '0000-00-00', 'code US3', 'Desc test US3', 'Lien US3'),
(69, 'Titre US4', 'Description US4', 2, 1, 2, '2014-11-19', '2014-11-22', '2014-11-27', 'Code US4', 'Desc US4', 'Lien US4'),
(70, 'Titre US5', 'Desc US5', 2, 3, 0, '2014-11-19', '2014-11-21', '0000-00-00', 'Code US5', 'Desc US5', 'Lien US5'),
(71, 'Titre US6', 'Desc US6', 6, 2, 0, '2014-11-29', '2014-11-30', '0000-00-00', 'Code US6', 'Desc US6', 'Lien US6'),
(72, 'Titre US7', 'Desc US7', 6, 5, 3, '2014-11-20', '2014-11-22', '2014-11-27', 'Code US7', 'Desc US7', 'Lien US7'),
(73, 'Titre US8', 'Desc US8', 6, 3, 1, '2014-11-25', '2014-11-28', '0000-00-00', 'Code US8', 'Desc US8', 'Lien US8'),
(74, 'Titre US9', 'Desc US9', 6, 4, 0, '2014-11-25', '2014-11-29', '0000-00-00', 'Code US9', 'Desc US9', 'Lien US9');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `gantt`
--
ALTER TABLE `gantt`
  ADD CONSTRAINT `gantt_developpeur` FOREIGN KEY (`ID_developpeur`) REFERENCES `developpeurs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gantt_sprint` FOREIGN KEY (`ID_sprint`) REFERENCES `sprints` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gantt_tache` FOREIGN KEY (`ID_tache`) REFERENCES `taches` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `taches`
--
ALTER TABLE `taches`
  ADD CONSTRAINT `us` FOREIGN KEY (`ID_US`) REFERENCES `us` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `us`
--
ALTER TABLE `us`
  ADD CONSTRAINT `sprint` FOREIGN KEY (`ID_sprint`) REFERENCES `sprints` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
