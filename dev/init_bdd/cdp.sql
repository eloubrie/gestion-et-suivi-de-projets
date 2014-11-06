-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2014 at 09:07 
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cdp`
--

-- --------------------------------------------------------

--
-- Table structure for table `developpeurs`
--

CREATE TABLE IF NOT EXISTS `developpeurs` (
`ID` int(11) NOT NULL,
  `pseudo` text COLLATE utf8_unicode_ci NOT NULL,
  `pass` text COLLATE utf8_unicode_ci NOT NULL,
  `droits` int(11) NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `developpeurs`
--

INSERT INTO `developpeurs` (`ID`, `pseudo`, `pass`, `droits`, `email`) VALUES
(1, 'loubrie', 'loubriePass', 0, 'elian.loubrie@gmail.com'),
(2, 'cheminade', 'cheminadePass', 0, 'cheminadedavid@gmail.com'),
(3, 'lamoureux', 'lamoureuxPass', 0, 'virgil1534@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `git`
--

CREATE TABLE IF NOT EXISTS `git` (
`ID` int(11) NOT NULL,
  `lien` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `git`
--

INSERT INTO `git` (`ID`, `lien`) VALUES
(1, 'https://github.com/eloubrie/gestion-et-suivi-de-projets/');

-- --------------------------------------------------------

--
-- Table structure for table `sprints`
--

CREATE TABLE IF NOT EXISTS `sprints` (
`ID` int(11) NOT NULL,
  `Numero_du_Sprint` int(11) NOT NULL,
  `Cout` int(11) NOT NULL,
  `Date_de_creation` date NOT NULL,
  `Date_de_debut` date NOT NULL,
  `Duree` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Date_de_fin` date NOT NULL,
  `Titre` text COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Cout_valide` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sprints`
--

INSERT INTO `sprints` (`ID`, `Numero_du_Sprint`, `Cout`, `Date_de_creation`, `Date_de_debut`, `Duree`, `Date_de_fin`, `Titre`, `Description`, `Cout_valide`) VALUES
(2, 1, 15, '0000-00-00', '0000-00-00', '15', '0000-00-00', 'titre', 'desc', 0),
(3, 2, 14, '0000-00-00', '0000-00-00', '14', '0000-00-00', 'titre', 'desc', 14);

-- --------------------------------------------------------

--
-- Table structure for table `taches`
--

CREATE TABLE IF NOT EXISTS `taches` (
`ID` int(11) NOT NULL,
  `ID_US` int(11) DEFAULT NULL,
  `titre` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `type` int(11) NOT NULL,
  `cout` int(11) NOT NULL,
  `dependances` text COLLATE utf8_unicode_ci NOT NULL,
  `developpeur` int(11) DEFAULT NULL,
  `statut` int(11) NOT NULL,
  `date_realisation` date DEFAULT NULL,
  `date_test` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `taches`
--

INSERT INTO `taches` (`ID`, `ID_US`, `titre`, `description`, `type`, `cout`, `dependances`, `developpeur`, `statut`, `date_realisation`, `date_test`) VALUES
(1, 11, 'Tache 1', 'Description T1', 2, 3, '4', 0, 1, '0000-00-00', '0000-00-00'),
(3, 10, 'creation BDD', 'Création de la Base de Donnée', 3, 2, '', 1, 0, '0000-00-00', '0000-00-00'),
(11, 10, 'mon Titre', 'jdkldkz', 1, 1, '', 0, 0, '0000-00-00', '0000-00-00'),
(13, 11, 'myTasce', 'my desce', 4, 987, '1', 2, 2, '2014-11-06', '1111-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `us`
--

CREATE TABLE IF NOT EXISTS `us` (
`ID` int(11) NOT NULL,
  `titre` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `ID_sprint` int(11) DEFAULT NULL,
  `cout` int(11) NOT NULL,
  `dependances` text COLLATE utf8_unicode_ci NOT NULL,
  `statut` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `date_test` date DEFAULT NULL,
  `code_test` text COLLATE utf8_unicode_ci,
  `description_test` text COLLATE utf8_unicode_ci,
  `lien_git` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `us`
--

INSERT INTO `us` (`ID`, `titre`, `description`, `ID_sprint`, `cout`, `dependances`, `statut`, `date_debut`, `date_fin`, `date_test`, `code_test`, `description_test`, `lien_git`) VALUES
(10, 'Test', 'qsdqsd', 3, 610, 'qsd', 2, '1225-02-25', '1992-11-02', '0000-00-00', 'sfd', 'sdfsdf', 'lien'),
(11, 'Test2', 'desc2', 3, 55, 'dep', 2, '1992-11-02', '1311-11-11', '0000-00-00', 'code', 'desc', 'lien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `developpeurs`
--
ALTER TABLE `developpeurs`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `git`
--
ALTER TABLE `git`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sprints`
--
ALTER TABLE `sprints`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `taches`
--
ALTER TABLE `taches`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID_US` (`ID_US`);

--
-- Indexes for table `us`
--
ALTER TABLE `us`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID_sprint` (`ID_sprint`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `developpeurs`
--
ALTER TABLE `developpeurs`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `git`
--
ALTER TABLE `git`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sprints`
--
ALTER TABLE `sprints`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `taches`
--
ALTER TABLE `taches`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `us`
--
ALTER TABLE `us`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `taches`
--
ALTER TABLE `taches`
ADD CONSTRAINT `us` FOREIGN KEY (`ID_US`) REFERENCES `us` (`ID`);

--
-- Constraints for table `us`
--
ALTER TABLE `us`
ADD CONSTRAINT `sprint` FOREIGN KEY (`ID_sprint`) REFERENCES `sprints` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
